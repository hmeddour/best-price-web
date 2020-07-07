<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ListeArticle
 *
 * @ORM\Table(name="liste_article", indexes={@ORM\Index(name="id_liste", columns={"id_liste"})})
 * @ORM\Entity
 */
class ListeArticle
{
    /**
     * @var integer
     *
     * @ORM\Column(name="nbr_article", type="integer", nullable=false)
     */
    private $nbrArticle;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_article", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idArticle;

    /**
     * @var \AppBundle\Entity\ListeCourses
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\ListeCourses")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_liste", referencedColumnName="id_liste")
     * })
     */
    private $idListe;



    /**
     * Set nbrArticle
     *
     * @param integer $nbrArticle
     *
     * @return ListeArticle
     */
    public function setNbrArticle($nbrArticle)
    {
        $this->nbrArticle = $nbrArticle;

        return $this;
    }

    /**
     * Get nbrArticle
     *
     * @return integer
     */
    public function getNbrArticle()
    {
        return $this->nbrArticle;
    }

    /**
     * Set idArticle
     *
     * @param integer $idArticle
     *
     * @return ListeArticle
     */
    public function setIdArticle($idArticle)
    {
        $this->idArticle = $idArticle;

        return $this;
    }

    /**
     * Get idArticle
     *
     * @return integer
     */
    public function getIdArticle()
    {
        return $this->idArticle;
    }

    /**
     * Set idListe
     *
     * @param \AppBundle\Entity\ListeCourses $idListe
     *
     * @return ListeArticle
     */
    public function setIdListe(\AppBundle\Entity\ListeCourses $idListe)
    {
        $this->idListe = $idListe;

        return $this;
    }

    /**
     * Get idListe
     *
     * @return \AppBundle\Entity\ListeCourses
     */
    public function getIdListe()
    {
        return $this->idListe;
    }
}
