<div class="col-md-12">
    <!-- general form elements disabled -->
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title">Crear Juego</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <?php
            echo $this->Form->create('Game', array(
                'inputDefaults' => array(
                    'div' => array(
                        "class" => "col-xs-6"
                    ),
                    "class" => "form-control"
                )
            ));
            ?>
            <div class="row">
            <div class="col-xs-6">
                <label>Liga</label>
                <select name="data[Game][liga_id]" class="form-control">
                    <?php
                    $primero = true;
                    $ligaActual = "";
                    foreach ($ligas as $liga) {
                        if ($liga["Deporte"]["name"] != $ligaActual) {
                            $ligaActual = $liga["Deporte"]["name"];
                            if (!$primero)
                                echo '</optgroup>';
                            else
                                $primero = false;
                            echo '<optgroup label="' . $liga["Deporte"]["name"] . '">';
                        }
                        echo '<option value="' . $liga["Liga"]["id"] . '">' . $liga["Liga"]["name"] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="col-xs-6">
                <label>Fecha Juego</label>
                <input name="data[Game][fecha_juego]" class="form-control" maxlength="20" id="GameFechaJuego" type="text">

            </div>
 
                <?php
                echo $this->Form->input('local', array(
                    "label" => "Nombre del Local",
                ));
                echo $this->Form->input('visitante', array(
                    "label" => "Nombre del Visitante"
                ));
                ?> 


            
            
            
                <?php
                //MLINE
                echo $this->Form->input('logro_mline_local', array(
                    "label" => "Logro MLine Local",
                    'div' => array(
                        "class" => "col-xs-4"
                    )
                ));
                echo $this->Form->input('logro_mline_empate', array(
                    "label" => "Logro MLine Empate",
                    'div' => array(
                        "class" => "col-xs-4"
                    )
                ));
                echo $this->Form->input('logro_mline_visitante', array(
                    "label" => "Logro MLine Visitante",
                    'div' => array(
                        "class" => "col-xs-4"
                    )
                ));
                
                //RLINE
                echo $this->Form->input('goles_rline_local', array(
                    "label" => "Goles rLine Local",
                    'div' => array(
                        "class" => "col-xs-2"
                    )
                ));
                echo $this->Form->input('logro_rline_local', array(
                    "label" => "Logro rLine Local",
                    'div' => array(
                        "class" => "col-xs-4"
                    )
                ));
                echo $this->Form->input('goles_rline_visitante', array(
                    "label" => "Goles rLine Visitante",
                    'div' => array(
                        "class" => "col-xs-2"
                    )
                ));
                echo $this->Form->input('logro_rline_visitante', array(
                    "label" => "Logro rLine Visitante",
                    'div' => array(
                        "class" => "col-xs-4"
                    )
                ));
                
                //ALTAS
                echo $this->Form->input('goles_alta', array(
                    "label" => "Goles Altas",
                    'div' => array(
                        "class" => "col-xs-2"
                    )
                ));
                echo $this->Form->input('altas', array(
                    "label" => "Logro Altas",
                    'div' => array(
                        "class" => "col-xs-4"
                    )
                ));
                echo $this->Form->input('goles_baja', array(
                    "label" => "Goles Baja",
                    'div' => array(
                        "class" => "col-xs-2"
                    )
                ));
                echo $this->Form->input('bajas', array(
                    "label" => "Logro Bajas",
                    'div' => array(
                        "class" => "col-xs-4"
                    )
                ));
                ?> 
            </div>

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
<?php
    $this->start('scripts');
    echo $this->Html->css("https://code.jquery.com/ui/jquery-ui-git.css");
    echo $this->Html->script(array("jquery-ui-timepicker-addon"));
?>
<script>
    (function()
    {
        $('#GameFechaJuego').datetimepicker({
            dateFormat: "yy-mm-dd"
        });
    })();
</script>
<?php
    $this->end();
?>



