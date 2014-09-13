<?php
App::uses('AppController', 'Controller');
/**
 * Ligas Controller
 *
 * @property Liga $Liga
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class LigasController extends AppController {

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
		$this->Liga->recursive = 0;
		$this->set('ligas', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Liga->exists($id)) {
			throw new NotFoundException(__('Invalid liga'));
		}
		$options = array('conditions' => array('Liga.' . $this->Liga->primaryKey => $id));
		$this->set('liga', $this->Liga->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Liga->create();
			if ($this->Liga->save($this->request->data)) {
				$this->Session->setFlash(__('The liga has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The liga could not be saved. Please, try again.'));
			}
		}
		$deportes = $this->Liga->Deporte->find('list');
		$this->set(compact('deportes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Liga->exists($id)) {
			throw new NotFoundException(__('Invalid liga'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Liga->save($this->request->data)) {
				$this->Session->setFlash(__('The liga has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The liga could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Liga.' . $this->Liga->primaryKey => $id));
			$this->request->data = $this->Liga->find('first', $options);
		}
		$deportes = $this->Liga->Deporte->find('list');
		$this->set(compact('deportes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Liga->id = $id;
		if (!$this->Liga->exists()) {
			throw new NotFoundException(__('Invalid liga'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Liga->delete()) {
			$this->Session->setFlash(__('The liga has been deleted.'));
		} else {
			$this->Session->setFlash(__('The liga could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
