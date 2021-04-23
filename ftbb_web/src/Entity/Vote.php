<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vote
 *
 * @ORM\Table(name="vote", indexes={@ORM\Index(name="option_id", columns={"option_id"}), @ORM\Index(name="client_id", columns={"client_id"})})
 * @ORM\Entity
 */
class Vote
{
    /**
     * @var int
     *
     * @ORM\Column(name="vote_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $voteId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="client_id", type="integer", nullable=true)
     */
    private $clientId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="vote_nbr", type="integer", nullable=true, options={"default"="1"})
     */
    private $voteNbr = 1;

    /**
     * @var \Options
     *
     * @ORM\ManyToOne(targetEntity="Options")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="option_id", referencedColumnName="option_id")
     * })
     */
    private $option;

    public function getVoteId(): ?int
    {
        return $this->voteId;
    }

    public function getClientId(): ?int
    {
        return $this->clientId;
    }

    public function setClientId(?int $clientId): self
    {
        $this->clientId = $clientId;

        return $this;
    }

    public function getVoteNbr(): ?int
    {
        return $this->voteNbr;
    }

    public function setVoteNbr(?int $voteNbr): self
    {
        $this->voteNbr = $voteNbr;

        return $this;
    }

    public function getOption(): ?Options
    {
        return $this->option;
    }

    public function setOption(?Options $option): self
    {
        $this->option = $option;

        return $this;
    }


}
