<div class="row" style="display: none" id="lblResultado">
    <div class="col-md-12">
        <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title">Resultado Cancelar Bet</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-danger btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-danger btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <p id="lblMensaje">
                </p>
            </div><!-- /.box-body -->
            <!-- Loading (remove the following to stop the loading)-->
            <div class="overlay"></div>
            <div class="loading-img"></div>
            <!-- end loading -->
        </div>
    </div>
</div>

<div class="col-md-12">
    <!-- general form elements disabled -->
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title">Cancelar Venta</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <?php echo $this->Form->create('Bet'); ?>
            <?php
            echo $this->Form->input('id', array(
                "div" => array(
                    "class" => "form-group"
                ),
                "class" => "form-control",
                "label" => "Codigo del Tiquete",
                "type" => "number"
            ));
            ?>
            <div class="box-footer">
                <?php
                echo $this->Form->end(array(
                    "class" => "btn btn-primary",
                    "div" => false,
                    "label" => "Eliminar"
                ));
                ?>
            </div>

        </div>
    </div>
</div>
<?php
$this->start('scripts');
?>
<script>

    $("#BetCancelarbetForm").submit(function(e)
    {

        $("#lblResultado").css("display", "block");
        $(".box-danger").css("display", "block");
        $(".overlay").css("display", "block");
        $(".loading-img").css("display", "block");
        var url = "cancelarbet.xml";
        var datos = {
            idBet: $("#BetId").val()
        };
        ajax(url, datos, function(xml)
        {
            if (xml != null)
            {
                $("datos", xml).each(function() {
                    var resultado;
                    resultado = $("Resultado", this).text();
                    $(".overlay").css("display", "none");
                    $(".loading-img").css("display", "none");
                    if (resultado == "ok")
                    {
                        $("#lblMensaje").text("Apuesta cancelada con exito");
//                        alert("Venta cancelada");
                        return false;
                    } else {
                        $("#lblMensaje").text("La venta no se pudo cancelar, por favor contacte con el administrador, codigo apuesta: " + id);
//                        alert("La venta no se pudo cancelar, por favor contacte con el administrador, codigo apuesta: " + id);
                        return false;
                    }
                    console.log("entre");
                    


                });

            }

        });
        return false;


    });


</script>
<?php
$this->end();
?>