<?php 
# src/Admin/CountryAdmin.php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
//use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use A2lix\TranslationFormBundle\Form\Type\TranslationsType;

class CountryAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
        ->with('Country', array('class' => 'col-md-6'))
        ->add('code')
        ->add('translations', TranslationsType::class)
        ->end()
        ;
    }
    
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('code');
    }
    
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('code')
            ->add('name')
        ;
    }
	
}