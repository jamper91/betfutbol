<div class="games index">
	<h2><?php echo __('Games'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('local'); ?></th>
			<th><?php echo $this->Paginator->sort('visitante'); ?></th>
			<th><?php echo $this->Paginator->sort('logro_mline_local'); ?></th>
			<th><?php echo $this->Paginator->sort('logro_mline_visitante'); ?></th>
			<th><?php echo $this->Paginator->sort('logro_mline_empate'); ?></th>
			<th><?php echo $this->Paginator->sort('logro_rline_local'); ?></th>
			<th><?php echo $this->Paginator->sort('logro_visitante'); ?></th>
			<th><?php echo $this->Paginator->sort('logro_empate'); ?></th>
			<th><?php echo $this->Paginator->sort('altas'); ?></th>
			<th><?php echo $this->Paginator->sort('bajas'); ?></th>
			<th><?php echo $this->Paginator->sort('goles_rline_local'); ?></th>
			<th><?php echo $this->Paginator->sort('goles_rline_visitante'); ?></th>
			<th><?php echo $this->Paginator->sort('goles_alta'); ?></th>
			<th><?php echo $this->Paginator->sort('goles_baja'); ?></th>
			<th><?php echo $this->Paginator->sort('fecha_juego'); ?></th>
			<th><?php echo $this->Paginator->sort('goles_local'); ?></th>
			<th><?php echo $this->Paginator->sort('goles_visitante'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($games as $game): ?>
	<tr>
		<td><?php echo h($game['Game']['id']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['local']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['visitante']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['logro_mline_local']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['logro_mline_visitante']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['logro_mline_empate']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['logro_rline_local']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['logro_visitante']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['logro_empate']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['altas']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['bajas']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['goles_rline_local']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['goles_rline_visitante']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['goles_alta']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['goles_baja']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['fecha_juego']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['goles_local']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['goles_visitante']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $game['Game']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $game['Game']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $game['Game']['id']), array(), __('Are you sure you want to delete # %s?', $game['Game']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Game'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Rows'), array('controller' => 'rows', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Row'), array('controller' => 'rows', 'action' => 'add')); ?> </li>
	</ul>
</div>
