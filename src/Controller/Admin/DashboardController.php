<?php

namespace App\Controller\Admin;

use App\Entity\About;
use App\Entity\Article;
use App\Entity\BelowIntro;
use App\Entity\Blog;
use App\Entity\BlogSections;
use App\Entity\Categories;
use App\Entity\CategoryLink;
use App\Entity\CategorySection;
use App\Entity\Contact;
use App\Entity\Footer;
use App\Entity\HeroSection;
use App\Entity\HeroSectionAboutUs;
use App\Entity\HeroSectionHome;
use App\Entity\HomePage;
use App\Entity\IntroSection;
use App\Entity\MeetHanna;
use App\Entity\Newsletter;
use App\Entity\Product;
use App\Entity\SaleSection;
use App\Entity\TabsSectionIntro;
use App\Entity\TabsSectionTabsData;
use App\Entity\TabsSectionText;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use Symfony\Component\Security\Http\Attribute\IsGranted;


class DashboardController extends AbstractDashboardController
{
    /**
     * @var \EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator
     */
    private AdminUrlGenerator $adminUrlGenerator;

    public function __construct(AdminUrlGenerator $adminUrlGenerator)
    {
        $this->adminUrlGenerator = $adminUrlGenerator;
    }
    #[Route('/admin', name: 'admin')]
  //  #[IsGranted('ROLE_ADMIN')]
    public function index(): Response
    {
        $routeBuilder = $this->adminUrlGenerator;

        return $this->redirect($routeBuilder->setController(ProductCrudController::class)->setAction(Action::INDEX)->generateUrl());
    }


    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Hanna Chairs');
    }


    public function configureMenuItems(): iterable
    {
        yield MenuItem::section('Proizvodi');
        yield MenuItem::linkToCrud('Proizvodi', 'fa-solid fa-chair', Product::class);
        yield MenuItem::linkToCrud('Hero Sekcija Proizvodi', 'fa-solid fa-star', HeroSection::class);


        yield MenuItem::section('POČETNA STRANICA');
        yield MenuItem::subMenu('Kategorija', 'fa-solid fa-layer-group')
            ->setSubItems([
                MenuItem::linkToCrud('Tekstovi', 'fa-solid fa-list', CategorySection::class),
                MenuItem::linkToCrud('Linkovi', 'fa-solid fa-list', CategoryLink::class),
            ]);

        yield MenuItem::subMenu('Tabovi', 'fa-solid fa-indent')
            ->setSubItems([
                MenuItem::linkToCrud('Uvod', 'fa-solid fa-indent', TabsSectionText::class),
                MenuItem::linkToCrud('Podaci', 'fa-solid fa-indent', TabsSectionTabsData::class),

            ]);

        yield MenuItem::linkToCrud('Prdaja', 'fa-solid fa-tag', SaleSection::class);
        yield MenuItem::linkToCrud('Upoznaj Hanu', 'fa-solid fa-h', MeetHanna::class);
        yield MenuItem::linkToCrud('Hero Sekcija Početna', 'fa-solid fa-star', HeroSectionHome::class);


        yield MenuItem::section('O nama');
        yield MenuItem::linkToCrud('Uvod', 'fa-solid fa-info', IntroSection::class);
        yield MenuItem::linkToCrud('Ipod Uvoda', 'fa-solid fa-info', BelowIntro::class);
        yield MenuItem::linkToCrud('Hero Sekcija O nama', 'fa-solid fa-star', HeroSectionAboutUs::class);


        yield MenuItem::section('Kontakt');
        yield MenuItem::linkToCrud('Kontakt', 'fa-solid fa-address-book', Contact::class);

        yield MenuItem::section('Futer');
        yield MenuItem::linkToCrud('Futer', 'fa-solid fa-note-sticky', Footer::class);

        yield MenuItem::section('Produkt kategorije');
        yield MenuItem::linkToCrud('Kategorije', 'fa-solid fa-note-sticky', Categories::class);

        yield MenuItem::section('Newsletter');
        yield MenuItem::linkToCrud('Newsletter', 'fa-solid fa-envelope', Newsletter::class);

        yield MenuItem::section('Blog');
        yield MenuItem::linkToCrud('Blog', 'fa-solid fa-newspaper', Blog::class);
        yield MenuItem::linkToCrud('Blog Sekcije', 'fa-regular fa-newspaper', BlogSections::class);


    }
}
