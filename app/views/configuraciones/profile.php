    <div class="row">
        
        <div class="col-lg-3 col-xlg-3 col-md-3">
            <div class="card">
                <div class="card-block">
                    <center>
                        <h4 class="card-title">Imagen de perfil</h4>
                    </center>
                    <center class="m-t-30"> 
                        <form id="uploadForm" action="return false;" onsubmit="return false;" enctype="multipart/form-data">
                            <label for="input-profile" class="label-input-profile" id="changeImgProfile">
                                <img src="<?php echo PUBLIC_IMG."/usuarios/".$data['user']->imagen; ?>" alt="usuario" class="img-circle" width="150" height="150"/>
                                <span class="LoadChangeImage">Cargando...</span>
                                <h6 class="card-title m-t-10 title-img-profile">
                                    <span class="fa fa-pencil"></span> Cambiar imagen
                                </h6>
                            </label>
                            <input type="file" id="input-profile" name="imagen" style="display: none;" accept="image/png, image/jpeg" />
                            <button type="buttom" class="buttomChangeImg btn btn-default" id="buttomChangeImg">Cambiar Imagen</button>
                        </form>
                    </center>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-block">
                    
                    <div class="form-horizontal form-material">

                    
                        <h4 class="card-title">Datos de usuario</h4>
                            
                        <div class="form-group">
                            <label class="col-md-12" for="usuario">Nombre de usuario</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control form-control-line" id="usuario" name="usuario" autocomplete="off" value="<?php echo $data['user']->usuario; ?>" disabled>
                                <span class="textHelp"></span>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-12" for="rol">Rol del usuario</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control form-control-line" id="nivel" name="nivel" autocomplete="off" value="<?php echo $data['user']->nivel; ?>" disabled>
                                <span class="textHelp"></span>
                            </div>
                        </div>

                    </div>


                </div>
            </div>

            <div class="card">
                <div class="card-block">
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modalChangePassword"> Cambiar contraseña</button>
                </div>
            </div>
        </div>

        <?php
            if (!empty($data['dataPersonal'])) {
        ?>

            <div class="col-lg-5">
                <div class="card">
                    <div class="card-block">

                        <form class="form-horizontal form-material" id="formUpdateDataPersonal" action="return false;" onsubmit="return false;">
                        
                            <h4 class="card-title">Datos personales</h4>

                            <div class="form-group">
                                <label class="col-md-12" for="nombre">Nombre</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control form-control-line" id="nombre" name="nombre" autocomplete="off" value="<?php echo $data['dataPersonal']->nombre; ?>" autofocus maxlength='60'>
                                    <span class="textHelp"></span>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-sm-12" for="apellido">Apellido</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control form-control-line" id="apellido" name="apellido" autocomplete="off" value="<?php echo $data['dataPersonal']->apellido; ?>" maxlength='60'>
                                    <span class="textHelp"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-12" for="oficio">Oficio</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control form-control-line" id="oficio" name="oficio" autocomplete="off" value="<?php echo $data['dataPersonal']->oficio; ?>" maxlength='60'>
                                    <span class="textHelp"></span>
                                </div>
                            </div>

                            <input type="hidden" name="personalId" value="<?php echo $data['dataPersonal']->id; ?>">
                            <input type="hidden" name="type" value="<?php echo $data['type']; ?>">

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary btn-blue" id="btnUpdateDataPersonal"> Actualizar datos
                                    </button>
                                    <img src="<?php echo PUBLIC_IMG; ?>/loading.gif" alt="espere por favor..." class="waitAjax"/>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>

        <?php
            }
        ?>

    </div>


<!-- modal de cambiar clave-->
<div class="modal fade" id="modalChangePassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header" style="border-bottom: none; margin-bottom: -30px;">
                <h4 class="card-title">Cambiar contraseña</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <form class="form-horizontal form-material" onsubmit="return false;" action="return false;" id="formChangePassword">
    
                    <div class="form-group">
                        <label class="col-md-12" for="usuario">Contraseña nueva</label>
                        <div class="col-md-12">
                            <input type="password" class="form-control form-control-line" id="password" name="password" autocomplete="off" autofocus maxlength='40'>
                            <span class="textHelp"></span>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-12" for="rol">Repita la contraseña</label>
                        <div class="col-md-12">
                            <input type="password" class="form-control form-control-line" id="passwordAgain" name="passwordAgain" autocomplete="off" maxlength='40'>
                            <span class="textHelp"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary btn-blue" id="btnChangePassoword" style="margin-left: 0px;">Actualizar</button>
                            <button type="button" class="btn btn-secundary btn-default" data-dismiss="modal" aria-label="Close" style="font-size: 13px; padding: 7px 12px;">Cancelar</button>
                            <img src="<?php echo PUBLIC_IMG; ?>/loading.gif" alt="espere por favor..." class="waitAjax"/>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
<!-- fin de la modal-->