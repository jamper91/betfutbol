<?php
App::uses('AppModel', 'Model');
/**
 * Liga Model
 *
 * @property Deporte $Deporte
 */
class Liga extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Deporte' => array(
			'className' => 'Deporte',
			'foreignKey' => 'deporte_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
