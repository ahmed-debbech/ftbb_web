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

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getNameWeek(): string
    {
        return $this->nameWeek;
    }

    /**
     * @param string $nameWeek
     */
    public function setNameWeek(string $nameWeek): void
    {
        $this->nameWeek = $nameWeek;
    }


}
