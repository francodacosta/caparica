# Caparica Documentation
[table of contents](../../index.md)

## Signature Components


### Client ID
The Client ID is part of the request and it will identify the entity making the request. The Client ID can either be passed as part of the query string or as an HTTP header.
It has the following format
```
X-CAPARICA-CLIENT = ….
```


### Request method and path
To ensure a unique signature per request we take into account the request method and path, this is especially useful for REST apis, ensuring that different request methods have different signatures.

For example, a request to http://domain.tld/api/user will include the following parameters when computing the signature:

```
X-CAPARICA-METHOD = 'GET'
X-CAPARICA-PATH = '/api/user'
```

### Request timestamp
An optional timestamp parameter can be added to the request and it will be used to ensure the request will only be valid within a 15 minutes from the specified timestamp.
The timestamp should reflect the current time and specified as Seconds since the Unix Epoch (January 1 1970 00:00:00 GMT)

A request containing a timestamp would include the following, either as a query string or as an HTTP header:

```
X-CAPARICA-TIMESTAMP = 1411641775
```

### Request parameters
Normal request parameters, also referred to as “query string parameters”, will be included in the signature.
