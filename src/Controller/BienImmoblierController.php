<?php

namespace App\Controller;

use App\Entity\BienImmoblier;
use App\Form\BienImmoblierType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BienImmoblierController extends AbstractController
{
    /**
     * @Route("/bien/immoblier", name="bien_immoblier")
     */
    public function index(): Response
    {
        return $this->render('bien_immoblier/index.html.twig', [
            'controller_name' => 'BienImmoblierController',
        ]);
    }

    /**
     * @Route("/addBienImmoblier", name="addBienImmoblier")
     */
    public function addBienImmoblier(Request $request){
        $bienimmoblier=new BienImmoblier();
        $form=$this->createForm(BienImmoblierType::class,$bienimmoblier->setEtat(true));
        $form->handleRequest($request);
        if($form->isSubmitted()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($bienimmoblier);
            $em->flush();
            return $this->redirectToRoute("addBienImmoblier");

        }
        return $this->render("bien_immoblier/addBienImmoblier.html.twig",array('addBienImmoblier'=>$form->createView()));
    }
}
