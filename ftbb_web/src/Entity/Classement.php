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

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbrPtsP(): ?int
    {
        return $this->nbrPtsP;
    }

    public function setNbrPtsP(?int $nbrPtsP): self
    {
        $this->nbrPtsP = $nbrPtsP;

        return $this;
    }

    public function getNbrPtsG(): ?int
    {
        return $this->nbrPtsG;
    }

    public function setNbrPtsG(?int $nbrPtsG): self
    {
        $this->nbrPtsG = $nbrPtsG;

        return $this;
    }

    public function getNbrPtsD(): ?int
    {
        return $this->nbrPtsD;
    }

    public function setNbrPtsD(?int $nbrPtsD): self
    {
        $this->nbrPtsD = $nbrPtsD;

        return $this;
    }

    public function getPtsDiff(): ?int
    {
        return $this->ptsDiff;
    }

    public function setPtsDiff(?int $ptsDiff): self
    {
        $this->ptsDiff = $ptsDiff;

        return $this;
    }

    public function getNbrPts(): ?int
    {
        return $this->nbrPts;
    }

    public function setNbrPts(?int $nbrPts): self
    {
        $this->nbrPts = $nbrPts;

        return $this;
    }

    public function getIdCompetition(): ?Competition
    {
        return $this->idCompetition;
    }

    public function setIdCompetition(?Competition $idCompetition): self
    {
        $this->idCompetition = $idCompetition;

        return $this;
    }

    public function getIdPhase(): ?Phase
    {
        return $this->idPhase;
    }

    public function setIdPhase(?Phase $idPhase): self
    {
        $this->idPhase = $idPhase;

        return $this;
    }

    public function getIdTeam(): ?Team
    {
        return $this->idTeam;
    }

    public function setIdTeam(?Team $idTeam): self
    {
        $this->idTeam = $idTeam;

        return $this;
    }


}
