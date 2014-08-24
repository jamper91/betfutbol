<div class="rows form">
<?php echo $this->Form->create('Row'); ?>
	<fieldset>
		<legend><?php echo __('Edit Row'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('bet_id');
		echo $this->Form->input('game_id');
		echo $this->Form->input('tipo');
		echo $this->Form->input('localia');
		echo $this->Form->input('equipo');
		echo $this->Form->input('logro');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Row.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Row.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Rows'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Bets'), array('controller' => 'bets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bet'), array('controller' => 'bets', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Games'), array('controller' => 'games', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Game'), array('controller' => 'games', 'action' => 'add')); ?> </li>
	</ul>
</div>
