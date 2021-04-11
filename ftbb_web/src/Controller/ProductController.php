<?php

namespace App\Controller;

use App\Entity\Product;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @Route("/product", name="product")
     */
    public function index(): Response
    {
        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
        ]);
    }

    /**
     * @Route("/product/list_product", name="list_product")
     */
    public function Afficher_product(): Response #objet min aand symfony jey par defaut
    {
        $product = $this ->getDoctrine()->getRepository(Product :: class)->findAll(); //findAll trajjalik tableau lkoll
        return $this->render('product/list_product.html.twig', [
            'controller_name' => 'ProductController',
            'data'=> $product,
        ]);
    }

    /**
     * @Route("/product/show_list_product_client", name="list_product_client")
     */
    public function Afficher_product_client(): Response #objet min aand symfony jey par defaut
    {
        $product = $this ->getDoctrine()->getRepository(Product :: class)->findAll(); //findAll trajjalik tableau lkoll
        return $this->render('product/store.html.twig', [
            'products'=> $product,
        ]);
    }

}
