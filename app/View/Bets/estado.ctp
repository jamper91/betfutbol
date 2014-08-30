<table>
    <tr>
        <td>
            Codigo
        </td>
        <td>
            Apostado
        </td>
        <td>
            Ganancia
        </td>
        <td>
            Estado
        </td>
    </tr>
    <?php
    foreach ($bets as $bet) {
    ?>
    <tr>
        <td><?= $bet["Bet"]["id"]?></td>
        <td><?= $bet["Bet"]["apostado"]?></td>
        <td><?= $bet["Bet"]["ganancia"]?></td>
        <td><?= $bet["Bet"]["estado"]?></td>
    </tr>
        
    <?php
    }
    ?>

</table>