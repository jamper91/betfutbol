<div class="rows index">
	<h2><?php echo __('Rows'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('bet_id'); ?></th>
			<th><?php echo $this->Paginator->sort('game_id'); ?></th>
			<th><?php echo $this->Paginator->sort('tipo'); ?></th>
			<th><?php echo $this->Paginator->sort('localia'); ?></th>
			<th><?php echo $this->Paginator->sort('equipo'); ?></th>
			<th><?php echo $this->Paginator->sort('logro'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($rows as $row): ?>
	<tr>
		<td><?php echo h($row['Row']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($row['Bet']['id'], array('controller' => 'bets', 'action' => 'view', $row['Bet']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($row['Game']['id'], array('controller' => 'games', 'action' => 'view', $row['Game']['id'])); ?>
		</td>
		<td><?php echo h($row['Row']['tipo']); ?>&nbsp;</td>
		<td><?php echo h($row['Row']['localia']); ?>&nbsp;</td>
		<td><?php echo h($row['Row']['equipo']); ?>&nbsp;</td>
		<td><?php echo h($row['Row']['logro']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $row['Row']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $row['Row']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $row['Row']['id']), array(), __('Are you sure you want to delete # %s?', $row['Row']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Row'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Bets'), array('controller' => 'bets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bet'), array('controller' => 'bets', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Games'), array('controller' => 'games', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Game'), array('controller' => 'games', 'action' => 'add')); ?> </li>
	</ul>
</div>
