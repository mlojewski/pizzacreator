<?php


namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Ingredient;
use AppBundle\Entity\Pizza;
use AppBundle\Form\PizzaType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;



class PizzaController extends Controller
{
  /**
   * @Route("/pizza")
   */
  public function pizzaAction(Request $request)
  {


    $pizza = new Pizza();
    $form = $this->createForm(PizzaType::class, $pizza);
    $form -> handleRequest($request);
    if ($form->isSubmitted() && $form ->isValid()) {
      $em = $this->getDoctrine()->getManager();
      foreach ($pizza->getIngredients() as $ingredient) {
        $ingredient->addPizza($pizza);
        $em->persist($ingredient);
      }
      $em->persist($pizza);
      $em->flush();
      $id = $pizza->getId();
      $url=$this->generateUrl('app_pizza_confirm', ['id' => $id]);
      return $this->redirect($url);
    }

      $allIngredients = $this->getDoctrine()->getRepository("AppBundle:Ingredient")->findAll();

    return $this->render('AppBundle:Pizza:showPizza.html.twig', ['form' => $form ->createView() , 'ingredients' => $allIngredients]);
  }
  /**
   * @Route("/confirmPizza/{id}")
   */

  public function confirmAction(Request $request, $id)
  {
      $onePizza = $this->getDoctrine()->getRepository("AppBundle:Pizza")->findOneById($id);
      $em = $this->getDoctrine()->getManager();
      $sumCash = 0;
      $sumCalories = 0;
      $sumWeight = 0;

      foreach ($onePizza->getIngredients() as $ingredient) {
        $sumCash += $ingredient->getPrice();
        $sumCalories += $ingredient->getCalories();
        $sumWeight += $ingredient->getWeight();
      }

      return $this->render('AppBundle:Pizza:confirmPizza.html.twig', array(
        'onePizza' =>$onePizza , 'sumCash' => $sumCash, 'sumCalories'=>$sumCalories, 'sumWeight'=>$sumWeight ));
  }
  /**
   * @Route("/generatePDF/{id}")
   */
  public function toPdfAction($id)
  {

    $onePizza = $this->getDoctrine()->getRepository("AppBundle:Pizza")->findOneById($id);
    $em = $this->getDoctrine()->getManager();
    $sumCash = 0;
    $sumCalories = 0;
    $sumWeight = 0;

    foreach ($onePizza->getIngredients() as $ingredient) {
      $sumCash += $ingredient->getPrice();
      $sumCalories += $ingredient->getCalories();
      $sumWeight += $ingredient->getWeight();
    }

  $this->get('knp_snappy.pdf')->generateFromHtml(
    $this->renderView('AppBundle:Pizza:confirmPizza.html.twig', array(
      'onePizza' =>$onePizza , 'sumCash' => $sumCash, 'sumCalories'=>$sumCalories, 'sumWeight'=>$sumWeight )),
    '/home/marcin/downloads/potwierdzenie'.$id.'.pdf');
  }

  /**
   * @Route("/sendmail/{id}")
   */
  public function emailAction($id)
  {
    $onePizza = $this->getDoctrine()->getRepository("AppBundle:Pizza")->findOneById($id);
    $em = $this->getDoctrine()->getManager();
    $sumCash = 0;
    $sumCalories = 0;
    $sumWeight = 0;

      foreach ($onePizza->getIngredients() as $ingredient) {
        $sumCash += $ingredient->getPrice();
        $sumCalories += $ingredient->getCalories();
        $sumWeight += $ingredient->getWeight();
      }
    $message =  \Swift_Message::newInstance()
         ->setFrom('mwlojewski@gmail.com')
         ->setTo('marcin.lojewski@madebykameleon.pl')
         ->setBody(
             $this->renderView(
                 // app/Resources/views/Emails/registration.html.twig
                 'AppBundle:Pizza:confirmPizza.html.twig',
                 array('onePizza' =>$onePizza , 'sumCash' => $sumCash, 'sumCalories'=>$sumCalories, 'sumWeight'=>$sumWeight,)
             ),
             'text/html'
         ) ;
     $this->get('mailer')->send($message);
     $url=$this->generateUrl('app_pizza_confirm', ['id' => $id]);
     return $this->redirect($url);
  }

}
