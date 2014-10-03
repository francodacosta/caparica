Caparica\Client\Provider\DoctrineClientProvider
===============

common code for Client Providers




* Class name: DoctrineClientProvider
* Namespace: Caparica\Client\Provider
* Parent class: [Caparica\Client\Provider\AbstractClientProvider](Caparica-Client-Provider-AbstractClientProvider.md)
* This class implements: [Caparica\Client\Provider\ClientProviderInterface](Caparica-Client-Provider-ClientProviderInterface.md)




Properties
----------


### $entityManager

```
private \Doctrine\ORM\EntityManager $entityManager
```

reference to doctrine entity manager



* Visibility: **private**


### $entityClass

```
private string $entityClass
```

the entity holding client information.

this can either be a class FQDN or a doctrine entity shortcut

* Visibility: **private**


### $clientCodeField

```
private string $clientCodeField = 'apiKey'
```

the entity field that holds the client code (a.k.a api key)



* Visibility: **private**


### $clientSecretField

```
private string $clientSecretField = 'apiSecret'
```

the entity field that holds the client secret (a.k.a api secret)



* Visibility: **private**


### $clientClassName

```
protected mixed $clientClassName = 'Caparica\Client\BasicClient'
```

The client class name



* Visibility: **protected**


Methods
-------


### \Caparica\Client\Provider\DoctrineClientProvider::__construct()

```
mixed Caparica\Client\Provider\DoctrineClientProvider::\Caparica\Client\Provider\DoctrineClientProvider::__construct()(\Doctrine\ORM\EntityManager $entityManager, $entityClass)
```





* Visibility: **public**

#### Arguments

* $entityManager **Doctrine\ORM\EntityManager**
* $entityClass **mixed**



### \Caparica\Client\Provider\DoctrineClientProvider::getEntityManager()

```
\Doctrine\ORM\EntityManager Caparica\Client\Provider\DoctrineClientProvider::\Caparica\Client\Provider\DoctrineClientProvider::getEntityManager()()
```

Gets the reference to doctrine entity manager.



* Visibility: **public**



### \Caparica\Client\Provider\DoctrineClientProvider::setEntityManager()

```
\Caparica\Client\Provider\DoctrineClientProvider Caparica\Client\Provider\DoctrineClientProvider::\Caparica\Client\Provider\DoctrineClientProvider::setEntityManager()(\Doctrine\ORM\EntityManager $entityManager)
```

Sets the reference to doctrine entity manager.



* Visibility: **public**

#### Arguments

* $entityManager **Doctrine\ORM\EntityManager** - &lt;p&gt;the entity manager&lt;/p&gt;



### \Caparica\Client\Provider\DoctrineClientProvider::getEntityClass()

```
string Caparica\Client\Provider\DoctrineClientProvider::\Caparica\Client\Provider\DoctrineClientProvider::getEntityClass()()
```

Gets the the entity holding client information.



* Visibility: **public**



### \Caparica\Client\Provider\DoctrineClientProvider::setEntityClass()

```
\Caparica\Client\Provider\DoctrineClientProvider Caparica\Client\Provider\DoctrineClientProvider::\Caparica\Client\Provider\DoctrineClientProvider::setEntityClass()(string $entityClass)
```

Sets the the entity holding client information.



* Visibility: **public**

#### Arguments

* $entityClass **string** - &lt;p&gt;the entity class&lt;/p&gt;



### \Caparica\Client\Provider\DoctrineClientProvider::getClientCodeField()

```
string Caparica\Client\Provider\DoctrineClientProvider::\Caparica\Client\Provider\DoctrineClientProvider::getClientCodeField()()
```

Gets the the entity field that holds the client code (a.k.a api key).



* Visibility: **public**



### \Caparica\Client\Provider\DoctrineClientProvider::setClientCodeField()

```
\Caparica\Client\Provider\DoctrineClientProvider Caparica\Client\Provider\DoctrineClientProvider::\Caparica\Client\Provider\DoctrineClientProvider::setClientCodeField()(string $clientCodeField)
```

Sets the the entity field that holds the client code (a.k.a api key).



* Visibility: **public**

#### Arguments

* $clientCodeField **string** - &lt;p&gt;the client code field&lt;/p&gt;



### \Caparica\Client\Provider\DoctrineClientProvider::getClientSecretField()

```
string Caparica\Client\Provider\DoctrineClientProvider::\Caparica\Client\Provider\DoctrineClientProvider::getClientSecretField()()
```

Gets the the entity field that holds the client secret (a.k.a api secret).



* Visibility: **public**



### \Caparica\Client\Provider\DoctrineClientProvider::setClientSecretField()

```
\Caparica\Client\Provider\DoctrineClientProvider Caparica\Client\Provider\DoctrineClientProvider::\Caparica\Client\Provider\DoctrineClientProvider::setClientSecretField()(string $clientSecretField)
```

Sets the the entity field that holds the client secret (a.k.a api secret).



* Visibility: **public**

#### Arguments

* $clientSecretField **string** - &lt;p&gt;the client secret field&lt;/p&gt;



### \Caparica\Client\Provider\DoctrineClientProvider::getFieldValueFromEntity()

```
mixed Caparica\Client\Provider\DoctrineClientProvider::\Caparica\Client\Provider\DoctrineClientProvider::getFieldValueFromEntity()($fieldName, $entity)
```





* Visibility: **private**

#### Arguments

* $fieldName **mixed**
* $entity **mixed**



### \Caparica\Client\Provider\DoctrineClientProvider::getByClientCode()

```
mixed Caparica\Client\Provider\DoctrineClientProvider::\Caparica\Client\Provider\DoctrineClientProvider::getByClientCode()($code)
```

Returns a client by looking up its code



* Visibility: **public**

#### Arguments

* $code **mixed**



### \Caparica\Client\Provider\AbstractClientProvider::getClientClassName()

```
string Caparica\Client\Provider\DoctrineClientProvider::\Caparica\Client\Provider\AbstractClientProvider::getClientClassName()()
```

Get the value of The client class name



* Visibility: **public**



### \Caparica\Client\Provider\AbstractClientProvider::setClientClassName()

```
\Caparica\Client\Provider\DoctrineClientProvider Caparica\Client\Provider\DoctrineClientProvider::\Caparica\Client\Provider\AbstractClientProvider::setClientClassName()(string $value)
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


