<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\GeneratedValue(strategy="IDENTITY")
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
     */
    private $stock;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="price", type="integer", nullable=false)
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="details", type="string", length=255, nullable=false)
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
     * @ORM\Column(name="add_date", type="date", nullable=false)
     */
    private $addDate;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=50, nullable=false)
     */
    private $photo;

    public function getRef_product(): ?int
    {
        return $this->refProduct;
    }
    public function setRef_product($ref_product)
    {
        $this->ref_product=$ref_product;
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