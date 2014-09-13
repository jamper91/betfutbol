<div class="ligas view">
<h2><?php echo __('Liga'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($liga['Liga']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($liga['Liga']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Deporte'); ?></dt>
		<dd>
			<?php echo $this->Html->link($liga['Deporte']['name'], array('controller' => 'deportes', 'action' => 'view', $liga['Deporte']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Liga'), array('action' => 'edit', $liga['Liga']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Liga'), array('action' => 'delete', $liga['Liga']['id']), array(), __('Are you sure you want to delete # %s?', $liga['Liga']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Ligas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Liga'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Deportes'), array('controller' => 'deportes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Deporte'), array('controller' => 'deportes', 'action' => 'add')); ?> </li>
	</ul>
</div>
