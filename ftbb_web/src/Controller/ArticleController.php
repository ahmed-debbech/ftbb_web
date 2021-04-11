<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;

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

    //Other than routes methods
    public function getComments(){
        // TODO : fix comments
        return 5;
    }
}
