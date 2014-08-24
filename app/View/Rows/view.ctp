<div class="rows view">
<h2><?php echo __('Row'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($row['Row']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bet'); ?></dt>
		<dd>
			<?php echo $this->Html->link($row['Bet']['id'], array('controller' => 'bets', 'action' => 'view', $row['Bet']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Game'); ?></dt>
		<dd>
			<?php echo $this->Html->link($row['Game']['id'], array('controller' => 'games', 'action' => 'view', $row['Game']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo'); ?></dt>
		<dd>
			<?php echo h($row['Row']['tipo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Localia'); ?></dt>
		<dd>
			<?php echo h($row['Row']['localia']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Equipo'); ?></dt>
		<dd>
			<?php echo h($row['Row']['equipo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Logro'); ?></dt>
		<dd>
			<?php echo h($row['Row']['logro']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Row'), array('action' => 'edit', $row['Row']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Row'), array('action' => 'delete', $row['Row']['id']), array(), __('Are you sure you want to delete # %s?', $row['Row']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Rows'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Row'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bets'), array('controller' => 'bets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bet'), array('controller' => 'bets', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Games'), array('controller' => 'games', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Game'), array('controller' => 'games', 'action' => 'add')); ?> </li>
	</ul>
</div>
