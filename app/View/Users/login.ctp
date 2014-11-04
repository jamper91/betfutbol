<?php 
//echo $this->Form->create('User', array(
//    'action' => 'login',
//    'class' => 'mws-form'
//));
?>

<!--<div class="mws-form-row">
    <div class="mws-form-item large">
        <input type="text" class="mws-login-username mws-textinput" placeholder="username" name="data[User][username]" />
    </div>
</div>
<div class="mws-form-row">
    <div class="mws-form-item large">
        <input type="password" class="mws-login-password mws-textinput" placeholder="password" name="data[User][password]" />
    </div>
</div>
<div class="mws-form-row">
    <input type="submit" value="Login" class="mws-button green mws-login-button" />
</div>
</form>-->

<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>AdminLTE | Log in</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?=$this->webroot?>css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="bg-black">

        <div class="form-box" id="login-box">
            <div class="header">Ingresar</div>
            <?=$this->Form->create('User')?>
                <div class="body bg-gray">
                    <div class="form-group">
                        <input type="text" name="data[User][username]" class="form-control" placeholder="Nombre de Usuario"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="data[User][password]" class="form-control" placeholder="Contraseña" />
                    </div>          
                </div>
                <div class="footer">                                                               
                    <button type="submit" class="btn bg-olive btn-block">Ingresar</button>  

                </div>
            </form>

<!--            <div class="margin text-center">
                <span>Sign in using social networks</span>
                <br/>
                <button class="btn bg-light-blue btn-circle"><i class="fa fa-facebook"></i></button>
                <button class="btn bg-aqua btn-circle"><i class="fa fa-twitter"></i></button>
                <button class="btn bg-red btn-circle"><i class="fa fa-google-plus"></i></button>

            </div>-->
        </div>

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>

    </body>
</html>