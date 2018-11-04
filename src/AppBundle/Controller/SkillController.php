<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Skill;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SkillController extends Controller
{

    /**
     * @Route("/addskill", name="addskill")
     */
    public function addskillAction(Request $request)
    {
        $skill = new Skill();
        $form = $this->createForm('AppBundle\Form\SkillType', $skill  );
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {




            $em = $this->getDoctrine()->getManager();
            $em->persist($skill);
            $em->flush();


            return $this->forward('AppBundle:List:show');
        }




        return $this->render('default/addskill.html.twig',array('form' => $form->createView()));
    }


}