<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span class="mws-i-24 i-table-1">Ventas</span>
    </div>
    <div class="mws-panel-body">
        <table class="mws-table" id="partidos" style="font-size: 18px">
            <thead>
                <tr>
                    <th>Usuario</th>
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
                            <?= $dato["User"]["username"] ?>
                        </td>
                        <td> 
                            <?= $this->Html->link("Ventas Diarias", array("controller"=>"bets","action"=>"getVentasByCajero",$dato["User"]["id"]))?>
                            <?= $this->Html->link("Resumen Mensual", array("controller"=>"bets","action"=>"detallesMensualesByCajero",$dato["User"]["id"]))?>
                        </td>
                        
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>