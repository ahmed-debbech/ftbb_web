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
     * @var Statistique
     *
     * @ORM\ManyToOne(targetEntity="Statistique")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_statistique", referencedColumnName="id")
     * })
     */
    private $idStatistique;

    /**
     * @var Team
     *
     * @ORM\ManyToOne(targetEntity="Team")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_team_away", referencedColumnName="id")
     * })
     */
    private $idTeamAway;

    /**
     * @var Team
     *
     * @ORM\ManyToOne(targetEntity="Team")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_team_home", referencedColumnName="id")
     * })
     */
    private $idTeamHome;

    /**
     * @var Week
     *
     * @ORM\ManyToOne(targetEntity="Week")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_week", referencedColumnName="id")
     * })
     */
    private $idWeek;

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
     * @return int
     */
    public function getScoreHome(): int
    {
        return $this->scoreHome;
    }

    /**
     * @param int $scoreHome
     */
    public function setScoreHome(int $scoreHome): void
    {
        $this->scoreHome = $scoreHome;
    }

    /**
     * @return int
     */
    public function getScoreAway(): int
    {
        return $this->scoreAway;
    }

    /**
     * @param int $scoreAway
     */
    public function setScoreAway(int $scoreAway): void
    {
        $this->scoreAway = $scoreAway;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getSalle(): string
    {
        return $this->salle;
    }

    /**
     * @param string $salle
     */
    public function setSalle(string $salle): void
    {
        $this->salle = $salle;
    }

    /**
     * @return \DateTime|null
     */
    public function getTime(): ?\DateTime
    {
        return $this->time;
    }

    /**
     * @param \DateTime|null $time
     */
    public function setTime(?\DateTime $time): void
    {
        $this->time = $time;
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
     * @return Statistique
     */
    public function getIdStatistique(): Statistique
    {
        return $this->idStatistique;
    }

    /**
     * @param Statistique $idStatistique
     */
    public function setIdStatistique(Statistique $idStatistique): void
    {
        $this->idStatistique = $idStatistique;
    }

    /**
     * @return Team
     */
    public function getIdTeamAway(): Team
    {
        return $this->idTeamAway;
    }

    /**
     * @param Team $idTeamAway
     */
    public function setIdTeamAway(Team $idTeamAway): void
    {
        $this->idTeamAway = $idTeamAway;
    }

    /**
     * @return Team
     */
    public function getIdTeamHome(): Team
    {
        return $this->idTeamHome;
    }

    /**
     * @param Team $idTeamHome
     */
    public function setIdTeamHome(Team $idTeamHome): void
    {
        $this->idTeamHome = $idTeamHome;
    }

    /**
     * @return Week
     */
    public function getIdWeek(): Week
    {
        return $this->idWeek;
    }

    /**
     * @param Week $idWeek
     */
    public function setIdWeek(Week $idWeek): void
    {
        $this->idWeek = $idWeek;
    }


}
