<?php
App::uses('AppModel', 'Model');
/**
 * Otherearning Model
 *
 * @property Otherearningsentry $Otherearningsentry
 */
class Otherearning extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Otherearningsentry' => array(
			'className' => 'Otherearningsentry',
			'foreignKey' => 'otherearning_id',
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
