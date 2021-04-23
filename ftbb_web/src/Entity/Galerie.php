<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Galerie
 *
 * @ORM\Table(name="galerie")
 * @ORM\Entity
 */
class Galerie
{
    /**
     * @var int
     *
     * @ORM\Column(name="galerie_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $galerieId;

    /**
     * @var int
     *
     * @ORM\Column(name="admin_id", type="integer", nullable=false)
     */
    private $adminId;

    /**
     * @var string
     *
     * @ORM\Column(name="photo_url", type="string", length=255, nullable=false)
     */
    private $photoUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="photo_title", type="string", length=255, nullable=false)
     */
    private $photoTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;


}
