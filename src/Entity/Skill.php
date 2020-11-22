<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="skill")
 * @ORM\Entity(repositoryClass="App\Repository\SkillRepository")
 * @ORM\EntityListeners({"App\EventListener\UpdateCurriculumListener"})
 */
class Skill
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="skills")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user_id;

    /**
     * @Assert\Length(max="50")
     * @ORM\Column(name="name", type="string", length=50)
     */
    private $name;

    /**
     * @var int
     * @Assert\Range(min = 0, max = 100)
     * @ORM\Column(name="level_experience", type="smallint")
     */
    private $levelExperience;

    /**
     * @ORM\Column(name="priority", type="smallint", nullable=true)
     */
    private $priority;

    /**
     * @var bool
     *
     * @ORM\Column(name="status", type="boolean")
     */
    private $status = true;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Skill
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set levelExperience
     *
     * @param integer $levelExperience
     *
     * @return Skill
     */
    public function setLevelExperience($levelExperience)
    {
        $this->levelExperience = $levelExperience;

        return $this;
    }

    /**
     * Get levelExperience
     *
     * @return int
     */
    public function getLevelExperience()
    {
        return $this->levelExperience;
    }

    /**
     * Set priority
     *
     * @param integer $priority
     *
     * @return Skill
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * Get priority
     *
     * @return int
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * Set status
     *
     * @param boolean $status
     *
     * @return Skill
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return bool
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set userId
     *
     * @param \App\Entity\User $userId
     *
     * @return Skill
     */
    public function setUserId(\App\Entity\User $userId = null)
    {
        $this->user_id = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return \App\Entity\User
     */
    public function getUserId()
    {
        return $this->user_id;
    }
}
