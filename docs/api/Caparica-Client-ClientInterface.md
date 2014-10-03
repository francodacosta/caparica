Caparica\Client\ClientInterface
===============

Minimum functionality an API client must implement




* Interface name: ClientInterface
* Namespace: Caparica\Client
* This is an **interface**






Methods
-------


### \Caparica\Client\ClientInterface::getCode()

```
string Caparica\Client\ClientInterface::\Caparica\Client\ClientInterface::getCode()()
```

returns the API client code (AKA client id)



* Visibility: **public**



### \Caparica\Client\ClientInterface::setCode()

```
mixed Caparica\Client\ClientInterface::\Caparica\Client\ClientInterface::setCode()(string $code)
```

sets the API client code (AKA client id)



* Visibility: **public**

#### Arguments

* $code **string**



### \Caparica\Client\ClientInterface::getSecret()

```
string Caparica\Client\ClientInterface::\Caparica\Client\ClientInterface::getSecret()()
```

gets the client secret



* Visibility: **public**



### \Caparica\Client\ClientInterface::setSecret()

```
mixed Caparica\Client\ClientInterface::\Caparica\Client\ClientInterface::setSecret()(string $secret)
```

sets the client secret



* Visibility: **public**

#### Arguments

* $secret **string**


