<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sistema experto de enfermedades gastrointestinales">
    <meta name="author" content="Francis Dona">
    <title><?php echo NAME_APP;?> - configuraciones</title>
    <link href="<?php echo PUBLIC_PLUGINS; ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo PUBLIC_CSS; ?>/style.css" rel="stylesheet">
    <link href="<?php echo PUBLIC_CSS; ?>/blue.css" id="theme" rel="stylesheet">
    <link href="<?php echo PUBLIC_CSS; ?>/main.css" id="theme" rel="stylesheet">
    <link href="<?php echo PUBLIC_FONTS; ?>/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo PUBLIC_PLUGINS; ?>/toastr/toastr.min.css" id="theme">
</head>

<body class="fix-header fix-sidebar card-no-border">
    
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> 
        </svg>
    </div>


    <div id="main-wrapper">

        <?php 
            include "../app/views/partials/header.php";
            include "../app/views/partials/nav.php";
        ?>

        <div class="page-wrapper">
            <div class="container-fluid">
                
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active">
                                Configuraciones
                            </li>
                        </ol>
                    </div>
                </div>

                <?php
                    require_once "../app/views/configuraciones/profile.php";
                ?>


            </div>
        </div>
    </div>

    <script src="<?php echo PUBLIC_PLUGINS;?>/jquery.min.js"></script>
    <script src="<?php echo PUBLIC_PLUGINS;?>/bootstrap/js/tether.min.js"></script>
    <script src="<?php echo PUBLIC_PLUGINS;?>/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo PUBLIC_PLUGINS;?>/jquery.slimscroll.js"></script>
    <script src="<?php echo PUBLIC_PLUGINS;?>/waves.js"></script>
    <script src="<?php echo PUBLIC_PLUGINS;?>/sidebarmenu.js"></script>
    <script src="<?php echo PUBLIC_PLUGINS;?>/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="<?php echo PUBLIC_PLUGINS;?>/custom.min.js"></script>
    <script src="<?php echo PUBLIC_PLUGINS;?>/chartist-js/dist/chartist.min.js"></script>
    <script src="<?php echo PUBLIC_PLUGINS;?>/d3/d3.min.js"></script>
    <script src="<?php echo PUBLIC_PLUGINS;?>/c3-master/c3.min.js"></script>
    <script src="<?php echo PUBLIC_PLUGINS;?>/dashboard1.js"></script>
    <script type="text/javascript" src="<?php echo PUBLIC_PLUGINS;?>/toastr/toastr.js"></script>

    <script type="text/javascript" src="<?php echo PUBLIC_JS;?>/config/global.js"></script>
    <script type="text/javascript" src="<?php echo PUBLIC_JS;?>/main.js"></script>
    <script src="<?php echo PUBLIC_JS;?>/configuraciones/cambiarClave.js"></script>
    <script src="<?php echo PUBLIC_JS;?>/configuraciones/actualizarPerfil.js"></script>
    <script src="<?php echo PUBLIC_JS;?>/configuraciones/actualizarFotoPerfil.js"></script>
    
</body>
</html>
