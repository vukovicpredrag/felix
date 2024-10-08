<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\OurGoalsDataRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OurGoalsDataRepository::class)]
#[ApiResource]
class OurGoalsData
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ourGoalsTitle = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOurGoalsTitle(): ?string
    {
        return $this->ourGoalsTitle;
    }

    public function setOurGoalsTitle(?string $ourGoalsTitle): static
    {
        $this->ourGoalsTitle = $ourGoalsTitle;

        return $this;
    }
}
