<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\DirektoriRepository;
use App\Repository\SaleSectionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DirektoriRepository::class)]
#[ApiResource]
class Direktori
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $pretitle = null;

    #[ORM\Column(length: 2000, nullable: true)]
    private ?string $quote = null;

    #[ORM\Column(length: 1500, nullable: true)]
    private ?string $ctaText = null;

    #[ORM\Column(length: 1500, nullable: true)]
    private ?string $ctaLink = null;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $image = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPretitle(): ?string
    {
        return $this->pretitle;
    }

    public function setPretitle(?string $pretitle): void
    {
        $this->pretitle = $pretitle;
    }

    public function getQuote(): ?string
    {
        return $this->quote;
    }

    public function setQuote(?string $quote): void
    {
        $this->quote = $quote;
    }

    public function getCtaText(): ?string
    {
        return $this->ctaText;
    }

    public function setCtaText(?string $ctaText): void
    {
        $this->ctaText = $ctaText;
    }

    public function getCtaLink(): ?string
    {
        return $this->ctaLink;
    }

    public function setCtaLink(?string $ctaLink): void
    {
        $this->ctaLink = $ctaLink;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): void
    {
        $this->image = $image;
    }


}
