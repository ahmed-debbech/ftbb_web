<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Comment;
use App\Entity\Article;
use App\Entity\Client;
use App\Entity\Likes;
use App\Form\ArticleAddFormType;
use App\Utils\Utilities;

class LikesController extends AbstractController
{
    /**
     * @Route("/likes/click/comment/{com_id}/{art_id}", name="comment_like");
     */
    public function onClickLike($com_id, $art_id){
        $em = $this ->getDoctrine()->getManager();
        $like = $this ->getDoctrine()->getRepository(Likes :: class)->findBy(array('idClient'=>122, 'idComment'=>$com_id));
        if(!empty($like)){
            $em->remove($like[0]);
            $em->flush();
        }else{
            $like = new Likes();
            $client = $this ->getDoctrine()->getRepository(Client :: class)->find(122);
            $comment = $this ->getDoctrine()->getRepository(Comment :: class)->find($com_id);

            $like->setIdLike(Utilities::generateId($like, "idLike", $this->getDoctrine()));
            $like->setIdClient($client);
            $like->setIdComment($comment);
            $em->persist($like);
            $em->flush();
        }
        return $this->redirectToRoute("one_article", ['id' => $art_id]);
    }

    /**
     * @Route("/likes/click/article/{art_id}", name="article_like");
     */
    public function onClickLikeArticle($art_id){
        $em = $this ->getDoctrine()->getManager();
        $like = $this ->getDoctrine()->getRepository(Likes :: class)->findBy(array('idClient'=>122, 'idArticle'=>$art_id));
        if(!empty($like)){
            $em->remove($like[0]);
            $em->flush();
        }else{
            $like = new Likes();
            $client = $this ->getDoctrine()->getRepository(Client :: class)->find(122);
            $article = $this ->getDoctrine()->getRepository(Article :: class)->find($art_id);

            $like->setIdLike(Utilities::generateId($like, "idLike", $this->getDoctrine()));
            $like->setIdClient($client);
            $like->setIdArticle($article);
            $em->persist($like);
            $em->flush();
        }
        return $this->redirectToRoute("one_article", ['id' => $art_id]);
    }
}
