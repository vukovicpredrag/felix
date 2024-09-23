<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\FooterRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FooterRepository::class)]
#[ApiResource]
class Footer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $footerHeading = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $footerParagraph = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $cta1Link = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $footerBox1Icon = null;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $footerBox1Text1 = null;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $footerBox1Text2 = null;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $footerBox2Icon = null;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $footerBox2Text1 = null;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $footerBox2Text2 = null;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $footerBox3Icon = null;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $footerBox3Text1 = null;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $footerBox3Text2 = null;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $footerBox4Icon = null;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $footerBox4Text1 = null;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $footerBox4Text2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $facebookLink = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $instagramLink = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $linkedinLink = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $youtubeLink = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFooterHeading(): ?string
    {
        return $this->footerHeading;
    }

    public function setFooterHeading(?string $footerHeading): static
    {
        $this->footerHeading = $footerHeading;

        return $this;
    }

    public function getFooterParagraph(): ?string
    {
        return $this->footerParagraph;
    }

    public function setFooterParagraph(?string $footerParagraph): static
    {
        $this->footerParagraph = $footerParagraph;

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

    public function getFooterBox1Icon(): ?string
    {
        return $this->footerBox1Icon;
    }

    public function setFooterBox1Icon(?string $footerBox1Icon): static
    {
        $this->footerBox1Icon = $footerBox1Icon;

        return $this;
    }

    public function getFooterBox1Text1(): ?string
    {
        return $this->footerBox1Text1;
    }

    public function setFooterBox1Text1(?string $footerBox1Text1): static
    {
        $this->footerBox1Text1 = $footerBox1Text1;

        return $this;
    }

    public function getFooterBox1Text2(): ?string
    {
        return $this->footerBox1Text2;
    }

    public function setFooterBox1Text2(?string $footerBox1Text2): static
    {
        $this->footerBox1Text2 = $footerBox1Text2;

        return $this;
    }

    public function getFooterBox2Icon(): ?string
    {
        return $this->footerBox2Icon;
    }

    public function setFooterBox2Icon(?string $footerBox2Icon): static
    {
        $this->footerBox2Icon = $footerBox2Icon;

        return $this;
    }

    public function getFooterBox2Text1(): ?string
    {
        return $this->footerBox2Text1;
    }

    public function setFooterBox2Text1(?string $footerBox2Text1): static
    {
        $this->footerBox2Text1 = $footerBox2Text1;

        return $this;
    }

    public function getFooterBox2Text2(): ?string
    {
        return $this->footerBox2Text2;
    }

    public function setFooterBox2Text2(?string $footerBox2Text2): static
    {
        $this->footerBox2Text2 = $footerBox2Text2;

        return $this;
    }

    public function getFooterBox3Icon(): ?string
    {
        return $this->footerBox3Icon;
    }

    public function setFooterBox3Icon(?string $footerBox3Icon): static
    {
        $this->footerBox3Icon = $footerBox3Icon;

        return $this;
    }

    public function getFooterBox3Text1(): ?string
    {
        return $this->footerBox3Text1;
    }

    public function setFooterBox3Text1(?string $footerBox3Text1): static
    {
        $this->footerBox3Text1 = $footerBox3Text1;

        return $this;
    }

    public function getFooterBox3Text2(): ?string
    {
        return $this->footerBox3Text2;
    }

    public function setFooterBox3Text2(?string $footerBox3Text2): static
    {
        $this->footerBox3Text2 = $footerBox3Text2;

        return $this;
    }

    public function getFooterBox4Icon(): ?string
    {
        return $this->footerBox4Icon;
    }

    public function setFooterBox4Icon(?string $footerBox4Icon): static
    {
        $this->footerBox4Icon = $footerBox4Icon;

        return $this;
    }

    public function getFooterBox4Text1(): ?string
    {
        return $this->footerBox4Text1;
    }

    public function setFooterBox4Text1(?string $footerBox4Text1): static
    {
        $this->footerBox4Text1 = $footerBox4Text1;

        return $this;
    }

    public function getFooterBox4Text2(): ?string
    {
        return $this->footerBox4Text2;
    }

    public function setFooterBox4Text2(?string $footerBox4Text2): static
    {
        $this->footerBox4Text2 = $footerBox4Text2;

        return $this;
    }

    public function getFacebookLink(): ?string
    {
        return $this->facebookLink;
    }

    public function setFacebookLink(?string $facebookLink): static
    {
        $this->facebookLink = $facebookLink;

        return $this;
    }

    public function getInstagramLink(): ?string
    {
        return $this->instagramLink;
    }

    public function setInstagramLink(?string $instagramLink): static
    {
        $this->instagramLink = $instagramLink;

        return $this;
    }

    public function getLinkedinLink(): ?string
    {
        return $this->linkedinLink;
    }

    public function setLinkedinLink(?string $linkedinLink): static
    {
        $this->linkedinLink = $linkedinLink;

        return $this;
    }

    public function getYoutubeLink(): ?string
    {
        return $this->youtubeLink;
    }

    public function setYoutubeLink(?string $youtubeLink): static
    {
        $this->youtubeLink = $youtubeLink;

        return $this;
    }
}
