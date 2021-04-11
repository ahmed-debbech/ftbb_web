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
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $optionId;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var \Poll
     *
     * @ORM\ManyToOne(targetEntity="Poll")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="poll_id", referencedColumnName="poll_id")
     * })
     */
    private $poll;


}
