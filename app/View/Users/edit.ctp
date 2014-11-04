<div class="col-md-12">
    <!-- general form elements disabled -->
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title">Editar Cajero</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <?php echo $this->Form->create('User', array(
                'inputDefaults' => array(
                    'div' => array(
                        "class" => "form-group"
                    ),
                    "class" => "form-control"
                )
            )); ?>
            <?php
            echo $this->Form->input('id');
            echo $this->Form->input('username', array(
                "label"=>"Nombre de Usuario"
            ));
            echo $this->Form->input('password', array(
                "label"=>"Contraseña"
            ));
            echo $this->Form->input('group_id', array(
                "style" => array(
                    "display:none"
                ),
                "label" => "",
                "selected" => "3"
            ));
            ?>
            <div class="box-footer">
                <?php echo $this->Form->end(array(
                    "class"=>"btn btn-primary",
                    "div"=>false,
                    "label"=>"Actualizar"
                )); ?>
            </div>
            
        </div>
    </div>
</div>
