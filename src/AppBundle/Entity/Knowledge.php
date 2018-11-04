<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Knowledge
 *
 * @ORM\Table(name="knowledge", uniqueConstraints={@ORM\UniqueConstraint(name="id_skill_2", columns={"id_skill"})}, indexes={@ORM\Index(name="id_user", columns={"id_user"}), @ORM\Index(name="id_skill_3", columns={"id_skill"}), @ORM\Index(name="id_user_2", columns={"id_user"})})
 * @ORM\Entity
 */
class Knowledge
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
     * @var \Skill
     *
     * @ORM\ManyToOne(targetEntity="Skill")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_skill", referencedColumnName="id")
     * })
     */
    private $idSkill;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     * })
     */
    private $idUser;



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
     * Set idSkill
     *
     * @param \AppBundle\Entity\Skill $idSkill
     *
     * @return Knowledge
     */
    public function setIdSkill(\AppBundle\Entity\Skill $idSkill = null)
    {
        $this->idSkill = $idSkill;

        return $this;
    }

    /**
     * Get idSkill
     *
     * @return \AppBundle\Entity\Skill
     */
    public function getIdSkill()
    {
        return $this->idSkill;
    }

    /**
     * Set idUser
     *
     * @param \AppBundle\Entity\User $idUser
     *
     * @return Knowledge
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
}
