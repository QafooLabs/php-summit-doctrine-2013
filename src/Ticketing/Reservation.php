<?php

namespace Ticketing;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reservation
 */
class Reservation
{
    /**
     * @var string
     */
    private $buyer;

    /**
     * @var boolean
     */
    private $paymentReceived;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Ticketing\Event
     */
    private $event;


    /**
     * Set buyer
     *
     * @param string $buyer
     * @return Reservation
     */
    public function setBuyer($buyer)
    {
        $this->buyer = $buyer;

        return $this;
    }

    /**
     * Get buyer
     *
     * @return string 
     */
    public function getBuyer()
    {
        return $this->buyer;
    }

    /**
     * Set paymentReceived
     *
     * @param boolean $paymentReceived
     * @return Reservation
     */
    public function setPaymentReceived($paymentReceived)
    {
        $this->paymentReceived = $paymentReceived;

        return $this;
    }

    /**
     * Get paymentReceived
     *
     * @return boolean 
     */
    public function getPaymentReceived()
    {
        return $this->paymentReceived;
    }

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
     * Set event
     *
     * @param \Ticketing\Event $event
     * @return Reservation
     */
    public function setEvent(\Ticketing\Event $event = null)
    {
        $this->event = $event;

        return $this;
    }

    /**
     * Get event
     *
     * @return \Ticketing\Event 
     */
    public function getEvent()
    {
        return $this->event;
    }
}
