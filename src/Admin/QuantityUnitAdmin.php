<?php
# src/Admin/QuantityUnitAdmin.php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\Form\Type\DateTimePickerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

final class QuantityUnitAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
        ->with('General', ['class' => 'col-md-6', 'label' => 'admin.label.general'])
        ->add('code', TextType::class, ['label' => 'admin.label.code'])
        ->end()
        
        ->with('History', ['class' => 'col-md-3', 'label' => 'admin.label.history'])
        ->add('createdAt', DateTimePickerType::class,  [
            'label' => 'admin.label.created_at',
            'format'=>'yyyy-MM-dd HH:mm',
            'attr' => [
                'readonly' => true
            ]
        ])
        ->add('updatedAt', DateTimePickerType::class, [
            'label' => 'admin.label.updated_at',
            'format'=>'yyyy-MM-dd HH:mm',
            'attr' => [
                'readonly' => true
            ]
        ])
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
        ->addIdentifier('code', null, ['label' => 'admin.label.code'])
        ->add('_action', 'admin.label.actions', [
            'actions' => [
                'edit' => [],
                'delete' => [],
            ]
        ]);
    }
}