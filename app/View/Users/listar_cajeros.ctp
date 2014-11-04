<div class="col-xs-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">
                Ventas
            </h3>
        </div>
        <div class="box-body table-responsive">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Usuario</th>
                        <th>Opciones</th>
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
                                <?= $dato["User"]["username"] ?>
                            </td>
                            <td>
                                <a href="<?= $this->Html->url(array("controller" => "bets", "action" => "getVentasByCajero", $dato["User"]["id"])) ?>">
                                    <button class="btn btn-info">Ventas Diarias</button>
                                </a>
                                <a href="<?= $this->Html->url(array("controller" => "bets", "action" => "detallesMensualesByCajero", $dato["User"]["id"])) ?>">
                                    <button class="btn btn-info">Resumen Mensual</button>
                                </a>

                            </td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
    $this->start('scripts');
    echo $this->Html->css(array("datatables/dataTables.bootstrap"));
    echo $this->Html->script(array("plugins/datatables/jquery.dataTables", "plugins/datatables/dataTables.bootstrap"));
?>
<script>
    $(function() {
        $("#example1").dataTable();
    });
</script>
<?php
    $this->end();
?>