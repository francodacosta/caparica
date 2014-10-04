<?php
/**
 * Caparica
 *
 * Signed requests
 *
 * @author    Nuno Franco da Costa <nuno@francodacosta.com>
 * @copyright 2013-2014 Nuno Franco da Costa
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 * @link      https://github.com/francodacosta/caparica
 */

namespace Caparica\Client\Provider;

use Caparica\Client\ClientInterface;

/**
 * Simple client provider based on an aassociative array configuration
 */
class ArrayClientProvider  extends AbstractClientProvider implements ClientProviderInterface
{
    /**
     * holds the code => secret pairs registred with this provider
     * @type array
     * @private
     */
    private $config = [];

    /**
     * initiates the class
     *
     * @param  array  $config          an optional associative array of codes => secret to populate the provider
     * @param  string $clientClassName the FQCN for the client clas
     */
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
     * Returns a client by looking up its code
     *
     * @param string $code the client code
     *
     * @return ClientInterface
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
     * @param array $value
     *
     * @return self
     */
    private function setConfig(array $value)
    {
        $this->config = $value;

        return $this;
    }

}
