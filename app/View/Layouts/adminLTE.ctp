<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>AdminLTE | Dashboard</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="http://code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <?php
        echo $this->fetch('css');
        ?>

        <!-- Morris chart -->
        <!--<link href="<?= $this->webroot ?>css/morris/morris.css" rel="stylesheet" type="text/css" />-->
        <!-- jvectormap -->
        <!--<link href="<?= $this->webroot ?>css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />-->
        <!-- Date Picker -->
        <!--<link href="<?= $this->webroot ?>css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />-->
        <!-- Daterange picker -->
        <!--<link href="<?= $this->webroot ?>css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />-->
        <!-- bootstrap wysihtml5 - text editor -->
        <!--<link href="<?= $this->webroot ?>css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />-->
        <!-- Theme style -->
        <link href="<?= $this->webroot ?>css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.<?= $this->webroot ?>js/1.3.0/respond.min.js"></script>
        <![endif]-->


    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="#" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                Sportium
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?= $this->Session->read("User.username") ?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="<?= $this->webroot ?>img/avatar5.png" class="img-circle" alt="User Image" />
                                    <p>
                                        <?= $this->Session->read("User.username") ?> - <?= $this->Session->read("Group.name") ?>
<!--                                        <small>Member since Nov. 2012</small>-->
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="<?= $this->Html->url(array("controller" => "users", "action" => "edit", $this->Session->read("User.id"))) ?>" class="btn btn-default btn-flat">Perfil</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?= $this->Html->url(array("controller" => "users", "action" => "logout")) ?>" class="btn btn-default btn-flat">Salir</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?= $this->webroot ?>img/avatar5.png" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Hola, <?= $this->Session->read("User.username") ?></p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Buscar..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="active">
                            <a href="#">
                                <i class="fa fa-dashboard"></i> <span>Inicio</span>
                            </a>
                        </li>
                        <?php if ($this->Session->read('User.group_id') == 2) { ?>
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-bar-chart-o"></i>
                                    <span>Ventas</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="<?= $this->Html->url(array("controller" => "users", "action" => "listarCajeros")) ?>">Por Cajero</a></li>
                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-globe"></i>
                                    <span>Partidos</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="<?= $this->Html->url(array("controller" => "deportes", "action" => "add")) ?>" >Crear Deporte</a></li>
                                    <li><a href="<?= $this->Html->url(array("controller" => "ligas", "action" => "add")) ?>" >Crear Liga</a></li>
                                    <li><a href="<?= $this->Html->url(array("controller" => "games", "action" => "add")) ?>" >Crear Partido</a></li>
                                    <li><a href="<?= $this->Html->url(array("controller" => "games", "action" => "index")) ?>">Editar Partido</a></li>
                                    <li><a href="<?= $this->Html->url(array("controller" => "games", "action" => "encurso")) ?>" >Finalizar Partido</a></li>
                                    <li><a href="<?= $this->Html->url(array("controller" => "games", "action" => "cambiarResultado")) ?>" >Cambiar Resultado</a></li>
                                    <li><a href="<?= $this->Html->url(array("controller" => "bets", "action" => "cancelarbet")) ?>">Cancelar Apuesta</a></li>

                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-user"></i>
                                    <span>Usuarios</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="<?= $this->Html->url(array("controller" => "users", "action" => "add")) ?>">Crear Cajero</a></li>
                                    <li><a href="<?= $this->Html->url(array("controller" => "users", "action" => "index")) ?>">Editar Usuarios</a></li>
                                </ul>
                            </li>
                        <?php } ?>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-credit-card"></i>
                                <span>Apuestas</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a href="<?= $this->Html->url(array("controller" => "games", "action" => "listar")) ?>">Crear Apuesta</a>
                                    <a href="<?= $this->Html->url(array("controller" => "bets", "action" => "estado")) ?>">Pagar Apuesta</a>
                                    <!--<a href="<?= $this->Html->url(array("controller" => "bets", "action" => "pagados")) ?>">Apuestas Pagadas</a>-->
                                    <a href="<?= $this->Html->url(array("controller" => "bets", "action" => "getVentasByUser")) ?>">Ventas del Dia</a>
                                    <a href="<?= $this->Html->url(array("controller" => "bets", "action" => "detallesMensualesByCajero")) ?>">Ventas del Mes</a>

                                </li>
                            </ul>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Inicio
                    </h1>
                    
                </section>

                <!-- Main content -->
                <section class="content">

                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <?php echo $this->Session->flash(); ?>
                    </div><!-- /.row -->
                    <div class="row">
                        <?php echo $this->fetch('content'); ?>
                    </div>

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->


        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="http://code.jquery.com/ui/1.11.1/jquery-ui.min.js" type="text/javascript"></script>
        <?= $this->Html->script("comun") ?>
        <!-- Morris.js charts -->
        <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="<?= $this->webroot ?>js/plugins/morris/morris.min.js" type="text/javascript"></script>


        <!-- AdminLTE App -->
        <script src="<?= $this->webroot ?>js/AdminLTE/app.js" type="text/javascript"></script>

        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <!--<script src="<?= $this->webroot ?>js/AdminLTE/dashboard.js" type="text/javascript"></script>-->

        <!-- AdminLTE for demo purposes -->
        <!--<script src="<?= $this->webroot ?>js/AdminLTE/demo.js" type="text/javascript"></script>-->
        <?php
        echo $this->fetch('scripts');
        ?>
    </body>
</html>
