<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CarteFidelite
 *
 * @ORM\Table(name="carte_fidelite", indexes={@ORM\Index(name="id_utilisateur", columns={"id_utilisateur"}), @ORM\Index(name="id_enseigne", columns={"id_enseigne"})})
 * @ORM\Entity
 */
class CarteFidelite
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeBarresCarteFidelite", type="string", length=255, nullable=false)
     */
    private $codebarrescartefidelite;

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
     * @var \AppBundle\Entity\Enseigne
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Enseigne")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_enseigne", referencedColumnName="id")
     * })
     */
    private $idEnseigne;



    /**
     * Set codebarrescartefidelite
     *
     * @param string $codebarrescartefidelite
     *
     * @return CarteFidelite
     */
    public function setCodebarrescartefidelite($codebarrescartefidelite)
    {
        $this->codebarrescartefidelite = $codebarrescartefidelite;

        return $this;
    }

    /**
     * Get codebarrescartefidelite
     *
     * @return string
     */
    public function getCodebarrescartefidelite()
    {
        return $this->codebarrescartefidelite;
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
     * @return CarteFidelite
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
     * Set idEnseigne
     *
     * @param \AppBundle\Entity\Enseigne $idEnseigne
     *
     * @return CarteFidelite
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
