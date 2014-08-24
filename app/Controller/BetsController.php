<?php
App::uses('AppController', 'Controller');
/**
 * Bets Controller
 *
 * @property Bet $Bet
 * @property PaginatorComponent $Paginator
 */
class BetsController extends AppController {

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
		$this->Bet->recursive = 0;
		$this->set('bets', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Bet->exists($id)) {
			throw new NotFoundException(__('Invalid bet'));
		}
		$options = array('conditions' => array('Bet.' . $this->Bet->primaryKey => $id));
		$this->set('bet', $this->Bet->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Bet->create();
			if ($this->Bet->save($this->request->data)) {
				$this->Session->setFlash(__('The bet has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The bet could not be saved. Please, try again.'));
			}
		}
		$users = $this->Bet->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Bet->exists($id)) {
			throw new NotFoundException(__('Invalid bet'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Bet->save($this->request->data)) {
				$this->Session->setFlash(__('The bet has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The bet could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Bet.' . $this->Bet->primaryKey => $id));
			$this->request->data = $this->Bet->find('first', $options);
		}
		$users = $this->Bet->User->find('list');
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
		$this->Bet->id = $id;
		if (!$this->Bet->exists()) {
			throw new NotFoundException(__('Invalid bet'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Bet->delete()) {
			$this->Session->setFlash(__('The bet has been deleted.'));
		} else {
			$this->Session->setFlash(__('The bet could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
