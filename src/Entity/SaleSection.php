<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\SaleSectionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SaleSectionRepository::class)]
#[ApiResource]
class SaleSection
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $saleSectionTitle = null;

    #[ORM\Column(length: 1000, nullable: true)]
    private ?string $saleSectionParagraph = null;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $saleSectionLink = null;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $saleSectionLinkTitle = null;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $image1 = null;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $image2 = null;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $image3 = null;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $image4 = null;

    #[ORM\Column(nullable: true)]
    private ?int $hide = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSaleSectionTitle(): ?string
    {
        return $this->saleSectionTitle;
    }

    public function setSaleSectionTitle(?string $saleSectionTitle): static
    {
        $this->saleSectionTitle = $saleSectionTitle;

        return $this;
    }

    public function getSaleSectionParagraph(): ?string
    {
        return $this->saleSectionParagraph;
    }

    public function setSaleSectionParagraph(?string $saleSectionParagraph): static
    {
        $this->saleSectionParagraph = $saleSectionParagraph;

        return $this;
    }

    public function getSaleSectionLink(): ?string
    {
        return $this->saleSectionLink;
    }

    public function setSaleSectionLink(?string $saleSectionLink): static
    {
        $this->saleSectionLink = $saleSectionLink;

        return $this;
    }

    public function getSaleSectionLinkTitle(): ?string
    {
        return $this->saleSectionLinkTitle;
    }

    public function setSaleSectionLinkTitle(?string $saleSectionLinkTitle): static
    {
        $this->saleSectionLinkTitle = $saleSectionLinkTitle;

        return $this;
    }

    public function getImage1(): ?string
    {
        return $this->image1;
    }

    public function setImage1(?string $image1): static
    {
        $this->image1 = $image1;

        return $this;
    }

    public function getImage2(): ?string
    {
        return $this->image2;
    }

    public function setImage2(?string $image2): static
    {
        $this->image2 = $image2;

        return $this;
    }

    public function getImage3(): ?string
    {
        return $this->image3;
    }

    public function setImage3(?string $image3): static
    {
        $this->image3 = $image3;

        return $this;
    }

    public function getImage4(): ?string
    {
        return $this->image4;
    }

    public function setImage4(?string $image4): static
    {
        $this->image4 = $image4;

        return $this;
    }

    public function getHide(): ?int
    {
        return $this->hide;
    }

    public function setHide(?int $hide): static
    {
        $this->hide = $hide;

        return $this;
    }
}
