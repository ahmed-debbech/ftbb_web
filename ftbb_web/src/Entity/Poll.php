<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Poll
 *
 * @ORM\Table(name="poll")
 * @ORM\Entity
 */
class Poll
{
    /**
     * @var int
     *
     * @ORM\Column(name="poll_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $pollId;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creation_date", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $creationDate = 'CURRENT_TIMESTAMP';

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=255, nullable=false, options={"default"="Active"})
     */
    private $status = 'Active';

    public function getPollId(): ?int
    {
        return $this->pollId;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCreationDate(): ?\DateTimeInterface
    {
        return $this->creationDate;
    }

    public function setCreationDate(\DateTimeInterface $creationDate): self
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }


}
