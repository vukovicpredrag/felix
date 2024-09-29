<?php

namespace App\Controller\Admin;

use App\Entity\BlogSections;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;

class BlogSectionsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return BlogSections::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->add(Crud::PAGE_INDEX, Action::DETAIL) // Add DETAIL action to the index page
            ->update(Crud::PAGE_INDEX, Action::NEW, function (Action $action) {
                return $action->setLabel('Dodaj Sekciju'); // Change label for NEW action
            })
            ->update(Crud::PAGE_INDEX, Action::EDIT, function (Action $action) {
                return $action->setLabel('Izmjeni Sekciju'); // Change label for EDIT action
            })
            ->update(Crud::PAGE_INDEX, Action::DETAIL, function (Action $action) {
                return $action->setLabel('Prikaži Sekciju'); // Change label for DETAIL action
            })
            ->update(Crud::PAGE_DETAIL, Action::EDIT, function (Action $action) {
                return $action->setLabel('Edituj Sekciju');
            })
            ->update(Crud::PAGE_EDIT, Action::SAVE_AND_CONTINUE, function (Action $action) {
                return $action->setLabel('Sačuvaj i nastavi uređivanje');
            })
            ->update(Crud::PAGE_EDIT, Action::SAVE_AND_RETURN, function (Action $action) {
                return $action->setLabel('Sačuvaj i vrati se');
            })
            ->update(Crud::PAGE_NEW, Action::SAVE_AND_ADD_ANOTHER, function (Action $action) {
                return $action->setLabel('Sačuvaj i dodaj novu sekciju');
            })
            ->update(Crud::PAGE_NEW, Action::SAVE_AND_RETURN, function (Action $action) {
                return $action->setLabel('Sačuvaj i vrati se');
            });
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle(Crud::PAGE_INDEX, 'Pregled Sekcija Bloga')
            ->setPageTitle(Crud::PAGE_NEW, 'Dodaj Novu Sekciju')
            ->setPageTitle(Crud::PAGE_EDIT, 'Izmjeni Sekciju')
            ->setPageTitle(Crud::PAGE_DETAIL, 'Detalji Sekcije Bloga');
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('sectionTitle', 'Naslov Sekcije'),
            TextareaField::new('firstParagraph', 'Prvi Paragraf'),
            ImageField::new('blogSectionImg', 'Slika Sekcije')
                ->setBasePath('media/')
                ->setUploadDir('public/media')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false)
                ->setHelp('Preporučen je png format slike zbog automatske optimizacije'),
            TextareaField::new('blogSectionImgDescription', 'Opis Slike Sekcije'),
            TextEditorField::new('secondParagraph', 'Drugi Paragraf'),
            TextField::new('ctaSectionTitle', 'Naslov CTA Sekcije'),
            TextField::new('ctaBtnLink', 'Link CTA Dugmeta'),
            TextField::new('ctaBtnTitle', 'Naslov CTA Dugmeta'),
            TextareaField::new('quoteSectionText', 'Citati Sekcije'),
            TextEditorField::new('thirdParagraph', 'Treći Paragraf'),
            AssociationField::new('blog', 'Blog')
                ->setRequired(true)
                ->setHelp('Izaberite blog kojem pripada ova sekcija')
                ->autocomplete()
                ->setCustomOption('autocomplete_item_label', function (Blog $blog) {
                    return $blog->getBlogTitle(); // Replace 'getBlogTitle()' with the actual method to get the title
                })
        ];
    }
}
