<?php

namespace App\Controller;

use App\Entity\Student;
use App\Form\StudentType;
use App\Repository\StudentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StudentController extends AbstractController
{
    /**
     * @Route("/student", name="student")
     */
    public function index(): Response
    {
        return $this->render('student/index.html.twig', [
            'controller_name' => 'StudentController',
        ]);
    }

    /**
     * @Route("/listStudent",name="students")
     */
    public function listStudent()
    {
        $students= $this->getDoctrine()->getRepository(Student::class)->findAll();
        return $this->render("student/list.html.twig",array('tabStudents'=>$students));
    }
    /**
     * @Route("/showStudent/{id}", name="showStudent")
     */
    public function showStudent($id){

        $student =$this->getDoctrine()->getRepository(Student::class)->find($id);
        return $this->render("student/showStudent.html.twig",array("student"=>$student));
    }
    /**
     * @Route("/deleteStudent/{id}", name="deleteStudent")
     */
    public function deleteStudent($id){
        $student =$this->getDoctrine()->getRepository(student::class)->find($id);
        $em=$this->getDoctrine()->getManager();
        $em->remove($student);
        $em->flush();
        return $this->redirectToRoute("students");
    }
    /**
     * @Route("/addStudent/", name="addStudent")
     */
    public function addStudent(Request $request){
        $student=new Student();
        $form=$this->createForm(StudentType::class,$student);
        $form->handleRequest($request);
        if($form->isSubmitted()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($student);
            $em->flush();
            return $this->redirectToRoute("students");

        }

        return $this->render("Student/addStudent.html.twig",array('formulaireStudent'=>$form->createView()));
    }
    /**
     * @Route("/updateStudent/{id}", name="updateSudent")
     */
    public function updateStudent(Request $request,StudentRepository $repository,$id){
        $student=$repository->find($id);
        $form=$this->createForm(StudentType::class,$student);
        $form->handleRequest($request);
        if($form->isSubmitted()){
            $em=$this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute("students");

        }

        return $this->render("Student/updateStudent.html.twig",array('formulaireUpdateStudent'=>$form->createView()));
    }
}