<?php
App::uses('AppModel', 'Model');
/**
 * Companyprofile Model
 *
 */
class Companyprofile extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
 
	public function beforeSave($options = array()){
		if(!empty($this->data['Companyprofile']['coefooter'])){
			$this->data['Companyprofile']['coefooter'] = str_replace('\'', '\'', $this->data['Companyprofile']['coefooter']);
		}
		
	}
	
	public $validate = array(
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'address' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'TIN' => array(
			'notEmpty' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
}
