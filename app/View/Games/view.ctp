<div class="games view">
<h2><?php echo __('Game'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($game['Game']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Local'); ?></dt>
		<dd>
			<?php echo h($game['Game']['local']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Visitante'); ?></dt>
		<dd>
			<?php echo h($game['Game']['visitante']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Logro Mline Local'); ?></dt>
		<dd>
			<?php echo h($game['Game']['logro_mline_local']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Logro Mline Visitante'); ?></dt>
		<dd>
			<?php echo h($game['Game']['logro_mline_visitante']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Logro Mline Empate'); ?></dt>
		<dd>
			<?php echo h($game['Game']['logro_mline_empate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Logro Rline Local'); ?></dt>
		<dd>
			<?php echo h($game['Game']['logro_rline_local']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Logro Visitante'); ?></dt>
		<dd>
			<?php echo h($game['Game']['logro_visitante']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Logro Empate'); ?></dt>
		<dd>
			<?php echo h($game['Game']['logro_empate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Altas'); ?></dt>
		<dd>
			<?php echo h($game['Game']['altas']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bajas'); ?></dt>
		<dd>
			<?php echo h($game['Game']['bajas']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Goles Rline Local'); ?></dt>
		<dd>
			<?php echo h($game['Game']['goles_rline_local']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Goles Rline Visitante'); ?></dt>
		<dd>
			<?php echo h($game['Game']['goles_rline_visitante']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Goles Alta'); ?></dt>
		<dd>
			<?php echo h($game['Game']['goles_alta']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Goles Baja'); ?></dt>
		<dd>
			<?php echo h($game['Game']['goles_baja']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Juego'); ?></dt>
		<dd>
			<?php echo h($game['Game']['fecha_juego']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Goles Local'); ?></dt>
		<dd>
			<?php echo h($game['Game']['goles_local']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Goles Visitante'); ?></dt>
		<dd>
			<?php echo h($game['Game']['goles_visitante']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Game'), array('action' => 'edit', $game['Game']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Game'), array('action' => 'delete', $game['Game']['id']), array(), __('Are you sure you want to delete # %s?', $game['Game']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Games'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Game'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Rows'), array('controller' => 'rows', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Row'), array('controller' => 'rows', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Rows'); ?></h3>
	<?php if (!empty($game['Row'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Bet Id'); ?></th>
		<th><?php echo __('Game Id'); ?></th>
		<th><?php echo __('Tipo'); ?></th>
		<th><?php echo __('Localia'); ?></th>
		<th><?php echo __('Equipo'); ?></th>
		<th><?php echo __('Logro'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($game['Row'] as $row): ?>
		<tr>
			<td><?php echo $row['id']; ?></td>
			<td><?php echo $row['bet_id']; ?></td>
			<td><?php echo $row['game_id']; ?></td>
			<td><?php echo $row['tipo']; ?></td>
			<td><?php echo $row['localia']; ?></td>
			<td><?php echo $row['equipo']; ?></td>
			<td><?php echo $row['logro']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'rows', 'action' => 'view', $row['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'rows', 'action' => 'edit', $row['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'rows', 'action' => 'delete', $row['id']), array(), __('Are you sure you want to delete # %s?', $row['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Row'), array('controller' => 'rows', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
