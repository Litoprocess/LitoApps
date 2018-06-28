<?php require 'views/head.php'; ?>
<main class="container">
  <div class="row">
    <form id="frmRegistroInventario" method="POST">
      <?php
      $date = new DateTime();
      //$date->format('d-m-Y H:i:s');
      ?>  

      <ul class="collapsible grey lighten-4" data-collapsible="expandible">
        <!--DATOS DEL USUARIO-->
        <li>
          <div class="collapsible-header active"><i class="material-icons">account_circle</i>Datos del Usuario</div>
          <div class="collapsible-body">
            <div class="row">
              <div class="input-field col s2">
                <input id="usuario" name="usuario" type="text" placeholder="Usuario" class="validate" required>
                <label for="usuario">Usuario</label>
              </div>    

              <div class="input-field col s2">
                <input id="correo" name="correo" type="text" placeholder="Correo" class="validate" required>
                <label for="correo">Correo</label>
              </div>    

              <div class="col s2">
                <label for="departamento">Departamento</label>
                <select id="departamento" name="departamento" class="browser-default" required>
                  <option value="" selected disabled>Elije una opción</option>
                  <option value="AcabadoLiteratura">Acabado de Literatura</option>
                  <option value="AcabadoLitografia">Acabado de Litografia</option>
                  <option value="AcabadoManual">Acabado Manual</option>
                  <option value="AcabadosEspeciales">Acabados Especiales</option>
                  <option value="Administracion">Administración</option>
                  <option value="AlmacenMP">Almacen MP</option>
                  <option value="Calidad">Calidad</option>
                  <option value="CapitalHumano">Capital Humano</option>
                  <option value="Compras">Compras</option>
                  <option value="Direccion">Direccion</option>
                  <option value="Embarques">Embarques</option>
                  <option value="ImpresionDigital">Impresion Digital</option>
                  <option value="Mantenimiento">Mantenimiento</option>
                  <option value="Offset">Offset</option>
                  <option value="Preprensa">Preprensa</option>
                  <option value="Produccion">Producción</option>
                  <option value="Sistemas">Sistemas</option>
                  <option value="Ventas">Ventas</option>
                </select>
              </div>   

              <div class="col s2">
                <label for="puesto">Puesto</label>
                <select id="puesto" name="puesto" class="browser-default" required>
                  <option value="" selected disabled>Elije una opción</option>
          <option value='ADD'>Administrador de Datos</option>
          <option value='AL'>Almacenista</option>
          <option value='ADM'>Analista de Metodos</option>
          <option value='AR'>Arreglista</option>
          <option value='AIP'>Asesor In Plant</option>
          <option value='ACH'>Asistente de Capital Humano</option>
          <option value='ACD'>Auditor de Calidad</option>
          <option value='AA'>Auxiliar Administrativo</option>
          <option value='AC'>Auxiliar Contable</option>
          <option value='ACS'>Auxiliar de Compras</option>
          <option value='ALA'>Auxiliar de Logistica</option>
          <option value='AE'>Ayudante</option>
          <option value='CR'>Comprador</option>
          <option value='CO'>Consejero</option>
          <option value='CMS'>Coordinador de Materiales</option>
          <option value='CPP'>Coordinador de Preprensa</option>
          <option value='COR'>Coortador</option>
          <option value='COT'>Cotizador</option>
          <option value='CXC'>Cuentas por Cobrar</option>
          <option value='CXP'>Cunetas por Pagar</option>
          <option value='DG'>Director General</option>
          <option value='DNN'>D.Nuevos Negocios</option>
          <option value='DS'>Desarrollador de Software</option>
          <option value='DR'>Diseñador</option>
          <option value='EV'>Ejecutivo de Ventas</option>
          <option value='EO'>Electromecanico</option>
          <option value='ES'>Envios</option>
          <option value='FN'>Facturacion</option>
          <option value='FR'>Feeder</option>
          <option value='GA'>Gerente Administrativa</option>
          <option value='GC'>Gerente de Calidad</option>
          <option value='GCH'>Gerente de Capital Humano</option>
          <option value='GO'>Gerente de Operaciones</option>
          <option value='GS'>Gerente de Sistemas</option>
          <option value='GSC'>Gerente de Sistemas de Calidad</option>
          <option value='IP'>Ingeniero Procesos</option>
          <option value='ID'>Integracion y Desarrollo</option>
          <option value='JE'>Jefe de Embarques</option>
          <option value='JLVW'>Jefe de Literatura VW</option>
          <option value='JM'>Jefe de Mantenimiento</option>
          <option value='JO'>Jefe de Operaciones</option>
          <option value='JP'>Jefe de Preprensa</option>
          <option value='JPR'>Jefe de Produccion</option>
          <option value='KAM'>Key Account Manager</option>
          <option value='ME'>Mecanico</option>
          <option value='MC'>Mesa de Control</option>
          <option value='MO'>Montacarguista</option>
          <option value='UN'>Nuberas</option>
          <option value='OOP'>Obligaciones Obrero-Patronales</option>
          <option value='OP'>Operador</option>
          <option value='OS'>Operador SAM</option>
          <option value='PP'>Planeador de Produccion</option>
          <option value='RE'>Recepcionista</option>
          <option value='SE'>Secretaria</option>
          <option value='SEH'>Seguridad e Higiene</option>
          <option value='SSI'>Soporte de Sistemas Intelisis</option>
          <option value='ST'>SoporteTecnico</option>
          <option value='SB'>Subcontador</option>
          <option value='SU'>Supervisor</option>                                                              
                </select>
              </div>    

              <div class="col s2">
                <label for="tipoequippo">Tipo de Equipo</label>
                <select id="tipoequippo" name="tipoequippo" class="browser-default" required>
                  <option value="" selected disabled>Elije una opción</option>
                  <option value="Escritorio PC">Escritorio PC</option>
                  <option value="Escritorio MAC">Escritorio MAC</option>                  
                  <option value="Laptop PC">Laptop PC</option>
                  <option value="Laptop MAC">Laptop  MAC</option>
                  <option value="Terminal">Terminal</option>
                  <option value="Otro">Otro</option>                  
                </select>
              </div> 

              <div class="col s2"> Fecha: <?php echo $date->format('d-m-Y');?></div>   

              <!--div class="input-field col s2">
                <input id="fecha" name="fecha" type="text" class="validate" value="" readonly>
                <label for="fecha">Fecha</label>
              </div-->    
            </div>                    

          </div>
        </li>
        <!-- /DATOS DEL USUARIO-->
        <!--ESPECIFICACIONES DEL EQUIPO-->
        <li> 
          <div class="collapsible-header"><i class="material-icons">settings</i>Especificaciones del Equipo</div>
          <div class="collapsible-body">
            <div class="row">
              <div class="offset-s2 col s5">
                <p>Descripción</p>
              </div>
              <div class="col s5">
                <p>Número de Serie</p>
              </div>                  

              <div class="col s2">
                <label>CPU</label>
              </div>
              <div class="input-field col s5">
                <input id="especpu" name="especpu" type="text" class="validate chiquito">
                <label for="especpu"></label>
              </div>    
              <div class="input-field col s5">
                <input id="seriecpu" name="seriecpu" type="text" class="validate chiquito">
                <label for="seriecpu"></label>
              </div>     

              <div class="col s2">
                <label>Monitor</label>
              </div>
              <div class="input-field col s5">
                <input id="espemonitor" name="espemonitor" type="text" class="validate chiquito">
                <label for="espemonitor"></label>
              </div>    
              <div class="input-field col s5">
                <input id="seriemonitor" name="seriemonitor" type="text" class="validate chiquito">
                <label for="seriemonitor"></label>
              </div>     

              <div class="col s2">
                <label>Teclado</label>
              </div>
              <div class="input-field col s5">
                <input id="espeteclado" name="espeteclado" type="text" class="validate chiquito">
                <label for="espeteclado"></label>
              </div>    
              <div class="input-field col s5">
                <input id="serieteclado" name="serieteclado" type="text" class="validate chiquito">
                <label for="serieteclado"></label>
              </div>     

              <div class="col s2">
                <label>Ratón</label>
              </div>
              <div class="input-field col s5">
                <input id="esperaton" name="esperaton" type="text" class="validate chiquito">
                <label for="esperaton"></label>
              </div>    
              <div class="input-field col s5">
                <input id="serieraton" name="serieraton" type="text" class="validate chiquito">
                <label for="serieraton"></label>
              </div>     

              <div class="col s2">
                <label>Bocinas</label>
              </div>
              <div class="input-field col s5">
                <input id="espebocinas" name="espebocinas" type="text" class="validate chiquito">
                <label for="espebocinas"></label>
              </div>    
              <div class="input-field col s5">
                <input id="seriebocinas" name="seriebocinas" type="text" class="validate chiquito">
                <label for="seriebocinas"></label>
              </div>     

              <div class="col s2">
                <label>Lector</label>
              </div>
              <div class="input-field col s5">
                <input id="espelector" name="espelector" type="text" class="validate chiquito">
                <label for="espelector"></label>
              </div>    
              <div class="input-field col s5">
                <input id="serielector" name="serielector" type="text" class="validate chiquito">
                <label for="serielector"></label>
              </div> 
            </div>    

            <div class="row"> 
              <br>
              <div class="offset-s2 col s5">
                <p>Descripción</p>
              </div>
              <div class="col s5">
                <p>Dirección IP</p>
              </div>                  

              <div class="col s2">
                <label>Impresión</label>
              </div>
              <div class="input-field col s5">
                <input id="descimpresion" name="descimpresion" type="text" class="validate chiquito">
                <label for="descimpresion"></label>
              </div>    
              <div class="input-field col s5">
                <input id="ipimpresion" name="ipimpresion" type="text" class="validate chiquito">
                <label for="ipimpresion"></label>
              </div>

              <div class="col s2"></div>
              <div class="input-field col s5">
                <input id="descimpresion2" name="descimpresion2" type="text" class="validate chiquito">
                <label for="descimpresion2"></label>
              </div>    
              <div class="input-field col s5">
                <input id="ipimpresion2" name="ipimpresion2" type="text" class="validate chiquito">
                <label for="ipimpresion2"></label>
              </div>                          
            </div>

            <div class="row"> 
              <br>
              <div class="offset-s2 col s5">
                <p>MAC Address</p>
              </div>
              <div class="col s5">
                <p>Dirección IP</p>
              </div>                  

              <div class="col s2">
                <label>Ethernet</label>
              </div>
              <div class="input-field col s5">
                <input id="macethernet" name="macethernet" type="text" class="validate chiquito">
                <label for="macethernet"></label>
              </div>    
              <div class="input-field col s5">
                <input id="ipethernet" name="ipethernet" type="text" class="validate chiquito">
                <label for="ipethernet"></label>
              </div>

              <div class="col s2">
                <label>WIFI</label>
              </div>
              <div class="input-field col s5">
                <input id="macwifi" name="macwifi" type="text" class="validate chiquito">
                <label for="macwifi"></label>
              </div>    
              <div class="input-field col s5">
                <input id="ipwifi" name="ipwifi" type="text" class="validate chiquito">
                <label for="ipwifi"></label>
              </div>
            </div>

          </div>
        </li>
        <!-- /ESPECIFICACIONES DEL EQUIPO-->
        <!--SISTEMA OPERATIVO Y OFIMATICA-->
        <li>
          <div class="collapsible-header"><i class="material-icons">desktop_windows</i>Sistema Operativo y Ofimatica</div>
          <div class="collapsible-body">

            <div class="row">
              <div class="col s4">
                <div class="row">
                  <div class="col s12">
                    <p>Sistema Operativo</p>
                  </div>                     
                </div>

                <label for="sistope">Sistema Operativo</label>
                <select id="sistope" name="sistope" class="browser-default">
                  <option value="" selected>Elije una opción</option>
                  <option value="WidowsXP">Widows XP</option>
                  <option value="WidowsVista">Widows Vista</option>                  
                  <option value="Windows7">Windows 7</option>
                  <option value="Windows8">Windows 8</option>
                  <option value="Windows8.1">Windows 8.1</option>
                  <option value="Windows10">Windows 10</option>
                  <option value="WindowsServer2008">Windows Server 2008</option>
                  <option value="WindowsServer2012">Windows Server 2012</option>                  
                  <option value="Leopard">Mac OS X 10.5 "Leopard"</option>
                  <option value="SnowLeopard">Mac OS X 10.6 "Snow Leopard"</option>
                  <option value="Lion">Mac OS X 10.7 "Lion"</option>
                  <option value="MountainLion">Mac OS X 10.8 "Mountain Lion"</option>
                  <option value="Mavericks">Mac OS X 10.9 "Mavericks"</option>
                  <option value="Yosemite">Mac OS X 10.10 "Yosemite"</option>
                  <option value="ElCapitan">Mac OS X 10.11 "El Capitan"</option>
                  <option value="Sierra">Mac OS X 10.12 "Sierra"</option>   
                  <option value="HighSierra">Mac OS X 10.13 "High Sierra"</option>                                                                       


                </select>                

                <div class="input-field">
                  <input id="sistopelicencia" name="sistopelicencia" type="text" class="validate">
                  <label for="sistopelicencia">Licencia</label>
                </div>    

                <div class="input-field">
                  <textarea id="sistopeobs" name="sistopeobs" class="materialize-textarea" data-length="120"></textarea>
                  <label for="sistopeobs">Observaciones</label>
                </div>

                <label for="sistopeinternet">Internet</label>
                <select id="sistopeinternet" name="sistopeinternet" class="browser-default">
                  <option value="" selected>Elije una opción</option>
                  <option value="Si">Si</option>
                  <option value="No">No</option>
                </select>
              </div>

              <div class="col s8">
                <div class="col s6">
                  <div class="row">
                    <div class="col s12">
                      <p>Office</p>
                    </div>                     
                  </div>                  
                  <div class="row">
                    <div class="col s12">
                      <label for="versionoffice">Office</label>
                      <select id="versionoffice" name="versionoffice" class="browser-default">
                        <option value="" selected>Elije una opción</option>
                        <option value="2003">2003</option>
                        <option value="2007">2007</option>
                        <option value="2010">2010</option>
                        <option value="2011">2011</option>
                        <option value="2013">2013</option>                      
                        <option value="2016">2016</option>                        
                        <option value="365">365</option>                       
                      </select>                
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                      <input id="ofilicencia" name="ofilicencia" type="text" class="validate">
                      <label for="ofilicencia">Licencia</label>
                    </div> 
                  </div>

                  <div class="row">
                    <div class="input-field col s12">
                      <textarea id="ofiobserva" name="ofiobserva" class="materialize-textarea" data-length="50"></textarea>
                      <label for="ofiobserva">Observaciones</label>
                    </div>
                  </div>

                </div> 
                <div class="col s6">
                  <div class="row">
                    <div class="col s12">
                      <p>Ofimatica</p>
                    </div>                     
                  </div>             

                  <div class="row">
                    <div class="col s3">
                      <label>Word</label>
                    </div>   
                    <div class="col s3">
                      <label for="insword"></label>
                      <select id="insword" name="insword" class="browser-default">                          
                        <option value="Si">Si</option>
                        <option value="No" selected>No</option>
                      </select>
                    </div>    

                    <div class="col s3">
                      <label>Excel</label>
                    </div>  
                    <div class="col s3">
                      <label for="insexcel"></label>
                      <select id="insexcel" name="insexcel" class="browser-default">                          
                        <option value="Si">Si</option>
                        <option value="No" selected>No</option>
                      </select>
                    </div>    

                    <div class="col s3">
                      <label>Power Point</label>
                    </div>  
                    <div class="col s3">
                      <label for="inspower"></label>
                      <select id="inspower" name="inspower" class="browser-default">                          
                        <option value="Si">Si</option>
                        <option value="No" selected>No</option>
                      </select>
                    </div>    

                    <div class="col s3">
                      <label>Outlook</label>
                    </div>                    
                    <div class="col s3">
                      <label for="insoutlook"></label>
                      <select id="insoutlook" name="insoutlook" class="browser-default">
                        <option value="Si">Si</option>
                        <option value="No" selected>No</option>
                      </select>
                    </div>    

                    <div class="col s3">
                      <label>Visio</label>
                    </div>   
                    <div class="col s3">
                      <label for="insvisio"></label>
                      <select id="insvisio" name="insvisio" class="browser-default">
                        <option value="Si">Si</option>
                        <option value="No" selected>No</option>
                      </select>
                    </div>    

                    <div class="col s3">
                      <label>Proyect</label>
                    </div>   
                    <div class="col s3">
                      <label for="insproyect"></label>
                      <select id="insproyect" name="insproyect" class="browser-default">
                        <option value="Si">Si</option>
                        <option value="No" selected>No</option>
                      </select>
                    </div>    

                    <div class="col s3">
                      <label>Cli Correo</label>
                    </div>
                    <div class="col s3">
                      <label for="clicorreo"></label>
                      <select id="clicorreo" name="clicorreo" class="browser-default">
                        <option value="" selected disabled>Elije una opción</option>
                        <option value="Outlook">Outlook</option>
                        <option value="Gmail">Gmail</option>
                        <option value="Mail-Mac"></option>
                      </select>                
                    </div>               
                    <div class="col s3">
                      <label>Firma Correo</label>
                    </div>   
                    <div class="col s3">
                      <label for="reqfirma"></label>
                      <select id="reqfirma" name="reqfirma" class="browser-default">
                        <option value="Si">Si</option>
                        <option value="No" selected>No</option>
                      </select>
                    </div>                      
                  </div>
                </div>                     
              </div>
            </div>

          </div>
        </li>
        <!-- /SISTEMA OPERATIVO Y OFIMATICA-->
        <!--APLICACIONES DE ESCRITORIO Y WEB-->
        <li>
          <div class="collapsible-header"><i class="material-icons">apps</i>Aplicaciones de Escritorio y Web</div>
          <div class="collapsible-body">
            <div class="row">
              <div class="col s8">
                <div class="row">
                  <div class="col s12">
                    <p>Aplicaciones de escritorio</p>
                  </div>                     
                </div>                
                <div class="col s2">
                  <label>Intelisis</label>
                </div>   
                <div class="col s2">
                  <label for="insintelisis"></label>
                  <select id="insintelisis" name="insintelisis" class="browser-default">                          
                    <option value="Si">Si</option>
                    <option value="No" selected>No</option>
                  </select>
                </div>

                <div class="col s2">
                  <label>Apontar</label>
                </div>   
                <div class="col s2">
                  <label for="insapontar"></label>
                  <select id="insapontar" name="insapontar" class="browser-default">                          
                    <option value="Si">Si</option>
                    <option value="No" selected>No</option>
                  </select>
                </div>

                <div class="col s2">
                  <label>JobTrack</label>
                </div>    
                <div class="col s2">
                  <label for="insjobtrack"></label>
                  <select id="insjobtrack" name="insjobtrack" class="browser-default">                          
                    <option value="Si">Si</option>
                    <option value="No" selected>No</option>
                  </select>
                </div>

                <div class="col s2">
                  <label>JTMonitor</label>
                </div>   
                <div class="col s2">
                  <label for="insjtmonitor"></label>
                  <select id="insjtmonitor" name="insjtmonitor" class="browser-default">                          
                    <option value="Si">Si</option>
                    <option value="No" selected>No</option>
                  </select>
                </div>

                <div class="col s2">
                  <label>Planner</label>
                </div>   
                <div class="col s2">
                  <label for="insplanner"></label>
                  <select id="insplanner" name="insplanner" class="browser-default">                          
                    <option value="Si">Si</option>
                    <option value="No" selected>No</option>
                  </select>
                </div>

                <div class="col s2">
                  <label>Printware</label>
                </div>  
                <div class="col s2">
                  <label for="insprintware"></label>
                  <select id="insprintware" name="insprintware" class="browser-default">                          
                    <option value="Si">Si</option>
                    <option value="No" selected>No</option>
                  </select>
                </div>

                <div class="col s2">
                  <label>Crece</label>
                </div>    
                <div class="col s2">
                  <label for="inscrece"></label>
                  <select id="inscrece" name="inscrece" class="browser-default">                          
                    <option value="Si">Si</option>
                    <option value="No" selected>No</option>
                  </select>
                </div>

                <div class="col s2">
                  <label>Chrome</label>
                </div>   
                <div class="col s2">
                  <label for="inschrome"></label>
                  <select id="inschrome" name="inschrome" class="browser-default">                          
                    <option value="Si">Si</option>
                    <option value="No" selected>No</option>
                  </select>
                </div>

                <div class="col s2">
                  <label>Explorer</label>
                </div>    
                <div class="col s2">
                  <label for="insexplorer"></label>
                  <select id="insexplorer" name="insexplorer" class="browser-default">                          
                    <option value="Si">Si</option>
                    <option value="No" selected>No</option>
                  </select>
                </div>

                <div class="col s2">
                  <label>Firefox</label>
                </div>   
                <div class="col s2">
                  <label for="insfirefox"></label>
                  <select id="insfirefox" name="insfirefox" class="browser-default">                          
                    <option value="Si">Si</option>
                    <option value="No" selected>No</option>
                  </select>
                </div>

                <div class="col s2">
                  <label>Safari</label>
                </div>   
                <div class="col s2">
                  <label for="inssafari"></label>
                  <select id="inssafari" name="inssafari" class="browser-default">                          
                    <option value="Si">Si</option>
                    <option value="No" selected>No</option>
                  </select>
                </div>

                <div class="col s2">
                  <label>DBEMetrics</label>
                </div>    
                <div class="col s2">
                  <label for="insdbemetrics"></label>
                  <select id="insdbemetrics" name="insdbemetrics" class="browser-default">                          
                    <option value="Si">Si</option>
                    <option value="No" selected>No</option>
                  </select>
                </div>

                <div class="col s2">
                  <label>DBEIntelisis</label>
                </div>   
                <div class="col s2">
                  <label for="insdbeintelisis"></label>
                  <select id="insdbeintelisis" name="insdbeintelisis" class="browser-default">                          
                    <option value="Si">Si</option>
                    <option value="No" selected>No</option>
                  </select>
                </div>

                <div class="col s2">
                  <label>Acr.Reader</label>
                </div>  
                <div class="col s2">
                  <label for="insreader"></label>
                  <select id="insreader" name="insreader" class="browser-default">                          
                    <option value="Si">Si</option>
                    <option value="No" selected>No</option>
                  </select>
                </div>

                <div class="col s2">
                  <label>Acr.PRO</label>
                </div>   
                <div class="col s2">
                  <label for="insacrpro"></label>
                  <select id="insacrpro" name="insacrpro" class="browser-default">                          
                    <option value="Si">Si</option>
                    <option value="No" selected>No</option>
                  </select>
                </div>

                <div class="col s2">
                  <label>Photoshop</label>
                </div>   
                <div class="col s2">
                  <label for="insphotoshop"></label>
                  <select id="insphotoshop" name="insphotoshop" class="browser-default">                          
                    <option value="Si">Si</option>
                    <option value="No" selected>No</option>
                  </select>
                </div>

                <div class="col s2">
                  <label>Ilustrator</label>
                </div>   
                <div class="col s2">
                  <label for="insilustrator"></label>
                  <select id="insilustrator" name="insilustrator" class="browser-default">                          
                    <option value="Si">Si</option>
                    <option value="No" selected>No</option>
                  </select>
                </div>

                <div class="col s2">
                  <label>In Design</label>
                </div>   
                <div class="col s2">
                  <label for="insindesign"></label>
                  <select id="insindesign" name="insindesign" class="browser-default">                          
                    <option value="Si">Si</option>
                    <option value="No" selected>No</option>
                  </select>
                </div>

                <div class="col s2">
                  <label>Dreamviewer</label>
                </div>  
                <div class="col s2">
                  <label for="insdream"></label>
                  <select id="insdream" name="insdream" class="browser-default">                          
                    <option value="Si">Si</option>
                    <option value="No" selected>No</option>
                  </select>
                </div>                     
              </div> 

              <div class="col s4">
                <div class="row">
                  <div class="col s12">
                    <p>Aplicaciones Web</p>
                  </div>                     
                </div>
                
                <div class="col s3">
                  <label>Satarbucks</label>
                </div>   
                <div class="col s3">
                  <label for="insstarbucks"></label>
                  <select id="insstarbucks" name="insstarbucks" class="browser-default">                          
                    <option value="Si">Si</option>
                    <option value="No" selected>No</option>
                  </select>
                </div>

                <div class="col s3">
                  <label>KrispyKreme</label>
                </div>   
                <div class="col s3">
                  <label for="inskrispy"></label>
                  <select id="inskrispy" name="inskrispy" class="browser-default">                          
                    <option value="Si">Si</option>
                    <option value="No" selected>No</option>
                  </select>
                </div>

                <div class="col s3">
                  <label>DBxtra</label>
                </div>    
                <div class="col s3">
                  <label for="insdbxtra"></label>
                  <select id="insdbxtra" name="insdbxtra" class="browser-default">                          
                    <option value="Si">Si</option>
                    <option value="No" selected>No</option>
                  </select>
                </div>

                <div class="col s3">
                  <label>SAAM</label>
                </div>   
                <div class="col s3">
                  <label for="inssaam"></label>
                  <select id="inssaam" name="inssaam" class="browser-default">                          
                    <option value="Si">Si</option>
                    <option value="No" selected>No</option>
                  </select>
                </div>

                <div class="col s3">
                  <label>DOTS</label>
                </div>   
                <div class="col s3">
                  <label for="insdots"></label>
                  <select id="insdots" name="insdots" class="browser-default">                          
                    <option value="Si">Si</option>
                    <option value="No" selected>No</option>
                  </select>
                </div>

                <div class="col s3">
                  <label style="font-size:11px;">Mesa Control</label>
                </div>  
                <div class="col s3">
                  <label for="insmesacontrol"></label>
                  <select id="insmesacontrol" name="insmesacontrol" class="browser-default">                          
                    <option value="Si">Si</option>
                    <option value="No" selected>No</option>
                  </select>
                </div>

                <div class="col s3">
                  <label style="font-size:11px;">iDashboards</label>
                </div>    
                <div class="col s3">
                  <label for="insidashboards"></label>
                  <select id="insidashboards" name="insidashboards" class="browser-default">                          
                    <option value="Si">Si</option>
                    <option value="No" selected>No</option>
                  </select>
                </div>

                <div class="col s3">
                  <label>Cotizador</label>
                </div>   
                <div class="col s3">
                  <label for="inscotizador"></label>
                  <select id="inscotizador" name="inscotizador" class="browser-default">                          
                    <option value="Si">Si</option>
                    <option value="No" selected>No</option>
                  </select>
                </div>

                <div class="col s2">
                  <label>Otro</label>
                </div>  
                <div class="input-field col s4">
                  <input id="otroapp1" name="otroapp1" type="text" class="validate chiquito">
                  <label for="otroapp1"></label>
                </div>                         
                <div class="col s6">
                  <label for="insotroapp1"></label>
                  <select id="insotroapp1" name="insotroapp1" class="browser-default">                          
                    <option value="Si">Si</option>
                    <option value="No" selected>No</option>
                  </select>
                </div>

                <div class="col s2">
                  <label>Otro</label>
                </div> 
                <div class="input-field col s4">
                  <input id="otroapp2" name="otroapp2" type="text" class="validate chiquito">
                  <label for="otroapp2"></label>
                </div>                         
                <div class="col s6">
                  <label for="insotroapp2"></label>
                  <select id="insotroapp2" name="insotroapp2" class="browser-default">                          
                    <option value="Si">Si</option>
                    <option value="No" selected>No</option>
                  </select>
                </div>                                        
              </div>
            </div>                   
          </div>
        </li>
        <!-- /APLICAIONES DE ESCRITORIO Y WEB-->
        <!--HERRAMIENTAS VARIAS-->
        <li>
          <div class="collapsible-header"><i class="material-icons">build</i>Herramientas varias</div>
          <div class="collapsible-body">
            <div class="col s6">

              <div class="row">
                <div class="col s3">
                  <label>Pdf Editor</label>
                </div>   
                <div class="col s3">
                  <label for="inspdfeditor"></label>
                  <select id="inspdfeditor" name="inspdfeditor" class="browser-default">                          
                    <option value="Si">Si</option>
                    <option value="No" selected>No</option>
                  </select>
                </div>

                <div class="col s3">
                  <label>ITunes</label>
                </div>   
                <div class="col s3">
                  <label for="insitunes"></label>
                  <select id="insitunes" name="insitunes" class="browser-default">                          
                    <option value="Si">Si</option>
                    <option value="No" selected>No</option>
                  </select>
                </div> 

                <div class="col s3">
                  <label>Kies</label>
                </div> 
                <div class="col s3">
                  <label for="inskies"></label>
                  <select id="inskies" name="inskies" class="browser-default">                          
                    <option value="Si">Si</option>
                    <option value="No" selected>No</option>
                  </select>
                </div> 

                <div class="col s3">
                  <label>Lab.Matrix</label>
                </div>  
                <div class="col s3">
                  <label for="inslabmatrixs"></label>
                  <select id="inslabmatrixs" name="inslabmatrixs" class="browser-default">                          
                    <option value="Si">Si</option>
                    <option value="No" selected>No</option>
                  </select>
                </div>

              </div>                  
            </div>

            <div class="col s6">
              <div class="col s2">
                <label>Antivirus</label>
              </div>
              <div class="input-field col s2">
                <input id="antivirus" name="antivirus" type="text" class="validate chiquito">
                <label for="antivirus"></label>
              </div>                         
              <div class="col s2">
                <label for="insantivirus"></label>
                <select id="insantivirus" name="insantivirus" class="browser-default">                          
                  <option value="Si">Si</option>
                  <option value="No" selected>No</option>
                </select>
              </div>

              <div class="col s2">
                <label>Escaner</label>
              </div>
              <div class="input-field col s2">
                <input id="escaner" name="escaner" type="text" class="validate chiquito">
                <label for="escaner"></label>
              </div>                        
              <div class="col s2">
                <label for="insescaner"></label>
                <select id="insescaner" name="insescaner" class="browser-default">                          
                  <option value="Si">Si</option>
                  <option value="No" selected>No</option>
                </select>
              </div> 

              <div class="col s2">
                <label>Otro</label>
              </div>
              <div class="input-field col s2">
                <input id="herrotro1" name="herrotro1" type="text" class="validate chiquito">
                <label for="herrotro1"></label>
              </div>                        
              <div class="col s2">
                <label for="insotroherr1"></label>
                <select id="insotroherr1" name="insotroherr1" class="browser-default">                          
                  <option value="Si">Si</option>
                  <option value="No" selected>No</option>
                </select>
              </div>  

              <div class="col s2">
                <label>Otro</label>
              </div>
              <div class="input-field col s2">
                <input id="herrotro2" name="herrotro2" type="text" class="validate chiquito">
                <label for="herrotro2"></label>
              </div>                        
              <div class="col s2">
                <label for="insotroherr2"></label>
                <select id="insotroherr2" name="insotroherr2" class="browser-default">                          
                  <option value="Si">Si</option>
                  <option value="No" selected>No</option>
                </select>
              </div> 

              <div class="col s2">
                <label>Otro</label>
              </div>
              <div class="input-field col s2">
                <input id="herrotro3" name="herrotro3" type="text" class="validate chiquito">
                <label for="herrotro3"></label>
              </div>                        
              <div class="col s2">
                <label for="insotroherr3"></label>
                <select id="insotroherr3" name="insotroherr3" class="browser-default">                          
                  <option value="Si">Si</option>
                  <option value="No" selected>No</option>
                </select>
              </div>                                                                                                  
            </div>

          </div>
        </li>
        <!-- /HERRAMIENTAS VARIAS-->
        <!--MAPEOS Y COMUNICACIONES-->
        <li>
          <div class="collapsible-header"><i class="material-icons">build</i>Mapeos y Comunicaciones</div>
          <div class="collapsible-body">
            <div class="row">
              <div class="col s8">
                <div class="col s2">
                  <label>Unidad</label>
                </div> 
                <div class="col s4">
                  <label>Ruta</label>
                </div> 
                <div class="col s2">
                  <label>Unidad</label>
                </div> 
                <div class="col s4">
                  <label>Ruta</label>
                </div>
                <div class="input-field col s2">
                  <input id="unidad1" name="unidad1" type="text" class="validate chiquito">
                  <label for="unidad1"></label>
                </div> 
                <div class="input-field col s4">
                  <input id="ruta1" name="ruta1" type="text" class="validate chiquito">
                  <label for="ruta1"></label>
                </div> 
                <div class="input-field col s2">
                  <input id="unidad2" name="unidad2" type="text" class="validate chiquito">
                  <label for="unidad2"></label>
                </div>    
                <div class="input-field col s4">
                  <input id="ruta2" name="ruta2" type="text" class="validate chiquito">
                  <label for="ruta2"></label>
                </div> 
                <div class="input-field col s2">
                  <input id="unidad3" name="unidad3" type="text" class="validate chiquito">
                  <label for="unidad3"></label>
                </div> 
                <div class="input-field col s4">
                  <input id="ruta3" name="ruta3" type="text" class="validate chiquito">
                  <label for="ruta3"></label>
                </div> 
                <div class="input-field col s2">
                  <input id="unidad4" name="unidad4" type="text" class="validate chiquito">
                  <label for="unidad4"></label>
                </div>    
                <div class="input-field col s4">
                  <input id="ruta4" name="ruta4" type="text" class="validate chiquito">
                  <label for="ruta4"></label>
                </div>
                <div class="input-field col s2">
                  <input id="unidad5" name="unidad5" type="text" class="validate chiquito">
                  <label for="unidad5"></label>
                </div> 
                <div class="input-field col s4">
                  <input id="ruta5" name="ruta5" type="text" class="validate chiquito">
                  <label for="ruta5"></label>
                </div> 
                <div class="input-field col s2">
                  <input id="unidad6" name="unidad6" type="text" class="validate chiquito">
                  <label for="unidad6"></label>
                </div>    
                <div class="input-field col s4">
                  <input id="ruta6" name="ruta6" type="text" class="validate chiquito">
                  <label for="ruta6"></label>
                </div>                                                                                                                                
              </div>

              <div class="col s4">
                <div class="col s6">
                  <label>NS Télefono</label>
                </div> 
                <div class="col s6">
                  <label>Extension</label>
                </div>
                <div class="input-field col s6">
                  <input id="nstelefono" name="nstelefono" type="text" class="validate chiquito">
                  <label for="nstelefono"></label>
                </div>    
                <div class="input-field col s6">
                  <input id="extension" name="extension" type="text" class="validate chiquito">
                  <label for="extension"></label>
                </div>                       
              </div>                  
            </div>

          </div>
        </li>
        <!-- /MAPEOS Y COMUNICACIONES-->            
      </ul>

      <div class="row">
        <div class="offset-s3 col s2">
         <!--a id="registrar" class="waves-effect waves-light blue darken-4 btn">Registrar</a-->
         <button id="registrar" class="btn waves-effect waves-light blue darken-4 btn" type="submit" name="registrar">Registrar
        </button>                       
      </div>      
      <div class="offset-s2 col s2">
        <a id="cancelar" class="waves-effect waves-light grey lighten-5 black-text btn">Limpiar</a>
      </div>        
    </div>                
  </form>

</div>
</main>
<?php require '../layout/scripts.php'; ?>
<script type="text/javascript" src="js/registrarInventario.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('.collapsible').collapsible();
  });       
</script>
</body>
</html>