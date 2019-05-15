<div class="modal fade" id="modalcitaPaciente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-body">
        <form class="form-horizontal form-material" action="return false;" onsubmit="return false;" id="formAddCita">

        <div class="container">
          <div class="modal-header" style="border-bottom: none;">
            
            <h4 class="modal-title">
              <span class="fa fa-add"></span> Tomar cita
            </h4>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>

          </div>
        </div>

        <div class="form-group">
          <label class="col-md-12" for="fecha">Fecha</label>
          <div class="col-md-12">
            <input type="date" class="form-control form-control-line" id="fecha" name="fecha" autocomplete="off">
            <span class="textHelp"></span>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-12" for="hora">Hora</label>
          <div class="col-md-12">
            <input type="time" class="form-control form-control-line" id="hora" name="hora" autocomplete="off">
            <span class="textHelp"></span>
          </div>
        </div>


        <div class="form-group">
            <label class="col-sm-12" for="Medico">Medico</label>
            <div class="col-sm-12">

                <select class="form-control form-control-line" id="medico" name="medico" autocomple="off" onchange="selectDisabled(event)">
                    <option value="">--Seleccione--</option>
                    <?php
                      for($i = 0; $i < count($data); $i++){
                    ?>
                      <option value="<?php echo $data[$i]->id; ?>"><?php echo $data[$i]->nombre . " " . $data[$i]->apellido . " (".$data[$i]->Profesion . ")"; ?></option>
                    <?php
                      }
                    ?>

                </select>

                <span class="textHelp" id="texthelpPersonal"></span>

            </div>
        </div>

        

        <input type="hidden" id="idPacienteCita" name="idPaciente">

        <div class="form-group">
            <div class="col-sm-12">
              <button type="submit" class="btn btn-primary btn-blue" id="btnAddCita" style="margin-left: 0px;">Aceptar
              </button>
              <button type="button" class="btn btn-secundary btn-default" data-dismiss="modal" aria-label="Close" style="font-size: 13px; padding: 7px 12px;">Cancelar</button>
              <img src="<?php echo PUBLIC_IMG; ?>/loading.gif" alt="espere por favor..." class="waitAjax" id="waitAjaxCitas"/>
            </div>
        </div>

        </form>
      </div>

    </div>
  </div>
</div>