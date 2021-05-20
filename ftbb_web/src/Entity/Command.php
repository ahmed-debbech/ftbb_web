<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;


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
     * @Groups("command")
     */
    private $commandId;

    /**
     * @var int
     *
     * @ORM\Column(name="id_client", type="integer", nullable=false)
     * @Groups("command")
     */
    private $idClient;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_command", type="datetime", nullable=true)
     * @Groups("command")
     */
    private $dateCommand;

    /**
     * @var int
     *
     * @ORM\Column(name="status", type="integer", nullable=false)
     * @Groups("command")
     */
    private $status;

    /**
     * @var int
     *
     * @ORM\Column(name="total_price", type="integer", nullable=false)
     * @Groups("command")
     */
    private $totalPrice;


    public function getCommandId(): ?int
    {
        return $this->commandId;
    }
    public function setCommandId($commandId)
    {
        $this->commandId=$commandId;
    }

    public function getIdClient(): ?int
    {
        return $this->idClient;
    }
    public function setIdClient($idClient)
    {
        $this->idClient=$idClient;
    }

    public function getDateCommand()
    {
        return $this->dateCommand;
    }
    public function setDateCommand($dateCommand)
    {
        $this->dateCommand=$dateCommand;
    }

    public function getStatus()
    {
        return $this->status;
    }
    public function setStatus($status)
    {
        $this->status=$status;
    }

    public function getTotalPrice()
    {
        return $this->totalPrice;
    }
    public function setTotalPrice($totalPrice)
    {
        $this->totalPrice=$totalPrice;
    }

}
