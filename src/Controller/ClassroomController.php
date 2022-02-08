<?php

namespace App\Controller;

use App\Entity\Classroom;
use App\Form\ClassroomType;
use App\Repository\ClassroomRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClassroomController extends AbstractController
{
    /**
     * @Route("/classroom", name="classroom")
     */
    public function index(): Response
    {
        return $this->render('classroom/index.html.twig', [
            'controller_name' => 'ClassroomController',
        ]);
    }
    /**
     * @Route("/listClassroom", name="listClassroom")
     */
    public function listClassroom(){
        $classrooms=$this->getDoctrine()->getRepository(Classroom::class)->findAll();
        return $this->render("Classroom/listClassroom.html.twig",array("tabClassroom"=>$classrooms));
    }
    /**
     * @Route("/showClassroom/{ref}", name="showClassroom")
     */
    public function showClassroom($ref){

        $classroom =$this->getDoctrine()->getRepository(Classroom::class)->find($ref);
        return $this->render("Classroom/showClassroom.html.twig",array("showClassroom"=>$classroom));
    }
    /**
     * @Route("/deleteClassroom/{ref}", name="deleteClassroom")
     */
    public function deleteClassroom($ref){
        $classroom =$this->getDoctrine()->getRepository(Classroom::class)->find($ref);
        $em=$this->getDoctrine()->getManager();
        $em->remove($classroom);
        $em->flush();
        return $this->redirectToRoute("listClassroom");
    }
    /**
     * @Route("/addClassroom/", name="addClassroom")
     */
    public function addClassroom(Request $request){
        $classroom=new Classroom();
        $form=$this->createForm(ClassroomType::class,$classroom);
        $form->handleRequest($request);
        if($form->isSubmitted()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($classroom);
            $em->flush();
            return $this->redirectToRoute("listClassroom");

        }
        return $this->render("classroom/addClassroom.html.twig",array('addClassroom'=>$form->createView()));
    }
    /**
     * @Route("/updateClassroom/{ref}", name="updateClassroom")
     */
    public function updateClassroom(Request $request,ClassroomRepository $repository,$ref){
        $classroom=$repository->find($ref);
        $form=$this->createForm(ClassroomType::class,$classroom);
        $form->handleRequest($request);
        if($form->isSubmitted()){
            $em=$this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute("listClassroom");
        }
        return $this->render("classroom/updateClassroom.html.twig",array('updateClassroom'=>$form->createView()));
    }
}
