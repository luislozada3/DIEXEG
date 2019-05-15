<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Sistema experto de enfermedades gastrointestinales">
    <meta name="author" content="Francis Dona">
    <title><?php echo NAME_APP;?> - Inicio de sesion </title>
    <link rel="stylesheet" href="<?php echo PUBLIC_CSS;?>/login/main.css">
</head>
<body>

    <div class="modalLoading">
        <div class="loginMessage">
            <img src="<?php echo PUBLIC_IMG;?>/loading.gif" alt="">
            <h3>Cargando...</h3>
        </div>
    </div>

    <div class="contentLogin">
        
        <header class="logo">
            <h1>DIEXEG</h1>
        </header>

        <div class="caption">
            <h1>Ingrese a su cuenta</h1>
        </div>

        <div class="messageError">
        </div>
        <section class="main">
            <form class="formLogin" action="return false;" onSubmit="return false;">

                <div class="groupInput">
                    <h3 class="captionLogin">Inicio de Sesion <span>DIEXEG</span></h3>
                </div>

                <div class="groupInput">
                    <input type="text" placeholder="Introduzca su usuario" autofocus name="user" autocomplete="off" class="user" onKeyPress="clearMessage()" onClick="clearMessage()">
                    <span class="textHelp"></span>
                </div>

                <div class="groupInput">
                    <input type="password" placeholder="Introduzca su contraseña" name="password" autocomplete="off" class="password" onKeyPress="clearMessage()" onClick="clearMessage()">
                    <span class="textHelp"></span>
                </div>

                <div class="groupInput">
                    <button type="submit" class="buttonLogin"> Continuar </button>
                </div>

            </form>
        </section>

        <footer>
            <a href="<?php echo URL;?>login/recover" class="forgetAccount">&#191;Olvid&oacute; su contrase&ntilde;a?</a>
            <p class="credentials"> Todos los derechos reservados &copy; 2019 DIEXEG</p>
        </footer>
    </div>

    <script type="text/javascript" src="<?php echo PATH_PUBLIC;?>/plugins/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo PATH_PUBLIC;?>/plugins/notify.min.js"></script>    
    <script type="text/javascript" src="<?php echo PUBLIC_JS;?>/config/global.js"></script>
    <script type="text/javascript" src="<?php echo PUBLIC_JS;?>/login/login.js"></script>

</body>
</html>