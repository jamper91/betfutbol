
<?php
$acumulado = 0;
?>



<div class="col-md-4">
    <!-- Info box -->
    <div class="box box-solid box-info">
        <div class="box-header">
            <h3 class="box-title">Detalles Hoy</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-info btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            <ul>
                <li>
                    <span><?= $totalVentas ?></span> Cantidad Ventas
                </li>
                <li>
                    <span><?= $ventasPagadas ?></span> Apuestas Pagadas
                </li>
                <li>
                    <span><?= number_format($ingresos) ?></span> Ingresos
                </li>
                <li>
                    <span><?= number_format($salidas) ?></span> Salidas
                </li>
                <li>
                    <span><?= number_format($ingresos - $salidas) ?></span> Total
                </li>

            </ul>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</div>
    <div class="col-xs-8">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">
                    Apuestas
                </h3>
            </div>
            <div class="box-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Tiquete</th>
                            <th>Apostado</th>
                            <th>Pagado</th>
                            <th>Fecha de Pago</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($datos as $dato): ?>
                            <tr >
                                <td> 
                                <?= $dato["Bet"]["created"] ?>
                            </td>
                            <td> 
                                <?= $dato["Bet"]["id"] ?>
                            </td>
                            <td> 
                                <?= number_format($dato["Bet"]["apostado"]) ?>
                            </td>
                            <td> 
                                <?php
                                if ($dato["Bet"]["pagado"] == 1) {
                                    echo number_format($dato["Bet"]["ganancia"]);
                                } else {
                                    echo "0";
                                }
                                ?>
                            </td>
                            <td> 
                                <?= $dato["Bet"]["fecha_pagado"] ?>
                            </td>
                            <td> 
                                
                                <?php
                                if ($dato['Bet']['estado'] == "Ganador")
                                    echo $this->Html->link(__($dato['Bet']['estado']), array("controller" => "rows", 'action' => 'estado', $dato['Bet']['id']), array(
                                        "class" => "btn btn-success"
                                    ));
                                else if($dato['Bet']['estado'] == "Perdedor")
                                    echo $this->Html->link(__($dato['Bet']['estado']), array("controller" => "rows", 'action' => 'estado', $dato['Bet']['id']), array(
                                        "class" => "btn btn-danger"
                                    ));
                                else if($dato['Bet']['estado'] == "Suspendido" || $dato['Bet']['estado'] == "Partido Suspendido" )
                                    echo $this->Html->link(__($dato['Bet']['estado']), array("controller" => "rows", 'action' => 'estado', $dato['Bet']['id']), array(
                                        "class" => "btn btn-warning"
                                    ));
                                else if($dato['Bet']['estado'] == "En curso")
                                    echo $this->Html->link(__($dato['Bet']['estado']), array("controller" => "rows", 'action' => 'estado', $dato['Bet']['id']), array(
                                        "class" => "btn btn-info"
                                    ));
                                ?>
                            </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
