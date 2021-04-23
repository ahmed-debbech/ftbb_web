<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Command
 *
 * @ORM\Table(name="command", indexes={@ORM\Index(name="command_ibfk_1", columns={"id_client"})})
 * @ORM\Entity
 */
class Command
{
    /**
     * @var int
     *
     * @ORM\Column(name="command_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $commandId;

    /**
     * @var int
     *
     * @ORM\Column(name="id_client", type="integer", nullable=false)
     */
    private $idClient;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_command", type="date", nullable=false)
     */
    private $dateCommand;

    /**
     * @var int
     *
     * @ORM\Column(name="status", type="integer", nullable=false)
     */
    private $status;

    /**
     * @var int
     *
     * @ORM\Column(name="total_price", type="integer", nullable=false)
     */
    private $totalPrice;


}
