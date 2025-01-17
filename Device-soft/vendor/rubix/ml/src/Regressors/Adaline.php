<?php

namespace Rubix\ML\Regressors;

use Rubix\ML\Online;
use Rubix\ML\Learner;
use Rubix\ML\Verbose;
use Rubix\ML\DataType;
use Rubix\ML\Estimator;
use Rubix\ML\Persistable;
use Rubix\ML\RanksFeatures;
use Rubix\ML\EstimatorType;
use Rubix\ML\Helpers\Params;
use Rubix\ML\Datasets\Dataset;
use Rubix\ML\Traits\LoggerAware;
use Rubix\ML\NeuralNet\FeedForward;
use Rubix\ML\NeuralNet\Layers\Dense;
use Rubix\ML\Traits\AutotrackRevisions;
use Rubix\ML\NeuralNet\Optimizers\Adam;
use Rubix\ML\NeuralNet\Layers\Continuous;
use Rubix\ML\NeuralNet\Layers\Placeholder1D;
use Rubix\ML\NeuralNet\Optimizers\Optimizer;
use Rubix\ML\NeuralNet\Initializers\Xavier2;
use Rubix\ML\Specifications\DatasetIsLabeled;
use Rubix\ML\Specifications\DatasetIsNotEmpty;
use Rubix\ML\Specifications\SpecificationChain;
use Rubix\ML\NeuralNet\CostFunctions\LeastSquares;
use Rubix\ML\NeuralNet\CostFunctions\RegressionLoss;
use Rubix\ML\Specifications\DatasetHasDimensionality;
use Rubix\ML\Specifications\LabelsAreCompatibleWithLearner;
use Rubix\ML\Specifications\SamplesAreCompatibleWithEstimator;
use Rubix\ML\Exceptions\InvalidArgumentException;
use Rubix\ML\Exceptions\RuntimeException;
use Generator;

use function is_nan;
use function count;
use function get_object_vars;

/**
 * Adaline
 *
 * *Adaptive Linear Neuron* is a single layer neural network with a continuous linear
 * output neuron. Training is equivalent to solving L2 regularized linear regression
 * (Ridge) iteratively using mini batch Gradient Descent.
 *
 * References:
 * [1] B. Widrow. (1960). An Adaptive "Adaline" Neuron Using Chemical "Memistors".
 *
 * @category    Machine Learning
 * @package     Rubix/ML
 * @author      Andrew DalPino
 */
class Adaline implements Estimator, Learner, Online, RanksFeatures, Verbose, Persistable
{
    use AutotrackRevisions, LoggerAware;

    /**
     * The number of training samples to process at a time.
     *
     * @var positive-int
     */
    protected int $batchSize;

    /**
     * The gradient descent optimizer used to update the network parameters.
     *
     * @var \Rubix\ML\NeuralNet\Optimizers\Optimizer
     */
    protected \Rubix\ML\NeuralNet\Optimizers\Optimizer $optimizer;

    /**
     * The amount of L2 regularization applied to the weights of the output layer.
     *
     * @var float
     */
    protected float $alpha;

    /**
     * The maximum number of training epochs. i.e. the number of times to iterate
     * over the entire training set before terminating.
     *
     * @var int
     */
    protected int $epochs;

    /**
     * The minimum change in the training loss necessary to continue training.
     *
     * @var float
     */
    protected float $minChange;

    /**
     * The number of epochs without improvement in the training loss to wait before considering an early stop.
     *
     * @var int
     */
    protected int $window;

    /**
     * The function that computes the loss associated with an erroneous
     * activation during training.
     *
     * @var \Rubix\ML\NeuralNet\CostFunctions\RegressionLoss
     */
    protected \Rubix\ML\NeuralNet\CostFunctions\RegressionLoss $costFn;

    /**
     * The underlying neural network instance.
     *
     * @var \Rubix\ML\NeuralNet\FeedForward|null
     */
    protected ?\Rubix\ML\NeuralNet\FeedForward $network = null;

    /**
     * The loss at each epoch from the last training session.
     *
     * @var float[]|null
     */
    protected ?array $losses = null;

    /**
     * @param int $batchSize
     * @param \Rubix\ML\NeuralNet\Optimizers\Optimizer|null $optimizer
     * @param float $alpha
     * @param int $epochs
     * @param float $minChange
     * @param int $window
     * @param \Rubix\ML\NeuralNet\CostFunctions\RegressionLoss|null $costFn
     * @throws \Rubix\ML\Exceptions\InvalidArgumentException
     */
    public function __construct(
        int $batchSize = 128,
        ?Optimizer $optimizer = null,
        float $alpha = 1e-4,
        int $epochs = 1000,
        float $minChange = 1e-4,
        int $window = 5,
        ?RegressionLoss $costFn = null
    ) {
        if ($batchSize < 1) {
            throw new InvalidArgumentException('Batch size must be'
                . " greater than 0, $batchSize given.");
        }

        if ($alpha < 0.0) {
            throw new InvalidArgumentException('Alpha must be'
                . " greater than 0, $alpha given.");
        }

        if ($epochs < 1) {
            throw new InvalidArgumentException('Number of epochs'
                . " must be greater than 0, $epochs given.");
        }

        if ($minChange < 0.0) {
            throw new InvalidArgumentException('Minimum change must be'
                . " greater than 0, $minChange given.");
        }

        if ($window < 1) {
            throw new InvalidArgumentException('Window must be'
                . " greater than 0, $window given.");
        }

        $this->batchSize = $batchSize;
        $this->optimizer = $optimizer ?? new Adam();
        $this->alpha = $alpha;
        $this->epochs = $epochs;
        $this->minChange = $minChange;
        $this->window = $window;
        $this->costFn = $costFn ?? new LeastSquares();
    }

