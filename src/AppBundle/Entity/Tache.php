<?php

namespace AppBundle\Entity;


use AppBundle\Entity\Degres;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Tache
 *
 * @ORM\Table(name="tache")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\tachesRepository")
 */
class Tache
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="details", type="text")
     */
    private $details;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_limite", type="date")
     */
    private $dateLimite;

    /**
     * @var int
     *
     * @ORM\Column(name="Degres", type="integer")
     */
    private $degres;

    /**
     * @var bool
     *
     * @ORM\Column(name="Valider", type="boolean")
     */
    private $valider;

       /**
       * @var Degres
       *
       * @Assert\NotBlank()
       * @ORM\ManyToOne(targetEntity="Degres", inversedBy="Tache")
       * @ORM\JoinColumn(name="Degres", referencedColumnName="id")
       */
   private $degres;

    /**
    *
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Tache
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set details
     *
     * @param string $details
     *
     * @return tache
     */
    public function setDetails($details)
    {
        $this->details = $details;

        return $this;
    }

    /**
     * Get details
     *
     * @return string
     */
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * Set dateLimite
     *
     * @param \DateTime $dateLimite
     *
     * @return tache
     */
    public function setDateLimite($dateLimite)
    {
        $this->dateLimite = $dateLimite;

        return $this;
    }

    /**
     * Get dateLimite
     *
     * @return \DateTime
     */
    public function getDateLimite()
    {
        return $this->dateLimite;
    }

    /**
     * Set degres
     *
     * @param integer $degres
     *
     * @return tache
     */
    public function setDegres($degres)
    {
        $this->degres = $degres;

        return $this;
    }

    /**
     * Get degres
     *
     * @return int
     */
    public function getDegres()
    {
        return $this->degres;
    }

    /**
     * Set valider
     *
     * @param boolean $valider
     *
     * @return tache
     */
    public function setValider($valider)
    {
        $this->valider = $valider;

        return $this;
    }

    /**
     * Get valider
     *
     * @return bool
     */
    public function getValider()
    {
        return $this->valider;
    }
}
