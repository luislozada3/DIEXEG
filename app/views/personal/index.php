<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sistema experto de enfermedades gastrointestinales">
    <meta name="author" content="Francis Dona">
    <title><?php echo NAME_APP;?> - Personal</title>
    <link rel="stylesheet" type="text/css" href="<?php echo PUBLIC_PLUGINS; ?>/bootstrap/css/bootstrap.min.css" >
    <link rel="stylesheet" type="text/css" href="<?php echo PUBLIC_CSS; ?>/style.css" >
    <link rel="stylesheet" type="text/css" href="<?php echo PUBLIC_CSS; ?>/blue.css" id="theme" >
    <link rel="stylesheet" type="text/css" href="<?php echo PUBLIC_CSS; ?>/tablas.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo PUBLIC_CSS; ?>/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo PUBLIC_CSS; ?>/main.css" id="theme">
    <link rel="stylesheet" type="text/css" href="<?php echo PUBLIC_PLUGINS; ?>/toastr/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo PUBLIC_FONTS; ?>/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo PUBLIC_PLUGINS; ?>/alertify/alertify.min.css">
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
                                Personal
                            </li>
                        </ol>
                    </div>
                </div>

                <div class="content-table"></div>

                <?php include "../app/views/personal/editarPersonal.php"; ?>
                <?php include "../app/views/personal/agregarPersonal.php"; ?>

            </div>
        </div>

    </div>

    <script type="text/javascript" src="<?php echo PUBLIC_PLUGINS;?>/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo PUBLIC_PLUGINS;?>/bootstrap/js/tether.min.js"></script>
    <script type="text/javascript" src="<?php echo PUBLIC_PLUGINS;?>/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo PUBLIC_PLUGINS;?>/toastr/toastr.js"></script>
    <script type="text/javascript" src="<?php echo PUBLIC_PLUGINS;?>/alertify/alertify.min.js"></script>
    <script type="text/javascript" src="<?php echo PUBLIC_JS;?>/config/global.js"></script>
    <script type="text/javascript" src="<?php echo PUBLIC_PLUGINS;?>/datatables.min.js"></script>                
    <script type="text/javascript" src="<?php echo PUBLIC_PLUGINS;?>/waves.js"></script>
    <script type="text/javascript" src="<?php echo PUBLIC_PLUGINS;?>/sidebarmenu.js"></script>
    <script type="text/javascript" src="<?php echo PUBLIC_PLUGINS;?>/sidebarmenu.js"></script>   
    <script type="text/javascript" src="<?php echo PUBLIC_PLUGINS;?>/d3/d3.min.js"></script>
    <script type="text/javascript" src="<?php echo PUBLIC_JS;?>/main.js"></script>

    <script type="text/javascript" src="<?php echo PUBLIC_JS;?>/personal/personalMaster.js"></script>
    <script type="text/javascript" src="<?php echo PUBLIC_JS;?>/personal/inicializadorPersonal.js"></script>
    <script type="text/javascript" src="<?php echo PUBLIC_JS;?>/personal/deletePersonal.js"></script>
    <script type="text/javascript" src="<?php echo PUBLIC_JS;?>/personal/updatePersonal.js"></script>
    <script type="text/javascript" src="<?php echo PUBLIC_JS;?>/personal/addPersonal.js"></script>

    <script type="text/javascript" src="<?php echo PUBLIC_PLUGINS;?>/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script type="text/javascript" src="<?php echo PUBLIC_PLUGINS;?>/custom.js"></script>
</body>
</html>
