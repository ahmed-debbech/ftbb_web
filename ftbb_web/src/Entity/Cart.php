<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\GeneratedValue(strategy="IDENTITY")
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
     */
    private $numProducts;

    /**
     * @var int
     *
     * @ORM\Column(name="total_price", type="integer", nullable=false)
     */
    private $totalPrice;

    /**
     * @var int
     *
     * @ORM\Column(name="ref_product", type="integer", nullable=false)
     */
    private $refProduct;


}
