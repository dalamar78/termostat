<?php
/**
 * pagina: control de usuarios y sesion
 *
 * @autor Oscar Gonzalez <oskiyar78@gmail.com>
 * @package termostat
 * @version 0.1
 * @link  link a github
 * 
 */
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="bootstrap default admin template">
    <meta name="viewport" content="width=device-width">
    <title>Termostat | Login</title>
	<!-- Favicons -->
    <link rel="shortcut icon" href="../assets/favicon/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="../assets/favicon/apple-touch-icon.png" />
    <link rel="apple-touch-icon" sizes="57x57" href="../assets/favicon/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="../assets/favicon/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/favicon/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="../assets/favicon/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="../assets/favicon/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon" sizes="144x144" href=".../assets/favicon/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon" sizes="152x152" href="../assets/favicon/apple-touch-icon-152x152.png" />
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/favicon/apple-touch-icon-180x180.png" />
	
    <!-- START GLOBAL CSS -->
    <link rel="stylesheet" href="../assets/global/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../assets/icons_fonts/elegant_font/elegant.min.css"/>


    <link rel="stylesheet" href="../assets/pages/global/css/global.css" />
    <!-- END GLOBAL CSS -->

    <!-- START TEMPLATE GLOBAL CSS -->
    <link rel="stylesheet" href="../assets/global/css/components.min.css"/>
    <!-- END TEMPLATE GLOBAL CSS -->

    <!-- START LAYOUT CSS -->
    <link rel="stylesheet" href="../assets/layouts/layout-top-menu/css/layout.min.css"/>
    <link rel="stylesheet" href="../assets/pages/login/login-v1/css/login.css"/>
    <!-- END LAYOUT CSS -->
</head>
<body>
<div class="login-background">
    <!--  START LOGIN -->
    <div class="login-page">
        <div class="main-login-contain">
            <div class="login-circul text-xs-center">
                <i class="icon_lock_alt login-icon-circul"></i>
            </div>
            <div class="login-form">
				<form id = "loginform" name = "loginform" method="post" action="index.php">
                    <div class="login_input">
                        <input type="text" class="login-form-border" id='nombre' name='nombre' placeholder="Introduzca usuario">
                        <span class="login-right-icon"><i class="icon icon_mail"></i></span>
                    </div>
                    <div class="login_input">
                        <input type="password" class="login-form-border" id='password' name='password' placeholder="Password">
                        <span class="login-right-icon"><i class="icon icon_key"></i></span>
                    </div>
                    <div class="checkbox checkbox-login-v1">
                        <div class="checkbox-squared">
                            <input value="None" id="checkbox-squared1" name="check" type="checkbox">
                            <label for="checkbox-squared1"></label>
                            <span>Recordarme</span>
                        </div>
                    </div>
                    <button name ="boton_entrada" type="submit" class="btn btn-primary btn-login">Entrar</button>


                </form>
            </div>
        </div>
    </div>
    <!--  END LOGIN -->
</div>


<!-- START CORE JAVASCRIPT -->
<script type="text/javascript" src="../assets/global/plugins/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="../assets/global/plugins/tether/dist/js/tether.min.js"></script>
<script type="text/javascript" src="../assets/global/plugins/bootstrap/dist/js/bootstrap.min.js"></script>

<script type="text/javascript" src="../assets/pages/global/js/global.min.js"></script>
<!-- END CORE JAVASCRIPT -->


<!-- START PAGE PLUGINS -->
<script type="text/javascript"
        src="../assets/global/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
<!-- END PAGE PLUGINS -->


<!-- START PAGE JAVASCRIPT -->
<script type="text/javascript" src="../assets/global/js/global/global_validation.js"></script>
<!-- END PAGE JAVASCRIPT -->


</body>
</html>