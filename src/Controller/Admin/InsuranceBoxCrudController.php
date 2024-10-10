<?php

namespace App\Controller\Admin;

use App\Entity\Categories;
use App\Entity\HomePageSlider;
use App\Entity\InsuranceBox;
use App\Entity\OurGoalsData;
use App\Entity\Product;
use App\Entity\Promotions;
use App\Entity\SEO;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class InsuranceBoxCrudController extends AbstractCrudController
{

    private $entityManager;

    // Inject Doctrine EntityManager into the constructor
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public static function getEntityFqcn(): string
    {
        return InsuranceBox::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        // Primeni prilagođene oznake na akcije na više stranica
        return $actions
            ->add(Crud::PAGE_INDEX, Action::DETAIL) // Add DETAIL action to the index page
            ->update(Crud::PAGE_INDEX, Action::NEW, function (Action $action) {
                return $action->setLabel('Dodaj'); // Change label for NEW action
            })
            ->update(Crud::PAGE_INDEX, Action::EDIT, function (Action $action) {
                return $action->setLabel('Izmjeni'); // Change label for EDIT action
            })
            ->update(Crud::PAGE_INDEX, Action::DETAIL, function (Action $action) {
                return $action->setLabel('Prikaži'); // Change label for DETAIL action
            })
            ->update(Crud::PAGE_DETAIL, Action::EDIT, function (Action $action) {
                return $action->setLabel('Edituj '); // Prilagođena oznaka za dugme "Izmeni" na stranici detalja
            })
            ->update(Crud::PAGE_EDIT, Action::SAVE_AND_CONTINUE, function (Action $action) {
                return $action->setLabel('Sačuvaj i nastavi uređivanje'); // Prilagođena oznaka za "Sačuvaj i nastavi"
            })
            ->update(Crud::PAGE_EDIT, Action::SAVE_AND_RETURN, function (Action $action) {
                return $action->setLabel('Sačuvaj i vrati se'); // Prilagođena oznaka za "Sačuvaj i vrati se"
            })
            ->update(Crud::PAGE_NEW, Action::SAVE_AND_ADD_ANOTHER, function (Action $action) {
                return $action->setLabel('Sačuvaj i dodaj novi'); // Prilagođena oznaka za "Sačuvaj i dodaj novi" na stranici za dodavanje
            })
            ->update(Crud::PAGE_NEW, Action::SAVE_AND_RETURN, function (Action $action) {
                return $action->setLabel('Sačuvaj i vrati se'); // Prilagođena oznaka za "Sačuvaj i vrati se" na stranici za dodavanje
            });
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle(Crud::PAGE_INDEX, 'Lista ')
            ->setPageTitle(Crud::PAGE_NEW, 'Kreiraj') // Prilagođena oznaka za "Dodaj proizvod" dugme
            ->setPageTitle(Crud::PAGE_EDIT, 'Edituj ')
            ->setPageTitle(Crud::PAGE_DETAIL, 'Detalji');
    }

    public function configureFields(string $pageName): iterable
    {

        return [
            TextField::new('ctaTitle', 'CTA Naslov (ostaviti prazno ako ne zelite da se dugme prikaze)'),
            TextField::new('ctaLink', 'CTA Link'),
            ImageField::new('icon', 'Ikona Prve stavke ')
                ->setBasePath('media/')
                ->setUploadDir('public/media')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false),
            TextEditorField::new('text1', 'Tekst prve stavke'),

            ImageField::new('icon2', 'Ikona druge stavke ')
                ->setBasePath('media/')
                ->setUploadDir('public/media')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false),
            TextEditorField::new('text2', 'Tekst druge stavke '),

            ImageField::new('icon3', 'Ikona trece stavke')
                ->setBasePath('media/')
                ->setUploadDir('public/media')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false),
            TextEditorField::new('text3', 'Tekst trece stavke'),

        ];
    }

}
