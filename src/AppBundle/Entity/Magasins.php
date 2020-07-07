<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Magasins
 *
 * @ORM\Table(name="magasins", indexes={@ORM\Index(name="id_enseigne", columns={"id_enseigne"})})
 * @ORM\Entity
 */
class Magasins
{
    /**
     * @var string
     *
     * @ORM\Column(name="codePostale", type="string", length=255, nullable=false)
     */
    private $codepostale;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255, nullable=false)
     */
    private $adresse;

    /**
     * @var float
     *
     * @ORM\Column(name="X", type="float", precision=10, scale=0, nullable=false)
     */
    private $x;

    /**
     * @var float
     *
     * @ORM\Column(name="Y", type="float", precision=10, scale=0, nullable=false)
     */
    private $y;

    /**
     * @var float
     *
     * @ORM\Column(name="XY", type="float", precision=10, scale=0, nullable=false)
     */
    private $xy;

    /**
     * @var float
     *
     * @ORM\Column(name="sequence", type="float", precision=10, scale=0, nullable=false)
     */
    private $sequence;

    /**
     * @var string
     *
     * @ORM\Column(name="nomMagasin", type="string", length=255, nullable=false)
     */
    private $nommagasin;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Enseigne
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Enseigne")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_enseigne", referencedColumnName="id")
     * })
     */
    private $idEnseigne;



    /**
     * Set codepostale
     *
     * @param string $codepostale
     *
     * @return Magasins
     */
    public function setCodepostale($codepostale)
    {
        $this->codepostale = $codepostale;

        return $this;
    }

    /**
     * Get codepostale
     *
     * @return string
     */
    public function getCodepostale()
    {
        return $this->codepostale;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Magasins
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set x
     *
     * @param float $x
     *
     * @return Magasins
     */
    public function setX($x)
    {
        $this->x = $x;

        return $this;
    }

    /**
     * Get x
     *
     * @return float
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * Set y
     *
     * @param float $y
     *
     * @return Magasins
     */
    public function setY($y)
    {
        $this->y = $y;

        return $this;
    }

    /**
     * Get y
     *
     * @return float
     */
    public function getY()
    {
        return $this->y;
    }

    /**
     * Set xy
     *
     * @param float $xy
     *
     * @return Magasins
     */
    public function setXy($xy)
    {
        $this->xy = $xy;

        return $this;
    }

    /**
     * Get xy
     *
     * @return float
     */
    public function getXy()
    {
        return $this->xy;
    }

    /**
     * Set sequence
     *
     * @param float $sequence
     *
     * @return Magasins
     */
    public function setSequence($sequence)
    {
        $this->sequence = $sequence;

        return $this;
    }

    /**
     * Get sequence
     *
     * @return float
     */
    public function getSequence()
    {
        return $this->sequence;
    }

    /**
     * Set nommagasin
     *
     * @param string $nommagasin
     *
     * @return Magasins
     */
    public function setNommagasin($nommagasin)
    {
        $this->nommagasin = $nommagasin;

        return $this;
    }

    /**
     * Get nommagasin
     *
     * @return string
     */
    public function getNommagasin()
    {
        return $this->nommagasin;
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
     * Set idEnseigne
     *
     * @param \AppBundle\Entity\Enseigne $idEnseigne
     *
     * @return Magasins
     */
    public function setIdEnseigne(\AppBundle\Entity\Enseigne $idEnseigne = null)
    {
        $this->idEnseigne = $idEnseigne;

        return $this;
    }

    /**
     * Get idEnseigne
     *
     * @return \AppBundle\Entity\Enseigne
     */
    public function getIdEnseigne()
    {
        return $this->idEnseigne;
    }
}
