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

<input id="btnImprimir" type="button" onclick="imprimir()" value="Imprimir"/>
<script>
    function imprimir()
    {
        $("#btnImprimir").css("display","none");
        window.print();
        window.location ="/apuestas/index.php";
    }
</script>

