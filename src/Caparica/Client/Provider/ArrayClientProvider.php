<?php
namespace Caparica\Client\Provider;

use Caparica\Client\ClientInterface;

/**
 * Simple client provider based on an aassociative array configuration
 */
class ArrayClientProvider  extends AbstractClientProvider implements ClientProviderInterface
{
    /**
     * @type array
     * @private
     */
    private $config = [];

    // /**
    //  * The client class name
    //  * @type string
    //  */
    // private $clientClassName = 'Caparica\Client\BasicClient';

    public function __construct (array $config = [], $clientClassName = null)
    {
        if (null !== $config) {
            $this->setConfig($config);
        }

        if (null !== $clientClassName) {
            $this->clientClassName = $clientClassName;
        }

        $this->setClientClassName($this->clientClassName);
    }

    /**
     * @{inheritdoc}
     */
    public function getByClientCode($code)
    {
        if (false === $this->hasClientCode($code)) {
            throw new \OutOfBoundsException('Client code not found');
        }

        $class= $this->getClientClassName();
        $config = $this->getConfig();
        $client = new $class ;
        $client->setCode($code);
        $client->setSecret($config[$code]);

        return $client;

    }

    /**
     * returns true if the client code is found
     * @param string $code
     *
     * @return boolean
     */
    public function hasClientCode($code)
    {
        return array_key_exists($code, $this->getConfig());
    }

    /**
     * Adds a client id / client secret combination
     * @param string $code
     * @param string $secret
     */
    public function add($code, $secret)
    {
        $this->config[$code] = $secret;
    }

    /**
     * Get the value of Config
     *
     * @return array
     */
    private function getConfig()
    {
        return $this->config;
    }

    /**
     * Set the value of Config
     *
     * @param array config
     *
     * @return self
     */
    private function setConfig(array $value)
    {
        $this->config = $value;

        return $this;
    }


    // /**
    //  * Get the value of The client class name
    //  *
    //  * @return string
    //  */
    // public function getClientClassName()
    // {
    //     return $this->clientClassName;
    // }
    //
    // /**
    //  * Set the value of The client class name
    //  *
    //  * @param string className
    //  *
    //  * @return self
    //  */
    // public function setClientClassName($value)
    // {
    //
    //     if (false === class_exists($value)) {
    //         throw new \UnexpectedValueException($value . ' class does not exists');
    //     }
    //
    //     $class = new $value;
    //
    //     if (false === $class instanceof ClientInterface ) {
    //         throw new \UnexpectedValueException($value . ' class does not implement ClientInterface');
    //     }
    //
    //     $this->clientClassName = $value;
    //
    //     return $this;
    // }

}
