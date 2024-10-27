<?php
namespace Ratchet\Wamp;
use Ratchet\ComponentInterface;
use Ratchet\ConnectionInterface;

/**
 * An extension of Ratchet\ComponentInterface to server a WAMP application
 * onMessage is replaced by various types of messages for this protocol (pub/sub or rpc)
 */
interface WampServerInterface extends ComponentInterface {
    /**
     * An RPC call has been received
     * @param \Ratchet\ConnectionInterface $conn
     * @param string                       $id The unique ID of the RPC, required to respond to
     * @param string|Topic                 $Topic The Topic to execute the call against
     * @param array                        $params Call parameters received from the client
     */
    function onCall(ConnectionInterface $conn, $id, $Topic, array $params);

    /**
     * A request to subscribe to a Topic has been made
     * @param \Ratchet\ConnectionInterface $conn
     * @param string|Topic                 $Topic The Topic to subscribe to
     */
    function onSubscribe(ConnectionInterface $conn, $Topic);

    /**
     * A request to unsubscribe from a Topic has been made
     * @param \Ratchet\ConnectionInterface $conn
     * @param string|Topic                 $Topic The Topic to unsubscribe from
     */
    function onUnSubscribe(ConnectionInterface $conn, $Topic);

    /**
     * A client is attempting to publish content to a subscribed connections on a URI
     * @param \Ratchet\ConnectionInterface $conn
     * @param string|Topic                 $Topic The Topic the user has attempted to publish to
     * @param string                       $event Payload of the publish
     * @param array                        $exclude A list of session IDs the message should be excluded from (blacklist)
     * @param array                        $eligible A list of session Ids the message should be send to (whitelist)
     */
    function onPublish(ConnectionInterface $conn, $Topic, $event, array $exclude, array $eligible);
}
