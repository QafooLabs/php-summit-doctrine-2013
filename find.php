<?php

$entityManager = require_once "bootstrap.php";

$row = $entityManager->getRepository('Ticketing\\Row')->getFullRow(5);

echo "Row is in room: " . $row->getRoom()->id . "\n";

echo $row->getRowNumber() . "\n";

echo "Seats: " . count($row->getSeats()) . "\n";
foreach ($row->getSeats() as $seat) {
    echo $seat->getSeatNumber()->getValue() . "\n";
}
