<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CommandProduct
 *
 * @ORM\Table(name="command_product")
 * @ORM\Entity
 */
class CommandProduct
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_cp", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCp;

    /**
     * @var int
     *
     * @ORM\Column(name="ref_product", type="integer", nullable=false)
     */
    private $refProduct;

    /**
     * @var int
     *
     * @ORM\Column(name="id_client", type="integer", nullable=false)
     */
    private $idClient;

    /**
     * @var int
     *
     * @ORM\Column(name="command_id", type="integer", nullable=false)
     */
    private $commandId;


}
