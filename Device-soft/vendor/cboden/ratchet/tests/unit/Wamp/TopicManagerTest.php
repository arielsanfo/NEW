<?php
namespace Ratchet\Wamp;

/**
 * @covers Ratchet\Wamp\TopicManager
 */
class TopicManagerTest extends \PHPUnit_Framework_TestCase {
    private $mock;

    /**
     * @var \Ratchet\Wamp\TopicManager
     */
    private $mngr;

    /**
     * @var \Ratchet\ConnectionInterface
     */
    private $conn;

    public function setUp() {
        $this->conn = $this->getMock('\Ratchet\ConnectionInterface');
        $this->mock = $this->getMock('\Ratchet\Wamp\WampServerInterface');
        $this->mngr = new TopicManager($this->mock);

        $this->conn->WAMP = new \StdClass;
        $this->mngr->onOpen($this->conn);
    }

    public function testGetTopicReturnsTopicObject() {
        $class  = new \ReflectionClass('Ratchet\Wamp\TopicManager');
        $method = $class->getMethod('getTopic');
        $method->setAccessible(true);

        $Topic = $method->invokeArgs($this->mngr, array('The Topic'));

        $this->assertInstanceOf('Ratchet\Wamp\Topic', $Topic);
    }

    public function testGetTopicCreatesTopicWithSameName() {
        $name = 'The Topic';

        $class  = new \ReflectionClass('Ratchet\Wamp\TopicManager');
        $method = $class->getMethod('getTopic');
        $method->setAccessible(true);

        $Topic = $method->invokeArgs($this->mngr, array($name));

        $this->assertEquals($name, $Topic->getId());
    }

    public function testGetTopicReturnsSameObject() {
        $class  = new \ReflectionClass('Ratchet\Wamp\TopicManager');
        $method = $class->getMethod('getTopic');
        $method->setAccessible(true);

        $Topic = $method->invokeArgs($this->mngr, array('No copy'));
        $again = $method->invokeArgs($this->mngr, array('No copy'));

        $this->assertSame($Topic, $again);
    }

    public function testOnOpen() {
        $this->mock->expects($this->once())->method('onOpen');
        $this->mngr->onOpen($this->conn);
    }

    public function testOnCall() {
        $id = uniqid();

        $this->mock->expects($this->once())->method('onCall')->with(
            $this->conn
          , $id
          , $this->isInstanceOf('Ratchet\Wamp\Topic')
          , array()
        );

        $this->mngr->onCall($this->conn, $id, 'new Topic', array());
    }

    public function testOnSubscribeCreatesTopicObject() {
        $this->mock->expects($this->once())->method('onSubscribe')->with(
            $this->conn, $this->isInstanceOf('Ratchet\Wamp\Topic')
        );

        $this->mngr->onSubscribe($this->conn, 'new Topic');
    }

    public function testTopicIsInConnectionOnSubscribe() {
        $name = 'New Topic';

        $class  = new \ReflectionClass('Ratchet\Wamp\TopicManager');
        $method = $class->getMethod('getTopic');
        $method->setAccessible(true);

        $Topic = $method->invokeArgs($this->mngr, array($name));

        $this->mngr->onSubscribe($this->conn, $name);

        $this->assertTrue($this->conn->WAMP->subscriptions->contains($Topic));
    }

    public function testDoubleSubscriptionFiresOnce() {
        $this->mock->expects($this->exactly(1))->method('onSubscribe');

        $this->mngr->onSubscribe($this->conn, 'same Topic');
        $this->mngr->onSubscribe($this->conn, 'same Topic');
    }

    public function testUnsubscribeEvent() {
        $name = 'in and out';
        $this->mock->expects($this->once())->method('onUnsubscribe')->with(
            $this->conn, $this->isInstanceOf('Ratchet\Wamp\Topic')
        );

        $this->mngr->onSubscribe($this->conn, $name);
        $this->mngr->onUnsubscribe($this->conn, $name);
    }

    public function testUnsubscribeFiresOnce() {
        $name = 'getting sleepy';
        $this->mock->expects($this->exactly(1))->method('onUnsubscribe');

        $this->mngr->onSubscribe($this->conn,   $name);
        $this->mngr->onUnsubscribe($this->conn, $name);
        $this->mngr->onUnsubscribe($this->conn, $name);
    }

    public function testUnsubscribeRemovesTopicFromConnection() {
        $name = 'Bye Bye Topic';

        $class  = new \ReflectionClass('Ratchet\Wamp\TopicManager');
        $method = $class->getMethod('getTopic');
        $method->setAccessible(true);

        $Topic = $method->invokeArgs($this->mngr, array($name));

        $this->mngr->onSubscribe($this->conn, $name);
        $this->mngr->onUnsubscribe($this->conn, $name);

        $this->assertFalse($this->conn->WAMP->subscriptions->contains($Topic));
    }

    public function testOnPublishBubbles() {
        $msg = 'Cover all the code!';

        $this->mock->expects($this->once())->method('onPublish')->with(
            $this->conn
          , $this->isInstanceOf('Ratchet\Wamp\Topic')
          , $msg
          , $this->isType('array')
          , $this->isType('array')
        );

        $this->mngr->onPublish($this->conn, 'Topic coverage', $msg, array(), array());
    }

    public function testOnCloseBubbles() {
        $this->mock->expects($this->once())->method('onClose')->with($this->conn);
        $this->mngr->onClose($this->conn);
    }

    protected function TopicProvider($name) {
        $class  = new \ReflectionClass('Ratchet\Wamp\TopicManager');
        $method = $class->getMethod('getTopic');
        $method->setAccessible(true);

        $attribute = $class->getProperty('TopicLookup');
        $attribute->setAccessible(true);

        $Topic = $method->invokeArgs($this->mngr, array($name));

        return array($Topic, $attribute);
    }

    public function testConnIsRemovedFromTopicOnClose() {
        $name = 'State Testing';
        list($Topic, $attribute) = $this->TopicProvider($name);

        $this->assertCount(1, $attribute->getValue($this->mngr));

        $this->mngr->onSubscribe($this->conn, $name);
        $this->mngr->onClose($this->conn);

        $this->assertFalse($Topic->has($this->conn));
    }

    public static function TopicConnExpectationProvider() {
        return [
            [ 'onClose', 0]
          , ['onUnsubscribe', 0]
        ];
    }

    /**
     * @dataProvider TopicConnExpectationProvider
     */
    public function testTopicRetentionFromLeavingConnections($methodCall, $expectation) {
        $TopicName = 'checkTopic';
        list($Topic, $attribute) = $this->TopicProvider($TopicName);

        $this->mngr->onSubscribe($this->conn, $TopicName);
        call_user_func_array(array($this->mngr, $methodCall), array($this->conn, $TopicName));

        $this->assertCount($expectation, $attribute->getValue($this->mngr));
    }

    public function testOnErrorBubbles() {
        $e = new \Exception('All work and no play makes Chris a dull boy');
        $this->mock->expects($this->once())->method('onError')->with($this->conn, $e);

        $this->mngr->onError($this->conn, $e);
    }

    public function testGetSubProtocolsReturnsArray() {
        $this->assertInternalType('array', $this->mngr->getSubProtocols());
    }

    public function testGetSubProtocolsBubbles() {
        $subs = array('hello', 'world');
        $app  = $this->getMock('Ratchet\Wamp\Stub\WsWampServerInterface');
        $app->expects($this->once())->method('getSubProtocols')->will($this->returnValue($subs));
        $mngr = new TopicManager($app);

        $this->assertEquals($subs, $mngr->getSubProtocols());
    }
}
