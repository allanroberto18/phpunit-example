<?php
declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Horse
 * @package App\Entity
 * @ORM\Table(name="horse")
 * @ORM\Entity(repositoryClass="App\Repository\HorseRepository")
 */
class Horse
{
    /**
     * @var integer|null
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="speed", type="float")
     * @var float|null $speed
     */
    private $speed;

    /**
     * @ORM\Column(name="endurance", type="float")
     * @var float|null $endurance
     */
    private $endurance;

    /**
     * @ORM\Column(name="strength", type="float")
     * @var float|null $strength
     */
    private $strength;

    /**
     * Horse constructor.
     * @param float $speed
     * @param float $endurance
     * @param float $strength
     */
    public function __construct(float $speed, float $endurance, float $strength)
    {
        $this->speed = $speed;
        $this->endurance = $endurance;
        $this->strength = $strength;
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
     * @return void
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return float|null
     */
    public function getSpeed(): ?float
    {
        return $this->speed;
    }

    /**
     * @param float|null $speed
     * @return void
     */
    public function setSpeed(?float $speed): void
    {
        $this->speed = $speed;
    }

    /**
     * @return float|null
     */
    public function getEndurance(): ?float
    {
        return $this->endurance;
    }

    /**
     * @param float|null $endurance
     * @return void
     */
    public function setEndurance(?float $endurance): void
    {
        $this->endurance = $endurance;
    }

    /**
     * @return float|null
     */
    public function getStrength(): ?float
    {
        return $this->strength;
    }

    /**
     * @param float|null $strength
     * @return void
     */
    public function setStrength(?float $strength): void
    {
        $this->strength = $strength;
    }
}
