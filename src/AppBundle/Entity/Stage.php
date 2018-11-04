<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Stage
 *
 * @ORM\Table(name="stage", indexes={@ORM\Index(name="id_entreprise", columns={"id_entreprise"}), @ORM\Index(name="skills", columns={"skills"})})
 * @ORM\Entity
 */
class Stage
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_stage", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idStage;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_stage", type="string", length=50, nullable=false)
     */
    private $nomStage;

    /**
     * @var string
     *
     * @ORM\Column(name="dure", type="string", length=255, nullable=false)
     */
    private $dure;

    /**
     * @var string
     *
     * @ORM\Column(name="skills", type="string", length=255, nullable=false)
     */
    private $skills;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var \AppBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_entreprise", referencedColumnName="id")
     * })
     */
    private $idEntreprise;



    /**
     * Get idStage
     *
     * @return integer
     */
    public function getIdStage()
    {
        return $this->idStage;
    }

    /**
     * Set nomStage
     *
     * @param string $nomStage
     *
     * @return Stage
     */
    public function setNomStage($nomStage)
    {
        $this->nomStage = $nomStage;

        return $this;
    }

    /**
     * Get nomStage
     *
     * @return string
     */
    public function getNomStage()
    {
        return $this->nomStage;
    }

    /**
     * Set dure
     *
     * @param string $dure
     *
     * @return Stage
     */
    public function setDure($dure)
    {
        $this->dure = $dure;

        return $this;
    }

    /**
     * Get dure
     *
     * @return string
     */
    public function getDure()
    {
        return $this->dure;
    }

    /**
     * Set skills
     *
     * @param string $skills
     *
     * @return Stage
     */
    public function setSkills($skills)
    {
        $this->skills = $skills;

        return $this;
    }

    /**
     * Get skills
     *
     * @return string
     */
    public function getSkills()
    {
        return $this->skills;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return Stage
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Stage
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set idEntreprise
     *
     * @param \AppBundle\Entity\User $idEntreprise
     *
     * @return Stage
     */
    public function setIdEntreprise(\AppBundle\Entity\User $idEntreprise = null)
    {
        $this->idEntreprise = $idEntreprise;

        return $this;
    }

    /**
     * Get idEntreprise
     *
     * @return \AppBundle\Entity\User
     */
    public function getIdEntreprise()
    {
        return $this->idEntreprise;
    }
}
