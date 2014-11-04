<div class="col-md-8">
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <?php
            $primero = true;
            foreach ($deportes as $key => $deporte) {
                if ($primero) {
                    $class = "class='active'";
                    $primero = false;
                } else
                    $class = "";
                ?>

                <li <?= $class ?>>
                    <a href="#tab_<?= $key ?>" data-toggle="tab"><?= $deporte["Deporte"]["name"] ?></a>
                </li>
                <?php
            }
            ?>
        </ul>
        <div class="tab-content">
            <?php
            $primero = true;
            foreach ($deportes as $key => $deporte) {
                if ($primero) {
                    $class = "active";
                    $primero = false;
                } else {
                    $class = "";
                }
                ?>
                <div class="tab-pane <?= $class ?>" id="tab_<?= $key ?>">
                    <div class="box-body table-responsive">
                        <table id="partidos" class="table table-bordered dataTable">
                            <thead>
                                <tr>
                                    <th>Partido</th>
                                    <th>Fecha</th>
                                    <th>MLine</th>
                                    <th>RLine</th>
                                    <th>A/B</th>
                                </tr>
                            </thead>
                            <tbody>
    <?php
    $ligaAnterior = "";
    foreach ($partidos as $i => $partido):
        ?>
                                    <?php
                                    if ($partido["Liga"]["deporte_id"] == $deporte["Deporte"]["id"]) {
                                        if ($partido["Liga"]["name"] != $ligaAnterior) {
                                            $ligaAnterior = $partido["Liga"]["name"];
                                            echo '<tr><td colspan="5"><strong>' . $partido["Liga"]["name"] . '</strong> </td> </tr>';
                                        }
                                        ?>

                                        <?php if ($i % 2 == 0) { ?>
                                            <tr class="gradeA even" game_id="<?= $partido["Game"]["id"] ?>" habilitado="true">
                                        <?php } else { ?>
                                            <tr class="gradeA odd" game_id="<?= $partido["Game"]["id"] ?>" habilitado="true">
                                            <?php } ?>
                                            <td> <?= $partido["Game"]["local"] ?><br>
                                            <?= $partido["Game"]["visitante"] ?><br>
                                                Empate
                                            </td>
                                            <td>
            <?php
            $date = date_create($partido["Game"]["fecha_juego"]);
            echo date_format($date, 'm-d H:i');
            ?>
                                            </td>
                                            <td>
                                                <a onclick="agregarApuesta('<?= $partido["Game"]["logro_mline_local"] ?>', '<?= $partido["Game"]["local"] ?>', 'ML',<?= $partido["Game"]["id"] ?>, '<?= $partido["Game"]["local"] . " Vs " . substr($partido["Game"]["visitante"], 0, 2) ?>', '0', this)">
            <?= $partido["Game"]["logro_mline_local"] ?>
                                                </a>    
                                                <br>
                                                <a onclick="agregarApuesta('<?= $partido["Game"]["logro_mline_visitante"] ?>', '<?= $partido["Game"]["visitante"] ?>', 'ML',<?= $partido["Game"]["id"] ?>, '<?= $partido["Game"]["visitante"] . " Vs " . substr($partido["Game"]["local"], 0, 2) ?>', '0', this)">
            <?= $partido["Game"]["logro_mline_visitante"] ?>
                                                </a>
                                                <br>
                                                <a onclick="agregarApuesta('<?= $partido["Game"]["logro_mline_empate"] ?>', 'Empate', 'ML',<?= $partido["Game"]["id"] ?>, 'Emp vs <?= substr($partido["Game"]["visitante"], 0, 5) ?>', '0', this)">
            <?= $partido["Game"]["logro_mline_empate"] ?>
                                                </a>
                                            </td>
                                            </td>
                                            <td>
                                                <a onclick="agregarApuesta('<?= $partido["Game"]["logro_rline_local"] ?>', '<?= $partido["Game"]["local"] ?>', 'RL',<?= $partido["Game"]["id"] ?>, '<?= $partido["Game"]["local"] . " Vs " . substr($partido["Game"]["visitante"], 0, 2) ?>', '<?= $partido["Game"]["goles_rline_local"] ?>', this)">
            <?= $partido["Game"]["goles_rline_local"] ?><?= $partido["Game"]["logro_rline_local"] ?>
                                                </a>    
                                                <br>
                                                <a onclick="agregarApuesta('<?= $partido["Game"]["logro_rline_visitante"] ?>', '<?= $partido["Game"]["visitante"] ?>', 'RL',<?= $partido["Game"]["id"] ?>, '<?= $partido["Game"]["visitante"] . " Vs " . substr($partido["Game"]["local"], 0, 2) ?>', '<?= $partido["Game"]["goles_rline_visitante"] ?>', this)">
            <?= $partido["Game"]["goles_rline_visitante"] ?><?= $partido["Game"]["logro_rline_visitante"] ?>
                                                </a>
                                                <br>
                                            </td>
                                            <td >
                                                <a onclick="agregarApuesta('<?= $partido["Game"]["altas"] ?>', '<?= $partido["Game"]["local"] ?>', 'A',<?= $partido["Game"]["id"] ?>, '<?= $partido["Game"]["local"] . " Vs " . substr($partido["Game"]["visitante"], 0, 2) ?>', '<?= $partido["Game"]["goles_alta"] ?>', this)">
                                                    A <?= $partido["Game"]["goles_alta"] ?><?= $partido["Game"]["altas"] ?>
                                                </a>    
                                                <br>
                                                <a onclick="agregarApuesta('<?= $partido["Game"]["bajas"] ?>', '<?= $partido["Game"]["visitante"] ?>', 'B',<?= $partido["Game"]["id"] ?>, '<?= $partido["Game"]["visitante"] . " Vs " . substr($partido["Game"]["local"], 0, 2) ?>', '<?= $partido["Game"]["goles_baja"] ?>', this)">
                                                    B <?= $partido["Game"]["goles_baja"] ?><?= $partido["Game"]["bajas"] ?>
                                                </a>
                                                <br>

                                            </td>
                                        </tr>
        <?php } ?>
    <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div><!-- /.tab-pane -->
    <?php
}
?>
        </div><!-- /.tab-content -->
    </div>
