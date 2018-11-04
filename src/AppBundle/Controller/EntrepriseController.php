<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Stage;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class EntrepriseController extends Controller
{


    /**
     * @Route("/addstage", name="addstage")
     */
    //ajout stage de l'entreprise
    public function addstageAction(Request $request)
    {
        $stage = new Stage();
        $form = $this->createForm('AppBundle\Form\StageType', $stage  );
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {

            $stage->setIdEntreprise($this->getUser());


            $em = $this->getDoctrine()->getManager();
            $em->persist($stage);
            $em->flush();



            return $this->forward('AppBundle:List:show');
        }

        return $this->render('default/addstage.html.twig',array('form' => $form->createView()));
    }

    /**
     * @Route("/notrestages", name="notrestages")
     */
    //fonction de l'entreprise pour afficher les stages proposer de l'entreprise
    public function notrestagesAction(Request $request)
    {
        $notrestages = $this->getDoctrine()
            ->getRepository('AppBundle:Stage')->findBy(array('idEntreprise' => $this->getUser()));

        return $this->render('default/notrestages.html.twig',array('notrestages' => $notrestages ));
    }


    /**
     * @Route("/select/{id}", name="select")
     * @Method("GET")
     */
    //ne54ou id de stage pour chercher dans l'entiter demande les user's qui ont envoyé des demandes de ce stage
    public function selectAction($id)
    {
        //$listetudiant heya liste demande bch na3rfou beha les etudiant eli 3amlou demande
        $listetudiant = $this->getDoctrine()
            ->getRepository('AppBundle:Demande')->findBy(array('idStage' => $id));

        return $this->render('default/select.html.twig', array('listetudiant' => $listetudiant));
    }


    /**
     * @Route("/validi/{id}/{user}", name="validi")
     * @Method("post")
     */
    //apres validation nab3thou mail lel user
    public function validiAction($id ,$user ,\Swift_Mailer $mailer)
    {

       /* $mailer = $this->container->get('mailer');
        $transport = \Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, 'ssl')
            ->setUsername('aminebitri500@gmail.com')
            ->setPassword('20222222');
        $mailer = \Swift_Mailer::newInstance($transport);
        $message = \Swift_Message::newInstance('Test')
            ->setSubject('about stage')
            ->setFrom('aminebitri500@gmail.com')
            ->setTo("aminebitri505@gmail.com")
            ->setBody("congrats te9belt");
        $this->get('mailer')->send($message);  */


        $message = (new \Swift_Message('Hello Email'))
            ->setFrom('aminebitri500@gmail.com')
            ->setTo('aminebitri505@gmail.com')
            ->setBody("congrats te9belt")
        ;

        $mailer->send($message);


        return $this->forward('AppBundle:List:show');
    }



}