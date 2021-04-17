<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Comment;
use App\Entity\Article;
use App\Form\ArticleAddFormType;
use App\Utils\Utilities;

class CommentController extends AbstractController
{
    /**
     * @Route("/comment", name="comment")
     */
    public function index(): Response
    {
        return $this->render('comment/index.html.twig', [
            'controller_name' => 'CommentController',
        ]);
    }
   
    /**
     * @Route("/articles/{id}/addcomment", name="add_comment")
     */
    public function addComment($id){
        $em = $this ->getDoctrine()->getManager();
        $com = new Comment();
        $com->setContent(";haeucv");
        $com->setId(Utilities::generateId($com,'id', $this->getDoctrine()));
        $dateTime = Utilities::getDateTimeObject(date("D M d, Y G:i"),"D M d, Y G:i");
        $com->setDate($dateTime);
        $com->setArticleId("2222");
        $em->persist($com);
        $em->flush();
        $article = $this ->getDoctrine()->getRepository(Article :: class)->find($id);
        return $this->redirectToRoute('one_article', ['id' => $id]);
    }

}
