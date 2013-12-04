<?php

namespace Ticketing;

use Doctrine\ORM\Mapping as ORM;

/**
 * ReservationSeats
 */
class ReservationSeats
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Ticketing\RoomRowsSeats
     */
    private $seat;

    /**
     * @var \Ticketing\Reservation
     */
    private $reservation;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set seat
     *
     * @param \Ticketing\RoomRowsSeats $seat
     * @return ReservationSeats
     */
    public function setSeat(\Ticketing\RoomRowsSeats $seat = null)
    {
        $this->seat = $seat;

        return $this;
    }

    /**
     * Get seat
     *
     * @return \Ticketing\RoomRowsSeats 
     */
    public function getSeat()
    {
        return $this->seat;
    }

    /**
     * Set reservation
     *
     * @param \Ticketing\Reservation $reservation
     * @return ReservationSeats
     */
    public function setReservation(\Ticketing\Reservation $reservation = null)
    {
        $this->reservation = $reservation;

        return $this;
    }

    /**
     * Get reservation
     *
     * @return \Ticketing\Reservation 
     */
    public function getReservation()
    {
        return $this->reservation;
    }
}
