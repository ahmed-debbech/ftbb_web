<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Options
 *
 * @ORM\Table(name="options", indexes={@ORM\Index(name="poll_id", columns={"poll_id"})})
 * @ORM\Entity
 */
class Options
{
    /**
     * @var int
     *
     * @ORM\Column(name="option_id", type="integer", nullable=false)
     * @ORM\Id
     */
    private $optionId;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var Poll
     *
     * @ORM\ManyToOne(targetEntity=Poll::class)
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="poll_id", referencedColumnName="poll_id")
     * })
     */
    private $poll;

    /**
     * @return int
     */
    public function getOptionId(): int
    {
        return $this->optionId;
    }

    /**
     * @param int $optionId
     */
    public function setOptionId(int $optionId): void
    {
        $this->optionId = $optionId;
    }

    /**
     * @return string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return Poll
     */
    public function getPoll(): Poll
    {
        return $this->poll;
    }

    /**
     * @param Poll $poll
     */
    public function setPoll(Poll $poll): void
    {
        $this->poll = $poll;
    }


}
