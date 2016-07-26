<?php
App::uses('AppModel', 'Model');
/**
 * Curso Model
 *
 * @property Personalpropio $Personalpropio
 */
class Curso extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Personalpropio' => array(
			'className' => 'Personalpropio',
			'joinTable' => 'cursos_personalpropios',
			'foreignKey' => 'curso_id',
			'associationForeignKey' => 'personalpropio_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);

}
