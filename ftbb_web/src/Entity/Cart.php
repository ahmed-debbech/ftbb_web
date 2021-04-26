<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Cart
 *
 * @ORM\Table(name="cart", indexes={@ORM\Index(name="id_client", columns={"id_client"})})
 * @ORM\Entity
 */
class Cart
{
    /**
     * @var int
     *
     * @ORM\Column(name="addition_id", type="integer", nullable=false)
     * @ORM\Id
     */
    private $additionId;

    /**
     * @var int
     *
     * @ORM\Column(name="cart_id", type="integer", nullable=false)
     */
    private $cartId;

    /**
     * @var int
     *
     * @ORM\Column(name="id_client", type="integer", nullable=false)
     */
    private $idClient;

    /**
     * @var int
     *
     * @ORM\Column(name="num_products", type="integer", nullable=false)
     * @Assert\Range(min=1, max=100)
     */
    private $numProducts;

    /**
     * @var int
     *
     * @ORM\Column(name="total_price", type="integer", nullable=false)
     * @Assert\Positive
     */
    private $totalPrice;

    /**
     * @var int
     *
     * @ORM\Column(name="ref_product", type="integer", nullable=false)
     */
    private $refProduct;


    public function getAdditionId()
    {
        return $this->additionId;
    }
    public function setAdditionId($additionId)
    {
        $this->additionId=$additionId;
    }

    public function getCartId()
    {
        return $this->cartId;
    }
    public function setCartId($cartId)
    {
        $this->cartId=$cartId;
    }

    public function getIdClient()
    {
        return $this->idClient;
    }
    public function setIdClient($idClient)
    {
        $this->idClient=$idClient;
    }

    public function getIdAdmin(): ?int
    {
        return $this->idAdmin;
    }
    public function setIdAdmin($idAdmin)
    {
        $this->idAdmin=$idAdmin;
    }

    public function getNumProducts()
    {
        return $this->numProducts;
    }
    public function setNumProducts($numProducts)
    {
        $this->numProducts=$numProducts;
    }

    public function getTotalPrice()
    {
        return $this->totalPrice;
    }
    public function setTotalPrice($totalPrice)
    {
        $this->totalPrice=$totalPrice;
    }

    public function getRefproduct()
    {
        return $this->refProduct;
    }
    public function setRefproduct($refproduct)
    {
        $this->refProduct = $refproduct;
    }
}
