<?php

namespace Caparica\Security;

use Caparica\Client\ClientInterface;
use Caparica\Crypto\SignerInterface;
use Caparica\Exception\MissingTimestampException;
use Caparica\Exception\OutOfSyncTimestampException;
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
    private $validateTimeStamp = true;
    /**
     * The request Signer
     * @var SignerInterface
     */
    private $requestSigner;

    public function __construct(SignerInterface $requestSigner)
    {
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

        error_log($timestamp . ' lb:' . $lowerBound . ' ub: '. $upperBound);
        return  $timestamp > $lowerBound &&  $timestamp < $upperBound;
    }

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
    public function validate(ClientInterface $client, $signatureToValidate, $requestParameters, $version = 1)
    {

        $requestSigner = $this->getRequestSigner();
        $timestampKey  = $this->getTimestampKey();

        if ($this->getValidateTimeStamp()) {
            if (false === isset($requestParameters[$timestampKey])) {
                $msg = "No timestamp found in request, please set " . $timestampKey;
                error_log('[CAPARICA] ' . $msg);
                throw new MissingTimestampException($msg, 400);
            }

            if (false === $this->validateTimestamp($requestParameters[$timestampKey])) {
                $msg = 'Your system clock is not synced, time difference too big';
                error_log('[CAPARICA] ' . $msg);
                throw new OutOfSyncTimestampException($msg, 400);
            }
        }

        $signedRequest = $requestSigner->sign($requestParameters, $client->getSecret());

        return $signatureToValidate === $signedRequest;
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

    /**
     * Gets the value of validateTimeStamp.
     *
     * @return mixed
     */
    public function getValidateTimeStamp()
    {
        return $this->validateTimeStamp;
    }

    /**
     * Sets the value of validateTimeStamp.
     *
     * @param mixed $validateTimeStamp the validate time stamp
     *
     * @return self
     */
    public function setValidateTimeStamp($validateTimeStamp)
    {
        $this->validateTimeStamp = $validateTimeStamp;

        return $this;
    }
}
