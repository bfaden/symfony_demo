<?php

namespace App\Entity;

use App\Repository\BicycleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BicycleRepository::class)]
class Bicycle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2)]
    private $cost;

    #[ORM\Column(type: 'integer')]
    private $wheelDiameter;

    #[ORM\Column(type: 'integer')]
    private $brakeType;

    #[ORM\Column(type: 'integer')]
    private $frameMaterial;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCost(): ?string
    {
        return $this->cost;
    }

    public function setCost(string $cost): self
    {
        $this->cost = $cost;

        return $this;
    }

    public function getWheelDiameter(): ?int
    {
        return $this->wheelDiameter;
    }

    public function setWheelDiameter(int $wheelDiameter): self
    {
        $this->wheelDiameter = $wheelDiameter;

        return $this;
    }
    
    public function getBrakeType(): ?int
    {
        return $this->brakeType;
    }

    public function setBrakeType(int $brakeType): self
    {
        $this->brakeType = $brakeType;

        return $this;
    }

    public function getFrameMaterial(): ?int
    {
        return $this->frameMaterial;
    }

    public function setFrameMaterial(int $frameMaterial): self
    {
        $this->frameMaterial = $frameMaterial;

        return $this;
    }
}
