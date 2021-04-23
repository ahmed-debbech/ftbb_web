<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Feedback
 *
 * @ORM\Table(name="feedback", uniqueConstraints={@ORM\UniqueConstraint(name="email", columns={"email"})}, indexes={@ORM\Index(name="client_id", columns={"client_id"})})
 * @ORM\Entity
 */
class Feedback
{
    /**
     * @var int
     *
     * @ORM\Column(name="feedback_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $feedbackId;

    /**
     * @var int
     *
     * @ORM\Column(name="client_id", type="integer", nullable=false)
     */
    private $clientId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="feedback_date", type="date", nullable=false)
     */
    private $feedbackDate;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="topic", type="string", length=255, nullable=false)
     */
    private $topic;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="string", length=255, nullable=false)
     */
    private $text;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=false)
     */
    private $type;

    public function getFeedbackId(): ?int
    {
        return $this->feedbackId;
    }

    public function getClientId(): ?int
    {
        return $this->clientId;
    }

    public function setClientId(int $clientId): self
    {
        $this->clientId = $clientId;

        return $this;
    }

    public function getFeedbackDate(): ?\DateTimeInterface
    {
        return $this->feedbackDate;
    }

    public function setFeedbackDate(\DateTimeInterface $feedbackDate): self
    {
        $this->feedbackDate = $feedbackDate;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTopic(): ?string
    {
        return $this->topic;
    }

    public function setTopic(string $topic): self
    {
        $this->topic = $topic;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }


}
