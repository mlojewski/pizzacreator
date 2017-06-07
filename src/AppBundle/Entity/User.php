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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="surname", type="string", length=255)
     */
    private $surname;


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
     * @var bool
     *
     * @ORM\Column(name="vegetarian", type="boolean")
     */
    private $vegetarian;

    /**
     * @var bool
     *
     * @ORM\Column(name="vegan", type="boolean")
     */
    private $vegan;

    /**
    *@ORM\OneToMany(targetEntity = "pizza", mappedBy="creator")
    */

    private $pizzas;

    public function __construct()
    {
        parent::__construct();
        $this->pizzas = new ArrayCollection();
    }


    /**
     * Set name
     *
     * @param string $name
     * @return User
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
     * Set surname
     *
     * @param string $surname
     * @return User
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string 
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set phone
     *
     * @param integer $phone
     * @return User
     */
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
     * Set vegetarian
     *
     * @param boolean $vegetarian
     * @return User
     */
    public function setVegetarian($vegetarian)
    {
        $this->vegetarian = $vegetarian;

        return $this;
    }

    /**
     * Get vegetarian
     *
     * @return boolean 
     */
    public function getVegetarian()
    {
        return $this->vegetarian;
    }

    /**
     * Set vegan
     *
     * @param boolean $vegan
     * @return User
     */
    public function setVegan($vegan)
    {
        $this->vegan = $vegan;

        return $this;
    }

    /**
     * Get vegan
     *
     * @return boolean 
     */
    public function getVegan()
    {
        return $this->vegan;
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
