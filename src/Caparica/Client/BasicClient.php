<?php

namespace Caparica\Client;

/**
 * Basic Client.
 * This is the most basic Caparica Client
 */
class BasicClient implements ClientInterface
{

    /**
     * @var string
     */
    private $secret;

    /**
     * @var string
     */
    private $code;

    /**
     * {@inheritdoc}
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
     * {@inheritdoc}
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
