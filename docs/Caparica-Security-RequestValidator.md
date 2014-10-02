Caparica\Security\RequestValidator
===============

Validates the request
make sure the request is signed and can be trusted




* Class name: RequestValidator
* Namespace: Caparica\Security
* This class implements: [Caparica\Security\RequestValidatorInterface](Caparica-Security-RequestValidatorInterface.md)




Properties
----------


### $clientProvider

```
private \Caparica\Security\ClientProviderInterface $clientProvider
```

the api client provider



* Visibility: **private**


### $timestampKey

```
private mixed $timestampKey = 'X-CAPARICA-DATE'
```

the key from the paramter array that identifies the timestamp



* Visibility: **private**


### $timestampTolerance

```
private mixed $timestampTolerance = 600
```

the ammount of seconds the timestamp can be out of sync with the server



* Visibility: **private**


### $validateTimeStamp

```
private mixed $validateTimeStamp = true
```

should we validate the timestamp



* Visibility: **private**


### $requestSigner

```
private \Caparica\Crypto\SignerInterface $requestSigner
```

The request Signer



* Visibility: **private**


Methods
-------


### \Caparica\Security\RequestValidator::__construct()

```
mixed Caparica\Security\RequestValidator::\Caparica\Security\RequestValidator::__construct()(\Caparica\Crypto\SignerInterface $requestSigner)
```

initiates the class.



* Visibility: **public**

#### Arguments

* $requestSigner **[Caparica\Crypto\SignerInterface](Caparica-Crypto-SignerInterface.md)**



### \Caparica\Security\RequestValidator::validateTimestamp()

```
\Caparica\Security\[type] Caparica\Security\RequestValidator::\Caparica\Security\RequestValidator::validateTimestamp()(\Caparica\Security\[type] $timestamp)
```

Validates a timestamp



* Visibility: **private**

#### Arguments

* $timestamp **Caparica\Security\[type]** - &lt;p&gt;[description]&lt;/p&gt;



### \Caparica\Security\RequestValidator::validate()

```
boolean Caparica\Security\RequestValidator::\Caparica\Security\RequestValidator::validate()(\Caparica\Client\ClientInterface $client, string $signatureToValidate, array $requestParameters, integer $version)
```

Validates an request.

this function makes sure the request signature matches the one we calculated

* Visibility: **public**

#### Arguments

* $client **[Caparica\Client\ClientInterface](Caparica-Client-ClientInterface.md)** - &lt;p&gt;the id of the api client&lt;/p&gt;
* $signatureToValidate **string** - &lt;p&gt;the request signature&lt;/p&gt;
* $requestParameters **array** - &lt;p&gt;parameters from the request (query string + headers)&lt;/p&gt;
* $version **integer** - &lt;p&gt;the signature version&lt;/p&gt;



### \Caparica\Security\RequestValidator::getRequestSigner()

```
\Caparica\Crypto\SignerInterface Caparica\Security\RequestValidator::\Caparica\Security\RequestValidator::getRequestSigner()()
```

Gets the The request Signer.



* Visibility: **private**



### \Caparica\Security\RequestValidator::setRequestSigner()

```
\Caparica\Security\RequestValidator Caparica\Security\RequestValidator::\Caparica\Security\RequestValidator::setRequestSigner()(\Caparica\Crypto\SignerInterface $requestSigner)
```

Sets the The request Signer.



* Visibility: **private**

#### Arguments

* $requestSigner **[Caparica\Crypto\SignerInterface](Caparica-Crypto-SignerInterface.md)** - &lt;p&gt;the requestSigner&lt;/p&gt;



### \Caparica\Security\RequestValidator::getTimestampKey()

```
mixed Caparica\Security\RequestValidator::\Caparica\Security\RequestValidator::getTimestampKey()()
```

Gets the value of timestampKey.



* Visibility: **public**



### \Caparica\Security\RequestValidator::setTimestampKey()

```
\Caparica\Security\RequestValidator Caparica\Security\RequestValidator::\Caparica\Security\RequestValidator::setTimestampKey()(mixed $timestampKey)
```

Sets the value of timestampKey.



* Visibility: **public**

#### Arguments

* $timestampKey **mixed** - &lt;p&gt;the timestampKey&lt;/p&gt;



### \Caparica\Security\RequestValidator::getTimestampTolerance()

```
mixed Caparica\Security\RequestValidator::\Caparica\Security\RequestValidator::getTimestampTolerance()()
```

Gets the value of timestampTolerance.



* Visibility: **public**



### \Caparica\Security\RequestValidator::setTimestampTolerance()

```
\Caparica\Security\RequestValidator Caparica\Security\RequestValidator::\Caparica\Security\RequestValidator::setTimestampTolerance()(mixed $timestampTolerance)
```

Sets the value of timestampTolerance.



* Visibility: **public**

#### Arguments

* $timestampTolerance **mixed** - &lt;p&gt;the timestampTolerance&lt;/p&gt;



### \Caparica\Security\RequestValidator::getValidateTimeStamp()

```
mixed Caparica\Security\RequestValidator::\Caparica\Security\RequestValidator::getValidateTimeStamp()()
```

Gets the value of validateTimeStamp.



* Visibility: **public**



### \Caparica\Security\RequestValidator::setValidateTimeStamp()

```
\Caparica\Security\RequestValidator Caparica\Security\RequestValidator::\Caparica\Security\RequestValidator::setValidateTimeStamp()(mixed $validateTimeStamp)
```

Sets the value of validateTimeStamp.



* Visibility: **public**

#### Arguments

* $validateTimeStamp **mixed** - &lt;p&gt;the validate time stamp&lt;/p&gt;



### \Caparica\Security\RequestValidatorInterface::validate()

```
boolean Caparica\Security\RequestValidatorInterface::\Caparica\Security\RequestValidatorInterface::validate()(\Caparica\Client\ClientInterface $client, string $signatureToValidate, array $requestParameters, integer $version)
```

Validates an request.

this function makes sure the request signature matches the one we calculated

* Visibility: **public**
* This method is defined by [Caparica\Security\RequestValidatorInterface](Caparica-Security-RequestValidatorInterface.md)

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
* This method is defined by [Caparica\Security\RequestValidatorInterface](Caparica-Security-RequestValidatorInterface.md)

#### Arguments

* $timestampKey **mixed** - &lt;p&gt;the timestampKey&lt;/p&gt;


