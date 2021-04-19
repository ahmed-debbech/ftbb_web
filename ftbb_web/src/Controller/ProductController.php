<?php

namespace App\Controller;
use App\Utils\Utilities;
use App\Entity\Product;
use App\Form\AjouterProductType;
use App\Form\ModifierProductType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\DateTime;
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
     * @Route("/product/list_product_admin", name="list_product_admin")
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
     * @Route("/product/formulaire_modifier_admin/{ref_product}", name="formulaire_modifier" )
     */
    public function formulaire_modifier_admin(Request $req , $ref_product): Response #objet min aand symfony jey par defaut
    {
       /*$product = new Product();
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
            $dateTime = Utilities::getDateTimeObject(date("D M d, Y G:i"),"D M d, Y G:i");
            $product->setAddDate($dateTime);
            $product->setIdAdmin($data->getIdAdmin());
            $product->setPhoto($data->getPhoto());
            $em->flush();

            return $this->redirectToRoute('list_product_admin');
        }*/

        $entityManager = $this->getDoctrine()->getManager();

        $product = $entityManager->getRepository(Product::class)->find($ref_product);
        $form = $this->createForm(ModifierProductType::class, $product);
        $form->handleRequest($req);

        if($form->isSubmitted() && $form->isValid())
        {
            $entityManager->flush();
            return $this->redirectToRoute('list_product_admin');
        }

        return $this->render('product/admin/formulaire_modifier_admin.html.twig', [
            'product_form' => $form->createView()
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

        return $this->redirectToRoute('list_product_admin');
        //return new Response("deleted successfully");
    }

    /********************************************************************************************************************************************************************************/
    /**
     * @Route("/product/list_product_client", name="list_product_client")
     */
    public function Afficher_product_client(): Response #objet min aand symfony jey par defaut
    {
        $product = $this ->getDoctrine()->getRepository(Product :: class)->findAll(); //findAll trajjalik tableau lkoll
        return $this->render('product/store.html.twig', [
            'products'=> $product,
        ]);
    }

}
