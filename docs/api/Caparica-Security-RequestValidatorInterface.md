Caparica\Security\RequestValidatorInterface
===============

Validates the request
make sure the request is signed and can be trusted




* Interface name: RequestValidatorInterface
* Namespace: Caparica\Security
* This is an **interface**






Methods
-------


### \Caparica\Security\RequestValidatorInterface::validate()

```
boolean Caparica\Security\RequestValidatorInterface::\Caparica\Security\RequestValidatorInterface::validate()(\Caparica\Client\ClientInterface $client, string $signatureToValidate, array $requestParameters, integer $version)
```

Validates an request.

this function makes sure the request signature matches the one we calculated

* Visibility: **public**

#### Arguments

* $client **[Caparica\Client\ClientInterface](Caparica-Client-ClientInterface.md)** - &lt;p&gt;the id of the api client&lt;/p&gt;
* $signatureToValidate **string** - &lt;p&gt;the request signature&lt;/p&gt;
* $requestParameters **array** - &lt;p&gt;parameters from the request (query string + headers)&lt;/p&gt;
* $version **integer** - &lt;p&gt;the signature version&lt;/p&gt;



### \Caparica\Security\RequestValidatorInterface::setTimestampKey()

```
\Caparica\Security\RequestValidatorInterface Caparica\Security\RequestValidatorInterface::\Caparica\Security\RequestValidatorInterface::setTimestampKey()(mixed $timestampKey)
```

Sets the value of timestampKey.



* Visibility: **public**

#### Arguments

* $timestampKey **mixed** - &lt;p&gt;the timestampKey&lt;/p&gt;