    /**
     * Return the estimator type.
     *
     * @internal
     *
     * @return \Rubix\ML\EstimatorType
     */
    public function type() : EstimatorType
    {
        return EstimatorType::regressor();
    }

    /**
     * Return the data types that the estimator is compatible with.
     *
     * @internal
     *
     * @return list<\Rubix\ML\DataType>
     */
    public function compatibility() : array
    {
        return [
            DataType::continuous(),
        ];
    }

    /**
     * Return the settings of the hyper-parameters in an associative array.
     *
     * @internal
     *
     * @return mixed[]
     */
    public function params() : array
    {
        return [
            'batch size' => $this->batchSize,
            'optimizer' => $this->optimizer,
            'alpha' => $this->alpha,
            'epochs' => $this->epochs,
            'min change' => $this->minChange,
            'window' => $this->window,
            'cost fn' => $this->costFn,
        ];
    }

    /**
     * Has the learner been trained?
     *
     * @return bool
     */
    public function trained() : bool
    {
        return isset($this->network);
    }

    /**
     * Return an iterable progress table with the steps from the last training session.
     *
     * @return \Generator<mixed[]>
     */
    public function steps() : Generator
    {
        if (!$this->losses) {
            return;
        }

        foreach ($this->losses as $epoch => $loss) {
            yield [
                'epoch' => $epoch,
                'loss' => $loss,
            ];
        }
    }

    /**
     * Return the loss for each epoch from the last training session.
     *
     * @return float[]|null
     */
    public function losses() : ?array
    {
        return $this->losses;
    }

    /**
     * Return the underlying neural network instance or null if not trained.
     *
     * @return \Rubix\ML\NeuralNet\FeedForward|null
     */
    public function network() : ?FeedForward
    {
        return $this->network;
    }

    /**
     * Train the estimator with a dataset.
     *
     * @param \Rubix\ML\Datasets\Labeled $dataset
     */
    public function train(Dataset $dataset) : void
    {
        DatasetIsNotEmpty::with($dataset)->check();

        $this->network = new FeedForward(
            new Placeholder1D($dataset->numFeatures()),
            [new Dense(1, $this->alpha, true, new Xavier2())],
            new Continuous($this->costFn),
            $this->optimizer
        );

        $this->network->initialize();

        $this->partial($dataset);
    }

    /**
     * Perform a partial train on the learner.
     *
     * @param \Rubix\ML\Datasets\Labeled $dataset
     */
    public function partial(Dataset $dataset) : void
    {
        if (!$this->network) {
            $this->train($dataset);

            return;
        }

        SpecificationChain::with([
            new DatasetIsLabeled($dataset),
            new DatasetIsNotEmpty($dataset),
            new SamplesAreCompatibleWithEstimator($dataset, $this),
            new LabelsAreCompatibleWithLearner($dataset, $this),
            new DatasetHasDimensionality($dataset, $this->network->input()->width()),
        ])->check();

        if ($this->logger) {
            $this->logger->info("$this initialized");
        }

        $prevLoss = $bestLoss = INF;
        $delta = 0;

        $this->losses = [];

        for ($epoch = 1; $epoch <= $this->epochs; ++$epoch) {
            $batches = $dataset->randomize()->batch($this->batchSize);

            $loss = 0.0;

            foreach ($batches as $batch) {
                $loss += $this->network->roundtrip($batch);
            }

            if (is_nan($loss)) {
                if ($this->logger) {
                    $this->logger->info('Numerical under/overflow detected');
                }

                break;
            }

            $loss /= count($batches);

            $this->losses[$epoch] = $loss;

            if ($this->logger) {
                $this->logger->info("Epoch $epoch - {$this->costFn}: $loss");
            }

            if ($loss <= 0.0) {
                break;
            }

            if (abs($prevLoss - $loss) < $this->minChange) {
                break;
            }

            if ($loss < $bestLoss) {
                $bestLoss = $loss;

                $delta = 0;
            } else {
                ++$delta;
            }

            if ($delta >= $this->window) {
                break;
            }

            $prevLoss = $loss;
        }

        if ($this->logger) {
            $this->logger->info('Training complete');
        }
    }

    /**
     * Make predictions from a dataset.
     *
     * @param \Rubix\ML\Datasets\Dataset $dataset
     * @throws \Rubix\ML\Exceptions\RuntimeException
     * @return list<int|float>
     */
    public function predict(Dataset $dataset) : array
    {
        if (!$this->network) {
            throw new RuntimeException('Estimator has not been trained.');
        }

        DatasetHasDimensionality::with($dataset, $this->network->input()->width())->check();

        $activations = $this->network->infer($dataset);

        $activations = array_column($activations->asArray(), 0);

        return $activations;
    }

    /**
     * Return the importance scores of each feature column of the training set.
     *
     * @throws \Rubix\ML\Exceptions\RuntimeException
     * @return float[]
     */
    public function featureImportances() : array
    {
        if (!$this->network) {
            throw new RuntimeException('Estimator has not been trained.');
        }

        $layer = current($this->network->hidden());

        if (!$layer instanceof Dense) {
            throw new RuntimeException('Weight layer is missing.');
        }

        return $layer->weights()
            ->rowAsVector(0)
            ->abs()
            ->asArray();
    }

    /**
     * Return an associative array containing the data used to serialize the object.
     *
     * @return mixed[]
     */
    public function __serialize() : array
    {
        $properties = get_object_vars($this);

        unset($properties['losses']);

        return $properties;
    }

    /**
     * Return the string representation of the object.
     *
     * @internal
     *
     * @return string
     */
    public function __toString() : string
    {
        return 'Adaline (' . Params::stringify($this->params()) . ')';
    }
}
