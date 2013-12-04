<?php

require_once "vendor/autoload.php";

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$paths = array(__DIR__ . '/src/Ticketing/');
$isDevMode = true;

// the connection configuration
$dbParams = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'doctrine',
    'password' => '',
    'dbname'   => 'doctrine_summit',
    'host'     => 'localhost'
);

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
#$config = Setup::createXmlMetadataConfiguration(array('config'), $isDevMode);
$config->setSQLLogger(new MonologLogger());

\Doctrine\DBAL\Types\Type::addType('seatnumber', 'Ticketing\SeatNumberType');

$entityManager = EntityManager::create($dbParams, $config);
$entityManager->getConnection()->getDatabasePlatform()->registerDoctrineTypeMapping('SeatNumber', 'seatnumber');

return $entityManager;
