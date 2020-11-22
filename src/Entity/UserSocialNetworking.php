<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(
 *     name="user_social_networking",
 *     uniqueConstraints={
 *          @ORM\UniqueConstraint(
 *              name="relations_idx",
 *              columns={"user_id", "social_networking_id"})
 *      }
 * )
 * @ORM\Entity(repositoryClass="App\Repository\UserSocialNetworkingRepository")
 * @ORM\EntityListeners({"App\EventListener\UpdateCurriculumListener"})
 * @UniqueEntity("social_networking")
 */
class UserSocialNetworking
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="integer")
     */
    protected $user_id;

    /**
     * @ORM\Column(type="integer")
     */
    protected $social_networking_id;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="user_social_networks")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;

    /**
     * @ORM\ManyToOne(targetEntity="SocialNetworking", inversedBy="user_social_networks", fetch="EAGER")
     * @ORM\JoinColumn(name="social_networking_id", referencedColumnName="id")
     */
    protected $social_networking;

    /**
     * @Assert\Length(max="200")
     * @ORM\Column(type="string", length=200)
     */
    protected $link;

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
     * @param UserInterface $user
     * @return UserSocialNetworking
     */
    public function setUser(UserInterface $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set socialNetworkingId
     *
     * @param integer $socialNetworkingId
     *
     * @return UserSocialNetworking
     */
    public function setSocialNetworkingId($socialNetworkingId)
    {
        $this->social_networking_id = $socialNetworkingId;

        return $this;
    }

    /**
     * Get socialNetworkingId
     *
     * @return integer
     */
    public function getSocialNetworkingId()
    {
        return $this->social_networking_id;
    }

    /**
     * Set link
     *
     * @param string $link
     *
     * @return UserSocialNetworking
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param SocialNetworking|null $socialNetworking
     * @return $this
     */
    public function setSocialNetworking(SocialNetworking $socialNetworking = null)
    {
        $this->social_networking = $socialNetworking;

        return $this;
    }

    /**
     * Get socialNetworking
     *
     * @return SocialNetworking
     */
    public function getSocialNetworking()
    {
        return $this->social_networking;
    }
}
