<?php
/**
 * Variables para calcular lo que se deberia pagar
 */
$total = 0;
$apuesta = $bet["apostado"];
$total = $apuesta;
$texto = "";
$gano=true;
?>
<div class="col-md-8">
    <!-- Info box -->
    <div class="box box-info">
        <div class="box-header">
            <h3 class="box-title">Apuesta</h3>
            <div class="box-tools pull-right">
                <div class="label bg-aqua">Apuesta</div>
            </div>
        </div>
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Codigo Juego</th>
                        <th>Tipo</th>
                        <th>Equipo</th>
                        <th>Goles</th>
                        <th>Logro</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $cant = 0;
                    foreach ($rows as $row):

                        $texto = $row["Bet"]["texto"];
                        switch ($row["Row"]["estado"]) {
                            case "2":
                                $estado = '<button class="btn btn-success">Gano</button>';
//                                $background = "#A6ED41";
                                $parley = $row['Row']['logro'];
                                if ($parley < 0) {

                                    $total = intval(floatval(($total / abs($parley)) * 100) + floatval($total));
                                } else {

                                    $total = intval(floatval(($total * $parley) / 100) + floatval($total));
                                }
                                break;
                            case "1":
                                $estado = '<button class="btn btn-danger">Perdio</button>';
//                                $background = "#ED4741";
                                $gano=false;
                                break;
                            case "0":
                                $estado = '<button class="btn btn-primary">Empato</button>';
//                                $background = "#F2F2F2";
                                break;
                            case "-1":
                                $estado = '<button class="btn btn-warning">En curso</button>';
//                                $background = "#E6A92F";
                                $gano=false;
                                break;
                            case "-2":
                                $estado = '<button class="btn btn-warning">Partido Suspendido</button>';
//                                $background = "#F2F2F2";
                                break;

                            default:
                                break;
                        }
                        $cant++;
                        ?>
                        <tr>
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
        </div><!-- /.box-body -->
        <div class="box-footer">
            <code>.box-footer</code>
        </div><!-- /.box-footer-->
    </div><!-- /.box -->
</div>
<div class="col-md-4">
    <!-- Info box -->
    <div class="box box-info">
        <div class="box-header">
            <h3 class="box-title">Tiquete</h3>
            <div class="box-tools pull-right">
                <div class="label bg-aqua">Tiquete</div>
            </div>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-striped">
                <?= $texto ?>
            </table>
        </div><!-- /.box-body -->
        <div class="box-footer">
            <code>.box-footer</code>
        </div><!-- /.box-footer-->
    </div><!-- /.box -->
</div>

</div> <!--Fin de la fila -->

<div class="row">
    <div class="col-md-8">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">Pagar</h3>
                <div class="box-tools pull-right">
                    <div class="label bg-aqua">Pagar</div>
                </div>
            </div>
            <div class="box-body">
                <?php
                echo $this->Form->create('Bet', array(
                    "action" => "pagar",
                    'inputDefaults' => array(
                        'div' => array(
                            "class" => "form-group"
                        ),
                        "class" => "form-control"
                    )
                ));
                ?>
                <div class="row">
                    <div class="col-xs-6">
                        <label>Codigo</label>
                        <input type="text" name="data[Bet][id2]" class="form-control" value="<?= $bet["id"] ?>" disabled>
                        <input type="text" name="data[Bet][id]" class="form-control" value="<?= $bet["id"] ?>" style="display: none">
                    </div>
                    <div class="col-xs-6">
                        <label>Apostado</label>
                        <input type="text" class="form-control" value="<?= $bet["apostado"] ?>" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <label>Ganancia Inicial</label>
                        <input type="text" class="form-control" value="<?= $bet["ganancia"] ?>" disabled>
                    </div>
                    <?php
                    echo $this->Form->input('ganancia', array(
                        "label" => "Ganancia Final",
                        "value" => $total,
                        'div' => array(
                            "class" => "col-xs-6"
                        )
                    ));
                    ?>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <label>Clave</label>
                        <input type="text" class="form-control" value=""  id="BetClave">
                    </div>
                </div>
                <?php
                    if($this->Session->read("Group.name")=="Administrador" || $gano){
                ?>
                <div class="box-footer">
                    <?php
                    echo $this->Form->end(array(
                        "class" => "btn btn-primary",
                        "div" => false,
                        "label" => "Pagar"
                    ));
                    ?>
                </div>
                    <?php } ?>
                
            </div>
            <div class = "box-footer">
                <code>.Estado</code>
            </div>
        </div>
    </div>

</div>
<?php
$this->start('scripts');
?>
<script>
    $(document).ready(function()
    {
       $("#BetPagarForm").submit(function()
       {
           var clave=$("#BetClave").val();
           var aux='<?=$clave?>';
           console.log("clave: "+clave);
           console.log("aux: "+aux);
           if(clave===aux)
           {
               console.log("entre if");
               return true;
           }else
           {
               console.log("entre else");
               alert("Clave no valida");
               return false;
           }
           
       }); 
    });
</script>

<?php
$this->end();
?>


