<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\ContactRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContactRepository::class)]
#[ApiResource]
class Contact
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $mainTitlePreText = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $mainTitle = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $paragraph = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $phone = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $location = null;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $mapLink = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $mapHtmlEmbed = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $mapSectionPreText = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $mapSectionTitle = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMainTitlePreText(): ?string
    {
        return $this->mainTitlePreText;
    }

    public function setMainTitlePreText(?string $mainTitlePreText): static
    {
        $this->mainTitlePreText = $mainTitlePreText;

        return $this;
    }

    public function getMainTitle(): ?string
    {
        return $this->mainTitle;
    }

    public function setMainTitle(?string $mainTitle): static
    {
        $this->mainTitle = $mainTitle;

        return $this;
    }

    public function getParagraph(): ?string
    {
        return $this->paragraph;
    }

    public function setParagraph(string $paragraph): static
    {
        $this->paragraph = $paragraph;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): static
    {
        $this->phone = $phone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(?string $location): static
    {
        $this->location = $location;

        return $this;
    }

    public function getMapLink(): ?string
    {
        return $this->mapLink;
    }

    public function setMapLink(?string $mapLink): static
    {
        $this->mapLink = $mapLink;

        return $this;
    }

    public function getMapHtmlEmbed(): ?string
    {
        return $this->mapHtmlEmbed;
    }

    public function setMapHtmlEmbed(?string $mapHtmlEmbed): static
    {
        $this->mapHtmlEmbed = $mapHtmlEmbed;

        return $this;
    }

    public function getMapSectionPreText(): ?string
    {
        return $this->mapSectionPreText;
    }

    public function setMapSectionPreText(string $mapSectionPreText): static
    {
        $this->mapSectionPreText = $mapSectionPreText;

        return $this;
    }

    public function getMapSectionTitle(): ?string
    {
        return $this->mapSectionTitle;
    }

    public function setMapSectionTitle(?string $mapSectionTitle): static
    {
        $this->mapSectionTitle = $mapSectionTitle;

        return $this;
    }
}
