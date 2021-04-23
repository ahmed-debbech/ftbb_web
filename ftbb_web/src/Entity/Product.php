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

    public function getRefProduct(): ?int
    {
        return $this->refProduct;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(int $stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getDetails(): ?string
    {
        return $this->details;
    }

    public function setDetails(string $details): self
    {
        $this->details = $details;

        return $this;
    }

    public function getIdAdmin(): ?int
    {
        return $this->idAdmin;
    }

    public function setIdAdmin(int $idAdmin): self
    {
        $this->idAdmin = $idAdmin;

        return $this;
    }

    public function getAddDate(): ?\DateTimeInterface
    {
        return $this->addDate;
    }

    public function setAddDate(\DateTimeInterface $addDate): self
    {
        $this->addDate = $addDate;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }


}