</div>

<div class="col-md-4">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">
                Apuesta
            </h3>
        </div>
        <div class="box-body">

<?php
echo $this->Form->create('Bet', array('action' => 'add'));
echo $this->Form->input('apostado', array(
    'type' => 'text',
    'div' => array(
        'style' => 'display:none'
    )
));
echo $this->Form->input('ganancia', array(
    'type' => 'text',
    'div' => array(
        'style' => 'display:none'
    )
));
echo $this->Form->input('texto', array(
    'type' => 'text',
    'div' => array(
        'style' => 'display:none'
    )
));
?>
            <input type="text" name="data[Bet][vendedor_id]" value="<?= $this->Session->read('User.id') ?>" style="display: none" />

            <label>Apuesta 

                $<input id="txtApuesta"  onkeyup="calcularGanancias()" value="0" class="mws-textinput" type="number"/>

            </label>
            <label style="float: right; font-size: 20px;">Ganancia: 
                <label id="lblGanancias">0</label>
            </label>
            <div class="table-responsive">
                <table id="partidos" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Tipo</th>
                            <th>Id</th>
                            <th>Equipo</th>
                            <th>Logro</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody id="tblApuesta">

                    </tbody>
                </table>
            </div>

            <div class="box-footer">
                <input class="btn btn-success" type="submit" value="Crear">
            </div>
        </div>
        </form>
    </div>
</div>

<div class="col-md-4" id="mws-jui-dialog" title="Error" style="display: none;">
    <div class="box box-solid bg-yellow" >
        <div class="box-header">
            <h3 class="box-title">Cuidado</h3>
        </div>
        <div class="box-body">
            No se pueden agregar mas elementos de este partido
        </div><!-- /.box-body -->
    </div>
</div>

<div class="col-md-4" id="mws-jui-dialog2" title="Error" style="display: none;">
    <div class="box box-solid bg-yellow" >
        <div class="box-header">
            <h3 class="box-title">Cuidado</h3>
        </div>
        <div class="box-body">
            Solo se pueden agregar 11 elementos por ticket
        </div><!-- /.box-body -->
    </div>
</div>
<?php
$this->start('scripts');
echo $this->Html->script("jquery.bpopup.min");
?>


