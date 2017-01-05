<?php

namespace AppBundle\Entity;

/**
 * BaptemHasUser
 */
class BaptemHasUser
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var bool
     */
    private $role;


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
     * Set role
     *
     * @param boolean $role
     *
     * @return BaptemHasUser
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return bool
     */
    public function getRole()
    {
        return $this->role;
    }
}
