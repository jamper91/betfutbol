<table width="100%">
    <tr>
        <td>
            <div align="center">
                <?=$this->Html->image("logo.png")?>
            </div>
            
        </td>
    </tr>
    <tr>
        <td>
            ___________________________<br>
            <strong> Ticket Nro:<?= $id ?></strong>
        </td>
    </tr>
    <tr>
        <td>
            <strong>Fecha: <?= $fecha ?> - Hora: <?= $hora ?></strong>
        </td>
    </tr>
    <tr>
        <td>
            <strong>Jugada Pesos: $<?= number_format($apuesta) ?></strong>
            ___________________________<br>
        </td>
    </tr>
    <tr>
        <td>
            <table style="border: 1" width="100%">
                <tr>
                    <td>
                        T
                    </td>
                    <td>
                        Ref
                    </td>
                    <td>
                        Equipo
                    </td>
                    <td>
                        Logro
                    </td>
                </tr>
                <?= $texto ?>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <strong>Premio Pesos: $<?= number_format($ganancia) ?></strong>
            <p style="font-size: 12px">
                Este tiquet caduca  alos 10 días.<br>
                Partido suspendido anula la apuesta
            </p>
        </td>
    </tr>

</table>

<input id="btnImprimir" type="button" onclick="imprimir(<?= $id ?>)" value="Imprimir"/>
<input id="btnRegresar" type="button" onclick="regresar()" value="Regresar"/>
<input id="btnCancelar" type="button" onclick="cancelar(<?= $id ?>)" value="Cancelar Venta"/>
<script>
    function regresar()
    {
        window.location = "/games/listar";
    }
    function imprimir(id)
    {

        $("#BetId").val(id);
        var url = "habilitarbet.xml";
        var datos = {
            idBet: id
        };
        ajax(url, datos, function(xml)
        {

            if (xml != null)
            {
                $("datos", xml).each(function() {
                    var resultado;
                    resultado = $("Resultado", this).text();
                    if (resultado == "ok")
                    {
                        $("#btnImprimir").css("display", "none");
                        $("#btnRegresar").css("display", "none");
                        $("#btnCancelar").css("display", "none");
                        window.print();
                        setTimeout(function()
                        {
                            $("#btnRegresar").css("display", "block");
                            $("#btnCancelar").css("display", "block");
                        }, 1000);

                    } else {
                        alert("La venta no se pudo habilitar por favor contactar con el administrador, codigo apuesta: " + id);
                    }


                });
            }

        });

    }
    function cancelar(id)
    {
        $("#BetId").val(id);
        var url = "cancelarbet.xml";
        var datos = {
            idBet: id
        };
        ajax(url, datos, function(xml)
        {
            if (xml != null)
            {
                $("datos", xml).each(function() {
                    var resultado;
                    resultado = $("Resultado", this).text();
                    if (resultado == "ok")
                    {
                        alert("Venta cancelada");
                    } else {
                        alert("La venta no se pudo cancelar, por favor contacte con el administrador, codigo apuesta: " + id);
                    }


                });

            }

        });

    }
    function ajax(url2, datos, callback)
    {
        //checkInternet();
        var retornar = null;
        $.ajax({
            url: url2,
            type: "POST",
            data: datos,
            headers: {'Access-Control-Allow-Origin': '*'},
            crossDomain: true,
            error: function(jqXHR, textStatus, errorThrown)
            {
                console.log("base", "ajax", "textStatus: " + textStatus);
                //console.log("base", "ajax", "errorThrown: " + imprimirObjeto(errorThrown));
            },
            success: function(data)
            {
                retornar = data;
            }
        }).done(function()
        {
            callback(retornar);
        });
    }
</script>

