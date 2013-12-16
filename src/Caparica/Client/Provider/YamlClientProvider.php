<?php

namespace Caparica\Client\Provider;

use Symfony\Component\Yaml\Yaml;
use Caparica\Client\ClientInterface;

/**
 * Locates clients in an yml file
 */
class YamlClientProvider implements ClientProviderInterface
{
    /**
     * parsed yml data
     * @var array
     */
    private $data;

    /**
     * path to yml file
     * @var \SplFileInfo
     */
    private $file;

    /**
     * yaml loader
     * @var Yaml
     */
    private $ymlLoader;

    /**
     * Name of Client class to return, the class must implement ClientInterface
     *
     * @var string
     */
    private $clientClassName;

    public function __construct($file, Yaml $ymlLoader, $clientClassName)
    {
        $this->setFile(new \SplFileInfo($file));
        $this->setYmlLoader($ymlLoader);
        $this->setClientClassName($clientClassName);
    }

    /**
     * {@inheritdoc}
     */
    public function byCode($code)
    {
        $data = $this->getData();
        foreach ($data as $clientName => $clientData) {
            // not aserting type (===) as type may differ depending on the way the yml file is written
            if ($clientData['code'] == $code) {
                return $this->createClient($clientName, $clientData);
            }
        }

        throw new \OutOfBoundsException('Client with code ' . $code . ' not found', 400);
    }

    /**
     * creates an API client based on the provided data
     *
     * @param  string $name the client name
     * @param  array  $data the client data (code and secret)
     *
     * @return ClientInterface
     */
    private function createClient($name, array $data)
    {
        $clientClassName = $this->getClientClassName();

        $client = new $clientClassName;

        $client->setCode($data['code']);
        $client->setSecret($data['secret']);

        return $client;
    }

    private function yamlToArray($file, Yaml $loader)
    {
        $data = $loader->parse($file);
        if (! $data) {
            $data = [];
        }

        return $data;
    }

    /**
     * Gets the parsed yml data.
     *
     * @return array
     */
    private function getData()
    {
        if (null === $this->data) {
            $this->data = $this->yamlToArray($this->getFile(), $this->getYmlLoader());
        }

        return $this->data;
    }

    /**
     * Gets the path to yml file.
     *
     * @return \SplFileInfo
     */
    private function getFile()
    {
        return $this->file;
    }

    /**
     * Sets the path to yml file.
     *
     * @param string $file the file
     *
     * @return self
     */
    private function setFile(\SplFileInfo $file)
    {
        if (false === $file->isReadable()) {
            throw new \InvalidArgumentException($file . ' is not readable');
        }

        $this->file = $file;

        return $this;
    }


    /**
     * Gets the yaml loader.
     *
     * @return Yaml
     */
    private function getYmlLoader()
    {
        return $this->ymlLoader;
    }

    /**
     * Sets the yaml loader.
     *
     * @param Yaml $ymlLoader the ymlLoader
     *
     * @return self
     */
    private function setYmlLoader(Yaml $ymlLoader)
    {
        $this->ymlLoader = $ymlLoader;

        return $this;
    }

    /**
     * Gets the Name of Client class to return, the class must implement Clientinterface.
     *
     * @return string
     */
    private function getClientClassName()
    {
        return $this->clientClassName;
    }

    /**
     * Sets the Name of Client class to return, the class must implement Clientinterface.
     *
     * @param string $clientClassName the clientClassName
     *
     * @return self
     */
    private function setClientClassName($clientClassName)
    {
        $this->clientClassName = $clientClassName;

        return $this;
    }
}
