<?php

namespace AppBundle\Entity;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * @ORM\Entity
 */

class Pizza
{
  /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $id;

  /**
  *@ORM\ManyToMany(targetEntity="Ingredient", mappedBy = "pizzas")
  **/
  private $ingredients;

  /**
  *@ORM\ManyToOne(targetEntity="User", inversedBy = "pizzas")
  **/

  private $creator;

  function __construct()
  {
    $this->ingredients = new ArrayCollection();
    # code...
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
     * Add ingredients
     *
     * @param \AppBundle\Entity\Ingredient $ingredients
     * @return Pizza
     */
    public function addIngredient(\AppBundle\Entity\Ingredient $ingredients)
    {
        $this->ingredients[] = $ingredients;

        return $this;
    }

    /**
     * Remove ingredients
     *
     * @param \AppBundle\Entity\Ingredient $ingredients
     */
    public function removeIngredient(\AppBundle\Entity\Ingredient $ingredients)
    {
        $this->ingredients->removeElement($ingredients);
    }

    /**
     * Get ingredients
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIngredients()
    {
        return $this->ingredients;
    }

    /**
     * Set creator
     *
     * @param \AppBundle\Entity\User $creator
     * @return Pizza
     */
    public function setCreator(\AppBundle\Entity\User $creator = null)
    {
        $this->creator = $creator;

        return $this;
    }

    /**
     * Get creator
     *
     * @return \AppBundle\Entity\User 
     */
    public function getCreator()
    {
        return $this->creator;
    }
}
