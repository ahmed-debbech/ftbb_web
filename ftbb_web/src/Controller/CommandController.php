<?php

namespace App\Controller;

use App\Entity\Cart;
use App\Entity\Command;
use App\Entity\Product;
use App\Form\ModifierProductType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
        return $this->render('back/list_command_client.html.twig', [
            'controller_name' => 'CommandController',
            'data'=> $command,
        ]);
    }

    /**
     * @Route("/command/modifier_status_admin/{commandId}", name="modifier_status")
     */
    public function modifier_status_admin(Request $req , $commandId): Response #objet min aand symfony jey par defaut
    {
        $command = new Command();
        $em = $this->getDoctrine()->getManager();
        $command = $em->getRepository(Command::class)->find($commandId);
        if($command->getStatus()==0)
        {
            $command->setStatus(1);
        }
        $em->persist($command);
        $em->flush();

        return $this->redirectToRoute('list_command_admin');
    }

    /**
     * @Route("/Command/list_command_client", name="list_command_client")
     */
    public function Afficher_command_client(): Response #objet min aand symfony jey par defaut
    {
        $commands = $this ->getDoctrine()->getRepository(Command :: class)->findBy(array('CommandId' => 2) );
        return $this->render('product/cart.html.twig', [
            'controller_name' => 'ProductController',
            'data'=> $commands,
        ]);
    }


}
