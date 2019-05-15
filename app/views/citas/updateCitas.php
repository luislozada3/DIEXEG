<div class="modal fade" id="modalcitaUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-body">
        <form class="form-horizontal form-material" action="return false;" onsubmit="return false;" id="formUpdateCita">

        <div class="container">
          <div class="modal-header" style="border-bottom: none;">
            
            <h4 class="modal-title">
              <span class="fa fa-add"></span> Actualizar cita
            </h4>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>

          </div>
        </div>

        <div class="form-group">
            <label class="col-sm-12" for="pacienteUpdate">Paciente</label>
            <div class="col-sm-12">

                <select class="form-control form-control-line" id="pacienteUpdate" name="paciente" autocomple="off" onchange="selectDisabled(event)">
                <option value="" disabled="true">--Seleccione--</option>
                    <?php
                      for($i = 0; $i < count($data['pacientes']); $i++){
                    ?>
                      <option value="<?php echo $data['pacientes'][$i]->id; ?>"><?php echo $data['pacientes'][$i]->nombre . " " . $data['pacientes'][$i]->apellido . " (C.I: ".$data['pacientes'][$i]->cedula . ")"; ?></option>
                    <?php
                      }
                    ?>
                </select>

                <span class="textHelp"></span>

            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-12" for="medicoUpdate">Medico</label>
            <div class="col-sm-12">

                <select class="form-control form-control-line" id="medicoUpdate" name="medico" autocomple="off" onchange="selectDisabled(event)">
                    <option value="" disabled="true">--Seleccione--</option>
                    <?php
                      for($i = 0; $i < count($data['medicos']); $i++){
                    ?>
                      <option value="<?php echo $data['medicos'][$i]->id; ?>"><?php echo $data['medicos'][$i]->nombre . " " . $data['medicos'][$i]->apellido . " (".$data['medicos'][$i]->Profesion . ")"; ?></option>
                    <?php
                      }
                    ?>

                </select>

                <span class="textHelp"></span>

            </div>
        </div>

        <div class="form-group">
          <label class="col-md-12" for="fechaUpdate">Fecha</label>
          <div class="col-md-12">
            <input type="date" class="form-control form-control-line" id="fechaUpdate" name="fecha" autocomplete="off">
            <span class="textHelp"></span>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-12" for="horaUpdate">Hora</label>
          <div class="col-md-12">
            <input type="time" class="form-control form-control-line" id="horaUpdate" name="hora" autocomplete="off">
            <span class="textHelp"></span>
          </div>
        </div>


        <div class="form-group">
            <div class="col-sm-12">
              <button type="submit" class="btn btn-primary btn-blue" id="btnUpdateCita" style="margin-left: 0px;">Actualizar
              </button>
              <button type="button" class="btn btn-secundary btn-default" data-dismiss="modal" aria-label="Close" style="font-size: 13px; padding: 7px 12px;">Cancelar</button>
              <img src="<?php echo PUBLIC_IMG; ?>/loading.gif" alt="espere por favor..." class="waitAjax" id="waitAjaxCitas"/>
            </div>
        </div>

        <input type="hidden" id='idCita' name="idCita">

        </form>
      </div>

    </div>
  </div>
</div>