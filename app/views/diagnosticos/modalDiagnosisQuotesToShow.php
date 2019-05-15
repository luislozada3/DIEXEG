<div class="modal fade bd-example-modal-lg modalDiagnosisQuotesToShow" id='modalDiagnosisQuotesToShow' tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      
      <div class="modal-header" style="border-bottom: none;">
        <h5 class="modal-title" id="titleModalDiagnosis">Diagnosticar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">


        <form class="form-horizontal form-material" action="return false;" onsubmit="return false;" id="formAddCita">

          <div class="form-group" id="contentSintomasModal">
            <div class="row">
              
              <div class="col-md-6">
                <label> Sintomas</label>
                <div id="sintomasModal">
                  
                </div>
              </div>

              <div class="col-md-6">
                <label> Sintoma del paciente <span class="fa fa-plus" id="btnAddSintoma"></span></label>  
                <div class="col-md-12s" id="contentInputAddSintoma" style="display: none;">
                  <input type="text" id="inputAddSintoma" placeholder="Agregar sintoma desconocido">
                  <button type="button" class="btn btn-default" id="btnInputAddSintoma"> agregar </button>
                </div>
                <div id="sintomasPacienteModal">
                  
                </div>
              </div>

            </div>
          </div>

        </div>

        <div class="container">
          <div class="row">
              <div class="col-sm-12">
                <div id="diagnosisResponse"></div>
              </div>
          </div>
        </div>

        <div class="form-group">
            <div class="col-sm-12">
              <input type="hidden" id="modal_cita_id">
              <button type="submit" class="btn btn-primary btn-blue" id="btnAddCita" style="margin-left: 0px;">Aceptar
              </button>
              <button type="button" class="btn btn-secundary btn-default" data-dismiss="modal" aria-label="Close" style="font-size: 13px; padding: 7px 12px;" id="cancelform">Cancelar</button>
            </div>
        </div>

        </form>

        <form class="form-horizontal form-material" action="return false;" onsubmit="return false;" id="formAddDiagnosisPersonalizado">
          
          <div class="form-group">
            <label class="col-md-12" for="diagnostico">No se encontro ninguna enfermedad coincidente si conoce la enfermedad ingresala por favor:</label>
            <div class="col-md-12">
              <input type="text" class="form-control form-control-line" id="diagnostico" name="diagnostico" autocomplete="off">
              <span class="textHelp" id='textHelpNew'></span>
            </div>
          </div>

          <div class="form-group">
              <div class="col-sm-12">
                <button type="submit" class="btn btn-primary btn-blue" id="btnFormAddDiagnosisPersonalizado" style="margin-left: 0px;">Aceptar
                </button>
                <button type="button" class="btn btn-secundary btn-default" data-dismiss="modal" aria-label="Close" style="font-size: 13px; padding: 7px 12px;">Cancelar</button>
              </div>
          </div>

        </form>
        
      </div>
      


    </div>
  </div>
</div>