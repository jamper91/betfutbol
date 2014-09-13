<div class="deportes view">
<h2><?php echo __('Deporte'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($deporte['Deporte']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($deporte['Deporte']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Deporte'), array('action' => 'edit', $deporte['Deporte']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Deporte'), array('action' => 'delete', $deporte['Deporte']['id']), array(), __('Are you sure you want to delete # %s?', $deporte['Deporte']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Deportes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Deporte'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ligas'), array('controller' => 'ligas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Liga'), array('controller' => 'ligas', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Ligas'); ?></h3>
	<?php if (!empty($deporte['Liga'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Deporte Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($deporte['Liga'] as $liga): ?>
		<tr>
			<td><?php echo $liga['id']; ?></td>
			<td><?php echo $liga['name']; ?></td>
			<td><?php echo $liga['deporte_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'ligas', 'action' => 'view', $liga['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'ligas', 'action' => 'edit', $liga['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'ligas', 'action' => 'delete', $liga['id']), array(), __('Are you sure you want to delete # %s?', $liga['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Liga'), array('controller' => 'ligas', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
