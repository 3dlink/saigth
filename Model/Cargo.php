<?php
App::uses('AppModel', 'Model');
/**
 * @property User $User
 */
class Cargo extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'nombre';



	public $hasMany = array(
		'Personalpropio' => array(
			'className' => 'Personalpropio',
			'foreignKey' => 'cargo_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
}
