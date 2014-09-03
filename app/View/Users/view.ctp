<div class="users view">
<h2><?php echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Group'); ?></dt>
		<dd>
			<?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), array(), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Groups'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bets'), array('controller' => 'bets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bet'), array('controller' => 'bets', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Bets'); ?></h3>
	<?php if (!empty($user['Bet'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Apostado'); ?></th>
		<th><?php echo __('Ganancia'); ?></th>
		<th><?php echo __('Pagado'); ?></th>
		<th><?php echo __('Fecha Pagado'); ?></th>
		<th><?php echo __('Valido'); ?></th>
		<th><?php echo __('Texto'); ?></th>
		<th><?php echo __('Estado'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Bet'] as $bet): ?>
		<tr>
			<td><?php echo $bet['id']; ?></td>
			<td><?php echo $bet['user_id']; ?></td>
			<td><?php echo $bet['apostado']; ?></td>
			<td><?php echo $bet['ganancia']; ?></td>
			<td><?php echo $bet['pagado']; ?></td>
			<td><?php echo $bet['fecha_pagado']; ?></td>
			<td><?php echo $bet['valido']; ?></td>
			<td><?php echo $bet['texto']; ?></td>
			<td><?php echo $bet['estado']; ?></td>
			<td><?php echo $bet['created']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'bets', 'action' => 'view', $bet['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'bets', 'action' => 'edit', $bet['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'bets', 'action' => 'delete', $bet['id']), array(), __('Are you sure you want to delete # %s?', $bet['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Bet'), array('controller' => 'bets', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
