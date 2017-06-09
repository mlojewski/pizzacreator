

document.addEventListener('DOMContentLoaded',function(){
  var button = document.querySelector('#mainBtn')
  document.addEventListener('click', function (event) {
      if (event.target.id=='mainBtn') {
        window.location = "/logout"}
        else if (event.target.id=='newBtn') {
          window.location = "/pizza"
        }

//         else if (event.target.id=='pdfBtn') {
//           $this->get('knp_snappy.pdf')->generateFromHtml(
//     $this->renderView(
//         'AppBundle:Pizza:confirmPizza.html.twig',
//
//     ),
//     '/home/marcin/Workspace/pizzacreator/file.pdf'
// );
//
//         }
  //
  //       $message = new \Swift_Message('Hello Email')
  //      ->setFrom('send@example.com')
  //      ->setTo('m.lojewski@plfa.pl')
  //      ->setBody(
  //          $this->renderView(
  //              // app/Resources/views/Emails/registration.html.twig
  //              'AppBundle:Pizza:confirmPizza.html.twig',
  //              array('onePizza' =>$onePizza , 'sumCash' => $sumCash, 'sumCalories'=>$sumCalories, 'sumWeight'=>$sumWeight,)
  //          ),
  //          'text/html'
  //      ) ;
  //  $this->get('mailer')->send($message);
   //
  //  return $this->render(...);

  });
});
