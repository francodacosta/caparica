# Caparica Documentation
[table of contents](../index.md)

## Components
Caparica has 3 main components

  * [Caparica Client]((../api/Caparica-Client-BasicClient.md)
  * [Request Signer](../api/Caparica-Crypto-RequestSigner.md)
  * [Request Validator](../api/Caparica-Security-RequestValidator.md)

### Caparica Client
The client is an object that represents the client making the request, it holds the ```client code``` and the ```client secret```.
The code is usaly passed as a parameter in the url, based on the client code the servel will know what secret to use when validating the request.

You may want to use the ```ClientProvider``` those will help you to fetch client information from a data source

__CLIENT PROVIDERS___
currently caparica supports the following client providers
* [Array Provider](../api/Caparica-Client-Provider-ArrayClientProvider.md)
* [Yaml Provider](../api/Caparica-Client-Provider-YamlClientProvider.md)
* [Doctrine Provider](../api/Caparica-Client-Provider-DoctrineClientProvider.md)

### Request Signer
This is the component that will sign the request, is accepts an associative array with the parameter/value combinations

### Request Validator
Only used in the server, it will match the signature in the request with one computed internally, if they match the request is authentic
