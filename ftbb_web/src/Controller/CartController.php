<?php

namespace App\Controller;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CartController extends AbstractController
{
    /**
     * @Route("/cart", name="cart")
     */
    public function index(): Response
    {
        return $this->render('cart/index.html.twig', [
            'controller_name' => 'CartController',
        ]);
    }

    /**
     * @Route("/product/cart", name="cart")
     */
    public function Afficher_product_cart(): Response #objet min aand symfony jey par defaut
    {
        $product = $this ->getDoctrine()->getRepository(Product :: class)->findAll(); //findAll trajjalik tableau lkoll
        return $this->render('product/cart.html.twig', [
            'controller_name' => 'ProductController',
            'data'=> $product,
        ]);
    }
}
