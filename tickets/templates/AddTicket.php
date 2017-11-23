    <!-- Modal Structure -->
    <div class="container">
      <div id="AddTicket" class="modal modal-fixed-footer">
        <form id="form-ticket" name="form-ticket" method="POST">
         <div class="col s12">
          <a class="waves-effect waves-teal btn-flat right btnx-modal modal-close"><i class="material-icons">close</i></a>
        </div>
        <div class="modal-content">
          <h4 class="center-align">Generar ticket</h4>
          <div class="row">
            <div class="col s12">
              <label>Categoría</label>
              <select id="selCategoria" name="selCategoria" class="browser-default">
                <option value="" disabled selected>Selecciona una opción</option>
              </select>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="input-field col s12">
              <input type="text" name="txtTitulo" id="txtTitulo">
              <label for="txtTitulo">Título</label>
            </div>
          </div>

          <div class="row">
            <div class="input-field col s12">
              <textarea id="txtProblema" name="txtProblema" class="materialize-textarea"></textarea>
              <label for="txtProblema">Solicitud</label>
            </div>
          </div>

          <div class="row">
            <div class="input-field col s6 m2">
              <p>
                <input type="checkbox" class="filled-in" id="chk-correo" />
                <label for="chk-correo">Enviar copia</label>
              </p>
            </div>
            <div class="input-field col s6 m4">
            <input type="text" name="txt-correo2" id="txt-correo2" disabled>
              <label for="txtTitulo">Correo</label>
            </div>
          </div>

        </div>
        <div class="modal-footer">
         <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>
         <button class="btn waves-effect waves-light" type="submit" name="action" >
          Generar 
        </button> 

      </div>
    </form>
  </div>
</div>