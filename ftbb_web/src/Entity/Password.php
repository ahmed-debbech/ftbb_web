<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Password
 *
 * @ORM\Table(name="password")
 * @ORM\Entity
 */
class Password
{
    /**
     * @var int
     *
     * @ORM\Column(name="password_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $passwordId;

    /**
     * @var string
     *
     * @ORM\Column(name="pwd", type="string", length=255, nullable=false)
     */
    private $pwd;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_change", type="date", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $lastChange = 'CURRENT_TIMESTAMP';

    /**
     * @var string|null
     *
     * @ORM\Column(name="previous_pwd", type="string", length=255, nullable=true)
     */
    private $previousPwd;

    public function getPasswordId(): ?int
    {
        return $this->passwordId;
    }

    public function getPwd(): ?string
    {
        return $this->pwd;
    }

    public function setPwd(string $pwd): self
    {
        $this->pwd = $pwd;

        return $this;
    }

    public function getLastChange(): ?\DateTimeInterface
    {
        return $this->lastChange;
    }

    public function setLastChange(\DateTimeInterface $lastChange): self
    {
        $this->lastChange = $lastChange;

        return $this;
    }

    public function getPreviousPwd(): ?string
    {
        return $this->previousPwd;
    }

    public function setPreviousPwd(?string $previousPwd): self
    {
        $this->previousPwd = $previousPwd;

        return $this;
    }


}
