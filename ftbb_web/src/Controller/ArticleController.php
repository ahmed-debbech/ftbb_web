<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;
use App\Form\ArticleAddFormType;
//use Symfony\Component\Validator\Constraints\DateTime;

class ArticleController extends AbstractController
{
    /**
     * @Route("/articles", name="articles")
     */
    public function listArticles(): Response
    {
        $articles = $this ->getDoctrine()->getRepository(Article :: class)->findAll();
        return $this->render('article/articles.html.twig', ['articles' => $articles]);
    }

    /**
     * @Route("/articles/add", name="add_article")
     */
    public function addArticle(Request $req): Response
    {
        $article = new Article();
        $form = $this->createForm(ArticleAddFormType::class, $article);

        $form->handleRequest($req);

        if($form->isSubmitted() && $form->isValid()){
            $em = $this ->getDoctrine()->getManager();
            $article->setAdminId("22221199");
            $article->setArticleId("54409");
            $article->setDate(date('Y-m-d'));
            $em->persist($article);
            $em->flush();
            
            //return $this->redirect('/articles');
        }
        return $this->render('article/admin/article-add-form.html.twig', [
            'article_add_form' => $form->createView()
        ]);
    }

    /**
     * @Route("/articles/{id}", name="one_article")
     */
    public function showPost($id): Response
    {
        $article = $this ->getDoctrine()->getRepository(Article :: class)->find($id);
        return $this->render('article/article-post.html.twig', ['article' => $article]);
    }


    //Other than routes methods
    public function getCommentsCount(){
        // TODO : fix comments
        
        return 5;
    }

}
