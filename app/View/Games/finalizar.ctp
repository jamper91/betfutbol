<?php // echo $this->Form->create('Game'); ?>
<!--<table>
    <tr>
        <td> <?php echo $game['Game']['local']; ?></td>
        <td> <?php echo $game['Game']['visitante']; ?></td>
    </tr>
    <tr>
        <td><?= $this->Form->input('goles_local');?></td>
        <td> <?= $this->Form->input('goles_visitante');?></td>
    </tr>
    
</table>-->



<?php // echo $this->Form->end(__('Submit')); ?>

<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span class="mws-i-24 i-pencil">Finalizar Juego</span>
    </div>
    <div class="mws-panel-body">

        <?php
        echo $this->Form->create('Game', array(
            "Class" => "mws-form"
        ));
        ?>
        <input style="display: none" value="<?php echo $game['Game']['id']; ?>" name="data[Game][id]" />
        <input style="display: none" value="1" name="data[Game][finalizado]" />
        <div class="mws-form-inline">
            <div class="mws-form-row">
            
            <div class="mws-panel grid_8">
                <div class="mws-panel-header">
                    <span class="mws-i-24 i-pencil">Marcador</span>
                </div>
                <div class="mws-panel-body">
                    <div class="mws-form-inline">
                        <div class="mws-form-row">
                            <label><?php echo $game['Game']['local']; ?></label>
                            <input style="display: none" value="<?php echo $game['Game']['local']; ?>" name="data[Game][local]" />
                            <?php
                                echo $this->Form->input('goles_local', array(
                                    "div" => array(
                                        "class" => "mws-form-item large"
                                    ),
                                    "class" => "mws-textinput",
                                    "label" => ""
                                ));
                                ?>
                        </div>
                        <div class="mws-form-row">
                            <label><?php echo $game['Game']['visitante']; ?></label>
                            <input style="display: none" value="<?php echo $game['Game']['visitante']; ?>" name="data[Game][visitante]" />
                            <?php
                                echo $this->Form->input('goles_visitante', array(
                                    "div" => array(
                                        "class" => "mws-form-item large"
                                    ),
                                    "class" => "mws-textinput",
                                    "label" => ""
                                ));
                                ?>
                        </div>
                    </div>
                </div>    	
            </div>

                </div>
        </div>
        <div class="mws-button-row">
            <input class="mws-button green" type="submit" value="Finalizar">
        </div>
        </form>
    </div>
</div>
