<?php
namespace Ratchet\Wamp;
use Ratchet\ConnectionInterface;
use Ratchet\WebSocket\WsServerInterface;

class TopicManager implements WsServerInterface, WampServerInterface {
    /**
     * @var WampServerInterface
     */
    protected $app;

    /**
     * @var array
     */
    protected $TopicLookup = array();

    public function __construct(WampServerInterface $app) {
        $this->app = $app;
    }

    /**
     * {@inheritdoc}
     */
    public function onOpen(ConnectionInterface $conn) {
        $conn->WAMP->subscriptions = new \SplObjectStorage;
        $this->app->onOpen($conn);
    }

    /**
     * {@inheritdoc}
     */
    public function onCall(ConnectionInterface $conn, $id, $Topic, array $params) {
        $this->app->onCall($conn, $id, $this->getTopic($Topic), $params);
    }

    /**
     * {@inheritdoc}
     */
    public function onSubscribe(ConnectionInterface $conn, $Topic) {
        $TopicObj = $this->getTopic($Topic);

        if ($conn->WAMP->subscriptions->contains($TopicObj)) {
            return;
        }

        $this->TopicLookup[$Topic]->add($conn);
        $conn->WAMP->subscriptions->attach($TopicObj);
        $this->app->onSubscribe($conn, $TopicObj);
    }

    /**
     * {@inheritdoc}
     */
    public function onUnsubscribe(ConnectionInterface $conn, $Topic) {
        $TopicObj = $this->getTopic($Topic);

        if (!$conn->WAMP->subscriptions->contains($TopicObj)) {
            return;
        }

        $this->cleanTopic($TopicObj, $conn);

        $this->app->onUnsubscribe($conn, $TopicObj);
    }

    /**
     * {@inheritdoc}
     */
    public function onPublish(ConnectionInterface $conn, $Topic, $event, array $exclude, array $eligible) {
        $this->app->onPublish($conn, $this->getTopic($Topic), $event, $exclude, $eligible);
    }

    /**
     * {@inheritdoc}
     */
    public function onClose(ConnectionInterface $conn) {
        $this->app->onClose($conn);

        foreach ($this->TopicLookup as $Topic) {
            $this->cleanTopic($Topic, $conn);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function onError(ConnectionInterface $conn, \Exception $e) {
        $this->app->onError($conn, $e);
    }

    /**
     * {@inheritdoc}
     */
    public function getSubProtocols() {
        if ($this->app instanceof WsServerInterface) {
            return $this->app->getSubProtocols();
        }

        return array();
    }

    /**
     * @param string
     * @return Topic
     */
    protected function getTopic($Topic) {
        if (!array_key_exists($Topic, $this->TopicLookup)) {
            $this->TopicLookup[$Topic] = new Topic($Topic);
        }

        return $this->TopicLookup[$Topic];
    }

    protected function cleanTopic(Topic $Topic, ConnectionInterface $conn) {
        if ($conn->WAMP->subscriptions->contains($Topic)) {
            $conn->WAMP->subscriptions->detach($Topic);
        }

        $this->TopicLookup[$Topic->getId()]->remove($conn);

        if (0 === $Topic->count()) {
            unset($this->TopicLookup[$Topic->getId()]);
        }
    }
}
