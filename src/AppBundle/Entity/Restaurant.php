<?php

namespace AppBundle\Entity;

/**
 * Restaurant
 */
class Restaurant
{

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $description;

    /**
     * @var \DateTime
     */
    private $openingDate;

    /**
     * @var string
     */
    private $address;

    /**
     * @var string
     */
    private $status;

    /**
     * @var string
     */
    private $webUrl;

    /**
     * @var string
     */
    private $tripAdvisorUrl;

    /**
     * @var string
     */
    private $facebookUrl;

    /**
     * @var string
     */
    private $phone;

    /**
     * @var string
     */
    private $phone2;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $slug;

    /**
     * @var string
     */
    private $postalCode;

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $foodType;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $medias;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $serviceOpenings;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $serviceOpeningExceptions;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $baptisms;

    /**
     * @var \UserBundle\Entity\User
     */
    private $user;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->medias = new \Doctrine\Common\Collections\ArrayCollection();
        $this->serviceOpenings = new \Doctrine\Common\Collections\ArrayCollection();
        $this->serviceOpeningExceptions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->baptisms = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     *
     * @return Restaurant
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
     * Set description
     *
     * @param string $description
     *
     * @return Restaurant
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
     * Set openingDate
     *
     * @param \DateTime $openingDate
     *
     * @return Restaurant
     */
    public function setOpeningDate($openingDate)
    {
        $this->openingDate = $openingDate;

        return $this;
    }

    /**
     * Get openingDate
     *
     * @return \DateTime
     */
    public function getOpeningDate()
    {
        return $this->openingDate;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return Restaurant
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return Restaurant
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set webUrl
     *
     * @param string $webUrl
     *
     * @return Restaurant
     */
    public function setWebUrl($webUrl)
    {
        $this->webUrl = $webUrl;

        return $this;
    }

    /**
     * Get webUrl
     *
     * @return string
     */
    public function getWebUrl()
    {
        return $this->webUrl;
    }

    /**
     * Set tripAdvisorUrl
     *
     * @param string $tripAdvisorUrl
     *
     * @return Restaurant
     */
    public function setTripAdvisorUrl($tripAdvisorUrl)
    {
        $this->tripAdvisorUrl = $tripAdvisorUrl;

        return $this;
    }

    /**
     * Get tripAdvisorUrl
     *
     * @return string
     */
    public function getTripAdvisorUrl()
    {
        return $this->tripAdvisorUrl;
    }

    /**
     * Set facebookUrl
     *
     * @param string $facebookUrl
     *
     * @return Restaurant
     */
    public function setFacebookUrl($facebookUrl)
    {
        $this->facebookUrl = $facebookUrl;

        return $this;
    }

    /**
     * Get facebookUrl
     *
     * @return string
     */
    public function getFacebookUrl()
    {
        return $this->facebookUrl;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return Restaurant
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set phone2
     *
     * @param string $phone2
     *
     * @return Restaurant
     */
    public function setPhone2($phone2)
    {
        $this->phone2 = $phone2;

        return $this;
    }

    /**
     * Get phone2
     *
     * @return string
     */
    public function getPhone2()
    {
        return $this->phone2;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Restaurant
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return Restaurant
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set postalCode
     *
     * @param string $postalCode
     *
     * @return Restaurant
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * Get postalCode
     *
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return Restaurant
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set foodType
     *
     * @param string $foodType
     *
     * @return Restaurant
     */
    public function setFoodType($foodType)
    {
        $this->foodType = $foodType;

        return $this;
    }

    /**
     * Get foodType
     *
     * @return string
     */
    public function getFoodType()
    {
        return $this->foodType;
    }

    /**
     * Add media
     *
     * @param \AppBundle\Entity\Media $media
     *
     * @return Restaurant
     */
    public function addMedia(\AppBundle\Entity\Media $media)
    {
        $this->medias[] = $media;

        return $this;
    }

    /**
     * Remove media
     *
     * @param \AppBundle\Entity\Media $media
     */
    public function removeMedia(\AppBundle\Entity\Media $media)
    {
        $this->medias->removeElement($media);
    }

    /**
     * Get medias
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMedias()
    {
        return $this->medias;
    }

    /**
     * Add serviceOpening
     *
     * @param \AppBundle\Entity\ServiceOpening $serviceOpening
     *
     * @return Restaurant
     */
    public function addServiceOpening(\AppBundle\Entity\ServiceOpening $serviceOpening)
    {
        $this->serviceOpenings[] = $serviceOpening;

        return $this;
    }

    /**
     * Remove serviceOpening
     *
     * @param \AppBundle\Entity\ServiceOpening $serviceOpening
     */
    public function removeServiceOpening(\AppBundle\Entity\ServiceOpening $serviceOpening)
    {
        $this->serviceOpenings->removeElement($serviceOpening);
    }

    /**
     * Get serviceOpenings
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getServiceOpenings()
    {
        return $this->serviceOpenings;
    }

    /**
     * Add serviceOpeningException
     *
     * @param \AppBundle\Entity\ServiceOpeningException $serviceOpeningException
     *
     * @return Restaurant
     */
    public function addServiceOpeningException(\AppBundle\Entity\ServiceOpeningException $serviceOpeningException)
    {
        $this->serviceOpeningExceptions[] = $serviceOpeningException;

        return $this;
    }

    /**
     * Remove serviceOpeningException
     *
     * @param \AppBundle\Entity\ServiceOpeningException $serviceOpeningException
     */
    public function removeServiceOpeningException(\AppBundle\Entity\ServiceOpeningException $serviceOpeningException)
    {
        $this->serviceOpeningExceptions->removeElement($serviceOpeningException);
    }

    /**
     * Get serviceOpeningExceptions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getServiceOpeningExceptions()
    {
        return $this->serviceOpeningExceptions;
    }

    /**
     * Add baptism
     *
     * @param \AppBundle\Entity\Baptism $baptism
     *
     * @return Restaurant
     */
    public function addBaptism(\AppBundle\Entity\Baptism $baptism)
    {
        $this->baptisms[] = $baptism;

        return $this;
    }

    /**
     * Remove baptism
     *
     * @param \AppBundle\Entity\Baptism $baptism
     */
    public function removeBaptism(\AppBundle\Entity\Baptism $baptism)
    {
        $this->baptisms->removeElement($baptism);
    }

    /**
     * Get baptisms
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBaptisms()
    {
        return $this->baptisms;
    }

    /**
     * Set user
     *
     * @param \UserBundle\Entity\User $user
     *
     * @return Restaurant
     */
    public function setUser(\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
