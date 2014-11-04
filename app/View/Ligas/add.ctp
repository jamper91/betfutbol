<div class="col-md-12">
    <!-- general form elements disabled -->
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title">Crear Liga</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <?php
            echo $this->Form->create('Liga', array(
                'inputDefaults' => array(
                    'div' => array(
                        "class" => "form-group"
                    ),
                    "class" => "form-control"
                    
                )
            ));
            ?>
            <?php
                echo $this->Form->input('name');
                echo $this->Form->input('deporte_id');
            ?>
            <div class="box-footer">
                <?php
                echo $this->Form->end(array(
                    "class" => "btn btn-primary",
                    "div" => false,
                    "label" => "Crear"
                ));
                ?>
            </div>

        </div>
    </div>
</div>