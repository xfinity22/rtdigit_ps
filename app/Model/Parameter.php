<?php
App::uses('AppModel', 'Model');
/**
 * Parameter Model
 *
 * @property Lateundertimebase $Lateundertimebase
 */
class Parameter extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'logo' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Lateundertimebase' => array(
			'className' => 'Lateundertimebase',
			'foreignKey' => 'lateundertimebase_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
