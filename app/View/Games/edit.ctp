<div class="games form">
<?php echo $this->Form->create('Game'); ?>
	<fieldset>
		<legend><?php echo __('Edit Game'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('local');
		echo $this->Form->input('visitante');
		echo $this->Form->input('logro_mline_local');
		echo $this->Form->input('logro_mline_visitante');
		echo $this->Form->input('logro_mline_empate');
		echo $this->Form->input('logro_rline_local');
		echo $this->Form->input('logro_visitante');
		echo $this->Form->input('logro_empate');
		echo $this->Form->input('altas');
		echo $this->Form->input('bajas');
		echo $this->Form->input('goles_rline_local');
		echo $this->Form->input('goles_rline_visitante');
		echo $this->Form->input('goles_alta');
		echo $this->Form->input('goles_baja');
		echo $this->Form->input('fecha_juego');
		echo $this->Form->input('goles_local');
		echo $this->Form->input('goles_visitante');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Game.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Game.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Games'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Rows'), array('controller' => 'rows', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Row'), array('controller' => 'rows', 'action' => 'add')); ?> </li>
	</ul>
</div>
