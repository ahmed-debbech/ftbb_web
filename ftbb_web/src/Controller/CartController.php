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
            $product = $this ->getDoctrine()->getRepository(Product :: class)->find($x->getRef_product());
            array_push($products, $product);
        }
        return $this->render('product/cart.html.twig', [
            'controller_name' => 'ProductController',
            'data'=> $products,
        ]);
    }

    /**
     * @Route("/product/formulaire_ajout_admin", name="formulaire_ajout")
     */
    public function formulaire_ajout_admin(Request $req): Response #objet min aand symfony jey par defaut
    {
        $product = new Product();
        $form = $this ->createForm(AjouterProductType::class,$product); //houni snaana form fil controlleur w passinelou el classe illi yasna3 el form fi 7add dhetou w instance ta3 objet feragh
        $form->handleRequest($req);
        /*if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $dateTime = Utilities::getDateTimeObject(date("D M d, Y G:i"),"D M d, Y G:i");
            $product->setAddDate($dateTime);
            $product->setRefProduct(Utilities::generateId($product,'refProduct',$this->getDoctrine()));
            $em->persist($product);
            $em->flush();

            return $this->redirect('list_product_admin');
        }*/

        if ($form->isSubmitted() && $form->isValid()) {
            $ImageFile = $form->get('photo')->getData();
            if ($ImageFile) {

                // this is needed to safely include the file name as part of the URL

                $newFilename = md5(uniqid()).'.'.$ImageFile->guessExtension();
                $destination = $this->getParameter('kernel.project_dir').'/public/images/prod';
                // Move the file to the directory where brochures are stored
                try {
                    $ImageFile->move(
                        $destination,
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                // updates the 'ImageFilename' property to store the PDF file name
                // instead of its contents
                $product->setPhoto($newFilename);
            }
            $entityManager = $this->getDoctrine()->getManager();
            $dateTime = Utilities::getDateTimeObject(date("D M d, Y G:i"),"D M d, Y G:i");
            $product->setAddDate($dateTime);
            $product->setRefProduct(Utilities::generateId($product,'refProduct',$this->getDoctrine()));
            $entityManager->persist($product);
            $entityManager->flush();

            return $this->redirectToRoute('list_product_admin');
        }


        return $this->render('product/admin/formulaire_ajout_admin.html.twig', [
            'product_form' => $form->createView()
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
        $cart->setRef_product($id);
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
