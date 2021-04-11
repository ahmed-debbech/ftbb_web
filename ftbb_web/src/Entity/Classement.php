<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Classement
 *
 * @ORM\Table(name="classement", indexes={@ORM\Index(name="ph1", columns={"id_phase"}), @ORM\Index(name="t2", columns={"id_team"}), @ORM\Index(name="c2", columns={"id_competition"})})
 * @ORM\Entity
 */
class Classement
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
     * @var int|null
     *
     * @ORM\Column(name="nbr_pts_P", type="integer", nullable=true)
     */
    private $nbrPtsP;

    /**
     * @var int|null
     *
     * @ORM\Column(name="nbr_pts_G", type="integer", nullable=true)
     */
    private $nbrPtsG;

    /**
     * @var int|null
     *
     * @ORM\Column(name="nbr_pts_D", type="integer", nullable=true)
     */
    private $nbrPtsD;

    /**
     * @var int|null
     *
     * @ORM\Column(name="pts_diff", type="integer", nullable=true)
     */
    private $ptsDiff;

    /**
     * @var int|null
     *
     * @ORM\Column(name="nbr_pts", type="integer", nullable=true)
     */
    private $nbrPts;

    /**
     * @var \Competition
     *
     * @ORM\ManyToOne(targetEntity="Competition")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_competition", referencedColumnName="id")
     * })
     */
    private $idCompetition;

    /**
     * @var \Phase
     *
     * @ORM\ManyToOne(targetEntity="Phase")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_phase", referencedColumnName="id")
     * })
     */
    private $idPhase;

    /**
     * @var \Team
     *
     * @ORM\ManyToOne(targetEntity="Team")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_team", referencedColumnName="id")
     * })
     */
    private $idTeam;


}
