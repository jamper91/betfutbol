<div class="deportes form">
<?php echo $this->Form->create('Deporte'); ?>
	<fieldset>
		<legend><?php echo __('Add Deporte'); ?></legend>
	<?php
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Deportes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Ligas'), array('controller' => 'ligas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Liga'), array('controller' => 'ligas', 'action' => 'add')); ?> </li>
	</ul>
</div>
