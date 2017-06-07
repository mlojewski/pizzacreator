<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * Ingredient
 *
 * @ORM\Table(name="ingredient")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\IngredientRepository")
 */
class Ingredient
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="decimal", precision=10, scale=2)
     */
    private $price;

    /**
     * @var int
     *
     * @ORM\Column(name="weight", type="integer")
     */
    private $weight;

    /**
     * @var int
     *
     * @ORM\Column(name="calories", type="integer")
     */
    private $calories;

    /**
     * @var bool
     *
     * @ORM\Column(name="vegan", type="boolean")
     */
    private $vegan;

    /**
     * @var bool
     *
     * @ORM\Column(name="vegetarian", type="boolean")
     */
    private $vegetarian;

    /**
    *@ORM\ManyToMany(targetEntity="Pizza", inversedBy = "ingredients")
    **/
    private $pizzas;

     public function __construct()
     {
      $this->pizas = new ArrayCollection();
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
     * @return Ingredient
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
     * Set price
     *
     * @param string $price
     * @return Ingredient
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set weight
     *
     * @param integer $weight
     * @return Ingredient
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get weight
     *
     * @return integer
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set calories
     *
     * @param integer $calories
     * @return Ingredient
     */
    public function setCalories($calories)
    {
        $this->calories = $calories;

        return $this;
    }

    /**
     * Get calories
     *
     * @return integer
     */
    public function getCalories()
    {
        return $this->calories;
    }

    /**
     * Set vegan
     *
     * @param boolean $vegan
     * @return Ingredient
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
     * Set vegetarian
     *
     * @param boolean $vegetarian
     * @return Ingredient
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
     * Add pizzas
     *
     * @param \AppBundle\Entity\Pizza $pizzas
     * @return Ingredient
     */
    public function addPizza(\AppBundle\Entity\Pizza $pizzas)
    {
        $this->pizzas[] = $pizzas;

        return $this;
    }

    /**
     * Remove pizzas
     *
     * @param \AppBundle\Entity\Pizza $pizzas
     */
    public function removePizza(\AppBundle\Entity\Pizza $pizzas)
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
