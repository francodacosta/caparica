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

namespace Caparica\Crypto;

/**
 * Minimal functionality that request signers should implement
 */
interface SignerInterface
{

    /**
     * signs a request
     *
     * @param  array $params   associative array with parameters used to sign the request
     * @param  string $password the password
     *
     * @return string
     */
    public function sign(array $params, $password);
}
