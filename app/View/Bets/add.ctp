<table width="100%">
    <tr>
        <td>
            Ticket Nro:<?=$id?>
        </td>
    </tr>
    <tr>
        <td>
            Fecha: <?=$fecha?> - Hora: <?=$hora?>
        </td>
    </tr>
    <tr>
        <td>
            Jugada Pesos: <?= number_format($apuesta)?>
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
            <?=$texto?>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            Premio Pesos: <?= number_format($ganancia)?>
        </td>
    </tr>
    
</table>

<input id="btnImprimir" type="button" onclick="imprimir(<?= $id ?>)" value="Imprimir"/>
<script>
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
                $("#btnImprimir").css("display", "none");
                window.print();
                window.location = "/games/listar";
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

