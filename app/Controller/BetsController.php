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
    public $components = array('Paginator', 'RequestHandler');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Bet->recursive = 0;
        $this->set('bets', $this->Paginator->paginate());
    }

    public function beforeFilter() {
        parent::beforeFilter();

        // For CakePHP 2.1 and up
        $this->Auth->allow('getVentasByUser');
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
            if ($this->request->data["Row"][0]["game_id"]) {
                $this->Bet->create();
                $fecha = date("Y-m-d H:i:s");
                $this->request->data["Bet"]["created"] = $fecha;
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
                    $this->Session->setFlash(__('La apuesta no pudo ser creada.'));
                    $this->redirect(array("controller"=>"games","action"=>"listar"));
                }
            }else{
                $this->redirect(array("controller"=>"games","action"=>"listar"));
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
            $this->Bet->set("ganancia", $this->request->data["Bet"]["ganancia"]);
            $fecha = date("Y-m-d H:i:s");
            $this->Bet->set("fecha_pagado", $fecha);
            if ($this->Bet->save()) {
                $this->Session->setFlash(__('La apuesta ha sido pagada'));
                $this->redirect(array('controller' => 'bets', 'action' => 'estado'));
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
                "Bet.created",
                "Bet.fecha_pagado"
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

    public function getbets() {
        $this->layout = "webservice";
        //Obtengo una lista de todas las apuestas
        $options = array(
            "fields" => array(
                "Bet.id",
                "Bet.pagado"
            )
        );
        $datos = $this->Bet->find('all', $options);
        $this->set(
                array(
                    'datos' => $datos,
                    '_serialize' => array('datos')
        ));
    }

    /**
     * Esta funcion se encarga de habilitar una apuesta.
     * Esto ocurre porque puede ser que se de clic en crear apuesta, pero
     * no quedo bien, entonces si se da clic en imprimir, se crea, si no, no se valida
     * 
     */
    public function habilitarbet() {
        $this->layout = "webservice";
        if ($this->request->is('post')) {
            $this->Bet->id = $this->request->data["idBet"];
            $this->Bet->set("valido", "1");
            if ($this->Bet->save()) {
                $datos = array("Resultado" => "ok");
            } else {
                $datos = array("Resultado" => "Error");
                debug($this->Bet->validationErrors);
            }

            $this->set(
                    array(
                        'datos' => $datos,
                        '_serialize' => array('datos')
            ));
        }
    }

    public function cancelarbet() {
        if ($this->RequestHandler->isXml()) {
            $this->layout = "webservice";
            if ($this->request->is('post')) {
                $this->Bet->id = $this->request->data["idBet"];
                $this->Bet->set("valido", "0");
                if ($this->Bet->save()) {
                    $datos = array("Resultado" => "ok");
                } else {
                    $datos = array("Resultado" => "Error");
                    debug($this->Bet->validationErrors);
                }

                $this->set(
                        array(
                            'datos' => $datos,
                            '_serialize' => array('datos')
                ));
            }
        } else {
            if ($this->request->is('post')) {
                $this->Bet->id = $this->request->data["Bet"]["id"];
                $this->Bet->set("valido", "0");
                if ($this->Bet->save()) {
                    $datos = array("Resultado" => "ok");
                    $this->Session->setFlash("Ok", "", null);
                } else {
                    $this->Session->setFlash("Error", "", null);
                    debug($this->Bet->validationErrors);
                }
            }
        }
    }

    /**
     * Lista todas aquellas apuestas que ganaron, estan suspendidas, o aun no han 
     * finalizado y que aun no se han pagado
     */
    public function estado() {
        $bets = $this->Bet->find('all', array(
            "conditions" => array(
                "Bet.pagado" => 0,
                "Bet.valido" => 1,
                "Bet.vendedor_id" => $this->Session->read("User.id")
            )
        ));
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
                } else if ($row["estado"] == "-2") {
                    $estado = "Partido Suspendido";
                    $salir = true;
                }
                if ($salir)
                    $index = count($bet["Row"]);
            }
            $bet["Bet"]["estado"] = $estado;
            $bets[$key] = $bet;
        }
        $this->set("bets", $bets);
    }

    public function getVentasByUser() {
        $idUsuario = $this->Session->read("User.id");
        $fecha = date("Y-m-d");
        $this->Bet->virtualFields['fecha'] = "DATE_FORMAT(Bet.created, '%Y-%m-%d')";
        $this->Bet->virtualFields['hora'] = "DATE_FORMAT(Bet.created, '%H-%I')";
        $options = array(
            "conditions" => array(
                "DATE_FORMAT(Bet.created, '%Y-%m-%d')" => $fecha,
                "vendedor_id" => $idUsuario,
                "Bet.valido" => "1"
            ),
            "recursive" => -1
        );
        $datos = $this->Bet->find("all", $options);
        //Obtengo el total de ventas, ventas pagadas, ingresos y salidas
        $totalVentas = 0;
        $ventasPagadas = 0;
        $ingresos = 0;
        $salidas = 0;
        foreach ($datos as $dato) {
            $totalVentas++;
            $ingresos+=$dato["Bet"]["apostado"];
            if ($dato["Bet"]["pagado"] == 1) {
                $ventasPagadas++;
                $salidas+=$dato["Bet"]["ganancia"];
            }
        }
        $this->set("datos", $datos);
        $this->set("totalVentas", $totalVentas);
        $this->set("ventasPagadas", $ventasPagadas);
        $this->set("ingresos", $ingresos);
        $this->set("salidas", $salidas);
    }

    public function getVentasByUser2() {
        $idUsuario = $this->Session->read("User.id");
        $fecha = date("Y-m-d");
        $sql = "select count(*), sum(apostado),  DATE_FORMAT(created, '%Y-%m-%d') from bets";
        $this->Bet->virtualFields['cantidad'] = "count(Bet.id)";
        $this->Bet->virtualFields['ingresos'] = "sum(Bet.apostado)";
        $this->Bet->virtualFields['fecha'] = "DATE_FORMAT(Bet.created, '%Y-%m-%d')";
        $options = array(
            "fields" => array(
                "Bet.cantidad",
                "Bet.ingresos",
                "Bet.fecha"
            ),
            "conditions" => array(
                "DATE_FORMAT(Bet.created, '%Y-%m-%d')" => $fecha,
                "vendedor_id" => $idUsuario,
                "Bet.valido" => "1"
            ),
            "group" => array(
                "DATE_FORMAT(Bet.created, '%Y-%m-%d')"
            )
        );
        $datos = $this->Bet->find("all", $options);
        $this->set("datos", $datos);
    }

    public function getVentasByCajero($idUsuario) {
        $fecha = date("Y-m-d");
        $this->Bet->virtualFields['cantidad'] = "count(Bet.id)";
        $this->Bet->virtualFields['ingresos'] = "sum(Bet.apostado)";
        $this->Bet->virtualFields['fecha'] = "DATE_FORMAT(Bet.created, '%Y-%m-%d')";
        $options = array(
            "fields" => array(
                "Bet.cantidad",
                "Bet.ingresos",
                "Bet.fecha"
            ),
            "conditions" => array(
//                "DATE_FORMAT(Bet.created, '%Y-%m-%d')"=>$fecha,
                "vendedor_id" => $idUsuario,
                "Bet.valido" => "1"
            ),
            "group" => array(
                "DATE_FORMAT(Bet.created, '%Y-%m-%d')"
            )
        );
        $datos = $this->Bet->find("all", $options);
        $this->set("datos", $datos);
        $this->set("cajeroId", $idUsuario);
    }


    public function detallesDiariosByCajero($idUsuario, $fecha) {
        $this->Bet->virtualFields['fecha'] = "DATE_FORMAT(Bet.created, '%Y-%m-%d')";
        $options = array(
            "conditions" => array(
                "DATE_FORMAT(Bet.created, '%Y-%m-%d')" => $fecha,
                "vendedor_id" => $idUsuario,
                "Bet.valido" => "1"
            ),
            "recursive" => -1
        );
        $datos = $this->Bet->find("all", $options);
        //Obtengo el total de ventas, ventas pagadas, ingresos y salidas
        $totalVentas = 0;
        $ventasPagadas = 0;
        $ingresos = 0;
        $salidas = 0;
        foreach ($datos as $dato) {
            $totalVentas++;
            $ingresos+=$dato["Bet"]["apostado"];
            if ($dato["Bet"]["pagado"] == 1) {
                $ventasPagadas++;
                $salidas+=$dato["Bet"]["ganancia"];
            }
        }
        $this->set("datos", $datos);
        $this->set("totalVentas", $totalVentas);
        $this->set("ventasPagadas", $ventasPagadas);
        $this->set("ingresos", $ingresos);
        $this->set("salidas", $salidas);
    }
    public function detallesMensualesByCajero($idUsuario) {
        $this->Bet->virtualFields['apostado'] = "sum(Bet.apostado)";
        $this->Bet->virtualFields['ganancia'] = "sum(CASE Bet.pagado  WHEN 1 THEN Bet.ganancia ELSE '0' END)";
        
        $this->Bet->virtualFields['fecha'] = "DATE_FORMAT(Bet.created, '%Y-%m')";
        $options = array(
            "conditions" => array(
                "vendedor_id" => $idUsuario,
                "Bet.valido" => "1"
            ),
            "recursive" => -1,
            "group"=>array(
                "DATE_FORMAT(Bet.created, '%Y-%m')"
            )
        );
        $datos = $this->Bet->find("all", $options);
        //Obtengo el total de ventas, ventas pagadas, ingresos y salidas
        $totalVentas = 0;
        $ventasPagadas = 0;
        $ingresos = 0;
        $salidas = 0;
        foreach ($datos as $dato) {
            $totalVentas++;
            $ingresos+=$dato["Bet"]["apostado"];
            $salidas+=$dato["Bet"]["ganancia"];
        }
        $this->set("datos", $datos);
        $this->set("totalVentas", $totalVentas);
        $this->set("ventasPagadas", $ventasPagadas);
        $this->set("ingresos", $ingresos);
        $this->set("salidas", $salidas);
    }

}
