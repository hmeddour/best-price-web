<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MagasinArticle
 *
 * @ORM\Table(name="magasin_article", indexes={@ORM\Index(name="id_magasin", columns={"id_magasin", "id_article"}), @ORM\Index(name="id_article", columns={"id_article"}), @ORM\Index(name="IDX_7585D73A8A32F657", columns={"id_magasin"})})
 * @ORM\Entity
 */
class MagasinArticle
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_magasin", type="integer", nullable=true)
     */
    private $idMagasin;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

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
     * Set idMagasin
     *
     * @param integer $idMagasin
     *
     * @return MagasinArticle
     */
    public function setIdMagasin($idMagasin)
    {
        $this->idMagasin = $idMagasin;

        return $this;
    }

    /**
     * Get idMagasin
     *
     * @return integer
     */
    public function getIdMagasin()
    {
        return $this->idMagasin;
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
     * Set idArticle
     *
     * @param \AppBundle\Entity\Article $idArticle
     *
     * @return MagasinArticle
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
}
