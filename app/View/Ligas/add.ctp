<div class="ligas form">
<?php echo $this->Form->create('Liga'); ?>
	<fieldset>
		<legend><?php echo __('Add Liga'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('deporte_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Ligas'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Deportes'), array('controller' => 'deportes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Deporte'), array('controller' => 'deportes', 'action' => 'add')); ?> </li>
	</ul>
</div>
