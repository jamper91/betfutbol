<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <!-- Required Stylesheets -->
        <?php
        //<!-- Required Stylesheets -->
        echo $this->Html->css(array('reset', 'text', 'fonts/ptsans/stylesheet', 'fluid', 'mws.style', 'icons/icons'));
        //<!-- Demo and Plugin Stylesheets -->
        echo $this->Html->css(array('demo', '/plugins/colorpicker/colorpicker', '/plugins/jimgareaselect/css/imgareaselect-default', '/plugins/fullcalendar/fullcalendar', '/plugins/fullcalendar/fullcalendar.print', '/plugins/tipsy/tipsy', '/plugins/sourcerer/Sourcerer-1.2', '/plugins/jgrowl/jquery.jgrowl', 'plugins/spinner/spinner', 'jui/jquery.ui'));
        //<!-- Theme Stylesheet -->
        echo $this->Html->css(array('mws.theme'));

        echo $this->Html->script(array('jquery-1.7.1.min', '/plugins/jimgareaselect/jquery.imgareaselect.min', '/plugins/jquery.dualListBox-1.3.min', '/plugins/jgrowl/jquery.jgrowl', '/plugins/jquery.filestyle', '/plugins/fullcalendar/fullcalendar.min', '/plugins/jquery.dataTables'));
        echo $this->Html->script(array('/plugins/flot/jquery.flot.min', '/plugins/flot/jquery.flot.pie.min', '/plugins/flot/jquery.flot.stack.min', '/plugins/flot/jquery.flot.resize.min', '/plugins/colorpicker/colorpicker', '/plugins/tipsy/jquery.tipsy', '/plugins/sourcerer/Sourcerer-1.2', '/plugins/jquery.placeholder', '/plugins/jquery.validate', '/plugins/jquery.mousewheel', '/plugins/spinner/ui.spinner'));
        echo $this->Html->script(array('jquery-ui', 'mws', 'demo', 'themer', 'demo.dashboard', 'jquery-ui-timepicker-addon'));

        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>


        <script type="text/javascript" src="js/mws.js"></script>
        <script type="text/javascript" src="js/demo.js"></script>
        <script type="text/javascript" src="js/themer.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $("div#mws-login .mws-login-back").mouseover(function(event) {
                    $(this).find("a").animate({'left': 0})
                }).mouseout(function(event) {
                    $(this).find("a").animate({'left': 70})
                });
            });
        </script>

        <title>MWS Admin - Login Page</title>

    </head>

    <body>

        <div id="mws-login">
            <h1>Login</h1>
            <div class="mws-login-lock">
                <?= $this->Html->image("/css/icons/24/locked-2.png") ?>
                <!--<img src="css/icons/24/locked-2.png" alt="" />-->
            </div>
            <div id="mws-login-form">
                <?php echo $this->fetch('content'); ?>
            </div>
        </div>

    </body>
</html>
