<?php

namespace Rubix\ML\Transformers;

use Rubix\ML\DataType;
use Rubix\ML\Datasets\Dataset;
use Rubix\ML\Tokenizers\Word;
use Rubix\ML\Tokenizers\Tokenizer;
use Rubix\ML\Exceptions\InvalidArgumentException;

use function count;
use function is_string;
use function array_fill;
use function array_merge;
use function array_count_values;
use function array_walk;
use function intval;
use function crc32;

/**
 * Token Hashing Vectorizer
 *
 * Token Hashing Vectorizer builds token count vectors on the fly by employing a *hashing
 * trick*. It is a stateless transformer that uses the CRC32 (Cyclic Redundancy Check)
 * hashing algorithm to assign token occurrences to a bucket in a vector of user-defined
 * dimensionality. The advantage of hashing over a fixed vocabulary is that there is no
 * memory footprint however there is a chance that certain tokens will collide with other
 * tokens especially in lower-dimensional vector spaces.
 *
 * @category    Machine Learning
 * @package     Rubix/ML
 * @author      Andrew DalPino
 */
class TokenHashingVectorizer implements Transformer
{
    /**
     * The maximum number of dimensions supported.
     *
     * @var int
     */
    protected const MAX_DIMENSIONS = 4294967295;

    /**
     * The dimensionality of the vector space.
     *
     * @var int<0,max>
     */
    protected int $dimensions;

    /**
     * The proportion of dimensionality being utilized in the output vector space.
     *
     * @var float
     */
    protected float $scale;

    /**
     * The tokenizer used to extract tokens from blobs of text.
     *
     * @var \Rubix\ML\Tokenizers\Tokenizer
     */
    protected \Rubix\ML\Tokenizers\Tokenizer $tokenizer;

    /**
     * @param int $dimensions
     * @param \Rubix\ML\Tokenizers\Tokenizer|null $tokenizer
     * @throws \Rubix\ML\Exceptions\InvalidArgumentException
     */
    public function __construct(int $dimensions, ?Tokenizer $tokenizer = null)
    {
        if ($dimensions < 1 or $dimensions > self::MAX_DIMENSIONS) {
            throw new InvalidArgumentException('Dimensions must be'
                . ' between 0 and ' . self::MAX_DIMENSIONS
                . ", $dimensions given.");
        }

        $this->dimensions = $dimensions;
        $this->scale = $dimensions / self::MAX_DIMENSIONS;
        $this->tokenizer = $tokenizer ?? new Word();
    }

    /**
     * Return the data types that this transformer is compatible with.
     *
     * @return \Rubix\ML\DataType[]
     */
    public function compatibility() : array
    {
        return DataType::all();
    }

    /**
     * Transform the dataset in place.
     *
     * @param array<mixed[]> $samples
     */
    public function transform(array &$samples) : void
    {
        array_walk($samples, [$this, 'vectorize']);
    }

    /**
     * Vectorize the text features of a sample.
     *
     * @param list<mixed> $sample
     */
    public function vectorize(array &$sample) : void
    {
        $vectors = [];

        foreach ($sample as $column => $value) {
            if (is_string($value)) {
                $template = array_fill(0, $this->dimensions, 0);

                $tokens = $this->tokenizer->tokenize($value);

                $counts = array_count_values($tokens);

                foreach ($counts as $token => $count) {
                    $offset = intval(crc32($token) * $this->scale);

                    $template[$offset] += $count;
                }

                $vectors[] = $template;

                unset($sample[$column]);
            }
        }

        $sample = array_merge($sample, ...$vectors);
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
        return "Token Hashing Vectorizer (dimensions: {$this->dimensions}, tokenizer: {$this->tokenizer})";
    }
}
