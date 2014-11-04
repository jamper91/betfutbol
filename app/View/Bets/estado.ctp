
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
                        <th>Codigo</th>
                        <th>Apostado</th>
                        <th>Ganancia</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($bets as $dato): ?>
                        <tr >
                            <td><?= $dato['Bet']['id'] ?></td>
                            <td><?= $dato['Bet']['apostado'] ?></td>
                            <td><?= $dato['Bet']['ganancia'] ?></td>
                            <td><?= $dato['Bet']['estado'] ?></td>
                            <td>
                                <?php
                                if ($dato['Bet']['estado'] == "Ganador" || $dato['Bet']['estado'] == "Suspendido")
                                    echo $this->Html->link(__('Pagar'), array("controller" => "rows", 'action' => 'pagar', $dato['Bet']['id']), array(
                                        "class" => "btn btn-success"
                                    ));
                                else
                                    echo $this->Html->link(__('Estado'), array("controller" => "rows", 'action' => 'estado', $dato['Bet']['id']), array(
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
