<div class="bets view">
<h2><?php echo __('Bet'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($bet['Bet']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($bet['User']['id'], array('controller' => 'users', 'action' => 'view', $bet['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Apostado'); ?></dt>
		<dd>
			<?php echo h($bet['Bet']['apostado']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ganancia'); ?></dt>
		<dd>
			<?php echo h($bet['Bet']['ganancia']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($bet['Bet']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pagado'); ?></dt>
		<dd>
			<?php echo h($bet['Bet']['pagado']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Pagado'); ?></dt>
		<dd>
			<?php echo h($bet['Bet']['fecha_pagado']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valido'); ?></dt>
		<dd>
			<?php echo h($bet['Bet']['valido']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Bet'), array('action' => 'edit', $bet['Bet']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Bet'), array('action' => 'delete', $bet['Bet']['id']), array(), __('Are you sure you want to delete # %s?', $bet['Bet']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Bets'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bet'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Rows'), array('controller' => 'rows', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Row'), array('controller' => 'rows', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Rows'); ?></h3>
	<?php if (!empty($bet['Row'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Bet Id'); ?></th>
		<th><?php echo __('Game Id'); ?></th>
		<th><?php echo __('Tipo'); ?></th>
		<th><?php echo __('Localia'); ?></th>
		<th><?php echo __('Equipo'); ?></th>
		<th><?php echo __('Logro'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($bet['Row'] as $row): ?>
		<tr>
			<td><?php echo $row['id']; ?></td>
			<td><?php echo $row['bet_id']; ?></td>
			<td><?php echo $row['game_id']; ?></td>
			<td><?php echo $row['tipo']; ?></td>
			<td><?php echo $row['localia']; ?></td>
			<td><?php echo $row['equipo']; ?></td>
			<td><?php echo $row['logro']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'rows', 'action' => 'view', $row['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'rows', 'action' => 'edit', $row['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'rows', 'action' => 'delete', $row['id']), array(), __('Are you sure you want to delete # %s?', $row['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Row'), array('controller' => 'rows', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
