<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Ingredient;


class IngredientsController extends Controller
{
    /**
     * @Route("/addproduct")
     */
    public function AddAction(Request $request)
    {
        $ingredient = new Ingredient();
        $form = $this->createFormBuilder($ingredient)
        ->add("name", "text")->add("price", "integer")
        ->add("weight", "integer")->add("calories", "integer")
        ->add("vegetarian", "checkbox")->add("vegan", "checkbox")
        ->add('save', 'submit', array('label' => 'Create Task'))->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
          $ingredient = $form ->getData();
          $em->persist($ingredient);
          $em->flush();
        }
      return $this->redirectToRoute("app_ingredients_showall");
    }

    /**
     * @Route("/editproduct")
     */
    public function EditAction()
    {
        return $this->render('AppBundle:Ingredients:edit.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/allproducts")
     */
    public function ShowAllAction()
    {
      $allIngredients = $this->getDoctrine()->getRepository("AppBundle:Ingredient")->findAll();
      return $this->render('AppBundle:Ingredients:show_all.html.twig', array(
        'allIngredients' =>$allIngredients ));
    }

}
