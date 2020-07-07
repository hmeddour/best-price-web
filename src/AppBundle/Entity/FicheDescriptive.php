<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FicheDescriptive
 *
 * @ORM\Table(name="fiche_descriptive")
 * @ORM\Entity
 */
class FicheDescriptive
{
    /**
     * @var string
     *
     * @ORM\Column(name="Libelle", type="string", length=255, nullable=false)
     */
    private $libelle;

    /**
     * @var float
     *
     * @ORM\Column(name="Poids", type="float", precision=10, scale=0, nullable=false)
     */
    private $poids;

    /**
     * @var string
     *
     * @ORM\Column(name="Couleur", type="string", length=255, nullable=false)
     */
    private $couleur;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateFabrication", type="datetime", nullable=false)
     */
    private $datefabrication;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set libelle
     *
     * @param string $libelle
     *
     * @return FicheDescriptive
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set poids
     *
     * @param float $poids
     *
     * @return FicheDescriptive
     */
    public function setPoids($poids)
    {
        $this->poids = $poids;

        return $this;
    }

    /**
     * Get poids
     *
     * @return float
     */
    public function getPoids()
    {
        return $this->poids;
    }

    /**
     * Set couleur
     *
     * @param string $couleur
     *
     * @return FicheDescriptive
     */
    public function setCouleur($couleur)
    {
        $this->couleur = $couleur;

        return $this;
    }

    /**
     * Get couleur
     *
     * @return string
     */
    public function getCouleur()
    {
        return $this->couleur;
    }

    /**
     * Set datefabrication
     *
     * @param \DateTime $datefabrication
     *
     * @return FicheDescriptive
     */
    public function setDatefabrication($datefabrication)
    {
        $this->datefabrication = $datefabrication;

        return $this;
    }

    /**
     * Get datefabrication
     *
     * @return \DateTime
     */
    public function getDatefabrication()
    {
        return $this->datefabrication;
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
