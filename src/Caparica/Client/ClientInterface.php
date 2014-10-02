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

namespace Caparica\Client;

/**
 * Minimum functionality an API client must implement
 */
interface ClientInterface
{
    /**
     * returns the API client code (AKA client id)
     *
     * @return string
     */
    public function getCode();

    /**
     * sets the API client code (AKA client id)
     *
     * @param string $code
     */
    public function setCode($code);

    /**
     * gets the client secret
     *
     * @return string
     */
    public function getSecret();

    /**
     * sets the client secret
     *
     * @param string $secret
     */
    public function setSecret($secret);

}
