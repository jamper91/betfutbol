<?php
App::uses('AppController', 'Controller');
/**
 * Rows Controller
 *
 * @property Row $Row
 * @property PaginatorComponent $Paginator
 */
class RowsController extends AppController {

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
		$this->Row->recursive = 0;
		$this->set('rows', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Row->exists($id)) {
			throw new NotFoundException(__('Invalid row'));
		}
		$options = array('conditions' => array('Row.' . $this->Row->primaryKey => $id));
		$this->set('row', $this->Row->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Row->create();
			if ($this->Row->save($this->request->data)) {
				$this->Session->setFlash(__('The row has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The row could not be saved. Please, try again.'));
			}
		}
		$bets = $this->Row->Bet->find('list');
		$games = $this->Row->Game->find('list');
		$this->set(compact('bets', 'games'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Row->exists($id)) {
			throw new NotFoundException(__('Invalid row'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Row->save($this->request->data)) {
				$this->Session->setFlash(__('The row has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The row could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Row.' . $this->Row->primaryKey => $id));
			$this->request->data = $this->Row->find('first', $options);
		}
		$bets = $this->Row->Bet->find('list');
		$games = $this->Row->Game->find('list');
		$this->set(compact('bets', 'games'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Row->id = $id;
		if (!$this->Row->exists()) {
			throw new NotFoundException(__('Invalid row'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Row->delete()) {
			$this->Session->setFlash(__('The row has been deleted.'));
		} else {
			$this->Session->setFlash(__('The row could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
        /**
         * Esta funcion se encarga de listar todas las fila de una apuesta basado
         * en el id de la apuesta
         * @param type $bet_id
         */
        public function estado($bet_id)
        {
            
            $rows= $this->Row->findAllByBetId($bet_id);
            $this->set("rows",$rows);
            $this->set("bet",$rows[0]["Bet"]);
        }
        /**
         * Esta funcion se encarga de listar todas las fila de una apuesta basado
         * en el id de la apuesta
         * @param type $bet_id
         */
        public function pagar($bet_id)
        {
            
            $rows= $this->Row->findAllByBetId($bet_id);
            $this->set("rows",$rows);
            $this->set("bet",$rows[0]["Bet"]);
        }
}
