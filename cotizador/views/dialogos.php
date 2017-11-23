 <!-- Dialogos Header -->
  <div id="dialogabrir" class="modal modal-fixed-footer">
    <div class="modal-content">
      <div id="tintas" class="col s12">
        <h3>Abrir</h3>
      </div>      
      <div class="row">
          <div class="col s12">
          <span>No.Cotización</span>
          <div class="input-field inline">
          <input id="folio2" name="folio2" type="number" class="validate browser-default">
          <label for="folio2"></label>
          </div>
          </div> 
          <div class="col s12">
          <span>Ord. Producción</span>
          <div class="input-field inline">
          <input id="folio3" name="folio3" type="number" class="validate browser-default">
          <label for="folio3"></label>
          </div>
          </div> 
          <div class="col s12">
          <span>No.Metrix</span>
          <div class="input-field inline">
          <input id="folio4" name="folio4" type="number" class="validate browser-default">
          <label for="folio4"></label>
          </div>
          </div> 
      </div>
    </div>
    <div class="modal-footer">
      <a id="aceptar" href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Aceptar</a>
      <a id="cancelar" href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Cancelar</a>
    </div>
  </div> 

  <div id="dialogoguardar" class="modal modal-fixed-footer">
    <div class="modal-content">
      <div id="tintas" class="col s12">
        <h3>Datos Guardados</h3>
      </div>       
      <br/><center>¿Como deseas guardar tus datos?</center>
    </div>
    <div class="modal-footer">
      <a id="actualizar" href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Actualizar</a>
      <a id="guardarnuevo" href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Guardar Nuevo</a>
      <a id="cancelar2" href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Cancelar</a>
    </div>    
  </div> 

  <div id="dialogoguardar2" class="modal modal-fixed-footer">
    <div class="modal-content">
      <div id="tintas" class="col s12">
        <h3>Datos Guardados</h3>
      </div>       
      <br/><center>El registro se actualizo correctamente</center>
    </div>
    <div class="modal-footer">
      <a id="aceptar2" href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Actualizar</a>
    </div>    
  </div>

  <div id="dialogoerror" class="modal modal-fixed-footer">
    <div class="modal-content">
      <div id="tintas" class="col s12">
        <h3>Error</h3>
      </div>       
      <span style="color:red;">Error los datos no se han guardado</span>
    </div>
    <div class="modal-footer">
      <a id="aceptar3" href="#!" class="modal-action modal-close waves-effect waves-green btn-flat "></a>
    </div>    
  </div>

    <div id="dialogo_datosguardados" class="modal modal-fixed-footer">
    <div class="modal-content">
      <div id="tintas" class="col s12">
        <h3>Datos Guardados</h3>
      </div>       
      <br/><center>'Se asigno al folio: <span style="color:red; font-size: 27px;">'+vfolio+'</span>'</center>
    </div>
    <div class="modal-footer">
      <a id="aceptar3" href="#!" class="modal-action modal-close waves-effect waves-green btn-flat "></a>
    </div>    
  </div>

    <div id="dialogo_or_production" class="modal modal-fixed-footer">
    <div class="modal-content">
      <div id="tintas" class="col s12">
        <h3>Datos Guardados</h3>
      </div>       
      <br/><center>'Se genero la orden de producción: <span style="color:red; font-size: 27px;">'+vorprod+'</span><br/><br/>'</center>
    </div>
    <div class="modal-footer">
      <a id="aceptar4" href="#!" class="modal-action modal-close waves-effect waves-green btn-flat "></a>
    </div>    
  </div>  

    <div id="dialogo_imp_orden" class="modal modal-fixed-footer">
    <div class="modal-content">
      <div class="row">
      <div id="tintas" class="col s12">
        <h3>Datos Guardados</h3>
      </div>  
          <div class="col s12">
          <div class="input-field">
          <input id="fentrega" name="fentrega" type="date" class="validate browser-default">
          <label for="fentrega">Fecha de entrega:</label>
          </div>
          </div>   
          <div class="col s12">
          <div class="input-field">
          <input id="matrix" name="matrix" type="text" class="validate browser-default">
          <label for="matrix">NO Orden METRICS</label>
          </div>
          </div>           
    </div>
    </div>
    <div class="modal-footer">
      <a id="aceptar5" href="#!" class="modal-action modal-close waves-effect waves-green btn-flat "></a>
      <a id="cancelar4" href="#!" class="modal-action modal-close waves-effect waves-green btn-flat "></a>
    </div>    
  </div> 

    <div id="dialogolimpiar" class="modal modal-fixed-footer">
    <div class="modal-content">
      <div class="row">
      <div id="tintas" class="col s12">
        <h3>Limpiar Formulario</h3>
      </div>  
      <span>Deseas borrar todos los datos?</span>          
    </div>
    </div>
    <div class="modal-footer">
      <a id="aceptar6" href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Aceptar</a>
      <a id="cancelar5" href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Cancelar</a>
    </div>    
  </div> 

