<?php

namespace Imie\ServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * UnService
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Imie\ServiceBundle\Entity\UnServiceRepository")
 */
class UnService
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
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="preferences", type="string", length=255, nullable=true)
     */
    private $preferences;

    /**
     * @var datetime
     *
     * @ORM\Column(name="createdAt", type="datetime")
     */
    private $createdAt;

    /**
    *
    * @ORM\ManyToOne(targetEntity="Imie\ServiceBundle\Entity\Categorie", inversedBy="services")
    *
    */
    private $categorie;

    /**
     * Constructor
     */
    public function __construct()
    {

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
     * Set titre
     *
     * @param string $titre
     * @return UnService
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return UnService
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return UnService
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set preferences
     *
     * @param string $preferences
     * @return UnService
     */
    public function setPreferences($preferences)
    {
        $this->preferences = $preferences;

        return $this;
    }

    /**
     * Get preferences
     *
     * @return string
     */
    public function getPreferences()
    {
        return $this->preferences;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return UnService
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }


    /**
     * Set categorie
     *
     * @param \Imie\ServiceBundle\Entity\Categorie $categorie
     * @return UnService
     */
    public function setCategorie(\Imie\ServiceBundle\Entity\Categorie $categorie = null)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return \Imie\ServiceBundle\Entity\Categorie
     */
    public function getCategorie()
    {
        return $this->categorie;
    }
}
