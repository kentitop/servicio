<?php

namespace Imie\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reservation
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Imie\MainBundle\Entity\ReservationRepository")
 */
class Reservation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


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
    *
    * @ORM\OneToOne(targetEntity="Imie\MainBundle\Entity\Service", cascade={"persist"})
    * @ORM\JoinColumn(onDelete="CASCADE")
    */
    private $service;

    /**
    *
    * @ORM\ManyToOne(targetEntity="Imie\MainBundle\Entity\User", inversedBy="reservations")
    */
    private $user;

    /**
     * Set service
     *
     * @param \Imie\MainBundle\Entity\Service $service
     * @return Reservation
     */
    public function setService(\Imie\MainBundle\Entity\Service $service = null)
    {
        $this->service = $service;

        return $this;
    }

    /**
     * Get service
     *
     * @return \Imie\MainBundle\Entity\Service
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * Set user
     *
     * @param \Imie\MainBundle\Entity\User $user
     * @return Reservation
     */
    public function setUser(\Imie\MainBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Imie\MainBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->user = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add user
     *
     * @param \Imie\MainBundle\Entity\User $user
     * @return Reservation
     */
    public function addUser(\Imie\MainBundle\Entity\User $user)
    {
        $this->user[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \Imie\MainBundle\Entity\User $user
     */
    public function removeUser(\Imie\MainBundle\Entity\User $user)
    {
        $this->user->removeElement($user);
    }
}
