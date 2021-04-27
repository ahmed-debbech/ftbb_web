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
     * @var Options
     *
     * @ORM\ManyToOne(targetEntity="Options")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="option_id", referencedColumnName="option_id")
     * })
     */
    private $option;


    /**
     * @return int
     */
    public function getVoteId(): int
    {
        return $this->voteId;
    }

    /**
     * @param int $voteId
     */
    public function setVoteId(int $voteId): void
    {
        $this->voteId = $voteId;
    }

    /**
     * @return int|null
     */
    public function getClientId(): ?int
    {
        return $this->clientId;
    }

    /**
     * @param int|null $clientId
     */
    public function setClientId(?int $clientId): void
    {
        $this->clientId = $clientId;
    }

    /**
     * @return int|null
     */
    public function getVoteNbr(): ?int
    {
        return $this->voteNbr;
    }

    /**
     * @param int|null $voteNbr
     */
    public function setVoteNbr(?int $voteNbr): void
    {
        $this->voteNbr = $voteNbr;
    }

    /**
     * @return Options
     */
    public function getOption(): Options
    {
        return $this->option;
    }

    /**
     * @param Options $option
     */
    public function setOption(Options $option): void
    {
        $this->option = $option;
    }


}
