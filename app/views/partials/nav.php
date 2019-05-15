<?php
    @session_start();
?>
<aside class="left-sidebar">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                
                <li> 
                    <a class="waves-effect waves-dark" href="<?php echo URL."home";?>" aria-expanded="false">
                        <i class="fa fa-tachometer" aria-hidden="true"></i>
                        <span class="hide-menu">Inicio</span>
                    </a>
                </li>

                <?php 
                    if ($_SESSION["role"] == "Administrador") {
                ?>
                <li>
                    <a class="waves-effect waves-dark" href="<?php echo URL."personal";?>" aria-expanded="false">
                        <i class="fa fa-user-md" aria-hidden="true"></i>
                        <span class="hide-menu">Personal</span>
                    </a>
                </li>
                <?php
                    }
                ?>

                <?php 
                    if ($_SESSION["role"] == "Administrador") {
                ?>
                    <li>
                        <a class="waves-effect waves-dark" href="<?php echo URL."usuarios";?>" aria-expanded="false">
                            <i class="fa fa-users"></i>
                            <span class="hide-menu">Usuarios</span>
                        </a>
                    </li>
                <?php
                    }
                ?>

                <li>
                    <a class="waves-effect waves-dark" href="<?php echo URL."pacientes";?>" aria-expanded="false">
                        <i class="fa fa-heartbeat" aria-hidden="true"></i>
                        <span class="hide-menu">Pacientes</span>
                    </a>
                </li>

                <li>
                    <a class="waves-effect waves-dark" href="<?php echo URL."citas";?>" aria-expanded="false">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                        <span class="hide-menu">Citas</span>
                    </a>
                </li>

                <?php 
                    if ($_SESSION["role"] == "Administrador") {
                ?>
                    <li>
                        <a class="waves-effect waves-dark" href="<?php echo URL."diagnosticos";?>" aria-expanded="false">
                            <i class="fa fa-stethoscope"></i>
                            <span class="hide-menu">Diagnostico</span>
                        </a>
                    </li>
                <?php
                    }
                ?>

                <li>
                    <a class="waves-effect waves-dark" href="<?php echo URL."reportes";?>" aria-expanded="false">
                        <i class="fa fa-pie-chart" aria-hidden="true"></i>
                        <span class="hide-menu">Reportes</span>
                    </a>
                </li>

                <?php 
                    if ($_SESSION["role"] == "Administrador") {
                ?>
                <li>
                    <a class="waves-effect waves-dark" href="<?php echo URL."bitacora";?>" aria-expanded="false">
                        <i class="fa fa-history"></i>
                        <span class="hide-menu">Historial</span>
                    </a>
                </li>
                <?php
                    }
                ?>

            </ul>
        </nav>
    </div>
    <div class="sidebar-footer">
        <a href="<?php echo PATH_PUBLIC."/manual_usuario.pdf";?>" target="_blank" class="link" data-toggle="tooltip" title="Ayuda"><i class="fa fa-question-circle" aria-hidden="true"></i></a>
        <a href="<?php echo URL."configuraciones";?>" class="link" data-toggle="tooltip" title="Configuracion"><i class="fa fa-cogs" aria-hidden="true"></i></a>
        <a href="#" id="btnLogout" onClick="logout(event)" class="link" data-toggle="tooltip" title="Salir"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
    </div>
</aside>

<script>

    function logout(e){
        e.preventDefault();
        localStorage.removeItem('isLoggedIn');
        window.location = "/diexeg/login/logout";
    }
    
</script>