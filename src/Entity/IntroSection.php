<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\IntroSectionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IntroSectionRepository::class)]
#[ApiResource]
class IntroSection
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $h2Text = null;

    #[ORM\Column(length: 1000, nullable: true)]
    private ?string $subH2Text = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $paragraphs = null;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $image1Src = null;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $image2Src = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getH2Text(): ?string
    {
        return $this->h2Text;
    }

    public function setH2Text(?string $h2Text): static
    {
        $this->h2Text = $h2Text;

        return $this;
    }

    public function getSubH2Text(): ?string
    {
        return $this->subH2Text;
    }

    public function setSubH2Text(?string $subH2Text): static
    {
        $this->subH2Text = $subH2Text;

        return $this;
    }

    public function getParagraphs(): ?string
    {
        return $this->paragraphs;
    }

    public function setParagraphs(?string $paragraphs): static
    {
        $this->paragraphs = $paragraphs;

        return $this;
    }

    public function getImage1Src(): ?string
    {
        return $this->image1Src;
    }

    public function setImage1Src(?string $image1Src): static
    {
        $this->image1Src = $image1Src;

        return $this;
    }

    public function getImage2Src(): ?string
    {
        return $this->image2Src;
    }

    public function setImage2Src(?string $image2Src): static
    {
        $this->image2Src = $image2Src;

        return $this;
    }
}
