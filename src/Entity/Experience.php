<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="experience")
 * @ORM\Entity(repositoryClass="App\Repository\ExperienceRepository")
 * @ORM\EntityListeners({"App\EventListener\UpdateCurriculumListener"})
 */
class Experience
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="experiences")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user_id;

    /**
     * @Assert\Length(max="150")
     * @Assert\NotBlank()
     * @ORM\Column(type="string", length=150, nullable=false)
     */
    protected $title;

    /**
     * @Assert\Length(max="50")
     * @Assert\NotBlank()
     * @ORM\Column(type="string", length=50, nullable=false)
     */
    protected $company;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="text", nullable=false)
     */
    protected $description;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="date", nullable=false)
     */
    protected $period_start;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    protected $period_end;

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
     * Set title
     *
     * @param string $title
     *
     * @return Experience
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set company
     *
     * @param string $company
     *
     * @return Experience
     */
    public function setCompany($company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return string
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Experience
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
     * Set periodStart
     *
     * @param \DateTime $periodStart
     *
     * @return Experience
     */
    public function setPeriodStart($periodStart)
    {
        $this->period_start = $periodStart;

        return $this;
    }

    /**
     * Get periodStart
     *
     * @return \DateTime
     */
    public function getPeriodStart()
    {
        return $this->period_start;
    }

    /**
     * Set periodEnd
     *
     * @param \DateTime $periodEnd
     *
     * @return Experience
     */
    public function setPeriodEnd(\DateTime $periodEnd = null)
    {
        $this->period_end = $periodEnd;

        return $this;
    }

    /**
     * Get periodEnd
     *
     * @return \DateTime
     */
    public function getPeriodEnd()
    {
        return $this->period_end;
    }

    /**
     * Set userId
     *
     * @param \App\Entity\User $userId
     *
     * @return Experience
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
