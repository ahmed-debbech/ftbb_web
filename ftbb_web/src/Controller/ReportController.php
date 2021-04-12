<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Report;
use App\Form\ReportFormType;
use App\Form\ModifyReportType;
use Symfony\Component\Validator\Constraints\DateTime;

class ReportController extends AbstractController
{
    /**
     * @Route("/report", name="report")
     */
    public function index(Request $req)
    {
        $rep = new Report();
        $form = $this ->createForm(ReportFormType::class,$rep); 
        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $rep->setReportId("551");
            $rep->setClientId("2943763");
            $rep->setReportDate("2010-02-06 19:30:13");
            $em->persist($rep);
            $em->flush();

            //return $this->redirect('list');
        }
        return $this->render('report/report.html.twig', [
            'report_form' => $form->createView()
        ]);

    }

    /**
     * @Route("/report/show", name="report_show_client")
     */
    public function showReports()
    {
        $reports = $this ->getDoctrine()->getRepository(Report :: class)->findAll(); //findAll trajjalik tableau lkoll
       
        return $this->render('report/clientshowreport.html.twig', ['reports' => $reports]);
        
    }

    /**
     * @Route("/report/supp/{id}", name="report_delete_client")
     */

    public function DeleteReports($id)
    {
        $report = new Report();
        /*$classe->setId($id);
        $classe->setName($name);*/

        $em = $this ->getDoctrine()->getManager();
        $report=$em->getRepository(Report::class)->find($id);
        $em->remove($report);
        $em->flush();

        //return $this->redirect('formulaire_ajout');
      
       
        return $this->redirectToRoute("report_show_client");
        
    }

    /**
     * @Route("/report/modify/{id}", name="report_modify_client")
     */
    public function modifyReports(Request $req,$id)
    {
        $report = new Report();
        $form = $this ->createForm(ModifyReportType::class,$report); //houni snaana form fil controlleur w passinelou el classe illi yasna3 el form fi 7add dhetou w instance ta3 objet feragh
        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid()){
            $data=$form->getData(); //houni khdhit tableau ta3 keys (add->'name' ta3 el valeur bidha illi mawjouda fi textfield)
            $em = $this->getDoctrine()->getManager();
            $report=$em->getRepository(Report::class)->find($id);
            $report->setDescription($data->getDescription());
            $em->flush();

            //return $this->redirectToRoute('list');
        }

        return $this->render('report/clientmodifyreport.html.twig', [
            'report_form' => $form->createView()
        ]);
        
    }
}
