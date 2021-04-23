<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Week
 *
 * @ORM\Table(name="week")
 * @ORM\Entity
 */
class Week
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Name_week", type="string", length=255, nullable=false)
     */
    private $nameWeek;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameWeek(): ?string
    {
        return $this->nameWeek;
    }

    public function setNameWeek(string $nameWeek): self
    {
        $this->nameWeek = $nameWeek;

        return $this;
    }


}
