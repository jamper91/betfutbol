<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span class="mws-i-24 i-table-1">Ventas</span>
    </div>
    <div class="mws-panel-body">
        <table class="mws-table" id="partidos">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Cantidad Apuestas Creadas</th>
                    <th>Dinero recaudado</th>
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
                        
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>