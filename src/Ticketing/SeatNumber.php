<?php

namespace Ticketing;

class SeatNumber
{
    private $number;

    public function __construct($number)
    {
        if (!is_int($number)) {
            throw new \RuntimeException();
        }

        $this->number = $number;
    }

    public function getValue()
    {
        return $this->number;
    }
}
