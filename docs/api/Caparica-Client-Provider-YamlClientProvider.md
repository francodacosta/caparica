Caparica\Client\Provider\YamlClientProvider
===============

Locates clients in an yml file




* Class name: YamlClientProvider
* Namespace: Caparica\Client\Provider
* Parent class: [Caparica\Client\Provider\AbstractClientProvider](Caparica-Client-Provider-AbstractClientProvider.md)
* This class implements: [Caparica\Client\Provider\ClientProviderInterface](Caparica-Client-Provider-ClientProviderInterface.md)




Properties
----------


### $data

```
private array $data
```

parsed yml data



* Visibility: **private**


### $file

```
private \SplFileInfo $file
```

path to yml file



* Visibility: **private**


### $ymlLoader

```
private \Symfony\Component\Yaml\Yaml $ymlLoader
```

yaml loader



* Visibility: **private**


### $clientClassName

```
protected mixed $clientClassName = 'Caparica\Client\BasicClient'
```

The client class name



* Visibility: **protected**


Methods
-------


### \Caparica\Client\Provider\YamlClientProvider::__construct()

```
mixed Caparica\Client\Provider\YamlClientProvider::\Caparica\Client\Provider\YamlClientProvider::__construct()($file, \Symfony\Component\Yaml\Yaml $ymlLoader, $clientClassName)
```





* Visibility: **public**

#### Arguments

* $file **mixed**
* $ymlLoader **Symfony\Component\Yaml\Yaml**
* $clientClassName **mixed**



### \Caparica\Client\Provider\YamlClientProvider::getByClientCode()

```
mixed Caparica\Client\Provider\YamlClientProvider::\Caparica\Client\Provider\YamlClientProvider::getByClientCode()($code)
```

Returns a client by looking up its code



* Visibility: **public**

#### Arguments

* $code **mixed**



### \Caparica\Client\Provider\YamlClientProvider::createClient()

```
\Caparica\Client\ClientInterface Caparica\Client\Provider\YamlClientProvider::\Caparica\Client\Provider\YamlClientProvider::createClient()(string $name, array $data)
```

creates an API client based on the provided data



* Visibility: **private**

#### Arguments

* $name **string** - &lt;p&gt;the client name&lt;/p&gt;
* $data **array** - &lt;p&gt;the client data (code and secret)&lt;/p&gt;



### \Caparica\Client\Provider\YamlClientProvider::yamlToArray()

```
mixed Caparica\Client\Provider\YamlClientProvider::\Caparica\Client\Provider\YamlClientProvider::yamlToArray()($file, \Symfony\Component\Yaml\Yaml $loader)
```





* Visibility: **private**

#### Arguments

* $file **mixed**
* $loader **Symfony\Component\Yaml\Yaml**



### \Caparica\Client\Provider\YamlClientProvider::getData()

```
array Caparica\Client\Provider\YamlClientProvider::\Caparica\Client\Provider\YamlClientProvider::getData()()
```

Gets the parsed yml data.



* Visibility: **private**



### \Caparica\Client\Provider\YamlClientProvider::getFile()

```
\SplFileInfo Caparica\Client\Provider\YamlClientProvider::\Caparica\Client\Provider\YamlClientProvider::getFile()()
```

Gets the path to yml file.



* Visibility: **private**



### \Caparica\Client\Provider\YamlClientProvider::setFile()

```
\Caparica\Client\Provider\YamlClientProvider Caparica\Client\Provider\YamlClientProvider::\Caparica\Client\Provider\YamlClientProvider::setFile()(string $file)
```

Sets the path to yml file.



* Visibility: **private**

#### Arguments

* $file **string** - &lt;p&gt;the file&lt;/p&gt;



### \Caparica\Client\Provider\YamlClientProvider::getYmlLoader()

```
\Symfony\Component\Yaml\Yaml Caparica\Client\Provider\YamlClientProvider::\Caparica\Client\Provider\YamlClientProvider::getYmlLoader()()
```

Gets the yaml loader.



* Visibility: **private**



### \Caparica\Client\Provider\YamlClientProvider::setYmlLoader()

```
\Caparica\Client\Provider\YamlClientProvider Caparica\Client\Provider\YamlClientProvider::\Caparica\Client\Provider\YamlClientProvider::setYmlLoader()(\Symfony\Component\Yaml\Yaml $ymlLoader)
```

Sets the yaml loader.



* Visibility: **private**

#### Arguments

* $ymlLoader **Symfony\Component\Yaml\Yaml** - &lt;p&gt;the ymlLoader&lt;/p&gt;



### \Caparica\Client\Provider\AbstractClientProvider::getClientClassName()

```
string Caparica\Client\Provider\YamlClientProvider::\Caparica\Client\Provider\AbstractClientProvider::getClientClassName()()
```

Get the value of The client class name



* Visibility: **public**



### \Caparica\Client\Provider\AbstractClientProvider::setClientClassName()

```
\Caparica\Client\Provider\YamlClientProvider Caparica\Client\Provider\YamlClientProvider::\Caparica\Client\Provider\AbstractClientProvider::setClientClassName()(string $value)
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


