<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\EmailValidator;

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

     * @Assert\NotBlank(message="wrong email")
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


     * @Assert\NotBlank(message="Insert command ID")     
     */
    private $text;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=false)
     */
    private $type;




    /**
     * Get the value of feedbackId
     *
     * @return  int
     */ 
    public function getFeedbackId()
    {
        return $this->feedbackId;
    }

    /**
     * Set the value of feedbackId
     *
     * @param  int  $feedbackId
     *
     * @return  self
     */ 
    public function setFeedbackId($feedbackId)
    {
        $this->feedbackId = $feedbackId;

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

        
    }

    /**
     * Get the value of feedbackDate
     *
     * @return  \DateTime
     */ 
    public function getFeedbackDate()
    {
        return $this->feedbackDate;
    }

    /**
     * Set the value of feedbackDate
     *
     * @param  \DateTime  $feedbackDate
     *
     * @return  self
     */ 
    public function setFeedbackDate(\DateTime $feedbackDate)
    {
        $this->feedbackDate = $feedbackDate;

      
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

      
    }

    /**
     * Get the value of topic
     *
     * @return  string
     */ 
    public function getTopic()
    {
        return $this->topic;
    }

    /**
     * Set the value of topic
     *
     * @param  string  $topic
     *
     * @return  self
     */ 
    public function setTopic(string $topic)
    {
        $this->topic = $topic;

        
    }

    /**
     * Get the value of text
     *
     * @return  string
     */ 
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set the value of text
     *
     * @param  string  $text
     *
     * @return  self
     */ 
    public function setText(string $text)
    {
        $this->text = $text;

       
    }

    /**
     * Get the value of type
     *
     * @return  string
     */ 
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @param  string  $type
     *
     * @return  self
     */ 
    public function setType(string $type)
    {
        $this->type = $type;

    }
    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('text', new Assert\Length([
            'min' => 50,
            'max' => 2000,
            'minMessage' => 'Your text must be at least {{ limit }} characters long',
            'maxMessage' => 'Your text cannot be longer than {{ limit }} characters',
        ]));

        $metadata->addPropertyConstraint('email', new Assert\Email([
            'message' => 'The email "{{ value }}" is not a valid email.',
        ]));
    }


}
