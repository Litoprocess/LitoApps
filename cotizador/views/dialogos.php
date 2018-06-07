 <!-- Dialogos Header -->
 <div id="dialogabrir" class="modal modal-fixed-footer">
  <div class="modal-content">
    <div  class="col s12 modal-header">
      <h3>Abrir</h3>
    </div>      
    <div class="row">
      <div class="col s12">
        <span class="lblencabezados">No.Cotización</span>
        <div class="input-field inline">
          <input id="folio2" name="folio2" type="number" class="validate browser-default">
          <label for="folio2"></label>
        </div>
      </div> 
      <div class="col s12">
        <span class="lblencabezados">Ord. Producción</span>
        <div class="input-field inline">
          <input id="folio3" name="folio3" type="number" class="validate browser-default">
          <label for="folio3"></label>
        </div>
      </div> 
      <div class="col s12">
        <span class="lblencabezados">No.Metrix</span>
        <div class="input-field inline">
          <input id="folio4" name="folio4" type="number" class="validate browser-default">
          <label for="folio4"></label>
        </div>
      </div> 
    </div>
  </div>
  <div class="modal-footer">
    <a id="aceptarabrir" href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Aceptar</a>
    <a id="cancelar" href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Cancelar</a>
  </div>
</div> 

<div id="dialogoguardar" class="modal modal-fixed-footer">
  <div class="modal-content">
    <div class="col s12 modal-header">
      <h3>Datos Guardados</h3>
    </div>       
    <br><br><br><strong style="font-size:20px;"><center>¿Como deseas guardar tus datos?</center></strong>
  </div>
  <div class="modal-footer">
    <a id="actualizar" href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Actualizar</a>
    <a id="guardarnuevo" href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Guardar Nuevo</a>
    <a id="cancelar2" href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Cancelar</a>
  </div>    
</div> 

<div id="dialogoguardar2" class="modal modal-fixed-footer">
  <div class="modal-content">
    <div class="col s12 modal-header">
      <h3>Datos Guardados</h3>
    </div>       
       <br><br><br><strong style="font-size:20px;"><center>El registro se actualizo correctamente</center></strong>    
  </div>
  <div class="modal-footer">
    <a id="aceptar2" href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Actualizar</a>
  </div>    
</div>

<div id="dialogoerror" class="modal modal-fixed-footer">
  <div class="modal-content">
    <div class="col s12 modal-header">
      <h3>Error</h3>
    </div>       
       <br><br><br><strong style="font-size:20px;"><center>Error los datos no se han guardado</center></strong>    
  </div>
  <div class="modal-footer">
    <a id="aceptar3" href="#!" class="modal-action modal-close waves-effect waves-green btn-flat "></a>
  </div>    
</div>

<div id="dialogo_datosguardados" class="modal modal-fixed-footer">
  <div class="modal-content">
    <div class="col s12 modal-header">
      <h3>Datos Guardados</h3>
    </div>       
       <br><br><br><strong style="font-size:20px;"><center id="asignofolio"></center></strong>        
  </div>
  <div class="modal-footer">
    <a id="aceptar4" href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Aceptar</a>
  </div>   
</div>

<div id="dialogo_or_production" class="modal modal-fixed-footer">
  <div class="modal-content">
    <div class="col s12 modal-header">
      <h3>Datos Guardados</h3>
    </div>      
    <br><br><br><strong style="font-size:20px;"><center id="asignaordprod"></center></strong>    
  </div>
  <div class="modal-footer">
    <a id="aceptarordprod" href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Aceptar</a>
  </div>
</div> 





<div id="dialogo_imp_orden" class="modal modal-fixed-footer">
  <div class="modal-content">
    <div class="col s12 modal-header">
      <h3>Datos Guardados</h3>
    </div>      
    <div class="row">

      <div class="col s12">
        <span class="lblencabezados">Fecha de entrega:</span>
        <div class="input-field inline">
          <input id="fentrega" name="fentrega" type="date" class="validate browser-default">
          <label for="fentrega"></label>
        </div>
      </div> 
      <div class="col s12">
        <span class="lblencabezados">No.Orden Metrics</span>
        <div class="input-field inline">
          <input id="matrix" name="matrix" type="text" class="validate browser-default">
          <label for="matrix"></label>
        </div>
      </div> 

    </div>
  </div>
  <div class="modal-footer">
    <a id="aceptarimporden" href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Aceptar</a>
  </div>
</div> 

<div id="dialogo_limpiar" class="modal modal-fixed-footer">
  <div class="modal-content">
    <div class="row">
      <div class="col s12 modal-header">
        <h3>Limpiar Formulario</h3>
      </div>  
      <br><br><br><strong style="font-size:20px;"><center>Deseas borrar todos los datos?</center></strong>                     
    </div>
  </div>
  <div class="modal-footer">
    <a id="aceptarlimpiar" href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Aceptar</a>
    <a id="cancelarlimpir" href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Cancelar</a>
  </div>    
</div> 

<!-- Dialogos Body -->
<div id="dialog_mat_especial" class="modal modal-fixed-footer">
  <div class="modal-content">
    <div class="row">
      <div class="col s12 modal-header">
        <h3>REGISTRO DE MATERIAL ESPECIAL</h3>
      </div>  
      <form id="form_mat_especial_mat" method="POST" action="nuevo_mat_especial.php">
        <div class="col s12">
          <span>Nombre Material:</span>
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
    <a id="aceptar_mat_especial" href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Aceptar</a>
    <a id="cancelar6" href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Cancelar</a>
  </div>    
</div> 
