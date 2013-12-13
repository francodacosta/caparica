<?php

namespace Caparica\Security;

use Caparica\Client\Provider\ClientProviderInterface;
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
     * @param  string  $clientId          the id of the api client
     * @param  string  $signature         the request signature
     * @param  array   $requestParameters parameters from the request (query string + headers)
     * @param  integer $version           the signature version
     *
     * @return boolean
     */
    public function validate($clientId, $signature, $requestParameters, $version = 1);

    /**
     * Sets the value of timestampKey.
     *
     * @param mixed $timestampKey the timestampKey
     *
     * @return self
     */
    public function setTimestampKey($timestampKey);

}
