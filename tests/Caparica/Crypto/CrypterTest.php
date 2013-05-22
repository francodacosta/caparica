<?php

use Caparica\Crypto\Crypter;

class CrypterTest extends \PHPUnit_Framework_TestCase
{
    public function testEncryptDecrypt()
    {
        $cripter = new Crypter;

        $password = "12345678901234567890";
        $data = "foo bar 123";

        $encrypted = $cripter->encrypt($data, $password);
        $decrypted= $cripter->decrypt($encrypted, $password);

        $this->assertEquals($data, $decrypted);
    }
}
