

<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span class="mws-i-24 i-pencil">Cancelar Venta</span>
    </div>
    <div class="mws-panel-body">

        <?php
        echo $this->Form->create('Bet', array(
            "Class" => "mws-form"
        ));
        ?>
        <div class="mws-form-inline">
            <div class="mws-form-row">

                <div class="mws-panel grid_8">
                    <div class="mws-panel-header">
                        <span class="mws-i-24 i-pencil">Codigo del tiquete</span>
                    </div>
                    <div class="mws-panel-body">
                        <div class="mws-form-inline">
                            <div class="mws-form-row">
                                <label>Código</label>
                                <?php
                                echo $this->Form->input('id', array(
                                    "div" => array(
                                        "class" => "mws-form-item large"
                                    ),
                                    "class" => "mws-textinput",
                                    "label" => "",
                                    "type" => "text"
                                ));
                                ?>
                            </div>
                        </div>
                    </div>    	
                </div>

            </div>
        </div>
        <div class="mws-button-row">
            <input class="mws-button green" type="submit" value="Finalizar">
        </div>
        </form>
    </div>
</div>

<script>

        $("#BetCancelarbetForm").submit(function(e)
        {
            
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
                        if (resultado == "ok")
                        {
                            alert("Venta cancelada");
                            return false;
                        } else {
                            alert("La venta no se pudo cancelar, por favor contacte con el administrador, codigo apuesta: " + id);
                            return false;
                        }


                    });

                }

            });
            return false;


        });
  

</script>
