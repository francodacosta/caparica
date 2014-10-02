<?php
use Caparica\Client\Provider\ArrayClientProvider;
use Caparica\Client\ClientInterface;

class ArrayClientProviderTest extends \PHPUnit_Framework_TestCase
{

    public function setUp()
    {
        $config = ['test-code' => 'test-secret'];

        $provider = new ArrayClientProvider($config);

        $this->provider = $provider;
    }


    public function testByCode($code = 'test-code', $secret='test-secret')
    {
        $client = $this->provider->getByClientCode($code);

        $this->assertInstanceOf('Caparica\Client\ClientInterface', $client);
        $this->assertEquals($code, $client->getCode());
        $this->assertEquals($secret, $client->getSecret());
    }

    /**
     * @expectedException OutOfBoundsException
     */
    public function testByCode_notFound()
    {
        $client = $this->provider->getByClientCode(time());
    }

    public function testSetClassName()
    {
        $provider = $this->provider;
        $provider->setClientClassName('Caparica\Client\BasicClient');
        $this->assertEquals('Caparica\Client\BasicClient', $provider->getClientClassName());
    }

    /**
     * @expectedException UnexpectedValueException
     */
    public function testSetClassName_interfaceNotImplemented()
    {
        $provider = $this->provider;
        $provider->setClientClassName('Caparica\Client\Provider\ArrayClientProvider');
        $this->assertTrue(true);
    }
    /**
     * @expectedException UnexpectedValueException
     */
    public function testSetClassName_invalidClassName()
    {
        $provider = $this->provider;
        $provider->setClientClassName('sdfsdf');
        $this->assertTrue(true);
    }


    public function testAdd()
    {
        $this->provider->add('1' , '2');
        $this->testByCode('1','2');
    }

    public function testConstructorParams()
    {
        $config = ['test-code' => 'test-secret'];
        $class = 'Caparica\Client\BasicClient';

        $provider = new ArrayClientProvider($config, $class);
        $this->testByCode();
        $this->assertEquals($class, $provider->getClientClassName());
    }

}
