
<div class="col-xs-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">
                Apuestas
            </h3>
        </div>
        <div class="box-body table-responsive">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Ticket</th>
                        <th>Pagado</th>
                        <th>Fecha Creacion</th>
                        <th>Fecha Pago</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($datos as $dato): ?>
                        <tr >
                            <td><?= $dato['Bet']['id'] ?></td>
                            <td>$<?= number_format($dato['Bet']['ganancia']) ?></td>
                            <td><?= $dato['Bet']['fecha'] ?></td>
                            <td><?= $dato['Bet']['fecha_pago'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
$this->start('scripts');
echo $this->Html->css(array("datatables/dataTables.bootstrap"));
echo $this->Html->script(array("plugins/datatables/jquery.dataTables", "plugins/datatables/dataTables.bootstrap"));
?>
<script>
    $(function() {
        $("#example1").dataTable();
    });
</script>
<?php
$this->end();
?>


<!--


<table style="width:100%;">
<thead>
	<th style="text-align:center">
		Tiquete
	</th>
	<th style="text-align:center">
		Pagado
	</th>
	<th style="text-align:center">
		Fecha Creacion
	</th>
	<th style="text-align:center">
		Fecha Pagado
	</th>
</thead>
<?php foreach ($datos as $dato): ?>
		<tr>
			<td>
				<?=$dato["Bet"]["id"]?>
			</td>
			<td style="text-align:right;">
				$<?=number_format($dato["Bet"]["ganancia"])?>
			</td>
			<td style="text-align:right;">
				$<?=$dato["Bet"]["fecha"]?>
			</td>
			<td style="text-align:right;">
				$<?=$dato["Bet"]["fecha_pago"]?>
			</td>
		</tr>
<?php endforeach ?>

-->
