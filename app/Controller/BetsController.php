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

    public function pagar() {
        if ($this->request->is('post')) {
            //debug(print_r($this->request->data));
            $this->Bet->id = $this->request->data["Bet"]["id"];
            //$this->Bet->id=$this->request->data["Bet"]["id"];
            $this->Bet->set("pagado", "1");
            $fecha = date("Y-m-d H:i:s");
            $this->Bet->set("fecha_pago", $fecha);
            if ($this->Bet->save()) {
                $this->Session->setFlash(__('La apuesta ha sido pagada'));
            } else {
                $this->Session->setFlash(__('La apuesta no se ha podido actualizar'));
                debug($this->Bet->validationErrors);
            }
        }
    }

    public function pagados() {
        //Obtengo una lista de todas las apuestas
        $options = array(
            "fields" => array(
                "Bet.id",
                "Bet.pagado",
                "Bet.ganancia",
                "Bet.fecha",
                "Bet.fecha_pago"
            ),
            "conditions" => array(
                "Bet.pagado" => 1
            )
        );
        $datos = $this->Bet->find('all', $options);
        $this->set("datos", $datos);
    }

    public function estadisticas() {
        $fechaInicio = null;
        $fechaFin = null;
        if ($this->request->is("POST")) {
            $fechaInicio = $this->request->data["Bet"]["fechaI"];
            $fechaFin = $this->request->data["Bet"]["fechaF"];
            if ($fechaInicio == "")
                $fechaInicio = null;
            if ($fechaFin == "")
                $fechaFin = null;
        }
//        debug("Inicio: ".$fechaInicio);
//        debug("Fin: ".$fechaFin);
        $this->Bet->virtualFields['ingresos'] = 'SUM(Bet.apuesta)';
        $this->Bet->virtualFields['salidas'] = 'SUM(Bet.ganancia)';
        $conditions = array();
        if ($fechaInicio && $fechaFin) {
            $conditions = array(
                'Bet.fecha >' => $fechaInicio,
                'Bet.fecha <' => $fechaFin
            );
        } else if ($fechaInicio) {
            $conditions = array(
                'Bet.fecha >' => $fechaInicio
            );
        } else if ($fechaFin) {
            $conditions = array(
                'Bet.fecha <' => $fechaInicio
            );
        }
        $conditions = array_merge($conditions, array(
            "Bet.valido" => "1",
            "Bet.pagado" => '1')
        );
        $options = array(
            'conditions' => $conditions,
            'fields' => array(
                'Bet.ingresos',
                'Bet.salidas',
                'Bet.fecha',
                'Bet.apuesta',
                'Bet.ganancia',
                'Bet.pagado'
            )
        );

        $datos = $this->Bet->find('all', $options);
        $this->set("datos", $datos);
    }

    /**
     * Lista todas aquellas apuestas que ganaron, estan suspendidas, o aun no han 
     * finalizado y que aun no se han pagado
     */
    public function estado() {
        $bets = $this->Bet->find('all', NULL);
        debug("Bet: \n");
        debug("Bet: \n");
        foreach ($bets as $key => $bet) {
            //Variable para determinar el estado
            $estado = "Ganador";
            //Recorro todas las filas de la tabla Row
            for ($index = 0; $index < count($bet["Row"]); $index++) {
                $salir = false;
                $row = $bet["Row"][$index];
                if ($row["estado"] == "1") {
                    $estado = "Perdedor";
                    $salir = true;
                } else if ($row["estado"] === "0") {
                    $estado = "Suspendido";
                    $salir = true;
                } else if ($row["estado"] == "-1") {
                    $estado = "En curso";
                    $salir = true;
                }
                if ($salir)
                    $index = count($bet["Row"]);
            }
            debug("Estado: " . $estado);
            $bet["Bet"]["estado"] = $estado;
            $bets[$key] = $bet;
        }
        $this->set("bets",$bets);
    }

}
