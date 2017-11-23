<?php require 'views/head.php'; ?>
<?php $fecha=date("d-m-Y"); ?>
<main>
  <div class="container">
    <div class="row">
      <form id="form1" class="col s12" method="POST">
        <div id="box-continer" class="col s10">
        <div class="row" id="datos-encabezado">
          <div class="col s10">
            <div class="row">
              <div class="col s12 margen">
                <span class="lblencabezados">Fecha:</span>
                <div class="input-field inline">
                  <input id="fecha" name="fecha" type="text" class="validate browser-default txtencabezado" placeholder="<?php echo $fecha; ?>" readonly>
                  <label for="fecha"></label>
                </div>
              </div>
              <div class="col s12 margen">
                <span class="lblencabezados">Orden de Producción:</span>
                <div class="input-field inline">
                  <input id="ordprod" name="ordprod" type="text" class="validate browser-default txtencabezado" placeholder="NO HAY ORDEN DE PRODUCCIÓN" readonly>
                  <label for="ordprod"></label>
                </div>
              </div>
              <div class="col s12 margen">
                <span class="lblencabezados">No.Orden Metrics:</span>
                <div class="input-field inline">
                  <input id="nometrics" name="nometrics" type="text" class="validate browser-default txtencabezado" placeholder="SIN NUMERO DE METRICS" readonly>
                  <label for="nometrics"></label>
                </div>
              </div>        
              <div class="col s12 margen">
                <span class="lblencabezados">Cotización</span>
                <div class="input-field inline">
                  <input id="foliob" name="foliob" type="text" class="validate browser-default txtencabezado" placeholder="SIN NUMERO DE COTIZACIÓN" readonly>
                  <label for="foliob"></label>
                </div>
              </div> 
              <div class="col s12 margen">
                <span class="lblencabezados">Cliente</span>
                <div class="input-field inline">
                  <input id="cliente" name="cliente" type="text" class="validate browser-default txtencabezado2">
                  <label for="cliente"></label>
                </div>
              </div>  
              <div class="col s12 margen">
                <span class="lblencabezados">Trabajo</span>
                <div class="input-field inline">
                  <input id="trabajo" name="trabajo" type="text" class="validate browser-default txtencabezado2">
                  <label for="trabajo"></label>
                </div>
              </div> 
            </div>
          </div>      
        </div>

        <div class="row" id="datos-cuerpo">
          <div class="col s8">
            <div class="row">

              <div class="col s5">
                <div class="row">
                  <div class="col s12 margen">
                    <span class="lblcuerpo">Cantidad</span>
                    <div class="input-field inline">
                      <input id="cantidad" name="cantidad" type="number" class="validate browser-default txtcuerpo" value="0" readonly>
                      <label for="cantidad"></label>
                    </div>
                    <div class="datos-column-izq-der" style="display:inline-block;">piezas.</div>
                  </div>             

                  <div class="col s12 margen">
                    <span class="lblcuerpo">Ancho</span>
                    <div class="input-field inline">
                      <input id="ancho" name="ancho" type="number" class="validate browser-default txtcuerpo" value="0" readonly>
                      <label for="ancho"></label>
                    </div>
                    <div class="datos-column-izq-der" style="display:inline-block;">cm.</div>
                  </div>  

                  <div class="col s12 margen">
                    <span class="lblcuerpo">Alto</span>
                    <div class="input-field inline">
                      <input id="alto" name="alto" type="number" class="validate browser-default txtcuerpo" value="0" readonly>
                      <label for="alto"></label>
                    </div>
                    <div class="datos-column-izq-der" style="display:inline-block;">cm.</div>
                  </div>    

                  <div class="col s12 margen">
                    <span class="lblcuerpo">Medianil Ancho:</span>
                    <div class="input-field inline">
                      <input id="medancho" name="medancho" type="number" class="validate browser-default txtcuerpo" value="0" readonly>
                      <label for="medancho"></label>
                    </div>
                    <div class="datos-column-izq-der" style="display:inline-block;">cm.</div>
                  </div>  

                  <div class="col s12 margen">
                    <span class="lblcuerpo">Medianil Alto:</span>
                    <div class="input-field inline">
                      <input id="medalto" name="medalto" type="number" class="validate browser-default txtcuerpo" value="0" readonly>
                      <label for="medalto"></label>
                    </div>
                    <div class="datos-column-izq-der" style="display:inline-block;">cm.</div>
                  </div>   

                  <div class="col s12 margen">
                    <span class="lblcuerpo">Total Ancho:</span>
                    <div class="input-field inline">
                      <input id="totancho" name="totancho" type="number" class="validate browser-default txtcuerpo" value="0" readonly>
                      <label for="totancho"></label>
                    </div>
                    <div class="datos-column-izq-der" style="display:inline-block;">cm.</div>
                  </div>     

                  <div class="col s12 margen">
                    <span class="lblcuerpo">Total Ancho:</span>
                    <div class="input-field inline">
                      <input id="totalto" name="totalto" type="number" class="validate browser-default txtcuerpo" value="0" readonly>
                      <label for="totalto"></label>
                    </div>
                    <div class="datos-column-izq-der" style="display:inline-block;">cm.</div>
                  </div>                                                  

                </div>               
              </div>
              <div class="col s7 collection">
                <div class="row">
                  <div class="col s12">
                    <p>
                      <input type="checkbox" id="mat_especial" name="mat_especial" />
                      <label for="mat_especial">Material Especial</label>
                    </p>            
                  </div>
                  <div id="div_medida_especial" class="col s12" hidde>
                      <label for="medida_especial"></label>
                      <select id="medida_especial" name="medidas_especial">
                          <option value="0">ninguno</option>
                      </select>
                      <h3 id="titMat2"></h3>
                  </div>                     
                  <div id="div_medidas" class="col s12">
                    <br>
                    <br>
                    <h3 id="titMat"></h3>
                    <span>Selecciona la medida que desea cotizar</span>
                    <br>
                    <label for="medidas"></label>
                    <select id="medidas" name="medidas" class="browser-default">
                      <option value="ninguno" selected>Ninguno</option>
                      <option value="1">Option 1</option>
                      <option value="2">Option 2</option>
                      <option value="3">Option 3</option>
                    </select>   
                    <br>                   
                  </div> 
                  <div class="col s12">
                    <table id="tblmedidas" class="compact" cellspacing="0" width="100%" style="text-align: center; font-size:9pt;">
                      <thead>
                        <tr>
                          <th>Material</th>
                          <th>Medida</th>
                          <th>Ancho</th>
                          <th>Alto</th>
                          <th>Entran</th>
                          <th>%Aprox</th>
                          <th>Orientación</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                              <label for="material"></label>
                              <select id="material" name="material" class="browser-default" style="width: 50px; border: none 0em;">
                                <option value="0" disabled selected>Ninguno</option>
                                <option value="1">Option 1</option>
                                <option value="2">Option 2</option>
                                <option value="3">Option 3</option>
                              </select>                                              
                          </td>
                          <td> 
                            <div class="input-field">
                              <input id="m_medida" name="m_medida" type="number" class="validate browser-default txtinpttable" value="0" readonly>
                              <label for="m_medida"></label>
                            </div>                                                     
                          </td>                          
                          <td> 
                            <div class="input-field">
                              <input id="m_ancho" name="m_ancho" type="number" class="validate browser-default txtinpttable" value="0" readonly>
                              <label for="m_ancho"></label>
                            </div>                                                     
                          </td>
                          <td>
                            <div class="input-field">
                              <input id="m_alto" name="m_alto" type="number" class="validate browser-default txtinpttable" value="0" readonly>
                              <label for="m_alto"></label>
                            </div>                              
                          </td>
                          <td>
                            <div class="input-field">
                              <input id="m_entra" name="m_entra" type="number" class="validate browser-default txtinpttable" value="0" readonly>
                              <label for="m_entra"></label>
                            </div>                             
                          </td>
                          <td>
                            <div class="input-field">
                              <input id="m_aprov" name="m_aprov" type="number" class="validate browser-default txtinpttable" value="0" readonly>
                              <label for="m_aprov"></label>
                            </div>                              
                          </td>
                          <td>
                            <div class="input-field">
                              <input id="m_orienta" name="m_orienta" type="number" class="validate browser-default txtinpttable" value="0" readonly>
                              <label for="m_orienta"></label>
                            </div>                             
                          </td>
                        </tr>
                      </tbody>
                    </table>                                                
                  </div>             
                </div>
              </div>
            </div>
          </div>
          <div class="col s3 collection2" style="margin-left:20px;">
            <div class="row">
              <div class="col s12" style="text-align:center;">
                <span class="lblcant-tit">
                  <strong>MATERIAL</strong>
                </span>
              </div>
              <div class="col s12 margen">
                <span class="lblcuerpo">Cantidad</span>
                <div class="input-field inline">
                  <input id="resCant" name="resCant" type="number" class="validate browser-default txtcuerpo" value="0" readonly>
                  <label for="resCant"></label> 
                  <span id="titCantMat" name="titCantMat"></span>              
                </div>
              </div>               
              <div class="col s12 margen">
                <span class="lblcuerpo">Precio</span>
                <div class="input-field inline">
                  <input id="resPrecio" name="resPrecio" type="number" class="validate browser-default txtcuerpo" value="0" readonly>
                  <label for="resPrecio"></label>                   
                </div>
              </div> 
            </div>
            <div class="row" style="margin-top: 20px;">
              <div class="col s12" style="text-align:center;">
                <span class="lblcant-tit">
                  <strong>IMPRESIÓN</strong>
                </span>
              </div>                
              <div class="col s12 margen">
                <span class="lblcuerpo">Precio</span>
                <div class="input-field inline">
                  <input id="resTinta" name="resTinta" type="number" class="validate browser-default txtcuerpo" value="0" readonly>
                  <label for="resTinta"></label>                   
                </div>
              </div> 
              <div class="col s12 margen">
                <span class="lblcuerpo">Barniz</span>
                <div class="input-field inline">
                  <input id="resB" name="resB" type="number" class="validate browser-default txtcuerpo" value="0" readonly>
                  <label for="resB"></label>                   
                </div>
              </div> 
              <div class="col s12 margen">
                <span class="lblcuerpo">Blanco</span>
                <div class="input-field inline">
                  <input id="resBlanco" name="resBlanco" type="number" class="validate browser-default txtcuerpo" value="0" readonly>
                  <label for="resBlanco"></label>                   
                </div>
              </div>
            </div>
            <div class="row" style="margin-top: 20px;">
              <div class="col s12" style="text-align:center;">
                <span class="lblcant-tit">
                  <strong>ACABADOS</strong>
                </span>
              </div>                
              <div class="col s12 margen">
                <span id="label-Acab1" class="lblcuerpo">Acabado1:</span>
                <div class="input-field inline">
                  <input id="resAcab1" name="resAcab1" type="number" class="validate browser-default txtcuerpo" value="0" readonly>
                  <label for="resAcab1"></label>                   
                </div>
              </div> 
              <div class="col s12 margen">
                <span id="label-Acab2" class="lblcuerpo">Acabado2:</span>
                <div class="input-field inline">
                  <input id="resAcab2" name="resAcab2" type="number" class="validate browser-default txtcuerpo" value="0" readonly>
                  <label for="resAcab2"></label>                   
                </div>
              </div> 
              <div class="col s12 margen">
                <span id="label-Acab3" class="lblcuerpo">Acabado3:</span>
                <div class="input-field inline">
                  <input id="resAcab3" name="resAcab3" type="number" class="validate browser-default txtcuerpo" value="0" readonly>
                  <label for="resAcab3"></label>                   
                </div>
              </div>
              <div class="col s12 margen">
                <span id="label-Acab4" class="lblcuerpo">Acabado4:</span>
                <div class="input-field inline">
                  <input id="resAcab4" name="resAcab4" type="number" class="validate browser-default txtcuerpo" value="0" readonly>
                  <label for="resAcab4"></label>                  
                </div>
              </div> 
              <div class="col s12 margen">
                <span id="label-Acab5" class="lblcuerpo">Acabado5:</span>
                <div class="input-field inline">
                  <input id="resAcab5" name="resAcab5" type="number" class="validate browser-default txtcuerpo" value="0" readonly>
                  <label for="resAcab5"></label>                   
                </div>
              </div> 
              <div class="col s12 margen">
                <span id="label-Acab6" class="lblcuerpo">Acabado6:</span>
                <div class="input-field inline">
                  <input id="resAcab6" name="resAcab6" type="number" class="validate browser-default txtcuerpo" value="0" readonly>
                  <label for="resAcab6"></label>                   
                </div>
              </div>            
            </div>
          </div>
        </div>

        <div class="row" style="margin-top:-15px;">
          <div class="col s8">
            <div class="row">
              <div id="tintas" class="col s12">
                <h3>Tintas:</h3>
              </div>
              <div class="col s2" style="margin-top:8px;">
                <span>Resolución:</span>
              </div>
              <div class="col s2">
                <p>
                  <input name="resolucion" type="radio" id="720" />
                  <label for="720">720</label>
                </p>                   
              </div>
              <div class="col s2">
                <p>
                  <input name="resolucion" type="radio" id="1440" />
                  <label for="1440">1440</label>
                </p>                   
              </div>        
              <div class="col s3">
                <p>
                  <input name="resolucion" type="radio" id="0" />
                  <label for="0">s/impresión</label>
                </p>                   
              </div>  
              <div class="col s2">
                <p>
                  <input name="resolucion" type="radio" id="Sandwich" />
                  <label for="Sandwich">Sandwich</label>
                </p>                   
              </div>   
              <div class="col s2" style="margin-top:8px;">
                <span>Blanco:</span>
              </div>      
              <div class="col 3">
                <p>
                  <input type="checkbox" id="blanco" />
                  <label for="blanco"></label>
                </p>        
              </div>
            </div>
          </div>
          <div class="col s3 collection3" style="margin-left:20px;">
            <div class="row">
              <div class="col s12" style="text-align:center;">
                <span class="lblcant-tit">
                  <strong>ADICIONALES</strong>
                </span>
              </div>                
              <div class="col s12 margen">
                <span id="label-Adic1" class="lblcuerpo">Adicional1:</span>
                <div class="input-field inline">
                  <input id="resAdic1" name="resAdic1" type="number" class="validate browser-default txtcuerpo" value="0" readonly>
                  <label for="resAdic1"></label>                   
                </div>
              </div> 
              <div class="col s12 margen">
                <span id="label-Adic2" class="lblcuerpo">Adicional2:</span>
                <div class="input-field inline">
                  <input id="resAdic2" name="resAdic2" type="number" class="validate browser-default txtcuerpo" value="0" readonly>
                  <label for="resAdic2"></label>                   
                </div>
              </div> 
              <div class="col s12 margen">
                <span id="label-Adic3" class="lblcuerpo">Adicional3:</span>
                <div class="input-field inline">
                  <input id="resAdic3" name="resAdic3" type="number" class="validate browser-default txtcuerpo" value="0" readonly>
                  <label for="resAdic3"></label>                   
                </div>
              </div>
              <div class="col s12 margen">
                <span id="label-Adic4" class="lblcuerpo">Adicional4:</span>
                <div class="input-field inline">
                  <input id="resAdic4" name="resAdic4" type="number" class="validate browser-default txtcuerpo" value="0" readonly>
                  <label for="resAdic4"></label>                  
                </div>
              </div> 
              <div class="col s12 margen">
                <span id="label-Adic5" class="lblcuerpo">Adicional5:</span>
                <div class="input-field inline">
                  <input id="resAdic5" name="resAdic5" type="number" class="validate browser-default txtcuerpo" value="0" readonly>
                  <label for="resAdic5"></label>                   
                </div>
              </div> 
              <div class="col s12 margen">
                <span id="label-Adic6" class="lblcuerpo">Adicional6:</span>
                <div class="input-field inline">
                  <input id="resAdic6" name="resAdic6" type="number" class="validate browser-default txtcuerpo" value="0" readonly>
                  <label for="resAdic6"></label>                   
                </div>
              </div>       
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col s8">
            <div class="row">
              <div id="tintas" class="col s12">
                <h3>Acabados:</h3>
              </div>
              <div class="col s2" style="margin-top:8px;">
                <span>1er.Acabado:</span>
              </div>                
              <div class="col s10">
                <label for="acab1"></label>
                <select id="acab1" name="acab1" class="browser-default">
                  <option value="" disabled selected>Choose your 0option</option>
                  <option value="1">Option 1</option>
                  <option value="2">Option 2</option>
                  <option value="3">Option 3</option>
                </select>                                
              </div>
              <div class="col s2" style="margin-top:8px;">
                <span>2do.Acabado:</span>
              </div>                
              <div class="col s10">
                <label for="acab2"></label>
                <select id="acab2" name="acab2" class="browser-default">
                  <option value="" disabled selected>Choose your option</option>
                  <option value="1">Option 1</option>
                  <option value="2">Option 2</option>
                  <option value="3">Option 3</option>
                </select>                                
              </div>              
              <div class="col s2" style="margin-top:8px;">
                <span>3er.Acabado:</span>
              </div>                
              <div class="col s10">
                <label for="acab3"></label>
                <select id="acab3" name="acab3" class="browser-default">
                  <option value="" disabled selected>Choose your option</option>
                  <option value="1">Option 1</option>
                  <option value="2">Option 2</option>
                  <option value="3">Option 3</option>
                </select>                                
              </div> 
              <div class="col s2" style="margin-top:8px;">
                <span>4to.Acabado:</span>
              </div>                
              <div class="col s10">
                <label for="acab4"></label>
                <select id="acab4" name="acab4" class="browser-default">
                  <option value="" disabled selected>Choose your option</option>
                  <option value="1">Option 1</option>
                  <option value="2">Option 2</option>
                  <option value="3">Option 3</option>
                </select>                                
              </div> 
              <div class="col s2" style="margin-top:8px;">
                <span>5to.Acabado:</span>
              </div>                
              <div class="col s10">
                <label for="acab4"></label>
                <select id="acab4" name="acab4" class="browser-default">
                  <option value="" disabled selected>Choose your option</option>
                  <option value="1">Option 1</option>
                  <option value="2">Option 2</option>
                  <option value="3">Option 3</option>
                </select>                                
              </div> 
              <div class="col s2" style="margin-top:8px;">
                <span>6to.Acabado:</span>
              </div>                
              <div class="col s10">
                <label for="acab6"></label>
                <select id="acab6" name="acab6" class="browser-default">
                  <option value="" disabled selected>Choose your option</option>
                  <option value="1">Option 1</option>
                  <option value="2">Option 2</option>
                  <option value="3">Option 3</option>
                </select>                                
              </div> 
            </div>    
          </div>
        </div>

        <div class="row">
          <div class="col s8">
            <div class="row">
              <div id="tintas" class="col s12">
                <h3>Adicionales:</h3>
              </div>
              <div class="col s10 margen">
                1
                <div class="input-field inline">
                  <input id="adic1" name="adic1" type="text" class="validate browser-default inptsize">
                  <label for="adic1"></label>
                </div>
              </div>
              <div class="input-field col s2 margen">
                <input id="costoadic1" name="costoadic1" type="number" class="validate browser-default inptsize2" value="0">
                <label for="costoadic1"></label>
              </div>
              <div class="col s10 margen">
                2
                <div class="input-field inline">
                  <input id="adic2" name="adic2" type="text" class="validate browser-default inptsize">
                  <label for="adic2"></label>
                </div>
              </div>
              <div class="input-field col s2 margen">
                <input id="costoadic2" name="costoadic2" type="number" class="validate browser-default inptsize2" value="0">
                <label for="costoadic2"></label>
              </div>
              <div class="col s10 margen">
                3
                <div class="input-field inline">
                  <input id="adic3" name="adic3" type="text" class="validate browser-default inptsize">
                  <label for="adic3"></label>
                </div>
              </div>
              <div class="input-field col s2 margen">
                <input id="costoadic3" name="costoadic3" type="number" class="validate browser-default inptsize2" value="0">
                <label for="costoadic3"></label>
              </div>
              <div class="col s10 margen">
                4
                <div class="input-field inline">
                  <input id="adic4" name="adic4" type="text" class="validate browser-default inptsize">
                  <label for="adic4"></label>
                </div>
              </div>
              <div class="input-field col s2 margen">
                <input id="costoadic4" name="costoadic4" type="number" class="validate browser-default inptsize2" value="0">
                <label for="costoadic4"></label>
              </div>
              <div class="col s10 margen">
                5
                <div class="input-field inline">
                  <input id="adic5" name="adic5" type="text" class="validate browser-default inptsize">
                  <label for="adic5"></label>
                </div>
              </div>
              <div class="input-field col s2 margen">
                <input id="costoadic5" name="costoadic5" type="number" class="validate browser-default inptsize2" value="0">
                <label for="costoadic5"></label>
              </div>
              <div class="col s10 margen">
                6
                <div class="input-field inline">
                  <input id="adic6" name="adic6" type="text" class="validate browser-default inptsize">
                  <label for="adic6"></label>
                </div>
              </div>
              <div class="input-field col s2 margen">
                <input id="costoadic6" name="costoadic6" type="number" class="validate browser-default inptsize2" value="0">
                <label for="costoadic6"></label>
              </div>
            </div>    
          </div>
        </div>

        <div class="row">
          <div class="col s8">
            <div class="row">
              <div id="tintas" class="col s12">
                <h3>Observaciones:</h3>
              </div>
              <div class="input-field col s12">
                <textarea id="observaciones" name="observaciones" class="browser-default"></textarea>
                <label for="observaciones"></label>
              </div>
            </div>    
          </div>
        </div>
      </div>
      </form>
    </div>
  </div>
          <div id="datos-footer">
            <div class="div-footer">
              <div class="row">
              <div class="col s12" style="margin-bottom:-0.99rem;">
                <span class="lblfooter">Subtotal:</span>
                <div class="input-field inline">
                  <input id="resSubtotal" name="resSubtotal" type="number" class="validate browser-default txtfooter" value="0" readonly>
                  <label for="resSubtotal"></label>
                </div>
              </div> 
              <div class="col s12" style="margin-bottom:-0.99rem;">
                <span class="lblfooter">Margen:</span>
                <div class="input-field inline">
                  <input id="resMargen" name="resMargen" type="text" class="validate browser-default txtfooter" value="0" readonly>
                  <label for="resMargen"></label>
                  <input id="porcientoMargen" name="porcientoMargen" type="text" class="validate browser-default" value="30" style="width: 30px; margin-left: 5px;">%
                  <label for="porcientoMargen"></label>
                </div>
              </div>
              <div class="col s12" style="margin-bottom:-0.99rem;">
                <span class="lblfooter">Comisión:</span>
                <div class="input-field inline">
                  <input id="resComision" name="resComision" type="text" class="validate browser-default txtfooter" value="0" readonly>
                  <label for="resComision"></label>
                  <input id="porcientoComision" name="porcientoComision" type="text" class="validate browser-default" value="10" style="width: 30px; margin-left: 5px;">%
                  <label for="porcientoComision"></label>
                </div>
              </div>    
              <div class="col s12" style="margin-bottom:-0.99rem;">
                <span class="lblfooter">P.Unitario:</span>
                <div class="input-field inline">
                  <input id="resPreUnit" name="resPreUnit" type="number" class="validate browser-default txtfooter" value="0" readonly>
                  <label for="resPreUnit"></label>
                </div>
              </div> 
              <div class="col s12" style="margin-bottom:-0.99rem;">
                <span class="lblfooter">P.Unitario:</span>
                <div class="input-field inline">
                  <input id="resTotal" name="resTotal" type="number" class="validate browser-default txtfooter" value="0" readonly>
                  <label for="resTotal"></label>
                </div>
              </div> 
              <div class="col s12" style="margin-bottom:-0.99rem;">
                <span class="lblfooter">Total Anterior:</span>
                <div class="input-field inline">
                  <input id="resTotal2" name="resTotal2" type="number" class="validate browser-default txtfooter" value="0" readonly>
                  <label for="resTotal2"></label>
                </div>
              </div> 
              </div>
            </div>              
            </div>

 <?php require 'views/dialogos.php'; ?>

</main>
<?php require '../layout/scripts.php'; ?>
<script type="text/javascript" charset="utf-8" src="js/cot.head.js"></script>
<script type="text/javascript" charset="utf-8" src="js/cot.validacion.js"></script>
<script type="text/javascript" charset="utf-8" src="js/cot.calculos.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  $('.collapsible').collapsible();

/*  $('#tblmedidas').DataTable(
  {           
    "searching": false,
    "scrollCollapse": true,
    "paging":         false,
    "columnDefs": 
      [
      {"className": "dt-center", "targets": "_all"},
      { "width": "8%", "targets": "_all" }        
      ],
    }); 
var table = $('#tblmedidas').DataTable();  */
  });      
</script>
</body>
</html>