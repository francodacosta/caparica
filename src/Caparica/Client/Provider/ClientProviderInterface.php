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
 * Minimum functionality that an API client provider must implement
 */
interface ClientProviderInterface
{
    /**
     * Returns a client by looking up its code
     *
     * @param string $code the client code
     *
     * @return ClientInterface
     */
    public function getByClientCode($code);

    /**
     * sets the Fully Qualifiyed Class Name of the class to return
     * The returned class should implement the ClientInterface
     *
     * @param string $clientClassName
     */
    public function setClientClassName($clientClassName);

    /**
     * gets the Fully Qualifiyed Class Name of the class to return
     *
     * @param string
     */
    public function getClientClassName();
}
