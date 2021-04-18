<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use  App\Entity\Team;
use  App\Entity\Competition;
class TeamController extends AbstractController
{
    /**
     * @Route("/team", name="team")
     */
    public function index(): Response
    {
        $repository = $this->getDoctrine()->getRepository(Competition::class);
        $competitions = $repository->findAll();

        return $this->render('team/add.html.twig', [ 'comp'=>$competitions ,
        'controller_name' => 'TeamController',
    ]);
    }

       /**
     * @Route("/Addteams", name="Addteams")
     * @param $request
     * @return \symfony\Component\HttpFoundation\Response
     */
    public function Addteams(Request $request)
    {
        
       $team=new Team();
       $entityManager = $this->getDoctrine()->getManager();

    if ($request->isMethod('POST')){
     $name= $request->get('name');
     $id_competition= $request->get('id_competition');
      $competition = $entityManager->getRepository(Competition::class)->find( $id_competition);

      $team->setName($name);
     $team->setIdCompetition($competition);

     
    $em=$this->getDoctrine()->getManager();
    $em->persist($team);
    $em->flush(); 
     return $this->redirectToRoute('back');
    }
}
}
