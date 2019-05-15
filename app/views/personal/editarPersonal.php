<div class="modal fade" id="modelUpdatePersonal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-body">
        <form class="form-horizontal form-material" action="return false;" onsubmit="return false;" id="formEditPersonal">

        <div class="container">
          <div class="modal-header" style="border-bottom: none;">
            
            <h4 class="modal-title">
              <span class="fa fa-edit"></span> Actualizar Personal
            </h4>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>

          </div>
        </div>

        <div class="form-group">
          <label class="col-md-12" for="nombre">Nombre</label>
          <div class="col-md-12">
            <input onkeypress="return justLetters(event)" type="text" class="form-control form-control-line" id="nombre" name="nombre" autocomplete="off" maxlength='40'>
            <span class="textHelp"></span>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-12" for="apellido">Apellido</label>
          <div class="col-md-12">
            <input onkeypress="return justLetters(event)" type="text" class="form-control form-control-line" id="apellido" name="apellido" autocomplete="off" maxlength='40'>
            <span class="textHelp"></span>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-12" for="oficio">Oficio</label>
          <div class="col-md-12">

            <select class="form-control form-control-line" id="oficio" name="oficio" autocomple="off" onchange="selectDisabled(event)">
                <option disabled value="">--Seleccione--</option>
                <option value="Secretaria">Secretaria</option>
                <option value="Gastroenterologo">Gastroenterologo</option>
            </select>

            <span class="textHelp"></span>
          </div>
        </div>

<!--         <div class="form-group">
            <label class="col-sm-12" for="tipo">Personal</label>
            <div class="col-sm-12">

                <select class="form-control form-control-line" id="tipo" name="tipo" autocomple="off" onchange="selectDisabled(event)">
                    <option disabled value="">--Seleccione--</option>
                    <option value="medico">M&eacute;dico</option>
                    <option value="personal">Administrativo</option>
                </select>

                <span class="textHelp"></span>

            </div>
        </div> -->

        <input type="hidden" name="id" id="id">
        <input type="hidden" name="tipo" id="type">


        <div class="form-group">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-primary btn-blue" id="btnEditar" style="margin-left: 0px;">Aceptar
                </button>
                <button type="button" class="btn btn-secundary btn-default" data-dismiss="modal" aria-label="Close" style="font-size: 13px; padding: 7px 12px;">Cancelar</button>
                <img src="<?php echo PUBLIC_IMG; ?>/loading.gif" alt="espere por favor..." class="waitAjax"/>
            </div>
        </div>

        </form>
      </div>

    </div>
  </div>
</div>