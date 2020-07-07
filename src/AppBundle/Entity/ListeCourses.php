<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ListeCourses
 *
 * @ORM\Table(name="liste_courses", indexes={@ORM\Index(name="id_utilisateur", columns={"id_utilisateur"})})
 * @ORM\Entity
 */
class ListeCourses
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=false)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_liste", type="text", length=65535, nullable=false)
     */
    private $nomListe;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_liste", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idListe;

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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return ListeCourses
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
     * Set nomListe
     *
     * @param string $nomListe
     *
     * @return ListeCourses
     */
    public function setNomListe($nomListe)
    {
        $this->nomListe = $nomListe;

        return $this;
    }

    /**
     * Get nomListe
     *
     * @return string
     */
    public function getNomListe()
    {
        return $this->nomListe;
    }

    /**
     * Get idListe
     *
     * @return integer
     */
    public function getIdListe()
    {
        return $this->idListe;
    }

    /**
     * Set idUtilisateur
     *
     * @param \AppBundle\Entity\Utilisateur $idUtilisateur
     *
     * @return ListeCourses
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
}
