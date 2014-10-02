<?php

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
