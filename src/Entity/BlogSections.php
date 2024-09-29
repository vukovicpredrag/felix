<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\BlogSectionsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BlogSectionsRepository::class)]
#[ApiResource]
class BlogSections
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $sectionTitle = null;

    #[ORM\Column(length: 1000, nullable: true)]
    private ?string $firstParagraph = null;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $blogSectionImg = null;

    #[ORM\Column(length: 1000, nullable: true)]
    private ?string $blogSectionImgDescription = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $secondParagraph = null;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $ctaSectionTitle = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ctaBtnLink = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ctaBtnTitle = null;

    #[ORM\Column(length: 5000, nullable: true)]
    private ?string $quoteSectionText = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $thirdParagraph = null;

    #[ORM\ManyToOne(inversedBy: 'blogSections')]
    private ?Blog $blog = null;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSectionTitle(): ?string
    {
        return $this->sectionTitle;
    }

    public function setSectionTitle(?string $sectionTitle): static
    {
        $this->sectionTitle = $sectionTitle;

        return $this;
    }

    public function getFirstParagraph(): ?string
    {
        return $this->firstParagraph;
    }

    public function setFirstParagraph(?string $firstParagraph): static
    {
        $this->firstParagraph = $firstParagraph;

        return $this;
    }

    public function getBlogSectionImg(): ?string
    {
        return $this->blogSectionImg;
    }

    public function setBlogSectionImg(?string $blogSectionImg): static
    {
        $this->blogSectionImg = $blogSectionImg;

        return $this;
    }

    public function getBlogSectionImgDescription(): ?string
    {
        return $this->blogSectionImgDescription;
    }

    public function setBlogSectionImgDescription(?string $blogSectionImgDescription): static
    {
        $this->blogSectionImgDescription = $blogSectionImgDescription;

        return $this;
    }

    public function getSecondParagraph(): ?string
    {
        return $this->secondParagraph;
    }

    public function setSecondParagraph(?string $secondParagraph): static
    {
        $this->secondParagraph = $secondParagraph;

        return $this;
    }

    public function getCtaSectionTitle(): ?string
    {
        return $this->ctaSectionTitle;
    }

    public function setCtaSectionTitle(?string $ctaSectionTitle): static
    {
        $this->ctaSectionTitle = $ctaSectionTitle;

        return $this;
    }

    public function getCtaBtnLink(): ?string
    {
        return $this->ctaBtnLink;
    }

    public function setCtaBtnLink(?string $ctaBtnLink): static
    {
        $this->ctaBtnLink = $ctaBtnLink;

        return $this;
    }

    public function getCtaBtnTitle(): ?string
    {
        return $this->ctaBtnTitle;
    }

    public function setCtaBtnTitle(?string $ctaBtnTitle): static
    {
        $this->ctaBtnTitle = $ctaBtnTitle;

        return $this;
    }

    public function getQuoteSectionText(): ?string
    {
        return $this->quoteSectionText;
    }

    public function setQuoteSectionText(?string $quoteSectionText): static
    {
        $this->quoteSectionText = $quoteSectionText;

        return $this;
    }

    public function getThirdParagraph(): ?string
    {
        return $this->thirdParagraph;
    }

    public function setThirdParagraph(?string $thirdParagraph): static
    {
        $this->thirdParagraph = $thirdParagraph;

        return $this;
    }

    public function getBlog(): ?Blog
    {
        return $this->blog;
    }

    public function setBlog(?Blog $blog): static
    {
        $this->blog = $blog;

        return $this;
    }


}
