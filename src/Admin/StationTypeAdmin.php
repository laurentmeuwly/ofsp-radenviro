<?php 
// src/Admin/NuclideAdmin.php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\Form\Type\DateTimePickerType;
use A2lix\TranslationFormBundle\Form\Type\TranslationsType;

class StationTypeAdmin extends AbstractAdmin
{
	// Fields to be shown on lists
	protected function configureListFields(ListMapper $listMapper)
	{
		$listMapper
		->addIdentifier('code')
		->add('description')
		;
	}
	
	protected function configureFormFields(FormMapper $formMapper)
	{
		$formMapper
		->with('General', array('class' => 'col-md-3', 'label' => 'admin.label.general'))
		->add('code')
		->end()
		->with('Informations', array('class' => 'col-md-6', 'label' => 'admin.label.informations'))
			->add('translations', TranslationsType::class, array(
				'label' => false,
				'fields' => array(
								'description'=> array('label' => 'admin.label.description')
							)
				))
		->end()
		->with('History', array('class' => 'col-md-3', 'label' => 'admin.label.history'))
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
	
}