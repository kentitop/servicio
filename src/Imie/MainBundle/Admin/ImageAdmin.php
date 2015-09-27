<?php
// src/Acme/DemoBundle/Admin/PostAdmin.php

namespace Imie\MainBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Imie\MainBundle\Form\ImageType;



class ImageAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('path', null, array(
                'required' => false,
                ))
            ->add('file', 'file', array(
                'required' => false,
                ))
            ->add('name')
            ->add('alt')
            // ... other fields can go here ...
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
        ->add('path')
        ->add('name')
        ->add('alt')


        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
        ->add('path')
        ->add('name')
        ->add('alt')

        ;
    }

    public function prePersist($image) {
        $this->manageFileUpload($image);
    }

    public function preUpdate($image) {
        $this->manageFileUpload($image);
    }

    private function manageFileUpload($image) {
        if ($image->preUpload()) {
            $image->upload();
        }
    }

    // ...
}
