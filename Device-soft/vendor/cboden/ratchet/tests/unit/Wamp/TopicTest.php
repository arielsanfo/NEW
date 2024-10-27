<?php
namespace Ratchet\Wamp;

/**
 * @covers Ratchet\Wamp\Topic
 */
class TopicTest extends \PHPUnit_Framework_TestCase {
    public function testGetId() {
        $id    = uniqid();
        $Topic = new Topic($id);

        $this->assertEquals($id, $Topic->getId());
    }

    public function testAddAndCount() {
        $Topic = new Topic('merp');

        $Topic->add($this->newConn());
        $Topic->add($this->newConn());
        $Topic->add($this->newConn());

        $this->assertEquals(3, count($Topic));
    }

    public function testRemove() {
        $Topic   = new Topic('boop');
        $tracked = $this->newConn();

        $Topic->add($this->newConn());
        $Topic->add($tracked);
        $Topic->add($this->newConn());

        $Topic->remove($tracked);

        $this->assertEquals(2, count($Topic));
    }

    public function testBroadcast() {
        $msg  = 'Hello World!';
        $name = 'Batman';
        $protocol = json_encode(array(8, $name, $msg));

        $first  = $this->getMock('Ratchet\\Wamp\\WampConnection', array('send'), array($this->getMock('\\Ratchet\\ConnectionInterface')));
        $second = $this->getMock('Ratchet\\Wamp\\WampConnection', array('send'), array($this->getMock('\\Ratchet\\ConnectionInterface')));

        $first->expects($this->once())
              ->method('send')
              ->with($this->equalTo($protocol));

        $second->expects($this->once())
              ->method('send')
              ->with($this->equalTo($protocol));

        $Topic = new Topic($name);
        $Topic->add($first);
        $Topic->add($second);

        $Topic->broadcast($msg);
    }

    public function testBroadcastWithExclude() {
        $msg  = 'Hello odd numbers';
        $name = 'Excluding';
        $protocol = json_encode(array(8, $name, $msg));

        $first  = $this->getMock('Ratchet\\Wamp\\WampConnection', array('send'), array($this->getMock('\\Ratchet\\ConnectionInterface')));
        $second = $this->getMock('Ratchet\\Wamp\\WampConnection', array('send'), array($this->getMock('\\Ratchet\\ConnectionInterface')));
        $third  = $this->getMock('Ratchet\\Wamp\\WampConnection', array('send'), array($this->getMock('\\Ratchet\\ConnectionInterface')));

        $first->expects($this->once())
            ->method('send')
            ->with($this->equalTo($protocol));

        $second->expects($this->never())->method('send');

        $third->expects($this->once())
            ->method('send')
            ->with($this->equalTo($protocol));

        $Topic = new Topic($name);
        $Topic->add($first);
        $Topic->add($second);
        $Topic->add($third);

        $Topic->broadcast($msg, array($second->WAMP->sessionId));
    }

    public function testBroadcastWithEligible() {
        $msg  = 'Hello white list';
        $name = 'Eligible';
        $protocol = json_encode(array(8, $name, $msg));

        $first  = $this->getMock('Ratchet\\Wamp\\WampConnection', array('send'), array($this->getMock('\\Ratchet\\ConnectionInterface')));
        $second = $this->getMock('Ratchet\\Wamp\\WampConnection', array('send'), array($this->getMock('\\Ratchet\\ConnectionInterface')));
        $third  = $this->getMock('Ratchet\\Wamp\\WampConnection', array('send'), array($this->getMock('\\Ratchet\\ConnectionInterface')));

        $first->expects($this->once())
            ->method('send')
            ->with($this->equalTo($protocol));

        $second->expects($this->never())->method('send');

        $third->expects($this->once())
            ->method('send')
            ->with($this->equalTo($protocol));

        $Topic = new Topic($name);
        $Topic->add($first);
        $Topic->add($second);
        $Topic->add($third);

        $Topic->broadcast($msg, array(), array($first->WAMP->sessionId, $third->WAMP->sessionId));
    }

    public function testIterator() {
        $first  = $this->newConn();
        $second = $this->newConn();
        $third  = $this->newConn();

        $Topic  = new Topic('Joker');
        $Topic->add($first)->add($second)->add($third);

        $check = array($first, $second, $third);

        foreach ($Topic as $mock) {
            $this->assertNotSame(false, array_search($mock, $check));
        }
    }

    public function testToString() {
        $name  = 'Bane';
        $Topic = new Topic($name);

        $this->assertEquals($name, (string)$Topic);
    }

    public function testDoesHave() {
        $conn  = $this->newConn();
        $Topic = new Topic('Two Face');
        $Topic->add($conn);

        $this->assertTrue($Topic->has($conn));
    }

    public function testDoesNotHave() {
        $conn  = $this->newConn();
        $Topic = new Topic('Alfred');

        $this->assertFalse($Topic->has($conn));
    }

    public function testDoesNotHaveAfterRemove() {
        $conn  = $this->newConn();
        $Topic = new Topic('Ras');

        $Topic->add($conn)->remove($conn);

        $this->assertFalse($Topic->has($conn));
    }

    protected function newConn() {
        return new WampConnection($this->getMock('\\Ratchet\\ConnectionInterface'));
    }
}
