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
 * Basic Client.
 * This is the most basic Caparica Client
 */
class BasicClient implements ClientInterface
{

    /**
     * the client secret / password
     * @var string
     */
    private $secret;

    /**
     * the client code / id
     * @var string
     */
    private $code;

    /**
     * sets the client secret
     *
     * @param string $secret
  */
    public function setSecret($secret)
    {
        $this->secret = $secret;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getSecret()
    {
        return $this->secret;
    }

    /**
     * sets the API client code (AKA client id)
     *
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getCode()
    {
        return $this->code;
    }
}
