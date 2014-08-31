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
                        <th style="width: 191px;" colspan="1" rowspan="1" class="sorting">Local</th>
                        <th style="width: 177px;" colspan="1" rowspan="1" class="sorting">Visitante</th>
                        <th style="width: 119px;" colspan="1" rowspan="1" class="sorting">Fecha</th>
                        <th style="width: 85px;" colspan="1" rowspan="1" >Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    <?php 
                    $cant=0;
                        foreach ($games as $game): 
                            if($cant%2==0)
                                $class="gradeA odd";
                            else
                                $class="gradeA even";
                            $cant++;
                    ?>
                        
                    
                    <tr class="<?=$class?>">
                        <td class=" sorting_1"><?= $game['Game']['id']?></td>
                        <td><?= $game['Game']['local']?></td>
                        <td><?= $game['Game']['visitante']?></td>
                        <td class="center"><?= $game['Game']['fecha_juego']?></td>
                        <td class="center">
                             <?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $game['Game']['id'])); ?>
                            <?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $game['Game']['id']), array(), __('Esta seguro que desea elliminar el Juego con codigo # %s?', $game['Game']['id'])); ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
            </table>
        </div>
    </div>
</div>
