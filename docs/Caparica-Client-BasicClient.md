Caparica\Client\BasicClient
===============

Basic Client.

This is the most basic Caparica Client


* Class name: BasicClient
* Namespace: Caparica\Client
* This class implements: [Caparica\Client\ClientInterface](Caparica-Client-ClientInterface.md)




Properties
----------


### $secret

```
private string $secret
```

the client secret / password



* Visibility: **private**


### $code

```
private string $code
```

the client code / id



* Visibility: **private**


Methods
-------


### \Caparica\Client\BasicClient::setSecret()

```
mixed Caparica\Client\BasicClient::\Caparica\Client\BasicClient::setSecret()(string $secret)
```

sets the client secret



* Visibility: **public**

#### Arguments

* $secret **string**



### \Caparica\Client\BasicClient::getSecret()

```
mixed Caparica\Client\BasicClient::\Caparica\Client\BasicClient::getSecret()()
```

gets the client secret



* Visibility: **public**



### \Caparica\Client\BasicClient::setCode()

```
mixed Caparica\Client\BasicClient::\Caparica\Client\BasicClient::setCode()(string $code)
```

sets the API client code (AKA client id)



* Visibility: **public**

#### Arguments

* $code **string**



### \Caparica\Client\BasicClient::getCode()

```
mixed Caparica\Client\BasicClient::\Caparica\Client\BasicClient::getCode()()
```

returns the API client code (AKA client id)



* Visibility: **public**



### \Caparica\Client\ClientInterface::getCode()

```
string Caparica\Client\ClientInterface::\Caparica\Client\ClientInterface::getCode()()
```

returns the API client code (AKA client id)



* Visibility: **public**
* This method is defined by [Caparica\Client\ClientInterface](Caparica-Client-ClientInterface.md)



### \Caparica\Client\ClientInterface::setCode()

```
mixed Caparica\Client\ClientInterface::\Caparica\Client\ClientInterface::setCode()(string $code)
```

sets the API client code (AKA client id)



* Visibility: **public**
* This method is defined by [Caparica\Client\ClientInterface](Caparica-Client-ClientInterface.md)

#### Arguments

* $code **string**



### \Caparica\Client\ClientInterface::getSecret()

```
string Caparica\Client\ClientInterface::\Caparica\Client\ClientInterface::getSecret()()
```

gets the client secret



* Visibility: **public**
* This method is defined by [Caparica\Client\ClientInterface](Caparica-Client-ClientInterface.md)



### \Caparica\Client\ClientInterface::setSecret()

```
mixed Caparica\Client\ClientInterface::\Caparica\Client\ClientInterface::setSecret()(string $secret)
```

sets the client secret



* Visibility: **public**
* This method is defined by [Caparica\Client\ClientInterface](Caparica-Client-ClientInterface.md)

#### Arguments

* $secret **string**


