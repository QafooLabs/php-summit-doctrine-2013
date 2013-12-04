<?php

namespace Ticketing;

/**
 * @Entity
 * @Table(name="room_rows_seats")
 */
class Seat
{
    /**
     * @Id @GeneratedValue @Column(type="integer")
     */
    public $id;
    /**
     * @Column(type="seatnumber", name="seat_number")
     */
    private $seatNumber;

    /**
     * @ManyToOne(targetEntity="Row", inversedBy="seats")
     */
    private $row;

    public function __construct(SeatNumber $number, Row $row)
    {
        $this->seatNumber = $number;
        $this->row = $row;
    }

    public function getSeatNumber()
    {
        return $this->seatNumber;
    }
}
