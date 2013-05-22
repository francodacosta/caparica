<?php
namespace Caparica\Crypto;

interface CrypterInterface
{
    public function encrypt($data, $password);

    public function decrypt($data, $password);
}
