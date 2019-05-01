<?php 
// src/Admin/IsotopeAdmin.php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use A2lix\TranslationFormBundle\Form\Type\TranslationsType;

class IsotopeAdmin extends AbstractAdmin
{
	// Fields to be shown on lists
	protected function configureListFields(ListMapper $listMapper)
	{
		$listMapper
		->addIdentifier('code', null, array('label' => 'admin.isotope.code'))
		->add('name', null, array('label' => 'admin.isotope.name'))
		->add('active', 'boolean', array('label' => 'admin.label.active',
				'editable' => true,
				'header_style' => 'text-align: center',
				'row_align' => 'center')
				)
		
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
		->add('active', null, ['operator_type' => 'sonata_type_boolean', 'label' => 'admin.label.active'])
		->add('code')
		->add('translations.name', null, ['label' => 'admin.isotope.name'])
		;
	}
	
	
	/**
	 * {@inheritdoc}
	 */
	protected function configureFormFields(FormMapper $formMapper)
	{
		$formMapper
		->with('Isotope', array('class' => 'col-md-6'))
		->add('code', null, array('label' => 'admin.isotope.code'))
		->add('translations', TranslationsType::class, array(
				'label' => false,
				'fields' => array(
						'name'=> array('label' => 'admin.isotope.name')
				)
		))
		->add('active', null, array('label' => 'admin.label.active'))
		->end()
		;
	}
}