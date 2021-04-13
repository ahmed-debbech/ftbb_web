<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Feedback;
use App\Form\FeedbackFormType;
use App\Form\ModifyFeedbackType;
use Symfony\Component\Validator\Constraints\DateTime;
use App\Utils\Utilities;


class FeedbackController extends AbstractController
{
    /**
     * @Route("/feedback", name="feedback")
     */
    public function index(Request $req)
    {
        $fed = new Feedback();
        $form = $this ->createForm(FeedbackFormType::class,$fed); 
        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $fed->setFeedbackId(Utilities::generateId($fed,"feedbackId",$this->getDoctrine()));
            $fed->setClientId("2943761");   
            $dateTime = Utilities::getDateTimeObject(date("D M d, Y G:i"),"D M d, Y G:i");  
            $fed->setFeedbackDate($dateTime);
            $em->persist($fed);
            $em->flush();

            //return $this->redirect('list');
        }
        return $this->render('feedback/feedback.html.twig', [
            'feedback_form' => $form->createView()
        ]);
    }

    /**
     * @Route("/feedback/show", name="feedback_show_client")
     */
    public function showFeedbacks()
    {
        $feedbacks = $this ->getDoctrine()->getRepository(Feedback :: class)->findAll(); //findAll trajjalik tableau lkoll
       
        return $this->render('feedback/clientshowfeedbacks.html.twig', ['feedbacks' => $feedbacks]);
        
    }

    /**
     * @Route("/feedback/supp/{id}", name="feedback_delete_client")
     */

    public function DeleteFeedbacks($id)
    {
        $feedback = new Feedback();
        /*$classe->setId($id);
        $classe->setName($name);*/

        $em = $this ->getDoctrine()->getManager();
        $feedback=$em->getRepository(Feedback::class)->find($id);
        $em->remove($feedback);
        $em->flush();

        //return $this->redirect('formulaire_ajout');
      
       
        return $this->redirectToRoute("feedback_show_client");
        
    }

     /**
     * @Route("/feedback/modify/{id}", name="feedback_modify_client")
     */
    public function modifyFeedbacks(Request $req,$id)
    {
       /*
        $feedback = new Feedback();
        $form = $this ->createForm(ModifyFeedbackType::class,$feedback); //houni snaana form fil controlleur w passinelou el classe illi yasna3 el form fi 7add dhetou w instance ta3 objet feragh
        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid()){
            $data=$form->getData(); //houni khdhit tableau ta3 keys (add->'name' ta3 el valeur bidha illi mawjouda fi textfield)
            $em = $this->getDoctrine()->getManager();
            $feedback=$em->getRepository(Feedback::class)->find($id);
            $feedback->setText($data->getText());
            $em->flush();

            //return $this->redirectToRoute('list');
        }
        */
        
        $entityManager = $this->getDoctrine()->getManager();

        $feedback = $entityManager->getRepository(Feedback::class)->find($id);
        $form = $this->createForm(ModifyFeedbackType::class, $feedback);
        $form->handleRequest($req);

        if($form->isSubmitted() && $form->isValid())
        {
            $entityManager->flush();
            return $this->redirectToRoute('feedback_show_client');
        }

        
        return $this->render('feedback/clientmodifyfeedback.html.twig', [
            'feedback_form' => $form->createView()
        ]);
        
    }









}
