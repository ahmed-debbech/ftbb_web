<?php

namespace App\Controller;

use App\Entity\Favourite;
use App\Entity\Product;
use App\Utils\Utilities;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FavouriteController extends AbstractController
{
    /**
     * @Route("/favourite/controller/php", name="favourite_controller_php")
     */
    public function index(): Response
    {
        return $this->render('favourite_controller_php/index.html.twig', [
            'controller_name' => 'FavouriteController',
        ]);
    }

    /**
     * @Route("/product/list_favourite", name="favourite")
     */
    public function Afficher_product_favourite(): Response #objet min aand symfony jey par defaut
    {
        $favourites = $this ->getDoctrine()->getRepository(Favourite :: class)->findBy(array('idClient' => 2) ); //findAll trajjalik tableau lkoll
        $products = array();
        $x =null;
        foreach($favourites as $x){
            $product = $this ->getDoctrine()->getRepository(Product :: class)->find($x->getRefproduct());
            array_push($products, $product);
        }
        return $this->render('product/list_favourite.html.twig', [
            'controller_name' => 'ProductController',
            'data'=> $products,
        ]);
    }

    /**
     * @Route("/favourite/add/{id}", name="add_to_favourite")
     */
    public function addtofavourite($id)
    {
        $favourite=new Favourite();
        $em = $this->getDoctrine()->getManager();
        $favourite->setIdClient(2);
        $favourite->setIdFav(Utilities::generateId($favourite,'idFav',$this->getDoctrine()));
        $product = $this->getDoctrine()->getRepository(Product::class)->find($id);
        $favourite->setRefProduct($product);
        $em->persist($favourite);
        $em->flush();

        return $this->redirectToRoute('list_product_client');
    }

    /**
     * @Route("/favourite/supprimer/{refProduct}", name="supprimer_favourite")
     */
    public function supprimer($refProduct): Response #objet min aand symfony jey par defaut
    {
        $favourite = new Favourite();
        $em = $this ->getDoctrine()->getManager();
        $product=$em->getRepository(Favourite::class)->findBy(array('idFav' => 2,'refProduct'=>$refProduct)); //array trajja3 tableau houni el produit illi bech yattithoulna bech ykoun fi awel case fi tableau
        $em->remove($product[0]); //remove awell case fi tableau
        $em->flush();

        return $this->redirectToRoute('favourite');
        //return new Response("deleted successfully");
    }

}
