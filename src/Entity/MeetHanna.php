<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\MeetHannaRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MeetHannaRepository::class)]
#[ApiResource]
class MeetHanna
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $meetHannaSectionTitle = null;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $meetHannaSectionSubtitle = null;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $meetHannaImage1 = null;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $meetHannaImage2 = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $meetHannaParagraph1 = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $meetHannaParagraph2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $meetHannaCtaTitle = null;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $meetHannaCtaLink = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMeetHannaSectionTitle(): ?string
    {
        return $this->meetHannaSectionTitle;
    }

    public function setMeetHannaSectionTitle(?string $meetHannaSectionTitle): static
    {
        $this->meetHannaSectionTitle = $meetHannaSectionTitle;

        return $this;
    }

    public function getMeetHannaSectionSubtitle(): ?string
    {
        return $this->meetHannaSectionSubtitle;
    }

    public function setMeetHannaSectionSubtitle(?string $meetHannaSectionSubtitle): static
    {
        $this->meetHannaSectionSubtitle = $meetHannaSectionSubtitle;

        return $this;
    }

    public function getMeetHannaImage1(): ?string
    {
        return $this->meetHannaImage1;
    }

    public function setMeetHannaImage1(?string $meetHannaImage1): static
    {
        $this->meetHannaImage1 = $meetHannaImage1;

        return $this;
    }

    public function getMeetHannaImage2(): ?string
    {
        return $this->meetHannaImage2;
    }

    public function setMeetHannaImage2(?string $meetHannaImage2): static
    {
        $this->meetHannaImage2 = $meetHannaImage2;

        return $this;
    }

    public function getMeetHannaParagraph1(): ?string
    {
        return $this->meetHannaParagraph1;
    }

    public function setMeetHannaParagraph1(?string $meetHannaParagraph1): static
    {
        $this->meetHannaParagraph1 = $meetHannaParagraph1;

        return $this;
    }

    public function getMeetHannaParagraph2(): ?string
    {
        return $this->meetHannaParagraph2;
    }

    public function setMeetHannaParagraph2(?string $meetHannaParagraph2): static
    {
        $this->meetHannaParagraph2 = $meetHannaParagraph2;

        return $this;
    }

    public function getMeetHannaCtaTitle(): ?string
    {
        return $this->meetHannaCtaTitle;
    }

    public function setMeetHannaCtaTitle(?string $meetHannaCtaTitle): static
    {
        $this->meetHannaCtaTitle = $meetHannaCtaTitle;

        return $this;
    }

    public function getMeetHannaCtaLink(): ?string
    {
        return $this->meetHannaCtaLink;
    }

    public function setMeetHannaCtaLink(?string $meetHannaCtaLink): static
    {
        $this->meetHannaCtaLink = $meetHannaCtaLink;

        return $this;
    }
}
