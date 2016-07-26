<?php
App::uses('AppModel', 'Model');
/**
 * PersonalPropio Model
 *
 * @property Cargo $Cargo
 */
class Personalpropio extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'personalpropios';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Cargo' => array(
			'className' => 'Cargo',
			'foreignKey' => 'cargo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);


	public $hasAndBelongsToMany = array(
		'Curso' => array(
			'className' => 'Curso',
			'joinTable' => 'cursos_personalpropios',
			'foreignKey' => 'personalpropio_id',
			'associationForeignKey' => 'curso_id',
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

