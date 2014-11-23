
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
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($bets as $dato): ?>
                    <?php if($dato['Bet']['estado'] != "Perdedor"){ ?>
                        <tr >
                            <td><?= $dato['Bet']['id'] ?></td>
                            <td><?= number_format($dato['Bet']['apostado']) ?></td>
                            <td><?= number_format($dato['Bet']['ganancia']) ?></td>
                            <td>
                                <?php
                                if ($dato['Bet']['estado'] == "Ganador")
                                    echo $this->Html->link(__($dato['Bet']['estado']), array("controller" => "rows", 'action' => 'estado', $dato['Bet']['id']), array(
                                        "class" => "btn btn-success"
                                    ));
                                else if($dato['Bet']['estado'] == "Perdedor")
                                    echo $this->Html->link(__($dato['Bet']['estado']), "#", array(
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
                    <?php } ?>
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
