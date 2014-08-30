<?php echo $this->Form->create('Game'); ?>
<table>
    <tr>
        <td> <?php echo $game['Game']['local']; ?></td>
        <td> <?php echo $game['Game']['visitante']; ?></td>
    </tr>
    <tr>
        <td><?= $this->Form->input('goles_local');?></td>
        <td> <?= $this->Form->input('goles_visitante');?></td>
    </tr>
    
</table>
<input style="display: none" value="1" name="data[Game][finalizado]" />
<input style="display: none" value="<?php echo $game['Game']['local']; ?>" name="data[Game][local]" />
<input style="display: none" value="<?php echo $game['Game']['visitante']; ?>" name="data[Game][visitante]" />
<input style="display: none" value="<?php echo $game['Game']['id']; ?>" name="data[Game][id]" />
<?php echo $this->Form->end(__('Submit')); ?>