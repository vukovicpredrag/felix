<?php

namespace App\Entity;

use ApiPlatform\Doctrine\Orm\Filter\OrderFilter;
use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Metadata\ApiResource;
use App\Entity\Traits\TimestampableEntity;
use App\Repository\ProductRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ApiResource]
#[ORM\Entity(repositoryClass: ProductRepository::class)]
#[ORM\HasLifecycleCallbacks]

#[ApiFilter(SearchFilter::class,
    properties: [
        'category' => 'exact',
        'ribbonIndicator' => 'exact',
        'bestSeller' => 'exact',
        'highlightedProduct' => 'exact',
        'new' => 'exact',
        'sale' => 'exact'
    ])
]
#[ApiFilter(OrderFilter::class, properties: ['title', 'createdAt'], arguments: ['orderParameterName' => 'order'])]
class Product
{
    use TimestampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $mainDescription = null;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $mainImage = null;

    #[ORM\Column(nullable: true)]
    private ?array $keywords = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $slug = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ribbonIndicator = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ribbonIndicatorText = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $mainPrice = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $discountedPrice = null;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $singeProductTermsBox1Icon = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $singeProductTermsBox1Text1 = null;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $singeProductTermsBox1Text2 = null;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $singeProductTermsBox2Icon = null;

    #[ORM\Column(length: 1000, nullable: true)]
    private ?string $shortDescription = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $singeProductTermsBox2Text1 = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $singeProductTermsBox2Text2 = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $singeProductTermsBox3Icon = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $singeProductTermsBox3Text1 = null;

    #[ORM\Column(length: 250, nullable: true)]
    private ?string $singeProductTermsBox3Text2 = null;

    #[ORM\Column(length: 250, nullable: true)]
    private ?string $singleProductAvailabilityText = null;

    #[ORM\Column(length: 250, nullable: true)]
    private ?string $image1 = null;

    #[ORM\Column(length: 250, nullable: true)]
    private ?string $image2 = null;

    #[ORM\Column(length: 250, nullable: true)]
    private ?string $image3 = null;

    #[ORM\Column(length: 250, nullable: true)]
    private ?string $image4 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $category = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image5 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image6 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image7 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image8 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image9 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image10 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $metaDescription = null;

    #[ORM\Column(length: 1000, nullable: true)]
    private ?string $learnMoreText = null;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $learnMoreLink = null;

    #[ORM\Column(nullable: true)]
    private ?bool $bestSeller = false;

    #[ORM\Column(nullable: true)]
    private ?bool $highlightedProduct = false;

    #[ORM\Column(nullable: true)]
    private ?bool $new = null;

    #[ORM\Column(nullable: true)]
    private ?bool $sale = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMainDescription(): ?string
    {
        return $this->mainDescription;
    }

    public function setMainDescription(?string $mainDescription): static
    {
        $this->mainDescription = $mainDescription;
        return $this;
    }

    public function getMainImage(): ?string
    {
        return $this->mainImage;
    }

    public function setMainImage(?string $mainImage): static
    {
        $this->mainImage = $mainImage;
        return $this;
    }

    public function getKeywords(): ?array
    {
        return $this->keywords;
    }

