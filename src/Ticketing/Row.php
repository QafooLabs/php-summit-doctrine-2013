<?php

namespace Ticketing;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity(repositoryClass="Ticketing\RowRepository")
 * @Table(name="room_rows")
 */
class Row
{
    /**
     * @Id @GeneratedValue @Column(type="integer")
     */
    public $id;

    /**
     * @Column(type="string")
     * @var string
     */
    private $rowNumber;

    /**
     * @var Seat[]
     * @OneToMany(targetEntity="Ticketing\Seat", mappedBy="row", cascade={"persist"}, fetch="EXTRA_LAZY")
     */
    private $seats;

    /**
     * @ManyToOne(targetEntity="Ticketing\Room", fetch="EAGER")
     */
    private $room;

    public function __construct($rowNumber, Room $room)
    {
        $this->seats = new ArrayCollection();
        $this->rowNumber = $rowNumber;
        $this->room = $room;
    }

    public function createSeats($num)
    {
        for ($i = 0; $i < $num; $i++) {
            $seat = new Seat(new SeatNumber($i+1), $this);
            $this->seats[] = $seat;
        }
    }

    public function getSeats()
    {
        return $this->seats;
    }

    public function getRowNumber()
    {
        return $this->rowNumber;
    }

    public function getRoom()
    {
        return $this->room;
    }
}
