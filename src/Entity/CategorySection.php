<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\CategorySectionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategorySectionRepository::class)]
#[ApiResource]
class CategorySection
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $mainCategoriesSectionHeading = null;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $mainCategoriesSectionSubheading = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMainCategoriesSectionHeading(): ?string
    {
        return $this->mainCategoriesSectionHeading;
    }

    public function setMainCategoriesSectionHeading(?string $mainCategoriesSectionHeading): static
    {
        $this->mainCategoriesSectionHeading = $mainCategoriesSectionHeading;

        return $this;
    }

    public function getMainCategoriesSectionSubheading(): ?string
    {
        return $this->mainCategoriesSectionSubheading;
    }

    public function setMainCategoriesSectionSubheading(?string $mainCategoriesSectionSubheading): static
    {
        $this->mainCategoriesSectionSubheading = $mainCategoriesSectionSubheading;

        return $this;
    }
}
