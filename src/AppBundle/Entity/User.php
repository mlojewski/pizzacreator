<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
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
     * @var int
     *
     * @ORM\Column(name="phone", type="integer")
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     */
    private $address;



    /**
    *@ORM\OneToMany(targetEntity = "Pizza", mappedBy="creator")
    */

    private $pizzas;

    public function __construct()
    {
        parent::__construct();
        $this->pizzas = new ArrayCollection();
    }



    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return integer
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return User
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
     * Add pizzas
     *
     * @param \AppBundle\Entity\pizza $pizzas
     * @return User
     */
    public function addPizza(\AppBundle\Entity\pizza $pizzas)
    {
        $this->pizzas[] = $pizzas;

        return $this;
    }

    /**
     * Remove pizzas
     *
     * @param \AppBundle\Entity\pizza $pizzas
     */
    public function removePizza(\AppBundle\Entity\pizza $pizzas)
    {
        $this->pizzas->removeElement($pizzas);
    }

    /**
     * Get pizzas
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPizzas()
    {
        return $this->pizzas;
    }
}
