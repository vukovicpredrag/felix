<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\TabsSectionTextRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TabsSectionTextRepository::class)]
#[ApiResource]
class TabsSectionText
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tabSectionTitle = null;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $tabSectionSubtitle = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTabSectionTitle(): ?string
    {
        return $this->tabSectionTitle;
    }

    public function setTabSectionTitle(?string $tabSectionTitle): static
    {
        $this->tabSectionTitle = $tabSectionTitle;

        return $this;
    }

    public function getTabSectionSubtitle(): ?string
    {
        return $this->tabSectionSubtitle;
    }

    public function setTabSectionSubtitle(?string $tabSectionSubtitle): static
    {
        $this->tabSectionSubtitle = $tabSectionSubtitle;

        return $this;
    }
}
