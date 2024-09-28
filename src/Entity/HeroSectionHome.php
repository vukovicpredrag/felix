<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\HeroSectionHomeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HeroSectionHomeRepository::class)]
#[ApiResource]
class HeroSectionHome
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $mainTitlePreText = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $mainTitle = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $paragraph = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $cta1Link = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $cta1Title = null;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $cta2Link = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $cta2LinkText = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $type = null;

    #[ORM\Column(length: 1000, nullable: true)]
    private ?string $backgroundImage = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMainTitlePreText(): ?string
    {
        return $this->mainTitlePreText;
    }

    public function setMainTitlePreText(?string $mainTitlePreText): static
    {
        $this->mainTitlePreText = $mainTitlePreText;

        return $this;
    }

    public function getMainTitle(): ?string
    {
        return $this->mainTitle;
    }

    public function setMainTitle(?string $mainTitle): static
    {
        $this->mainTitle = $mainTitle;

        return $this;
    }

    public function getParagraph(): ?string
    {
        return $this->paragraph;
    }

    public function setParagraph(?string $paragraph): static
    {
        $this->paragraph = $paragraph;

        return $this;
    }

    public function getCta1Link(): ?string
    {
        return $this->cta1Link;
    }

    public function setCta1Link(?string $cta1Link): static
    {
        $this->cta1Link = $cta1Link;

        return $this;
    }

    public function getCta1Title(): ?string
    {
        return $this->cta1Title;
    }

    public function setCta1Title(?string $cta1Title): static
    {
        $this->cta1Title = $cta1Title;

        return $this;
    }

    public function getCta2Link(): ?string
    {
        return $this->cta2Link;
    }

    public function setCta2Link(?string $cta2Link): static
    {
        $this->cta2Link = $cta2Link;

        return $this;
    }

    public function getCta2LinkText(): ?string
    {
        return $this->cta2LinkText;
    }

    public function setCta2LinkText(?string $cta2LinkText): static
    {
        $this->cta2LinkText = $cta2LinkText;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getBackgroundImage(): ?string
    {
        return $this->backgroundImage;
    }

    public function setBackgroundImage(?string $backgroundImage): static
    {
        $this->backgroundImage = $backgroundImage;

        return $this;
    }
}
