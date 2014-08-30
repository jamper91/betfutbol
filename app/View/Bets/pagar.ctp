<?php
//Creo la variable para el autacompletar
?>

<script>
    var idBet = -1;
    $(document).ready(function() {
        /*Funciones autoejecutables*/
        (function()
        {
            $("input[type=submit]").attr ("display", "none");
            autocompletar();
        })();
    });
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
    function autocompletar()
    {
        var locales = new Array();
        var url = "getbets.xml";
        var datos = {
        };
        ajax(url, datos, function(xml)
        {
            $("datos", xml).each(function()
            {
                var obj = $(this).find("Bet");
                var idL, nombreL;
                idL = $("pagado", obj).text();
                nombreL = $("id", obj).text();
                locales.push({id: idL, value: nombreL});
            });
        });
        $("#txtCodigoApuesta").autocomplete({
            source: locales,
            select: function(event, ui)
            {
                //Envio al usuario a la vista 3
                var pagado=ui.item.id;
                console.log("pagado: " + ui.item.id);
//                for(var o in ui.item)
//                {
//                    console.log("o: " + o);
//                }
                console.log("ui.item.value: " + ui.item.value);
                if(parseInt(pagado)===0)
                {
                    $("#BetId").val(ui.item.value);
                    $(".submit").css("display", "inline");
                }else{
                    $("#mensaje").text("Esta apuesta ya ha sido pagada");
                    alert("Esta apuesta ya ha sido pagada");
                    $(".submit").css("display", "none");
                }
                
                
                

            },
            response: function(event, ui) {
                if (!ui.content.length) {
                    var noResult = {value: "", label: "Sin coincidencia"};
                    ui.content.push(noResult);
                }
            }
        });
    }
</script>

<h1>
    Digite el codigo de la apuesta
</h1>
<input type="text" id="txtCodigoApuesta" style="width:80%;display:inline"/>
<label id="mensaje"></label>
<?php
echo $this->Form->create('Bet', array('action' => 'pagar'));
echo $this->Form->input('id', array(
    'type' => 'text',
    'div' => array(
        'style' => 'display:none;'
    )
));
$options = array(
    'label' => 'Pagar',
    'div' => array(
        'style' => 'width:20%;display:none'
    )
);
echo $this->Form->end($options);
?>
</td>


