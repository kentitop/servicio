<?php
// src/Acme/DemoBundle/Admin/PostAdmin.php

namespace Imie\MainBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Imie\MainBundle\Form\ImageType;



class ServiceAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
        ->add('titre')
        ->add('description')
        ->add('email')
        ->add('preferences', 'sonata_type_datetime_picker')
        ->add('image', 'sonata_type_model', array('property' => 'path'))
        ->add('categorie')

        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
        ->add('titre')
        ->add('description')
        ->add('email')
        ->add('preferences', 'doctrine_orm_datetime', array('field_type'=>'sonata_type_datetime_picker',))
        ->add('categorie')


        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
        ->add('titre')
        ->add('description')
        ->add('email')
        ->add('categorie')
        ->add('preferences')

        ;
    }


    public function prePersist($service) {
        $this->manageEmbeddedImageAdmins($service);
    }
    public function preUpdate($service) {
        $this->manageEmbeddedImageAdmins($service);
    }
    private function manageEmbeddedImageAdmins($service) {
        // Cycle through each field
        foreach ($this->getFormFieldDescriptions() as $fieldName => $fieldDescription) {
            // detect embedded Admins that manage Images
            if ($fieldDescription->getType() === 'sonata_type_admin' &&
                ($associationMapping = $fieldDescription->getAssociationMapping()) &&
                $associationMapping['targetEntity'] === 'Imie\MainBundle\Entity\Image'
            ) {
                $getter = 'get' . $fieldName;
                $setter = 'set' . $fieldName;

                /** @var Image $image */
                $image = $page->$getter();
                if ($image) {
                    if ($image->getFile()) {
                        // update the Image to trigger file management
                        $image->refreshUpdated();
                    } elseif (!$image->getFile() && !$image->getFilename()) {
                        // prevent Sf/Sonata trying to create and persist an empty Image
                        $page->$setter(null);
                    }
                }
            }
        }
    }
}
