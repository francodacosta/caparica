
[![Build Status](https://travis-ci.org/francodacosta/caparica.png?branch=master)](https://travis-ci.org/francodacosta/caparica)
# Caparica

Php library to validate and create signed requests



> this is a low level library, you might want to check
>   * [Caparica Bundle](https://github.com/francodacosta/caparica-bundle) a symfony2 bundle
>   * [Caparica Guzzle](https://github.com/francodacosta/caparica-guzzle-plugin) a Guzzle plugin to automatically sign requests for you

## Installation

```
composer.phar require francodacosta/caparica
```

### Documentation
>  Please be sure to read the documentation, make sure you understand the client and server parts of Caparica.
>
>  The latest documentation can be found on the [docs folder](docs/index.md)


## Sign a request _(client side)_

```php
use Caparica\Crypto\RequestSigner;

$signer = new RequestSigner();
$password = "12345678901234567890";
$params = array (
    'a' => 'bcd',
    'c' => '123',
    'b' => 'ewq',
    'X-CAPARICA-TIMESTAMP' => date('U')
);

$signature = $signer->sign($params, $password);

```

### Validate a request _(server side)_
```php
$client = new BasicClient;

$requestValidator = new RequestValidator(new RequestSigner);

// this values come from the request the client made
// use whatever methods your framework has to access http requests
$requestParams = array(
   'X-CAPARICA-DATE' => "12345676743",
    'a'               => 'bcd',
    'c'               => '123',
    'b'               => 'ewq',
);

// the signature comes from the request, we will use it to compare with the server
// generated one, if they match we know the request is valid
$requestSignature = '0c6513e432bb25d8be659a99ca240a64f60dee875e04d557341a677bfe08a1bf';


$isValid = $object->validate($client, $requestSignature, $params);


```
