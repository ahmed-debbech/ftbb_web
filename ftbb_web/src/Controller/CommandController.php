<?php

namespace App\Controller;

use App\Entity\Cart;
use App\Entity\Command;
use App\Entity\Product;
use App\Form\ModifierProductType;
use App\Utils\Utilities;
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
        return $this->render('back/list_command_admin.html.twig', [
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
     * @Route("/command/list_command_client", name="list_command_client")
     */
    public function Afficher_command_client(): Response #objet min aand symfony jey par defaut
    {
        $commands = $this ->getDoctrine()->getRepository(Command :: class)->findBy(array('idClient' => 2) );
        return $this->render('command/list_command_client.html.twig', [
            'controller_name' => 'CommandController',
            'data'=> $commands,
        ]);
    }

    /**
     * @Route("/command/add_new_command", name="add_new_command")
     */
    public function add_new_command()
    {
        $command=new Command();
        $entityManager = $this->getDoctrine()->getManager();
        $dateTime = Utilities::getDateTimeObject(date("D M d, Y G:i"),"D M d, Y G:i");
        $command->setDateCommand($dateTime);
        $command->setCommandId(Utilities::generateId($command,'commandId',$this->getDoctrine()));
        $command->setTotalPrice(22);
        $command->setStatus(0);
        $command->setIdClient(122);
        $entityManager->persist($command);
        $entityManager->flush();

        $carts = $this ->getDoctrine()->getRepository(Cart :: class)->findBy(array('idClient' => 2) );
        $x =null;
        foreach($carts as $x){
            $entityManager->remove($x);
            $entityManager->flush();
        }
        return $this->redirectToRoute('cart');
    }


}
