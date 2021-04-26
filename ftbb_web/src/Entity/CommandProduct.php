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

    public function getIdCp(){
        return $this->idCp;
    }

    public function setIdCp($idCp){
        $this->idCp = $idCp;
    }

    public function getRefProduct(){
        return $this->refProduct;
    }

    public function setRefProduct($refProduct){
        $this->refProduct = $refProduct;
    }

    public function getIdClient(){
        return $this->idClient;
    }

    public function setIdClient($idClient){
        $this->idClient = $idClient;
    }

    public function getCommandId(){
        return $this->commandId;
    }

    public function setCommandId($commandId){
        $this->commandId = $commandId;
    }


}
