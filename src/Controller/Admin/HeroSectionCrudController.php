<?php

namespace App\Controller\Admin;

use App\Entity\HeroSection;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class HeroSectionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return HeroSection::class;
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
                return $action->setLabel('Edituj');
            })
            ->update(Crud::PAGE_EDIT, Action::SAVE_AND_CONTINUE, function (Action $action) {
                return $action->setLabel('Sačuvaj i nastavi uređivanje');
            })
            ->update(Crud::PAGE_EDIT, Action::SAVE_AND_RETURN, function (Action $action) {
                return $action->setLabel('Sačuvaj i vrati se');
            })
            ->update(Crud::PAGE_NEW, Action::SAVE_AND_ADD_ANOTHER, function (Action $action) {
                return $action->setLabel('Sačuvaj i dodaj');
            })
            ->update(Crud::PAGE_NEW, Action::SAVE_AND_RETURN, function (Action $action) {
                return $action->setLabel('Sačuvaj i vrati se');
            });
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle(Crud::PAGE_INDEX, 'Pregled')
            ->setPageTitle(Crud::PAGE_NEW, 'Kreiraj')
            ->setPageTitle(Crud::PAGE_EDIT, 'Edituj')
            ->setPageTitle(Crud::PAGE_DETAIL, 'Detalji');
        // ->setEntityLabelInSingular('Kategorije linkovi')
        //->setEntityLabelInPlural('Kategorije link');
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('mainTitlePreText', 'Prethodni tekst glavnog naslova'),
            TextField::new('mainTitle', 'Glavni naslov'),
            TextareaField::new('paragraph', 'Paragraf'),

            TextField::new('cta1Link', 'Prvi CTA link'),
            TextField::new('cta1Title', 'Naslov prvog CTA'),

            TextField::new('cta2Link', 'Drugi CTA link'),
            TextField::new('cta2LinkText', 'Tekst drugog CTA linka'),

            TextField::new('type', 'Tip'),

            ImageField::new('backgroundImage', 'Pozadinska slika')
                ->setBasePath('media/')
                ->setUploadDir('public/media')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false),
        ];
    }

}
