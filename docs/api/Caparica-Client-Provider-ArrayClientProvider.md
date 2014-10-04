Caparica\Client\Provider\ArrayClientProvider
===============

Simple client provider based on an aassociative array configuration




* Class name: ArrayClientProvider
* Namespace: Caparica\Client\Provider
* Parent class: [Caparica\Client\Provider\AbstractClientProvider](Caparica-Client-Provider-AbstractClientProvider.md)
* This class implements: [Caparica\Client\Provider\ClientProviderInterface](Caparica-Client-Provider-ClientProviderInterface.md)




Properties
----------


### $config

```
private mixed $config = array()
```

holds the code => secret pairs registred with this provider



* Visibility: **private**


### $clientClassName

```
protected mixed $clientClassName = 'Caparica\Client\BasicClient'
```

The client class name



* Visibility: **protected**


Methods
-------


### \Caparica\Client\Provider\ArrayClientProvider::__construct()

```
mixed Caparica\Client\Provider\ArrayClientProvider::\Caparica\Client\Provider\ArrayClientProvider::__construct()(array $config, string $clientClassName)
```

initiates the class



* Visibility: **public**

#### Arguments

* $config **array** - &lt;p&gt;an optional associative array of codes =&gt; secret to populate the provider&lt;/p&gt;
* $clientClassName **string** - &lt;p&gt;the FQCN for the client clas&lt;/p&gt;



### \Caparica\Client\Provider\ArrayClientProvider::getByClientCode()

```
\Caparica\Client\ClientInterface Caparica\Client\Provider\ArrayClientProvider::\Caparica\Client\Provider\ArrayClientProvider::getByClientCode()(string $code)
```

Returns a client by looking up its code



* Visibility: **public**

#### Arguments

* $code **string** - &lt;p&gt;the client code&lt;/p&gt;



### \Caparica\Client\Provider\ArrayClientProvider::hasClientCode()

```
boolean Caparica\Client\Provider\ArrayClientProvider::\Caparica\Client\Provider\ArrayClientProvider::hasClientCode()(string $code)
```

returns true if the client code is found



* Visibility: **public**

#### Arguments

* $code **string**



### \Caparica\Client\Provider\ArrayClientProvider::add()

```
mixed Caparica\Client\Provider\ArrayClientProvider::\Caparica\Client\Provider\ArrayClientProvider::add()(string $code, string $secret)
```

Adds a client id / client secret combination



* Visibility: **public**

#### Arguments

* $code **string**
* $secret **string**



### \Caparica\Client\Provider\ArrayClientProvider::getConfig()

```
array Caparica\Client\Provider\ArrayClientProvider::\Caparica\Client\Provider\ArrayClientProvider::getConfig()()
```

Get the value of Config



* Visibility: **private**



### \Caparica\Client\Provider\ArrayClientProvider::setConfig()

```
\Caparica\Client\Provider\ArrayClientProvider Caparica\Client\Provider\ArrayClientProvider::\Caparica\Client\Provider\ArrayClientProvider::setConfig()(array $value)
```

Set the value of Config



* Visibility: **private**

#### Arguments

* $value **array**



### \Caparica\Client\Provider\AbstractClientProvider::getClientClassName()

```
string Caparica\Client\Provider\ArrayClientProvider::\Caparica\Client\Provider\AbstractClientProvider::getClientClassName()()
```

Get the value of The client class name



* Visibility: **public**



### \Caparica\Client\Provider\AbstractClientProvider::setClientClassName()

```
\Caparica\Client\Provider\ArrayClientProvider Caparica\Client\Provider\ArrayClientProvider::\Caparica\Client\Provider\AbstractClientProvider::setClientClassName()(string $value)
```

Set the value of The client class name



* Visibility: **public**

#### Arguments

* $value **string**



### \Caparica\Client\Provider\ClientProviderInterface::getByClientCode()

```
\Caparica\Client\ClientInterface Caparica\Client\Provider\ClientProviderInterface::\Caparica\Client\Provider\ClientProviderInterface::getByClientCode()(string $code)
```

Returns a client by looking up its code



* Visibility: **public**
* This method is defined by [Caparica\Client\Provider\ClientProviderInterface](Caparica-Client-Provider-ClientProviderInterface.md)

#### Arguments

* $code **string** - &lt;p&gt;the client code&lt;/p&gt;



### \Caparica\Client\Provider\ClientProviderInterface::setClientClassName()

```
mixed Caparica\Client\Provider\ClientProviderInterface::\Caparica\Client\Provider\ClientProviderInterface::setClientClassName()(string $clientClassName)
```

sets the Fully Qualifiyed Class Name of the class to return
The returned class should implement the ClientInterface



* Visibility: **public**
* This method is defined by [Caparica\Client\Provider\ClientProviderInterface](Caparica-Client-Provider-ClientProviderInterface.md)

#### Arguments

* $clientClassName **string**



### \Caparica\Client\Provider\ClientProviderInterface::getClientClassName()

```
mixed Caparica\Client\Provider\ClientProviderInterface::\Caparica\Client\Provider\ClientProviderInterface::getClientClassName()()
```

gets the Fully Qualifiyed Class Name of the class to return



* Visibility: **public**
* This method is defined by [Caparica\Client\Provider\ClientProviderInterface](Caparica-Client-Provider-ClientProviderInterface.md)


