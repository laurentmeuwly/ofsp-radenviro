<?php 
// src/Admin/ElementAdmin.php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use A2lix\TranslationFormBundle\Form\Type\TranslationsType;

class ElementAdmin extends AbstractAdmin
{
	// Fields to be shown on lists
	protected function configureListFields(ListMapper $listMapper)
	{
		$listMapper
		->addIdentifier('symbol', null, array('label' => 'admin.element.symbol'))
		->add('z', null, array('label' => 'admin.element.z'))
		->add('name', null, array('label' => 'admin.element.name'))
		
		/*->add('active', 'boolean', array('label' => 'admin.label.active',
				'editable' => true,
				'header_style' => 'text-align: center',
				'row_align' => 'center')
				)*/
		
		/*->add('_action', null, array(
				'actions' => array(
						'show' => array(),
						'edit' => array(),
						'delete' => array(),
				)
		))*/
		;
	}
	
	
	protected function configureDatagridFilters(DatagridMapper $datagridMapper)
	{
		$datagridMapper
		//->add('active', null, ['operator_type' => 'sonata_type_boolean', 'label' => 'admin.label.active'])
		->add('symbol')
		->add('translations.name', null, ['label' => 'admin.element.name'])
		;
	}
	
	
	/**
	 * {@inheritdoc}
	 */
	protected function configureFormFields(FormMapper $formMapper)
	{
		$formMapper
		->with('Element', array('class' => 'col-md-6'))
		->add('symbol', null, array('label' => 'admin.element.code'))
		->add('z', null, array('label' => 'admin.label.z'))
		
		->add('translations', TranslationsType::class, array(
				'label' => false,
				'fields' => array(
						'name'=> array('label' => 'admin.element.name')
				)
		))
		->end()
		;
	}
}