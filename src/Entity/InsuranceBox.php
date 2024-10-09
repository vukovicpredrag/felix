<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\InsuranceBoxRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InsuranceBoxRepository::class)]
#[ApiResource]
class InsuranceBox
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $icon = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $text1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $icon2 = null;

    #[ORM\Column(length: 1000, nullable: true)]
    private ?string $text2 = null;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $icon3 = null;

    #[ORM\Column(length: 1000, nullable: true)]
    private ?string $text3 = null;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function setIcon(?string $icon): static
    {
        $this->icon = $icon;

        return $this;
    }

    public function getText1(): ?string
    {
        return $this->text1;
    }

    public function setText1(?string $text1): static
    {
        $this->text1 = $text1;

        return $this;
    }

    public function getIcon2(): ?string
    {
        return $this->icon2;
    }

    public function setIcon2(?string $icon2): static
    {
        $this->icon2 = $icon2;

        return $this;
    }

    public function getText2(): ?string
    {
        return $this->text2;
    }

    public function setText2(?string $text2): static
    {
        $this->text2 = $text2;

        return $this;
    }

    public function getIcon3(): ?string
    {
        return $this->icon3;
    }

    public function setIcon3(?string $icon3): static
    {
        $this->icon3 = $icon3;

        return $this;
    }

    public function getText3(): ?string
    {
        return $this->text3;
    }

    public function setText3(?string $text3): static
    {
        $this->text3 = $text3;

        return $this;
    }


}
