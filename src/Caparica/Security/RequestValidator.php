<?php

namespace Caparica\Security;

use Caparica\Client\Provider\ClientProviderInterface;
use Caparica\Crypto\SignerInterface;

/**
 * Validates the request
 * make sure the request is signed and can be trusted
 */
class RequestValidator implements RequestValidatorInterface
{
    /**
     * the api client provider
     * @var ClientProviderInterface
     */
    private $clientProvider;

    private $timestampKey = 'X-CAPARICA-DATE';
    private $timestampTolerance = 600;
    /**
     * The request Signer
     * @var SignerInterface
     */
    private $requestSigner;

    public function __construct(ClientProviderInterface $clientProvider, SignerInterface $requestSigner)
    {
        $this->setClientProvider($clientProvider);
        $this->setRequestSigner($requestSigner);
    }


    /**
     * Validates a timestamp
     *
     * @param  [type] $timestamp [description]
     * @return [type]            [description]
     */
    private function validateTimestamp($timestamp)
    {
        $tolerance = $this->getTimestampTolerance();
        $currentTimestamp = date('U');

        $lowerBound = $currentTimestamp - $tolerance;
        $upperBound = $currentTimestamp + $tolerance;

        return  $timestamp > $lowerBound &&  $timestamp < $upperBound;
    }

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
    public function validate($clientId, $signature, $requestParameters, $version = 1)
    {

        $clientProvider = $this->getClientProvider();
        $requestSigner = $this->getRequestSigner();
        $timestampKey = $this->getTimestampKey();

        $client = $clientProvider->byCode($clientId);


        if (false === isset($requestParameters[$timestampKey])) {
            throw new \InvalidArgumentException("No timestamp found in request, please set " . $timestampKey, 400);
        }

        if (false === $this->validateTimestamp($requestParameters[$timestampKey])) {
            throw new \InvalidArgumentException('Your system clock is not synced, time difference too big', 403);
        }

        $signedRequest = $requestSigner->sign($requestParameters, $client->getSecret());

        return $signature === $signedRequest;
    }

    /**
     * Gets the the api client provider.
     *
     * @return ClientProviderInterface
     */
    private function getClientProvider()
    {
        return $this->clientProvider;
    }

    /**
     * Sets the the api client provider.
     *
     * @param ClientProviderInterface $clientProvider the clientProvider
     *
     * @return self
     */
    private function setClientProvider(ClientProviderInterface $clientProvider)
    {
        $this->clientProvider = $clientProvider;

        return $this;
    }

    /**
     * Gets the The request Signer.
     *
     * @return SignerInterface
     */
    private function getRequestSigner()
    {
        return $this->requestSigner;
    }

    /**
     * Sets the The request Signer.
     *
     * @param SignerInterface $requestSigner the requestSigner
     *
     * @return self
     */
    private function setRequestSigner(SignerInterface $requestSigner)
    {
        $this->requestSigner = $requestSigner;

        return $this;
    }

    /**
     * Gets the value of timestampKey.
     *
     * @return mixed
     */
    public function getTimestampKey()
    {
        return $this->timestampKey;
    }

    /**
     * Sets the value of timestampKey.
     *
     * @param mixed $timestampKey the timestampKey
     *
     * @return self
     */
    public function setTimestampKey($timestampKey)
    {
        $this->timestampKey = $timestampKey;

        return $this;
    }

    /**
     * Gets the value of timestampTolerance.
     *
     * @return mixed
     */
    public function getTimestampTolerance()
    {
        return $this->timestampTolerance;
    }

    /**
     * Sets the value of timestampTolerance.
     *
     * @param mixed $timestampTolerance the timestampTolerance
     *
     * @return self
     */
    public function setTimestampTolerance($timestampTolerance)
    {
        $this->timestampTolerance = $timestampTolerance;

        return $this;
    }
}
