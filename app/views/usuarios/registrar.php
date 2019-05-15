<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sistema experto de enfermedades gastrointestinales">
    <meta name="author" content="Francis Dona">
    <title><?php echo NAME_APP;?> - Usuarios</title>
    <link href="<?php echo PUBLIC_PLUGINS; ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo PUBLIC_CSS; ?>/style.css" rel="stylesheet">
    <link href="<?php echo PUBLIC_CSS; ?>/blue.css" id="theme" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo PUBLIC_CSS; ?>/tablas.css"/>
    <link href="<?php echo PUBLIC_CSS; ?>/datatables.min.css" id="theme" rel="stylesheet">
    <link href="<?php echo PUBLIC_CSS; ?>/usuarios/main.css" id="theme" rel="stylesheet">
    <link href="<?php echo PUBLIC_CSS; ?>/main.css" id="theme" rel="stylesheet">
    <link href="<?php echo PUBLIC_PLUGINS; ?>/toastr/toastr.min.css" id="theme" rel="stylesheet">
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
                                Usuarios > registrar
                            </li>
                        </ol>
                    </div>
                    <div class="col-md-7 col-4">
                        <a href="<?php echo URL;?>usuarios/" class='btn-previous' data-toggle='tooltip' title='Pagina anterior'> <span class="fa fa-arrow-left"></span> Atr&aacute;s</a>
                    </div>
                </div>

                <form class="form-horizontal form-material"  enctype="multipart/form-data" id="uploadForm" action="return false;" onsubmit="return false;">

                    <div class="row">
                        
                        <div class="col-lg-4 col-xlg-3 col-md-5">
                            <div class="card">
                                <div class="card-block">
                                    <center class="m-t-30"> 
                                        <label for="input-profile" class="label-input-profile" id="changeImgProfile">
                                            <img src="<?php echo PUBLIC_IMG; ?>/usuarios/emptyUser.png" alt="usuario" class="img-circle" width="150" />
                                            <h6 class="card-title m-t-10 title-img-profile">Imagen de perfil</h6>
                                        </label>
                                        <input type="file" id="input-profile" name="imagen" style="display: none;" accept="image/jpeg, image/png, image/jpeg" />
                                    </center>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-8 col-xlg-9 col-md-7">
                            <div class="card">
                                <div class="card-block">

                                    <div class="form-group">
                                        <label class="col-sm-12" for="personal">Personal</label>
                                        <div class="col-sm-12">

                                            <select class="form-control form-control-line" id="personal" name="personal" autocomple="off" autofocus onchange="selectDisabled(event)">
                                                <option selected value="">--Seleccione--</option>
                                                <option value="medico">M&eacute;dico</option>
                                                <option value="oficina">oficina</option>
                                            </select>

                                            <select class="form-control form-control-line" id="medico" name="medico" style="display: none;" autocomple="off">
                                                <option selected="on" value=""></option>
                                                <?php
                                                    foreach ($data["medico"] as $personal):
                                                ?>
                                                    <option value="<?php echo $personal->id; ?>"> <?php echo $personal->nombre. " ".$personal->apellido." (".$personal->Profesion.")"; ?></option>
                                                <?php
                                                    endforeach;
                                                ?>  
                                            </select>

                                            <select class="form-control form-control-line" id="oficina" name="oficina" style="display: none;" autocomple="off">
                                                <option selected="on" value=""></option>
                                                <?php
                                                    foreach ($data["oficina"] as $personal):
                                                ?>
                                                    <option value="<?php echo $personal->id; ?>"> <?php echo $personal->nombre. " ".$personal->apellido." (".$personal->oficio.")"; ?></option>
                                                <?php
                                                    endforeach;
                                                ?>  
                                            </select>

                                            <span class="textHelp" id="texthelpPersonal"></span>

                                        </div>
                                    </div>
                                        
                                    <div class="form-group">
                                        <label class="col-md-12" for="usuario">Nombre de usuario</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line" id="usuario" name="usuario" autocomplete="off" maxlength='40'>
                                            <span class="textHelp"></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12" for="clave">Contrase&ntilde;a</label>
                                        <div class="col-md-12">
                                            <input type="password" minlength="8" class="form-control form-control-line" id="clave" name="clave" autocomplete="off" onkeyup="validateKeyStrength(this)" maxlength='40'>
                                            <span class="textHelp"></span>
                                            <span id="validateKeyStrength" data-toggle='tooltip' title='Las contraseñas deben contener como minimo una mayuscula, una minuscula y un valor numerico'></span>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-12" for="rclave">Repetir contrase&ntilde;a</label>
                                        <div class="col-md-12">
                                            <input type="password" minlength="8" class="form-control form-control-line" id="rclave" name="rclave" autocomplete="off" maxlength='40'>
                                            <span class="textHelp"></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-12" for="pregunta1">Pregunta secreta</label>
                                        <div class="col-sm-12">
                                            <select class="form-control form-control-line" id="pregunta1" name="pregunta1" autocomplete="off">
                                                <option value="Equipo favorito"> Equipo favorito </option>
                                                <option value="Nombre de su mascota"> Nombre de su mascota </option>
                                                <option value="Deporte favorito"> Deporte favorito </option>
                                                <option value="Nombre de su madre"> Deporte favorito </option>
                                            </select>
                                            <span class="textHelp"></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12" for="respuesta1">Respuesta secreta </label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line" id="respuesta1" name="respuesta1" autocomplete="off" maxlength='40'>
                                            <span class="textHelp"></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-12" for="pregunta2">Pregunta secreta</label>
                                        <div class="col-sm-12">
                                            <select class="form-control form-control-line" id="pregunta2" name="pregunta2" autocomplete="off">
                                                <option value="Nombre de tu primer colegio"> Nombre de tu primer colegio </option>
                                                <option value="Nombre de su padre"> Nombre de su padre </option>
                                                <option value="Comida favorita"> Comida favorita </option>
                                                <option value="Postre favorito"> Postre favorito </option>
                                            </select>
                                            <span class="textHelp"></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12" for="respuesta2">Respuesta secreta </label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line" id="respuesta2" name="respuesta2" autocomplete="off" maxlength='40'>
                                            <span class="textHelp"></span>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-sm-12" for="rol">Rol del usuario</label>
                                        <div class="col-sm-12">
                                            <select class="form-control form-control-line" id="rol" name="rol" autocomplete="off">
                                                <option selected="on"> --Seleccione-- </option>
                                                <option value="Administrador">Administrador</option>
                                                <!-- <option value="Super sudo">Super sudo</option> -->
                                                <option value="Secretaria">Secretaria</option>
                                            </select>
                                            <span class="textHelp"></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-primary btn-blue" id="btnRegistrar" style="margin-left: 0px;">Aceptar
                                            </button>
                                            <button type="button" class="btn btn-default" id="btnCancelRegister">cancelar
                                            </button>
                                            <img src="<?php echo PUBLIC_IMG; ?>/loading.gif" alt="espere por favor..." class="waitAjax"/>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>

                </form>

            </div>
        </div>

    </div>

    <script type="text/javascript" src="<?php echo PUBLIC_PLUGINS;?>/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo PUBLIC_PLUGINS;?>/bootstrap/js/tether.min.js"></script>
    <script type="text/javascript" src="<?php echo PUBLIC_PLUGINS;?>/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo PUBLIC_PLUGINS;?>/toastr/toastr.js"></script>

    <script type="text/javascript" src="<?php echo PUBLIC_JS;?>/config/global.js"></script>
    <script type="text/javascript" src="<?php echo PUBLIC_PLUGINS;?>/datatables.min.js"></script>
                
    <script type="text/javascript" src="<?php echo PUBLIC_PLUGINS;?>/waves.js"></script>
    <script type="text/javascript" src="<?php echo PUBLIC_PLUGINS;?>/sidebarmenu.js"></script>
    <script type="text/javascript" src="<?php echo PUBLIC_PLUGINS;?>/sidebarmenu.js"></script>   

    <script type="text/javascript" src="<?php echo PUBLIC_PLUGINS;?>/custom.js"></script>
    <script type="text/javascript" src="<?php echo PUBLIC_PLUGINS;?>/d3/d3.min.js"></script>

    <script type="text/javascript" src="<?php echo PUBLIC_PLUGINS;?>/sticky-kit-master/dist/sticky-kit.min.js"></script>
    
    <script type="text/javascript" src="<?php echo PUBLIC_JS;?>/main.js"></script>
    <script type="text/javascript" src="<?php echo PUBLIC_JS;?>/usuarios/usuariosMaster.js"></script>
    <script type="text/javascript" src="<?php echo PUBLIC_JS;?>/usuarios/usuariosInicializador.js"></script>
    <script type="text/javascript" src="<?php echo PUBLIC_JS;?>/usuarios/usuarioRegistrar.js"></script>

    <script>
        const btnCancel = document.getElementById('btnCancelRegister');
        btnCancel.addEventListener("click", function () {
           window.location = URL+"/usuarios/";        
        });
    </script>
</body>
</html>
