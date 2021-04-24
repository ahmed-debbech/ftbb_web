<?php

namespace App\Controller;
use App\Entity\Cart;
use App\Entity\Command;
use App\Repository\ProductRepository;
use App\Entity\CommandProduct;
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
        $product = $this->getDoctrine()->getRepository(Product :: class)->findAll(); //findAll trajjalik tableau lkoll
        return $this->render('back/list_product.html.twig', [
            'controller_name' => 'ProductController',
            'data' => $product,
        ]);
    }

    /**
     * @Route("/product/formulaire_ajout_admin", name="formulaire_ajout")
     */
    public function formulaire_ajout_admin(Request $req): Response #objet min aand symfony jey par defaut
    {
        $product = new Product();
        $form = $this->createForm(AjouterProductType::class,$product); //houni snaana form fil controlleur w passinelou el classe illi yasna3 el form fi 7add dhetou w instance ta3 objet feragh
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


        return $this->render('back/formulaire_ajout_admin.html.twig', [
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

        return $this->render('back/formulaire_modifier_admin.html.twig', [
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

    /**
     * @Route("/command/list_product_command/{id}", name="product_command")
     */
    public function Afficher_product_command($id): Response #objet min aand symfony jey par defaut
    {
        $command_product = $this ->getDoctrine()->getRepository(CommandProduct :: class)->findBy(array('commandId' => $id,'idClient'=>2)); //findAll trajjalik tableau lkoll
        $products = array();
        foreach($command_product as $x){
            $prod = $this->getDoctrine()->getRepository(Product :: class)->find($x->getRefProduct());
            array_push($products, $prod);
        }
        return $this->render('product/list_product_command.html.twig', [
            'controller_name' => 'ProductController',
            'data'=> $products,
        ]);
    }

    /**
     * @Route("/product/recherche",name="recherche_product")
     */
    public function Recherche(ProductRepository $repository,Request $request)
    {
        $data=$request->get('search');
        $em=$repository->search($data);

        return $this->render('back/list_product.html.twig',[
            'data'=>$em

        ]);
    }

    /**
     * @Route("/product/recherche_store",name="recherche_product_store")
     */
    public function Recherche_store(ProductRepository $repository,Request $request)
    {
        $data=$request->get('search');
        $em=$repository->search($data);

        return $this->render('product/store.html.twig',[
            'products'=>$em

        ]);
    }

    /**
     * @return Response
     * @Route ("/product/statistique",name="statistique")
     */
    public function statistique(ProductRepository $repo): Response
    {
        $ob = new Highchart();
        $ob->chart->renderTo('linechart');
        $ob->title->text('statistique products selon category');
        $ob->plotOptions->pie(array(
            'allowPointSelect'  => true,
            'cursor'    => 'pointer',
            'dataLabels'    => array('enabled' => false),
            'showInLegend'  => true
        ));
        $product=$repo->stat1();
        $data =array();
        foreach ($product as $values)
        {
            $a =array($values['refProduct'],intval($values['nbdom']));
            array_push($data,$a);
        }

        $ob->series(array(array('type' => 'pie','name' => '', 'data' => $data)));
        return $this->render('back/list_product.html.twig', array(
            'chart' => $ob
        ));
    }

    /**
     * @Route("/product/statistiques", name="stats")
     */
    public function statistiques(){
            return $this->render('back/stats.html.twig');
    }

    /**
     * @Route("/product/favourite/{id}", name="add_to_favoris")
     */
    public function favourite($id)
    {
        $Product=new Product();
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





}


