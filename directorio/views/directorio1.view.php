<?php require 'head.php' ?>
<main class="container dt-responsive">
  <div class="row">
    <div class="col s12 m12 l12 xl12">      
      <div class="row">
        <div class="input-field col s3 m3 l3 xl3">
          <input id="buscador" type="text" class="validate">
          <label for="buscador">Buscar:</label>
        </div> 
        <div class="input-field col s3">
         <a id ="limpiar" href="#!"></a>    
        </div>         
      </div>

      <div class="row">
        <div class="col s6 m6 l6 xl6">
          <div class="row">
            <div class="col s12 m12 l12 xl12">
              <table id="dirGeneral" class="display row-border compact filtro" cellspacing="0" width="100%">
                <caption style="background: blue;"><b>Direcci�n General</b></caption>
                <thead>
                  <tr class="lista">
                    <th>Extensi�n</th>
                    <th>Nombre</th>
                    <th>�rea</th>         
                    <th>Correo</th>                                                   
                  </tr>
                </thead>
                <tbody class="nombres">
                  <tr class="lista">
                    <td><b>108/808</b></td>
                    <td><b>Fredy Charabati</b></td>
                    <td><b>Director General</b></td>
                    <td><b>fredy@litoprocess.com</b></td>
                  </tr>
                  <tr class="lista">
                    <td>106</td>
                    <td>Susana Correa</td>
                    <td>Secretaria</td>
                    <td>scorrea@litoprocess.com</td>
                  </tr>                                                        
                </tbody>
              </table>          
            </div>
            <div class="col s12 m12 l12 xl12">              
              <table id="dirOpeyVen" class="hover row-border compact filtro" cellspacing="0" width="100%">
                <caption style="background: green;"><b>Direcci�n de Operaciones y Ventas</b></caption>
                <thead>
                  <tr class="lista">
                    <th>Extensi�n</th>
                    <th>Nombre</th>
                    <th>�rea</th>         
                    <th>Correo</th>                                                   
                  </tr>
                </thead>
                <tbody class="nombres">
                  <tr class="lista">
                    <td><b>810</b></td>
                    <td><b>Carlos Charabati</b></td>
                    <td><b>Direcci�n de operaciones y ventas</b></td>
                    <td><b>carlos@litoprocess.com</b></td>
                  </tr>
                  <tr class="lista">
                    <td>107</td>
                    <td>Maribel Tovar</td>
                    <td>Facturaci�n</td>
                    <td>litoprocess@litoprocess.com</td>
                  </tr>                                                        
                </tbody>
              </table>          
            </div>
            <div class="col s12 m12 l12 xl12">              
              <table id="gerSAM" class="hover row-border compact filtro" cellspacing="0" width="100%">
                <caption style="background: red"><b>Ventas SAM</b></caption>
                <thead>
                  <tr class="lista">
                    <th>Extensi�n</th>
                    <th>Nombre</th>
                    <th>�rea</th>         
                    <th>Correo</th>                                                   
                  </tr>
                </thead>
                <tbody id="listasaam" class="nombres">
                  <!--Registros de la BD-->                                                                  
                </tbody>
              </table>          
            </div>
            <div class="col s12 m12 l12 xl12">              
              <table id="gerVentas" class="hover row-border compact filtro" cellspacing="0" width="100%">
                <caption style="background: fuchsia;"><b>Gerencia de ventas</b></caption>
                <thead>
                  <tr class="lista">
                    <th>Extensi�n</th>
                    <th>Nombre</th>
                    <th>�rea</th>         
                    <th>Correo</th>                                                   
                  </tr>
                </thead>
                <tbody id="listaventas" class="nombres">
                  <!--tr class="lista">
                    <td><b>131</b></td>
                    <td><b>Alicia Vargas</b></td>
                    <td><b>Gerente de ventas</b></td>
                    <td><b>avargas@litoprocess.com</b></td>
                  </tr>
                  <tr class="lista">
                    <td>204</td>
                    <td>Ma. Elena Cervantes</td>
                    <td>Aux. Administrativo</td>
                    <td>mcervantes@litoprocess.com</td>
                  </tr>          
                  <tr class="lista">
                    <td>112</td>
                    <td>�ngeles Lamasney</td>
                    <td>Vendedor</td>
                    <td>alamasney@litoprocess.com</td>
                  </tr>
                  <tr class="lista">
                    <td>113</td>
                    <td>Thelma Moreno</td>
                    <td>Vendedor</td>
                    <td>tmoreno@litoprocess.com</td>
                  </tr>
                  <tr class="lista">
                    <td>114</td>
                    <td>Teresa Isunza</td>
                    <td>Vendedor</td>
                    <td>tizunsa@litoprocess.com</td>
                  </tr>
                  <tr class="lista">
                    <td>115</td>
                    <td>Lourdes Ram�rez</td>
                    <td>Vendedor</td>
                    <td>lramirez@litoprocess.com</td>
                  </tr>
                  <tr class="lista">
                    <td>120</td>
                    <td>Ana Garc�a</td>
                    <td>Vendedor</td>
                    <td>agarcia@litoprocess.com</td>
                  </tr>
                  <tr class="lista">
                    <td>122</td>
                    <td>Claudia Pati�o</td>
                    <td>Vendedor</td>
                    <td>cpatino@litoprocess.com</td>
                  </tr>
                  <tr class="lista">
                    <td>124</td>
                    <td>Armando Rossete</td>
                    <td>Vendedor</td>
                    <td>arosete@litoprocess.com</td>
                  </tr>
                  <tr class="lista">
                    <td>125</td>
                    <td>Mercedes Mayo</td>
                    <td>Vendedor</td>
                    <td>mmayo@litoprocess.com</td>
                  </tr>
                  <tr class="lista">
                    <td>128</td>
                    <td>Carolina Rosas</td>
                    <td>Vendedor</td>
                    <td>crosas@litoprocess.com</td>
                  </tr>
                  <tr class="lista">
                    <td>129</td>
                    <td>Luis Cerda</td>
                    <td>Vendedor</td>
                    <td>acerda@litoprocess.com</td>
                  </tr>
                  <tr class="lista">
                    <td>603</td>
                    <td>Roni Zajdman</td>
                    <td>Vendedor</td>
                    <td>rzajdman@litoprocess.com</td>
                  </tr>
                  <tr class="lista">
                    <td>121</td>
                    <td>Sandra Barbosa</td>
                    <td>Vendedora</td>
                    <td>sbarboza@litoprocess.com</td>
                  </tr>           
                  <tr class="lista">
                    <td>221</td>
                    <td>Denisse Solano</td>
                    <td>Vendedor</td>
                    <td>asolano@litoprocess.com</td>
                  </tr> 
                  <tr class="lista">
                    <td>135</td>
                    <td>Ulises Dom�nguez</td>
                    <td>Vendedor</td>
                    <td>udominguez@litoprocess.com</td>
                  </tr>
                  <tr class="lista">
                    <td>226</td>
                    <td>Oswaldo Paniagua</td>
                    <td>Vendedor</td>
                    <td>Sin asignar</td>
                  </tr>          
                  <tr>
                    <td></td>
                    <td></td>
                    <td><b>Cotizaciones</b></td>
                    <td></td>
                  </tr>                              
                  <tr class="lista">
                    <td><b>127</b></td>
                    <td><b>Agust�n Villegas</b></td>
                    <td><b>Jefe de cotizaciones</b></td>
                    <td><b>avillegas@litoprocess.com</b></td>
                  </tr>
                  <tr class="lista">
                    <td>130</td>
                    <td>Silvia Gonz�lez</td>
                    <td>Customer</td>
                    <td>sgonzalez@litoprocess.com</td>
                  </tr>           
                  <tr class="lista">
                    <td>134</td>
                    <td>Caridad Ballesteros</td>
                    <td>Cotizador</td>
                    <td>cballesteros@litoprocess.com</td>
                  </tr>           
                  <tr class="lista">
                    <td>119</td>
                    <td>Alberto Mayen</td>
                    <td>Cotizador</td>
                    <td>lmayen@litoprocess.com</td>
                  </tr> 
                  <tr class="lista">
                    <td>133</td>
                    <td>Ivonne Aceves</td>
                    <td>Cotizador</td>
                    <td>caceves@litoprocess.com</td>
                  </tr>
                  <tr class="lista">
                    <td>111</td>
                    <td>Gabriela Lozada</td>
                    <td>Cotizador</td>
                    <td>glozada@litoprocess.com</td>
                  </tr>
                  <tr class="lista">
                    <td>123</td>
                    <td>Ang�lica S�nchez</td>
                    <td>Cotizador</td>
                    <td>asanchez@litoprocess.com</td>
                  </tr> 
                  <tr class="lista">
                    <td>137</td>
                    <td>Cinthia Jim�nez</td>
                    <td>Cotizador</td>
                    <td>cjimenez@litoprocess.com</td>
                  </tr-->                                                                                                          
                </tbody>
                </table>          
              </div>
            <div class="col s12 m12 l12 xl12">              
              <table id="gerCotizaciones" class="hover row-border compact filtro" cellspacing="0" width="100%">
                <caption style="background: fuchsia;"><b>Cotizaciones</b></caption>
                <thead>
                  <tr class="lista">
                    <th>Extensi�n</th>
                    <th>Nombre</th>
                    <th>�rea</th>         
                    <th>Correo</th>                                                   
                  </tr>
                </thead>
                <tbody id="listacot" class="nombres">
                  <!--tr class="lista">
                    <td><b>131</b></td>
                    <td><b>Alicia Vargas</b></td>
                    <td><b>Gerente de ventas</b></td>
                    <td><b>avargas@litoprocess.com</b></td>
                  </tr>
                  <tr class="lista">
                    <td>204</td>
                    <td>Ma. Elena Cervantes</td>
                    <td>Aux. Administrativo</td>
                    <td>mcervantes@litoprocess.com</td>
                  </tr>          
                  <tr class="lista">
                    <td>112</td>
                    <td>�ngeles Lamasney</td>
                    <td>Vendedor</td>
                    <td>alamasney@litoprocess.com</td>
                  </tr>
                  <tr class="lista">
                    <td>113</td>
                    <td>Thelma Moreno</td>
                    <td>Vendedor</td>
                    <td>tmoreno@litoprocess.com</td>
                  </tr>
                  <tr class="lista">
                    <td>114</td>
                    <td>Teresa Isunza</td>
                    <td>Vendedor</td>
                    <td>tizunsa@litoprocess.com</td>
                  </tr>
                  <tr class="lista">
                    <td>115</td>
                    <td>Lourdes Ram�rez</td>
                    <td>Vendedor</td>
                    <td>lramirez@litoprocess.com</td>
                  </tr>
                  <tr class="lista">
                    <td>120</td>
                    <td>Ana Garc�a</td>
                    <td>Vendedor</td>
                    <td>agarcia@litoprocess.com</td>
                  </tr>
                  <tr class="lista">
                    <td>122</td>
                    <td>Claudia Pati�o</td>
                    <td>Vendedor</td>
                    <td>cpatino@litoprocess.com</td>
                  </tr>
                  <tr class="lista">
                    <td>124</td>
                    <td>Armando Rossete</td>
                    <td>Vendedor</td>
                    <td>arosete@litoprocess.com</td>
                  </tr>
                  <tr class="lista">
                    <td>125</td>
                    <td>Mercedes Mayo</td>
                    <td>Vendedor</td>
                    <td>mmayo@litoprocess.com</td>
                  </tr>
                  <tr class="lista">
                    <td>128</td>
                    <td>Carolina Rosas</td>
                    <td>Vendedor</td>
                    <td>crosas@litoprocess.com</td>
                  </tr>
                  <tr class="lista">
                    <td>129</td>
                    <td>Luis Cerda</td>
                    <td>Vendedor</td>
                    <td>acerda@litoprocess.com</td>
                  </tr>
                  <tr class="lista">
                    <td>603</td>
                    <td>Roni Zajdman</td>
                    <td>Vendedor</td>
                    <td>rzajdman@litoprocess.com</td>
                  </tr>
                  <tr class="lista">
                    <td>121</td>
                    <td>Sandra Barbosa</td>
                    <td>Vendedora</td>
                    <td>sbarboza@litoprocess.com</td>
                  </tr>           
                  <tr class="lista">
                    <td>221</td>
                    <td>Denisse Solano</td>
                    <td>Vendedor</td>
                    <td>asolano@litoprocess.com</td>
                  </tr> 
                  <tr class="lista">
                    <td>135</td>
                    <td>Ulises Dom�nguez</td>
                    <td>Vendedor</td>
                    <td>udominguez@litoprocess.com</td>
                  </tr>
                  <tr class="lista">
                    <td>226</td>
                    <td>Oswaldo Paniagua</td>
                    <td>Vendedor</td>
                    <td>Sin asignar</td>
                  </tr>          
                  <tr>
                    <td></td>
                    <td></td>
                    <td><b>Cotizaciones</b></td>
                    <td></td>
                  </tr>                              
                  <tr class="lista">
                    <td><b>127</b></td>
                    <td><b>Agust�n Villegas</b></td>
                    <td><b>Jefe de cotizaciones</b></td>
                    <td><b>avillegas@litoprocess.com</b></td>
                  </tr>
                  <tr class="lista">
                    <td>130</td>
                    <td>Silvia Gonz�lez</td>
                    <td>Customer</td>
                    <td>sgonzalez@litoprocess.com</td>
                  </tr>           
                  <tr class="lista">
                    <td>134</td>
                    <td>Caridad Ballesteros</td>
                    <td>Cotizador</td>
                    <td>cballesteros@litoprocess.com</td>
                  </tr>           
                  <tr class="lista">
                    <td>119</td>
                    <td>Alberto Mayen</td>
                    <td>Cotizador</td>
                    <td>lmayen@litoprocess.com</td>
                  </tr> 
                  <tr class="lista">
                    <td>133</td>
                    <td>Ivonne Aceves</td>
                    <td>Cotizador</td>
                    <td>caceves@litoprocess.com</td>
                  </tr>
                  <tr class="lista">
                    <td>111</td>
                    <td>Gabriela Lozada</td>
                    <td>Cotizador</td>
                    <td>glozada@litoprocess.com</td>
                  </tr>
                  <tr class="lista">
                    <td>123</td>
                    <td>Ang�lica S�nchez</td>
                    <td>Cotizador</td>
                    <td>asanchez@litoprocess.com</td>
                  </tr> 
                  <tr class="lista">
                    <td>137</td>
                    <td>Cinthia Jim�nez</td>
                    <td>Cotizador</td>
                    <td>cjimenez@litoprocess.com</td>
                  </tr-->                                                                                                          
                </tbody>
                </table>          
              </div>              
              <div class="col s12 m12 l12 xl12">
                <table id="sistemas" class="hover row-border compact filtro" cellspacing="0" width="100%">
                  <caption style="background: orange"><b>Gerencia de Sistemas</b></caption>
                  <thead>
                    <tr class="lista">
                      <th>Extensi�n</th>
                      <th>Nombre</th>
                      <th>�rea</th>         
                      <th>Correo</th>                                                   
                    </tr>
                  </thead>
                  <tbody id="listasistemas" class="nombres">
                    <!--Registros de la BD-->                                                                     
                  </tbody>
                </table>           
              </div>
              <div class="col s12 m12 l12 xl12">
                <table id="gerCalidad" class="hover row-border compact filtro" cellspacing="0" width="100%">
                  <caption style="background: teal"><b>Gerencia de Calidad</b></caption>
                  <thead>
                    <tr class="lista">
                      <th>Extensi�n</th>
                      <th>Nombre</th>
                      <th>�rea</th>         
                      <th>Correo</th>                                                   
                    </tr>
                  </thead>
                  <tbody id="listacalidad" class="nombres">
                    <!--Registros de la BD-->                                                                     
                  </tbody>
                </table>           
              </div>
              <div class="col s12 m12 l12 xl12">
                <table id="administracion" class="hover row-border compact filtro" cellspacing="0" width="100%">
                  <caption style="background: green;"><b>Gerencia Administrativa</b></caption>
                  <thead>
                    <tr class="lista">
                      <th>Extensi�n</th>
                      <th>Nombre</th>
                      <th>�rea</th>         
                      <th>Correo</th>                                                   
                    </tr>
                  </thead>
                  <tbody id="listaadmin" class="nombres">
                    <!--tr class="lista">
                      <td><b>208</b></td>
                      <td><b>Martina Rivera</b></td>
                      <td><b>Gerente Administrativa</b></td>
                      <td><b>mrivera@litoprocess.com</b></td>
                    </tr>
                    <tr class="lista">
                      <td>210</td>
                      <td>Marcos Mart�nez</td>
                      <td>Subcontador</td>
                      <td>mmartinez@litoprocess.com</td>
                    </tr>
                    <tr class="lista">
                      <td>211</td>
                      <td>Montserrat Fuentes</td>
                      <td>Cuentas por cobrar</td>
                      <td>cxc@litoprocess.com</td>
                    </tr>
                    <tr class="lista">
                      <td>213</td>
                      <td>Diana Sarmiento</td>
                      <td>Cuentas por pagar</td>
                      <td>cxp@litoprocess.com</td>
                    </tr>
                    <tr class="lista">
                      <td>217</td>
                      <td>Fernanda de la cruz</td>
                      <td>Auxiliar contable</td>
                      <td>contabilidad@litoprocess.com</td>
                    </tr-->         
                  </tbody>
                </table>           
              </div>
            </div>
          </div>
          <div class="col s6 m6 l6 xl6">
            <div class="row">
              <div class="col s12 m12 l12 xl12">
                <table id="capHumano" class="hover row-border compact filtro" cellspacing="0" width="100%">
                  <caption style="background: teal;"><b>Gerencia de Capital Humano</b></caption>
                  <thead>
                    <tr class="lista">
                      <th>Extensi�n</th>
                      <th>Nombre</th>
                      <th>�rea</th>         
                      <th>Correo</th>                                                   
                    </tr>
                  </thead>
                  <tbody id="listacap" class="nombres">
                    <!--Registros de la BD-->                                                                                     
                  </tbody>
                </table>          
              </div>
              <div class="col s12 m12 l12 xl12">
                <table id="salaJuntas" class="hover row-border compact filtro" cellspacing="0" width="100%">
                  <caption style="background:  olive;"><b>Sala de Juntas</b></caption>
                  <thead>
                    <tr class="lista">
                      <th>Extensi�n</th>
                      <th>Nombre</th>
                      <th>�rea</th>                                                  
                    </tr>
                  </thead>
                  <tbody class="nombres">
                    <tr class="lista">
                      <td>104</td>
                      <td>Sala de Juntas 1</td>
                      <td>Ventas</td>
                    </tr>
                    <tr class="lista">
                      <td>105</td>
                      <td>Sala de Juntas 2</td>
                      <td>Direcci�n</td>
                    </tr>
                    <tr class="lista">
                      <td>301</td>
                      <td>Sala de Juntas 3</td>
                      <td>Clientes</td>
                    </tr>  
                    <tr class="lista">
                      <td>305</td>
                      <td>Sala de Juntas 4</td>
                      <td>3er Piso</td>
                    </tr>                                                                                             
                  </tbody>
                </table>                
              </div>
              <div class="col s12 m12 l12 xl12">
                <table id="gerOperaciones" class="hover row-border compact filtro" cellspacing="0" width="100%">
                  <caption style="background:  maroon;"><b>Gerencia de Operaciones</b></caption>
                  <thead>
                    <tr class="lista">
                      <th>Extensi�n</th>
                      <th>Nombre</th>
                      <th>�rea</th>         
                      <th>Correo</th>                                                   
                    </tr>
                  </thead>
                  <tbody class="nombres">
                    <tr class="lista">
                      <td><b>818</b></td>
                      <td><b>Mois�s Charabati</b></td>
                      <td><b>Gerente de Operaciones</b></td>
                      <td><b>mcharabati@litoprocess.com</b></td>
                    </tr>
                    <tr class="lista">
                      <td>414</td>
                      <td>Ricardo Carrillo</td>
                      <td>Ingeniero de Costos</td>
                      <td>costos_lito@litoprocess.com</td>
                    </tr>
                    <tr class="lista">
                      <td>803</td>
                      <td>Lorena P�rez</td>
                      <td>Jefa de Operaciones</td>
                      <td>lperez@litoprocess.com</td>
                    </tr>          
                    <tr class="lista">
                      <td>109/117</td>
                      <td>Esperanza Vilchis</td>
                      <td>Comprador</td>
                      <td>evilchis@litoprocess.com</td>
                    </tr>
                    <tr class="lista">
                      <td>103</td>
                      <td>Claudia Studer</td>
                      <td>Comprador</td>
                      <td>cstuder@litoprocess.com</td>
                    </tr>  
                    <tr class="lista">
                      <td>102</td>
                      <td>Leticia Hern�ndez</td>
                      <td>Auxiliar de Compras</td>
                      <td>lhernandez@litoprocess.com</td>
                    </tr>
                    <tr class="lista">
                      <td>138</td>
                      <td>Sara� Jim�nez</td>
                      <td>Account Manager</td>
                      <td>sjimenez@litoprocess.com</td>
                    </tr>                                                                                     
                  </tbody>
                </table>                
              </div>
              <div class="col s12 m12 l12 xl12">
                <table id="gerPlanta" class="hover row-border compact filtro" cellspacing="0" width="100%">
                  <caption style="background:  purple;"><b>Gerencia de Planta</b></caption>
                  <thead>
                    <tr class="lista">
                      <th>Extensi�n</th>
                      <th>Nombre</th>
                      <th>�rea</th>         
                      <th>Correo</th>                                                   
                    </tr>
                  </thead>
                  <tbody id="listaprod" class="nombres">
                    <!--tr class="lista">
                      <td><b>805</b></td>
                      <td><b>V�ctor Mart�nez</b></td>
                      <td><b>Gerente de Planta</b></td>
                      <td><b>vmartinez@litoprocess.com</b></td>
                    </tr>
                    <tr class="lista">
                      <td>413</td>
                      <td>Juan Oropeza</td>
                      <td>Planeaci�n</td>
                      <td>planeacion@litoprocess.com</td>
                    </tr>
                    <tr class="lista">            
                      <td>509</td>
                      <td>Lorena P�rez</td>
                      <td>Almac�n</td>
                      <td>almacenlito@litoprocess.com</td>
                    </tr>          
                    <tr class="lista">
                      <td>505</td>
                      <td>Paulina Garc�a</td>
                      <td>Env�os</td>
                      <td>pgarcia@litoprocess.com</td>
                    </tr>
                    <tr class="lista">
                      <td>501</td>
                      <td>Everardo Santiago</td>
                      <td>Jefe de Embarques</td>
                      <td>entregas@litoprocess.com</td>
                    </tr>
                    <tr class="lista">
                      <td>511</td>
                      <td>Lorena Ju�rez</td>
                      <td>Auxiliar de Embarques</td>
                      <td>ljuarezm@litoprocess.com</td>
                    </tr>          
                    <tr class="lista">
                      <td>513</td>
                      <td>Gerardo Maga�a</td>
                      <td>Jefe de Mantenimiento</td>
                      <td>gmagana@litoprocess.com</td>
                    </tr>
                    <tr class="lista">
                      <td>302</td>
                      <td>Ricardo Ibarra</td>
                      <td>Jefe de Preprensa</td>
                      <td>No Asignado</td>
                    </tr>
                    <tr class="lista">
                      <td>815</td>
                      <td>Guillermo Medrano</td>
                      <td>Jefe de Producci�n</td>
                      <td>gmedrano@litoprocess.com</td>
                    </tr>          
                    <tr class="lista">
                      <td>806</td>
                      <td>Rigoberto Gonzalez</td>
                      <td>Offset</td>
                      <td>offset@litoprocess.com</td>
                    </tr>
                    <tr class="lista">
                      <td>507</td>
                      <td>Ana Silvia Sanchez</td>
                      <td>Acabado Manual</td>
                      <td>acabadom@litoprocess.com</td>
                    </tr>
                    <tr class="lista">
                      <td>508</td>
                      <td>Moises Salinas</td>
                      <td>Acabado de Litograf�a</td>
                      <td>acabadol@litoprocess.com</td>
                    </tr> 
                    <tr class="lista">
                      <td>506</td>
                      <td></td>
                      <td>Acabados Especiales</td>
                      <td>sakurai@litoprocess.com</td>
                    </tr>           
                    <tr class="lista">
                      <td>616</td>
                      <td></td>
                      <td>Nuvera</td>
                      <td></td>
                    </tr> 
                    <tr class="lista">
                      <td>504</td>
                      <td></td>
                      <td>Producci�n Planta</td>
                      <td></td>
                    </tr>
                    <tr>
                    <td></td>
                    <td></td>
                      <td><b>Literatura VolksWagen</b></td>
                      <td></td>
                    </tr>
                    <tr class="lista">
                      <td><b>812</b></td>
                      <td><b>Gabriela Campos</b></td>
                      <td><b>Jefe de Literatura VW</b></td>
                      <td><b>gcampos@litoprocess.com</b></td>
                    </tr>            
                    <tr class="lista">
                      <td>515</td>
                      <td>Elvira Rosas</td>
                      <td>Auxiliar Administrativo</td>
                      <td>literaturavw@litoprocess.com</td>
                    </tr>
                    <tr class="lista">
                      <td>813</td>
                      <td>Paola Cortez</td>
                      <td>Auxiliar Administrativo</td>
                      <td>auxiliar_vw@litoprocess.com</td>
                    </tr>
                    <tr class="lista">
                      <td>814</td>
                      <td>Jessica Morales</td>
                      <td>Auxiliar Administrativo</td>
                      <td>adminvw@litoprocess.com</td>
                    </tr>
                    <tr class="lista">
                      <td>516</td>
                      <td>Ma. de los �ngeles Gallegos</td>
                      <td>Supervisor</td>
                      <td>agallegos@litoprocess.com</td>
                    </tr-->            
                  </tbody>
                </table>                
              </div>
              <div class="col s12 m12 l12 xl12">
                <table id="inkKong" class="hover row-border compact filtro" cellspacing="0" width="100%">
                  <caption style="background:  olive;"><b>Ink Kong</b></caption>
                  <thead>
                    <tr class="lista">
                      <th>Extensi�n</th>
                      <th>Nombre</th>
                      <th>�rea</th>         
                      <th>Correo</th>                                                   
                    </tr>
                  </thead>
                  <tbody class="nombres">
                    <tr class="lista">
                      <td><b>216</b></td>
                      <td><b>Edmundo Charabati</b></td>
                      <td><b>Director de Ink Kong</b></td>
                      <td><b>echarabati@litoprocess.com</b></td>
                    </tr>
                    <tr class="lista">
                      <td>306</td>
                      <td>Laura M�ndez</td>
                      <td></td>
                      <td>laurainkkong@ink-kong.com</td>
                    </tr>                                                                
                  </tbody>
                </table>                
              </div>
              <div class="col s12 m12 l12 xl12">
                <table id="vigilancia" class="hover row-border compact filtro" cellspacing="0" width="100%">
                  <caption style="background: navy;"><b>Vigilancia</b></caption>
                  <thead>
                    <tr class="lista">
                      <th>Extensi�n</th>
                      <th>Nombre</th>                                                  
                    </tr>
                  </thead>
                  <tbody class="nombres">
                    <tr class="lista">
                      <td>502</td>
                      <td>Vigilancia And�n</td>
                    </tr>
                    <tr class="lista">
                      <td>503</td>
                      <td>Vigilancia Oficinas</td>
                    </tr>
                    <tr class="lista">
                      <td>802</td>
                      <td>Vigilancia inal�mbrico</td>
                    </tr>                                                                                    
                  </tbody>
                </table>  
              </div>              
            </div>
          </div>
        </div> 
            <div class="row">
              <div class="offset-s4 offset-m4 offset-l4 offset-xl4 col s4 m4 l4 xl4">
                <table id="emergencias" class="hover row-border compact filtro" cellspacing="0" width="100%">
                  <caption style="background:  grey;"><b>Tel�fonos de Emergencias en Naucalpan</b></caption>
                  <thead>
                    <tr class="lista">
                      <th>Dependencia</th>
                      <th>N�mero</th>                                                  
                    </tr>
                  </thead>
                  <tbody class="nombres">
                    <tr class="lista">
                      <td>Polic�a</td>
                      <td>53730291</td>
                    </tr>
                    <tr class="lista">
                      <td>Cruz Roja</td>
                      <td>53732453</td>
                    </tr> 
                    <tr class="lista">
                      <td>Bomberos</td>
                      <td>55603868</td>
                    </tr> 
                    <tr class="lista">
                      <td>Fuga de Gas</td>
                      <td>55603868</td>
                    </tr> 
                    <tr class="lista">
                      <td>Fuga de Agua</td>
                      <td>53711901</td>
                    </tr> 
                    <tr class="lista">
                      <td>Protecci�n Civil</td>
                      <td>53581378</td>
                    </tr>
                  </tbody>
                </table>                 
              </div>
            </div>        

      </div>
    </div>
  </main>
  <?php require '../layout/scripts.php'; ?>
  <script type="text/javascript" src="js/directorio.js"></script>
  <script type='text/javascript' >
  $.expr[':'].icontains = function(obj, index, meta, stack){
    return (obj.textContent || obj.innerText || jQuery(obj).text() || '').toLowerCase().indexOf(meta[3].toLowerCase()) >= 0;
  };

  $(document).ready(function(){
    $('#buscador').change(function(){
     var nombres = $('.nombres');
     var buscando = $(this).val().toLowerCase();
     var filtro='';
     for( var i = 0; i < nombres.length; i++ ){
       filtro = $(nombres[i]).html().toLowerCase();
       for(var x = 0; x < filtro.length; x++ ){
        if( buscando.length == 0 || filtro.indexOf( buscando ) > -1 ){
          $(nombres[i]).parents('.filtro').show(); 
        }else{
         $(nombres[i]).parents('.filtro').hide();
       }
     }
   }
   var buscar = $(this).val().toLowerCase();
   $('.lista td').removeClass('resaltar');
   if(jQuery.trim(buscar) != ''){
     $(".lista td:icontains('" + buscar + "')").addClass('resaltar');
   }
   $("#limpiar").html("<i class='material-icons'>clear</i>")     
 });

    $(document).bind('keydown',function(e){
      if ( e.which == 27 ) {
        $('.lista td').removeClass('resaltar');          
        $('#buscador').val("");
        $('.filtro').show();         
      };
    });

    $("#limpiar").click(function(){
        $('.lista td').removeClass('resaltar');          
        $('#buscador').val("");
        $('.filtro').show(); 
        $("#limpiar").html("")            
    });

  });  
  </script>
</body>
</html>