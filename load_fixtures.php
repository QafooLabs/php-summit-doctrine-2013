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
        $room->setName('Raum 3');

        $manager->persist($room);

        for ($i = 0; $i < 15; $i++) {
            $row = new Ticketing\RoomRows();
            $row->setRoom($room);

            $manager->persist($row);

            for ($j = 0; $j < 20; $j++) {

                $seat = new Ticketing\RoomRowsSeats();
                $seat->setSeatNumber(chr(65 + $i) . ($j+1));
                $seat->setRow($row);

                $manager->persist($seat);
            }
        }

        $manager->flush();
    }
}

$loader = new Loader();
$loader->addFixture(new LoadTicketingData);

$purger = new ORMPurger();
$executor = new ORMExecutor($entityManager, $purger);
$executor->execute($loader->getFixtures());

echo "Fixtures loaded\n";
