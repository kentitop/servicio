<?php

namespace Imie\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Service
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Imie\MainBundle\Entity\ServiceRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Service
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
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="preferences", type="string", length=255)
     */
    private $preferences;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime")
     */
    private $createdAt;

    /**
    *
    * @ORM\ManyToOne(targetEntity="Imie\MainBundle\Entity\Category", inversedBy="services")
    *
    */
    private $categorie;

    /**
    *
    * @ORM\OneToOne(targetEntity="Imie\MainBundle\Entity\Image", cascade={"persist"})
    */
    private $image;

    /**
     * Gets triggered only on insert

     * @ORM\PrePersist
     */
    public function onPrePersist()
    {
        $this->createdAt = new \DateTime("now");
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
     * @return Service
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
     * @return Service
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
     * @return Service
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
     * @return Service
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
     * @return Service
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
     * @param \Imie\MainBundle\Entity\Category $categorie
     * @return Service
     */
    public function setCategorie(\Imie\MainBundle\Entity\Category $categorie = null)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return \Imie\MainBundle\Entity\Category
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set image
     *
     * @param \Imie\MainBundle\Entity\Image $image
     * @return Service
     */
    public function setImage(\Imie\MainBundle\Entity\Image $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \Imie\MainBundle\Entity\Image
     */
    public function getImage()
    {
        return $this->image;
    }
}
