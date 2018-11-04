<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Demande;
use AppBundle\Entity\Knowledge;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class EtudiantController extends Controller
{

    /**
     * @Route("/profil", name="profil")
     */
    public function profilAction(Request $request)
    {
        $ajout_skill = $request->request->get('ajout_skill');//nv skill ajouter par user formulaire



        $userskills = $this->getDoctrine()
            ->getRepository('AppBundle:Knowledge')
            ->findBy(array('idUser' => $this->getUser()));//get user all skills

        $allskills = $this->getDoctrine()
            ->getRepository('AppBundle:Skill')->findall();

        if($ajout_skill != NULL)
        {
            $skill = $this->getDoctrine()
                ->getRepository('AppBundle:Skill')
                ->findOneBy(array('skill' => $ajout_skill));


            $knowledge = new Knowledge();
            $knowledge->setIdUser($this->getUser());
            $knowledge->setIdSkill($skill);
            $em = $this->getDoctrine()->getManager();
            $em->persist($knowledge);
            $em->flush();

            return $this->render('default/profil.html.twig', array('userskills' => $userskills,'allskills' => $allskills));
        }

        return $this->render('default/profil.html.twig', array('userskills' => $userskills,'allskills' => $allskills));
    }

    /**
     * @Route("/cherchestage", name="cherchestage")
     */
    //dans l'input n7otou nom pour chercher un stage
    public function cherchestageAction(Request $request)
    {
        $stagename = $request->request->get('achercher');//54ina l'input feha nom
        $staget = $this->getDoctrine()
            ->getRepository('AppBundle:Stage')->findOneBy(array('nomStage' => $stagename));//TODO findall



        return $this->render('default/cherchestage.html.twig', array('stagename' => $staget));
    }


    /**
     * @Route("/submit/{idstage}", name="submit")
     * @Method("post")
     * @param $idstage
     * @return \Symfony\Component\HttpFoundation\Response
     */
    //application stage (demande de stage)
    public function submitAction($idstage   )
    {
        $stage = $this->getDoctrine()
            ->getRepository('AppBundle:Stage')->findOneBy(array('idStage' => $idstage));

        $demande = new Demande();
        $demande->setIdUser($this->getUser());
        $demande->setIdStage($stage);
        $em = $this->getDoctrine()->getManager();
        $em->persist($demande);
        $em->flush();

        return $this->forward('AppBundle:List:show');
    }








}