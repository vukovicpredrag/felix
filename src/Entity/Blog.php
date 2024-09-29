<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\BlogRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: BlogRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['blog:read']],
    denormalizationContext: ['groups' => ['blog:write']]
)]
class Blog
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['blog:read'])]
    private ?int $id = null;

    #[ORM\Column(length: 1000, nullable: true)]
    #[Groups(['blog:read', 'blog:write'])]
    private ?string $preH1Text = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['blog:read', 'blog:write'])]
    private ?string $blogTitle = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['blog:read', 'blog:write'])]
    private ?string $slug = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['blog:read', 'blog:write'])]
    private ?string $category = null;

    #[ORM\Column(length: 500, nullable: true)]
    #[Groups(['blog:read', 'blog:write'])]
    private ?string $featuredImage = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    #[Groups(['blog:read', 'blog:write'])]
    private ?string $featuredImageDescription = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    #[Groups(['blog:read', 'blog:write'])]
    private ?string $blogIntroParagraph = null;

    /**
     * @var Collection<int, BlogSections>
     */
    #[ORM\OneToMany(targetEntity: BlogSections::class, mappedBy: 'blog')]
    #[Groups(['blog:read'])]
    private Collection $blogSections;

    public function __construct()
    {
        $this->blogSections = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPreH1Text(): ?string
    {
        return $this->preH1Text;
    }

    public function setPreH1Text(?string $preH1Text): static
    {
        $this->preH1Text = $preH1Text;

        return $this;
    }

    public function getBlogTitle(): ?string
    {
        return $this->blogTitle;
    }

    public function setBlogTitle(?string $blogTitle): static
    {
        $this->blogTitle = $blogTitle;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(?string $category): static
    {
        $this->category = $category;

        return $this;
    }

    public function getFeaturedImage(): ?string
    {
        return $this->featuredImage;
    }

    public function setFeaturedImage(?string $featuredImage): static
    {
        $this->featuredImage = $featuredImage;

        return $this;
    }

    public function getFeaturedImageDescription(): ?string
    {
        return $this->featuredImageDescription;
    }

    public function setFeaturedImageDescription(?string $featuredImageDescription): static
    {
        $this->featuredImageDescription = $featuredImageDescription;

        return $this;
    }

    public function getBlogIntroParagraph(): ?string
    {
        return $this->blogIntroParagraph;
    }

    public function setBlogIntroParagraph(?string $blogIntroParagraph): static
    {
        $this->blogIntroParagraph = $blogIntroParagraph;

        return $this;
    }

    /**
     * @return Collection<int, BlogSections>
     */
    public function getBlogSections(): Collection
    {
        return $this->blogSections;
    }

    public function addBlogSection(BlogSections $blogSection): static
    {
        if (!$this->blogSections->contains($blogSection)) {
            $this->blogSections->add($blogSection);
            $blogSection->setBlog($this);
        }

        return $this;
    }

    public function removeBlogSection(BlogSections $blogSection): static
    {
        if ($this->blogSections->removeElement($blogSection)) {
            // set the owning side to null (unless already changed)
            if ($blogSection->getBlog() === $this) {
                $blogSection->setBlog(null);
            }
        }

        return $this;
    }
}
