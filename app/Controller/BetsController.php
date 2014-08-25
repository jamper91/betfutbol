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

                //Luego de crear la apuesta, agrego las filas
                $newBetID = $this->Bet->getLastInsertId();
                $cont = 0;
                foreach ($this->request->data["Row"] as $value) {
                    $this->request->data["Row"][$cont]["bet_id"] = $newBetID;
                    $cont++;
                }
                $this->loadModel("Row");
                $this->Row->saveAll($this->request->data['Row']);

                //Muestro los datos para generar la factura
                $this->layout = "impresora";
                $this->set("id", $this->Bet->id);
                $this->set("texto", $this->request->data["Bet"]["texto"]);
                $this->set("apuesta", $this->request->data["Bet"]["apostado"]);
                $this->set("ganancia", $this->request->data["Bet"]["ganancia"]);
                $fecha = getdate();
                $this->set("fecha", $fecha["mday"] . "/" . $fecha["mon"] . "/" . $fecha["year"]);
                $this->set("hora", $fecha["hours"] . ":" . $fecha["minutes"]);
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
