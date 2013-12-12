<?php
use Caparica\Client\BasicClient;

class BasicClientTest extends \PHPUnit_Framework_TestCase
{

    public function setUp()
    {

    }


    public function testClient()
    {
        $client = new BasicClient;

        $client->setCode('1234');
        $client->setSecret('secret');
        $client->setName('client_name');

        $this->assertInstanceOf('Caparica\Client\ClientInterface', $client);
        $this->assertEquals('1234', $client->getCode());
        $this->assertEquals('client_name', $client->getName());
        $this->assertEquals('secret', $client->getSecret());
    }

}
