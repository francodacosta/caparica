<?php

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
