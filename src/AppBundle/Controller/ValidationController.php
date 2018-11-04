<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Stage;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ValidationController extends Controller
{


    /**
     * @Route("/entrepriseshow", name="entrepriseshow")
     */
    public function entrepriseshowAction(Request $request)
    {
        return $this->render('default/entrepriseshow.html.twig',array('form' => $form ));
    }


}