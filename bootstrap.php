<?php

require_once "vendor/autoload.php";

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

#$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$config = Setup::createXmlMetadataConfiguration(array('config'), $isDevMode);
$config->setSQLLogger(new MonologLogger());

$entityManager = EntityManager::create($dbParams, $config);

return $entityManager;
