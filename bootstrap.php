<?php

require_once "vendor/autoload.php";

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Doctrine\DBAL\Logging\SQLLogger;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$paths = array('src/Ticketing');
$isDevMode = false;

// the connection configuration
$dbParams = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'doctrine',
    'password' => '',
    'dbname'   => 'doctrine_summit',
    'host'     => 'localhost'
);

class MonologLogger implements SQLLogger
{
    private $logger;

    public function __construct()
    {
        $this->logger = new Logger('name');
        $this->logger->pushHandler(new StreamHandler('queries.log', Logger::DEBUG));
    }

    public function startQuery($sql, array $params = null, array $types = null)
    {
        $this->logger->debug($sql . "\n" . json_encode($params) . "\n");
    }

    public function stopQuery()
    {
    }
}

#$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$config = Setup::createXmlMetadataConfiguration(array('config'), $isDevMode);
$config->setSQLLogger(new MonologLogger());

$entityManager = EntityManager::create($dbParams, $config);

return $entityManager;
