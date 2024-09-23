<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\CategoryLinkRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryLinkRepository::class)]
#[ApiResource]
class CategoryLink
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $linkTo = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $categoryTitle = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $categoryShortDescription = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $categoryCtaText = null;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $image = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getCategoryTitle(): ?string
    {
        return $this->categoryTitle;
    }

    public function setCategoryTitle(?string $categoryTitle): static
    {
        $this->categoryTitle = $categoryTitle;

        return $this;
    }

    public function getCategoryShortDescription(): ?string
    {
        return $this->categoryShortDescription;
    }

    public function setCategoryShortDescription(?string $categoryShortDescription): static
    {
        $this->categoryShortDescription = $categoryShortDescription;

        return $this;
    }

    public function getCategoryCtaText(): ?string
    {
        return $this->categoryCtaText;
    }

    public function setCategoryCtaText(?string $categoryCtaText): static
    {
        $this->categoryCtaText = $categoryCtaText;

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
}
