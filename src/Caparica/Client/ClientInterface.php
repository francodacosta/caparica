<?php

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
     * @return string
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
     * @return string
     */
    public function setSecret($secret);

    /**
     * gets the client name
     *
     * @return string
     */
    public function getName();

    /**
     * sets the client name
     *
     * @param string $name
     */
    public function setName($name);
}