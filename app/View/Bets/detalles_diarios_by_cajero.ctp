<?php

$acumulado=0;
?>
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span class="mws-i-24 i-table-1">Ventas</span>
    </div>
    <div class="mws-panel-body">
        <table class="mws-table" id="partidos">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Tiquete</th>
                    <th>Apostado</th>
                    <th>Pagado</th>
                    <th>Fecha de Pago</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($datos as $i=>$dato): ?>
                    <?php if($i%2==0){ ?>
                    <tr class="gradeA even"  habilitado="true">
                    <?php  }else{ ?>
                    <tr class="gradeA odd"  habilitado="true">
                    <?php } ?>
                        <td> 
                            <?= $dato["Bet"]["fecha"] ?>
                        </td>
                        <td> 
                            <?= $dato["Bet"]["id"] ?>
                        </td>
                        <td> 
                            <?= $dato["Bet"]["apostado"] ?>
                        </td>
                        <td> 
                            <?php
                                if($dato["Bet"]["pagado"]==1)
                                {
                                    echo number_format($dato["Bet"]["ganancia"]);
                                }else{
                                    echo "0";
                                }
                            ?>
                        </td>
                        <td> 
                            <?= $dato["Bet"]["fecha_pagado"] ?>
                        </td>
                        <td> 
                            
                            <?=$this->Html->link(__('Estado'), array("controller"=>"rows",'action' => 'estado', $dato['Bet']['id']))?>
                        </td>
                        
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>