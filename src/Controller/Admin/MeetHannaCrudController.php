<?php

namespace App\Controller\Admin;

use App\Entity\MeetHanna;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class MeetHannaCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MeetHanna::class;
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
            //    IdField::new('id'), // Id polje (komentar)
            TextField::new('meetHannaSectionTitle', 'Upoznaj Hannu naslov'), // Naslov sekcije "Upoznaj Hannu"
            TextField::new('meetHannaSectionSubtitle', 'Upoznaj Hannu podnaslov'), // Podnaslov sekcije "Upoznaj Hannu"
            ImageField::new('meetHannaImage1', 'Prva slika') // Prva slika sekcije "Upoznaj Hannu"
            ->setBasePath('media/') // Osnovna putanja za slike
            ->setUploadDir('public/media') // Putanja za upload slika
            ->setUploadedFileNamePattern('[randomhash].[extension]') // Obrazac za ime uploadovane datoteke
            ->setRequired(false), // Nije obavezno
            ImageField::new('meetHannaImage2', 'Druga slika') // Druga slika sekcije "Upoznaj Hannu"
            ->setBasePath('media/') // Osnovna putanja za slike
            ->setUploadDir('public/media') // Putanja za upload slika
            ->setUploadedFileNamePattern('[randomhash].[extension]') // Obrazac za ime uploadovane datoteke
            ->setRequired(false), // Nije obavezno
            TextEditorField::new('meetHannaParagraph1', 'Paragraf o Hanni'), // Paragraf sekcije "Upoznaj Hannu"
            TextField::new('meetHannaCtaTitle', 'Naslov za poziv na akciju'), // Naslov za poziv na akciju (CTA)
            TextField::new('meetHannaCtaLink', 'Link za poziv na akciju'), // Link za poziv na akciju (CTA)
        ];

    }

}
