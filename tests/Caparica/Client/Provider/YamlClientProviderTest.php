<?php
use Caparica\Client\Provider\YamlClientProvider;
use Symfony\Component\Yaml\Yaml;

class YamlClientProviderTest extends \PHPUnit_Framework_TestCase
{

    public function setUp()
    {
        $file = __DIR__ . '/../../../fixtures/api-clients.yml';
        $yaml = new Symfony\Component\Yaml\Yaml;
        $class = 'Caparica\Client\BasicClient';

        $provider = new YamlClientProvider($file, $yaml, $class );

        $this->provider = $provider;
    }


    public function testByCode()
    {
        $client = $this->provider->getByClientCode('1234');

        $this->assertInstanceOf('Caparica\Client\ClientInterface', $client);
        $this->assertEquals('1234', $client->getCode());
        $this->assertEquals('secret', $client->getSecret());
    }

    /**
     * @expectedException OutOfBoundsException
     */
    public function testByCode_notFound()
    {
        $client = $this->provider->getByClientCode(time());
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testByCode_INVALID_FILE()
    {
        $file = __DIR__ . 'dsfsdfdasfdasfdasfdasf';
        $yaml = new Symfony\Component\Yaml\Yaml;
        $class = 'Caparica\Client\BasicClient';

        $provider = new YamlClientProvider($file, $yaml, $class );
        $client = $provider->getByClientCode(time());
    }
}
