<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Game
 *
 * @ORM\Table(name="game", indexes={@ORM\Index(name="c3", columns={"id_competition"}), @ORM\Index(name="ph2", columns={"id_phase"}), @ORM\Index(name="t3", columns={"id_team_away"}), @ORM\Index(name="statistique", columns={"id_statistique"}), @ORM\Index(name="t4", columns={"id_team_home"}), @ORM\Index(name="w1", columns={"id_week"})})
 * @ORM\Entity
 */
class Game
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
     * @var int
     *
     * @ORM\Column(name="score_home", type="integer", nullable=false)
     */
    private $scoreHome;

    /**
     * @var int
     *
     * @ORM\Column(name="score_away", type="integer", nullable=false)
     */
    private $scoreAway;

    /**
     * @var int
     *
     * @ORM\Column(name="status", type="integer", nullable=false)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="salle", type="string", length=255, nullable=false)
     */
    private $salle;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="time", type="date", nullable=true)
     */
    private $time;

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
     * @var \Statistique
     *
     * @ORM\ManyToOne(targetEntity="Statistique")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_statistique", referencedColumnName="id")
     * })
     */
    private $idStatistique;

    /**
     * @var \Team
     *
     * @ORM\ManyToOne(targetEntity="Team")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_team_away", referencedColumnName="id")
     * })
     */
    private $idTeamAway;

    /**
     * @var \Team
     *
     * @ORM\ManyToOne(targetEntity="Team")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_team_home", referencedColumnName="id")
     * })
     */
    private $idTeamHome;

    /**
     * @var \Week
     *
     * @ORM\ManyToOne(targetEntity="Week")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_week", referencedColumnName="id")
     * })
     */
    private $idWeek;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getScoreHome(): ?int
    {
        return $this->scoreHome;
    }

    public function setScoreHome(int $scoreHome): self
    {
        $this->scoreHome = $scoreHome;

        return $this;
    }

    public function getScoreAway(): ?int
    {
        return $this->scoreAway;
    }

    public function setScoreAway(int $scoreAway): self
    {
        $this->scoreAway = $scoreAway;

        return $this;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(int $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getSalle(): ?string
    {
        return $this->salle;
    }

    public function setSalle(string $salle): self
    {
        $this->salle = $salle;

        return $this;
    }

    public function getTime(): ?\DateTimeInterface
    {
        return $this->time;
    }

    public function setTime(?\DateTimeInterface $time): self
    {
        $this->time = $time;

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

    public function getIdStatistique(): ?Statistique
    {
        return $this->idStatistique;
    }

    public function setIdStatistique(?Statistique $idStatistique): self
    {
        $this->idStatistique = $idStatistique;

        return $this;
    }

    public function getIdTeamAway(): ?Team
    {
        return $this->idTeamAway;
    }

    public function setIdTeamAway(?Team $idTeamAway): self
    {
        $this->idTeamAway = $idTeamAway;

        return $this;
    }

    public function getIdTeamHome(): ?Team
    {
        return $this->idTeamHome;
    }

    public function setIdTeamHome(?Team $idTeamHome): self
    {
        $this->idTeamHome = $idTeamHome;

        return $this;
    }

    public function getIdWeek(): ?Week
    {
        return $this->idWeek;
    }

    public function setIdWeek(?Week $idWeek): self
    {
        $this->idWeek = $idWeek;

        return $this;
    }


}
