<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>jQuery UI Tabs - Default functionality</title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">
<script>
$(function() {
$( "#tabs" ).tabs();
});
</script>
</head>
<body>

<?php
// in your view file

//$this->Html->css('//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css', array('inline' => false));
//$this->Html->script('//code.jquery.com/ui/1.11.1/jquery-ui.js', array('inline' => false));
?>
<div id="tabs">
    <ul>
        <?php
        foreach ($deportes as $key => $deporte) {
            echo '<li><a href="#tabs-' . $key . '">' . $deporte["Deporte"]["name"] . '</a></li>';
        }
        ?>
    </ul>
    <?php
    foreach ($deportes as $key => $deporte) {
        echo '<div id="tabs-' . $key . '">';
        ?>
        <div class="mws-panel grid_4">
            <div class="mws-panel-header">
                <span class="mws-i-24 i-table-1">Juegos</span>
            </div>
            <div class="mws-panel-body">
                <table class="mws-table" id="partidos">
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
                            $ligaAnterior="";
                            foreach ($partidos as $i => $partido): 
                                ?>
                            <?php if ($partido["Liga"]["deporte_id"] == $deporte["Deporte"]["id"]) 
                                { 
                                    if($partido["Liga"]["name"]!=$ligaAnterior)
                                    {
                                        $ligaAnterior=$partido["Liga"]["name"];
                                        echo '<tr><td colspan="5">'.$partido["Liga"]["name"].' </td> </tr>';
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
                                        <a onclick="agregarApuesta('<?= $partido["Game"]["logro_mline_local"] ?>', '<?= $partido["Game"]["local"] ?>', 'ML',<?= $partido["Game"]["id"] ?>, '<?= $partido["Game"]["local"] . " Vs " . substr($partido["Game"]["visitante"], 0, 2) ?>', '0')">
                                            <?= $partido["Game"]["logro_mline_local"] ?>
                                        </a>    
                                        <br>
                                        <a onclick="agregarApuesta('<?= $partido["Game"]["logro_mline_visitante"] ?>', '<?= $partido["Game"]["visitante"] ?>', 'ML',<?= $partido["Game"]["id"] ?>, '<?= $partido["Game"]["visitante"] . " Vs " . substr($partido["Game"]["local"], 0, 2) ?>', '0')">
                                            <?= $partido["Game"]["logro_mline_visitante"] ?>
                                        </a>
                                        <br>
                                        <a onclick="agregarApuesta('<?= $partido["Game"]["logro_mline_empate"] ?>', 'Empate', 'ML',<?= $partido["Game"]["id"] ?>, 'Empate vs <?= substr($partido["Game"]["visitante"], 0, 2) ?>', '0')">
                                            <?= $partido["Game"]["logro_mline_empate"] ?>
                                        </a>
                                    </td>
                                    </td>
                                    <td>
                                        <a onclick="agregarApuesta('<?= $partido["Game"]["logro_rline_local"] ?>', '<?= $partido["Game"]["local"] ?>', 'RL',<?= $partido["Game"]["id"] ?>, '<?= $partido["Game"]["local"] . " Vs " . substr($partido["Game"]["visitante"], 0, 2) ?>', '<?= $partido["Game"]["goles_rline_local"] ?>')">
                                            <?= $partido["Game"]["goles_rline_local"] ?><?= $partido["Game"]["logro_rline_local"] ?>
                                        </a>    
                                        <br>
                                        <a onclick="agregarApuesta('<?= $partido["Game"]["logro_rline_visitante"] ?>', '<?= $partido["Game"]["visitante"] ?>', 'RL',<?= $partido["Game"]["id"] ?>, '<?= $partido["Game"]["visitante"] . " Vs " . substr($partido["Game"]["local"], 0, 2) ?>', '<?= $partido["Game"]["goles_rline_visitante"] ?>')">
                                            <?= $partido["Game"]["goles_rline_visitante"] ?><?= $partido["Game"]["logro_rline_visitante"] ?>
                                        </a>
                                        <br>
                                    </td>
                                    <td >
                                        <a onclick="agregarApuesta('<?= $partido["Game"]["altas"] ?>', '<?= $partido["Game"]["local"] ?>', 'A',<?= $partido["Game"]["id"] ?>, '<?= $partido["Game"]["local"] . " Vs " . substr($partido["Game"]["visitante"], 0, 2) ?>', '<?= $partido["Game"]["goles_alta"] ?>')">
                                            A <?= $partido["Game"]["goles_alta"] ?><?= $partido["Game"]["altas"] ?>
                                        </a>    
                                        <br>
                                        <a onclick="agregarApuesta('<?= $partido["Game"]["bajas"] ?>', '<?= $partido["Game"]["visitante"] ?>', 'B',<?= $partido["Game"]["id"] ?>, '<?= $partido["Game"]["visitante"] . " Vs " . substr($partido["Game"]["local"], 0, 2) ?>', '<?= $partido["Game"]["goles_baja"] ?>')">
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
        </div>

        <?php
        echo '</div>';
    }
    ?>
</div>

<!--</form>-->

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
<div class="mws-panel grid_4">
    <div class="mws-panel-header">
        <span class="mws-i-24 i-table-1">Apuesta</span>
    </div>
    <div class="mws-panel-body">
        <div class="mws-panel-content">
            <label>Apuesta 

                $<input id="txtApuesta"  onkeyup="calcularGanancias()" value="0" class="mws-textinput" type="number"/>

            </label>
            <label style="float: right">Ganancia: 
                <label id="lblGanancias">0</label>
            </label>
        </div>
        <div class="dataTables_wrapper">
            <table class="mws-table">
                <thead>
                    <tr>
                        <th style="width: 140px;" colspan="1" rowspan="1">Tipo</th>
                        <th style="width: 191px;" colspan="1" rowspan="1" >Id</th>
                        <th style="width: 177px;" colspan="1" rowspan="1" >Equipo</th>
                        <th style="width: 119px;" colspan="1" rowspan="1" >Logro</th>
                        <th style="width: 85px;" colspan="1" rowspan="1">Opciones</th></tr>
                </thead>

                <tbody id="tblApuesta">
<!--                    <tr class="gradeA odd">
                        <td class=" sorting_1">Gecko</td>
                        <td>Firefox 1.0</td>
                        <td>Win 98+ / OSX.2+</td>
                        <td class="center">1.7</td>
                        <td class="center">A</td>
                    </tr>-->

                </tbody>
            </table>
        </div>
    </div>
    <div class="mws-button-row">
        <input class="mws-button red" type="submit" value="Crear">
    </div>
</div>
</form>

<div id="mws-jui-dialog" title="Download complete">
    <p>No se pueden agregar mas elementos de este partido</p>
</div>

<script>
    //Cantidad de elementos agregagos
    var cant = 0;
    function agregarApuesta(parley, equipo, tipo, id, encuentro, goles)
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
                            $(this).attr("habilitado", "false");
                            $(this).css("background-color", "#837d83");

                        }
                    }
                }
        );
        //encuentro=encuentro.substring(1, 4);
        if (h == true)
        {
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
            //            $("#mws-jui-dialog").dialog("option", {modal: true}).dialog("open");
            $("#mws-jui-dialog").dialog({
                modal: true,
                buttons: {
                    Ok: function() {
                        $(this).dialog("close");
                    }
                },
                title: "Error"
            }).dialog("open");
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

                    }
                }
        );
    }
    $(function() {
        $("#tabs").tabs();
    });

</script>
</body>
</html>
