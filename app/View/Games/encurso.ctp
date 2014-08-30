<table>
    <tr>
        <td> Local</td>
        <td> Visitante</td>
        <td> Acciones</td>
    </tr>
    <?php foreach ($games as $game): ?>
    <tr>
        <td><?php echo h($game['Game']['local']); ?>&nbsp;</td>
        <td><?php echo h($game['Game']['visitante']); ?>&nbsp;</td>
        <td><?= $this->Html->link("Finalizar",array("action"=>"finalizar",$game['Game']['id']))?></td>
    </tr>
    <?php endforeach; ?>
    
</table>