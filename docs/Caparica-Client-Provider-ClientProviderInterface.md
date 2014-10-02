Caparica\Client\Provider\ClientProviderInterface
===============

Minimum functionality that an API client provider must implement




* Interface name: ClientProviderInterface
* Namespace: Caparica\Client\Provider
* This is an **interface**






Methods
-------


### \Caparica\Client\Provider\ClientProviderInterface::getByClientCode()

```
\Caparica\Client\ClientInterface Caparica\Client\Provider\ClientProviderInterface::\Caparica\Client\Provider\ClientProviderInterface::getByClientCode()(string $code)
```

Returns a client by looking up its code



* Visibility: **public**

#### Arguments

* $code **string** - &lt;p&gt;the client code&lt;/p&gt;



### \Caparica\Client\Provider\ClientProviderInterface::setClientClassName()

```
mixed Caparica\Client\Provider\ClientProviderInterface::\Caparica\Client\Provider\ClientProviderInterface::setClientClassName()(string $clientClassName)
```

sets the Fully Qualifiyed Class Name of the class to return
The returned class should implement the ClientInterface



* Visibility: **public**

#### Arguments

* $clientClassName **string**



### \Caparica\Client\Provider\ClientProviderInterface::getClientClassName()

```
mixed Caparica\Client\Provider\ClientProviderInterface::\Caparica\Client\Provider\ClientProviderInterface::getClientClassName()()
```

gets the Fully Qualifiyed Class Name of the class to return



* Visibility: **public**


