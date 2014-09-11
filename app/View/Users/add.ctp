<!--<div class="users form">

        <fieldset>
                <legend><?php echo __('Add User'); ?></legend>
<?php
echo $this->Form->input('username');
echo $this->Form->input('password');
echo $this->Form->input('group_id');
?>
        </fieldset>

</div>
<?php echo $this->Form->create('User'); ?>
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span class="mws-i-24 i-pencil">Crear Juego</span>
    </div>
    <div class="mws-panel-body">

        <div class="mws-form-inline">
            <div class="mws-form-row">
                <div class="mws-panel grid_4">
                    <div class="mws-panel-header">
                        <span class="mws-i-24 i-pencil">Informacion del Juego</span>
                    </div>
                    <div class="mws-panel-body">
                        <div class="mws-form-inline">
                            <div class="mws-form-row">
                                <label>Nombre Usuario</label>

                            </div>
                            <div class="mws-form-row">
                                <label>Contraseña</label>

                            </div>

                        </div>
                    </div>    	
                </div>
            </div>
        </div>
        <div class="mws-button-row">
            <input class="mws-button red" type="submit" value="Crear">
        </div>
        </form>
    </div>
</div>-->


<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span class="mws-i-24 i-list">Crear Cajero</span>
    </div>
    <div class="mws-panel-body">
        <?php
        echo $this->Form->create('User', array(
            "Class" => "mws-form"
        ));
        ?>
        <div class="mws-form-inline">
            <div class="mws-form-row">
                <label>Username</label>
                <?php
                echo $this->Form->input('username', array(
                    "div" => array(
                        "class" => "mws-form-item large"
                    ),
                    "class" => "mws-textinput",
                    "label" => ""
                ));
                ?>
            </div>
            <div class="mws-form-row">
                <label>Clave</label>
                <?php
                echo $this->Form->input('password', array(
                    "div" => array(
                        "class" => "mws-form-item large"
                    ),
                    "class" => "mws-textinput",
                    "label" => ""
                ));
                ?>
            </div>
            <?php
            echo $this->Form->input('group_id', array(
                "style" => array(
                    "display:none"
                ),
                "label" => "",
                "selected" => "3"
            ));
            ?>
        </div>
        <div class="mws-button-row">
            <input type="submit" value="Submit" class="mws-button green" value="Crear Usuario" />
        </div>
        </form>
    </div>    	
</div>
