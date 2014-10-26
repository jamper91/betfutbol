<!--<div class="mws-panel grid_3">
    <div class="mws-panel-header">
        <span class="mws-i-24 i-books-2">Detalles Diarios</span>
    </div>
    <div class="mws-panel-body">
        <ul class="mws-summary">
            <li>
                <span><?=$totalVentas?></span> Cantidad Ventas
            </li>
            <li>
                <span><?=$ventasPagadas?></span> Apuestas Pagadas
            </li>
            <li>
                <span><?=number_format($ingresos)?></span> Ingresos
            </li>
            <li>
                <span><?=number_format($salidas)?></span> Salidas
            </li>
            <li>
                <span><?=number_format($ingresos-$salidas)?></span> Total
            </li>
            
        </ul>
    </div>
</div>-->

<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span class="mws-i-24 i-table-1">Ventas</span>
    </div>
    <div class="mws-panel-body">
        <table class="mws-table" id="partidos" style="font-size: 18px">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Cantidad Apuestas Creadas</th>
                    <th>Dinero recaudado</th>
                    <th>Opciones</th>
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
                            <?= $dato["Bet"]["cantidad"] ?>
                        </td>
                        <td> 
                            <?= number_format($dato["Bet"]["ingresos"]) ?>
                        </td>
                        <td> 
                            
                            <a href="<?=$this->Html->url("detallesDiariosByCajero")?>/<?=$cajeroId?>/<?=$dato["Bet"]["fecha"]?>">Detalles</a>
                        </td>
                        
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>