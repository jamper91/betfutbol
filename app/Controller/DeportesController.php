<?php
App::uses('AppController', 'Controller');
/**
 * Deportes Controller
 *
 * @property Deporte $Deporte
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class DeportesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Deporte->recursive = 0;
		$this->set('deportes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Deporte->exists($id)) {
			throw new NotFoundException(__('Invalid deporte'));
		}
		$options = array('conditions' => array('Deporte.' . $this->Deporte->primaryKey => $id));
		$this->set('deporte', $this->Deporte->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Deporte->create();
			if ($this->Deporte->save($this->request->data)) {
				$this->Session->setFlash(__('The deporte has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The deporte could not be saved. Please, try again.'));
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
		if (!$this->Deporte->exists($id)) {
			throw new NotFoundException(__('Invalid deporte'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Deporte->save($this->request->data)) {
				$this->Session->setFlash(__('The deporte has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The deporte could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Deporte.' . $this->Deporte->primaryKey => $id));
			$this->request->data = $this->Deporte->find('first', $options);
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
		$this->Deporte->id = $id;
		if (!$this->Deporte->exists()) {
			throw new NotFoundException(__('Invalid deporte'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Deporte->delete()) {
			$this->Session->setFlash(__('The deporte has been deleted.'));
		} else {
			$this->Session->setFlash(__('The deporte could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
