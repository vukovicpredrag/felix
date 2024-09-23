<?php

namespace App\Controller\Admin;

use App\Entity\SaleSection;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class SaleSectionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SaleSection::class;
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
            //  IdField::new('id'),
            TextField::new('saleSectionTitle', 'Naslov sekcije rasprodaje'),
            TextareaField::new('saleSectionParagraph', 'Paragraf sekcije rasprodaje'),
            TextField::new('saleSectionLink', 'Link sekcije rasprodaje'),
            TextField::new('saleSectionLinkTitle', 'Naslov linka sekcije rasprodaje'),

            ImageField::new('image1', 'Slika 1')
                ->setBasePath('media/')
                ->setUploadDir('public/media')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false),
            ImageField::new('image2', 'Slika 2')
                ->setBasePath('media/')
                ->setUploadDir('public/media')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false),
            ImageField::new('image3', 'Slika 3')
                ->setBasePath('media/')
                ->setUploadDir('public/media')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false),
            ImageField::new('image4', 'Slika 4')
                ->setBasePath('media/')
                ->setUploadDir('public/media')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false),
        ];
    }

}
