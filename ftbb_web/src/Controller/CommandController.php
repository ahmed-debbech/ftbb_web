<?php

namespace App\Controller;

use App\Entity\Command;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CommandController extends AbstractController
{
    /**
     * @Route("/command", name="command")
     */
    public function index(): Response
    {
        return $this->render('command/index.html.twig', [
            'controller_name' => 'CommandController',
        ]);
    }

    /**
     * @Route("/command/list_command_admin", name="list_command_admin")
     */
    public function Afficher_command(): Response #objet min aand symfony jey par defaut
    {
        $command = $this ->getDoctrine()->getRepository(Command :: class)->findAll(); //findAll trajjalik tableau lkoll
        return $this->render('product/list_product_admin.html.twig', [
            'controller_name' => 'CommandController',
            'data'=> $command,
        ]);
    }
}
