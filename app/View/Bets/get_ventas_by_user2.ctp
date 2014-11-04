
<?php
foreach ($datos as $dato) {

//        echo "Fecha: ".$dato["Bet"]["fecha"]."</br>";
//        echo "Cantidad de ventas: ".$dato["Bet"]["cantidad"]."</br>";
//        echo "Cantidad de ingresos: ".$dato["Bet"]["ingresos"]."</br>";
}
?>

<?php
$acumulado = 0;
?>

<div class="col-md-6">
    <!-- AREA CHART -->
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Ventas</h3>
        </div>
        <div class="box-body chart-responsive">
            <div class="chart" id="revenue-chart" style="height: 300px;"></div>
        </div><!-- /.box-body -->
    </div><!-- /.box -->

    <!-- DONUT CHART -->
    <div class="box box-danger">
        <div class="box-header">
            <h3 class="box-title">Donut Chart</h3>
        </div>
        <div class="box-body chart-responsive">
            <div class="chart" id="sales-chart" style="height: 300px; position: relative;"></div>
        </div><!-- /.box-body -->
    </div><!-- /.box -->

</div><!-- /.col (LEFT) -->

<div class="mws-panel grid_3">
    <div class="mws-panel-header">
        <span class="mws-i-24 i-books-2">Detalles Diarios</span>
    </div>
    <div class="mws-panel-body">
        <ul class="mws-summary">
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
    </div>
</div>

<div class="mws-panel grid_5">
    <div class="mws-panel-header">
        <span class="mws-i-24 i-table-1">Ventas</span>
    </div>
    <div class="mws-panel-body">
        <table class="mws-table" id="partidos">
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

                <?php foreach ($datos as $i => $dato): ?>
                    <?php if ($i % 2 == 0) { ?>
                        <tr class="gradeA even"  habilitado="true">
                        <?php } else { ?>
                        <tr class="gradeA odd"  habilitado="true">
                        <?php } ?>
                        <td> 
                            <?= $dato["Bet"]["created"] ?>
                        </td>
                        <td> 
                            <?= $dato["Bet"]["id"] ?>
                        </td>
                        <td> 
                            <?= $dato["Bet"]["apostado"] ?>
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

                            <?= $this->Html->link(__('Estado'), array("controller" => "rows", 'action' => 'estado', $dato['Bet']['id'])) ?>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php
$this->start('scripts');
echo $this->Html->css(array("/morris/morris"));
echo $this->Html->script(array("http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js", "plugins/morris/morris.min"));
?>
<script>
    $(function() {
        "use strict";

        // AREA CHART
        var area = new Morris.Area({
            element: 'revenue-chart',
            resize: true,
            data: [
                {y: '<?=$fecha?>', item1: <?=$ingresos?>, item2: <?=$salidas?>}
            ],
            xkey: 'y',
            ykeys: ['item1', 'item2'],
            labels: ['Item 1', 'Item 2'],
            lineColors: ['#a0d0e0', '#3c8dbc'],
            hideHover: 'auto'
        });
    });
</script>
<?php
$this->end();
?>