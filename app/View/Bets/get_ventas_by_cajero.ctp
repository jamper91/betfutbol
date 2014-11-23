<?php
$acumulado = 0;
?>

<div class="col-md-12">
    <!-- AREA CHART -->
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Ventas</h3>
        </div>
        <div class="box-body chart-responsive">
            <div class="chart" id="revenue-chart" style="height: 300px;"></div>
        </div><!-- /.box-body -->
    </div><!-- /.box -->

</div><!-- /.col (LEFT) -->

</div>

<div class="row">
    <div class="col-xs-12">
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
                            <th>Apuestas Creadas</th>
                            <th>Dinero Recaudado</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($datos as $dato): ?>
                            <tr >
                                <td> 
                                    <?= $dato["Bet"]["fecha"] ?>
                                </td>
                                <td> 
                                    <?= $dato["Bet"]["cantidad"] ?>
                                </td>
                                <td> 
                                    <?= number_format($dato["Bet"]["ingresos"]) ?>
                                </td>
                                <td> 

                                    <a class="btn btn-info" href="<?= $this->Html->url("detallesDiariosByCajero") ?>/<?= $cajeroId ?>/<?= $dato["Bet"]["fecha"] ?>">Detalles</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
$this->start('scripts');
echo $this->Html->css(array("morris/morris"));
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
<?php
foreach ($datos as $key => $dato) {
    if ($key > 0)
        echo ",";
    ?>
                        {y: '<?= $dato["Bet"]["fecha"] ?>', item1: <?= $dato["Bet"]["ingresos"] ?>}
<?php } ?>
                    ],
                    xkey: 'y',
                    ykeys: ['item1'],
                    labels: ['Ingresos'],
                    lineColors: ['green'],
                    hideHover: 'auto'
            });
    });
</script>
<?php
$this->end();
?>