<?php

use Caparica\Security\RequestValidator;
use Caparica\Crypto\RequestSigner;
use Caparica\Client\BasicClient;

class RequestValidatorTest extends \PHPUnit_Framework_TestCase
{

    public function setUp()
    {

        $requestValidator = new RequestValidator(new RequestSigner);

        $this->obj = $requestValidator;
    }


    public function testGettersSetters()
    {
        $obj = $this->obj;

        $obj->setTimestampKey('foo');
        $this->assertEquals('foo', $obj->getTimestampKey());

        $obj->setTimestampTolerance(123);
        $this->assertEquals(123, $obj->getTimestampTolerance());


    }


    public function testValidSignature()
    {
        $object =  $this->obj;

        // see fixtures/api-clients.yml for values
        $password = 'secret';
        $clientId = '1234';

        $client = new BasicClient;
        $client->setCode($clientId);
        $client->setSecret($password);

        $timestamp = date('U');
        $params = array(
            'X-CAPARICA-DATE' => $timestamp,
            'a'               => 'bcd',
            'c'               => '123',
            'b'               => 'ewq',
        );

        $urlToSign = 'a=bcd&b=ewq&c=123&X-CAPARICA-DATE='. $timestamp;
        $requestSignature =  hash_hmac('sha256', $urlToSign, $password);

        $isValid = $object->validate($client, $requestSignature, $params);

        $this->assertTrue($isValid);
    }

    public function testInvalidSignature()
    {
        $object =  $this->obj;

        $password = 'secret';

        $client = new BasicClient;
        $client->setCode('1');
        $client->setSecret('2');

        $timestamp = date('U');

        $params = array(
            'X-CAPARICA-DATE' => $timestamp,
            'a'               => 'bcd',
            'c'               => '123',
            'b'               => 'ewq',
        );

        $urlToSign = 'a=bcd&b=ewq&c=123&X-CAPARICA-DATE=' . $timestamp;
        $requestSignature =  hash_hmac('sha256', $urlToSign, $password);


        $isValid = $object->validate($client, $requestSignature, $params);

        $this->assertFalse($isValid);
    }
    /**
     * @expectedException Caparica\Exception\OutOfSyncTimestampException
     */
    public function testValidSignature_INVALID_TIMESTAMP()
    {
        $object =  $this->obj;

        // see fixtures/api-clients.yml for values
        $password = 'secret';
        $clientId = '1234';
        $client = new BasicClient;
        $client->setCode($clientId);
        $client->setSecret($password);

        $params = array(
            'X-CAPARICA-DATE' =>'20130101092356',
            'a'               => 'bcd',
            'c'               => '123',
            'b'               => 'ewq',
        );

        $urlToSign = 'a=bcd&b=ewq&c=123&X-CAPARICA-DATE=20130101092356';
        $requestSignature =  hash_hmac('sha256', $urlToSign, $password);


        $isValid = $object->validate($client, $requestSignature, $params);

    }
    /**
     * @expectedException Caparica\Exception\MissingTimestampException
     */
    public function testValidSignature_NO_TIMESTAMP()
    {
        $object =  $this->obj;

        // see fixtures/api-clients.yml for values
        $password = 'secret';
        $clientId = '1234';
        $client = new BasicClient;
        $client->setCode($clientId);
        $client->setSecret($password);

        $params = array(
            'a'               => 'bcd',
            'c'               => '123',
            'b'               => 'ewq',
        );

        $urlToSign = 'a=bcd&b=ewq&c=123&X-CAPARICA-DATE=20130101092356';
        $requestSignature =  hash_hmac('sha256', $urlToSign, $password);


        $isValid = $object->validate($client, $requestSignature, $params);

    }


    /**
     * because we say we do not validate the TS so not having a timestamp should be ok
     */
    public function testValidSignature_NO_TIMESTAMP_DO_NOT_CHECK_TS_FLAG()
    {
        $object =  $this->obj;

        // see fixtures/api-clients.yml for values
        $password = 'secret';
        $clientId = '1234';
        $client = new BasicClient;
        $client->setCode($clientId);
        $client->setSecret($password);

        $params = array(
            'a'               => 'bcd',
            'c'               => '123',
            'b'               => 'ewq',
        );

        $urlToSign = 'a=bcd&b=ewq&c=123&X-CAPARICA-DATE=20130101092356';
        $requestSignature =  hash_hmac('sha256', $urlToSign, $password);

        $object->setValidateTimestamp(false);
        $isValid = $object->validate($client, $requestSignature, $params);

    }
}
