<div class="col-md-12">
    <!-- general form elements disabled -->
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title">Finalizar Partido</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <?php echo $this->Form->create('Game'); ?>
            <div class="row">
            <input style="display: none" value="<?php echo $game['Game']['id']; ?>" name="data[Game][id]" />
            <input style="display: none" value="1" name="data[Game][finalizado]" />
            <input style="display: none" value="<?php echo $game['Game']['local']; ?>" name="data[Game][local]" />
            <?php
            echo $this->Form->input('goles_local', array(
                "div" => array(
                    "class" => "col-xs-6"
                ),
                "class" => "form-control",
                "label" => $game['Game']['local'],
                "value"=> $game['Game']['goles_local']
            ));
            ?>
            <input style="display: none" value="<?php echo $game['Game']['visitante']; ?>" name="data[Game][visitante]" />
            <?php
            echo $this->Form->input('goles_visitante', array(
                "div" => array(
                    "class" => "col-xs-6"
                ),
                "class" => "form-control",
                "label" => $game['Game']['visitante'],
                "value"=> $game['Game']['goles_visitante']
            ));
            ?>
            </div>
            <div class="box-footer">
                <?php
                echo $this->Form->end(array(
                    "class" => "btn btn-primary",
                    "div" => false,
                    "label" => "Finalizar"
                ));
                ?>
            </div>

        </div>
    </div>
</div>
