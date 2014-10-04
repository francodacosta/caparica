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
 * common code for Client Providers
 */
abstract class AbstractClientProvider implements ClientProviderInterface
{

    /**
     * The client class name
     * @type string
     */
    protected $clientClassName = 'Caparica\Client\BasicClient';


    /**
     * Get the value of The client class name
     *
     * @return string
     */
    public function getClientClassName()
    {
        return $this->clientClassName;
    }

    /**
     * Set the value of The client class name
     *
     * @param string $value
     *
     * @return self
     */
    public function setClientClassName($value)
    {

        if (false === class_exists($value)) {
            throw new \UnexpectedValueException($value . ' class does not exists');
        }

        $class = new $value;

        if (false === $class instanceof ClientInterface ) {
            throw new \UnexpectedValueException($value . ' class does not implement ClientInterface');
        }

        $this->clientClassName = $value;

        return $this;
    }

}