<script>
    //Cantidad de elementos agregagos
    var cant = 0;
    function agregarApuesta(parley, equipo, tipo, id, encuentro, goles, a)
    {

        var h = false;
        //Determino si esta fila esta habilitada
        $("#partidos tr").each(
                function()
                {
                    //Obtengo los atributos game_id y habilitado
                    var game_id, habilitado;
                    game_id = $(this).attr("game_id");
                    habilitado = $(this).attr("habilitado");
                    if (game_id == id)
                    {
                        if (habilitado == "true")
                        {
                            h = true;
                            if (cant < 11)
                            {
                                $(this).attr("habilitado", "false");
                                $(this).css("background-color", "#bc893c");
                            }

                        }
                    }
                }
        );
        //encuentro=encuentro.substring(1, 4);
        if (cant < 11)
        {
            if (h == true)
            {
                $(a).css("background-color", "yellow");
                var clase = "gradeA odd";
                if (cant % 2 == 0)
                    clase = "gradeA even";
                var html = "";
                html += "<tr class='" + clase + "' logro='" + parley + "' equipo='" + equipo + "' tipo='" + tipo + goles + "' id='" + id + "' encuentro='" + encuentro + "'>";
                html += " <td>";
                html += tipo + " " + goles;
                html += "<input type='text' value='" + tipo + "' name='data[Row][" + cant + "][tipo]' style='display:none'>";
                html += " </td>";
                html += " <td>";
                html += id;
                html += "<input type='text' value='" + id + "' name='data[Row][" + cant + "][game_id]' style='display:none'>";
                html += " </td>";
                html += " <td>";
                html += equipo;
                html += "<input type='text' value='" + equipo + "' name='data[Row][" + cant + "][equipo]' style='display:none'>";
                html += " </td>";
                html += " <td>";
                html += parley;
                html += "<input type='text' value='" + parley + "' name='data[Row][" + cant + "][logro]' style='display:none'>";
                html += "<input type='text' value='" + goles + "' name='data[Row][" + cant + "][goles]' style='display:none'>";
                html += " </td>";
                html += " <td>";
                html += "<a class='deleteLink' onclick='eliminar(\"" + id + "\")'>Eliminar</a>";
                html += "<input type='text' value='-1' name='data[Row][" + cant + "][bet_id]' style='display:none'>";
                html += " </td>";
                html += "</tr>";
                $("#tblApuesta").append(html);
                calcularGanancias();
                cant++;
            } else {
                $('#mws-jui-dialog').bPopup();
            }
        } else {
            $('#mws-jui-dialog2').bPopup();
        }


    }

    function calcularGanancias()
    {
        var total = 0;
        var texto = "";
        //Obtengo la apuesta
        var apuesta = $("#txtApuesta").val();
        total = apuesta;
        //Recorro cada fila de la tabla
        $("#tblApuesta tr").each(
                function()
                {
                    var parley = $(this).attr("logro");
                    if (parley)
                    {
                        var tipo = $(this).attr("tipo");
                        var id = $(this).attr("id");
                        var encuentro = $(this).attr("encuentro");
                        texto += "<tr>";
                        texto += "<td>";
                        texto += tipo;
                        texto += "</td>";
                        texto += "<td>";
                        texto += id;
                        texto += "</td>";
                        texto += "<td>";
                        texto += encuentro;
                        texto += "</td>";
                        texto += "<td>";
                        texto += parley;
                        texto += "</td>";
                        texto += "</tr>";
                        parley = parseInt(parley);

                        if (parley < 0)
                        {

                            total = parseInt(parseFloat((total / Math.abs(parley)) * 100) + parseFloat(total));
                        } else {

                            total = parseInt(parseFloat((total * parley) / 100) + parseFloat(total));
                        }
                    }

                }
        );
        $("#BetTexto").val(texto);
        $("#BetApostado").val(apuesta);
        $("#BetGanancia").val(total);
        $("#lblGanancias").text(total);

    }
    function eliminar(id)
    {
        $("#" + id).remove();
        calcularGanancias();
        $("#partidos tr").each(
                function()
                {
                    //Obtengo los atributos game_id y habilitado
                    var game_id, habilitado;
                    game_id = $(this).attr("game_id");
                    habilitado = $(this).attr("habilitado");
                    console.log("game_id: " + game_id);
                    console.log("habilitado: " + habilitado);
                    if (game_id == id)
                    {
                        $(this).attr("habilitado", "true");
                        $(this).css("background-color", "#ffffff");
                        //Recorro los links dentro de este tr y le elimino el sombreado
                        $("a", this).each(
                                function()
                                {
                                    $(this).css("background-color", "");
                                }
                        );

                    }
                }
        );
    }
//        $(function() {
//            $("#tabs").tabs();
//        });

</script>
<?php
$this->end();
?>
</body>
</html>
