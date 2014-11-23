<!-- Nuevo diseño -->

<?php
$acumulado = 0;
?>

<div class="col-md-8">
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


<div class="col-md-4">
    <!-- Info box -->
    <div class="box box-solid box-info">
        <div class="box-header">
            <h3 class="box-title">Detalles Mensuales</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-info btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            <ul>
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
                            <th>Apostado</th>
                            <th>Pagado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($datos as $dato): ?>
                            <tr >
                                <td> 
                                <?= $dato["Bet"]["fecha"] ?>
                            </td>
                            <td> 
                                <?= number_format($dato["Bet"]["apostado"]) ?>
                            </td>
                            <td> 
                                <?php
                                    echo number_format($dato["Bet"]["ganancia"]);
                                ?>
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
                        {y: '<?= $dato["Bet"]["fecha"] ?>', item1: <?= $dato["Bet"]["apostado"] ?>, item2: <?= $dato["Bet"]["ganancia"] ?>}
<?php } ?>
                    ],
                    xkey: 'y',
                    ykeys: ['item1', 'item2'],
                    labels: ['Ingresos', 'Salidas'],
                    lineColors: ['green', 'red'],
                    hideHover: 'auto'
            });
    });
</script>
<?php
$this->end();
?>