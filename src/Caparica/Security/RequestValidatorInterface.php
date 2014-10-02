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

namespace Caparica\Security;

use Caparica\Client\ClientInterface;
use Caparica\Crypto\SignerInterface;

/**
 * Validates the request
 * make sure the request is signed and can be trusted
 */
Interface RequestValidatorInterface
{


    /**
     * Validates an request.
     * this function makes sure the request signature matches the one we calculated
     *
     * @param  ClientInterface  $client              the id of the api client
     * @param  string           $signatureToValidate the request signature
     * @param  array            $requestParameters   parameters from the request (query string + headers)
     * @param  integer          $version             the signature version
     *
     * @return boolean
     */
    public function validate(ClientInterface $client, $signatureToValidate, $requestParameters, $version = 1);

    /**
     * Sets the value of timestampKey.
     *
     * @param mixed $timestampKey the timestampKey
     *
     * @return self
     */
    public function setTimestampKey($timestampKey);

}
