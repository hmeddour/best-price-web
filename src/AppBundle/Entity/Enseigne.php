<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Enseigne
 *
 * @ORM\Table(name="enseigne")
 * @ORM\Entity
 */
class Enseigne
{
    /**
     * @var string
     *
     * @ORM\Column(name="NomEnseigne", type="string", length=255, nullable=false)
     */
    private $nomenseigne;

    /**
     * @var string
     *
     * @ORM\Column(name="LogoEnseigne", type="string", length=255, nullable=false)
     */
    private $logoenseigne;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set nomenseigne
     *
     * @param string $nomenseigne
     *
     * @return Enseigne
     */
    public function setNomenseigne($nomenseigne)
    {
        $this->nomenseigne = $nomenseigne;

        return $this;
    }

    /**
     * Get nomenseigne
     *
     * @return string
     */
    public function getNomenseigne()
    {
        return $this->nomenseigne;
    }

    /**
     * Set logoenseigne
     *
     * @param string $logoenseigne
     *
     * @return Enseigne
     */
    public function setLogoenseigne($logoenseigne)
    {
        $this->logoenseigne = $logoenseigne;

        return $this;
    }

    /**
     * Get logoenseigne
     *
     * @return string
     */
    public function getLogoenseigne()
    {
        return $this->logoenseigne;
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
}
