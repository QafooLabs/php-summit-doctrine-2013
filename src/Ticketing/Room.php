<?php

namespace Ticketing;

/**
 * @Entity
 * @Table(name="room")
 */
class Room
{
    /**
     * @Id @GeneratedValue @Column(type="integer")
     */
    public $id;
}
