<?php
namespace AppBundle\Entity;

use AppBundle\Utils\Gravatar;
use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity
 * @Vich\Uploadable
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     * @Assert\NotBlank(message="Please enter your name.", groups={"Registration", "Profile"})
     */
    protected $first_name;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $last_name;

    /**
     * @ORM\Column(type="text", length=250, nullable=true)
     */
    protected $headline;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $role;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $photo;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $background;

    /**
     * @ORM\Column(type="text", length=350, nullable=true)
     */
    protected $summary;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $country;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $state;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $city;

    /**
     * @ORM\Column(type="string", length=6, nullable=true)
     * @Assert\Choice({"male", "female"})
     */
    protected $gender;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    protected $birthday;

    /**
     * @ORM\OneToMany(targetEntity="UserSocialNetworking", mappedBy="user")
     */
    protected $user_social_networks;

    /**
     * @ORM\OneToMany(targetEntity="Education", mappedBy="user_id")
     */
    protected $educations;

    /**
     * @ORM\OneToMany(targetEntity="Experience", mappedBy="user_id")
     */
    protected $experiences;

    /**
     * @ORM\OneToMany(targetEntity="Skill", mappedBy="user_id")
     * @ORM\OrderBy({"priority" = "ASC"})
     */
    protected $skills;

    public function __construct(Gravatar $gravatar)
    {
        parent::__construct();

        $this->user_social_networks = new ArrayCollection();
        $this->educations = new ArrayCollection();
        $this->experiences = new ArrayCollection();
        $this->skills = new ArrayCollection();
    }

    /**
     * @return ArrayCollection
     */
    public function getUserSocialNetworks()
    {
        return $this->user_social_networks;
    }

    public function setUserSocialNetworks(UserSocialNetworking $socialNetworking)
    {
        $socialNetworking->setUser($this);
        $this->getUserSocialNetworks()->add($socialNetworking);
    }

    public function removeUserSocialNetworks(UserSocialNetworking $socialNetworking)
    {
        $this->getUserSocialNetworks()->removeElement($socialNetworking);
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getEducations()
    {
        return $this->educations;
    }

    /**
     * @param Education $education
     * @return User
     */
    public function addEducations(Education $education)
    {
        if(!$this->educations->contains($education))
            $this->educations->add($education);

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getExperiences()
    {
        return $this->experiences;
    }

    /**
     * @param Experience $experience
     * @return User
     */
    public function addExperiences(Experience $experience)
    {
        if(!$this->experiences->contains($experience))
            $this->experiences->add($experience);

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getSkills()
    {
        return $this->skills;
    }

    /**
     * @param Skill $skill
     * @return User
     */
    public function addSkills(Skill $skill)
    {
        if(!$this->skills->contains($skill))
            $this->skills->add($skill);

        return $this;
    }


    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     * @return User
     */
    public function setCountry($country)
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     * @return User
     */
    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * @param mixed $birthday
     * @return User
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @param mixed $first_name
     * @return User
     */
    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @param mixed $last_name
     * @return User
     */
    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getHeadline()
    {
        return $this->headline;
    }

    /**
     * @param mixed $headline
     * @return User
     */
    public function setHeadline($headline)
    {
        $this->headline = $headline;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     * @return User
     */
    public function setRole($role)
    {
        $this->role = $role;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param mixed $gender
     * @return User
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param mixed $photo
     * @return User
     */
    public function setPhoto($photo)
    {

        $this->photo = $photo;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBackground()
    {
        return $this->background;
    }

    /**
     * @param mixed $background
     * @return User
     */
    public function setBackground($background)
    {
        $this->background = $background;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * @param mixed $summary
     * @return User
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param mixed $state
     * @return User
     */
    public function setState($state)
    {
        $this->state = $state;
        return $this;
    }
}
