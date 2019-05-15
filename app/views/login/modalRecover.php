<div class="modal fade" id="modelRecover" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-body">
        <form class="form-horizontal form-material" action="return false;" onsubmit="return false;" id="formRecoverModal">

        <div class="container">
          <div class="modal-header" style="border-bottom: none;">
            
            <h4 class="modal-title">
               Recuperar contraseña
            </h4>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>

          </div>
        </div>

        <div class="form-group">
          <label class="col-md-12" for="pregunta1">Pregunta 1: </label>
          <div class="col-md-12">
            <input type="text" class="form-control form-control-line" id="pregunta1" placeholder="Primera pregunta" name="pregunta1" autocomplete="off" disabled>
            <span class="textHelp"></span>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-12" for="respuesta1">Respuesta 1: </label>
          <div class="col-md-12">
            <input type="text" class="form-control form-control-line" id="respuesta1" placeholder="Primera respuesta" name="respuesta1" autocomplete="off">
            <span class="textHelp"></span>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-12" for="pregunta2">Pregunta 2: </label>
          <div class="col-md-12">
            <input type="text" class="form-control form-control-line" id="pregunta2" placeholder="Segunda pregunta" name="pregunta2" autocomplete="off" disabled>
            <span class="textHelp"></span>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-12" for="respuesta2">Respuesta 2: </label>
          <div class="col-md-12">
            <input type="text" class="form-control form-control-line" id="respuesta2" placeholder="Segunda respuesta" name="respuesta2" autocomplete="off">
            <span class="textHelp"></span>
          </div>
        </div>

        <input type="hidden" name="userId" id="userId">

        <div class="form-group">
          <div id="textResponse"></div>
        </div>

        <div class="form-group">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-primary btn-blue" id="btnAgregar" style="margin-left: 0px;">Aceptar
                </button>
                <button type="button" class="btn btn-secundary btn-default" data-dismiss="modal" aria-label="Close" style="font-size: 13px; padding: 7px 12px;">Cancelar</button>
                <img src="<?php echo PUBLIC_IMG; ?>/loading.gif" alt="espere por favor..." class="waitAjax" id="waitAjaxAdd"/>
            </div>
        </div>

        </form>
      </div>

    </div>
  </div>
</div>