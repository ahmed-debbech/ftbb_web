<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;


/**
 * Galerie
 *
 * @ORM\Table(name="galerie")
 * @ORM\Entity
 * @Groups("galerie")
 */
class Galerie
{
    /**
     * @var int
     *
     * @ORM\Column(name="galerie_id", type="integer", nullable=false)
     * @ORM\Id
     * @Groups("galerie")
     * 
     */
    private $galerieId;

    /**
     * @var int
     *
     * @ORM\Column(name="admin_id", type="integer", nullable=false)
     * @Groups("galerie")
     */
    private $adminId;

    /**
     * @var string
     *
     * @ORM\Column(name="photo_url", type="string", length=255, nullable=false)
     * @Groups("galerie")
     */
    private $photoUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="photo_title", type="string", length=255, nullable=false)
     * @Groups("galerie")
     */
    private $photoTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     * @Groups("galerie")
     */
    private $description;



    /**
     * Get the value of galerieId
     *
     * @return  int
     */ 
    public function getGalerieId()
    {
        return $this->galerieId;
    }

    /**
     * Set the value of galerieId
     *
     * @param  int  $galerieId
     *
     * @return  self
     */ 
    public function setGalerieId(int $galerieId)
    {
        $this->galerieId = $galerieId;

        
    }

    /**
     * Get the value of adminId
     *
     * @return  int
     */ 
    public function getAdminId()
    {
        return $this->adminId;
    }

    /**
     * Set the value of adminId
     *
     * @param  int  $adminId
     *
     * @return  self
     */ 
    public function setAdminId(int $adminId)
    {
        $this->adminId = $adminId;

       
    }

    /**
     * Get the value of photoUrl
     *
     * @return  string
     */ 
    public function getPhotoUrl()
    {
        return $this->photoUrl;
    }

    /**
     * Set the value of photoUrl
     *
     * @param  string  $photoUrl
     *
     * @return  self
     */ 
    public function setPhotoUrl(string $photoUrl)
    {
        $this->photoUrl = $photoUrl;

       
    }

    /**
     * Get the value of photoTitle
     *
     * @return  string
     */ 
    public function getPhotoTitle()
    {
        return $this->photoTitle;
    }

    /**
     * Set the value of photoTitle
     *
     * @param  string  $photoTitle
     *
     * @return  self
     */ 
    public function setPhotoTitle(string $photoTitle)
    {
        $this->photoTitle = $photoTitle;

       
    }

    /**
     * Get the value of description
     *
     * @return  string
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @param  string  $description
     *
     * @return  self
     */ 
    public function setDescription(string $description)
    {
        $this->description = $description;

       
    }
}
