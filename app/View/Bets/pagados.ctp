
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


