<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $reportId;

    /**
     * @var int
     *
     * @ORM\Column(name="client_id", type="integer", nullable=false)
     */
    private $clientId;

    /**
     * @var int
     *
     * @ORM\Column(name="command_id", type="integer", nullable=false)
     */
    private $commandId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="report_date", type="date", nullable=false)
     */
    private $reportDate;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;


}
