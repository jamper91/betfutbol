<?php
//$ingresos;
//$salidas;
?>


<?php
echo $this->Form->create('Bet', array('action' => 'estadisticas'));
?>
<table>

    <tr>
        <td>
            <?php
            echo $this->Form->input('fechaI', array(
                'type' => 'text',
                'label' => 'Fecha Inicio'
            ));
            ?>
        </td>
        <td>
            <?php
            echo $this->Form->input('fechaF', array(
                'type' => 'text',
                'label' => 'Fecha Fin'
            ));
            ?>
        </td>
    </tr>
</table>
<?php
echo $this->Form->end('Filtrar');
?>
<script>
    (function()
    {
        $('#BetFechaI').datetimepicker({
            dateFormat: "yy-mm-dd"
        });
//        $('#BetFechaF').datetimepicker({
//            dateFormat: "yy-mm-dd"
//        });
    })();
</script>
<table>
    <thead>
    <th>
        Fecha
    </th>
    <th>
        Apostado
    </th>
    <th>
        Ganando
    </th>
    <th>
        Pagado
    </th>
</thead>
<?php
foreach ($datos as $dato) {
    ?>
    <tr>
        <td>
            <?= $dato['Bet']['fecha'] ?>
        </td>
        <td>
            <?= $dato['Bet']['apuesta'] ?>
        </td>
        <td>
            <?= $dato['Bet']['ganancia'] ?>
        </td>
        <td align="center">
            <?php
            if ($dato['Bet']['pagado'] == '1')
                echo 'Si';
            else
                echo 'No';
            ?>
        </td>
    </tr>


    <?php
    $ingresos = $dato['Bet']['ingresos'];
    $salidas = $dato['Bet']['salidas'];
}
?>
<tr>
    <td colspan="2">
        Ingreso: <? $ingresos ?>
    </td>
    <td colspan="2">
        Salidas <? $salidas ?>
    </td>
</tr>
</table>
