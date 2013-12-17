# Caparica

Php library to validate and create signed requests

[![Build Status](https://travis-ci.org/francodacosta/caparica.png?branch=master)](https://travis-ci.org/francodacosta/caparica)

> this is a low level library, you might want to check
>   * [Caparica Bundle](https://github.com/francodacosta/caparica-bundle) a symfony2 bundle
>   * [Caparica Guzzle](https://github.com/francodacosta/caparica-guzzle) a Guzzle plugin to automaticaly sign requests for you


## Installation


### Via Composer

the easiest way is to install it via composer

```composer.phar require francodacosta/caparica```

## How does it work ?
Signing a request is a way for a client to identify itself, much the same way when you sign a cheque.

The client and the server both know a secret code, that code is used by the client to create a signature and the server uses that code to verify the request. The secret code itself is never sent and is the only thing that must be kept secret.

The request is signed this way:
  1. sort all parameters sent in the request
  2. produce a string in the form of ```param-1=value-1&...&param-N=value-N```
  3. create the signature by hasing the string using the secret code
  4. make the request to the server and pass the hash signature
  
The server will repeat the process and compare the signatures.

To avoid replay atacks you should include the current timestamp in the signature, Caparica can handle that for you

## Caparica Components
Caparica has 3 main components

  * Caparica Client
  * Request Signer
  * Request Validator

### Caparica Client
The client is an object that represents the client making the request, it holds the ```client code``` and the ```client secret```.
The code is usaly passed as a parameter in the url, based on the client code the servel will know what secret to use when validating the request.

You may want to use the ```ClientProvider``` those will help you to fetch client information from a data source

### Request Signer
This is the component that will sign the request, is accepts an ssociative array with the parameter/value combinations

### Request Validator
Only used in the server, it will match the signature in the request with one computed internaly, if they match the request is authentic

## Sign a request

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

### Validate a request
```php
$file ='api-clients.yml';
$yaml = new Symfony\Component\Yaml\Yaml;
$returnClassName = 'Caparica\Client\BasicClient';

// this client provider will fetch client information from an YAML file
// the return object will be of type $returnClassName
$clientProvider = new YamlClientProvider($file, $yaml, $returnClassName);

$requestValidator = new RequestValidator($clientProvider, new RequestSigner);

// this values come from the request the client made
// use whatever methods your framework has to access http requests
$requestParams = array(
   'X-CAPARICA-DATE' => "12345676743",
    'a'               => 'bcd',
    'c'               => '123',
    'b'               => 'ewq',
);

$requestSignature = '0c6513e432bb25d8be659a99ca240a64f60dee875e04d557341a677bfe08a1bf';
$clientId = 'client-id';
  
// or
// $requestParams = $_GET;
// unset($requestParams['signature']);
// $requestSignature = $_GET['signature'];;
// $clientId = $?GET['client-code'];

$isValid = $object->validate($clientId, $requestSignature, $params);

        
```