    public function setKeywords(?array $keywords): static
    {
        $this->keywords = $keywords;
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

    public function getRibbonIndicator(): ?string
    {
        return $this->ribbonIndicator;
    }

    public function setRibbonIndicator(?string $ribbonIndicator): static
    {
        $this->ribbonIndicator = $ribbonIndicator;
        return $this;
    }

    public function getRibbonIndicatorText(): ?string
    {
        return $this->ribbonIndicatorText;
    }

    public function setRibbonIndicatorText(?string $ribbonIndicatorText): static
    {
        $this->ribbonIndicatorText = $ribbonIndicatorText;
        return $this;
    }

    public function getMainPrice(): ?string
    {
        return $this->mainPrice;
    }

    public function setMainPrice(?string $mainPrice): static
    {
        $this->mainPrice = $mainPrice;
        return $this;
    }

    public function getDiscountedPrice(): ?string
    {
        return $this->discountedPrice;
    }

    public function setDiscountedPrice(?string $discountedPrice): static
    {
        $this->discountedPrice = $discountedPrice;
        return $this;
    }

    public function getSingeProductTermsBox1Icon(): ?string
    {
        return $this->singeProductTermsBox1Icon;
    }

    public function setSingeProductTermsBox1Icon(?string $singeProductTermsBox1Icon): static
    {
        $this->singeProductTermsBox1Icon = $singeProductTermsBox1Icon;
        return $this;
    }

    public function getSingeProductTermsBox1Text1(): ?string
    {
        return $this->singeProductTermsBox1Text1;
    }

    public function setSingeProductTermsBox1Text1(?string $singeProductTermsBox1Text1): static
    {
        $this->singeProductTermsBox1Text1 = $singeProductTermsBox1Text1;
        return $this;
    }

    public function getSingeProductTermsBox1Text2(): ?string
    {
        return $this->singeProductTermsBox1Text2;
    }

    public function setSingeProductTermsBox1Text2(?string $singeProductTermsBox1Text2): static
    {
        $this->singeProductTermsBox1Text2 = $singeProductTermsBox1Text2;
        return $this;
    }

    public function getSingeProductTermsBox2Icon(): ?string
    {
        return $this->singeProductTermsBox2Icon;
    }

    public function setSingeProductTermsBox2Icon(?string $singeProductTermsBox2Icon): static
    {
        $this->singeProductTermsBox2Icon = $singeProductTermsBox2Icon;
        return $this;
    }

    public function getShortDescription(): ?string
    {
        return $this->shortDescription;
    }

    public function setShortDescription(?string $shortDescription): static
    {
        $this->shortDescription = $shortDescription;
        return $this;
    }

    public function getSingeProductTermsBox2Text1(): ?string
    {
        return $this->singeProductTermsBox2Text1;
    }

    public function setSingeProductTermsBox2Text1(?string $singeProductTermsBox2Text1): static
    {
        $this->singeProductTermsBox2Text1 = $singeProductTermsBox2Text1;
        return $this;
    }

    public function getSingeProductTermsBox2Text2(): ?string
    {
        return $this->singeProductTermsBox2Text2;
    }

    public function setSingeProductTermsBox2Text2(?string $singeProductTermsBox2Text2): static
    {
        $this->singeProductTermsBox2Text2 = $singeProductTermsBox2Text2;
        return $this;
    }

    public function getSingeProductTermsBox3Icon(): ?string
    {
        return $this->singeProductTermsBox3Icon;
    }

    public function setSingeProductTermsBox3Icon(?string $singeProductTermsBox3Icon): static
    {
        $this->singeProductTermsBox3Icon = $singeProductTermsBox3Icon;
        return $this;
    }

    public function getSingeProductTermsBox3Text1(): ?string
    {
        return $this->singeProductTermsBox3Text1;
    }

    public function setSingeProductTermsBox3Text1(?string $singeProductTermsBox3Text1): static
    {
        $this->singeProductTermsBox3Text1 = $singeProductTermsBox3Text1;
        return $this;
    }

    public function getSingeProductTermsBox3Text2(): ?string
    {
        return $this->singeProductTermsBox3Text2;
    }

    public function setSingeProductTermsBox3Text2(?string $singeProductTermsBox3Text2): static
    {
        $this->singeProductTermsBox3Text2 = $singeProductTermsBox3Text2;
        return $this;
    }

    public function getSingleProductAvailabilityText(): ?string
    {
        return $this->singleProductAvailabilityText;
    }

    public function setSingleProductAvailabilityText(?string $singleProductAvailabilityText): static
    {
        $this->singleProductAvailabilityText = $singleProductAvailabilityText;
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

    public function getImage5(): ?string
    {
        return $this->image5;
    }

    public function setImage5(?string $image5): static
    {
        $this->image5 = $image5;
        return $this;
    }

    public function getImage6(): ?string
    {
        return $this->image6;
    }

    public function setImage6(?string $image6): static
    {
        $this->image6 = $image6;
        return $this;
    }

    public function getImage7(): ?string
    {
        return $this->image7;
    }

    public function setImage7(?string $image7): static
    {
        $this->image7 = $image7;
        return $this;
    }

    public function getImage8(): ?string
    {
        return $this->image8;
    }

    public function setImage8(?string $image8): static
    {
        $this->image8 = $image8;
        return $this;
    }

    public function getImage9(): ?string
    {
        return $this->image9;
    }

    public function setImage9(?string $image9): static
    {
        $this->image9 = $image9;
        return $this;
    }

    public function getImage10(): ?string
    {
        return $this->image10;
    }

    public function setImage10(?string $image10): static
    {
        $this->image10 = $image10;
        return $this;
    }

    public function getMetaDescription(): ?string
    {
        return $this->metaDescription;
    }

    public function setMetaDescription(?string $metaDescription): static
    {
        $this->metaDescription = $metaDescription;
        return $this;
    }

    public function getLearnMoreText(): ?string
    {
        return $this->learnMoreText;
    }

    public function setLearnMoreText(?string $learnMoreText): static
    {
        $this->learnMoreText = $learnMoreText;
        return $this;
    }

    public function getLearnMoreLink(): ?string
    {
        return $this->learnMoreLink;
    }

    public function setLearnMoreLink(?string $learnMoreLink): static
    {
        $this->learnMoreLink = $learnMoreLink;
        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): static
    {
        $this->title = $title;
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

    public function getBestSeller(): ?bool
    {
        return $this->bestSeller;
    }

    public function setBestSeller(?bool $bestSeller): static
    {
        $this->bestSeller = $bestSeller;

        return $this;
    }

    public function getHighlightedProduct(): ?bool
    {
        return $this->highlightedProduct;
    }

    public function setHighlightedProduct(?bool $highlightedProduct): static
    {
        $this->highlightedProduct = $highlightedProduct;

        return $this;
    }

    public function isNew(): ?bool
    {
        return $this->new;
    }

    public function setNew(?bool $new): static
    {
        $this->new = $new;

        return $this;
    }

    public function isSale(): ?bool
    {
        return $this->sale;
    }

    public function setSale(?bool $sale): static
    {
        $this->sale = $sale;

        return $this;
    }
}
