<?php 
// src/Admin/SiteTypeAdmin.php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\Form\Type\DateTimePickerType;
use A2lix\TranslationFormBundle\Form\Type\TranslationsType;

class SiteTypeAdmin extends AbstractAdmin
{
	// Fields to be shown on lists
	protected function configureListFields(ListMapper $listMapper)
	{
	    $listMapper
	    ->addIdentifier('name', null, array('label' => 'admin.site_type.name'))
	    ->add('_color', null, array( 'label' => 'admin.label.color',
	        'header_style' => 'text-align: center',
	        'row_align' => 'center')
	        )
        ->add('_active', 'boolean', array('label' => 'admin.label.active',
            'editable' => true,
            'header_style' => 'text-align: center',
            'row_align' => 'center')
            )
        /*->add('_position', 'actions', array(
            'actions' => array(
                'move' => array(
                    'template' => 'PixSortableBehaviorBundle:Default:_sort.html.twig'
                )
            )
        ))*/
        ->add('_action', 'actions', array(
            'actions' => array(
                'edit' => array(),
                'delete' => array(),
            )
        ))
        ;
	}
	
	protected function configureFormFields(FormMapper $formMapper)
	{
	    $formMapper
	    ->with('General', array('class' => 'col-md-6', 'label' => 'admin.label.general'))
	    ->add('translations', TranslationsType::class, array(
	        'label' => false,
	        'fields' => array(
	            'name'=> array('label' => 'admin.site_type.name')
	        )
	    ))
	    ->end()
	    ->with('Attributs', array('class' => 'col-md-3', 'label' => 'admin.label.attributs'))
	    //->add('color', ColorPickerType::class,  array('label' => 'admin.label.color'))
	    ->add('active', null, array('label' => 'admin.label.active'))
	    ->add('position', null, array('label' => 'admin.label.position'))
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
		
	}
	
}