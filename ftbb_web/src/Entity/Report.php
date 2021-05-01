<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\EmailValidator;
use Symfony\Component\Serializer\Annotation\Groups;


/**
 * Report
 *
 * @ORM\Table(name="report", indexes={@ORM\Index(name="client_id", columns={"client_id"}), @ORM\Index(name="command_id", columns={"command_id"})})
 * @ORM\Entity
 */
class Report
{
    /**
     * @var int
     *
     * @ORM\Column(name="report_id", type="integer", nullable=false)
     * @ORM\Id
     * @Groups("report")
     */
    private $reportId;

    /**
     * @var int
     *
     * @ORM\Column(name="client_id", type="integer", nullable=false)
     * @Groups("report")
     */
    private $clientId;

    /**
     * @var int
     *
     * @ORM\Column(name="command_id", type="integer", nullable=false)
     * @Assert\NotBlank(message="Insert command ID")
     * @Groups("report")
     */
    private $commandId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="report_date", type="date", nullable=false)
     * @Groups("report")
     */
    private $reportDate;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     * @Assert\NotBlank(message="Email ")
     * @Groups("report")
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     * @Assert\NotBlank(message="azerty")
     * @Groups("report")
     */
    private $description;



    /**
     * Get the value of description
     *
     * @return  string
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @param  string  $description
     *
     * @return  self
     */ 
    public function setDescription(string $description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of email
     *
     * @return  string
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @param  string  $email
     *
     * @return  self
     */ 
    public function setEmail(string $email)
    {
        $this->email = $email;

        return $this;
    }

    /** 
     * Get the value of reportDate
     *
     * @return  \DateTime
     */ 
    public function getReportDate()
    {
        return $this->reportDate;
    }

    /**
     * Set the value of reportDate
     *
     * @param  \DateTime  $reportDate
     *
     * @return  self
     */ 
    public function setReportDate($reportDate)
    {
        $this->reportDate = $reportDate;

    }

    /**
     * Get the value of commandId
     *
     * @return  int
     */ 
    public function getCommandId()
    {
        return $this->commandId;
    }

    /**
     * Set the value of commandId
     *
     * @param  int  $commandId
     *
     * @return  self
     */ 
    public function setCommandId(int $commandId)
    {
        $this->commandId = $commandId;

        return $this;
    }

    /**
     * Get the value of clientId
     *
     * @return  int
     */ 
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * Set the value of clientId
     *
     * @param  int  $clientId
     *
     * @return  self
     */ 
    public function setClientId(int $clientId)
    {
        $this->clientId = $clientId;

        return $this;
    }

    /**
     * Get the value of reportId
     *
     * @return  int
     */ 
    public function getReportId()
    {
        return $this->reportId;
    }

    /**
     * Set the value of reportId
     *
     * @param  int  $reportId
     *
     * @return  self
     */ 
    public function setReportId($reportId)
    {
        $this->reportId = $reportId;

    }

    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('description', new Assert\Length([
            'min' => 50,
            'max' => 2000,
            'minMessage' => 'Your description must be at least {{ limit }} characters long',
            'maxMessage' => 'Your description cannot be longer than {{ limit }} characters',
        ]));

        $metadata->addPropertyConstraint('email', new Assert\Email([
            'message' => 'The email "{{ value }}" is not a valid email.',
        ]));
    }

  
}
