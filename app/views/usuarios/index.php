<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sistema experto de enfermedades gastrointestinales">
    <meta name="author" content="Francis Dona">
    <title><?php echo NAME_APP;?> - Usuarios</title>
    <link rel="stylesheet" type="text/css" href="<?php echo PUBLIC_PLUGINS; ?>/bootstrap/css/bootstrap.min.css" >
    <link rel="stylesheet" type="text/css" href="<?php echo PUBLIC_CSS; ?>/style.css" >
    <link rel="stylesheet" type="text/css" href="<?php echo PUBLIC_CSS; ?>/blue.css" id="theme" >
    <link rel="stylesheet" type="text/css" href="<?php echo PUBLIC_CSS; ?>/tablas.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo PUBLIC_CSS; ?>/datatables.min.css" id="theme">
    <link rel="stylesheet" type="text/css" href="<?php echo PUBLIC_CSS; ?>/usuarios/main.css" id="theme">
    <link rel="stylesheet" type="text/css" href="<?php echo PUBLIC_CSS; ?>/main.css" id="theme">
    <link rel="stylesheet" type="text/css" href="<?php echo PUBLIC_PLUGINS; ?>/toastr/toastr.min.css" id="theme">
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
                                Usuarios
                            </li>
                        </ol>
                    </div>
                </div>

                <div class="content-table"></div>

                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
    
                        <div class="container">
                            <div class="modal-header" style="border-bottom: none;">
                            <h6 class="modal-title">
                                <img src="" alt="usuario" class="imgUserModal">
                                <span id="userName" style="font-size: 13px; font-weight: bold; color: #455A64;"></span>
                                <span id="" style="font-size: 13px; font-weight: bold; color: #455A64;"></span>
                            </h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                        </div>
                        
                        <div class="container">
                            <div class="modal-body" style="font-size: 13px;">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="contentFullName">
                                            <i class="fa fa-user" style="font-size: 14px; color: #1E88E5;"></i>
                                            <p class="fullName" style="display: inline-block;"></p>
                                        </div>

                                        <div class="contentRole">
                                            <i class="fa fa-tachometer" aria-hidden="true" style="font-size: 14px; color: #1E88E5;"></i>
                                            <p class="role" style="display: inline-block;"></p>
                                        </div>

                                        <div class="contentJob">
                                            <i class="fa fa-briefcase" aria-hidden="true" style="font-size: 14px; color: #1E88E5;"></i>
                                            <p class="job" style="display: inline-block;"></p>
                                        </div>

                                        <div class="contentStatus">
                                            <i class="showIconStatus" aria-hidden="true" style="font-size: 14px; color: #1E88E5;"></i>
                                            <p class="status" style="display: inline-block;"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <img src="<?php echo PUBLIC_IMG."/imgBackgroundShowUser.png";?>" class="imgBackgroundShowUser">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                  </div>
                </div>

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
    <script type="text/javascript" src="<?php echo PUBLIC_JS;?>/usuarios/usuariosMaster.js"></script>
    <script type="text/javascript" src="<?php echo PUBLIC_JS;?>/usuarios/usuariosInicializador.js"></script>                
    <script type="text/javascript" src="<?php echo PUBLIC_JS;?>/usuarios/usuarioEliminar.js"></script>
    <script type="text/javascript" src="<?php echo PUBLIC_JS;?>/usuarios/usuarioAcceso.js"></script>
    <script type="text/javascript" src="<?php echo PUBLIC_JS;?>/usuarios/usuarioRegistrar.js"></script>
    <script type="text/javascript" src="<?php echo PUBLIC_PLUGINS;?>/custom.js"></script>
    <script type="text/javascript" src="<?php echo PUBLIC_PLUGINS;?>/sticky-kit-master/dist/sticky-kit.min.js"></script>
</body>
</html>
