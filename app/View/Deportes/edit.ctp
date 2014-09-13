<div class="deportes form">
<?php echo $this->Form->create('Deporte'); ?>
	<fieldset>
		<legend><?php echo __('Edit Deporte'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Deporte.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Deporte.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Deportes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Ligas'), array('controller' => 'ligas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Liga'), array('controller' => 'ligas', 'action' => 'add')); ?> </li>
	</ul>
</div>
