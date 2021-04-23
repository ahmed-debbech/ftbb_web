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

    public function getIdCp(): ?int
    {
        return $this->idCp;
    }

    public function getRefProduct(): ?int
    {
        return $this->refProduct;
    }

    public function setRefProduct(int $refProduct): self
    {
        $this->refProduct = $refProduct;

        return $this;
    }

    public function getIdClient(): ?int
    {
        return $this->idClient;
    }

    public function setIdClient(int $idClient): self
    {
        $this->idClient = $idClient;

        return $this;
    }

    public function getCommandId(): ?int
    {
        return $this->commandId;
    }

    public function setCommandId(int $commandId): self
    {
        $this->commandId = $commandId;

        return $this;
    }


}
