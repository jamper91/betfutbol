<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span class="mws-i-24 i-table-1">Partidos</span>
    </div>
    <div class="mws-panel-body">
        <div class="dataTables_wrapper">

            <table class="mws-datatable mws-table">
                <thead>
                    <tr>
                        <th style="width: 140px;" colspan="1" rowspan="1" class="sorting_asc">Codigo</th>
                        <th style="width: 191px;" colspan="1" rowspan="1" class="sorting">Apostado</th>
                        <th style="width: 177px;" colspan="1" rowspan="1" class="sorting">Ganancia</th>
                        <th style="width: 119px;" colspan="1" rowspan="1" class="sorting">Estado</th>
                        <th style="width: 85px;" colspan="1" rowspan="1" >Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    <?php 
                    $cant=0;
                        foreach ($bets as $bet): 
                            if($cant%2==0)
                                $class="gradeA odd";
                            else
                                $class="gradeA even";
                            $cant++;
                    ?>
                        
                    
                    <tr class="<?=$class?>">
                        <td class=" sorting_1"><?= $bet['Bet']['id']?></td>
                        <td><?= $bet['Bet']['apostado']?></td>
                        <td><?= $bet['Bet']['ganancia']?></td>
                        <td class="center"><?= $bet['Bet']['estado']?></td>
                        <td class="center">
                             <?php 
                             if($bet['Bet']['estado']=="Ganador")
                                echo $this->Html->link(__('Pagar'), array("controller"=>"rows",'action' => 'estado', $bet['Bet']['id'])); 
                             ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
            </table>
        </div>
    </div>
</div>
