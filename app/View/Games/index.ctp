
<div class="col-xs-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">
                Partidos
            </h3>
        </div>
        <div class="box-body table-responsive">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Local</th>
                        <th>Visitante</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($games as $game): ?>
                        <tr >
                            <td><?= $game['Game']['id'] ?></td>
                            <td><?= $game['Game']['local'] ?></td>
                            <td><?= $game['Game']['visitante'] ?></td>
                            <td><?= $game['Game']['fecha_juego'] ?></td>
                            <td>
                                <a href="<?= $this->Html->url(array('action' => 'edit', $game['Game']['id'])) ?>">
                                    <button class="btn btn-info">Editar</button>
                                </a>
                                <?php
                                echo $this->Form->postLink(
                                        __('Eliminar'), 
                                        array('action' => 'delete', $game['Game']['id']), 
                                        array(
                                            "class"=>"btn btn-danger"
                                        ), __('Esta seguro que desea elliminar el Juego con codigo # %s?', $game['Game']['id']));
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