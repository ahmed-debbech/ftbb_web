<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Product
 *
 * @ORM\Table(name="product", indexes={@ORM\Index(name="id_admin", columns={"id_admin"})})
 * @ORM\Entity
 */
class Product
{
    /**
     * @var int
     *
     * @ORM\Column(name="ref_product", type="integer", nullable=false)
     * @ORM\Id

     */
    private $refProduct;

    /**
     * @var string
     *
     * @ORM\Column(name="category", type="string", length=255, nullable=false)
     */
    private $category;

    /**
     * @var int
     *
     * @ORM\Column(name="stock", type="integer", nullable=false)
     *  @Assert\Range(min=1 , max=10000)
     */
    private $stock;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     * @Assert\Length(
     *     min=4,
     *     max=50,
     *     minMessage = "Le nom du produit doit comporte au moins {{ limit }} caratères",
     *     maxMessage = "Le nom du produit doit comporte au plus {{ limit }} cractères",
     *     )
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="price", type="integer", nullable=false)
     * @Assert\Positive
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="details", type="string", length=255, nullable=false)
     * @Assert\Length(
     *     min=4,
     *     max=500,
     *     minMessage = "Le nom du produit doit comporte au moins {{ limit }} caratères",
     *     maxMessage = "Le nom du produit doit comporte au plus {{ limit }} cractères",
     *     )
     */
    private $details;

    /**
     * @var int
     *
     * @ORM\Column(name="id_admin", type="integer", nullable=false)
     */
    private $idAdmin;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="add_date", type="date", nullable=true)
     * @ORM\Column(name="add_date", type="date", nullable=false)
     */
    private $addDate;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=50, nullable=false)
     */
    private $photo;

    public function getRefProduct(): ?int
    {
        return $this->refProduct;
    }
    public function setRefProduct($refProduct)
    {
        $this->refProduct=$refProduct;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }
    public function setCategory($category)
    {
        $this->category=$category;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }
    public function setStock($stock)
    {
        $this->stock=$stock;
    }

    public function getName(): ?string
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name=$name;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }
    public function setPrice($price)
    {
        $this->price=$price;
    }

    public function getDetails(): ?string
    {
        return $this->details;
    }
    public function setDetails($details)
    {
        $this->details=$details;
    }

    public function getIdAdmin(): ?int
    {
        return $this->idAdmin;
    }
    public function setIdAdmin($idAdmin)
    {
        $this->idAdmin=$idAdmin;
    }

    public function getAddDate()
    {
        return $this->addDate;
    }
    public function setAddDate($addDate)
    {
        $this->addDate=$addDate;
    }

    public function getPhoto()
    {
        return $this->photo;
    }
    public function setPhoto($photo)
    {
        $this->photo=$photo;
    }

}
