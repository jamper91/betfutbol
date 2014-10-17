<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
$cakeDescription = __d('cake_dev', 'BetFutbol: Apuestas en linea');
$cakeVersion = __d('cake_dev', 'BetFutbol %s', "1.0")
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php echo $this->Html->charset(); ?>
        <title>
            <?php echo $cakeDescription ?>:
            <?php echo $title_for_layout; ?>
        </title>
        <?php
        echo $this->Html->meta('icon');
        //<!-- Required Stylesheets -->
        echo $this->Html->css(array('reset', 'text', 'fonts/ptsans/stylesheet', 'fluid', 'mws.style', 'icons/icons'));
        //<!-- Demo and Plugin Stylesheets -->
        echo $this->Html->css(array('demo', '/plugins/colorpicker/colorpicker', '/plugins/jimgareaselect/css/imgareaselect-default', '/plugins/fullcalendar/fullcalendar', '/plugins/fullcalendar/fullcalendar.print', '/plugins/tipsy/tipsy', '/plugins/sourcerer/Sourcerer-1.2', '/plugins/jgrowl/jquery.jgrowl', 'plugins/spinner/spinner', 'jui/jquery.ui'));
        //<!-- Theme Stylesheet -->
        echo $this->Html->css(array('mws.theme'));

        echo $this->Html->script(array('jquery-1.7.1.min', '/plugins/jimgareaselect/jquery.imgareaselect.min', '/plugins/jquery.dualListBox-1.3.min', '/plugins/jgrowl/jquery.jgrowl', '/plugins/jquery.filestyle', '/plugins/fullcalendar/fullcalendar.min', '/plugins/jquery.dataTables'));
        echo $this->Html->script(array('/plugins/flot/jquery.flot.min', '/plugins/flot/jquery.flot.pie.min', '/plugins/flot/jquery.flot.stack.min', '/plugins/flot/jquery.flot.resize.min', '/plugins/colorpicker/colorpicker', '/plugins/tipsy/jquery.tipsy', '/plugins/sourcerer/Sourcerer-1.2', '/plugins/jquery.placeholder', '/plugins/jquery.validate', '/plugins/jquery.mousewheel', '/plugins/spinner/ui.spinner'));
        echo $this->Html->script(array('jquery-ui', 'mws', 'demo', 'themer', 'demo.dashboard', 'jquery-ui-timepicker-addon', 'notify.min','comun'));


        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>
    </head>
    <body>
        <!-- Header Wrapper -->
        <div id="mws-header" class="clearfix">

            <!-- Logo Wrapper -->
            <div id="mws-logo-container">
                <div id="mws-logo-wrap">
                    <img src="images/mws-logo.png" alt="mws admin" />
                </div>
            </div>

            <!-- User Area Wrapper -->
            <div id="mws-user-tools" class="clearfix">


                <div id="mws-user-info" class="mws-inset">
                    <div id="mws-user-photo">
                        <img src="example/profile.jpg" alt="User Photo" />
                    </div>
                    <div id="mws-user-functions">
                        <div id="mws-username">
                            <?= $this->Session->read("User.username") ?>
                        </div>
                        <ul>
                            <li><a href="#">Perfil</a></li>
                            <li><a href="#">Cambiar Contraseña</a></li>
                            <li><a href="<?= $this->Html->url(array("controller" => "users", "action" => "logout")) ?>">Cerrar Sesion</a></li>
                        </ul>
                    </div>
                </div>
                <!-- End User Functions -->

            </div>
        </div>

        <!-- Main Wrapper -->
        <div id="mws-wrapper">
            <!-- Necessary markup, do not remove -->
            <div id="mws-sidebar-stitch"></div>
            <div id="mws-sidebar-bg"></div>

            <!-- Sidebar Wrapper -->
            <div id="mws-sidebar">

                <!-- Search Box -->
                <div id="mws-searchbox" class="mws-inset">
                    <form action="http://www.malijuwebshop.com/themes/mws-admin/dashboard.html">
                        <input type="text" class="mws-search-input" />
                        <input type="submit" class="mws-search-submit" />
                    </form>
                </div>

                <!-- Main Navigation -->
                <div id="mws-navigation">
                    <ul>
                        <li class="active"><a href="dashboard.html" class="mws-i-24 i-home">Inicio</a></li>
                        <?php if ($this->Session->read('User.group_id') == 2) { ?>
                            <li>
                                <a href="charts.html" class="mws-i-24 i-chart">Ventas</a>
                                <ul>
                                    <li><a href="">Generales</a></li>
                                    <li><a href="">Personalizadas</a></li>
                                    <li><a href="<?= $this->Html->url(array("controller" => "users", "action" => "listarCajeros")) ?>">Diarias por cajero</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="mws-i-24 i-day-calendar">Partidos</a>
                                <ul>
                                    <li><a href="<?= $this->Html->url(array("controller" => "deportes", "action" => "add")) ?>" >Crear Deporte</a></li>
                                    <li><a href="<?= $this->Html->url(array("controller" => "ligas", "action" => "add")) ?>" >Crear Liga</a></li>
                                    <li><a href="<?= $this->Html->url(array("controller" => "games", "action" => "add")) ?>" >Crear Partido</a></li>
                                    <li><a href="<?= $this->Html->url(array("controller" => "games", "action" => "index")) ?>">Editar Partido</a></li>
                                    <li><a href="<?= $this->Html->url(array("controller" => "games", "action" => "encurso")) ?>" >Finalizar Partido</a></li>
                                    <li><a href="<?= $this->Html->url(array("controller" => "bets", "action" => "cancelarbet")) ?>">Cancelar Apuesta</a></li>

                                </ul>
                            </li>
                            <li>
                                <a href="#" class="mws-i-24 i-list">Usuarios</a>
                                <ul>
                                    <li><a href="<?= $this->Html->url(array("controller" => "users", "action" => "add")) ?>">Crear Cajero</a></li>
                                    <li><a href="<?= $this->Html->url(array("controller" => "users", "action" => "index")) ?>">Editar Usuarios</a></li>
                                </ul>
                            </li>
                        <?php } ?>
                        <li>
                            <a href="#" class="mws-i-24 i-file-cabinet">Apuesta</a>
                            <ul>
                                <li>
                                    <a href="<?= $this->Html->url(array("controller" => "games", "action" => "listar")) ?>">Crear Apuesta</a>
                                    <a href="<?= $this->Html->url(array("controller" => "bets", "action" => "estado")) ?>">Pagar Apuesta</a>
                                    <a href="<?= $this->Html->url(array("controller" => "bets", "action" => "pagados")) ?>">Apuestas Pagadas</a>
                                    <a href="<?= $this->Html->url(array("controller" => "bets", "action" => "getVentasByUser")) ?>">Ventas del Dia</a>
                                    
                                </li>
                            </ul>
                        </li>
                        <!--<li><a href="table.html" class="mws-i-24 i-table-1">Table</a></li>-->

                        <!--                        <li><a href="typography.html" class="mws-i-24 i-text-styling">Apuesta</a></li>
                                                <li><a href="grids.html" class="mws-i-24 i-blocks-images">Grids &amp; Panels</a></li>
                                                <li><a href="gallery.html" class="mws-i-24 i-polaroids">Gallery</a></li>
                                                <li><a href="error.html" class="mws-i-24 i-alert-2">Error Page</a></li>
                                                <li>
                                                    <a href="icons.html" class="mws-i-24 i-pacman">
                                                        Icons <span class="mws-nav-tooltip">2000+</span>
                                                    </a>
                                                </li>-->
                    </ul>
                </div>
                <!-- End Navigation -->

            </div>


            <!-- Container Wrapper -->
            <div id="mws-container" class="clearfix">

                <!-- Main Container -->
                <div class="container">

                    <!--                    <div class="mws-report-container clearfix">
                    
                    
                                            <a class="mws-report" href="#">
                                                <span class="mws-report-icon mws-ic ic-bug"></span>
                                                <span class="mws-report-content">
                    
                                                    <span class="mws-report-title">Mensaje</span>
                                                    <span class="mws-report-value up">
                    <?php echo $this->Session->flash(); ?>
                                                    </span>
                                                </span>
                    
                                            </a>
                    
                                        </div>-->



                    <?php echo $this->fetch('content'); ?>
                    <!--                    <div class="mws-panel grid_8">
                                            <div class="mws-panel-header">
                                                <span class="mws-i-24 i-create">Headings</span>
                                            </div>
                                            <div class="mws-panel-body">
                                                <div class="mws-panel-content">
                    <?php echo $this->element('sql_dump'); ?>
                                                </div>
                                            </div>
                                        </div>-->
                </div>
                <!-- End Main Container -->

                <!-- Footer -->
                <div id="mws-footer">
                    Copyright Your Website 2012. All Rights Reserved.
                </div>
                <!-- End Footer -->

            </div>
            <!-- End Container Wrapper -->

        </div>
        <!-- End Main Wrapper -->

    </body>

</html>
