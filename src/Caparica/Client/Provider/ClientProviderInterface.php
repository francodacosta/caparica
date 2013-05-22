<?php
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
    public function byCode($code);
}
