<?php

namespace App\Controller\Admin;

use App\Entity\AgeRestrictions;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class AgeRestrictionsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return AgeRestrictions::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
