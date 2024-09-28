<?php

namespace App\Controller\Admin;

use App\Entity\Footer;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class FooterCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Footer::class;
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
            ->update(Crud::PAGE_INDEX, Action::EDIT, function (Action $action) {
                return $action->setLabel('Izmjeni'); // Change label for EDIT action
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
            // Id field (optional)
          //  IdField::new('id', 'ID'),

            // Text fields
            TextField::new('footerHeading', 'Naslov footera'),
            TextareaField::new('footerParagraph', 'Paragraf footera'),

            // CTA link
          //  TextField::new('cta1Link', 'CTA Link'),

            // Box 1 fields
            ImageField::new('footerBox1Icon', 'Ikona kutije 1')
                ->setBasePath('media/')
                ->setUploadDir('public/media')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false)->hideOnIndex(),
            TextField::new('footerBox1Text1', 'Tekst 1 kutije 1'),
            TextField::new('footerBox1Text2', 'Tekst 2 kutije 1'),

            // Box 2 fields
            ImageField::new('footerBox2Icon', 'Ikona kutije 2')
                ->setBasePath('media/')
                ->setUploadDir('public/media')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false)->hideOnIndex(),
            TextField::new('footerBox2Text1', 'Tekst 1 kutije 2'),
            TextField::new('footerBox2Text2', 'Tekst 2 kutije 2'),

            // Box 3 fields
            ImageField::new('footerBox3Icon', 'Ikona kutije 3')
                ->setBasePath('media/')
                ->setUploadDir('public/media')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false)->hideOnIndex(),
            TextField::new('footerBox3Text1', 'Tekst 1 kutije 3'),
            TextField::new('footerBox3Text2', 'Tekst 2 kutije 3'),

            // Box 4 fields
            ImageField::new('footerBox4Icon', 'Ikona kutije 4')
                ->setBasePath('media/')
                ->setUploadDir('public/media')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false)->hideOnIndex(),
            TextField::new('footerBox4Text1', 'Tekst 1 kutije 4'),
            TextField::new('footerBox4Text2', 'Tekst 2 kutije 4'),

            // Social media links
            TextField::new('facebookLink', 'Facebook link'),
            TextField::new('instagramLink', 'Instagram link'),
            TextField::new('linkedinLink', 'LinkedIn link'),
            TextField::new('youtubeLink', 'YouTube link'),
        ];
    }

}
