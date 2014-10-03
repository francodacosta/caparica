Caparica\Client\Provider\AbstractClientProvider
===============

common code for Client Providers




* Class name: AbstractClientProvider
* Namespace: Caparica\Client\Provider
* This is an **abstract** class
* This class implements: [Caparica\Client\Provider\ClientProviderInterface](Caparica-Client-Provider-ClientProviderInterface.md)




Properties
----------


### $clientClassName

```
protected mixed $clientClassName = 'Caparica\Client\BasicClient'
```

The client class name



* Visibility: **protected**


Methods
-------


### \Caparica\Client\Provider\AbstractClientProvider::getClientClassName()

```
string Caparica\Client\Provider\AbstractClientProvider::\Caparica\Client\Provider\AbstractClientProvider::getClientClassName()()
```

Get the value of The client class name



* Visibility: **public**



### \Caparica\Client\Provider\AbstractClientProvider::setClientClassName()

```
\Caparica\Client\Provider\AbstractClientProvider Caparica\Client\Provider\AbstractClientProvider::\Caparica\Client\Provider\AbstractClientProvider::setClientClassName()(string $value)
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


