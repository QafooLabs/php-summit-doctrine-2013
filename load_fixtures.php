<?php

use Doctrine\Common\DataFixtures\Executor\ORMExecutor;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;
use Doctrine\Common\DataFixtures\Loader;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;

$entityManager = require_once "bootstrap.php";

class LoadTicketingData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $room = new Ticketing\Room();
        $row = new Ticketing\Row('A', $room);
        $row->createSeats(2);

        $manager->persist($row);
        $manager->persist($room);

        $manager->flush();
    }
}

$loader = new Loader();
$loader->addFixture(new LoadTicketingData);

$purger = new ORMPurger();
$executor = new ORMExecutor($entityManager, $purger);
$executor->execute($loader->getFixtures());

echo "Fixtures loaded\n";
