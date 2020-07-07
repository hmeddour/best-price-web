<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Magasin
 *
 * @ORM\Table(name="magasin", indexes={@ORM\Index(name="id_enseigne", columns={"id_enseigne"}), @ORM\Index(name="id_enseigne_2", columns={"id_enseigne"})})
 * @ORM\Entity
 */
class Magasin
{
    /**
     * @var string
     *
     * @ORM\Column(name="nomMagasin", type="text", length=65535, nullable=false)
     */
    private $nommagasin;

    /**
     * @var string
     *
     * @ORM\Column(name="AdresseMagasin", type="string", length=255, nullable=false)
     */
    private $adressemagasin;

    /**
     * @var string
     *
     * @ORM\Column(name="Tel", type="string", length=255, nullable=false)
     */
    private $tel;

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
     * Set nommagasin
     *
     * @param string $nommagasin
     *
     * @return Magasin
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
     * Set adressemagasin
     *
     * @param string $adressemagasin
     *
     * @return Magasin
     */
    public function setAdressemagasin($adressemagasin)
    {
        $this->adressemagasin = $adressemagasin;

        return $this;
    }

    /**
     * Get adressemagasin
     *
     * @return string
     */
    public function getAdressemagasin()
    {
        return $this->adressemagasin;
    }

    /**
     * Set tel
     *
     * @param string $tel
     *
     * @return Magasin
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel
     *
     * @return string
     */
    public function getTel()
    {
        return $this->tel;
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
     * @return Magasin
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
