Caparica\Crypto\RequestSigner
===============

handles the signature generations




* Class name: RequestSigner
* Namespace: Caparica\Crypto
* This class implements: [Caparica\Crypto\SignerInterface](Caparica-Crypto-SignerInterface.md)






Methods
-------


### \Caparica\Crypto\RequestSigner::sign()

```
string Caparica\Crypto\RequestSigner::\Caparica\Crypto\RequestSigner::sign()(array $params, string $password)
```

signs a request



* Visibility: **public**

#### Arguments

* $params **array** - &lt;p&gt;associative array with parameters used to sign the request&lt;/p&gt;
* $password **string** - &lt;p&gt;the password&lt;/p&gt;



### \Caparica\Crypto\RequestSigner::toParametersString()

```
string Caparica\Crypto\RequestSigner::\Caparica\Crypto\RequestSigner::toParametersString()(array $params)
```

Conversts an array to a string
the resulting string is is ordered by key and has the querystring format (key1=value1&key2=value2 .

...) and is url encoded

* Visibility: **private**

#### Arguments

* $params **array**



### \Caparica\Crypto\SignerInterface::sign()

```
string Caparica\Crypto\SignerInterface::\Caparica\Crypto\SignerInterface::sign()(array $params, string $password)
```

signs a request



* Visibility: **public**
* This method is defined by [Caparica\Crypto\SignerInterface](Caparica-Crypto-SignerInterface.md)

#### Arguments

* $params **array** - &lt;p&gt;associative array with parameters used to sign the request&lt;/p&gt;
* $password **string** - &lt;p&gt;the password&lt;/p&gt;


