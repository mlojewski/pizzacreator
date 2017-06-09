<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Ingredient;
use AppBundle\Entity\Pizza;
use AppBundle\Form\IngredientType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class IngredientsController extends Controller
{
    /**
     * @Route("/addproduct")
     */
    public function AddAction(Request $request)
    {
        $ingredient = new Ingredient();
        $form = $this->createForm(IngredientType::class, $ingredient);
        $form ->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
          $em = $this->getDoctrine()->getManager();
          $em->persist($ingredient);
          $em->flush();
          $allIngredients = $this->getDoctrine()->getRepository("AppBundle:Ingredient")->findAll();
          return $this->render('AppBundle:Ingredients:show_all.html.twig', array(
            'allIngredients' =>$allIngredients ));
        }
      return $this->render("AppBundle:Ingredients:add.html.twig", array('form' => $form->createView()));
    }

    /**
     * @Route("/editproduct/{id}")
     */
    public function EditAction(Request $request, $id)
    {
          $oneIngredient = $this->getDoctrine()->getRepository("AppBundle:Ingredient")->findOneById($id);
          $allIngredients = $this->getDoctrine()->getRepository("AppBundle:Ingredient")->findAll();
          $form = $this->createForm(IngredientType::class, $oneIngredient);
          $form ->handleRequest($request);
          if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($oneIngredient);
            $em->flush();
            $allIngredients = $this->getDoctrine()->getRepository("AppBundle:Ingredient")->findAll();
            return $this->render('AppBundle:Ingredients:show_all.html.twig', array(
              'allIngredients' =>$allIngredients ));
          }
          return $this->render("AppBundle:Ingredients:edit.html.twig", array('form' => $form->createView(), 'oneIngredient' => $oneIngredient));
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
