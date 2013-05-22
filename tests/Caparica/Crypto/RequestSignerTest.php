<?php

use Caparica\Crypto\RequestSigner;

class RequestSignerTest extends \PHPUnit_Framework_TestCase
{
    public function testSign()
    {
        $signer = new RequestSigner();
        $password = "12345678901234567890";
        $params = array (
            'a' => 'bcd',
            'c' => '123',
            'b' => 'ewq',
        );

        $stringToSign = 'a=bcd&b=ewq&c=123';

        $token = $signer->sign($params, $password);

        $this->assertEquals($token, hash_hmac('sha256', $stringToSign, $password));
    }
}
