<?php
 
 class AppController extends Controller {
public $components = array('Auth','Session','Message', 'RequestHandler', 'Excelfile', 'Uploadfile');
	public $helpers = array('Html', 'Form', 'Session', 'Text', 'Time', 'PhpExcel');
	public function beforeFilter(){
		$this->Auth->allow('*');
		$this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
		$this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login');
		$this->Auth->loginRedirect = array('controller' => 'applicants', 'action' => 'index');
	}
}

