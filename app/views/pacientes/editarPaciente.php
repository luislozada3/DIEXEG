<div class="modal fade" id="modelUpdatePaciente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-body">
        <form class="form-horizontal form-material" action="return false;" onsubmit="return false;" id="formEditPaciente">

        <div class="container">
          <div class="modal-header" style="border-bottom: none;">
            
            <h4 class="modal-title">
              <span class="fa fa-edit"></span> Actualizar Paciente
            </h4>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>

          </div>
        </div>

        <div class="form-group">
          <label class="col-md-12" for="cedula">cedula</label>
          <div class="col-md-12">
            <input type="text" class="form-control form-control-line" id="cedula" name="cedula" autocomplete="off" maxlength='10' onkeypress="return justNumber(event)">
            <span class="textHelp"></span>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-12" for="nombre">Nombre</label>
          <div class="col-md-12">
            <input type="text" class="form-control form-control-line" id="nombre" name="nombre" autocomplete="off" maxlength='40' onkeypress="return justLetters(event)">
            <span class="textHelp"></span>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-12" for="apellido">Apellido</label>
          <div class="col-md-12">
            <input type="text" class="form-control form-control-line" id="apellido" name="apellido" autocomplete="off" maxlength='40' onkeypress="return justLetters(event)">
            <span class="textHelp"></span>
          </div>
        </div>


        <div class="form-group">
            <label class="col-sm-12" for="sexo">Sexo</label>
            <div class="col-sm-12">

                <select class="form-control form-control-line" id="sexo" name="sexo" autocomple="off" autofocus>
                    <option value="">--Seleccione--</option>
                    <option value="m">Masculino</option>
                    <option value="f">Femenino</option>
                </select>

                <span class="textHelp" id="texthelpPersonal"></span>

            </div>
        </div>
  
        <div class="container">
          <div class="form-group">
            <div class="row">
              
              <div class="col-md-4">
                <label for="fn">Nacimiento</label>
                <input type="date" class="form-control form-control-line" id="fn" name="fn" autocomplete="off">
                <span class="textHelp"></span>
              </div>

              <div class="col-md-4">
                <label for="peso">Peso (kg.)</label>
                <input onkeypress="return justNumber(event)" type="number" class="form-control form-control-line" id="peso" name="peso" autocomplete="off">
                <span class="textHelp"></span>
              </div>

              <div class="col-md-4">
                <label for="altura">Altura (mts.)</label>
                <input onkeypress="return justNumberAndPoint(event)" type="text" class="form-control form-control-line" id="altura" name="altura" autocomplete="off">
                <span class="textHelp"></span>
              </div>

            </div>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-12" for="direccion">Direcci&oacute;n</label>
          <div class="col-md-12 mt-3">
            <textarea onkeypress="return alphaNumeric(event)" style="font-size: 13px;" rows="4" class="form-control form-control-line" id="direccion" name="direccion" maxlength='120'></textarea>
            <span class="textHelp"></span>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-12" for="descripcion">Descripcion</label>
          <div class="col-md-12 mt-3">
            <textarea  onkeypress="return alphaNumeric(event)"style="font-size: 13px;" rows="4" class="form-control form-control-line" id="descripcion" name="descripcion"></textarea>
            <span class="textHelp"></span>
          </div>
        </div>

        

        <input type="hidden" id="id" name="id">

        <div class="form-group">
            <div class="col-sm-12">
              <button type="submit" class="btn btn-primary btn-blue" id="btnEditar" style="margin-left: 0px;">Aceptar
              </button>
              <button type="button" class="btn btn-secundary btn-default" data-dismiss="modal" aria-label="Close" style="font-size: 13px; padding: 7px 12px;">Cancelar</button>
              <img src="<?php echo PUBLIC_IMG; ?>/loading.gif" alt="espere por favor..." class="waitAjax" id="waitAjaxUpdate"/>
            </div>
        </div>

        </form>
      </div>

    </div>
  </div>
</div>