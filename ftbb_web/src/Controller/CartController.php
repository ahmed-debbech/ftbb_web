<?php

namespace App\Controller;

use App\Entity\Cart;
use App\Entity\Product;
use App\Form\AjouterProductType;
use App\Utils\Utilities;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
        $carts = $this ->getDoctrine()->getRepository(Cart :: class)->findBy(array('cartId' => 2) ); //findAll trajjalik tableau lkoll
        $products = array();
        $x =null;
        foreach($carts as $x){
            $product = $this ->getDoctrine()->getRepository(Product :: class)->find($x->getRefproduct());
            array_push($products, $product);
        }
        // dd function tnejem testa3melha kima sout fl java
        //dd($carts);
        return $this->render('cart.html.twig', [
            'controller_name' => 'ProductController',
            'data'=> $products,
        ]);
    }

    /**
     * @Route("/cart/add/{id}", name="add_to_cart")
     */
    public function addtocart($id)
    {
        $cart=new Cart();
        $em = $this->getDoctrine()->getManager();
        $cart->setCartId(2);
        $cart->setIdClient(2);
        $cart->setNumProducts(1);
        $cart->setAdditionId(Utilities::generateId($cart,'additionId',$this->getDoctrine()));
        $cart->setTotalPrice(0);
        $cart->setRefproduct($id);
        $em->persist($cart);
        $em->flush();

        return $this->redirectToRoute('list_product_client');
    }

    /**
     * @Route("/cart/supprimer/{refProduct}", name="supprimer_cart")
     */
    public function supprimer($refProduct): Response #objet min aand symfony jey par defaut
    {
        $cart = new Cart();
        $em = $this ->getDoctrine()->getManager();
        $product=$em->getRepository(Cart::class)->findBy(array('cartId' => 2,'refProduct'=>$refProduct)); //array trajja3 tableau houni el produit illi bech yattithoulna bech ykoun fi awel case fi tableau
        $em->remove($product[0]); //remove awell case fi tableau
        $em->flush();

        return $this->redirectToRoute('cart');
        //return new Response("deleted successfully");
    }
}
