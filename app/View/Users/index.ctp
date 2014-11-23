<div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow">
        <div class="inner">
            <h3>
                44
            </h3>
            <p>
                Usuario
            </p>
        </div>
        <div class="icon">
            <i class="ion ion-person-add"></i>
        </div>
        <a href="<?=$this->Html->url("add")?>" class="small-box-footer">
            Crear Cajero <i class="fa fa-arrow-circle-right"></i>
        </a>
    </div>
</div>  
<div class="col-xs-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">
                Usuario
            </h3>
        </div>
        <div class="box-body table-responsive">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nombre de Usuario</th>
                        <th>Grupo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $i => $dato): ?>
                        <?php if ($i % 2 == 0) { ?>
                            <tr class="gradeA even"  habilitado="true">
                            <?php } else { ?>
                            <tr class="gradeA odd"  habilitado="true">
                            <?php } ?>
                            <td> 
                                <?= $dato["User"]["username"] ?>
                            </td>
                            <td> 
                                <?= $dato["Group"]["name"] ?>
                            </td>
                            <td>
                                <?php
                                echo $this->Html->link(__('Editar'), array('action' => 'edit', $dato['User']['id']), array(
                                    "class" => "btn btn-info"
                                ));
                                ?>
                                <?php
                                echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $dato['User']['id']), array("class" => "btn btn-danger"), __('Estas seguro que deseas eliminar el usuario  # %s?', $dato['User']['username']));
                                ?>
                                <?php
                                if($dato["User"]["bloqueado"]=="0")
                                {
                                    echo $this->Form->postLink(__('Bloquear'), array('action' => 'bloquear', $dato['User']['id']), array("class" => "btn btn-danger"), __('Estas seguro que deseas bloquear al usuario   %s?', $dato['User']['username']));
                                }else{
                                    echo $this->Form->postLink(__('Desbloquear'), array('action' => 'desbloquear', $dato['User']['id']), array("class" => "btn btn-success"), __('Estas seguro que deseas desbloquear al usuario %s?', $dato['User']['username']));
                                }
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

