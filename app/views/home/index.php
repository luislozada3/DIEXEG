<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sistema experto de enfermedades gastrointestinales">
    <meta name="author" content="Francis Dona">
    <title><?php echo NAME_APP;?> - Inicio</title>
    <link href="<?php echo PUBLIC_PLUGINS; ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo PUBLIC_CSS; ?>/style.css" rel="stylesheet">
    <link href="<?php echo PUBLIC_CSS; ?>/blue.css" id="theme" rel="stylesheet">   
    <link href="<?php echo PUBLIC_FONTS; ?>/font-awesome/css/font-awesome.min.css" rel="stylesheet">
</head>

<body class="fix-header fix-sidebar card-no-border">
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
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
                                Inicio
                            </li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    
                    <div class="col-md-12 col-12">
                        <div class="containerImg">
                            <h2>Sistema experto de enfermedades gastrointestinales</h2>
                            <img src="<?php echo PUBLIC_IMG; ?>/imgBackgroundShowUser.png" alt='imagen del inicio del sistema' class='backgroundImgHome'>                            
                        </div>

                    </div>

                </div>


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
</body>
</html>
