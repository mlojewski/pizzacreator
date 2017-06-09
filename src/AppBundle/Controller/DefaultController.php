<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationChecker;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {

        return $this->render('AppBundle::main.html.twig');
    }

    /**
     * @Route("/admin", name="admin")
     */
     public function adminAction(Request $request)
     {
       $allUsers = $this->getDoctrine()->getRepository("AppBundle:User")->findAll();
       $allIngredients = $this->getDoctrine()->getRepository("AppBundle:Ingredient")->findAll();
       return $this->render('AppBundle::admin.html.twig', array('allUsers' =>$allUsers,  'allIngredients' =>$allIngredients));
     }


}
