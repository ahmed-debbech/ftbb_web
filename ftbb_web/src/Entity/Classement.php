<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Classement
 *
 * @ORM\Table(name="classement", indexes={@ORM\Index(name="t2", columns={"id_team"}), @ORM\Index(name="c2", columns={"id_competition"}), @ORM\Index(name="ph1", columns={"id_phase"})})
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
     * @var Competition
     *
     * @ORM\ManyToOne(targetEntity="Competition")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_competition", referencedColumnName="id")
     * })
     */
    private $idCompetition;

    /**
     * @var Phase
     *
     * @ORM\ManyToOne(targetEntity="Phase")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_phase", referencedColumnName="id")
     * })
     */
    private $idPhase;

    /**
     * @var Team
     *
     * @ORM\ManyToOne(targetEntity="Team")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_team", referencedColumnName="id")
     * })
     */
    private $idTeam;

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
     * @return int|null
     */
    public function getNbrPtsP(): ?int
    {
        return $this->nbrPtsP;
    }

    /**
     * @param int|null $nbrPtsP
     */
    public function setNbrPtsP(?int $nbrPtsP): void
    {
        $this->nbrPtsP = $nbrPtsP;
    }

    /**
     * @return int|null
     */
    public function getNbrPtsG(): ?int
    {
        return $this->nbrPtsG;
    }

    /**
     * @param int|null $nbrPtsG
     */
    public function setNbrPtsG(?int $nbrPtsG): void
    {
        $this->nbrPtsG = $nbrPtsG;
    }

    /**
     * @return int|null
     */
    public function getNbrPtsD(): ?int
    {
        return $this->nbrPtsD;
    }

    /**
     * @param int|null $nbrPtsD
     */
    public function setNbrPtsD(?int $nbrPtsD): void
    {
        $this->nbrPtsD = $nbrPtsD;
    }

    /**
     * @return int|null
     */
    public function getPtsDiff(): ?int
    {
        return $this->ptsDiff;
    }

    /**
     * @param int|null $ptsDiff
     */
    public function setPtsDiff(?int $ptsDiff): void
    {
        $this->ptsDiff = $ptsDiff;
    }

    /**
     * @return int|null
     */
    public function getNbrPts(): ?int
    {
        return $this->nbrPts;
    }

    /**
     * @param int|null $nbrPts
     */
    public function setNbrPts(?int $nbrPts): void
    {
        $this->nbrPts = $nbrPts;
    }

    /**
     * @return Competition
     */
    public function getIdCompetition(): Competition
    {
        return $this->idCompetition;
    }

    /**
     * @param Competition $idCompetition
     */
    public function setIdCompetition(Competition $idCompetition): void
    {
        $this->idCompetition = $idCompetition;
    }

    /**
     * @return Phase
     */
    public function getIdPhase(): Phase
    {
        return $this->idPhase;
    }

    /**
     * @param Phase $idPhase
     */
    public function setIdPhase(Phase $idPhase): void
    {
        $this->idPhase = $idPhase;
    }

    /**
     * @return Team
     */
    public function getIdTeam(): Team
    {
        return $this->idTeam;
    }

    /**
     * @param Team $idTeam
     */
    public function setIdTeam(Team $idTeam): void
    {
        $this->idTeam = $idTeam;
    }


}
