<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Taches;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * degres
 *
 * @ORM\Table(name="degres")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\degresRepository")
 */
class Degres
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
     * @ORM\Column(name="message", type="string", length=255)
     */
    private $message;

    /**
     * @var int
     *
     * @ORM\Column(name="chiffre", type="integer")
     */
    private $chiffre;

    /**
    * @var ArrayCollection
    *
    * @ORM\OneToMany(targetEntity="Taches", mappedBy="degres")
    */
     private $taches;    public function __construct() {
     $this->taches = new ArrayCollection();
   }


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set message
     *
     * @param string $message
     *
     * @return degres
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set chiffre
     *
     * @param integer $chiffre
     *
     * @return degres
     */
    public function setChiffre($chiffre)
    {
        $this->chiffre = $chiffre;

        return $this;
    }

    /**
     * Get chiffre
     *
     * @return int
     */
    public function getChiffre()
    {
        return $this->chiffre;
    }
}
