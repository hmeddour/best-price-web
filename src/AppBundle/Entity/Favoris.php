<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Favoris
 *
 * @ORM\Table(name="favoris", indexes={@ORM\Index(name="id_utilisateur", columns={"id_utilisateur"}), @ORM\Index(name="id_capture", columns={"id_capture"})})
 * @ORM\Entity
 */
class Favoris
{
    /**
     * @var integer
     *
     * @ORM\Column(name="notification", type="integer", nullable=false)
     */
    private $notification;

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
     * @var \AppBundle\Entity\Capture
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Capture")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_capture", referencedColumnName="id")
     * })
     */
    private $idCapture;



    /**
     * Set notification
     *
     * @param integer $notification
     *
     * @return Favoris
     */
    public function setNotification($notification)
    {
        $this->notification = $notification;

        return $this;
    }

    /**
     * Get notification
     *
     * @return integer
     */
    public function getNotification()
    {
        return $this->notification;
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
     * @return Favoris
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
     * Set idCapture
     *
     * @param \AppBundle\Entity\Capture $idCapture
     *
     * @return Favoris
     */
    public function setIdCapture(\AppBundle\Entity\Capture $idCapture = null)
    {
        $this->idCapture = $idCapture;

        return $this;
    }

    /**
     * Get idCapture
     *
     * @return \AppBundle\Entity\Capture
     */
    public function getIdCapture()
    {
        return $this->idCapture;
    }
}
