<?php
App::uses('AppController', 'Controller');
/**
 * Uploadedfiles Controller
 *
 * @property Uploadedfile $Uploadedfile
 * @property PaginatorComponent $Paginator
 */
class UploadedfilesController extends AppController {

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
		$this->Uploadedfile->recursive = 0;
		$this->set('uploadedfiles', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Uploadedfile->exists($id)) {
			throw new NotFoundException(__('Invalid uploadedfile'));
		}
		$options = array('conditions' => array('Uploadedfile.' . $this->Uploadedfile->primaryKey => $id));
		$this->set('uploadedfile', $this->Uploadedfile->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if(!empty($fileid)){
			$this->Uploadedfile->delete($fileid);
		}
		
		$this->set('id', $this->Auth->user('id'));
		if($this->request->is('post')){
			
			$continue_upload=0;
			$filename = $this->data['Uploadedfile']['filename'];
			$map = $this->Auth->user('id');
			$date = date('Y-m-d');
			
			$continue_upload =1;	
			
			if($continue_upload==0){
				$this->Session->setFlash($this->Message->getMessage("Supply the necessary fields."), 'error_message');
			}else{
				if(empty($filename['name'])){
					$this->Session->setFlash($this->Message->getMessage("Select the file to upload."), 'error_message');
				}else{
					if($this->Uploadfile->checkfileExtensionforfile($filename)){										
						if($this->Uploadfile->checkFolder(APP.'xls', $map)){
							if($this->Uploadfile->checkFolder(APP.'xls', $map.'/'.$date)){
								$this->Uploadedfile->create();
								if($this->Uploadfile->uploadforDownloadfile($filename, APP.'xls/'.$map.'/'.$date.'/', $this->renamefile($map, $date))){
								$count = $this->Uploadedfile->find('count', array('conditions' => array('AND' => array('Uploadedfile.dateuploaded' => date('Y-m-d'), 'Uploadedfile.user_id' => $this->Auth->user('id')))));
								if(empty($count)){
									$count=1;
								}else{
									$count++;
								}
								$new_filename = $date. '_' . $count .'.xls';
								$data = array(
										'Uploadedfile' => array(
											'user_id' => $map,
											'filename' => $new_filename,
											'dateuploaded' => date('Y-m-d'),
										)
									);
								if( $this->Uploadedfile->save($data)){
									
									$this->Session->setFlash($this->Message->getMessage("FILE WAS SUCCESFULLY IMPORTED"), 'success_message');
									//$this->redirect(array('action' => 'uploadresult'));
									$this->redirect(array('controller' => 'timelogs', 'action' => 'extract', $this->Uploadedfile->getLastInsertID()));
									}
								}else{
									$this->Session->setFlash($this->Message->getMessage("Something has happened, Please try again later."), 'error_message');
								}
									
							}else{
								$this->Session->setFlash($this->Message->getMessage("Unable to create region folder"), 'error_message');
							}
						}else{
							$this->Session->setFlash($this->Message->getMessage("Unable to create map folder"), 'error_message');
						}					
					}else{
						$this->Session->setFlash($this->Message->getMessage("Invalid file, Please check the extension."), 'error_message');
					}
				}
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
		if (!$this->Uploadedfile->exists($id)) {
			throw new NotFoundException(__('Invalid uploadedfile'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Uploadedfile->save($this->request->data)) {
				$this->Session->setFlash(__('The uploadedfile has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The uploadedfile could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Uploadedfile.' . $this->Uploadedfile->primaryKey => $id));
			$this->request->data = $this->Uploadedfile->find('first', $options);
		}
		$users = $this->Uploadedfile->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Uploadedfile->id = $id;
		if (!$this->Uploadedfile->exists()) {
			throw new NotFoundException(__('Invalid uploadedfile'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Uploadedfile->delete()) {
			$this->Session->setFlash(__('The uploadedfile has been deleted.'));
		} else {
			$this->Session->setFlash(__('The uploadedfile could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	public function renamefile($map, $date){
		//$new_filename = $region_alias['Region']['shortname'].'_'.$exam_date['Examination']['date_of_exam'].'_'.$exam_type['Examinationtype']['shortname'].'_Results'.'.xls';
		$count = $this->Uploadedfile->find('count', array('conditions' => array('AND' => array('Uploadedfile.dateuploaded' => date('Y-m-d'), 'Uploadedfile.user_id' => $this->Auth->user('id')))));
		if(empty($count)){
			$count=1;
		}else{
			$count++;
		}
		$new_filename = $date. '_' . $count .'.xls';
		return $new_filename;
	}
	
	public function add2($table = null) {
		if(!empty($fileid)){
			$this->Uploadedfile->delete($fileid);
		}
		
		$this->set('id', $this->Auth->user('id'));
		if($this->request->is('post')){
			
			$continue_upload=0;
			$filename = $this->data['Uploadedfile']['filename'];
			$map = $this->Auth->user('id');
			$date = date('Y-m-d');
			
			$continue_upload =1;	
			
			if($continue_upload==0){
				$this->Session->setFlash($this->Message->getMessage("Supply the necessary fields."), 'error_message');
			}else{
				if(empty($filename['name'])){
					$this->Session->setFlash($this->Message->getMessage("Select the file to upload."), 'error_message');
				}else{
					if($this->Uploadfile->checkfileExtensionforfile($filename)){										
						if($this->Uploadfile->checkFolder(APP.'xls', $map)){
							if($this->Uploadfile->checkFolder(APP.'xls', $map.'/'.$date)){
								$this->Uploadedfile->create();
								if($this->Uploadfile->uploadforDownloadfile($filename, APP.'xls/'.$map.'/'.$date.'/', $this->renamefile($map, $date))){
								$count = $this->Uploadedfile->find('count', array('conditions' => array('AND' => array('Uploadedfile.dateuploaded' => date('Y-m-d'), 'Uploadedfile.user_id' => $this->Auth->user('id')))));
								if(empty($count)){
									$count=1;
								}else{
									$count++;
								}
								$new_filename = $date. '_' . $count .'.xls';
								$data = array(
										'Uploadedfile' => array(
											'user_id' => $map,
											'filename' => $new_filename,
											'dateuploaded' => date('Y-m-d'),
										)
									);
								if( $this->Uploadedfile->save($data)){
									
									$this->Session->setFlash($this->Message->getMessage("FILE WAS SUCCESFULLY IMPORTED"), 'success_message');
									// $this->redirect(array('action' => 'uploadresult'));								
									if(empty($table)){										
										$this->redirect(array('controller' => 'employees', 'action' => 'extract', $this->Uploadedfile->getLastInsertID()));									
									}else{					
										if($table == 'sss'){		
											$this->redirect(array('controller' => 'ssscontribs', 'action' => 'extract', $this->Uploadedfile->getLastInsertID()));										
										}else{																					}	
										}
									
									}
								}else{
									$this->Session->setFlash($this->Message->getMessage("Something has happened, Please try again later."), 'error_message');
								}
									
							}else{
								$this->Session->setFlash($this->Message->getMessage("Unable to create region folder"), 'error_message');
							}
						}else{
							$this->Session->setFlash($this->Message->getMessage("Unable to create map folder"), 'error_message');
						}					
					}else{
						$this->Session->setFlash($this->Message->getMessage("Invalid file, Please check the extension."), 'error_message');
					}
				}
			}
		}
	}
	
}
