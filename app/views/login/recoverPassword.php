<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Sistema experto de enfermedades gastrointestinales">
    <meta name="author" content="Francis Dona">
    <title><?php echo NAME_APP;?> - Recuperar contraseña </title>
    
    <link rel="stylesheet" type="text/css" href="<?php echo PUBLIC_PLUGINS; ?>/bootstrap/css/bootstrap.min.css" >
    <link rel="stylesheet" type="text/css" href="<?php echo PUBLIC_CSS; ?>/style.css" >

    <link rel="stylesheet" type="text/css" href="<?php echo PUBLIC_CSS; ?>/main.css" id="theme">
    <link rel="stylesheet" href="<?php echo PUBLIC_CSS;?>/login/main.css">

    <link rel="stylesheet" type="text/css" href="<?php echo PUBLIC_FONTS; ?>/font-awesome/css/font-awesome.min.css">
</head>
<body>

    <div class="modalLoading">
        <div class="loginMessage">
            <img src="<?php echo PUBLIC_IMG;?>/loading.gif" alt="">
            <h3>Cargando...</h3>
        </div>
    </div>

    <div class="contentLogin">

        <div class="caption">
            <h1>Recuperar su cuenta</h1>
        </div>

        <div class="messageError">
        </div>
        <section class="main">
            <form class="formRecover" action="return false;" onSubmit="return false;">

                <div class="groupInput">
                    <h3 class="captionLogin"> <span style="font-size: 2rem;">DIEXEG</span></h3>
                </div>

                <div class="groupInput">
                    <input type="text" placeholder="Introduzca su usuario" autofocus name="user" autocomplete="off" class="user" onKeyPress="clearMessage()" onClick="clearMessage()" id='inputUser'>
                    <span class="textHelp"></span>
                </div>

                <div class="groupInput">
                    <div id="textoResponseRecover">
                        
                    </div>
                </div>
                
                <div class="groupInput">
                    <button type="submit" class="buttonLogin" id='btnRecover'> Continuar </button>
                </div>

            </form>
        </section>

        <footer>
            <a href="<?php echo URL;?>login/index" class="forgetAccount">Volver al inicio de sesion</a>
            <p class="credentials"> Todos los derechos reservados &copy; 2019 DIEXEG</p>
        </footer>

        <?php include "../app/views/login/modalRecover.php"; ?>
    </div>

    <script type="text/javascript" src="<?php echo PATH_PUBLIC;?>/plugins/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo PUBLIC_PLUGINS;?>/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo PATH_PUBLIC;?>/plugins/notify.min.js"></script>    
    <script type="text/javascript" src="<?php echo PUBLIC_JS;?>/config/global.js"></script>
    <script type="text/javascript" src="<?php echo PUBLIC_JS;?>/login/login.js"></script>

</body>
</html>