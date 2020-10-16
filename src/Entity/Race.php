<?php
declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Race
 * @package App\Entity
 * @ORM\Entity(repositoryClass="App\Repository\RaceRepository")
 * @ORM\Table(name="race")
 */
class Race
{
    /**
     * @var integer|null
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="name", type="string")
     * @var string $name
     */
    private $name;

    /**
     * Race constructor.
     */
    public function __construct()
    {
        $this->name = (new \DateTime('now'))->format('ymdHis');
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
     * @return Race
     */
    public function setId(?int $id): Race
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Race
     */
    public function setName(string $name): Race
    {
        $this->name = $name;
        return $this;
    }
}
