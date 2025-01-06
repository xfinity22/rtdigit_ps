<?php
App::uses('AppController', 'Controller');

App::import('Vendor', 'phpexcel/Classes/PHPExcel.php');

App::import('Vendor', 'phpexcel/index');/**
 * Ssscontribs Controller
 *
 * @property Ssscontrib $Ssscontrib
 * @property PaginatorComponent $Paginator
 */
class SsscontribsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->paginate = array(
			'limit' => 50
		);
		$this->Ssscontrib->recursive = 0;
		$this->set('ssscontribs', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Ssscontrib->exists($id)) {
			throw new NotFoundException(__('Invalid ssscontrib'));
		}
		$options = array('conditions' => array('Ssscontrib.' . $this->Ssscontrib->primaryKey => $id));
		$this->set('ssscontrib', $this->Ssscontrib->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			
			$this->request->data['Ssscontrib']['mandatorytotal'] = $this->request->data['Ssscontrib']['mandatoryee'] + $this->request->data['Ssscontrib']['mandatoryer'];
			$this->request->data['Ssscontrib']['eetotal'] = $this->request->data['Ssscontrib']['eess'] +  $this->request->data['Ssscontrib']['mandatoryee'];
			$this->request->data['Ssscontrib']['toatlss'] = $this->request->data['Ssscontrib']['eess'] + $this->request->data['Ssscontrib']['erss'];
			$this->request->data['Ssscontrib']['ertotal'] = $this->request->data['Ssscontrib']['erec'] + $this->request->data['Ssscontrib']['erss'];
			$this->request->data['Ssscontrib']['eetotal'] = $this->request->data['Ssscontrib']['eess'];
			$this->request->data['Ssscontrib']['total'] = $this->request->data['Ssscontrib']['eetotal'] + $this->request->data['Ssscontrib']['ertotal'] + $this->request->data['Ssscontrib']['mandatorytotal'];
			$this->Ssscontrib->create();
			if ($this->Ssscontrib->save($this->request->data)) {
				$this->Session->setFlash(__('The ssscontrib has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ssscontrib could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Ssscontrib->exists($id)) {
			throw new NotFoundException(__('Invalid ssscontrib'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$this->request->data['Ssscontrib']['toatlss'] = $this->request->data['Ssscontrib']['eess'] + $this->request->data['Ssscontrib']['erss'];
			$this->request->data['Ssscontrib']['ertotal'] = $this->request->data['Ssscontrib']['erec'] + $this->request->data['Ssscontrib']['erss'];
			$this->request->data['Ssscontrib']['eetotal'] = $this->request->data['Ssscontrib']['eess'];
			$this->request->data['Ssscontrib']['total'] = $this->request->data['Ssscontrib']['eetotal'] + $this->request->data['Ssscontrib']['ertotal'] + $this->request->data['Ssscontrib']['mandatorytotal'];
			if ($this->Ssscontrib->save($this->request->data)) {
				$this->Session->setFlash(__('The ssscontrib has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ssscontrib could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Ssscontrib.' . $this->Ssscontrib->primaryKey => $id));
			$this->request->data = $this->Ssscontrib->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Ssscontrib->id = $id;
		if (!$this->Ssscontrib->exists()) {
			throw new NotFoundException(__('Invalid ssscontrib'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Ssscontrib->delete()) {
			$this->Session->setFlash(__('The ssscontrib has been deleted.'));
		} else {
			$this->Session->setFlash(__('The ssscontrib could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	public function getcontri($amount = null){
		$ssscontri = $this->Ssscontrib->find(
			'first', array('conditions' => array('AND' => array('Ssscontrib.rangestart <=' => $amount, 'Ssscontrib.rangeend >=' => $amount))));
		if(isset($this->params['requested'])){
			return $ssscontri;
		}
	}		
	
	public function extract($id=null){

		$fileid = $id;

		$this->set('fileid', $fileid);

		$logid = $this->Auth->user('id');

		$this->loadModel('Uploadedfile');

	

		$filename = $this->Uploadedfile->find('first', array('conditions' => array('Uploadedfile.id' => $id)));

		$continue_save = false;

		

		//check if the file exists

		if(file_exists(APP.'xls/'.$this->Auth->user('id').'/'.$filename['Uploadedfile']['dateuploaded'].'/'.$filename['Uploadedfile']['filename'])){

			$continue_save = true;

		}

		$url = 'xls/'.$this->Auth->user('id').'/'.$filename['Uploadedfile']['dateuploaded'].'/'.$filename['Uploadedfile']['filename'];

		

		if($continue_save){
			$this->Ssscontrib->query('TRUNCATE table payroll_ssscontribs;');

			$objPHPExcel = new PHPExcel();

			$objReader = PHPExcel_IOFactory::createReader('Excel2007');

			$objReader = new PHPExcel_Reader_Excel5();

			$objReader->setReadDataOnly(true);		

			$objPHPExcel = PHPExcel_IOFactory::load($this->checkthefile($filename));

			//$objWorksheet = $objPHPExcel->getActiveSheet();

							

			$this->set('objWorksheet', $objPHPExcel->setActiveSheetIndex(0)); /*SELECT THE TAB NUMBER*/

			$this->set('heighestRow', $objPHPExcel->setActiveSheetIndex(0)->getHighestRow());

			$this->set('filename', $this->Uploadedfile->read(null, $filename['Uploadedfile']['id']));			

						

			if($this->request->is('post')){			

			

				if(empty($this->data['Ssscontrib']['rangestart'])){

				

				}else{

					$count = 0;

					foreach($this->data['Ssscontrib']['rangestart'] as $index => $key):

						$count++;

						$data1[] = array(
							'Ssscontrib' => array(

								'rangestart' => $this->data['Ssscontrib']['rangestart'][$index],

								'rangeend' => $this->data['Ssscontrib']['rangeend'][$index],

								'msc' => $this->data['Ssscontrib']['msc'][$index],

								'mandatory' => $this->data['Ssscontrib']['mandatory'][$index],

								'erss' => $this->data['Ssscontrib']['erss'][$index],

								'eess' => $this->data['Ssscontrib']['eess'][$index],

								'toatlss' => $this->data['Ssscontrib']['toatlss'][$index],

								'erec' => $this->data['Ssscontrib']['erec'][$index],

								'eetotal' => $this->data['Ssscontrib']['eetotal'][$index],

								'ertotal' => $this->data['Ssscontrib']['ertotal'][$index],

								'total' => $this->data['Ssscontrib']['total'][$index],
								'mandatoryer' => 0,
								'mandatoryee' => 0,
								'mandatorytotal' => 0,
							)

						);

						

					endforeach;

					

					$this->Ssscontrib->create();	

					if($this->Ssscontrib->saveAll($data1)){								

						$this->Session->setFlash($this->Message->getMessage("DATA WAS SUCCESFULLY SAVED!"), 'success_message');

						$this->redirect(array('controller' => 'ssscontribs', 'action' => 'index'));//, $logid, $this->data['Applicant']['dateadded']));

					}else{

						$this->Session->setFlash(__('DATA WAS SUCCESFULLY SAVED!.' . mysql_error()));

						 $this->redirect(array('controller' => 'ssscontribs', 'action' => 'index'));

						 

						if($this->Uploadedfile->deleteAll(['Uploadedfile.id' => $fileid])){

							$this->Session->setFlash(__('Please, try again.' . mysql_error()));

						}

					}															

				}

			}

		}else{

			$this->Session->setFlash(' Unable to continue, the system could not find the file', 'error_message');

		}

		$this->set('logid', $this->Auth->user('id'));		

	}
	
	
	public function checkthefile($filename=null){		

		if(!empty($filename)){

			$dir  = APP.'xls/';

			$folder = $filename['Uploadedfile']['dateuploaded'];

			$filename = $filename['Uploadedfile']['filename'];

			$file_to_check = $dir . $this->Auth->user('id').'/'.$folder.'/'.$filename;

			

			if(file_exists($file_to_check)){

				return $file_to_check;

			}else{

				$this->Session->setFlash($this->Message->getMessage("Unable to locate the file ".$file_to_check), 'error_message');

			}

		}else{

			$this->Session->setFlash($this->Message->getMessage("Unable to locate the file "), 'error_message');

		}			

	}
}
