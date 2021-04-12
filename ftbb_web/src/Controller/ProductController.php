<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\AjouterProductType;
use App\Form\ModifierProductType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\FormTypeInterface;

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
     * @Route("/product/formulaire_ajout_admin", name="formulaire_ajout")
     */
    public function formulaire_ajout_admin(Request $req): Response #objet min aand symfony jey par defaut
    {
        $product = new Product();
        $form = $this ->createForm(AjouterProductType::class,$product); //houni snaana form fil controlleur w passinelou el classe illi yasna3 el form fi 7add dhetou w instance ta3 objet feragh
        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();

            return $this->redirect('list_product');
        }
        return $this->render('product/formulaire_ajout_admin.html.twig', [
            'product_form' => $form->createView()
        ]);
    }

    /**
     * @Route("/product/formulaire_modifier_admin/{ref_product}", name="formulaire_modifier")
     */
    public function formulaire_modifier_admin(Request $req , $ref_product): Response #objet min aand symfony jey par defaut
    {
       /* $product = new Product();
        $form = $this ->createForm(ModifierProductType::class,$product); //houni snaana form fil controlleur w passinelou el classe illi yasna3 el form fi 7add dhetou w instance ta3 objet feragh
        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid()){
            $data=$form->getData(); //houni khdhit tableau ta3 keys (add->'name' ta3 el valeur bidha illi mawjouda fi textfield)
            $em = $this->getDoctrine()->getManager();
            $product=$em->getRepository(product::class)->find($ref_product);
            $product->setCategory($data->getCategory());
            $product->setStock($data->getStock());
            $product->setName($data->getName());
            $product->setPrice($data->getPrice());
            $product->setDetails($data->getDetails());
            $product->setAddDate($data->getAddDate());
            $product->setIdAdmin($data->getIdAdmin());
            $product->setPhoto($data->getPhoto());
            $em->flush();

            return $this->redirectToRoute('list_product');
        }

        return $this->render('product/formulaire_modifier_admin.html.twig', [
            'product_form' => $form->createView()
        ]);*/

        $form = $this->createForm(Product::class, $ref_product);
        $form->handleRequest($req);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('list_product');
        }

        return $this->render('product/formulaire_modifier_admin.html.twig', [
            'product' => $ref_product,
            'product_form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/product/supprimer/{ref_product}", name="supprimer")
     */
    public function supprimer($ref_product): Response #objet min aand symfony jey par defaut
    {
        $product = new Product();
        /*$classe->setId($id);
        $classe->setName($name);*/

        $em = $this ->getDoctrine()->getManager();
        $product=$em->getRepository(Product::class)->find($ref_product);
        $em->remove($product);
        $em->flush();

        return $this->redirectToRoute('list_product');
        //return new Response("deleted successfully");
    }



    /********************************************************************************************************************************************************************************/
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
