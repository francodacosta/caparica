<?php

use Caparica\Security\RequestValidator;
use Caparica\Crypto\RequestSigner;
use Caparica\Client\Provider\YamlClientProvider;
use Symfony\Component\Yaml\Yaml;

class RequestValidatorTest extends \PHPUnit_Framework_TestCase
{

    public function setUp()
    {
        $file = __DIR__ . '/../../fixtures/api-clients.yml';
        $yaml = new Symfony\Component\Yaml\Yaml;
        $class = 'Caparica\Client\BasicClient';

        $clientProvider = new YamlClientProvider($file, $yaml, $class);

        $requestSigner = '';

        $requestValidator = new RequestValidator($clientProvider, new RequestSigner);

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

        $timestamp = date('U');
        $params = array(
            'X-CAPARICA-DATE' => $timestamp,
            'a'               => 'bcd',
            'c'               => '123',
            'b'               => 'ewq',
        );

        $urlToSign = 'X-CAPARICA-DATE='. $timestamp .'&a=bcd&b=ewq&c=123';
        $requestSignature =  hash_hmac('sha256', $urlToSign, $password);

        $isValid = $object->validate($clientId, $requestSignature, $params);

        $this->assertTrue($isValid);
    }

    /**
     * @expectedException OutOfBoundsException
     */
    public function testValidSignature_INVALID_CLIENT()
    {
        $object =  $this->obj;

        // see fixtures/api-clients.yml for values
        $password = 'secret';
        $clientId = '123442342342';

        $params = array(
            'X-CAPARICA-DATE' =>'20130101092356',
            'a'               => 'bcd',
            'c'               => '123',
            'b'               => 'ewq',
        );

        $urlToSign = 'a=bcd&b=ewq&c=123&X-CAPARICA-DATE=20130101092356';
        $requestSignature =  hash_hmac('sha256', $urlToSign, $password);


        $isValid = $object->validate($clientId, $requestSignature, $params);

    }
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionCode 403
     */
    public function testValidSignature_INVALID_TIMESTAMP()
    {
        $object =  $this->obj;

        // see fixtures/api-clients.yml for values
        $password = 'secret';
        $clientId = '1234';

        $params = array(
            'X-CAPARICA-DATE' =>'20130101092356',
            'a'               => 'bcd',
            'c'               => '123',
            'b'               => 'ewq',
        );

        $urlToSign = 'a=bcd&b=ewq&c=123&X-CAPARICA-DATE=20130101092356';
        $requestSignature =  hash_hmac('sha256', $urlToSign, $password);


        $isValid = $object->validate($clientId, $requestSignature, $params);

    }
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionCode 400
     */
    public function testValidSignature_NO_TIMESTAMP()
    {
        $object =  $this->obj;

        // see fixtures/api-clients.yml for values
        $password = 'secret';
        $clientId = '1234';

        $params = array(
            'a'               => 'bcd',
            'c'               => '123',
            'b'               => 'ewq',
        );

        $urlToSign = 'a=bcd&b=ewq&c=123&X-CAPARICA-DATE=20130101092356';
        $requestSignature =  hash_hmac('sha256', $urlToSign, $password);


        $isValid = $object->validate($clientId, $requestSignature, $params);

    }
}
