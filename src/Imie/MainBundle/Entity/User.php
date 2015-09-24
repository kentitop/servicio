<?php

namespace Imie\MainBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;


/**
 * User
 *
 * @ORM\Table(name="fos_user")
 * @ORM\Entity(repositoryClass="Imie\MainBundle\Entity\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


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
    * @ORM\OneToMany(targetEntity="Reservation", mappedBy="user")
    *
    */
    private $reservations;

    /**
     * Add reservations
     *
     * @param \Imie\MainBundle\Entity\Reservation $reservations
     * @return User
     */
    public function addReservation(\Imie\MainBundle\Entity\Reservation $reservations)
    {
        $this->reservations[] = $reservations;

        return $this;
    }

    /**
     * Remove reservations
     *
     * @param \Imie\MainBundle\Entity\Reservation $reservations
     */
    public function removeReservation(\Imie\MainBundle\Entity\Reservation $reservations)
    {
        $this->reservations->removeElement($reservations);
    }

    /**
     * Get reservations
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReservations()
    {
        return $this->reservations;
    }

    /**
     * Set reservations
     *
     * @param \Imie\MainBundle\Entity\Category $reservations
     * @return User
     */
    public function setReservations(\Imie\MainBundle\Entity\Category $reservations = null)
    {
        $this->reservations = $reservations;

        return $this;
    }
}
