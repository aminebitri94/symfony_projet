<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Demande
 *
 * @ORM\Table(name="demande", indexes={@ORM\Index(name="IDX_2694D7A56B3CA4B", columns={"id_user"}), @ORM\Index(name="IDX_2694D7A52CF9D259", columns={"id_stage"})})
 * @ORM\Entity
 */
class Demande
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     * })
     */
    private $idUser;

    /**
     * @var \AppBundle\Entity\Stage
     *
     * @ORM\ManyToOne(targetEntity="Stage")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_stage", referencedColumnName="id_stage")
     * })
     */
    private $idStage;



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
     * Set idUser
     *
     * @param \AppBundle\Entity\User $idUser
     *
     * @return Demande
     */
    public function setIdUser(\AppBundle\Entity\User $idUser = null)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return \AppBundle\Entity\User
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set idStage
     *
     * @param \AppBundle\Entity\Stage $idStage
     *
     * @return Demande
     */
    public function setIdStage(\AppBundle\Entity\Stage $idStage = null)
    {
        $this->idStage = $idStage;

        return $this;
    }

    /**
     * Get idStage
     *
     * @return \AppBundle\Entity\Stage
     */
    public function getIdStage()
    {
        return $this->idStage;
    }
}
