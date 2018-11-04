<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ListController extends Controller
{
    /**
     * @Route("/", name="welcome")
     */
    //page d'acceuil
    public function showAction(Request $request)
    {
        $allstages = $this->getDoctrine()
            ->getRepository('AppBundle:Stage')->findall();

        return $this->render('default/index.html.twig', array('stages' => $allstages));
    }



    /**
     * @Route("/stage/{id}", name="stage")
     * @Method("GET")
     */
    public function stageaffichAction($id)
    {
        $elstage = $this->getDoctrine()
            ->getRepository('AppBundle:Stage')->findOneBy(array('idStage' => $id));

        return $this->render('default/stage.html.twig', array('elstage' => $elstage));
    }



    /**
     * @Route("/etudiant/passya", name="passya")
     *
     */
    public function passyaAction()
    {
        return $this->render('default/passya.html.twig');
    }
}