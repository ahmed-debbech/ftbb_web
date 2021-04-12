<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Galerie;
use App\Form\GalerieFormType;
use App\Form\ModifyGalerieType;

class GalerieController extends AbstractController
{
    /**
     * @Route("/galerie", name="galerie")
     */
    public function index(Request $req)
    {
        $gal = new Galerie();
        $form = $this ->createForm(GalerieFormType::class,$gal); 
        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $gal->setGalerieId("553");
            $gal->setAdminId("000");   
            $em->persist($gal);
            $em->flush();

            //return $this->redirect('list');
        }
        return $this->render('galerie/galerie.html.twig', [
            'galerie_form' => $form->createView()
        ]);
    }

    /**
     * @Route("/galerie/show", name="galerie_show_admin")
     */
    public function showGalerie()
    {
        $galeries = $this ->getDoctrine()->getRepository(Galerie :: class)->findAll(); //findAll trajjalik tableau lkoll
       
        return $this->render('galerie/adminphotoshow.html.twig', ['galeries' => $galeries]);
        
    }

    
    /**
     * @Route("/galerie/supp/{id}", name="galerie_delete_admin")
     */

    public function DeletePhoto($id)
    {
        $galerie = new Galerie();
        /*$classe->setId($id);
        $classe->setName($name);*/

        $em = $this ->getDoctrine()->getManager();
        $galerie=$em->getRepository(Galerie::class)->find($id);
        $em->remove($galerie);
        $em->flush();

        //return $this->redirect('formulaire_ajout');
      
       
        return $this->redirectToRoute("galerie_show_admin");
        
    }

        
    



}
