<?php

App::uses('AppController', 'Controller');

/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    public function beforeFilter() {
        parent::beforeFilter();

        // For CakePHP 2.1 and up
        $this->Auth->allow('initDB');
    }

    public function initDB() {
        $group = $this->User->Group;

        // Administradores
        $group->id = 2;
        $this->Acl->allow($group, 'controllers');

        // Cajeros
        $group->id = 3;
        $this->Acl->deny($group, 'controllers');
        $this->Acl->allow($group, 'controllers/Games/listar');
        $this->Acl->allow($group, 'controllers/Bets/add');
        $this->Acl->allow($group, 'controllers/Bets/pagar');
        $this->Acl->allow($group, 'controllers/Bets/estado');
        $this->Acl->allow($group, 'controllers/Rows/estado');
        $this->Acl->allow($group, 'controllers/Bets/getbets');
        $this->Acl->allow($group, 'controllers/Bets/habilitarbet');
        $this->Acl->allow($group, 'controllers/Bets/cancelarbet');
        $this->Acl->allow($group, 'controllers/Rows/pagar');
        $this->Acl->allow($group, 'controllers/Bets/detallesMensualesByCajero');
        // allow basic users to log out
        $this->Acl->allow($group, 'controllers/users/logout');
        // Cajeros
        $group->id = 4;
        $this->Acl->deny($group, 'controllers');
        $this->Acl->allow($group, 'controllers/Games/listar');
        $this->Acl->allow($group, 'controllers/Bets/add');
        $this->Acl->allow($group, 'controllers/Bets/pagar');
        $this->Acl->allow($group, 'controllers/Bets/estado');
        $this->Acl->allow($group, 'controllers/Rows/estado');
        $this->Acl->allow($group, 'controllers/Bets/getbets');
        $this->Acl->allow($group, 'controllers/Bets/habilitarbet');
        $this->Acl->allow($group, 'controllers/Bets/cancelarbet');
        $this->Acl->allow($group, 'controllers/Rows/pagar');
        $this->Acl->allow($group, 'controllers/Bets/detallesMensualesByCajero');
        // allow basic users to log out
        $this->Acl->allow($group, 'controllers/users/logout');
        // Cajeros
        $group->id = 5;
        $this->Acl->deny($group, 'controllers');
        $this->Acl->allow($group, 'controllers/Games/listar');
        $this->Acl->allow($group, 'controllers/Bets/add');
        $this->Acl->allow($group, 'controllers/Bets/pagar');
        $this->Acl->allow($group, 'controllers/Bets/estado');
        $this->Acl->allow($group, 'controllers/Rows/estado');
        $this->Acl->allow($group, 'controllers/Bets/getbets');
        $this->Acl->allow($group, 'controllers/Bets/habilitarbet');
        $this->Acl->allow($group, 'controllers/Bets/cancelarbet');
        $this->Acl->allow($group, 'controllers/Rows/pagar');
        $this->Acl->allow($group, 'controllers/Bets/detallesMensualesByCajero');
        // allow basic users to log out
        $this->Acl->allow($group, 'controllers/users/logout');


        // we add an exit to avoid an ugly "missing views" error message
        echo "all done";
        exit;
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->User->find("all", array("conditions" => array("User.group_id >" => "2"))));
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
        $this->set('user', $this->User->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        }
        $groups = $this->User->Group->find('list');
        $this->set(compact('groups'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
        }
        $groups = $this->User->Group->find('list', array(
            "conditions" => array(
                "Group.id >" => 2
            )
        ));
        $this->set(compact('groups'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->User->delete()) {
            $this->Session->setFlash(__('The user has been deleted.'));
        } else {
            $this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function bloquear($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuario no valido'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->User->save(array("bloqueado" => "1"))) {
            $this->Session->setFlash(__('Usuario bloqueado con exito.'), 'good');
        } else {
            $this->Session->setFlash(__('Usuario no se pudo bloquear.'), 'warning');
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function desbloquear($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuario no valido'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->User->save(array("bloqueado" => "0"))) {
            $this->Session->setFlash(__('Usuario desbloqueado con exito.'), 'good');
        } else {
            $this->Session->setFlash(__('Usuario no se pudo desbloquear.'), 'warning');
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function login() {
        $this->layout = null;
        if ($this->Session->read('Auth.User')) {
            $this->Session->setFlash('You are logged in!');
            return $this->redirect('/');
        }
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $user = $this->User->findByUsername($this->request->data["User"]["username"]);
                $this->Session->write('User.id', $user["User"]["id"]);
                $this->Session->write('User.username', $user["User"]["username"]);
                $this->Session->write('User.group_id', $user["User"]["group_id"]);
                $this->Session->write('Group.name', $user["Group"]["name"]);
                return $this->redirect("/games/listar");
            }
            $this->Session->setFlash(__('Your username or password was incorrect.'));
        }
    }

    public function logout() {
        //Leave empty for now.
        $this->Session->setFlash('Good-Bye');
        $this->redirect($this->Auth->logout());
    }

    public function listarCajeros() {
        $datos = $this->User->findAllByGroupId("3");
        $this->set("datos", $datos);
    }

}
