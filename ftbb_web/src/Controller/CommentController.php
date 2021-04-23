<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Comment;
use App\Entity\Article;
use App\Entity\Client;
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
     * @Route("/articles/{id}/add_comment/{content}", name="add_comment")
     */
    public function addComment($id, $content, Request $req){
        $em = $this->getDoctrine()->getManager();
        $com = new Comment();
        $com->setContent($content);
        $com->setId(Utilities::generateId($com, 'id', $this->getDoctrine()));
        $dateTime = Utilities::getDateTimeObject(date("D M d, Y G:i"), "D M d, Y G:i");
        $com->setDate($dateTime);
        $article = $this->getDoctrine()->getRepository(Article::class)->find($id);
        $com->setArticle($article);
        $com->setClient($this->getDoctrine()->getRepository(Client::class)->find(ArticleController::$CLIENT_ID));
        $em->persist($com);
        $em->flush();
        return $this->redirectToRoute("one_article", ['id' => $id]);

    }

    /**
     * @Route("/admin/article/{id}/ban_comment", name="ban_comment")
     */
    public function banComment($id){
        $article = $this->getDoctrine()->getRepository(Article::class)->find($id);
        return $this->render('comment/ban_comment.html.twig', ['article' => $article]);
    }
    /**
     * @Route("/article/{id}/comment/{id_com}/delete", name="delete_comment_client")
     */
    public function delete($id, $id_com){
        $com = new Comment();
        $em = $this ->getDoctrine()->getManager();
        $com=$em->getRepository(Comment::class)->find($id_com);
        $em->remove($com);
        $em->flush();

        return $this->redirectToRoute("one_article", ['id' => $id]);
    }
    /**
     * @Route("admin/article/{id}/ban/{com_id}", name="delete_comment")
     */
    public function deleteComment($id, $com_id){
        $com = new Comment();
        $em = $this ->getDoctrine()->getManager();
        $com=$em->getRepository(Comment::class)->find($com_id);
        $em->remove($com);
        $em->flush();
        return $this->redirectToRoute("ban_comment", ['id' => $id]);
    }
}