<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Capture
 *
 * @ORM\Table(name="capture", indexes={@ORM\Index(name="id_article", columns={"id_article"}), @ORM\Index(name="id_utilisateur", columns={"id_utilisateur"}), @ORM\Index(name="id_magasin", columns={"id_magasin"})})
 * @ORM\Entity
 */
class Capture
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date", type="datetime", nullable=false)
     */
    private $date;

    /**
     * @var float
     *
     * @ORM\Column(name="Prix", type="float", precision=10, scale=0, nullable=false)
     */
    private $prix;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_utilisateur", referencedColumnName="id")
     * })
     */
    private $idUtilisateur;

    /**
     * @var \AppBundle\Entity\Article
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Article")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_article", referencedColumnName="id")
     * })
     */
    private $idArticle;

    /**
     * @var \AppBundle\Entity\Magasins
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Magasins")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_magasin", referencedColumnName="id")
     * })
     */
    private $idMagasin;



    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Capture
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set prix
     *
     * @param float $prix
     *
     * @return Capture
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return float
     */
    public function getPrix()
    {
        return $this->prix;
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
     * Set idUtilisateur
     *
     * @param \AppBundle\Entity\Utilisateur $idUtilisateur
     *
     * @return Capture
     */
    public function setIdUtilisateur(\AppBundle\Entity\Utilisateur $idUtilisateur = null)
    {
        $this->idUtilisateur = $idUtilisateur;

        return $this;
    }

    /**
     * Get idUtilisateur
     *
     * @return \AppBundle\Entity\Utilisateur
     */
    public function getIdUtilisateur()
    {
        return $this->idUtilisateur;
    }

    /**
     * Set idArticle
     *
     * @param \AppBundle\Entity\Article $idArticle
     *
     * @return Capture
     */
    public function setIdArticle(\AppBundle\Entity\Article $idArticle = null)
    {
        $this->idArticle = $idArticle;

        return $this;
    }

    /**
     * Get idArticle
     *
     * @return \AppBundle\Entity\Article
     */
    public function getIdArticle()
    {
        return $this->idArticle;
    }

    /**
     * Set idMagasin
     *
     * @param \AppBundle\Entity\Magasins $idMagasin
     *
     * @return Capture
     */
    public function setIdMagasin(\AppBundle\Entity\Magasins $idMagasin = null)
    {
        $this->idMagasin = $idMagasin;

        return $this;
    }

    /**
     * Get idMagasin
     *
     * @return \AppBundle\Entity\Magasins
     */
    public function getIdMagasin()
    {
        return $this->idMagasin;
    }
}
