<?php

namespace App\Serializer;

use App\Entity\InsuranceBox;
use App\Entity\Product;
use App\Entity\CategoryLink;
use App\Entity\Footer;
use App\Entity\HeroSection;
use App\Entity\HeroSectionAboutUs;
use App\Entity\HeroSectionHome;
use App\Entity\IntroSection;
use App\Entity\MeetHanna;
use App\Entity\SaleSection;
use App\Entity\TabsSectionTabsData;
use App\Entity\Blog;
use App\Entity\BlogSections;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class ProductImagePathNormalizer implements NormalizerInterface
{
    public function __construct(
        #[Autowire(service: 'serializer.normalizer.object')]
        private readonly NormalizerInterface $normalizer,
    ) {
    }

    public function normalize($object, ?string $format = null, array $context = []): array
    {
        $data = $this->normalizer->normalize($object, $format, $context);
        $baseUrl = $_ENV['BASE_URL'] . '/media/';

        // Normalizing Product entity images
        if ($object instanceof Product) {
            $imageFields = [
                'mainImage', 'singeProductTermsBox1Icon',
                'singeProductTermsBox2Icon', 'singeProductTermsBox3Icon',
                'image1', 'image2', 'image3', 'image4',
                'image5', 'image6', 'image7', 'image8',
                'image9', 'image10'
            ];

            $images = [];

            foreach ($imageFields as $imageField) {
                $getter = 'get' . ucfirst($imageField);
                if (method_exists($object, $getter) && $object->$getter() !== null) {
                    $data[$imageField] = $baseUrl . $object->$getter();

                    if($imageField != 'mainImage' && $imageField != 'singeProductTermsBox1Icon' && $imageField != 'singeProductTermsBox2Icon' && $imageField != 'singeProductTermsBox3Icon' ) {
                        $images[]['src'] = $data[$imageField];
                    }
                }
            }
            $data['images'] = $images;

        }

        // Normalizing CategoryLink entity image
        if ($object instanceof CategoryLink) {
            if ($object->getImage() !== null) {
                $data['image'] = $baseUrl . $object->getImage();
            }
        }

        // Normalizing Footer entity icons
        if ($object instanceof Footer) {
            $iconFields = [
                'footerBox1Icon', 'footerBox2Icon',
                'footerBox3Icon', 'footerBox4Icon',
            ];

            foreach ($iconFields as $iconField) {
                $getter = 'get' . ucfirst($iconField);
                if (method_exists($object, $getter) && $object->$getter() !== null) {
                    $data[$iconField] = $baseUrl . $object->$getter();
                }
            }
        }

        // Normalizing HeroSection entity background image
        if ($object instanceof HeroSection || $object instanceof HeroSectionAboutUs || $object instanceof HeroSectionHome) {
            if ($object->getBackgroundImage() !== null) {
                $data['backgroundImage'] = $baseUrl . $object->getBackgroundImage();
            }
        }

        // Normalizing IntroSection entity images
        if ($object instanceof IntroSection) {
            if ($object->getImage1Src() !== null) {
                $data['image1Src'] = $baseUrl . $object->getImage1Src();
            }
            if ($object->getImage2Src() !== null) {
                $data['image2Src'] = $baseUrl . $object->getImage2Src();
            }
        }

        // Normalizing MeetHanna entity images
        if ($object instanceof MeetHanna) {
            if ($object->getMeetHannaImage1() !== null) {
                $data['meetHannaImage1'] = $baseUrl . $object->getMeetHannaImage1();
            }
            if ($object->getMeetHannaImage2() !== null) {
                $data['meetHannaImage2'] = $baseUrl . $object->getMeetHannaImage2();
            }
        }

        if ($object instanceof InsuranceBox) {
            if ($object->getIcon() !== null) {
                $data['icon'] = $baseUrl . $object->getIcon();
            }
            if ($object->getIcon2() !== null) {
                $data['icon2'] = $baseUrl . $object->getIcon2();
            }
            if ($object->getIcon3() !== null) {
                $data['icon3'] = $baseUrl . $object->getIcon3();
            }
        }

        // Normalizing SaleSection entity images
        if ($object instanceof SaleSection) {
            $imageFields = ['image1', 'image2', 'image3', 'image4'];
            foreach ($imageFields as $imageField) {
                $getter = 'get' . ucfirst($imageField);
                if (method_exists($object, $getter) && $object->$getter() !== null) {
                    $data[$imageField] = $baseUrl . $object->$getter();
                }
            }
        }

        // Normalizing TabsSectionTabsData entity images
        if ($object instanceof TabsSectionTabsData) {
            if ($object->getImage() !== null) {
                $data['image'] = $baseUrl . $object->getImage();
            }
            if ($object->getSlideImage() !== null) {
                $data['slideImage'] = $baseUrl . $object->getSlideImage();
            }
        }

        // Normalizing Blog entity images
        if ($object instanceof Blog) {
            if ($object->getFeaturedImage() !== null) {
                $data['featuredImage'] = $baseUrl . $object->getFeaturedImage();
            }
        }

        // Normalizing BlogSections entity images
        if ($object instanceof BlogSections) {
            if ($object->getBlogSectionImg() !== null) {
                $data['blogSectionImg'] = $baseUrl . $object->getBlogSectionImg();
            }
        }

        return $data;
    }

    public function supportsNormalization($data, ?string $format = null, array $context = []): bool
    {
        return $data instanceof Product
            || $data instanceof CategoryLink
            || $data instanceof Footer
            || $data instanceof HeroSection
            || $data instanceof HeroSectionAboutUs
            || $data instanceof HeroSectionHome
            || $data instanceof IntroSection
            || $data instanceof MeetHanna
            || $data instanceof SaleSection
            || $data instanceof TabsSectionTabsData
            || $data instanceof Blog
            || $data instanceof BlogSections;
    }

    public function getSupportedTypes(?string $format): array
    {
        return [
            Product::class => true,
            CategoryLink::class => true,
            Footer::class => true,
            HeroSection::class => true,
            HeroSectionAboutUs::class => true,
            HeroSectionHome::class => true,
            IntroSection::class => true,
            MeetHanna::class => true,
            SaleSection::class => true,
            TabsSectionTabsData::class => true,
            Blog::class => true,
            BlogSections::class => true,
        ];
    }
}
