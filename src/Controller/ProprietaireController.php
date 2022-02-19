<?php

namespace App\Controller;

use App\Entity\Proprietaire;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProprietaireController extends AbstractController
{
    /**
     * @Route("/proprietaire", name="proprietaire")
     */
    public function index(): Response
    {
        return $this->render('proprietaire/index.html.twig', [
            'controller_name' => 'ProprietaireController',
        ]);
    }
    /**
     * @Route("/deleteProprietaire/{numpro}", name="deleteProprietaire")
     */
    public function deleteProprietaire($numpro){
        $proprietaire =$this->getDoctrine()->getRepository(Proprietaire::class)->find($numpro);
        $em=$this->getDoctrine()->getManager();
        $em->remove($proprietaire);
        $em->flush();

       return $this->redirectToRoute("addBienImmoblier");
    }
}