<!-- Dialogos Body -->
    <div id="dialog_mat_especial" class="modal modal-fixed-footer">
    <div class="modal-content">
      <div class="row">
      <div id="tintas" class="col s12">
        <h3>REGISTRO DE MATERIAL ESPECIAL</h3>
      </div>  
      <form id="form_mat_especial_mat" method="POST" action="modelo/nuevo_mat_especial.php">
          <div class="col s12">
          <span>Nombre Material</span>
          <div class="input-field">
          <input id="nom_form_mat" name="nom_form_mat" type="text" class="validate browser-default">
          <label for="nom_form_mat"></label>
          </div>
          </div> 
          <div class="col s12">
          <span>Ancho</span>
          <div class="input-field">
          <input id="ancho_form_mat" name="ancho_form_mat" type="number" class="validate browser-default">
          <label for="ancho_form_mat"></label>
          </div>
          </div> 
          <div class="col s12">
          <span>Alto</span>
          <div class="input-field">
          <input id="alto_form_mat" name="alto_form_mat" type="number" class="validate browser-default">
          <label for="alto_form_mat"></label>
          </div>
          </div> 
          <div class="col s12">
          <span>Alto</span>
          <div class="input-field">
          <input id="alto_form_mat" name="alto_form_mat" type="number" class="validate browser-default">
          <label for="alto_form_mat"></label>
          </div>
          </div>  
            <div class="col s12">
              <br>
              <label for="material_form_mat">Tipo Material</label>
              <select id="material_form_mat" name="material_form_mat" class="browser-default">
                <option value="F" selected>Flexible</option>
                <option value="R">Rigido</option>
                <option value="P">Fotografico</option>
              </select>                      
            </div>
          <div class="col s12">
          <span>Importe</span>
          <div class="input-field">
          <input id="importe_form_mat" name="importe_form_mat" type="number" class="validate browser-default">
          <label for="importe_form_mat"></label>
          </div>
          </div> 
          <div class="col s12">
          <span>Proveedor</span>
          <div class="input-field">
          <input id="proveedor_form_mat" name="proveedor_form_mat" type="text" class="validate browser-default">
          <label for="proveedor_form_mat"></label>
          </div>
          </div> 
              <div class="col s2" style="margin-top:8px;">
                <span>Traslucido</span>
              </div>
              <div class="col s2">
                <p>
                  <input id="traslucido_form_mat_si" name="traslucido_form_mat" type="radio" value="1"/>
                  <label for="traslucido_form_mat_si">Si</label>
                </p>                   
              </div>
              <div class="col s2">
                <p>
                  <input id="traslucido_form_mat_no" name="traslucido_form_mat" type="radio" value="0" checked/>
                  <label for="traslucido_form_mat_no">No</label>
                </p>                   
              </div> 
            <div class="col s12">
              <br>
              <label for="corte_form_mat">Tipo de corte</label>
              <select id="corte_form_mat" name="corte_form_mat" class="browser-default">
                <option value="B" selected>Broca</option>
                <option value="N">Navaja</option>
              </select>                      
            </div>                                                          
      </form>     
    </div>
    </div>
    <div class="modal-footer">
      <a id="limpiar" href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Limpiar</a>
      <a id="aceptar7" href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Aceptar</a>
      <a id="cancelar6" href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Cancelar</a>
    </div>    
  </div> 
           