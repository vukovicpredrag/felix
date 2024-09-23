<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\TabsSectionTabsDataRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TabsSectionTabsDataRepository::class)]
#[ApiResource]
class TabsSectionTabsData
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $label = null;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $image = null;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $slideImage = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $text = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $linkTo = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(?string $label): static
    {
        $this->label = $label;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getSlideImage(): ?string
    {
        return $this->slideImage;
    }

    public function setSlideImage(?string $slideImage): static
    {
        $this->slideImage = $slideImage;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): static
    {
        $this->text = $text;

        return $this;
    }

    public function getLinkTo(): ?string
    {
        return $this->linkTo;
    }

    public function setLinkTo(?string $linkTo): static
    {
        $this->linkTo = $linkTo;

        return $this;
    }
}
