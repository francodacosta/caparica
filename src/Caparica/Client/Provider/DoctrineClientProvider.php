<?php
namespace Caparica\Client\Provider;

use Caparica\Client\Provider\ClientProviderInterface;
use Caparica\Client\Provider\AbstractClientProvider;
use Caparica\Client\BasicClient;
use Doctrine\ORM\EntityManager;

class DoctrineClientProvider extends AbstractClientProvider implements ClientProviderInterface
{
    /**
     * reference to doctrine entity manager
     * @var EntityManager
     */
    private $entityManager;

    /**
     * the entity holding client information.
     * this can either be a class FQDN or a doctrine entity shortcut
     * @var string
     */
    private $entityClass;

    /**
     * the entity field that holds the client code (a.k.a api key)
     * @var string
     */
    private $clientCodeField = 'apiKey';

    /**
     * the entity field that holds the client secret (a.k.a api secret)
     * @var string
     */
    private $clientSecretField = 'apiSecret';

    public function __construct(EntityManager $entityManager, $entityClass)
    {
        $this->setEntityManager($entityManager);
        $this->setEntityClass($entityClass);
    }

    /**
     * Gets the reference to doctrine entity manager.
     *
     * @return EntityManager
     */
    public function getEntityManager()
    {
        return $this->entityManager;
    }

    /**
     * Sets the reference to doctrine entity manager.
     *
     * @param EntityManager $entityManager the entity manager
     *
     * @return self
     */
    public function setEntityManager(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;

        return $this;
    }

    /**
     * Gets the the entity holding client information.
     *
     * @return string
     */
    public function getEntityClass()
    {
        return $this->entityClass;
    }

    /**
     * Sets the the entity holding client information.
     *
     * @param string $entityClass the entity class
     *
     * @return self
     */
    public function setEntityClass($entityClass)
    {
        $this->entityClass = $entityClass;

        return $this;
    }

    /**
     * Gets the the entity field that holds the client code (a.k.a api key).
     *
     * @return string
     */
    public function getClientCodeField()
    {
        return $this->clientCodeField;
    }

    /**
     * Sets the the entity field that holds the client code (a.k.a api key).
     *
     * @param string $clientCodeField the client code field
     *
     * @return self
     */
    public function setClientCodeField($clientCodeField)
    {
        $this->clientCodeField = $clientCodeField;

        return $this;
    }

    /**
     * Gets the the entity field that holds the client secret (a.k.a api secret).
     *
     * @return string
     */
    public function getClientSecretField()
    {
        return $this->clientSecretField;
    }

    /**
     * Sets the the entity field that holds the client secret (a.k.a api secret).
     *
     * @param string $clientSecretField the client secret field
     *
     * @return self
     */
    public function setClientSecretField($clientSecretField)
    {
        $this->clientSecretField = $clientSecretField;

        return $this;
    }

    private function getFieldValueFromEntity($fieldName, $entity)
    {
        $method = 'get' . ucfirst($fieldName);
        if (false === method_exists($entity, $method)) {
            throw new \InvalidArgumentException('Entity has no method ' . $method);
        }

        return $entity->$method();
    }

    /**
     * {@inheritdoc}
     */
    public function byClientCode($code)
    {
        $em = $this->getEntityManager();
        $repo = $em->getRepository($this->getEntityClass());

        $entity = $repo->findOneBy(array(
            $this->getClientCodeField() => $code,
        ));

        if (! $entity) {
            throw new \Exception("Client Not found", 404);
        }

        $clientCode = $this->getFieldValueFromEntity($this->getClientCodeField(), $entity);
        $clientSecret = $this->getFieldValueFromEntity($this->getClientSecretField(), $entity);

        $class= $this->getClientClassName();
        $client = new $class ;

        $client->setCode($clientCode);
        $client->setSecret($clientSecret);

        return $client;

    }
}
