<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span class="mws-i-24 i-pencil">Crear Juego</span>
    </div>
    <div class="mws-panel-body">

        <?php
        echo $this->Form->create('Game', array(
            "Class" => "mws-form"
        ));
        ?>
        <div class="mws-form-inline">
            <div class="mws-form-row">
            
            <div class="mws-panel grid_3">
                <div class="mws-panel-header">
                    <span class="mws-i-24 i-pencil">Informacion del Juego</span>
                </div>
                <div class="mws-panel-body">
                    <div class="mws-form-inline">
                        <div class="mws-form-row">
                            <label>Nombre Local</label>
                            <?php
                            echo $this->Form->input('local', array(
                                "div" => array(
                                    "class" => "mws-form-item large"
                                ),
                                "class" => "mws-textinput",
                                "label" => ""
                            ));
                            ?>
                        </div>
                        <div class="mws-form-row">
                            <label>Nombre Visitante</label>
                            <?php
                            echo $this->Form->input('visitante', array(
                                "div" => array(
                                    "class" => "mws-form-item large"
                                ),
                                "class" => "mws-textinput",
                                "label" => ""
                            ));
                            ?>
                        </div>
                        <div class="mws-form-row">
                            <label>Fecha Juego</label>
                            <?php
                            echo $this->Form->input('fechaJuego', array(
                                "div" => array(
                                    "class" => "mws-form-item large"
                                ),
                                "class" => "mws-textinput",
                                "label" => ""
                            ));
                            ?>
                        </div>
                    </div>
                </div>    	
            </div>

            <div class="mws-panel grid_2">
                <div class="mws-panel-header">
                    <span class="mws-i-24 i-pencil">MLine</span>
                </div>
                <div class="mws-panel-body">
                    <div class="mws-form-inline">
                        <div class="mws-form-inline">
                            <div class="mws-form-row">
                                <label>Logro Local</label>
                                <?php
                                echo $this->Form->input('logro_mline_local', array(
                                    "div" => array(
                                        "class" => "mws-form-item"
                                    ),
                                    "class" => "mws-textinput",
                                    "label" => ""
                                ));
                                ?>
                            </div>
                            <div class="mws-form-row">
                                <label>Logro Visitante</label>
                                <?php
                                echo $this->Form->input('logro_mline_visitante', array(
                                    "div" => array(
                                        "class" => "mws-form-item large"
                                    ),
                                    "class" => "mws-textinput",
                                    "label" => ""
                                ));
                                ?>
                            </div>
                            <div class="mws-form-row">
                                <label>Logro Empate</label>
                                <?php
                                echo $this->Form->input('logro_mline_empate', array(
                                    "div" => array(
                                        "class" => "mws-form-item large"
                                    ),
                                    "class" => "mws-textinput",
                                    "label" => ""
                                ));
                                ?>
                            </div>
                        </div>
                    </div>
                </div>    	
            </div>

            <div class="mws-panel grid_2">
                <div class="mws-panel-header">
                    <span class="mws-i-24 i-pencil">RLine</span>
                </div>
                <div class="mws-panel-body">
                    <div class="mws-form-inline">
                        <div class="mws-form-inline">
                            <div class="mws-form-row">
                                <label>Logro Local</label>
                                <?php
                                echo $this->Form->input('logro_rline_local', array(
                                    "div" => array(
                                        "class" => "mws-form-item"
                                    ),
                                    "class" => "mws-textinput",
                                    "label" => ""
                                ));
                                ?>
                            </div>
                            <div class="mws-form-row">
                                <label>Goles Local</label>
                                <?php
                                echo $this->Form->input('goles_rline_local', array(
                                    "div" => array(
                                        "class" => "mws-form-item large"
                                    ),
                                    "class" => "mws-textinput",
                                    "label" => ""
                                ));
                                ?>
                            </div>
                            <div class="mws-form-row">
                                <label>Logro Visitante</label>
                                <?php
                                echo $this->Form->input('logro_rline_visitante', array(
                                    "div" => array(
                                        "class" => "mws-form-item large"
                                    ),
                                    "class" => "mws-textinput",
                                    "label" => ""
                                ));
                                ?>
                            </div>
                            <div class="mws-form-row">
                                <label>Goles Visitante</label>
                                <?php
                                echo $this->Form->input('goles_rline_visitante', array(
                                    "div" => array(
                                        "class" => "mws-form-item large"
                                    ),
                                    "class" => "mws-textinput",
                                    "label" => ""
                                ));
                                ?>
                            </div>

                        </div>
                    </div>
                </div>    	
            </div>
                </div>
        </div>
        <div class="mws-button-row">
            <input class="mws-button red" type="submit" value="Crear">
        </div>
        </form>
    </div>
</div>



<!--<div class="games form">

    <fieldset>
        <legend><?php echo __('Add Game'); ?></legend>
<?php
echo $this->Form->input('altas');
echo $this->Form->input('bajas');
echo $this->Form->input('');
echo $this->Form->input('goles_alta');
echo $this->Form->input('goles_baja');
echo $this->Form->input('fecha_juego');
echo $this->Form->input('goles_local');
echo $this->Form->input('goles_visitante');
?>
    </fieldset>

</div>-->

<script>
    (function()
    {
        $('#GameFechaJuego').datetimepicker({
            dateFormat: "yy-mm-dd"
        });
    })();
</script>
