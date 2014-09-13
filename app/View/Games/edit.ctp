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

                <div class="mws-panel grid_4">
                    <div class="mws-panel-header">
                        <span class="mws-i-24 i-pencil">Informacion del Juego</span>
                    </div>
                    <div class="mws-panel-body">
                        <div class="mws-form-inline">
                            <div class="mws-form-row">
                                <label>Liga</label>

                                <select name="data[Game][liga_id]">
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
                                echo $this->Form->input('id');
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
                                <div class="mws-form-item large">
                                    <input name="data[Game][fecha_juego]" value="<?= $this->data["Game"]["fecha_juego"] ?>" class="mws-textinput" maxlength="20" id="GameFechaJuego" type="text">

                                </div>

                            </div>
                        </div>
                    </div>    	
                </div>

                <div class="mws-panel grid_4">
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

                <div class="mws-panel grid_4">
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

                <div class="mws-panel grid_4">
                    <div class="mws-panel-header">
                        <span class="mws-i-24 i-pencil">A/B</span>
                    </div>
                    <div class="mws-panel-body">
                        <div class="mws-form-inline">
                            <div class="mws-form-inline">
                                <div class="mws-form-row">
                                    <label>Logro Altas</label>
                                    <?php
                                    echo $this->Form->input('altas', array(
                                        "div" => array(
                                            "class" => "mws-form-item"
                                        ),
                                        "class" => "mws-textinput",
                                        "label" => ""
                                    ));
                                    ?>
                                </div>
                                <div class="mws-form-row">
                                    <label>Goles Altas</label>
                                    <?php
                                    echo $this->Form->input('goles_alta', array(
                                        "div" => array(
                                            "class" => "mws-form-item large"
                                        ),
                                        "class" => "mws-textinput",
                                        "label" => ""
                                    ));
                                    ?>
                                </div>
                                <div class="mws-form-row">
                                    <label>Logro Baja</label>
                                    <?php
                                    echo $this->Form->input('bajas', array(
                                        "div" => array(
                                            "class" => "mws-form-item large"
                                        ),
                                        "class" => "mws-textinput",
                                        "label" => ""
                                    ));
                                    ?>
                                </div>
                                <div class="mws-form-row">
                                    <label>Goles Baja</label>
                                    <?php
                                    echo $this->Form->input('goles_baja', array(
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
            <input class="mws-button green" type="submit" value="Crear">
        </div>
        </form>
    </div>
</div>



<script>
    (function()
    {
        $('#GameFechaJuego').datetimepicker({
            dateFormat: "yy-mm-dd"
        });
    })();
</script>

