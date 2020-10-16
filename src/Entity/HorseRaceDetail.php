<?php
declare(strict_types=1);

namespace App\Entity;

use App\Tests\Services\RaceServiceTest;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class HorseRaceDetail
 * @package App\Entity
 * @ORM\Entity(repositoryClass="App\Repository\HorseRaceDetailRepository")
 * @ORM\Table(name="horse_race_detail")
 */
class HorseRaceDetail
{
    /**
     * @var integer|null
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Race", inversedBy="id")
     * @var Race $race
     */
    private $race;

    /**
     * @ORM\ManyToOne(targetEntity="Horse", inversedBy="id")
     * @var Horse $horse
     */
    private $horse;

    /**
     * @ORM\Column(name="speed_calculated", type="float")
     * @var float|null $speedCalculated
     */
    private $speedCalculated;

    /**
     * @ORM\Column(name="endurance_calculated", type="float")
     * @var float|null $enduranceCalculated
     */
    private $enduranceCalculated;

    /**
     * @ORM\Column(name="strength_calculated", type="float")
     * @var float|null $strengthCalculated
     *
     */
    private $strengthCalculated;

    /**
     * @ORM\Column(name="time_calculated", type="float")
     * @var float|null $timeCalculated
     */
    private $timeCalculated;

    /**
     * HorseRaceDetail constructor.
     * @param Horse $horse
     * @param float $speedCalculated
     * @param float $enduranceCalculated
     * @param float $strengthCalculated
     */
    public function __construct(Horse $horse, float $speedCalculated, float $enduranceCalculated, float $strengthCalculated)
    {
        $this->horse = $horse;
        $this->speedCalculated = $speedCalculated;
        $this->enduranceCalculated = $enduranceCalculated;
        $this->strengthCalculated = $strengthCalculated;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return HorseRaceDetail
     */
    public function setId(?int $id): HorseRaceDetail
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return Race
     */
    public function getRace(): Race
    {
        return $this->race;
    }

    /**
     * @param Race $race
     * @return HorseRaceDetail
     */
    public function setRace(Race $race): HorseRaceDetail
    {
        $this->race = $race;
        return $this;
    }

    /**
     * @return Horse
     */
    public function getHorse(): Horse
    {
        return $this->horse;
    }

    /**
     * @param Horse $horse
     * @return HorseRaceDetail
     */
    public function setHorse(Horse $horse): HorseRaceDetail
    {
        $this->horse = $horse;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getSpeedCalculated(): ?float
    {
        return $this->speedCalculated;
    }

    /**
     * @param float|null $speedCalculated
     * @return HorseRaceDetail
     */
    public function setSpeedCalculated(?float $speedCalculated): HorseRaceDetail
    {
        $this->speedCalculated = $speedCalculated;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getEnduranceCalculated(): ?float
    {
        return $this->enduranceCalculated;
    }

    /**
     * @param float|null $enduranceCalculated
     * @return HorseRaceDetail
     */
    public function setEnduranceCalculated(?float $enduranceCalculated): HorseRaceDetail
    {
        $this->enduranceCalculated = $enduranceCalculated;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getStrengthCalculated(): ?float
    {
        return $this->strengthCalculated;
    }

    /**
     * @param float|null $strengthCalculated
     * @return HorseRaceDetail
     */
    public function setStrengthCalculated(?float $strengthCalculated): HorseRaceDetail
    {
        $this->strengthCalculated = $strengthCalculated;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getTimeCalculated(): ?float
    {
        return $this->timeCalculated;
    }

    /**
     * @param float|null $timeCalculated
     * @return HorseRaceDetail
     */
    public function setTimeCalculated(?float $timeCalculated): HorseRaceDetail
    {
        $this->timeCalculated = $timeCalculated;
        return $this;
    }
}
