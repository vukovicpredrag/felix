<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\NasaPricaRepository;
use App\Repository\SaleSectionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NasaPricaRepository::class)]
#[ApiResource]
class NasaPrica
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ourStoryTitle = null;

    #[ORM\Column(length: 1000, nullable: true)]
    private ?string $ourStoryParagraph = null;


    #[ORM\Column(length: 500, nullable: true)]
    private ?string $image = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOurStoryTitle (): ?string
    {
        return $this->ourStoryTitle;
    }

    public function setOurStoryTitle(?string $ourStoryTitle): static
    {
        $this->ourStoryTitle = $ourStoryTitle;

        return $this;
    }

    public function getOurStoryParagraph(): ?string
    {
        return $this->ourStoryParagraph;
    }

    public function setOurStoryParagraph(?string $ourStoryParagraph): static
    {
        $this->ourStoryParagraph = $ourStoryParagraph;

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
