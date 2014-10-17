<?php
/**
 * Variables para calcular lo que se deberia pagar
 */
$total = 0;
$apuesta = $bet["apostado"];
$total = $apuesta;
$texto = "";
?>

<div class="mws-panel grid_4">
    <div class="mws-panel-header">
        <span class="mws-i-24 i-table-1">Apuesta</span>
    </div>
    <div class="mws-panel-body">
        <div class="dataTables_wrapper">

            <table class="mws-datatable mws-table">
                <thead>
                    <tr>
                        <th style="width: 140px;" colspan="1" rowspan="1" class="sorting_asc">Codigo Juego</th>
                        <th style="width: 191px;" colspan="1" rowspan="1" class="sorting">Tipo</th>
                        <th style="width: 177px;" colspan="1" rowspan="1" class="sorting">Equipo</th>
                        <th style="width: 177px;" colspan="1" rowspan="1" class="sorting">Goles</th>
                        <th style="width: 119px;" colspan="1" rowspan="1" class="sorting">Logro</th>
                        <th style="width: 85px;" colspan="1" rowspan="1" >Estado</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $cant = 0;
                    foreach ($rows as $row):

                        $texto = $row["Bet"]["texto"];
                        switch ($row["Row"]["estado"]) {
                            case "2":
                                $estado = "Gano";
                                $background = "#A6ED41";
                                $parley = $row['Row']['logro'];
                                if ($parley < 0) {

                                    $total = intval(floatval(($total / abs($parley)) * 100) + floatval($total));
                                } else {

                                    $total = intval(floatval(($total * $parley) / 100) + floatval($total));
                                }
                                break;
                            case "1":
                                $estado = "Perdio";
                                $background = "#ED4741";
                                break;
                            case "0":
                                $estado = "Empato";
                                $background = "#F2F2F2";
                                break;
                            case "-1":
                                $estado = "En Curso";
                                $background = "#E6A92F";
                                break;
                            case "-2":
                                $estado = "Partido Suspendido";
                                $background = "#F2F2F2";
                                break;

                            default:
                                break;
                        }

                        if ($cant % 2 == 0)
                            $class = "gradeA odd";
                        else
                            $class = "gradeA even";
                        $cant++;
                        ?>


                        <tr class="<?= $class ?>" style="background-color: <?= $background ?>">
                            <td class=" sorting_1"><?= $row['Game']['id'] ?></td>
                            <td><?= $row['Row']['tipo'] ?></td>
                            <td><?= $row['Row']['equipo'] ?></td>
                            <td><?= $row['Row']['goles'] ?></td>
                            <td><?= $row['Row']['logro'] ?></td>
                            <td><?= $estado ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="mws-panel grid_4">
    <div class="mws-panel-header">
        <span class="mws-i-24 i-table-1">Apuesta</span>
    </div>
    <div class="mws-panel-body">
        <table style="width: 100%;font-size: 14px;">
            <?= $texto ?>
        </table>

    </div>
</div>

<?php
if ($this->Session->read("User.group_id") == "2") {
    echo $this->Form->create('Bet', array(
        "action" => "pagar",
        "Class" => "mws-form"
    ));
    ?>
    <div class="mws-panel grid_4">
        <div class="mws-panel-header">
            <span class="mws-i-24 i-pencil">Apuesta</span>
        </div>
        <div class="mws-panel-body">
            <table class="mws-table">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Apostado</th>
                        <th>Ganancia Inicial</th>
                        <th>Ganancial Final</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="gradeX even">
                        <td><?= $bet["id"] ?></td>
                        <td><?= $bet["apostado"] ?></td>
                        <td><?= $bet["ganancia"] ?></td>
                        <td><input name="data[Bet][ganancia]" id="BetGanancia"  value="<?= $total ?>"></td>
                    </tr>
                </tbody>
            </table>
            <input name="data[Bet][id]" style="display:none" id="BetId"  value="<?= $bet["id"] ?>">
            
            <div class="mws-button-row">
                <input class="mws-button green" type="submit" value="Pagar">
            </div>
            
        </div>
    </div>
</form>
    <?php
}
?>
<script>
    (function()
    {
        $('#GameFechaJuego').datetimepicker({
            dateFormat: "yy-mm-dd"
        });
    })();
</script>

