<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Controller\ArticleController;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * Article
 *
 * @ORM\Table(name="article", indexes={@ORM\Index(name="admin_id", columns={"admin_id"})})
 * @ORM\Entity
 */
class Article
{
    public static $BREAKING_NEWS = "Breaking News";
    public static $HOT = "Hot";
    public static $ANNOUNCE = "Announce";
    public static $MISC = "Misc";
    
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Comment",mappedBy="article")
     */
    private $comments;

    /**
     * @var int
     *
     * @ORM\Column(name="article_id", type="integer", nullable=false)
     * @ORM\Id
     */
    private $articleId;

    /**
     * @var int
     *
     * @ORM\Column(name="admin_id", type="integer", nullable=false)
     */
    private $adminId;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="string", length=2048, nullable=false)
     */
    private $text;

    /**
     * @var string
     *
     * @ORM\Column(name="author", type="string", length=255, nullable=false)
     */
    private $author;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date", type="datetime", nullable=true)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="photo_url", type="string", length=255, nullable=false)
     */
    private $photoUrl;

    /**
     * @var int
     *
     * @ORM\Column(name="category", type="integer", nullable=false)
     */
    private $category;


    public function __construct(){
        $this->comments = new ArrayCollection();
    }
    public function getArticleId(){
		return $this->articleId;
	}

	public function setArticleId($articleId){
		$this->articleId = $articleId;
	}

	public function getAdminId(){
		return $this->adminId;
	}

	public function setAdminId($adminId){
		$this->adminId = $adminId;
	}

	public function getTitle(){
		return $this->title;
	}

	public function setTitle($title){
		$this->title = $title;
	}

	public function getText(){
		return $this->text;
	}

	public function setText($text){
		$this->text = $text;
	}

	public function getAuthor(){
		return $this->author;
	}

	public function setAuthor($author){
		$this->author = $author;
	}

	public function getDate(){
		return $this->date;
	}

	public function setDate($date){
		$this->date = $date;
	}

	public function getPhotoUrl(){
		return $this->photoUrl;
	}

	public function setPhotoUrl($photoUrl){
		$this->photoUrl = $photoUrl;
	}

	public function getCategory(){
		return $this->category;
	}

    public function setComments($comments){
		$this->comments = $comments;
	}
    public function addComment(Comment $com) : self {
        if(!$this->comments->contains($com)){
            $this->comments[] = $com;
            $com->setArticle($this);
        }
        return $this;
    }
    public function removeComment(Comment $com) : self{
        if($this->comments->contains($com)){
            $this->comments->removeElement($com);
            if($com->getArticle() === $this){
                $com->setArticle(null);
            }
        }
        return $this;
    }
	public function getComments() : Collection{
		return $this->comments;
	}

	public function setCategory($category){
		$this->category = $category;
	}
    public function getCommentsCount(){
        $ctl = new ArticleController();
        return $ctl->getCommentsCount();
    }
}
