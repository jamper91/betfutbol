<div class="ligas form">
<?php echo $this->Form->create('Liga'); ?>
	<fieldset>
		<legend><?php echo __('Edit Liga'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('deporte_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Liga.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Liga.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Ligas'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Deportes'), array('controller' => 'deportes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Deporte'), array('controller' => 'deportes', 'action' => 'add')); ?> </li>
	</ul>
</div>
