<div class="bets form">
<?php echo $this->Form->create('Bet'); ?>
	<fieldset>
		<legend><?php echo __('Edit Bet'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('apostado');
		echo $this->Form->input('ganancia');
		echo $this->Form->input('pagado');
		echo $this->Form->input('fecha_pagado');
		echo $this->Form->input('valido');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Bet.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Bet.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Bets'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Rows'), array('controller' => 'rows', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Row'), array('controller' => 'rows', 'action' => 'add')); ?> </li>
	</ul>
</div>
