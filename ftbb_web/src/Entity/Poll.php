<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;
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
     * @Groups("post:read")
     * @ORM\Column(name="poll_id", type="integer", nullable=false)
     * @ORM\Id
     */
    private $pollId;

    /**
     * @var string
     * @Groups("post:read")
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     * @Assert\Length(
     *      min = 3,
     *      max = 255,
     *      minMessage = "Your description must be {{ limit }} characters long",
     *      maxMessage = "Your description cannot be longer than {{ limit }} characters")
     */
    private $description;

    /**
     * @var DateTime
     *@Groups("post:read")
     * @ORM\Column(name="creation_date", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $creationDate = 'CURRENT_TIMESTAMP';

    /**
     * @var string
     *@Groups("post:read")
     * @ORM\Column(name="status", type="string", length=255, nullable=false, options={"default"="Active"})
     */
    private $status = 'Active';

    /**
     * @return int
     * @Groups("post:read")
     */
    public function getPollId(): int
    {
        return $this->pollId;
    }

    /**
     * @param int $pollId
     */
    public function setPollId(int $pollId): void
    {
        $this->pollId = $pollId;
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
     * @return DateTime
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * @param DateTime $creationDate
     */
    public function setCreationDate($creationDate): void
    {
        $this->creationDate = $creationDate;
    }

    /**
     * @return string
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }


}