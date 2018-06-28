$(document).ready(function(){
    
var id_meterial, tblentran,tblAncho,tblAlto,tblaloancho,tblaloalto,tblorientacion,tblmedida,tblaprovecha, proveedor, MedEspecial,acab;    
//--------------------------------------------------------------------------
//                                  FUNCIONES
//--------------------------------------------------------------------------

    $.mat_espacial = function()
    {
        $("#medida_especial").empty("<option>");
        
        var materal_especial=$("#form_mat_especial_mat").serialize();
        $.post("php/nuevo_mat_especial.php",materal_especial,
            function(data)
            {
                if(data.validacion=="true")
                {
                    $('#medida_especial').append($('<option>' ,
                    {
                        checked: true,
                        value: data.idMat,
                        text: data.Nombre
                    }));
                    
                    if (data.Tipo == "R")
                    {
                        var mattipo = "MATERIAL RIGIDO";
                    }
                    else if (data.Tipo == "F")
                    {
                        var mattipo = "MATERIAL FLEXIBLE";
                    }
                    else if (data.Tipo == "P")
                    {
                        var mattipo = "MATERIAL FOTOGRAFICO";
                    }
                    
                    $("#titMat2").html(mattipo);
                    
                    MedEspecial = data.idMat;
                    //$.med_especial(MedEspecial);
                    //var medidaEsp = "medidaEsp="+ MedEspecial;
                    $.post("php/mat_especial.php", {MedEspecial:MedEspecial},
                    function(data)
                        {
                            if(data.validacion=="true")
                            {
                                for(var i=0; i<data.data.length; i++)
                                {
                                    var id_medidas = "1";
                                    var Ancho = parseFloat(data.data[i].ANCHO);
                                    var Alto = parseFloat(data.data[i].ALTO);
                                    var tipo= data.data[i].M_Tipo;
                                    var precio=data.data[i].Importe;                   
                                    //alert(id_medidas + " " + Ancho + " " + Alto + " " + tipo + " " + precio);
                                    $.costomedida(id_medidas, Ancho, Alto, tipo, precio);
                                    $.resolucion720();
                                    $.resolucion1440();
                                    $.Sandwich();                                    
                                    //$.medidasTablaespecial();
                                }
                            }
                        },"json");                    
                }
            },"json"
        );
    }

    /*$.med_especial = function(MedEspecial)
    {
        var medidaEsp = "medidaEsp="+ MedEspecial;
        $.post("php/mat_especial.php", medidaEsp,
        function(data)
            {
                if(data.validacion=="true")
                {
                    for(var i=0; i<data.data.length; i++)
                    {
                        var id_medidas = "1";
                        var Ancho = parseFloat(data.data[i].ANCHO);
                        var Alto = parseFloat(data.data[i].ALTO);
                        var tipo= data.data[i].M_Tipo;
                        var precio=data.data[i].Importe;                   
                        //alert(id_medidas + " " + Ancho + " " + Alto + " " + tipo + " " + precio);
                        $.costomedida(id_medidas, Ancho, Alto, tipo, precio);
                    }
                }
            },"json"
        );
    }*/
    $.costomedida = function(id_medidas, Ancho, Alto, tipo, precio)
    {
        var id_medidas = id_medidas;
        var Ancho = Ancho;
        var Alto = Alto;
        var tipo = tipo;
        var precio = precio;
        
        //alert(id_medidas + " " + Ancho + " " + Alto + " " + tipo + " " + precio);
        
        var totAncho=$("#totancho").val();
        var totAlto=$("#totalto").val();
        var cantidad = $("#cantidad").val();
        var cantidad2 = 0;
        var entran = 0;
        var textoEntran = "entran";
        var valor = 0;
        var valor1 = 0;
        var resAncho = 0;
        var resAlto = 0;
        var resAncho2 = 0;
        var resAlto2 = 0;
        var orientacionAncho = 0;
        var orientacionAlto = 0;
        var aprovech = 0;
        var porcentaje = 0;
        var anchom = 0;
        var altom = 0;
        var anchoMat = 0;
        var entranAncho = 0;
        var entranAlto = 0;
        var a_lo_ancho = 0;
        var a_lo_alto = 0;
        
        //alert(id_medidas + " " + Ancho + " " + Alto + " " + tipo + " " + precio);
        
        /*if(id_medidas == "0")
        {
            $('#m_medida').val("1");
            $('#m_ancho').val("0");
            $('#m_alto').val("0");
            $('#m_entra').val("0");
            $('#m_aprov').val("0");
            $('#m_orienta').val("N/A");
            $("#resCant").val("0");
            $("#titCantMat").html('');
            $("#resPrecio").val("0");
        }
        else
        {*/
            $("#medidas1").append("<td>" + id_medidas + "</td>" + "<td>" + Ancho + "</td>" + "<td>" + Alto + "</td>");                  
            if (tipo == "R")
            {
                //Calcular a lo ancho/ancho...
                resAncho = (Ancho / parseFloat( $("#totancho").val() ));
                resAlto = (Alto / parseFloat( $("#totalto").val() ));

                //Calcular a lo alto/alto...
                resAncho2 = (Ancho / parseFloat( $("#totalto").val() ));
                resAlto2 = (Alto / parseFloat( $("#totancho").val() ));

                //Calcular cuantas piezas entran a lo ancho y a lo alto...
                orientacionAncho = (parseInt(resAncho) * parseInt(resAlto));
                orientacionAlto = (parseInt(resAncho2) * parseInt(resAlto2));

                //Validar con que orientaci?n entran m?s...
                if ( orientacionAncho > orientacionAlto )
                {
                    entran = orientacionAncho;
                    textoEntran = "A lo ancho";
                    $("#medidas1").append("<td>" + entran + "</td>" + "<td>" + textoEntran + "</td>");

                } 
                else if ( orientacionAncho < orientacionAlto )
                {
                    entran = orientacionAlto;
                    textoEntran = "A lo alto"; 
                    $("#medidas1").append("<td>" + entran + "</td>" + "<td>" + textoEntran + "</td>");
                }
                else if ( orientacionAncho == orientacionAlto )
                {
                    entran = orientacionAlto;
                    textoEntran = "A lo alto";
                    $("#medidas1").append("<td>" + entran + "</td>" + "<td>" + textoEntran + "</td>");
                }                           

                //Obtener el porcentaje de Aprovechamiento...
                aprovech = (( parseFloat( $("#totancho").val() ) * parseFloat( $("#totalto").val() ) * parseInt(entran) ) / (Ancho * Alto)) * 100;
                porcentaje = aprovech.toFixed(2);                
                $("#medidas1").append("<td>" + porcentaje + "</td>");
                $("#medidas1").append("<td></td>" + "<td></td>");

            }
            else if (tipo== "F")
            {
                //Calcula largo de material a lo ancho y a lo alto de las piezas.
                entranAncho = parseInt(Ancho / $("#totancho").val() );
                entranAlto = parseInt(Ancho /  $("#totalto").val());     

                a_lo_ancho = Math.ceil( $("#cantidad").val() / parseInt(Ancho / $("#totancho").val() ))* $("#totalto").val();
                a_lo_alto = Math.ceil( $("#cantidad").val() / parseInt(Ancho /  $("#totalto").val()))*$("#totancho").val() ;

                //Obtiene la cantidad menor de material...
                if (a_lo_ancho < a_lo_alto) 
                {
                    aprovech = (( $("#totalto").val() * $("#totancho").val()  *  $("#cantidad").val()) / (Ancho * a_lo_ancho)) * 100;
                    porcentaje = aprovech.toFixed(2);
                    entran = entranAncho;
                    textoEntran = 'A lo ancho';
                    var res22 = (( $("#totalto").val() * $("#totancho").val()  *  $("#cantidad").val()) / (Ancho * a_lo_ancho));
                    $("#medidas1").append("<td>" + entran + "</td>" + "<td>" + textoEntran + "</td>" + "<td>" + porcentaje + "</td>");
                    $("#medidas1").append("<td>" + a_lo_ancho + "</td>" + "<td>" + a_lo_alto + "</td>");
                }
                else if (a_lo_ancho > a_lo_alto)
                {
                    aprovech = (( $("#totalto").val() * $("#totancho").val()  *  $("#cantidad").val()) / (Ancho * a_lo_alto)) * 100;
                    porcentaje = aprovech.toFixed(2);
                    entran = entranAlto;
                    textoEntran = 'A lo alto';
                    var res22 = (( $("#totalto").val() * $("#totancho").val()  *  $("#cantidad").val()) / (Ancho * a_lo_alto));
                    $("#medidas1").append("<td>" + entran + "</td>" + "<td>" + textoEntran + "</td>" + "<td>" + porcentaje + "</td>");
                    $("#medidas1").append("<td>" + a_lo_ancho + "</td>" + "<td>" + a_lo_alto + "</td>");
                }
                else if (a_lo_ancho == a_lo_alto)
                {
                    aprovech = (( $("#totalto").val() * $("#totancho").val()  *  $("#cantidad").val()) / (Ancho * a_lo_alto)) * 100;
                    porcentaje = aprovech.toFixed(2);
                    entran = entranAlto;
                    textoEntran = 'A lo alto';
                    var res22 = (( $("#totalto").val() * $("#totancho").val()  *  $("#cantidad").val()) / (Ancho * a_lo_alto));
                    $("#medidas1").append("<td>" + entran + "</td>" + "<td>" + textoEntran + "</td>" + "<td>" + porcentaje + "</td>");
                    $("#medidas1").append("<td>" + a_lo_ancho + "</td>" + "<td>" + a_lo_alto + "</td>");
                }
                else
                {
                    //no hay otra condicion...
                }
             
            }
            else if (tipo== "P")
            {
                //Calcula largo de material a lo ancho y a lo alto de las piezas.
                entranAncho = parseInt(Ancho / totAncho);
                entranAlto = parseInt(Ancho / totAlto);  

                a_lo_ancho = Math.ceil(cantidad / parseInt(Ancho / totAncho))*totAlto;
                a_lo_alto = Math.ceil(cantidad / parseInt(Ancho / totAlto))*totAncho;

                //Obtiene la cantidad menor de material...
                if (a_lo_ancho < a_lo_alto) 
                {
                    aprovech = ((totAlto * totAncho * cantidad) / (Ancho * a_lo_ancho)) * 100;
                    porcentaje = aprovech.toFixed(2);
                    entran = entranAncho;
                    textoEntran = 'A lo ancho';
                    var res22 = ((totAlto * totAncho * cantidad) / (Ancho * a_lo_ancho));
                    $("#medidas1").append("<td>" + entran + "</td>" + "<td>" + textoEntran + "</td>" + "<td>" + porcentaje + "</td>");
                    $("#medidas1").append("<td>" + a_lo_ancho + "</td>" + "<td>" + a_lo_alto + "</td>");                    
                }
                else if (a_lo_ancho > a_lo_alto)
                {
                    aprovech = ((totAlto * totAncho * cantidad) / (Ancho * a_lo_alto)) * 100;
                    porcentaje = aprovech.toFixed(2);
                    entran = entranAlto;
                    textoEntran = 'A lo alto';
                    var res22 = ((totAlto * totAncho * cantidad) / (Ancho * a_lo_alto));
                    $("#medidas1").append("<td>" + entran + "</td>" + "<td>" + textoEntran + "</td>" + "<td>" + porcentaje + "</td>");
                    $("#medidas1").append("<td>" + a_lo_ancho + "</td>" + "<td>" + a_lo_alto + "</td>");                    
                }
                else if (a_lo_ancho == a_lo_alto)
                {
                    aprovech = ((totAlto * totAncho * cantidad) / (Ancho * a_lo_alto)) * 100;
                    porcentaje = aprovech.toFixed(2);
                    entran = entranAlto;
                    textoEntran = 'A lo alto';
                    var res22 = ((totAlto * totAncho * cantidad) / (Ancho * a_lo_alto));
                    $("#medidas1").append("<td>" + entran + "</td>" + "<td>" + textoEntran + "</td>" + "<td>" + porcentaje + "</td>");
                    $("#medidas1").append("<td>" + a_lo_ancho + "</td>" + "<td>" + a_lo_alto + "</td>");                    
                }
                else
                {
                    //no hay otra condicion...
                }

            }
        //}
    }    

    //---------------------------------M E D I D A S   E S P E C I A L E S--------------------------

$.medidasTablaespecial = function()
{
    $("#medidas1").html("");
    $("#medidas2").html("");
    $("#medidas3").html("");
    $("#medidas4").html("");
    $("#medidas5").html("");
    $("#medidas6").html("");
        MedEspecial = $("#medida_especial").val();
        $.post('php/mat_especial.php', {MedEspecial:MedEspecial},               
        function(result)
        {               
            if(result.data.length>0)
            { 
                $.matTipo(result);   
                //$("#medidas").append("<tr>");
                $("#medidas1").append("<td>" + "1" + "</td>" + "<td>" + result.data[0].ANCHO + "</td>" + "<td>" + result.data[0].ALTO + "</td>");
                if (result.data[0].TIPO== "R")
                {
                    //Calcular a lo ancho/ancho...
                    var resAncho = (result.data[0].ANCHO / parseFloat($("#totancho").val()));
                    resAlto = (result.data[0].ALTO / parseFloat($("#totalto").val()));

                    //Calcular a lo alto/alto...
                    resAncho2 = (result.data[0].ANCHO / parseFloat($("#totalto").val()));
                    resAlto2 = (result.data[0].ALTO / parseFloat($("#totancho").val()));

                    //Calcular cuantas piezas entran a lo ancho y a lo alto...
                    orientacionAncho = (parseInt(resAncho) * parseInt(resAlto));
                    orientacionAlto = (parseInt(resAncho2) * parseInt(resAlto2));

                    if ( orientacionAncho > orientacionAlto )
                    {
                        entran = orientacionAncho;
                        textoEntran = "A lo ancho";
                        $("#medidas1").append("<td>" + entran + "</td>" + "<td>" + textoEntran + "</td>");
                    } 
                    else if ( orientacionAncho < orientacionAlto )
                    {
                        entran = orientacionAlto;
                        textoEntran = "A lo alto"; 
                        $("#medidas1").append("<td>" + entran + "</td>" + "<td>" + textoEntran + "</td>");
                    }
                    else if ( orientacionAncho == orientacionAlto )
                    {
                        entran = orientacionAlto;
                        textoEntran = "A lo alto";
                        $("#medidas1").append("<td>" + entran + "</td>" + "<td>" + textoEntran + "</td>");                    
                    }
                    //Obtener el porcentaje de Aprovechamiento...
                    aprovech = (( parseFloat($("#totancho").val()) * parseFloat($("#totalto").val()) * parseInt(entran) ) / (result.data[0].ANCHO * result.data[0].ALTO)) * 100;
                    porcentaje = aprovech.toFixed(2);                
                    $("#medidas1").append("<td>" + porcentaje + "</td>");
                    $("#medidas1").append("<td></td>" + "<td></td>");
                }
                else if (result.data[0].TIPO == "F")
                {
                    //Calcula largo de material a lo ancho y a lo alto de las piezas.
                    entranAncho = parseInt(result.data[0].ANCHO / $("#totancho").val());
                    entranAlto = parseInt(result.data[0].ANCHO / $("#totalto").val());   

                    a_lo_ancho = Math.ceil($("#cantidad").val() / parseInt(result.data[0].ANCHO / $("#totancho").val()))*$("#totalto").val();
                    a_lo_alto = Math.ceil($("#cantidad").val() / parseInt(result.data[0].ANCHO / $("#totalto").val()))*$("#totancho").val();

                    //Obtiene la cantidad menor de material...
                    if (a_lo_ancho < a_lo_alto) 
                    {
                        aprovech = (($("#totalto").val() * $("#totancho").val() * $("#cantidad").val()) / (result.data[0].ANCHO * a_lo_ancho)) * 100;
                        porcentaje = aprovech.toFixed(2);
                        entran = entranAncho;
                        textoEntran = 'A lo ancho';
                        $("#medidas1").append("<td>" + entran + "</td>" + "<td>" + textoEntran + "</td>");
                        $("#medidas1").append("<td>" + porcentaje + "</td>");
                        $("#medidas1").append("<td>" + a_lo_ancho + "</td>" + "<td>" + a_lo_alto + "</td>");
                        //var res22 = ((totAlto * totAncho * cantidad) / (result.data[0].ANCHO1 * a_lo_ancho));
                    }
                    else if (a_lo_ancho > a_lo_alto)
                    {
                        aprovech = (($("#totalto").val() * $("#totancho").val() * $("#cantidad").val()) / (result.data[0].ANCHO * a_lo_alto)) * 100;
                        porcentaje = aprovech.toFixed(2);
                        entran = entranAlto;
                        textoEntran = 'A lo alto';
                        $("#medidas1").append("<td>" + entran + "</td>" + "<td>" + textoEntran + "</td>");
                        $("#medidas1").append("<td>" + porcentaje + "</td>");
                        $("#medidas1").append("<td>" + a_lo_ancho + "</td>" + "<td>" + a_lo_alto + "</td>");
                        //var res22 = ((totAlto * totAncho * cantidad) / (result.data[0].ANCHO1 * a_lo_alto));
                    }
                    else if (a_lo_ancho == a_lo_alto)
                    {
                        aprovech = (($("#totalto").val() * $("#totancho").val() * $("#cantidad").val()) / (result.data[0].ANCHO * a_lo_alto)) * 100;
                        porcentaje = aprovech.toFixed(2);
                        entran = entranAlto;
                        textoEntran = 'A lo alto';
                        $("#medidas1").append("<td>" + entran + "</td>" + "<td>" + textoEntran + "</td>");
                        $("#medidas1").append("<td>" + porcentaje + "</td>");  
                        $("#medidas1").append("<td>" + a_lo_ancho + "</td>" + "<td>" + a_lo_alto + "</td>");                  
                        //var res22 = ((totAlto * totAncho * cantidad) / (result.data[0].ANCHO1 * a_lo_alto));
                    }
                    else
                    {
                        //no hay otra condicion...
                    }               
                }
                else if (result.data[0].TIPO == "P")
                {
                    //Calcula largo de material a lo ancho y a lo alto de las piezas.
                    entranAncho = parseInt(result.data[0].ANCHO / $("#totancho").val());
                    entranAlto = parseInt(result.data[0].ANCHO / $("#totalto").val());   

                    a_lo_ancho = Math.ceil($("#cantidad").val() / parseInt(result.data[0].ANCHO / $("#totancho").val()))*$("#totalto").val();
                    a_lo_alto = Math.ceil($("#cantidad").val() / parseInt(result.data[0].ANCHO / $("#totalto").val()))*$("#totancho").val();

                    //Obtiene la cantidad menor de material...
                    if (a_lo_ancho < a_lo_alto) 
                    {
                        aprovech = (($("#totalto").val() * $("#totancho").val() * $("#cantidad").val()) / (result.data[0].ANCHO * a_lo_ancho)) * 100;
                        porcentaje = aprovech.toFixed(2);
                        entran = entranAncho;
                        textoEntran = 'A lo ancho';
                        $("#medidas1").append("<td>" + entran + "</td>" + "<td>" + textoEntran + "</td>");
                        $("#medidas1").append("<td>" + porcentaje + "</td>"); 
                        $("#medidas1").append("<td>" + a_lo_ancho + "</td>" + "<td>" + a_lo_alto + "</td>");                   
                        //var res22 = ((totAlto * totAncho * cantidad) / (result.data[0].ANCHO1 * a_lo_ancho));
                    }
                    else if (a_lo_ancho > a_lo_alto)
                    {
                        aprovech = (($("#totalto").val() * $("#totancho").val() * $("#cantidad").val()) / (result.data[0].ANCHO * a_lo_alto)) * 100;
                        porcentaje = aprovech.toFixed(2);
                        entran = entranAlto;
                        textoEntran = 'A lo alto';
                        $("#medidas1").append("<td>" + entran + "</td>" + "<td>" + textoEntran + "</td>");
                        $("#medidas1").append("<td>" + porcentaje + "</td>");
                        $("#medidas1").append("<td>" + a_lo_ancho + "</td>" + "<td>" + a_lo_alto + "</td>");
                        //var res22 = ((totAlto * totAncho * cantidad) / (result.data[0].ANCHO1 * a_lo_alto));
                    }
                    else if (a_lo_ancho == a_lo_alto)
                    {
                        aprovech = (($("#totalto").val() * $("#totancho").val() * $("#cantidad").val()) / (result.data[0].ANCHO * a_lo_alto)) * 100;
                        porcentaje = aprovech.toFixed(2);
                        entran = entranAlto;
                        textoEntran = 'A lo alto';
                        $("#medidas1").append("<td>" + entran + "</td>" + "<td>" + textoEntran + "</td>");
                        $("#medidas1").append("<td>" + porcentaje + "</td>");            
                        $("#medidas1").append("<td>" + a_lo_ancho + "</td>" + "<td>" + a_lo_alto + "</td>");        
                        //var res22 = ((totAlto * totAncho * cantidad) / (result.data[0].ANCHO1 * a_lo_alto));
                    }
                    else
                    {
                        //no hay otra condicion...
                    }
                } 
            }  
        },'json');     
}
//////////////////////// LLENA LA TABLA DE MEDIDAS/////////////////
$.medidasTabla = function()
{
$("#medidas1").html("");
$("#medidas2").html("");
$("#medidas3").html("");
$("#medidas4").html("");
$("#medidas5").html("");
$("#medidas6").html("");
id_meterial = $("#material").val();
$.post('php/medidas.php', {id_meterial:id_meterial},               
function(result)
{               
if(result.data.length>0)
{ 
$.matTipo(result);   
    if(result.data[0].ALTO1 != '' && result.data[0].ANCHO1 != '' )
    {
        //$("#medidas").append("<tr>");
        $("#medidas1").append("<td>" + result.data[0].Medida_Mat_1 + "</td>" + "<td>" + result.data[0].ANCHO1 + "</td>" + "<td>" + result.data[0].ALTO1 + "</td>");
            if (result.data[0].M_Tipo== "R")
            {
                //Calcular a lo ancho/ancho...
                var resAncho = (result.data[0].ANCHO1 / parseFloat($("#totancho").val()));
                resAlto = (result.data[0].ALTO1 / parseFloat($("#totalto").val()));

                //Calcular a lo alto/alto...
                resAncho2 = (result.data[0].ANCHO1 / parseFloat($("#totalto").val()));
                resAlto2 = (result.data[0].ALTO1 / parseFloat($("#totancho").val()));

                //Calcular cuantas piezas entran a lo ancho y a lo alto...
                orientacionAncho = (parseInt(resAncho) * parseInt(resAlto));
                orientacionAlto = (parseInt(resAncho2) * parseInt(resAlto2));

                if ( orientacionAncho > orientacionAlto )
                {
                    entran = orientacionAncho;
                    textoEntran = "A lo ancho";
                    $("#medidas1").append("<td>" + entran + "</td>" + "<td>" + textoEntran + "</td>");
                } 
                else if ( orientacionAncho < orientacionAlto )
                {
                    entran = orientacionAlto;
                    textoEntran = "A lo alto"; 
                    $("#medidas1").append("<td>" + entran + "</td>" + "<td>" + textoEntran + "</td>");
                }
                else if ( orientacionAncho == orientacionAlto )
                {
                    entran = orientacionAlto;
                    textoEntran = "A lo alto";
                    $("#medidas1").append("<td>" + entran + "</td>" + "<td>" + textoEntran + "</td>");                    
                }
                //Obtener el porcentaje de Aprovechamiento...
                aprovech = (( parseFloat($("#totancho").val()) * parseFloat($("#totalto").val()) * parseInt(entran) ) / (result.data[0].ANCHO1 * result.data[0].ALTO1)) * 100;
                porcentaje = aprovech.toFixed(2);                
                $("#medidas1").append("<td>" + porcentaje + "</td>");
                $("#medidas1").append("<td></td>" + "<td></td>");
            }
            else if (result.data[0].M_Tipo == "F")
            {
                //Calcula largo de material a lo ancho y a lo alto de las piezas.
                entranAncho = parseInt(result.data[0].ANCHO1 / $("#totancho").val());
                entranAlto = parseInt(result.data[0].ANCHO1 / $("#totalto").val());  

                a_lo_ancho = Math.ceil($("#cantidad").val() / parseInt(result.data[0].ANCHO1 / $("#totancho").val()))*$("#totalto").val();
                a_lo_alto = Math.ceil($("#cantidad").val() / parseInt(result.data[0].ANCHO1 / $("#totalto").val()))*$("#totancho").val();

                //Obtiene la cantidad menor de material...
                if (a_lo_ancho < a_lo_alto) 
                {
                    aprovech = (($("#totalto").val() * $("#totancho").val() * $("#cantidad").val()) / (result.data[0].ANCHO1 * a_lo_ancho)) * 100;
                    porcentaje = aprovech.toFixed(2);
                    entran = entranAncho;
                    textoEntran = 'A lo ancho';
                    $("#medidas1").append("<td>" + entran + "</td>" + "<td>" + textoEntran + "</td>");
                    $("#medidas1").append("<td>" + porcentaje + "</td>");
                    $("#medidas1").append("<td >" + a_lo_ancho + "</td>" + "<td style='color:transparent;'>" + a_lo_alto + "</td>");
                    //var res22 = ((totAlto * totAncho * cantidad) / (result.data[0].ANCHO1 * a_lo_ancho));
                }
                else if (a_lo_ancho > a_lo_alto)
                {
                    aprovech = (($("#totalto").val() * $("#totancho").val() * $("#cantidad").val()) / (result.data[0].ANCHO1 * a_lo_alto)) * 100;
                    porcentaje = aprovech.toFixed(2);
                    entran = entranAlto;
                    textoEntran = 'A lo alto';
                    $("#medidas1").append("<td>" + entran + "</td>" + "<td>" + textoEntran + "</td>");
                    $("#medidas1").append("<td>" + porcentaje + "</td>");
                    $("#medidas1").append("<td >" + a_lo_ancho + "</td>" + "<td style='color:transparent;'>" + a_lo_alto + "</td>");
                    //var res22 = ((totAlto * totAncho * cantidad) / (result.data[0].ANCHO1 * a_lo_alto));
                }
                else if (a_lo_ancho == a_lo_alto)
                {
                    aprovech = (($("#totalto").val() * $("#totancho").val() * $("#cantidad").val()) / (result.data[0].ANCHO1 * a_lo_alto)) * 100;
                    porcentaje = aprovech.toFixed(2);
                    entran = entranAlto;
                    textoEntran = 'A lo alto';
                    $("#medidas1").append("<td>" + entran + "</td>" + "<td>" + textoEntran + "</td>");
                    $("#medidas1").append("<td>" + porcentaje + "</td>");  
                    $("#medidas1").append("<td >" + a_lo_ancho + "</td>" + "<td style='color:transparent;'>" + a_lo_alto + "</td>");                  
                    //var res22 = ((totAlto * totAncho * cantidad) / (result.data[0].ANCHO1 * a_lo_alto));
                }
                else
                {
                    //no hay otra condicion...
                }               
            }
            else if (result.data[0].M_Tipo == "P")
            {
                //Calcula largo de material a lo ancho y a lo alto de las piezas.
                entranAncho = parseInt(result.data[0].ANCHO1 / $("#totancho").val());
                entranAlto = parseInt(result.data[0].ANCHO1 / $("#totalto").val());  

                a_lo_ancho = Math.ceil($("#cantidad").val() / parseInt(result.data[0].ANCHO1 / $("#totancho").val()))*$("#totalto").val();
                a_lo_alto = Math.ceil($("#cantidad").val() / parseInt(result.data[0].ANCHO1 / $("#totalto").val()))*$("#totancho").val();

                //Obtiene la cantidad menor de material...
                if (a_lo_ancho < a_lo_alto) 
                {
                    aprovech = (($("#totalto").val() * $("#totancho").val() * $("#cantidad").val()) / (result.data[0].ANCHO1 * a_lo_ancho)) * 100;
                    porcentaje = aprovech.toFixed(2);
                    entran = entranAncho;
                    textoEntran = 'A lo ancho';
                    $("#medidas1").append("<td>" + entran + "</td>" + "<td>" + textoEntran + "</td>");
                    $("#medidas1").append("<td>" + porcentaje + "</td>"); 
                    $("#medidas1").append("<td style='color:transparent;'>" + a_lo_ancho + "</td>" + "<td style='color:transparent;'>" + a_lo_alto + "</td>");                   
                    //var res22 = ((totAlto * totAncho * cantidad) / (result.data[0].ANCHO1 * a_lo_ancho));
                }
                else if (a_lo_ancho > a_lo_alto)
                {
                    aprovech = (($("#totalto").val() * $("#totancho").val() * $("#cantidad").val()) / (result.data[0].ANCHO1 * a_lo_alto)) * 100;
                    porcentaje = aprovech.toFixed(2);
                    entran = entranAlto;
                    textoEntran = 'A lo alto';
                    $("#medidas1").append("<td>" + entran + "</td>" + "<td>" + textoEntran + "</td>");
                    $("#medidas1").append("<td>" + porcentaje + "</td>");
                    $("#medidas1").append("<td style='color:transparent;'>" + a_lo_ancho + "</td>" + "<td style='color:transparent;'>" + a_lo_alto + "</td>");
                    //var res22 = ((totAlto * totAncho * cantidad) / (result.data[0].ANCHO1 * a_lo_alto));
                }
                else if (a_lo_ancho == a_lo_alto)
                {
                    aprovech = (($("#totalto").val() * $("#totancho").val() * $("#cantidad").val()) / (result.data[0].ANCHO1 * a_lo_alto)) * 100;
                    porcentaje = aprovech.toFixed(2);
                    entran = entranAlto;
                    textoEntran = 'A lo alto';
                    $("#medidas1").append("<td>" + entran + "</td>" + "<td>" + textoEntran + "</td>");
                    $("#medidas1").append("<td>" + porcentaje + "</td>");            
                    $("#medidas1").append("<td style='color:transparent;'>" + a_lo_ancho + "</td>" + "<td style='color:transparent;'>" + a_lo_alto + "</td>");        
                    //var res22 = ((totAlto * totAncho * cantidad) / (result.data[0].ANCHO1 * a_lo_alto));
                }
                else
                {
                    //no hay otra condicion...
                }
            }                       
    }
    if(result.data[0].ALTO2 != '' && result.data[0].ANCHO2 !='' )
    {
        $("#medidas2").append("<td>" + result.data[0].Medida_Mat_2 + "</td>" + "<td>" + result.data[0].ANCHO2 + "</td>" + "<td>" + result.data[0].ALTO2 + "</td>");
            if (result.data[0].M_Tipo== "R")
            {
                //Calcular a lo ancho/ancho...
                var resAncho = (result.data[0].ANCHO2 / parseFloat($("#totancho").val()));
                resAlto = (result.data[0].ALTO2 / parseFloat($("#totalto").val()));

                //Calcular a lo alto/alto...
                resAncho2 = (result.data[0].ANCHO2 / parseFloat($("#totalto").val()));
                resAlto2 = (result.data[0].ALTO2 / parseFloat($("#totancho").val()));

                //Calcular cuantas piezas entran a lo ancho y a lo alto...
                orientacionAncho = (parseInt(resAncho) * parseInt(resAlto));
                orientacionAlto = (parseInt(resAncho2) * parseInt(resAlto2));

                if ( orientacionAncho > orientacionAlto )
                {
                    entran = orientacionAncho;
                    textoEntran = "A lo ancho";
                    $("#medidas2").append("<td>" + entran + "</td>" + "<td>" + textoEntran + "</td>");
                } 
                else if ( orientacionAncho < orientacionAlto )
                {
                    entran = orientacionAlto;
                    textoEntran = "A lo alto"; 
                    $("#medidas2").append("<td>" + entran + "</td>" + "<td>" + textoEntran + "</td>");
                }
                else if ( orientacionAncho == orientacionAlto )
                {
                    entran = orientacionAlto;
                    textoEntran = "A lo alto";
                    $("#medidas2").append("<td>" + entran + "</td>" + "<td>" + textoEntran + "</td>");
                }
                //Obtener el porcentaje de Aprovechamiento...
                aprovech = (( parseFloat($("#totancho").val()) * parseFloat($("#totalto").val()) * parseInt(entran) ) / (result.data[0].ANCHO2 * result.data[0].ALTO2)) * 100;
                porcentaje = aprovech.toFixed(2);                
                $("#medidas2").append("<td>" + porcentaje + "</td>");
                $("#medidas2").append("<td></td>" + "<td></td>");           
            }
            else if (result.data[0].M_Tipo == "F")
            {
                //Calcula largo de material a lo ancho y a lo alto de las piezas.
                entranAncho = parseInt(result.data[0].ANCHO2 / $("#totancho").val());
                entranAlto = parseInt(result.data[0].ANCHO2 / $("#totalto").val());  

                a_lo_ancho = Math.ceil($("#cantidad").val() / parseInt(result.data[0].ANCHO2 / $("#totancho").val()))*$("#totalto").val();
                a_lo_alto = Math.ceil($("#cantidad").val() / parseInt(result.data[0].ANCHO2 / $("#totalto").val()))*$("#totancho").val();

                //Obtiene la cantidad menor de material...
                if (a_lo_ancho < a_lo_alto) 
                {
                    aprovech = (($("#totalto").val() * $("#totancho").val() * $("#cantidad").val()) / (result.data[0].ANCHO2 * a_lo_ancho)) * 100;
                    porcentaje = aprovech.toFixed(2);
                    entran = entranAncho;
                    textoEntran = 'A lo ancho';
                    $("#medidas2").append("<td>" + entran + "</td>" + "<td>" + textoEntran + "</td>");
                    $("#medidas2").append("<td>" + porcentaje + "</td>");
                    $("#medidas2").append("<td style='color:transparent;'>" + a_lo_ancho + "</td>" + "<td style='color:transparent;'>" + a_lo_alto + "</td>");
                    //var res22 = ((totAlto * totAncho * cantidad) / (result.data[0].ANCHO1 * a_lo_ancho));
                }
                else if (a_lo_ancho > a_lo_alto)
                {
                    aprovech = (($("#totalto").val() * $("#totancho").val() * $("#cantidad").val()) / (result.data[0].ANCHO2 * a_lo_alto)) * 100;
                    porcentaje = aprovech.toFixed(2);
                    entran = entranAlto;
                    textoEntran = 'A lo alto';
                    $("#medidas2").append("<td>" + entran + "</td>" + "<td>" + textoEntran + "</td>");
                    $("#medidas2").append("<td>" + porcentaje + "</td>");
                    $("#medidas2").append("<td style='color:transparent;'>" + a_lo_ancho + "</td>" + "<td style='color:transparent;'>" + a_lo_alto + "</td>");
                    //var res22 = ((totAlto * totAncho * cantidad) / (result.data[0].ANCHO1 * a_lo_alto));
                }
                else if (a_lo_ancho == a_lo_alto)
                {
                    aprovech = (($("#totalto").val() * $("#totancho").val() * $("#cantidad").val()) / (result.data[0].ANCHO2 * a_lo_alto)) * 100;
                    porcentaje = aprovech.toFixed(2);
                    entran = entranAlto;
                    textoEntran = 'A lo alto';
                    $("#medidas2").append("<td>" + entran + "</td>" + "<td>" + textoEntran + "</td>");
                    $("#medidas2").append("<td>" + porcentaje + "</td>");  
                    $("#medidas2").append("<td style='color:transparent;'>" + a_lo_ancho + "</td>" + "<td style='color:transparent;'>" + a_lo_alto + "</td>");                  
                    //var res22 = ((totAlto * totAncho * cantidad) / (result.data[0].ANCHO1 * a_lo_alto));
                }
                else
                {
                    //no hay otra condicion...
                }
            }
            else if (result.data[0].M_Tipo == "P")
            {
                //Calcula largo de material a lo ancho y a lo alto de las piezas.
                entranAncho = parseInt(result.data[0].ANCHO2 / $("#totancho").val());
                entranAlto = parseInt(result.data[0].ANCHO2 / $("#totalto").val());  

                a_lo_ancho = Math.ceil($("#cantidad").val() / parseInt(result.data[0].ANCHO2 / $("#totancho").val()))*$("#totalto").val();
                a_lo_alto = Math.ceil($("#cantidad").val() / parseInt(result.data[0].ANCHO2 / $("#totalto").val()))*$("#totancho").val();

                //Obtiene la cantidad menor de material...
                if (a_lo_ancho < a_lo_alto) 
                {
                    aprovech = (($("#totalto").val() * $("#totancho").val() * $("#cantidad").val()) / (result.data[0].ANCHO2 * a_lo_ancho)) * 100;
                    porcentaje = aprovech.toFixed(2);
                    entran = entranAncho;
                    textoEntran = 'A lo ancho';
                    $("#medidas2").append("<td>" + entran + "</td>" + "<td>" + textoEntran + "</td>");
                    $("#medidas2").append("<td>" + porcentaje + "</td>");  
                    $("#medidas2").append("<td style='color:transparent;'>" + a_lo_ancho + "</td>" + "<td style='color:transparent;'>" + a_lo_alto + "</td>");                  
                    //var res22 = ((totAlto * totAncho * cantidad) / (result.data[0].ANCHO1 * a_lo_ancho));
                }
                else if (a_lo_ancho > a_lo_alto)
                {
                    aprovech = (($("#totalto").val() * $("#totancho").val() * $("#cantidad").val()) / (result.data[0].ANCHO2 * a_lo_alto)) * 100;
                    porcentaje = aprovech.toFixed(2);
                    entran = entranAlto;
                    textoEntran = 'A lo alto';
                    $("#medidas2").append("<td>" + entran + "</td>" + "<td>" + textoEntran + "</td>");
                    $("#medidas2").append("<td>" + porcentaje + "</td>");
                    $("#medidas2").append("<td style='color:transparent;'>" + a_lo_ancho + "</td>" + "<td style='color:transparent;'>" + a_lo_alto + "</td>");
                    //var res22 = ((totAlto * totAncho * cantidad) / (result.data[0].ANCHO1 * a_lo_alto));
                }
                else if (a_lo_ancho == a_lo_alto)
                {
                    aprovech = (($("#totalto").val() * $("#totancho").val() * $("#cantidad").val()) / (result.data[0].ANCHO2 * a_lo_alto)) * 100;
                    porcentaje = aprovech.toFixed(2);
                    entran = entranAlto;
                    textoEntran = 'A lo alto';
                    $("#medidas2").append("<td>" + entran + "</td>" + "<td>" + textoEntran + "</td>");
                    $("#medidas2").append("<td>" + porcentaje + "</td>");   
                    $("#medidas2").append("<td style='color:transparent;'>" + a_lo_ancho + "</td>" + "<td style='color:transparent;'>" + a_lo_alto + "</td>");                 
                    //var res22 = ((totAlto * totAncho * cantidad) / (result.data[0].ANCHO1 * a_lo_alto));
                }
                else
                {
                    //no hay otra condicion...
                }
            }                   
    }
    if(result.data[0].ALTO3 != '' && result.data[0].ANCHO3 !='' )
    {
        $("#medidas3").append("<td>" + result.data[0].Medida_Mat_3 + "</td>" + "<td>" + result.data[0].ANCHO3 + "</td>" + "<td>" + result.data[0].ALTO3 + "</td>");
            if (result.data[0].M_Tipo== "R")
            {
                //Calcular a lo ancho/ancho...
                var resAncho = (result.data[0].ANCHO3 / parseFloat($("#totancho").val()));
                resAlto = (result.data[0].ALTO3 / parseFloat($("#totalto").val()));

                //Calcular a lo alto/alto...
                resAncho2 = (result.data[0].ANCHO3 / parseFloat($("#totalto").val()));
                resAlto2 = (result.data[0].ALTO3 / parseFloat($("#totancho").val()));

                //Calcular cuantas piezas entran a lo ancho y a lo alto...
                orientacionAncho = (parseInt(resAncho) * parseInt(resAlto));
                orientacionAlto = (parseInt(resAncho2) * parseInt(resAlto2));

                if ( orientacionAncho > orientacionAlto )
                {
                    entran = orientacionAncho;
                    textoEntran = "A lo ancho";
                    $("#medidas3").append("<td>" + entran + "</td>" + "<td>" + textoEntran + "</td>");
                } 
                else if ( orientacionAncho < orientacionAlto )
                {
                    entran = orientacionAlto;
                    textoEntran = "A lo alto"; 
                    $("#medidas3").append("<td>" + entran + "</td>" + "<td>" + textoEntran + "</td>");
                }
                else if ( orientacionAncho == orientacionAlto )
                {
                    entran = orientacionAlto;
                    textoEntran = "A lo alto";
                    $("#medidas3").append("<td>" + entran + "</td>" + "<td>" + textoEntran + "</td>");
                }
                //Obtener el porcentaje de Aprovechamiento...
                aprovech = (( parseFloat($("#totancho").val()) * parseFloat($("#totalto").val()) * parseInt(entran) ) / (result.data[0].ANCHO3 * result.data[0].ALTO3)) * 100;
                porcentaje = aprovech.toFixed(2);                
                $("#medidas3").append("<td>" + porcentaje + "</td>");
                $("#medidas3").append("<td></td>" + "<td></td>");
            }
            else if (result.data[0].M_Tipo == "F")
            {
                //Calcula largo de material a lo ancho y a lo alto de las piezas.
                entranAncho = parseInt(result.data[0].ANCHO3 / $("#totancho").val());
                entranAlto = parseInt(result.data[0].ANCHO3 / $("#totalto").val());  

                a_lo_ancho = Math.ceil($("#cantidad").val() / parseInt(result.data[0].ANCHO3 / $("#totancho").val()))*$("#totalto").val();
                a_lo_alto = Math.ceil($("#cantidad").val() / parseInt(result.data[0].ANCHO3 / $("#totalto").val()))*$("#totancho").val();

                //Obtiene la cantidad menor de material...
                if (a_lo_ancho < a_lo_alto) 
                {
                    aprovech = (($("#totalto").val() * $("#totancho").val() * $("#cantidad").val()) / (result.data[0].ANCHO3 * a_lo_ancho)) * 100;
                    porcentaje = aprovech.toFixed(2);
                    entran = entranAncho;
                    textoEntran = 'A lo ancho';
                    $("#medidas3").append("<td>" + entran + "</td>" + "<td>" + textoEntran + "</td>");
                    $("#medidas3").append("<td>" + porcentaje + "</td>");
                    $("#medidas3").append("<td style='color:transparent;'>" + a_lo_ancho + "</td>" + "<td style='color:transparent;'>" + a_lo_alto + "</td>");
                    //var res22 = ((totAlto * totAncho * cantidad) / (result.data[0].ANCHO1 * a_lo_ancho));
                }
                else if (a_lo_ancho > a_lo_alto)
                {
                    aprovech = (($("#totalto").val() * $("#totancho").val() * $("#cantidad").val()) / (result.data[0].ANCHO3 * a_lo_alto)) * 100;
                    porcentaje = aprovech.toFixed(2);
                    entran = entranAlto;
                    textoEntran = 'A lo alto';
                    $("#medidas3").append("<td>" + entran + "</td>" + "<td>" + textoEntran + "</td>");
                    $("#medidas3").append("<td>" + porcentaje + "</td>");
                    $("#medidas3").append("<td style='color:transparent;'>" + a_lo_ancho + "</td>" + "<td style='color:transparent;'>" + a_lo_alto + "</td>");
                    //var res22 = ((totAlto * totAncho * cantidad) / (result.data[0].ANCHO1 * a_lo_alto));
                }
                else if (a_lo_ancho == a_lo_alto)
                {
                    aprovech = (($("#totalto").val() * $("#totancho").val() * $("#cantidad").val()) / (result.data[0].ANCHO3 * a_lo_alto)) * 100;
                    porcentaje = aprovech.toFixed(2);
                    entran = entranAlto;
                    textoEntran = 'A lo alto';
                    $("#medidas3").append("<td>" + entran + "</td>" + "<td>" + textoEntran + "</td>");
                    $("#medidas3").append("<td>" + porcentaje + "</td>");   
                    $("#medidas3").append("<td style='color:transparent;'>" + a_lo_ancho + "</td>" + "<td style='color:transparent;'>" + a_lo_alto + "</td>");                 
                    //var res22 = ((totAlto * totAncho * cantidad) / (result.data[0].ANCHO1 * a_lo_alto));
                }
                else
                {
                    //no hay otra condicion...
                }
            }
            else if (result.data[0].M_Tipo == "P")
            {
                //Calcula largo de material a lo ancho y a lo alto de las piezas.
                entranAncho = parseInt(result.data[0].ANCHO3 / $("#totancho").val());
                entranAlto = parseInt(result.data[0].ANCHO3 / $("#totalto").val());  

                a_lo_ancho = Math.ceil($("#cantidad").val() / parseInt(result.data[0].ANCHO3 / $("#totancho").val()))*$("#totalto").val();
                a_lo_alto = Math.ceil($("#cantidad").val() / parseInt(result.data[0].ANCHO3 / $("#totalto").val()))*$("#totancho").val();

                //Obtiene la cantidad menor de material...
                if (a_lo_ancho < a_lo_alto) 
                {
                    aprovech = (($("#totalto").val() * $("#totancho").val() * $("#cantidad").val()) / (result.data[0].ANCHO3 * a_lo_ancho)) * 100;
                    porcentaje = aprovech.toFixed(2);
                    entran = entranAncho;
                    textoEntran = 'A lo ancho';
                    $("#medidas3").append("<td>" + entran + "</td>" + "<td>" + textoEntran + "</td>");
                    $("#medidas3").append("<td>" + porcentaje + "</td>");
                    $("#medidas3").append("<td style='color:transparent;'>" + a_lo_ancho + "</td>" + "<td style='color:transparent;'>" + a_lo_alto + "</td>");                    
                    //var res22 = ((totAlto * totAncho * cantidad) / (result.data[0].ANCHO1 * a_lo_ancho));
                }
                else if (a_lo_ancho > a_lo_alto)
                {
                    aprovech = (($("#totalto").val() * $("#totancho").val() * $("#cantidad").val()) / (result.data[0].ANCHO3 * a_lo_alto)) * 100;
                    porcentaje = aprovech.toFixed(2);
                    entran = entranAlto;
                    textoEntran = 'A lo alto';
                    $("#medidas3").append("<td>" + entran + "</td>" + "<td>" + textoEntran + "</td>");
                    $("#medidas3").append("<td>" + porcentaje + "</td>");
                    $("#medidas3").append("<td style='color:transparent;'>" + a_lo_ancho + "</td>" + "<td style='color:transparent;'>" + a_lo_alto + "</td>");
                    //var res22 = ((totAlto * totAncho * cantidad) / (result.data[0].ANCHO1 * a_lo_alto));
                }
                else if (a_lo_ancho == a_lo_alto)
                {
                    aprovech = (($("#totalto").val() * $("#totancho").val() * $("#cantidad").val()) / (result.data[0].ANCHO3 * a_lo_alto)) * 100;
                    porcentaje = aprovech.toFixed(2);
                    entran = entranAlto;
                    textoEntran = 'A lo alto';
                    $("#medidas3").append("<td>" + entran + "</td>" + "<td>" + textoEntran + "</td>");
                    $("#medidas3").append("<td>" + porcentaje + "</td>");
                    $("#medidas3").append("<td style='color:transparent;'>" + a_lo_ancho + "</td>" + "<td style='color:transparent;'>" + a_lo_alto + "</td>");                    
                    //var res22 = ((totAlto * totAncho * cantidad) / (result.data[0].ANCHO1 * a_lo_alto));
                }
                else
                {
                    //no hay otra condicion...
                }
            }       
    }
    if(result.data[0].ALTO4 != '' && result.data[0].ANCHO4 !='' )
    {
        $("#medidas4").append("<td>" + result.data[0].Medida_Mat_4 + "</td>" + "<td>" + result.data[0].ANCHO4 + "</td>" + "<td>" + result.data[0].ALTO4 + "</td>");
            if (result.data[0].M_Tipo== "R")
            {
                //Calcular a lo ancho/ancho...
                var resAncho = (result.data[0].ANCHO4 / parseFloat($("#totancho").val()));
                resAlto = (result.data[0].ALTO4 / parseFloat($("#totalto").val()));

                //Calcular a lo alto/alto...
                resAncho2 = (result.data[0].ANCHO4 / parseFloat($("#totalto").val()));
                resAlto2 = (result.data[0].ALTO4 / parseFloat($("#totancho").val()));

                //Calcular cuantas piezas entran a lo ancho y a lo alto...
                orientacionAncho = (parseInt(resAncho) * parseInt(resAlto));
                orientacionAlto = (parseInt(resAncho2) * parseInt(resAlto2));

                if ( orientacionAncho > orientacionAlto )
                {
                    entran = orientacionAncho;
                    textoEntran = "A lo ancho";
                    $("#medidas4").append("<td>" + entran + "</td>" + "<td>" + textoEntran + "</td>");
                } 
                else if ( orientacionAncho < orientacionAlto )
                {
                    entran = orientacionAlto;
                    textoEntran = "A lo alto"; 
                    $("#medidas4").append("<td>" + entran + "</td>" + "<td>" + textoEntran + "</td>");
                }
                else if ( orientacionAncho == orientacionAlto )
                {
                    entran = orientacionAlto;
                    textoEntran = "A lo alto";
                    $("#medidas4").append("<td>" + entran + "</td>" + "<td>" + textoEntran + "</td>");
                }
                //Obtener el porcentaje de Aprovechamiento...
                aprovech = (( parseFloat($("#totancho").val()) * parseFloat($("#totalto").val()) * parseInt(entran) ) / (result.data[0].ANCHO4 * result.data[0].ALTO4)) * 100;
                porcentaje = aprovech.toFixed(2);                
                $("#medidas4").append("<td>" + porcentaje + "</td>");
                $("#medidas4").append("<td></td>" + "<td></td>");
            }
            else if (result.data[0].M_Tipo == "F")
            {
                //Calcula largo de material a lo ancho y a lo alto de las piezas.
                entranAncho = parseInt(result.data[0].ANCHO4 / totAncho);
                entranAlto = parseInt(result.data[0].ANCHO4 / totAlto);  

                a_lo_ancho = Math.ceil($("#cantidad").val() / parseInt(result.data[0].ANCHO4 / $("#totancho").val()))*$("#totalto").val();
                a_lo_alto = Math.ceil($("#cantidad").val() / parseInt(result.data[0].ANCHO4 / $("#totalto").val()))*$("#totancho").val();

                //Obtiene la cantidad menor de material...
                if (a_lo_ancho < a_lo_alto) 
                {
                    aprovech = (($("#totalto").val() * $("#totancho").val() * $("#cantidad").val()) / (result.data[0].ANCHO4 * a_lo_ancho)) * 100;
                    porcentaje = aprovech.toFixed(2);
                    entran = entranAncho;
                    textoEntran = 'A lo ancho';
                    $("#medidas4").append("<td>" + entran + "</td>" + "<td>" + textoEntran + "</td>");
                    $("#medidas4").append("<td>" + porcentaje + "</td>");
                    $("#medidas4").append("<td style='color:transparent;'>" + a_lo_ancho + "</td>" + "<td style='color:transparent;'>" + a_lo_alto + "</td>");
                    //var res22 = ((totAlto * totAncho * cantidad) / (result.data[0].ANCHO4 * a_lo_ancho));
                }
                else if (a_lo_ancho > a_lo_alto)
                {
                    aprovech = (($("#totalto").val() * $("#totancho").val() * $("#cantidad").val()) / (result.data[0].ANCHO4 * a_lo_alto)) * 100;
                    porcentaje = aprovech.toFixed(2);
                    entran = entranAlto;
                    textoEntran = 'A lo alto';
                    $("#medidas4").append("<td>" + entran + "</td>" + "<td>" + textoEntran + "</td>");
                    $("#medidas4").append("<td>" + porcentaje + "</td>");
                    $("#medidas4").append("<td style='color:transparent;'>" + a_lo_ancho + "</td>" + "<td style='color:transparent;'>" + a_lo_alto + "</td>");
                    //var res22 = ((totAlto * totAncho * cantidad) / (result.data[0].ANCHO4 * a_lo_alto));
                }
                else if (a_lo_ancho == a_lo_alto)
                {
                    aprovech = (($("#totalto").val() * $("#totancho").val() * $("#cantidad").val()) / (result.data[0].ANCHO4 * a_lo_alto)) * 100;
                    porcentaje = aprovech.toFixed(2);
                    entran = entranAlto;
                    textoEntran = 'A lo alto';
                    $("#medidas4").append("<td>" + entran + "</td>" + "<td>" + textoEntran + "</td>");
                    $("#medidas4").append("<td>" + porcentaje + "</td>");  
                    $("#medidas4").append("<td style='color:transparent;'>" + a_lo_ancho + "</td>" + "<td style='color:transparent;'>" + a_lo_alto + "</td>");                  
                    //var res22 = ((totAlto * totAncho * cantidad) / (result.data[0].ANCHO4 * a_lo_alto));
                }
                else
                {
                    //no hay otra condicion...
                }
            }
            else if (result.data[0].M_Tipo == "P")
            {
                //Calcula largo de material a lo ancho y a lo alto de las piezas.
                entranAncho = parseInt(result.data[0].ANCHO4 / $("#totancho").val());
                entranAlto = parseInt(result.data[0].ANCHO4 / $("#totalto").val());  

                a_lo_ancho = Math.ceil($("#cantidad").val() / parseInt(result.data[0].ANCHO4 / $("#totancho").val()))*$("#totalto").val();
                a_lo_alto = Math.ceil($("#cantidad").val() / parseInt(result.data[0].ANCHO4 / $("#totalto").val()))*$("#totancho").val();

                //Obtiene la cantidad menor de material...
                if (a_lo_ancho < a_lo_alto) 
                {
                    aprovech = (($("#totalto").val() * $("#totancho").val() * $("#cantidad").val()) / (result.data[0].ANCHO4 * a_lo_ancho)) * 100;
                    porcentaje = aprovech.toFixed(2);
                    entran = entranAncho;
                    textoEntran = 'A lo ancho';
                    $("#medidas4").append("<td>" + entran + "</td>" + "<td>" + textoEntran + "</td>");
                    $("#medidas4").append("<td>" + porcentaje + "</td>"); 
                    $("#medidas4").append("<td style='color:transparent;'>" + a_lo_ancho + "</td>" + "<td style='color:transparent;'>" + a_lo_alto + "</td>");                   
                    //var res22 = ((totAlto * totAncho * cantidad) / (result.data[0].ANCHO4 * a_lo_ancho));
                }
                else if (a_lo_ancho > a_lo_alto)
                {
                    aprovech = (($("#totalto").val() * $("#totancho").val() * $("#cantidad").val()) / (result.data[0].ANCHO4 * a_lo_alto)) * 100;
                    porcentaje = aprovech.toFixed(2);
                    entran = entranAlto;
                    textoEntran = 'A lo alto';
                    $("#medidas4").append("<td>" + entran + "</td>" + "<td>" + textoEntran + "</td>");
                    $("#medidas4").append("<td>" + porcentaje + "</td>");
                    $("#medidas4").append("<td style='color:transparent;'>" + a_lo_ancho + "</td>" + "<td style='color:transparent;'>" + a_lo_alto + "</td>");
                    //var res22 = ((totAlto * totAncho * cantidad) / (result.data[0].ANCHO4 * a_lo_alto));
                }
                else if (a_lo_ancho == a_lo_alto)
                {
                    aprovech = (($("#totalto").val() * $("#totancho").val() * $("#cantidad").val()) / (result.data[0].ANCHO4 * a_lo_alto)) * 100;
                    porcentaje = aprovech.toFixed(2);
                    entran = entranAlto;
                    textoEntran = 'A lo alto';
                    $("#medidas4").append("<td>" + entran + "</td>" + "<td>" + textoEntran + "</td>");
                    $("#medidas4").append("<td>" + porcentaje + "</td>");
                    $("#medidas4").append("<td style='color:transparent;'>" + a_lo_ancho + "</td>" + "<td style='color:transparent;'>" + a_lo_alto + "</td>");                    
                    //var res22 = ((totAlto * totAncho * cantidad) / (result.data[0].ANCHO4 * a_lo_alto));
                }
                else
                {
                    //no hay otra condicion...
                }
            }       
    }
    if(result.data[0].ALTO5 != '' && result.data[0].ANCHO5 !='' )
    {
        $("#medidas5").append("<td>" + result.data[0].Medida_Mat_5 + "</td>" + "<td>" + result.data[0].ANCHO5 + "</td>" + "<td>" + result.data[0].ALTO5 + "</td>");
            if (result.data[0].M_Tipo== "R")
            {
                //Calcular a lo ancho/ancho...
                var resAncho = (result.data[0].ANCHO5 / parseFloat($("#totancho").val()));
                resAlto = (result.data[0].ALTO5 / parseFloat($("#totalto").val()));

                //Calcular a lo alto/alto...
                resAncho2 = (result.data[0].ANCHO5 / parseFloat($("#totalto").val()));
                resAlto2 = (result.data[0].ALTO5 / parseFloat($("#totancho").val()));

                //Calcular cuantas piezas entran a lo ancho y a lo alto...
                orientacionAncho = (parseInt(resAncho) * parseInt(resAlto));
                orientacionAlto = (parseInt(resAncho2) * parseInt(resAlto2));

                if ( orientacionAncho > orientacionAlto )
                {
                    entran = orientacionAncho;
                    textoEntran = "A lo ancho";
                    $("#medidas5").append("<td>" + entran + "</td>" + "<td>" + textoEntran + "</td>");
                } 
                else if ( orientacionAncho < orientacionAlto )
                {
                    entran = orientacionAlto;
                    textoEntran = "A lo alto"; 
                    $("#medidas5").append("<td>" + entran + "</td>" + "<td>" + textoEntran + "</td>");
                }
                else if ( orientacionAncho == orientacionAlto )
                {
                    entran = orientacionAlto;
                    textoEntran = "A lo alto";
                    $("#medidas5").append("<td>" + entran + "</td>" + "<td>" + textoEntran + "</td>");
                }
                //Obtener el porcentaje de Aprovechamiento...
                aprovech = (( parseFloat($("#totancho").val()) * parseFloat($("#totalto").val()) * parseInt(entran) ) / (result.data[0].ANCHO5 * result.data[0].ALTO5)) * 100;
                porcentaje = aprovech.toFixed(2);                
                $("#medidas5").append("<td>" + porcentaje + "</td>");
                $("#medidas5").append("<td></td>" + "<td></td>");
            }
            else if (result.data[0].M_Tipo == "F")
            {
                //Calcula largo de material a lo ancho y a lo alto de las piezas.
                entranAncho = parseInt(result.data[0].ANCHO5 / $("#totancho").val());
                entranAlto = parseInt(result.data[0].ANCHO5 / $("#totalto").val());  

                a_lo_ancho = Math.ceil($("#cantidad").val() / parseInt(result.data[0].ANCHO5 / $("#totancho").val()))*$("#totalto").val();
                a_lo_alto = Math.ceil($("#cantidad").val() / parseInt(result.data[0].ANCHO5 / $("#totalto").val()))*$("#totancho").val();

                //Obtiene la cantidad menor de material...
                if (a_lo_ancho < a_lo_alto) 
                {
                    aprovech = (($("#totalto").val() * $("#totancho").val() * $("#cantidad").val()) / (result.data[0].ANCHO5 * a_lo_ancho)) * 100;
                    porcentaje = aprovech.toFixed(2);
                    entran = entranAncho;
                    textoEntran = 'A lo ancho';
                    $("#medidas5").append("<td>" + entran + "</td>" + "<td>" + textoEntran + "</td>");
                    $("#medidas5").append("<td>" + porcentaje + "</td>");
                    $("#medidas5").append("<td style='color:transparent;'>" + a_lo_ancho + "</td>" + "<td style='color:transparent;'>" + a_lo_alto + "</td>");
                    //var res22 = ((totAlto * totAncho * cantidad) / (result.data[0].ANCHO5 * a_lo_ancho));
                }
                else if (a_lo_ancho > a_lo_alto)
                {
                    aprovech = (($("#totalto").val() * $("#totancho").val() * $("#cantidad").val()) / (result.data[0].ANCHO5 * a_lo_alto)) * 100;
                    porcentaje = aprovech.toFixed(2);
                    entran = entranAlto;
                    textoEntran = 'A lo alto';
                    $("#medidas5").append("<td>" + entran + "</td>" + "<td>" + textoEntran + "</td>");
                    $("#medidas5").append("<td>" + porcentaje + "</td>");
                    $("#medidas4").append("<td style='color:transparent;'>" + a_lo_ancho + "</td>" + "<td style='color:transparent;'>" + a_lo_alto + "</td>");
                    //var res22 = ((totAlto * totAncho * cantidad) / (result.data[0].ANCHO5 * a_lo_alto));
                }
                else if (a_lo_ancho == a_lo_alto)
                {
                    aprovech = (($("#totalto").val() * $("#totancho").val() * $("#cantidad").val()) / (result.data[0].ANCHO5 * a_lo_alto)) * 100;
                    porcentaje = aprovech.toFixed(2);
                    entran = entranAlto;
                    textoEntran = 'A lo alto';
                    $("#medidas5").append("<td>" + entran + "</td>" + "<td>" + textoEntran + "</td>");
                    $("#medidas5").append("<td>" + porcentaje + "</td>");
                    $("#medidas4").append("<td style='color:transparent;'>" + a_lo_ancho + "</td>" + "<td style='color:transparent;'>" + a_lo_alto + "</td>");                    
                    //var res22 = ((totAlto * totAncho * cantidad) / (result.data[0].ANCHO5 * a_lo_alto));
                }
                else
                {
                    //no hay otra condicion...
                }
            }
            else if (result.data[0].M_Tipo == "P")
            {
                //Calcula largo de material a lo ancho y a lo alto de las piezas.
                entranAncho = parseInt(result.data[0].ANCHO5 / $("#totancho").val());
                entranAlto = parseInt(result.data[0].ANCHO5 / $("#totalto").val());  

                a_lo_ancho = Math.ceil($("#cantidad").val() / parseInt(result.data[0].ANCHO5 / $("#totancho").val()))*$("#totalto").val();
                a_lo_alto = Math.ceil($("#cantidad").val() / parseInt(result.data[0].ANCHO5 / totAlto))*$("#totancho").val();

                //Obtiene la cantidad menor de material...
                if (a_lo_ancho < a_lo_alto) 
                {
                    aprovech = (($("#totalto").val() * $("#totancho").val() * $("#cantidad").val()) / (result.data[0].ANCHO5 * a_lo_ancho)) * 100;
                    porcentaje = aprovech.toFixed(2);
                    entran = entranAncho;
                    textoEntran = 'A lo ancho';
                    $("#medidas5").append("<td>" + entran + "</td>" + "<td>" + textoEntran + "</td>");
                    $("#medidas5").append("<td>" + porcentaje + "</td>"); 
                    $("#medidas4").append("<td style='color:transparent;'>" + a_lo_ancho + "</td>" + "<td style='color:transparent;'>" + a_lo_alto + "</td>");                   
                    //var res22 = ((totAlto * totAncho * cantidad) / (result.data[0].ANCHO5 * a_lo_ancho));
                }
                else if (a_lo_ancho > a_lo_alto)
                {
                    aprovech = (($("#totalto").val() * $("#totancho").val() * $("#cantidad").val()) / (result.data[0].ANCHO5 * a_lo_alto)) * 100;
                    porcentaje = aprovech.toFixed(2);
                    entran = entranAlto;
                    textoEntran = 'A lo alto';
                    $("#medidas5").append("<td>" + entran + "</td>" + "<td>" + textoEntran + "</td>");
                    $("#medidas5").append("<td>" + porcentaje + "</td>");
                    $("#medidas4").append("<td style='color:transparent;'>" + a_lo_ancho + "</td>" + "<td style='color:transparent;'>" + a_lo_alto + "</td>");
                    //var res22 = ((totAlto * totAncho * cantidad) / (result.data[0].ANCHO5 * a_lo_alto));
                }
                else if (a_lo_ancho == a_lo_alto)
                {
                    aprovech = (($("#totalto").val() * $("#totancho").val() * $("#cantidad").val()) / (result.data[0].ANCHO5 * a_lo_alto)) * 100;
                    porcentaje = aprovech.toFixed(2);
                    entran = entranAlto;
                    textoEntran = 'A lo alto';
                    $("#medidas5").append("<td>" + entran + "</td>" + "<td>" + textoEntran + "</td>");
                    $("#medidas5").append("<td>" + porcentaje + "</td>"); 
                    $("#medidas4").append("<td style='color:transparent;'>" + a_lo_ancho + "</td>" + "<td style='color:transparent;'>" + a_lo_alto + "</td>");                   
                    //var res22 = ((totAlto * totAncho * cantidad) / (result.data[0].ANCHO5 * a_lo_alto));
                }
                else
                {
                    //no hay otra condicion...
                }
            }   
    }
}
else
{        
    alert("Algo salio mal");  
}
},'json'); 
}

$.matTipo = function(result)
{
    if (result.data[0].M_Tipo == "R")
    {
        $("#titMat").html("MATERIAL RIGIDO");
    }
    else if (result.data[0].M_Tipo == "F")
    {
        $("#titMat").html("MATERIAL FLEXIBLE");
    }
    else if (result.data[0].M_Tipo == "P")
    {
        $("#titMat").html("MATERIAL FOTOGRAFICO");
    }   
}


//------------------------------ CALCULOS DE CANTIDAD Y PRECIO---------------------------------------------------

$.calculosmaterial = function(tblmedida,tblentran,tblAncho,tblAlto,tblaloancho,tblaloalto,tblorientacion,tblaprovecha)
{
    //tblmedida = $("#tblmedidas").find('td').eq(0).html();
    //tblentran = $("#tblmedidas").find('td').eq(3).html();
    //tblAncho = $("#tblmedidas").find('td').eq(1).html();
    //tblAlto = $("#tblmedidas").find('td').eq(2).html();
    //tblaloancho = $("#tblmedidas").find('td').eq(6).html();
    //tblaloalto = $("#tblmedidas").find('td').eq(7).html();
    //tblorientacion = $("#tblmedidas").find('td').eq(4).html();
    //tblaprovecha = $("#tblmedidas").find('td').eq(5).html(); 

    //////////////////// CALCULOS PARA MATERIAL ESPECIAL///////////////////////    
            if( $("#mat_especial").prop("checked") == true )
            {
                MedEspecial = $("#medida_especial").val();
                $.post('php/mat_especial.php', {MedEspecial:MedEspecial},               
                function(result)
                {               
                    if(result.data.length>0)
                    {
                        var importe = result.data[0].Importe;
                        proveedor = result.data[0].Proveedor;
                        if(result.data[0].M_Tipo == "R")
                        {
                            //Cuentas Cantidad y Precio
                            cantidad2 = ($("#cantidad").val() / tblentran);
                            $("#resCant").val(Math.ceil(cantidad2));
                            $("#titCantMat").html('Pzas.');
                            
                            anchom = (tblAncho/100);
                            altom = (tblAlto/100);
                          
                            valor = (anchom * altom * $("#resCant").val() * importe * 1.1);
                            $("#resPrecio").val(number_format(valor,0));
                            $.subtotal();

                        } else if(result.data[0].M_Tipo == "F")
                        {
                                //Cuentas Cantidad y Precio
                                if (tblaloancho < tblaloalto)
                                {
                                    anchoMat = parseFloat(tblAncho)/100;
                                    aloancho = parseFloat(tblaloancho)/100;
                                    cantidad2 = parseFloat(anchoMat) * parseFloat(aloancho);
                                    cantidad2 = cantidad2 / anchoMat;
                                    cantidad2 = cantidad2.toFixed(2);
                                }
                                else
                                {
                                    anchoMat = parseFloat(tblAncho)/100;
                                    aloalto = parseFloat(tblaloalto)/100;
                                    cantidad2 = parseFloat(anchoMat) * parseFloat(aloalto);
                                    cantidad2 = cantidad2 / anchoMat;
                                    cantidad2 = cantidad2.toFixed(2);
                                }

                                $("#resCant").val(cantidad2);
                                $("#titCantMat").html('m.');

                                valor = (importe * cantidad2);
                                valor = (valor * (tblAncho / 100)) * 1.1;
                                
                                $("#resPrecio").val(number_format(valor,0));
                                $.subtotal();                           

                        } else if(result.data[0].M_Tipo == "P")
                        {
                            //Cuentas Cantidad y Precio que no sean lona
                            if (tblaloancho < tblaloalto)
                            {
                                anchoMat = parseFloat(tblAncho)/100;
                                aloancho = parseFloat(tblaloancho)/100;
                                cantidad2 = parseFloat(anchoMat) * parseFloat(aloancho);
                                cantidad2 = cantidad2 / anchoMat;
                                cantidad2 = cantidad2.toFixed(2);
                            }
                            else
                            {
                                anchoMat = parseFloat(tblAncho)/100;
                                aloalto = parseFloat(tblaloalto)/100;
                                cantidad2 = parseFloat(anchoMat) * parseFloat(aloalto);
                                cantidad2 = cantidad2 / anchoMat;
                                cantidad2 = cantidad2.toFixed(2);
                            }

                            $("#resCant").val(cantidad2);
                            $("#titCantMat").html('m.');

                            valor = (importe * cantidad2);
                            valor = (valor * (tblAncho / 100)) * 1.1;
                            
                            $("#resPrecio").val(number_format(valor,0));
                            $.subtotal();   

                        }
                    }
                    else
                    {        
                        alert("Algo salio mal");  
                    }
                },'json');  
            }
            else
///////////// /////////////////////// SIN MATERIAL ESPECIAL /////////////////7
            {
                id_meterial = $("#material").val();
                $.post('php/medidas.php', {id_meterial:id_meterial},               
                function(result)
                {               
                    if(result.data.length>0)
                    {
                        var importe = result.data[0].Importe;
                        proveedor = result.data[0].Proveedor;
                        if(result.data[0].M_Tipo == "R")
                        {
                            //Cuentas Cantidad y Precio
                            cantidad2 = ($("#cantidad").val() / tblentran);
                            $("#resCant").val(Math.ceil(cantidad2));
                            $("#titCantMat").html('Pzas.');
                            
                            anchom = (tblAncho/100);
                            altom = (tblAlto/100);
                            valor = (anchom * altom * $("#resCant").val() * importe * 1.1);
                            
                            $("#resPrecio").val(number_format(valor,0));
                            $.subtotal();

                        } else if(result.data[0].M_Tipo == "F")
                        {
                             if (solvente=="1") {
                               
                                //Cuentas Cantidad y Precio que no sean lona
                                m2= ($("#totancho").val() / 100) * ($("#totalto").val() / 100);
                                cantidad2 = ( ($("#totancho").val() / 100) * ($("#totalto").val() / 100) * $("#cantidad").val());    

                                
                                $.post("php/calcular_solvente.php",{cantidad2:cantidad2, id_meterial:id_meterial}, function(data) 
                                {
                                    totallona=data;
                                                         
                                 

                                    $("#titCantMat").html("m.");
                                    $("#resCant").val(number_format(cantidad2,0));
                                    $("#resPrecio").val(number_format(totallona,0));
                                    $.subtotal();  
                                } );                                                                                                                          
                            }
                            else
                            {
                                //Cuentas Cantidad y Precio que no sean lona
                                if (tblaloancho < tblaloalto)
                                {
                                    anchoMat = parseFloat(tblAncho)/100;
                                    aloancho = parseFloat(tblaloancho)/100;
                                    cantidad2 = parseFloat(anchoMat) * parseFloat(aloancho);
                                    cantidad2 = cantidad2 / anchoMat;
                                    cantidad2 = cantidad2.toFixed(2);
                                }
                                else
                                {
                                    anchoMat = parseFloat(tblAncho)/100;
                                    aloalto = parseFloat(tblaloalto)/100;
                                    cantidad2 = parseFloat(anchoMat) * parseFloat(aloalto);
                                    cantidad2 = cantidad2 / anchoMat;
                                    cantidad2 = cantidad2.toFixed(2);
                                }

                                $("#resCant").val(cantidad2);
                                $("#titCantMat").html('m.');

                                valor = (importe * cantidad2);
                                valor = (valor * (tblAncho / 100)) * 1.1;
                                
                                $("#resPrecio").val(number_format(valor,0));
                                $.subtotal();                           
                            }

                        } else if(result.data[0].M_Tipo == "P")
                        {
                            //Cuentas Cantidad y Precio que no sean lona
                            if (tblaloancho < tblaloalto)
                            {
                                anchoMat = parseFloat(tblAncho)/100;
                                aloancho = parseFloat(tblaloancho)/100;
                                cantidad2 = parseFloat(anchoMat) * parseFloat(aloancho);
                                cantidad2 = cantidad2 / anchoMat;
                                cantidad2 = cantidad2.toFixed(2);
                            }
                            else
                            {
                                anchoMat = parseFloat(tblAncho)/100;
                                aloalto = parseFloat(tblaloalto)/100;
                                cantidad2 = parseFloat(anchoMat) * parseFloat(aloalto);
                                cantidad2 = cantidad2 / anchoMat;
                                cantidad2 = cantidad2.toFixed(2);
                            }

                            $("#resCant").val(cantidad2);
                            $("#titCantMat").html('m.');

                            valor = (importe * cantidad2);
                            valor = (valor * (tblAncho / 100)) * 1.1;
                            
                            $("#resPrecio").val(number_format(valor,0));
                            $.subtotal();   

                        }
                    }
                    else
                    {        
                        alert("Algo salio mal");  
                    }
                },'json');              
            }    
}

$.resolucion720 = function()
{   
        if ($("#720").prop("checked") == true) 
        {
            if( $("#mat_especial").prop("checked") == true)
            {
                MedEspecial = $("#medida_especial").val();
                $.post('php/mat_especial.php', {MedEspecial:MedEspecial},               
                function(result)
                {               
                if(result.data.length>0)
                {

                    if(result.data[0].Traslucido == "0")
                    {   
                        if(result.data[0].M_Tipo == "R")
                        {                   
                            var areaImpresion = (parseFloat($("#totancho").val())/100) *  (parseFloat($("#totalto").val())/100) * parseInt($("#cantidad").val());
                            var valor =  140 * parseFloat(areaImpresion);                       
                            $("#resTinta").val(number_format(valor,0));
                            $.subtotal();
                            //var procientotinta = ( valor - (valor * 0.20) );                                                
                            //$("#porTinta").val(number_format(procientotinta,0));
                            //var procientomano = ( valor - (valor * 0.80) );                                                 
                            //$("#manoObra").val(number_format(procientomano,0));  
                            var suma = parseFloat(valor) +  parseFloat( $("#resBlanco").val().replace(/,/gi,'') );            
                            procientomano = ( parseFloat(suma) *  parseFloat( $("#porcientoManoObra").val() / 100 ) ) ;
                            $("#manoObra").val(number_format(procientomano,0)); 
                            procientotinta = ( parseFloat(suma) * ( $("#porcentajeTinta").val() / 100 ) );  
                            $("#porTinta").val(number_format(procientotinta,0));                                                  
                        } 
                        else if(result.data[0].M_Tipo == "F")
                        {
                            var areaImpresion = (parseFloat($("#totancho").val())/100) *  (parseFloat($("#totalto").val())/100) * parseInt($("#cantidad").val());
                            var valor =  91 * parseFloat(areaImpresion);
                            $("#resTinta").val(number_format(valor,0));
                            $.subtotal();
                            //var procientotinta = ( valor - (valor * 0.20) );                                                    
                            //$("#porTinta").val(number_format(procientotinta,0));
                            //var procientomano = ( valor - (valor * 0.80) );                                                 
                            //$("#manoObra").val(number_format(procientomano,0));
                            var suma = parseFloat(valor) +  parseFloat( $("#resBlanco").val().replace(/,/gi,'') );            
                            procientomano = ( parseFloat(suma) *  parseFloat( $("#porcientoManoObra").val() / 100 ) ) ;
                            $("#manoObra").val(number_format(procientomano,0)); 
                            procientotinta = ( parseFloat(suma) * ( $("#porcentajeTinta").val() / 100 ) );  
                            $("#porTinta").val(number_format(procientotinta,0));                                                                                    
                        }
                        else if(result.data[0].M_Tipo == "P")
                        {
                            var areaImpresion = (parseFloat($("#totancho").val())/100) *  (parseFloat($("#totalto").val())/100) * parseInt($("#cantidad").val());
                            var valor =  250 * parseFloat(areaImpresion);
                            $("#resTinta").val(number_format(valor,0));
                            $.subtotal();
                            //var procientotinta = ( valor - (valor * 0.20) );                                                    
                            //$("#porTinta").val(number_format(procientotinta,0));
                            //var procientomano = ( valor - (valor * 0.80) );                                                 
                            //$("#manoObra").val(number_format(procientomano,0)); 
                            var suma = parseFloat(valor) +  parseFloat( $("#resBlanco").val().replace(/,/gi,'') );            
                            procientomano = ( parseFloat(suma) *  parseFloat( $("#porcientoManoObra").val() / 100 ) ) ;
                            $("#manoObra").val(number_format(procientomano,0)); 
                            procientotinta = ( parseFloat(suma) * ( $("#porcentajeTinta").val() / 100 ) );  
                            $("#porTinta").val(number_format(procientotinta,0));                                                                                                                   
                        }
                    }
                    else
                    {
                        if(result.data[0].M_Tipo == "R")
                        {                   
                            var traslucido = 140 * 0.25;
                            var areaImpresion = (parseFloat($("#totancho").val())/100) *  (parseFloat($("#totalto").val())/100) * parseInt($("#cantidad").val());
                            var valor =  (140 + traslucido) * parseFloat(areaImpresion);    
                            $("#resTinta").val(number_format(valor,0));
                            $.subtotal();
                            //var procientotinta = ( parseFloat(valor) - (parseFloat(valor) * 0.20) );                        
                            //$("#porTinta").val(number_format(procientotinta,0));
                            //var procientomano = ( valor - (valor * 0.80) );                                                 
                            //$("#manoObra").val(number_format(procientomano,0)); 
                            var suma = parseFloat(valor) +  parseFloat( $("#resBlanco").val().replace(/,/gi,'') );            
                            procientomano = ( parseFloat(suma) *  parseFloat( $("#porcientoManoObra").val() / 100 ) ) ;
                            $("#manoObra").val(number_format(procientomano,0)); 
                            procientotinta = ( parseFloat(suma) * ( $("#porcentajeTinta").val() / 100 ) );  
                            $("#porTinta").val(number_format(procientotinta,0));                                                                                       
                        } 
                        else if(result.data[0].M_Tipo == "F")
                        {
                            var traslucido = 91 * 0.25;
                            var areaImpresion = (parseFloat($("#totancho").val())/100) *  (parseFloat($("#totalto").val())/100) * parseInt($("#cantidad").val());
                            var valor =  (91 + traslucido) * parseFloat(areaImpresion); 
                            $("#resTinta").val(number_format(valor,0));
                            $.subtotal();
                            //var procientotinta = ( parseFloat(valor) - (parseFloat(valor) * 0.20) );                        
                            //$("#porTinta").val(number_format(procientotinta,0));
                            //var procientomano = ( valor - (valor * 0.80) );                                                 
                            //$("#manoObra").val(number_format(procientomano,0)); 
                            var suma = parseFloat(valor) +  parseFloat( $("#resBlanco").val().replace(/,/gi,'') );            
                            procientomano = ( parseFloat(suma) *  parseFloat( $("#porcientoManoObra").val() / 100 ) ) ;
                            $("#manoObra").val(number_format(procientomano,0)); 
                            procientotinta = ( parseFloat(suma) * ( $("#porcentajeTinta").val() / 100 ) );  
                            $("#porTinta").val(number_format(procientotinta,0));                                                                                       
                        }
                        else if(result.data[0].M_Tipo == "P")
                        {
                            var traslucido = 250 * 0.25;
                            var areaImpresion = (parseFloat($("#totancho").val())/100) *  (parseFloat($("#totalto").val())/100) * parseInt($("#cantidad").val());
                            var valor =  (250 + traslucido) * parseFloat(areaImpresion);    
                            $("#resTinta").val(number_format(valor,0));
                            $.subtotal();
                            //var procientotinta = ( parseFloat(valor) - (parseFloat(valor) * 0.20) );                        
                            //$("#porTinta").val(number_format(procientotinta,0));
                            //var procientomano = ( valor - (valor * 0.80) );                                                 
                            //$("#manoObra").val(number_format(procientomano,0)); 
                            var suma = parseFloat(valor) +  parseFloat( $("#resBlanco").val().replace(/,/gi,'') );            
                            procientomano = ( parseFloat(suma) *  parseFloat( $("#porcientoManoObra").val() / 100 ) ) ;
                            $("#manoObra").val(number_format(procientomano,0)); 
                            procientotinta = ( parseFloat(suma) * ( $("#porcentajeTinta").val() / 100 ) );  
                            $("#porTinta").val(number_format(procientotinta,0));                                                                                                                   
                        }                       
                    }
                }
                },'json');                              
            }
            else 
            {
                id_meterial = $("#material").val();
                $.post('php/medidas.php', {id_meterial:id_meterial},               
                function(result)
                {               
                if(result.data.length>0)
                {

                    if(result.data[0].Traslucido == "0")
                    {   
                        if(result.data[0].M_Tipo == "R")
                        {                   
                            var areaImpresion = (parseFloat($("#totancho").val())/100) *  (parseFloat($("#totalto").val())/100) * parseInt($("#cantidad").val());
                            var valor =  140 * parseFloat(areaImpresion);                       
                            $("#resTinta").val(number_format(valor,0));
                            $.subtotal();
                            //var procientotinta = ( valor - (valor * 0.20) );                                                
                            //$("#porTinta").val(number_format(procientotinta));
                            //var procientomano = ( valor - (valor * 0.80) );                                                 
                            //$("#manoObra").val(number_format(procientomano,0));  
                            var suma = parseFloat(valor) +  parseFloat( $("#resBlanco").val().replace(/,/gi,'') );            
                            procientomano = ( parseFloat(suma) *  parseFloat( $("#porcientoManoObra").val() / 100 ) ) ;
                            $("#manoObra").val(number_format(procientomano,0)); 
                            procientotinta = ( parseFloat(suma) * ( $("#porcentajeTinta").val() / 100 ) );  
                            $("#porTinta").val(number_format(procientotinta,0));                                                  
                        } 
                        else if(result.data[0].M_Tipo == "F")
                        {
                            var areaImpresion = (parseFloat($("#totancho").val())/100) *  (parseFloat($("#totalto").val())/100) * parseInt($("#cantidad").val());
                            var valor =  91 * parseFloat(areaImpresion);
                            $("#resTinta").val(number_format(valor,0));
                            $.subtotal();
                            //var procientotinta = ( valor - (valor * 0.20) );                                                    
                            //$("#porTinta").val(number_format(procientotinta));
                            //var procientomano = ( valor - (valor * 0.80) );                                                 
                            //$("#manoObra").val(number_format(procientomano,0)); 
                            var suma = parseFloat(valor) +  parseFloat( $("#resBlanco").val().replace(/,/gi,'') );            
                            procientomano = ( parseFloat(suma) *  parseFloat( $("#porcientoManoObra").val() / 100 ) ) ;
                            $("#manoObra").val(number_format(procientomano,0)); 
                            procientotinta = ( parseFloat(suma) * ( $("#porcentajeTinta").val() / 100 ) );  
                            $("#porTinta").val(number_format(procientotinta,0));                                                                                   
                        }
                        else if(result.data[0].M_Tipo == "P")
                        {
                            var areaImpresion = (parseFloat($("#totancho").val())/100) *  (parseFloat($("#totalto").val())/100) * parseInt($("#cantidad").val());
                            var valor =  250 * parseFloat(areaImpresion);
                            $("#resTinta").val(number_format(valor,0));
                            $.subtotal();
                            //var procientotinta = ( valor - (valor * 0.20) );                                                    
                            //$("#porTinta").val(number_format(procientotinta));
                            //var procientomano = ( valor - (valor * 0.80) );                                                 
                            //$("#manoObra").val(number_format(procientomano,0)); 
                            var suma = parseFloat(valor) +  parseFloat( $("#resBlanco").val().replace(/,/gi,'') );            
                            procientomano = ( parseFloat(suma) *  parseFloat( $("#porcientoManoObra").val() / 100 ) ) ;
                            $("#manoObra").val(number_format(procientomano,0)); 
                            procientotinta = ( parseFloat(suma) * ( $("#porcentajeTinta").val() / 100 ) );  
                            $("#porTinta").val(number_format(procientotinta,0));                                                                                                                   
                        }
                    }
                    else
                    {
                        if(result.data[0].M_Tipo == "R")
                        {                   
                            var traslucido = 140 * 0.25;
                            var areaImpresion = (parseFloat($("#totancho").val())/100) *  (parseFloat($("#totalto").val())/100) * parseInt($("#cantidad").val());
                            var valor =  (140 + traslucido) * parseFloat(areaImpresion);    
                            $("#resTinta").val(number_format(valor,0));
                            $.subtotal();
                            //var procientotinta = ( parseFloat(valor) - (parseFloat(valor) * 0.20) );                        
                            //$("#porTinta").val(number_format(procientotinta));
                            //var procientomano = ( valor - (valor * 0.80) );                                                 
                            //$("#manoObra").val(number_format(procientomano,0));  
                            var suma = parseFloat(valor) +  parseFloat( $("#resBlanco").val().replace(/,/gi,'') );            
                            procientomano = ( parseFloat(suma) *  parseFloat( $("#porcientoManoObra").val() / 100 ) ) ;
                            $("#manoObra").val(number_format(procientomano,0)); 
                            procientotinta = ( parseFloat(suma) * ( $("#porcentajeTinta").val() / 100 ) );  
                            $("#porTinta").val(number_format(procientotinta,0));                                                                                      
                        } 
                        else if(result.data[0].M_Tipo == "F")
                        {
                            var traslucido = 91 * 0.25;
                            var areaImpresion = (parseFloat($("#totancho").val())/100) *  (parseFloat($("#totalto").val())/100) * parseInt($("#cantidad").val());
                            var valor =  (91 + traslucido) * parseFloat(areaImpresion); 
                            $("#resTinta").val(number_format(valor,0));
                            $.subtotal();
                            //var procientotinta = ( parseFloat(valor) - (parseFloat(valor) * 0.20) );                        
                            //$("#porTinta").val(number_format(procientotinta));
                            //var procientomano = ( valor - (valor * 0.80) );                                                 
                            //$("#manoObra").val(number_format(procientomano,0));                                                            
                            var suma = parseFloat(valor) +  parseFloat( $("#resBlanco").val().replace(/,/gi,'') );            
                            procientomano = ( parseFloat(suma) *  parseFloat( $("#porcientoManoObra").val() / 100 ) ) ;
                            $("#manoObra").val(number_format(procientomano,0)); 
                            procientotinta = ( parseFloat(suma) * ( $("#porcentajeTinta").val() / 100 ) );  
                            $("#porTinta").val(number_format(procientotinta,0));                            
                        }
                        else if(result.data[0].M_Tipo == "P")
                        {
                            var traslucido = 250 * 0.25;
                            var areaImpresion = (parseFloat($("#totancho").val())/100) *  (parseFloat($("#totalto").val())/100) * parseInt($("#cantidad").val());
                            var valor =  (250 + traslucido) * parseFloat(areaImpresion);    
                            $("#resTinta").val(number_format(valor,0));
                            $.subtotal();
                            //var procientotinta = ( parseFloat(valor) - (parseFloat(valor) * 0.20) );                        
                            //$("#porTinta").val(number_format(procientotinta));
                            //var procientomano = ( valor - (valor * 0.80) );                                                 
                            //$("#manoObra").val(number_format(procientomano,0));                                                                                        
                            var suma = parseFloat(valor) +  parseFloat( $("#resBlanco").val().replace(/,/gi,'') );            
                            procientomano = ( parseFloat(suma) *  parseFloat( $("#porcientoManoObra").val() / 100 ) ) ;
                            $("#manoObra").val(number_format(procientomano,0)); 
                            procientotinta = ( parseFloat(suma) * ( $("#porcentajeTinta").val() / 100 ) );  
                            $("#porTinta").val(number_format(procientotinta,0));                            
                        }                       
                    }
                }
                },'json');              
            }

        }
        else
        {
            $("#resTinta").val("0");
        }
}

$.resolucion1440 = function()
{
        if ($("#1440").prop("checked") == true) 
        {
            if( $("#mat_especial").prop("checked") == true)
            {
                MedEspecial = $("#medida_especial").val();
                $.post('php/mat_especial.php', {MedEspecial:MedEspecial},               
                function(result)
                {               
                if(result.data.length>0)
                {

                    if(result.data[0].Traslucido == "0")
                    {   
                        if(result.data[0].M_Tipo == "R")
                        {                   
                            var areaImpresion = (parseFloat($("#totancho").val())/100) *  (parseFloat($("#totalto").val())/100) * parseInt($("#cantidad").val());
                            var valor =  175 * parseFloat(areaImpresion);
                            //procientotinta = ( parseFloat(valor) - (parseFloat(valor) * 0.20) );                        
                            //$("#porTinta").val(number_format(procientotinta));
                            $("#resTinta").val(number_format(valor,0));
                            //var procientomano = ( valor - (valor * 0.80) );                                                 
                            //$("#manoObra").val(number_format(procientomano));                        
                            $.subtotal();
                            var suma = parseFloat(valor) +  parseFloat( $("#resBlanco").val().replace(/,/gi,'') );            
                            procientomano = ( parseFloat(suma) *  parseFloat( $("#porcientoManoObra").val() / 100 ) ) ;
                            $("#manoObra").val(number_format(procientomano,0)); 
                            procientotinta = ( parseFloat(suma) * ( $("#porcentajeTinta").val() / 100 ) );  
                            $("#porTinta").val(number_format(procientotinta,0));                        
                        } 
                        else if(result.data[0].M_Tipo == "F")
                        {
                            var areaImpresion = (parseFloat($("#totancho").val())/100) *  (parseFloat($("#totalto").val())/100) * parseInt($("#cantidad").val());
                            var valor =  114 * parseFloat(areaImpresion);
                            $("#resTinta").val(number_format(valor,0));                            
                            //var procientotinta = ( parseFloat(valor) - (parseFloat(valor) * 0.20) );                        
                            //$("#porTinta").val(number_format(procientotinta,0));
                            //var procientomano = ( valor - (valor * 0.80) );                                                 
                            //$("#manoObra").val(number_format(procientomano,0));                            
                            $.subtotal();
                            var suma = parseFloat(valor) +  parseFloat( $("#resBlanco").val().replace(/,/gi,'') );            
                            procientomano = ( parseFloat(suma) *  parseFloat( $("#porcientoManoObra").val() / 100 ) ) ;
                            $("#manoObra").val(number_format(procientomano,0)); 
                            procientotinta = ( parseFloat(suma) * ( $("#porcentajeTinta").val() / 100 ) );  
                            $("#porTinta").val(number_format(procientotinta,0));                            
                        }
                        else if(result.data[0].M_Tipo == "P")
                        {
                            var areaImpresion = (parseFloat($("#totancho").val())/100) *  (parseFloat($("#totalto").val())/100) * parseInt($("#cantidad").val());
                            var valor =  250 * parseFloat(areaImpresion);
                            $("#resTinta").val(number_format(valor,0));                            
                            //var procientotinta = ( parseFloat(valor) - (parseFloat(valor) * 0.20) );                        
                            //$("#porTinta").val(number_format(procientotinta,0));
                            //var procientomano = ( valor - (valor * 0.80) );                                                 
                            //$("#manoObra").val(number_format(procientomano,0));
                            $.subtotal(); 
                            var suma = parseFloat(valor) +  parseFloat( $("#resBlanco").val().replace(/,/gi,'') );            
                            procientomano = ( parseFloat(suma) *  parseFloat( $("#porcientoManoObra").val() / 100 ) ) ;
                            $("#manoObra").val(number_format(procientomano,0)); 
                            procientotinta = ( parseFloat(suma) * ( $("#porcentajeTinta").val() / 100 ) );  
                            $("#porTinta").val(number_format(procientotinta,0));                                                                              
                        }
                    }
                    else
                    {
                        if(result.data[0].M_Tipo == "R")
                        {                   
                            var traslucido = 175 * 0.25;
                            var areaImpresion = (parseFloat($("#totancho").val())/100) *  (parseFloat($("#totalto").val())/100) * parseInt($("#cantidad").val());
                            var valor =  (175 + traslucido) * parseFloat(areaImpresion);    
                            $("#resTinta").val(number_format(valor,0));                            
                            //var procientotinta = ( parseFloat(valor) - (parseFloat(valor) * 0.20) );                        
                            //$("#porTinta").val(number_format(procientotinta,0));
                            //var procientomano = ( valor - (valor * 0.80) );                                                 
                            //$("#manoObra").val(number_format(procientomano,0));                            
                            $.subtotal();
                            var suma = parseFloat(valor) +  parseFloat( $("#resBlanco").val().replace(/,/gi,'') );            
                            procientomano = ( parseFloat(suma) *  parseFloat( $("#porcientoManoObra").val() / 100 ) ) ;
                            $("#manoObra").val(number_format(procientomano,0)); 
                            procientotinta = ( parseFloat(suma) * ( $("#porcentajeTinta").val() / 100 ) );  
                            $("#porTinta").val(number_format(procientotinta,0));                            
                        } 
                        else if(result.data[0].M_Tipo == "F")
                        {
                            var traslucido = 114 * 0.25;
                            var areaImpresion = (parseFloat($("#totancho").val())/100) *  (parseFloat($("#totalto").val())/100) * parseInt($("#cantidad").val());
                            var valor =  (114 + traslucido) * parseFloat(areaImpresion);    
                            $("#resTinta").val(number_format(valor,0));                            
                            //var procientotinta = ( parseFloat(valor) - (parseFloat(valor) * 0.20) );                        
                            //$("#porTinta").val(number_format(procientotinta,0));
                            //var procientomano = ( valor - (valor * 0.80) );                                                 
                            //$("#manoObra").val(number_format(procientomano,0));                            
                            $.subtotal();
                            var suma = parseFloat(valor) +  parseFloat( $("#resBlanco").val().replace(/,/gi,'') );            
                            procientomano = ( parseFloat(suma) *  parseFloat( $("#porcientoManoObra").val() / 100 ) ) ;
                            $("#manoObra").val(number_format(procientomano,0)); 
                            procientotinta = ( parseFloat(suma) * ( $("#porcentajeTinta").val() / 100 ) );  
                            $("#porTinta").val(number_format(procientotinta,0));                            
                        }
                        else if(result.data[0].M_Tipo == "P")
                        {
                            var traslucido = 250 * 0.25;
                            var areaImpresion = (parseFloat($("#totancho").val())/100) *  (parseFloat($("#totalto").val())/100) * parseInt($("#cantidad").val());
                            var valor =  (250 + traslucido) * parseFloat(areaImpresion);    
                            $("#resTinta").val(number_format(valor,0));                            
                            //var procientotinta = ( parseFloat(valor) - (parseFloat(valor) * 0.20) );                        
                            //$("#porTinta").val(number_format(procientotinta,0));
                            //var procientomano = ( valor - (valor * 0.80) );                                                 
                            //$("#manoObra").val(number_format(procientomano,0));                            
                            $.subtotal();
                            var suma = parseFloat(valor) +  parseFloat( $("#resBlanco").val().replace(/,/gi,'') );            
                            procientomano = ( parseFloat(suma) *  parseFloat( $("#porcientoManoObra").val() / 100 ) ) ;
                            $("#manoObra").val(number_format(procientomano,0)); 
                            procientotinta = ( parseFloat(suma) * ( $("#porcentajeTinta").val() / 100 ) );  
                            $("#porTinta").val(number_format(procientotinta,0));                                                       
                        }                       
                    }
                }
                },'json');                              
            }
            else 
            {
                id_meterial = $("#material").val();
                $.post('php/medidas.php', {id_meterial:id_meterial},               
                function(result)
                {               
                if(result.data.length>0)
                {

                    if(result.data[0].Traslucido == "0")
                    {   
                        if(result.data[0].M_Tipo == "R")
                        {                   
                            var areaImpresion = (parseFloat($("#totancho").val())/100) *  (parseFloat($("#totalto").val())/100) * parseInt($("#cantidad").val());
                            var valor =  175 * parseFloat(areaImpresion);
                            //procientotinta = ( parseFloat(valor) - (parseFloat(valor) * 0.20) );                        
                            //$("#porTinta").val(number_format(procientotinta,0));
                            $("#resTinta").val(number_format(valor,0));
                            //var procientomano = ( valor - (valor * 0.80) );                                                 
                            //$("#manoObra").val(number_format(procientomano,0));                        
                            $.subtotal();
                            var suma = parseFloat(valor) +  parseFloat( $("#resBlanco").val().replace(/,/gi,'') );            
                            procientomano = ( parseFloat(suma) *  parseFloat( $("#porcientoManoObra").val() / 100 ) ) ;
                            $("#manoObra").val(number_format(procientomano,0)); 
                            procientotinta = ( parseFloat(suma) * ( $("#porcentajeTinta").val() / 100 ) );  
                            $("#porTinta").val(number_format(procientotinta,0));                        
                        } 
                        else if(result.data[0].M_Tipo == "F")
                        {
                            var areaImpresion = (parseFloat($("#totancho").val())/100) *  (parseFloat($("#totalto").val())/100) * parseInt($("#cantidad").val());
                            var valor =  114 * parseFloat(areaImpresion);
                            $("#resTinta").val(number_format(valor,0));                            
                            //var procientotinta = ( parseFloat(valor) - (parseFloat(valor) * 0.20) );                        
                            //$("#porTinta").val(number_format(procientotinta,0));
                            //var procientomano = ( valor - (valor * 0.80) );                                                 
                            //$("#manoObra").val(number_format(procientomano,0));                            
                            $.subtotal();
                            var suma = parseFloat(valor) +  parseFloat( $("#resBlanco").val().replace(/,/gi,'') );            
                            procientomano = ( parseFloat(suma) *  parseFloat( $("#porcientoManoObra").val() / 100 ) ) ;
                            $("#manoObra").val(number_format(procientomano,0)); 
                            procientotinta = ( parseFloat(suma) * ( $("#porcentajeTinta").val() / 100 ) );  
                            $("#porTinta").val(number_format(procientotinta,0));                            
                        }
                        else if(result.data[0].M_Tipo == "P")
                        {
                            var areaImpresion = (parseFloat($("#totancho").val())/100) *  (parseFloat($("#totalto").val())/100) * parseInt($("#cantidad").val());
                            var valor =  250 * parseFloat(areaImpresion);
                            $("#resTinta").val(number_format(valor,0));                            
                            //var procientotinta = ( parseFloat(valor) - (parseFloat(valor) * 0.20) );                        
                            //$("#porTinta").val(number_format(procientotinta,0));
                            //var procientomano = ( valor - (valor * 0.80) );                                                 
                            //$("#manoObra").val(number_format(procientomano,0));
                            $.subtotal(); 
                            var suma = parseFloat(valor) +  parseFloat( $("#resBlanco").val().replace(/,/gi,'') );            
                            procientomano = ( parseFloat(suma) *  parseFloat( $("#porcientoManoObra").val() / 100 ) ) ;
                            $("#manoObra").val(number_format(procientomano,0)); 
                            procientotinta = ( parseFloat(suma) * ( $("#porcentajeTinta").val() / 100 ) );  
                            $("#porTinta").val(number_format(procientotinta,0));                                                                              
                        }
                    }
                    else
                    {
                        if(result.data[0].M_Tipo == "R")
                        {                   
                            var traslucido = 175 * 0.25;
                            var areaImpresion = (parseFloat($("#totancho").val())/100) *  (parseFloat($("#totalto").val())/100) * parseInt($("#cantidad").val());
                            var valor =  (175 + traslucido) * parseFloat(areaImpresion);    
                            $("#resTinta").val(number_format(valor,0));                            
                            //var procientotinta = ( parseFloat(valor) - (parseFloat(valor) * 0.20) );                        
                            //$("#porTinta").val(number_format(procientotinta,0));
                            //var procientomano = ( valor - (valor * 0.80) );                                                 
                            //$("#manoObra").val(number_format(procientomano,0));                            
                            $.subtotal();
                            var suma = parseFloat(valor) +  parseFloat( $("#resBlanco").val().replace(/,/gi,'') );            
                            procientomano = ( parseFloat(suma) *  parseFloat( $("#porcientoManoObra").val() / 100 ) ) ;
                            $("#manoObra").val(number_format(procientomano,0)); 
                            procientotinta = ( parseFloat(suma) * ( $("#porcentajeTinta").val() / 100 ) );  
                            $("#porTinta").val(number_format(procientotinta,0));                            
                        } 
                        else if(result.data[0].M_Tipo == "F")
                        {
                            var traslucido = 114 * 0.25;
                            var areaImpresion = (parseFloat($("#totancho").val())/100) *  (parseFloat($("#totalto").val())/100) * parseInt($("#cantidad").val());
                            var valor =  (114 + traslucido) * parseFloat(areaImpresion);    
                            $("#resTinta").val(number_format(valor,0));                            
                            //var procientotinta = ( parseFloat(valor) - (parseFloat(valor) * 0.20) );                        
                            //$("#porTinta").val(number_format(procientotinta,0));
                            //var procientomano = ( valor - (valor * 0.80) );                                                 
                            //$("#manoObra").val(number_format(procientomano,0));                            
                            $.subtotal();
                            var suma = parseFloat(valor) +  parseFloat( $("#resBlanco").val().replace(/,/gi,'') );            
                            procientomano = ( parseFloat(suma) *  parseFloat( $("#porcientoManoObra").val() / 100 ) ) ;
                            $("#manoObra").val(number_format(procientomano,0)); 
                            procientotinta = ( parseFloat(suma) * ( $("#porcentajeTinta").val() / 100 ) );  
                            $("#porTinta").val(number_format(procientotinta,0));                            
                        }
                        else if(result.data[0].M_Tipo == "P")
                        {
                            var traslucido = 250 * 0.25;
                            var areaImpresion = (parseFloat($("#totancho").val())/100) *  (parseFloat($("#totalto").val())/100) * parseInt($("#cantidad").val());
                            var valor =  (250 + traslucido) * parseFloat(areaImpresion);    
                            $("#resTinta").val(number_format(valor,0));                            
                            //var procientotinta = ( parseFloat(valor) - (parseFloat(valor) * 0.20) );                        
                            //$("#porTinta").val(number_format(procientotinta,0));
                            //var procientomano = ( valor - (valor * 0.80) );                                                 
                            //$("#manoObra").val(number_format(procientomano,0));                            
                            $.subtotal();
                            var suma = parseFloat(valor) +  parseFloat( $("#resBlanco").val().replace(/,/gi,'') );            
                            procientomano = ( parseFloat(suma) *  parseFloat( $("#porcientoManoObra").val() / 100 ) ) ;
                            $("#manoObra").val(number_format(procientomano,0)); 
                            procientotinta = ( parseFloat(suma) * ( $("#porcentajeTinta").val() / 100 ) );  
                            $("#porTinta").val(number_format(procientotinta,0));                                                       
                        }                       
                    }
                }
                },'json');              
            }                   
        }
        else
        {
            $("#resTinta").val("0");
        }   
}

$.Sandwich = function()
{
    if ($("#Sandwich").prop("checked") == true) 
    {    
        var areaImpresion = (parseFloat($("#totancho").val())/100) *  (parseFloat($("#totalto").val())/100) * parseInt($("#cantidad").val());
        var valor = 350 * parseFloat(areaImpresion);            
        $("#resTinta").val(number_format(valor,0));
        //var procientotinta = ( parseFloat(valor) - (parseFloat(valor) * 0.20) );                        
        //$("#porTinta").val(number_format(procientotinta,0));
        //var procientomano = ( valor - (valor * 0.80) );                                                 
        //$("#manoObra").val(number_format(procientomano,0));                            
        $.subtotal();   
        var suma = parseFloat(valor) +  parseFloat( $("#resBlanco").val().replace(/,/gi,'') );            
        procientomano = ( parseFloat(suma) *  parseFloat( $("#porcientoManoObra").val() / 100 ) ) ;
        $("#manoObra").val(number_format(procientomano,0)); 
        procientotinta = ( parseFloat(suma) * ( $("#porcentajeTinta").val() / 100 ) );  
        $("#porTinta").val(number_format(procientotinta,0));
    }  
    else
    {
        $("#resTinta").val("0");
    }         
}

$.Blanco = function()
{
    if ($("#blanco").prop("checked") == true) 
    {
        var valor = (($("#ancho").val() / 100) * ($("#alto").val() / 100) * $("#cantidad").val()) * 150;
        $("#resBlanco").val(number_format(valor,0));
        $.subtotal();

        var suma = parseFloat(valor) +  parseFloat( $("#resTinta").val().replace(/,/gi,'') );            
        procientomano = ( parseFloat(suma) *  parseFloat( $("#porcientoManoObra").val() / 100 ) ) ;
        $("#manoObra").val(number_format(procientomano,0)); 
        procientotinta = ( parseFloat(suma) * ( $("#porcentajeTinta").val() / 100 ) );  
        $("#porTinta").val(number_format(procientotinta,0));
    }
    else
    {
        $("#resBlanco").val("0");
        $.subtotal();
        var suma = 0 +  parseFloat( $("#resTinta").val().replace(/,/gi,'') );            
        procientomano = ( parseFloat(suma) *  parseFloat( $("#porcientoManoObra").val() / 100 ) ) ;
        $("#manoObra").val(number_format(procientomano,0)); 
        procientotinta = ( parseFloat(suma) * ( $("#porcentajeTinta").val() / 100 ) );  
        $("#porTinta").val(number_format(procientotinta,0));        
    }    
}
////---------------------------------- A C A B A D O S-----------------------------------
$.acab1 = function(tblentran,tblorientacion)
{      
        var acabado = 0;
        acab = 1;
        acabado = $("#acab1").val();
        if(acabado == 1)
        {
            $("#resAcab1").val("0");
            $("#label-Acab1").html("Acabado 1:");
            $.subtotal();
        }
        else
        {
            $.calcularAcabados(tblentran,tblorientacion,acab,acabado);
        }    
}

$.acab2 = function(tblentran,tblorientacion)
{    
        var acabado = 0;    
        var acab = 2;
        acabado = $("#acab2").val();
        if(acabado == 1)
        {
            $("#resAcab2").val("0");
            $("#label-Acab2").html("Acabado 2:");
            $.subtotal();
        }
        else
        {
            $.calcularAcabados(tblentran,tblorientacion,acab,acabado);
        }    
}

$.acab3 = function(tblentran,tblorientacion)
{    
        var acabado = 0;    
        var acab = 3;
        acabado = $("#acab3").val();
        if(acabado == 1)
        {
            $("#resAcab3").val("0");
            $("#label-Acab3").html("Acabado 3:");
            $.subtotal();
        }
        else
        {
            $.calcularAcabados(tblentran,tblorientacion,acab,acabado);
        }    
}

$.acab4 = function(tblentran,tblorientacion)
{    
        var acabado = 0;    
        var acab = 4;
        acabado = $("#acab4").val();
        if(acabado == 1)
        {
            $("#resAcab4").val("0");
            $("#label-Acab4").html("Acabado 4:");
            $.subtotal();
        }
        else
        {
             $.calcularAcabados(tblentran,tblorientacion,acab,acabado);
        }    
}

$.acab5 = function(tblentran,tblorientacion)
{    
        var acabado = 0;    
        var acab = 5;
        acabado = $("#acab5").val();
        if(acabado == 1)
        {
            $("#resAcab5").val("0");
            $("#label-Acab5").html("Acabado 5:");
            $.subtotal();
        }
        else
        {
             $.calcularAcabados(tblentran,tblorientacion,acab,acabado);
        }    
}

$.acab6 = function(tblentran,tblorientacion)
{    
        var acab = 6;
        acabado = $("#acab6").val();
        if(acabado == 1)
        {
            $("#resAcab6").val("0");
            $("#label-Acab6").html("Acabado 6:");
            $.subtotal();
        }
        else
        {
            $.calcularAcabados(tblentran,tblorientacion,acab,acabado);
        }    
}

//--------------------------------CALCULOS DE  CANTIDAD Y PRECIO DE ACABADOS-------------
$.calcularAcabados=function  (tblentran,tblorientacion,acab,acabado)
{
    //tblmedida = $("#tblmedidas").find('td').eq(0).html();
    //tblentran = $("#tblmedidas").find('td').eq(3).html();
    //tblAncho = $("#tblmedidas").find('td').eq(1).html();
    //tblAlto = $("#tblmedidas").find('td').eq(2).html();
    //tblaloancho = $("#tblmedidas").find('td').eq(6).html();
    //tblaloalto = $("#tblmedidas").find('td').eq(7).html();
    //tblorientacion = $("#tblmedidas").find('td').eq(4).html();
    //tblaprovecha = $("#tblmedidas").find('td').eq(5).html(); 


    var precio_tramo = 100;
    var varuno;
  idacabado1 = acabado;
 
    MedEspecial = $("#medida_especial").val();
    id_material = $("#material").val();   
//Si esta seleccionado material especial
        if( $("#mat_especial").prop("checked") == true ) 
        {
            $.post('php/acabados.php', {idacabado1:idacabado1},               
            function(result)
            {
                if(result.data.length>0)
                {   
                    var medidaEsp = $("#medida_especial").val();
                    $.post('php/mat_especial.php', {MedEspecial:MedEspecial},               
                    function(result2)
                    {               
                        if(result.data[0].unidad == "M2")
                        {
                        var area = ( ($("#ancho").val() / 100) * ( $("#alto").val() / 100)) * $("#cantidad").val();
                            
                            if (result2.data[0].Corte == 'B')
                            { 
                                res = area * result.data[0].importe;
                                costoBroca = res * 0.2;
                                valor = res + costoBroca;
                                $("#resAcab"+acab).val(number_format(valor,0));
                                $("#label-Acab"+acab).html(result.data[0].descripcion.substr(0,8));
                                $.subtotal();
                            }
                            else if (result2.data[0].Corte == 'N')
                            {
                                valor = area * result.data[0].importe;
                                $("#resAcab"+acab).val(number_format(valor,0));
                                $("#label-Acab"+acab).html(result.data[0].descripcion.substr(0,8));
                                $.subtotal();                               
                            }
                        }
                        //Metro Lineal
                        else if(result.data[0].unidad == "ML")
                        {
                            //DOBLADILLO/JARETA EN CABEZA Y PIE
                            if(idacabado1 == "4")
                            {
                                //El Ancho de la pieza POR 2 POR el costo
                                valor = ( (($("#totancho").val() / 100) * 2) * $("#cantidad").val() ) * result.data[0].importe;
                                $("#resAcab"+acab).val(number_format(valor,0));
                                $("#label-Acab"+acab).html(result.data[0].descripcion.substr(0,8));
                                $.subtotal();                               
                            }
                            //Router
                            else if (idacabado1 == "2")
                            {
                                //rigido
                                if (result2.data[0].M_Tipo == 'R')
                                {
                                    perimetro = ( ( ($("#totancho").val() / 100) + ( $("#totalto").val() / 100)) * 2);
                                                                    //Costo de Acabados
                                    rval1 = perimetro * $("#cantidad").val() * result.data[0].importe;
                                                    //Cantidad Material
                                    rval2 = precio_tramo * $("#resCant").val();
                                    
                                    if(rval1>rval2)
                                    {
                                        //alert("Rigido Mayor Valor1: "+rval1+" valor2: "+rval2+" perimetro: "+perimetro+" cantidad: "+cantidad+" costo: "+costo);
                                        valor = rval1;
                                        $("#resAcab"+acab).val(number_format(valor,0));
                                        $("#label-Acab"+acab).html(result.data[0].descripcion.substr(0,8)); 
                                        $.subtotal();                                   
                                    }
                                    else
                                    {
                                        //alert(" Rigido Valor1: "+rval1+" Mayor valor2: "+rval2+" perimetro: "+perimetro+" cantidad: "+cantidad+" costo: "+costo);
                                        valor = rval2;
                                        $("#resAcab"+acab).val(number_format(valor,0));
                                        $("#label-Acab"+acab).html(result.data[0].descripcion.substr(0,8)); 
                                        $.subtotal();                                   
                                    }
                                }
                                else 
                                {
                                    if (tblorientacion == "A lo alto")
                                    {
                                       varuno = (200 / $("#totancho").val()) * tblentran;
                                    }
                                    else if (tblorientacion == "A lo ancho")
                                    {
                                        varuno = 200 / ($("#totalto").val() * tblentran);                                   
                                    }
                                    
                                    perimetro = ( ( ($("#ancho").val() / 100) + ($("#alto").val() / 100) ) * 2);
                                    acabentran = perimetro * varuno * result.data[0].importe;
                                    //costentran = acabentran * costo;
                                    
                                    if (acabentran < precio_tramo)
                                    {
                                        resentran = precio_tramo;
                                        //alert("Flexible Menor  Perimetro: "+perimetro+" Entran: "+varuno+" Router: "+costo+" Resultado: "+acabentran);
                                    }
                                    else
                                    {
                                        resentran = acabentran;
                                        //alert("Flexible Mayor  Perimetro: "+perimetro+" Entran: "+varuno+" Router: "+costo+" Resultado: "+acabentran);
                                    }
                                    
                                    res = resentran * ($("#resCant").val() / 2);
                                    valor = res;
                                    alert("Flexible: "+tipo+" Ancho: "+totalancho+" Alto: "+totalalto+" Entran Uno: "+varuno+" perimetro: "+perimetro+" Entran: "+acabentran+" Costo de entran: "+costentran+" Validacion: "+resentran+" Valor: "+valor);
                                    $("#resAcab"+acab).val(number_format(valor,0));
                                    $("#label-Acab"+acab).html(result.data[0].descripcion.substr(0,8));
                                    $.subtotal();
                                }   
                            }
                            else
                            {
                                //EL perimetro de la pieza POR el costo
                                perimetro = ((($("#ancho").val() /100) + ($("#alto").val() / 100)) * 2) * $("#cantidad").val();
                                valor = perimetro * result.data[0].importe;
                                $("#resAcab"+acab).val(number_format(valor,0));
                                $("#label-Acab"+acab).html(result.data[0].descripcion.substr(0,8));
                                $.subtotal();
                            }
                        }
                        //Por Pieza
                        else if(result.data[0].unidad == "PZ")
                        {
                            if(idacabado1 == "12")
                            {
                                //El costo de la impresion MAS 15%
                                var valor = $("#resTinta").val().replace(/,/gi,'') * 1.15;
                                $("#resAcab"+acab).val(number_format(valor,0));
                                $("#label-Acab"+acab).html(result.data[0].descripcion.substr(0,8));
                                $.subtotal();                               
                            }
                            else
                            {
                                //El costo es unitario
                                valor = result.data[0].importe * $("#cantidad").val();
                                $("#resAcab"+acab).val(number_format(valor,0));
                                $("#label-Acab"+acab).html(result.data[0].descripcion.substr(0,8));
                                $.subtotal();                               
                            }
                        }
                            /*if(acab == 1)
                            {
                                $("#resAcab1").val(number_format(valor,0));                                
                                $("#label-Acab1").html(result.data[0].descripcion.substr(0,8));
                            }
                            else if(acab == 2)
                            {
                                $("#resAcab2").val(number_format(valor,0));
                                $("#label-Acab2").html(result.data[0].descripcion.substr(0,8));
                            }
                            else if(acab == 3)
                            {
                                $("#resAcab3").val(number_format(valor,0));
                                $("#label-Acab3").html(result.data[0].descripcion.substr(0,8));
                            }
                            else if(acab == 4)
                            {
                                $("#resAcab4").val(number_format(valor,0));
                                $("#label-Acab4").html(result.data[0].descripcion.substr(0,8));
                            }
                            else if(acab == 5)
                            {
                                $("#resAcab5").val(number_format(valor,0));
                                $("#label-Acab5").html(result.data[0].descripcion.substr(0,8));
                            }
                            else if(acab == 6)
                            {
                                $("#resAcab6").val(number_format(valor,0));
                                $("#label-Acab6").html(result.data[0].descripcion.substr(0,8));
                            }
                            $.subtotal();*/                                                                             

                    },'json');
                }
            },'json');
        }

/////////////////////////////////// Sin material especial//////////////////////////
        else
        {          
        $.post('php/acabados.php', {idacabado1:idacabado1},               
        function(result)
        {   
            if(result.data.length>0)
            {                                      
                $.post('php/medidas.php', {id_meterial:id_meterial},               
                function(result2)
                {   
                    //if(result2.data.length>0)
                    //{   
                        if(result.data[0].unidad == "M2")
                        {
                            var area = ( ($("#ancho").val() / 100) * ( $("#alto").val() / 100)) * $("#cantidad").val();
                            
                            if (result2.data[0].Corte == 'B')
                            { 
                                res = area * result.data[0].importe;
                                costoBroca = res * 0.2;
                                valor = res + costoBroca;
                                $("#resAcab"+acab).val(number_format(valor,0));
                                $("#label-Acab"+acab).html(result.data[0].descripcion.substr(0,8));
                                $.subtotal();
                            }
                            else if (result2.data[0].Corte == 'N')
                            {
                                valor = area * result.data[0].importe;
                                $("#resAcab"+acab).val(number_format(valor,0));
                                $("#label-Acab"+acab).html(result.data[0].descripcion.substr(0,8));
                                $.subtotal();                             
                            }
                        }
                        //Metro Lineal
                        else if(result.data[0].unidad == "ML")
                        {
                            //DOBLADILLO/JARETA EN CABEZA Y PIE
                            if(idacabado1 == "4")
                            {
                                //El Ancho de la pieza POR 2 POR el costo
                                valor = ( (($("#totancho").val() / 100) * 2) * $("#cantidad").val() ) * result.data[0].importe;
                                $("#resAcab"+acab).val(number_format(valor,0));
                                $("#label-Acab"+acab).html(result.data[0].descripcion.substr(0,8));
                                $.subtotal();                             
                            }
                            //Router
                            else if (idacabado1 == "2")
                            {
                                //rigido
                                if (result2.data[0].M_Tipo == 'R')
                                {
                                    perimetro = ( ( ($("#totancho").val() / 100) + ( $("#totalto").val() / 100)) * 2);
                                                                    //Costo de Acabados
                                    rval1 = perimetro * $("#cantidad").val() * result.data[0].importe;
                                                    //Cantidad Material
                                    rval2 = precio_tramo * $("#resCant").val();
                                    
                                    if(rval1>rval2)
                                    {
                                        //alert("Rigido Mayor Valor1: "+rval1+" valor2: "+rval2+" perimetro: "+perimetro+" cantidad: "+cantidad+" costo: "+costo);
                                        valor = rval1;
                                        $("#resAcab"+acab).val(number_format(valor,0));
                                        $("#label-Acab"+acab).html(result.data[0].descripcion.substr(0,8));   
                                        $.subtotal();                                 
                                    }
                                    else
                                    {
                                        //alert(" Rigido Valor1: "+rval1+" Mayor valor2: "+rval2+" perimetro: "+perimetro+" cantidad: "+cantidad+" costo: "+costo);
                                        valor = rval2;
                                        $("#resAcab"+acab).val(number_format(valor,0));
                                        $("#label-Acab"+acab).html(result.data[0].descripcion.substr(0,8));   
                                        $.subtotal();                                 
                                    }
                                }
                                else /// MATERIAL FLEXIBLE
                                {                                    
                                    if (tblorientacion == "A lo alto")
                                    {                                           
                                        varuno = (200 / $("#totancho").val()) * tblentran;
                                    }
                                    else if (tblorientacion == "A lo ancho")
                                    {
                                        varuno = 200 / ($("#totalto").val() * tblentran);                                   
                                    }
                                    
                                    perimetro = ( ( ($("#ancho").val() / 100) + ($("#alto").val() / 100) ) * 2);
                                    acabentran = perimetro * varuno * result.data[0].importe;
                                    //costentran = acabentran * costo;
                                    
                                    if (acabentran < precio_tramo)
                                    {
                                        resentran = precio_tramo;
                                        //alert("Flexible Menor  Perimetro: "+perimetro+" Entran: "+varuno+" Router: "+costo+" Resultado: "+acabentran);
                                    }
                                    else
                                    {
                                        resentran = acabentran;
                                        //alert("Flexible Mayor  Perimetro: "+perimetro+" Entran: "+varuno+" Router: "+costo+" Resultado: "+acabentran);
                                    }
                                    
                                    res = resentran * ($("#resCant").val() / 2);
                                    valor = res;
                                    //alert("Flexible: "+tipo+" Ancho: "+totalancho+" Alto: "+totalalto+" Entran Uno: "+varuno+" perimetro: "+perimetro+" Entran: "+acabentran+" Costo de entran: "+costentran+" Validacion: "+resentran+" Valor: "+valor);
                                    $("#resAcab"+acab).val(number_format(valor,0));
                                    $("#label-Acab"+acab).html(result.data[0].descripcion.substr(0,8));
                                    $.subtotal();
                                }   
                            }
                            else
                            {
                                //EL perimetro de la pieza POR el costo
                                perimetro = ((($("#ancho").val() /100) + ($("#alto").val() / 100)) * 2) * $("#cantidad").val();
                                valor = perimetro * result.data[0].importe;
                                $("#resAcab"+acab).val(number_format(valor,0));
                                $("#label-Acab"+acab).html(result.data[0].descripcion.substr(0,8));
                                $.subtotal();
                            }
                        }
                        //Por Pieza
                        else if(result.data[0].unidad == "PZ")
                        {
                            if(idacabado1 == "12")
                            {
                                //El costo de la impresion MAS 15%
                                var valor = $("#resTinta").val().replace(/,/gi,'') * 1.15;
                                $("#resAcab"+acab).val(number_format(valor,0));
                                $("#label-Acab"+acab).html(result.data[0].descripcion.substr(0,8));
                                $.subtotal();                             
                            }
                            else
                            {
                                //El costo es unitario
                                valor = result.data[0].importe * $("#cantidad").val();
                                $("#resAcab"+acab).val(number_format(valor,0));
                                $("#label-Acab"+acab).html(result.data[0].descripcion.substr(0,8));
                                $.subtotal();                             
                            }
                        }
                            /*if(acab == 1)
                            {
                                $("#resAcab1").val(number_format(valor,0));
                                $("#label-Acab1").html(result.data[0].descripcion.substr(0,8));
                            }
                            if(acab == 2)
                            {
                                $("#resAcab2").val(number_format(valor,0));
                                $("#label-Acab2").html(result.data[0].descripcion.substr(0,8));
                            }
                            if(acab == 3)
                            {
                                $("#resAcab3").val(number_format(valor,0));
                                $("#label-Acab3").html(result.data[0].descripcion.substr(0,8));
                            }
                            if(acab == 4)
                            {
                                $("#resAcab4").val(number_format(valor,0));
                                $("#label-Acab4").html(result.data[0].descripcion.substr(0,8));
                            }
                            if(acab == 5)
                            {
                                $("#resAcab5").val(number_format(valor,0));
                                $("#label-Acab5").html(result.data[0].descripcion.substr(0,8));
                            }
                            if(acab == 6)
                            {
                                $("#resAcab6").val(number_format(valor,0));
                                $("#label-Acab6").html(result.data[0].descripcion.substr(0,8));
                            }
                            $.subtotal();                                                                           */
                    //}               
                },'json');              
            }               
        },'json');
    }       
}

$.adicional1 = function()
{
    adicional = 1;
    if( $("#costoadic1").val() == 0 )
    {
        $("#adic1").val("");
        $("#resAdic1").val("0");
        $("#label-Adic1").html("Adicional1:");
        $("#costoadic1").val("0");
        $.subtotal();
    }
    else
    {       
        $.costoAdicional(adicional);
    }  
}

$.adicional2 = function()
{
    adicional = 2;
    if( $("#costoadic2").val() == 0 )
    {
        $("#adic2").val("");
        $("#resAdic2").val("0");
        $("#label-Adic2").html("Adicional2:");
        $("#costoadic2").val("0");
        $.subtotal();
    }
    else
    {       
        $.costoAdicional(adicional);
    }  
}

$.adicional3 = function()
{
    adicional = 3;
    if( $("#costoadic3").val() == 0 )
    {
        $("#adic3").val("");
        $("#resAdic3").val("0");
        $("#label-Adic3").html("Adicional3:");
        $("#costoadic3").val("0");
        $.subtotal();
    }
    else
    {       
        $.costoAdicional(adicional);
    }  
}

$.adicional4 = function()
{
    adicional = 4;
    if( $("#costoadic4").val() == 0 )
    {
        $("#adic4").val("");
        $("#resAdic4").val("0");
        $("#label-Adic4").html("Adicional4:");
        $("#costoadic4").val("0");
        $.subtotal();
    }
    else
    {       
        $.costoAdicional(adicional);
    }  
}

$.adicional5 = function()
{
    adicional = 5;
    if( $("#costoadic5").val() == 0 )
    {
        $("#adic5").val("");
        $("#resAdic5").val("0");
        $("#label-Adic5").html("Adicional5:");
        $("#costoadic5").val("0");
        $.subtotal();
    }
    else
    {       
        $.costoAdicional(adicional);
    }  
}

$.adicional6 = function()
{
    adicional = 6;
    if( $("#costoadic6").val() == 0 )
    {
        $("#adic6").val("");
        $("#resAdic6").val("0");
        $("#label-Adic6").html("Adicional6:");
        $("#costoadic6").val("0");
        $.subtotal();
    }
    else
    {       
        $.costoAdicional(adicional);
    }  
}

$.costoAdicional = function(adicional)
{    
    if(adicional == 1)
    {
        var total = (parseFloat($("#costoadic1").val()) * $("#cantidad").val());
        $("#resAdic1").val(number_format(total,0));
        $("#label-Adic1").html($("#adic1").val());       
    } 
    if(adicional == 2)
    {
        var total = (parseFloat($("#costoadic2").val()) * $("#cantidad").val());
        $("#resAdic2").val(number_format(total,0));
        $("#label-Adic2").html($("#adic2").val());       
    }   
    if(adicional == 3)
    {
        var total = (parseFloat($("#costoadic3").val()) * $("#cantidad").val());
        $("#resAdic3").val(number_format(total,0));
        $("#label-Adic3").html($("#adic3").val());       
    }     
    if(adicional == 4)
    {
        var total = (parseFloat($("#costoadic4").val()) * $("#cantidad").val());
        $("#resAdic4").val(number_format(total,0));
        $("#label-Adic4").html($("#adic4").val());       
    }     
    if(adicional == 5)
    {
        var total = (parseFloat($("#costoadic5").val()) * $("#cantidad").val());
        $("#resAdic5").val(number_format(total,0));
        $("#label-Adic5").html($("#adic5").val());       
    }  
    if(adicional == 6)
    {
        var total = (parseFloat($("#costoadic6").val()) * $("#cantidad").val());
        $("#resAdic6").val(number_format(total,0));
        $("#label-Adic6").html($("#adic6").val());       
    }            
        $.subtotal();     
}
//////---------------------------  S U B T O T A L------------------------------
    $.subtotal = function() 
   {

        if (solvente=="1")
         {
            $("#720").prop("checked",false);
            $("#1440").prop("checked",false);
            $("#0").prop("checked",false);
            $("#Sandwich").prop("checked",false);
            $("#resMargen").val("0");
            $("#resTinta").val("0");
            $("#porTinta").val("0");
            $("#manoObra").val("0");
            $("#resAcab1").val("0");
            $("#resAcab2").val("0");
            $("#resAcab3").val("0");
            $("#resAcab4").val("0");
            $("#resAcab5").val("0");
            $("#resAcab6").val("0");

        var resPrecio = parseFloat($("#resPrecio").val().replace(/,/gi,''));   
        var resAdic1 = parseFloat($("#resAdic1").val().replace(/,/gi,''));
        var resAdic2 = parseFloat($("#resAdic2").val().replace(/,/gi,''));
        var resAdic3 = parseFloat($("#resAdic3").val().replace(/,/gi,''));
        var resAdic4 = parseFloat($("#resAdic4").val().replace(/,/gi,''));
        var resAdic5 = parseFloat($("#resAdic5").val().replace(/,/gi,''));
        var resAdic6 = parseFloat($("#resAdic6").val().replace(/,/gi,''));
         var value = parseFloat(resPrecio)+parseFloat(resAdic1)+parseFloat(resAdic2)+parseFloat(resAdic3)+parseFloat(resAdic4)+parseFloat(resAdic5)+parseFloat(resAdic6); //+parseFloat(resBarniz)+parseFloat(resLamina)
        $("#resSubtotal").val(number_format(value,0));
        
        $("#resTotal").val(number_format(value,0));
        $.comision();
       // $.total();

            }

            else
            {
             
     
         var resPrecio = parseFloat($("#resPrecio").val().replace(/,/gi,''));
    
        var resTinta = parseFloat($("#resTinta").val().replace(/,/gi,''));
        //var resBarniz = parseFloat($("#resB").val().replace(/,/gi,''));
        var resBlanco = parseFloat($("#resBlanco").val().replace(/,/gi,''));
        var resAcab1 = parseFloat($("#resAcab1").val().replace(/,/gi,''));
        var resAcab2 = parseFloat($("#resAcab2").val().replace(/,/gi,''));
        var resAcab3 = parseFloat($("#resAcab3").val().replace(/,/gi,''));
        var resAcab4 = parseFloat($("#resAcab4").val().replace(/,/gi,''));
        var resAcab5 = parseFloat($("#resAcab5").val().replace(/,/gi,''));
        var resAcab6 = parseFloat($("#resAcab6").val().replace(/,/gi,''));
        //var resLamina = parseFloat($("#resLamina").val().replace(/,/gi,''));
        var resAdic1 = parseFloat($("#resAdic1").val().replace(/,/gi,''));
        var resAdic2 = parseFloat($("#resAdic2").val().replace(/,/gi,''));
        var resAdic3 = parseFloat($("#resAdic3").val().replace(/,/gi,''));
        var resAdic4 = parseFloat($("#resAdic4").val().replace(/,/gi,''));
        var resAdic5 = parseFloat($("#resAdic5").val().replace(/,/gi,''));
        var resAdic6 = parseFloat($("#resAdic6").val().replace(/,/gi,''));
         var value = parseFloat(resPrecio)+parseFloat(resTinta)+parseFloat(resAcab1)+parseFloat(resAcab2)+parseFloat(resAcab3)+parseFloat(resAcab4)+parseFloat(resAcab5)+parseFloat(resAcab6)+parseFloat(resBlanco)+parseFloat(resAdic1)+parseFloat(resAdic2)+parseFloat(resAdic3)+parseFloat(resAdic4)+parseFloat(resAdic5)+parseFloat(resAdic6); //+parseFloat(resBarniz)+parseFloat(resLamina)
        $("#resSubtotal").val(number_format(value,0));
        $.margen();
        $.comision();
        $.total();
            }
      
    }

    $.margen = function()
    {
        var resSubtotal = parseFloat($("#resSubtotal").val().replace(/,/gi,''));
        var margen = parseFloat($("#porcientoMargen").val());

        var valor = (margen/100) * resSubtotal;
        $("#resMargen").val(number_format(valor,0));
    } 

    $.comision = function()
    {
        if (solvente=="0")
         {

        var resSubtotal = parseFloat($("#resSubtotal").val().replace(/,/gi,''));
        var resMargen = parseFloat($("#resMargen").val().replace(/,/gi,''));
        var comision = parseFloat($("#porcientoComision").val());
        
        var sum = (resSubtotal + resMargen);
        var com = (comision/100);
        
        var valor = (sum / (1 - com)) - sum;
        
        $("#resComision").val(number_format(valor,0));
        }
        else
        {
           // $("#porcientoComision").val(5);
             var resSubtotal = parseFloat($("#resSubtotal").val().replace(/,/gi,''));
             var comision = parseFloat($("#porcientoComision").val());
             var com = (comision/100);
            var valor = resSubtotal*com;
             $("#resComision").val(number_format(valor,0));
             //alert(valor);

        }

    }

    $.total = function()
    {

        if (solvente=="0")
         {
        var resSubtotal = parseFloat($("#resSubtotal").val().replace(/,/gi,''));        
        var resMargen = parseFloat($("#resMargen").val().replace(/,/gi,''));
        var resComision = parseFloat($("#resComision").val().replace(/,/gi,''));
        var cantidad = parseInt($("#cantidad").val());

        var valor = (resSubtotal + resMargen + resComision);
        var valor2 = valor / cantidad;
        $("#resTotal").val(number_format(valor,0));
        $("#resPreUnit").val(number_format(valor2,2));
        }
        else
        {
            var resSubtotal = parseFloat($("#resSubtotal").val().replace(/,/gi,''));  
            $("#resTotal").val(resSubtotal);
        }

    } 

    $.totancho = function()
    {
        parseFloat($("#totancho").val(parseFloat($("#ancho").val())+parseFloat($("#medancho").val())));        
    }  

    $.totalto = function()
    {
       parseFloat($("#totalto").val(parseFloat($("#alto").val()) + parseFloat($("#medalto").val()))); 
    }

    $.abrir = function()
    {
        //id_meterial=0, tblentran=0,tblAncho=0,tblAlto=0,tblaloancho=0,tblaloalto=0,tblorientacion=0,tblmedida=0,tblaprovecha=0,proveedor=0,MedEspecial=0,acab=0;        
        var folio2 = $("#folio2").val();
            $.post("php/abrir.php",{folio2:folio2},
            function(result)
            {
                if(result.data[0].MAT_ESPECIAL == "on")
                {
                    $("#mat_especial").prop("checked",true);
                    //$("#dialog_mat_especial").modal('open');
                    $("#div_medida_especial").show();
                    $("#div_material").hide();
                    $("#foliob").val(result.data[0].FOLIO);
                    $("#nometrics").val(result.data[0].OR_MATRIX);
                    $("#cliente").val(result.data[0].CLIENTE);
                    $("#trabajo").val(result.data[0].TRABAJO);
                    $("#cantidad").val(result.data[0].CANTIDAD);
                    $("#ancho").val(result.data[0].ANCHO);
                    $("#alto").val(result.data[0].ALTO);
                    $("#medancho").val(result.data[0].MEDIANIL_ANCHO);
                    $("#medalto").val(result.data[0].MEDIANIL_ALTO);
                    $.totancho();
                    $.totalto();                    
                    //$("select[id=medida_especial]").val(result.data[0].ID_MATERIAL).siblings().addClass("active");
                    $("select[id=medida_especial]").html('<option selected value='+result.data[0].ID_MAT_ESPECIAL+'>'+result.data[0].ID_MAT_ESPECIAL+'</option>');
                    $("#medidas"+result.data[0].MEDIDA).html("<td>" + result.data[0].MEDIDA + "</td>" + "<td>" + result.data[0].MATANCHO + "</td>" + "<td>" + result.data[0].MATALTO + "</td>" + "<td>" + result.data[0].MATENTRAN + "</td>" + "<td>" + result.data[0].ORIENTA + "</td>" + "<td>" + result.data[0].APROVECHAMIENTO + "</td>" + "<td>" + result.data[0].MATALOANCHO + "</td>" + "<td>" + result.data[0].MATALOALTO + "</td>")

                    id_meterial = result.data[0].ID_MATERIAL;
                    tblmedida = result.data[0].MEDIDA;
                    tblAncho = result.data[0].MATANCHO;
                    tblAlto = result.data[0].MATALTO;
                    tblentran = result.data[0].MATENTRAN;
                    tblorientacion = result.data[0].ORIENTA;
                    tblaprovecha = result.data[0].APROVECHAMIENTO;
                    tblaloancho = result.data[0].MATALOANCHO;
                    tblaloalto = result.data[0].MATALOALTO;
                    $.tiempoproduccion();
                        
                    $("#resCant").val(result.data[0].CANT_MAT);
                    $.subtotal();
                    $("#titCantMat").html(result.data[0].TIPO_CANT_MAT);
                    $.subtotal();
                    $("#resPrecio").val(number_format(result.data[0].PRECIO_MAT,0));
                    $.subtotal();
                    $("#resTotal2").val(number_format(result.data[0].TOTAL,0));

                    //EXTRAER RESOLUCION
                    if(result.data[0].RESOLUCION == 720)
                    {
                        $("#720").prop("checked",true);
                        $.resolucion720();
                    }
                    else if(result.data[0].RESOLUCION == 1440)
                    {
                        $("#1440").prop("checked",true);
                        $.resolucion720();                          
                    }
                    else if(result.data[0].RESOLUCION == 0)
                    {
                        $("#0").prop("checked",true);
                        $("#resTinta").val("0");
                        $("#porTinta").val("0");
                        $("#manoObra").val("0");
                        $.subtotal();                                               
                    }
                    else if(result.data[0].RESOLUCION == "Sandwich")
                    {
                        $("#Sandwich").prop("checked",true);
                        $.Sandwich();
                    }else{
                        $("#resTinta").val("0");
                        $.subtotal();                       
                    }

                    //EXTRAER BLANCO
                    if(result.data[0].BLANCO != 0)
                    {
                        $("#blanco").prop("checked",true);
                        $.Blanco();                         
                    } 
                    else 
                    {
                        $("#resBlanco").val("0");
                        $.subtotal();
                    }

                    //EXTRAER ACABADOS
                    if(result.data[0].ID_ACABADO1 > 0)
                    {
                        $("select[id=acab1]").val(result.data[0].ID_ACABADO1).siblings().addClass("active");
                        //$.acab1(tblentran,tblorientacion);
                        $("#label-Acab1").html(result.data[0].DESC_ACAB1);
                        $("#resAcab1").val(number_format(result.data[0].PRECIO_ACABADO1,0));
                    $.subtotal();
                    }
                    else
                    {
                        $("select[id=acab1]").val("1");
                        $.acab1(tblentran,tblorientacion);                          

                    }
                    if(result.data[0].ID_ACABADO2 > 0)
                    {
                        $("select[id=acab2]").val(result.data[0].ID_ACABADO2).siblings().addClass("active");
                        //$.acab2(tblentran,tblorientacion);
                        $("#label-Acab2").html(result.data[0].DESC_ACAB2);
                        $("#resAcab2").val(number_format(result.data[0].PRECIO_ACABADO2,0));
                        $.subtotal();                                               
                    }
                    else
                    {
                        $("select[id=acab2]").val("1");
                        $.acab2(tblentran,tblorientacion);                          

                    }                   
                    if(result.data[0].ID_ACABADO3 > 0)
                    {
                        $("select[id=acab3]").val(result.data[0].ID_ACABADO3).siblings().addClass("active");
                        //$.acab3(tblentran,tblorientacion);
                        $("#label-Acab3").html(result.data[0].DESC_ACAB3);
                        $("#resAcab3").val(number_format(result.data[0].PRECIO_ACABADO3,0));
                        $.subtotal();                                               
                    } 
                    else
                    {
                        $("select[id=acab3]").val("1");
                        $.acab3(tblentran,tblorientacion);                          

                    }                      
                    if(result.data[0].ID_ACABADO4 > 0)
                    {
                        $("select[id=acab4]").val(result.data[0].ID_ACABADO4).siblings().addClass("active");
                        //$.acab4(tblentran,tblorientacion);
                        $("#label-Acab4").html(result.data[0].DESC_ACAB4);
                        $("#resAcab4").val(number_format(result.data[0].PRECIO_ACABADO4,0));
                        $.subtotal();                                               
                    }
                    else
                    {
                        $("select[id=acab4]").val("1");
                        $.acab4(tblentran,tblorientacion);                          

                    }                    
                    if(result.data[0].ID_ACABADO5 > 0)
                    {
                        $("select[id=acab5]").val(result.data[0].ID_ACABADO5).siblings().addClass("active");
                        //$.acab5(tblentran,tblorientacion);
                        $("#label-Acab5").html(result.data[0].DESC_ACAB5);
                        $("#resAcab5").val(number_format(result.data[0].PRECIO_ACABADO5,0));
                        $.subtotal();                                               
                    } 
                    else
                    {
                        $("select[id=acab5]").val("1");
                        $.acab5(tblentran,tblorientacion);                          

                    }                   
                    if(result.data[0].ID_ACABADO6 > 0)
                    {
                        $("select[id=acab6]").val(result.data[0].ID_ACABADO6).siblings().addClass("active");
                        //$.acab6(tblentran,tblorientacion);
                        $("#label-Acab6").html(result.data[0].DESC_ACAB6);
                        $("#resAcab6").val(number_format(result.data[0].PRECIO_ACABADO6,0));
                        $.subtotal();                                               
                    }
                    else
                    {
                        $("select[id=acab6]").val("1");
                        $.acab6(tblentran,tblorientacion);                          

                    } 

                    //EXTRAER ADICIONALES
                    if(result.data[0].A1_DESC !="")
                    {
                        $("#adic1").val(result.data[0].A1_DESC).siblings().addClass("active");
                        $("#costoadic1").val(result.data[0].A1_PRECIO).siblings().addClass("active");
                        $.adicional1();
                    }
                    else
                    {
                        $("#adic1").val("").siblings().addClass("active");
                        $("#costoadic1").val("0").siblings().addClass("active"); 
                        $.subtotal();                       
                    }  
                    if(result.data[0].A2_DESC !="")
                    {
                        $("#adic2").val(result.data[0].A2_DESC).siblings().addClass("active");
                        $("#costoadic2").val(result.data[0].A2_PRECIO).siblings().addClass("active");
                        $.adicional2();
                    }
                    else
                    {
                        $("#adic2").val("").siblings().addClass("active");
                        $("#costoadic2").val("0").siblings().addClass("active"); 
                        $.subtotal();                       
                    } 
                    if(result.data[0].A3_DESC !="")
                    {
                        $("#adic3").val(result.data[0].A3_DESC).siblings().addClass("active");
                        $("#costoadic3").val(result.data[0].A3_PRECIO).siblings().addClass("active");
                        $.adicional3();
                    }
                    else
                    {
                        $("#adic3").val("").siblings().addClass("active");
                        $("#costoadic3").val("0").siblings().addClass("active"); 
                        $.subtotal();                       
                    }
                    if(result.data[0].A4_DESC !="")
                    {
                        $("#adic4").val(result.data[0].A4_DESC).siblings().addClass("active");
                        $("#costoadic4").val(result.data[0].A4_PRECIO).siblings().addClass("active");
                        $.adicional4();
                    }
                    else
                    {
                        $("#adic4").val("").siblings().addClass("active");
                        $("#costoadic4").val("0").siblings().addClass("active"); 
                        $.subtotal();                       
                    }   
                    if(result.data[0].A5_DESC !="")
                    {
                        $("#adic5").val(result.data[0].A5_DESC).siblings().addClass("active");
                        $("#costoadic5").val(result.data[0].A5_PRECIO).siblings().addClass("active");
                        $.adicional5();
                    }
                    else
                    {
                        $("#adic5").val("").siblings().addClass("active");
                        $("#costoadic5").val("0").siblings().addClass("active"); 
                        $.subtotal();                       
                    }   
                    if(result.data[0].A6_DESC !="")
                    {
                        $("#adic6").val(result.data[0].A6_DESC).siblings().addClass("active");
                        $("#costoadic6").val(result.data[0].A6_PRECIO).siblings().addClass("active");
                        $.adicional6();
                    }
                    else
                    {
                        $("#adic6").val("").siblings().addClass("active");
                        $("#costoadic6").val("0").siblings().addClass("active"); 
                        $.subtotal();                       
                    }   

                    //EXTRAER OBSERVACIONES
                    if(result.data[0].OBSERVACIONES !="")
                    {
                        $("#observaciones").val(result.data[0].OBSERVACIONES).siblings().addClass("active");
                        $("#costoadic6").val(result.data[0].A6_PRECIO).siblings().addClass("active");
                    }                             

                }
                else
                {
                if(result.data.length>0){    
                    $("#ordprod").val(result.data[0].ID_PRODUCCION);            
                    $("#foliob").val(result.data[0].FOLIO);
                    $("#nometrics").val(result.data[0].OR_MATRIX);
                    $("#cliente").val(result.data[0].CLIENTE);
                    $("#trabajo").val(result.data[0].TRABAJO);
                    $("#cantidad").val(result.data[0].CANTIDAD);
                    $("#ancho").val(result.data[0].ANCHO);
                    $("#alto").val(result.data[0].ALTO);
                    $("#medancho").val(result.data[0].MEDIANIL_ANCHO);
                    $("#medalto").val(result.data[0].MEDIANIL_ALTO);
                    $.totancho();
                    $.totalto();
                    $("select[id=material]").val(result.data[0].ID_MATERIAL).siblings().addClass("active");
                    $.medidasTabla();
                    id_meterial = result.data[0].ID_MATERIAL;
                    tblmedida = result.data[0].MEDIDA;
                    tblAncho = result.data[0].MATANCHO;
                    tblAlto = result.data[0].MATALTO;
                    tblentran = result.data[0].MATENTRAN;
                    tblorientacion = result.data[0].ORIENTA;
                    tblaprovecha = result.data[0].APROVECHAMIENTO;
                    tblaloancho = result.data[0].MATALOANCHO;
                    tblaloalto = result.data[0].MATALOALTO;
                    $.tiempoproduccion();
                    //tblaloalto="";
                    //tblaloancho="";                   
                    //$("#medidas"+result.data[0].MEDIDA).html("<td>" + result.data[0].MEDIDA + "</td>" + "<td>" + result.data[0].MATANCHO + "</td>" + "<td>" + result.data[0].MATALTO + "</td>" + "<td>" + result.data[0].MATENTRAN + "</td>" + "<td>" + result.data[0].ORIENTA + "</td>" + "<td>" + result.data[0].APROVECHAMIENTO + "</td>" + "<td>" + result.data[0].MATALOANCHO + "</td>" + "<td>" + result.data[0].MATALOALTO + "</td>")
                    //$.calculosmaterial(tblentran, tblAncho, tblAlto, tblaloancho, tblaloalto);

                    $("#resCant").val(result.data[0].CANT_MAT);
                    $.subtotal();
                    $("#titCantMat").html(result.data[0].TIPO_CANT_MAT);
                    $.subtotal();
                    $("#resPrecio").val(number_format(result.data[0].PRECIO_MAT,0));
                    $.subtotal();
                    $("#resTotal2").val(number_format(result.data[0].TOTAL,0));                    

                    //EXTRAER RESOLUCION
                    if(result.data[0].RESOLUCION == 720)
                    {
                        $("#720").prop("checked",true);
                        $.resolucion720();
                    }
                    else if(result.data[0].RESOLUCION == 1440)
                    {
                        $("#1440").prop("checked",true);
                        $.resolucion720();                          
                    }
                    else if(result.data[0].RESOLUCION == 0)
                    {
                        $("#0").prop("checked",true);
                        $("#resTinta").val("0");
                        $("#porTinta").val("0");
                        $("#manoObra").val("0");
                        $.subtotal();                                               
                    }
                    else if(result.data[0].RESOLUCION == "Sandwich")
                    {
                        $("#Sandwich").prop("checked",true);
                        $.Sandwich();
                    }else{
                        $("#resTinta").val("0");
                        $.subtotal();                       
                    }

                    //EXTRAER BLANCO
                    if(result.data[0].BLANCO != 0)
                    {
                        $("#blanco").prop("checked",true);
                        $.Blanco();                         
                    } 
                    else 
                    {
                        $("#resBlanco").val("0");
                        $.subtotal();
                    }

                    //EXTRAER ACABADOS
                    if(result.data[0].ID_ACABADO1 > 0)
                    {
                        $("select[id=acab1]").val(result.data[0].ID_ACABADO1).siblings().addClass("active");
                        //$.acab1(tblentran,tblorientacion);
                        $("#label-Acab1").html(result.data[0].DESC_ACAB1);
                        $("#resAcab1").val(number_format(result.data[0].PRECIO_ACABADO1,0));
                        $.subtotal();
                    }
                    else
                    {
                        $("select[id=acab1]").val("1");
                        $.acab1(tblentran,tblorientacion);                          

                    }
                    if(result.data[0].ID_ACABADO2 > 0)
                    {
                        $("select[id=acab2]").val(result.data[0].ID_ACABADO2).siblings().addClass("active");
                        //$.acab2(tblentran,tblorientacion);
                        $("#label-Acab2").html(result.data[0].DESC_ACAB2);
                        $("#resAcab2").val(number_format(result.data[0].PRECIO_ACABADO2,0));
                        $.subtotal();                                               
                    }
                    else
                    {
                        $("select[id=acab2]").val("1");
                        $.acab2(tblentran,tblorientacion);                          

                    }                   
                    if(result.data[0].ID_ACABADO3 > 0)
                    {
                        $("select[id=acab3]").val(result.data[0].ID_ACABADO3).siblings().addClass("active");
                        //$.acab3(tblentran,tblorientacion);
                        $("#label-Acab3").html(result.data[0].DESC_ACAB3);
                        $("#resAcab3").val(number_format(result.data[0].PRECIO_ACABADO3,0));
                        $.subtotal();                                               
                    } 
                    else
                    {
                        $("select[id=acab3]").val("1");
                        $.acab3(tblentran,tblorientacion);                          

                    }                      
                    if(result.data[0].ID_ACABADO4 > 0)
                    {
                        $("select[id=acab4]").val(result.data[0].ID_ACABADO4).siblings().addClass("active");
                        //$.acab4(tblentran,tblorientacion);
                        $("#label-Acab4").html(result.data[0].DESC_ACAB4);
                        $("#resAcab4").val(number_format(result.data[0].PRECIO_ACABADO4,0));
                        $.subtotal();                                               
                    }
                    else
                    {
                        $("select[id=acab4]").val("1");
                        $.acab4(tblentran,tblorientacion);                          

                    }                    
                    if(result.data[0].ID_ACABADO5 > 0)
                    {
                        $("select[id=acab5]").val(result.data[0].ID_ACABADO5).siblings().addClass("active");
                        //$.acab5(tblentran,tblorientacion);
                        $("#label-Acab5").html(result.data[0].DESC_ACAB5);
                        $("#resAcab5").val(number_format(result.data[0].PRECIO_ACABADO5,0));
                        $.subtotal();                                               
                    } 
                    else
                    {
                        $("select[id=acab5]").val("1");
                        $.acab5(tblentran,tblorientacion);                          

                    }                   
                    if(result.data[0].ID_ACABADO6 > 0)
                    {
                        $("select[id=acab6]").val(result.data[0].ID_ACABADO6).siblings().addClass("active");
                        //$.acab6(tblentran,tblorientacion);
                        $("#label-Acab6").html(result.data[0].DESC_ACAB6);
                        $("#resAcab6").val(number_format(result.data[0].PRECIO_ACABADO6,0));
                        $.subtotal();                                               
                    }
                    else
                    {
                        $("select[id=acab6]").val("1");
                        $.acab6(tblentran,tblorientacion);                          

                    } 

                    //EXTRAER ADICIONALES
                    if(result.data[0].A1_DESC !="")
                    {
                        $("#adic1").val(result.data[0].A1_DESC).siblings().addClass("active");
                        $("#costoadic1").val(result.data[0].A1_PRECIO).siblings().addClass("active");
                        $.adicional1();
                    }
                    else
                    {
                        $("#adic1").val("").siblings().addClass("active");
                        $("#costoadic1").val("0").siblings().addClass("active"); 
                        $.subtotal();                       
                    }  
                    if(result.data[0].A2_DESC !="")
                    {
                        $("#adic2").val(result.data[0].A2_DESC).siblings().addClass("active");
                        $("#costoadic2").val(result.data[0].A2_PRECIO).siblings().addClass("active");
                        $.adicional2();
                    }
                    else
                    {
                        $("#adic2").val("").siblings().addClass("active");
                        $("#costoadic2").val("0").siblings().addClass("active"); 
                        $.subtotal();                       
                    } 
                    if(result.data[0].A3_DESC !="")
                    {
                        $("#adic3").val(result.data[0].A3_DESC).siblings().addClass("active");
                        $("#costoadic3").val(result.data[0].A3_PRECIO).siblings().addClass("active");
                        $.adicional3();
                    }
                    else
                    {
                        $("#adic3").val("").siblings().addClass("active");
                        $("#costoadic3").val("0").siblings().addClass("active"); 
                        $.subtotal();                       
                    }
                    if(result.data[0].A4_DESC !="")
                    {
                        $("#adic4").val(result.data[0].A4_DESC).siblings().addClass("active");
                        $("#costoadic4").val(result.data[0].A4_PRECIO).siblings().addClass("active");
                        $.adicional4();
                    }
                    else
                    {
                        $("#adic4").val("").siblings().addClass("active");
                        $("#costoadic4").val("0").siblings().addClass("active"); 
                        $.subtotal();                       
                    }   
                    if(result.data[0].A5_DESC !="")
                    {
                        $("#adic5").val(result.data[0].A5_DESC).siblings().addClass("active");
                        $("#costoadic5").val(result.data[0].A5_PRECIO).siblings().addClass("active");
                        $.adicional5();
                    }
                    else
                    {
                        $("#adic5").val("").siblings().addClass("active");
                        $("#costoadic5").val("0").siblings().addClass("active"); 
                        $.subtotal();                       
                    }   
                    if(result.data[0].A6_DESC !="")
                    {
                        $("#adic6").val(result.data[0].A6_DESC).siblings().addClass("active");
                        $("#costoadic6").val(result.data[0].A6_PRECIO).siblings().addClass("active");
                        $.adicional6();
                    }
                    else
                    {
                        $("#adic6").val("").siblings().addClass("active");
                        $("#costoadic6").val("0").siblings().addClass("active"); 
                        $.subtotal();                       
                    }   

                    //EXTRAER OBSERVACIONES
                    if(result.data[0].OBSERVACIONES !="")
                    {
                        $("#observaciones").val(result.data[0].OBSERVACIONES).siblings().addClass("active");
                        $("#costoadic6").val(result.data[0].A6_PRECIO).siblings().addClass("active");
                    }                                                                                                                                                                                                                                                                               

                }
            }
            },"json"
        );        
    }

$.actualizar = function()
{
    var cadena = $("#form1").serialize()+'&tblmedida='+tblmedida + '&tblancho='+tblAncho + '&tblalto='+tblAlto + '&tblorientacion='+tblorientacion +'&tblentran='+tblentran +'&tblaprovecha='+tblaprovecha + '&tblaloalto='+ tblaloalto +'&tblaloancho=' +tblaloancho + '&proveedor='+proveedor +'&label-Acab1='+ $("#label-Acab1").html() +
    '&label-Acab2='+ $("#label-Acab2").html() +'&label-Acab3='+ $("#label-Acab3").html() +'&label-Acab4='+ $("#label-Acab4").html() +'&label-Acab5='+ $("#label-Acab5").html() +'&label-Acab6='+ $("#label-Acab6").html() +'&titCantMat='+ $("#titCantMat").html();
    console.log(cadena);
    $.post("php/actualizar.php",cadena,
        function(result)
        {           
                $("#asignofolio").html("Se actualizo la cotizacion con folio: <span style='color:red; font-size: 27px;'>"+ $("#foliob").val() +"</span>");
                $("#dialogo_datosguardados").modal('open');
                //$("#foliob").val(result.data[0].folio);
        },"json"
    );        
}

/*$.tiempoproduccion = function()
{
    if( $("#mat_especial").prop("checked") == true )
    {
    }
    else
    {
        id_meterial = $("#material").val();
        $.post('php/medidas.php', {id_meterial:id_meterial},                
        function(result)
        {   
            if(result.data.length>0)
            { 
                if(result.data[0].Tipo == "MATERIAL FLEXIBLE")
                {
                    var tipomaterial = "Hoja";
                    var cantidadmetros = $("#resCant").val();
                    var largohoja = $("#totalto").val() / 100;
                    var mpcdh = 0.5; //minutos por cambio de hoja

                    if ( $("#blanco").prop("checked") == true && $("#0").prop("checked") == true) //Blanco solo
                    {
                        var velocidad = 6.5; //velocidad ml/hr
                        var tpn = ( (cantidadmetros * mpcdh) / 60 ) + ( (cantidadmetros * largohoja) / velocidad) ; //tiempo de produccion nominal
                        var tpre = tpn * 1.2; // Tiempo de produccion real estimado
                        $("#tiempoproduccion").val(number_format(tpre));

                    }
                    else if( $("#blanco").prop("checked") == false && $("#0").prop("checked") == true ) //Normal
                    {
                        var velocidad = 17;
                        var tpn = ( (cantidadmetros * mpcdh) / 60 ) + ( (cantidadmetros * largohoja) / velocidad) ;
                        var tpre = tpn * 1.2; 
                        $("#tiempoproduccion").val(number_format(tpre));                        
                    } 
                    else if( $("#blanco").prop("checked") == true && $("#720").prop("checked") == true ) //Blanco + color
                    {
                        var velocidad = 6.5;
                        var tpn = ( (cantidadmetros * mpcdh) / 60 ) + ( (cantidadmetros * largohoja) / velocidad) ; 
                        var tpre = tpn * 1.2; 
                        $("#tiempoproduccion").val(number_format(tpre));                        
                    }
                    else if( $("#blanco").prop("checked") == true && $("#1440").prop("checked") == true ) //Blanco + color
                    {
                        var velocidad = 6.5; 
                        var tpn = ( (cantidadmetros * mpcdh) / 60 ) + ( (cantidadmetros * largohoja) / velocidad) ; 
                        var tpre = tpn * 1.2; 
                        $("#tiempoproduccion").val(number_format(tpre));                        
                    } 
                    else //Normal
                    {
                        //var velocidad = 17; 
                        //var tpn = ( (cantidadmetros * mpcdh) / 60 ) + ( (cantidadmetros * largohoja) / velocidad) ; 
                        //var tpre = tpn * 1.2; 
                        $("#tiempoproduccion").val("0");                        
                    }
                }
                else if (result.data[0].Tipo == "MATERIAL RIGIDO" || result.data[0].Tipo == "MATERIAL FOTOGRAFICO")
                {
                    var tipomaterial = "Rollo";
                    var cantidadmetros = $("#resCant").val();                    

                    if ( $("#blanco").prop("checked") == true && $("#0").prop("checked") == true) //Blanco solo
                    {
                        var velocidad = 6.5; //velocidad ml/hr
                        var tpn = (cantidadmetros / velocidad); //tiempo de produccion nominal
                        var tpre = tpn * 1.2; // Tiempo de produccion real estimado
                        $("#tiempoproduccion").val(number_format(tpre));

                    }   
                    else if ( $("#blanco").prop("checked") == false && $("#0").prop("checked") == true) //Normal
                    {
                        var velocidad = 17; //velocidad ml/hr
                        var tpn = (cantidadmetros / velocidad); //tiempo de produccion nominal
                        var tpre = tpn * 1.2; // Tiempo de produccion real estimado
                        $("#tiempoproduccion").val(number_format(tpre));

                    }  
                    else if( $("#blanco").prop("checked") == true && $("#720").prop("checked") == true ) //Blanco + color
                    {
                        var velocidad = 6.5;
                        var tpn = (cantidadmetros / velocidad); //tiempo de produccion nominal 
                        var tpre = tpn * 1.2; 
                        $("#tiempoproduccion").val(number_format(tpre));                        
                    }
                    else if( $("#blanco").prop("checked") == true && $("#1440").prop("checked") == true ) //Blanco + color
                    {
                        var velocidad = 6.5; 
                        var tpn = (cantidadmetros / velocidad); //tiempo de produccion nominal 
                        var tpre = tpn * 1.2; 
                        $("#tiempoproduccion").val(number_format(tpre));                        
                    }
                    else //Normal
                    {
                        //var velocidad = 17; 
                        //var tpn = ( (cantidadmetros * mpcdh) / 60 ) + ( (cantidadmetros * largohoja) / velocidad) ; 
                        //var tpre = tpn * 1.2; 
                        $("#tiempoproduccion").val("0");                        
                    }                                                                             
                }
            }
        },'json');        
    }    
}*/

$.tiempoproduccion = function(tblAlto)
{
    if( $("#mat_especial").prop("checked") == true )
    {
    }
    else
    {
        id_meterial = $("#material").val();
        $.post('php/medidas.php', {id_meterial:id_meterial},                
        function(result)
        {   
            if(result.data.length>0)
            { 
                if(result.data[0].Tipo == "MATERIAL FLEXIBLE")
                {
                    var tipomaterial = "Hoja";
                    var cantidadmetros = $("#resCant").val();
                    var largohoja = tblAlto;
                    var mpcdh = 0.5; //minutos por cambio de hoja

                    if(result.data[0].Traslucido == 1)
                    {      
                        var velocidad = 9; //velocidad ml/hr
                        var tpn = ( (cantidadmetros * mpcdh) / 60 ) + ( (cantidadmetros * (largohoja /100)) / velocidad) ; //tiempo de produccion nominal
                        var tpre = tpn * 1.2; // Tiempo de produccion real estimado
                        $("#tiempoproduccion").val(currency(tpre));                                 
                    }
                    else if( $("#blanco").prop("checked") == true && $("#0").prop("checked") == true )
                    {
                        var velocidad = 6.5; //velocidad ml/hr
                        var tpn = ( (cantidadmetros * mpcdh) / 60 ) + ( (cantidadmetros * (largohoja /100)) / velocidad) ; //tiempo de produccion nominal
                        var tpre = tpn * 1.2; // Tiempo de produccion real estimado
                        $("#tiempoproduccion").val(currency(tpre));
                    }
                    else if( $("#blanco").prop("checked") == true && $("#720").prop("checked") == true ) //Blanco + color 720
                    {
                        var velocidad = 6.5;
                        var tpn = ( (cantidadmetros * mpcdh) / 60 ) + ( (cantidadmetros * (largohoja /100)) / velocidad) ; 
                        var tpre = tpn * 1.2; 
                        $("#tiempoproduccion").val(currency(tpre));                        
                    }
                    else if( $("#blanco").prop("checked") == true && $("#1440").prop("checked") == true ) //Blanco + color 1440
                    {
                        var velocidad = 6.5; 
                        var tpn = ( (cantidadmetros * mpcdh) / 60 ) + ( (cantidadmetros * (largohoja /100)) / velocidad) ; 
                        var tpre = tpn * 1.2; 
                        $("#tiempoproduccion").val(currency(tpre));                        
                    } 
                    else if ( $("#720").prop("checked") == true && $("#blanco").prop("checked") == false) //Normal (solo color) 720
                    {
//                        alert("entro");
                        var velocidad = 17; //velocidad ml/hr
                        var tpn = ( (cantidadmetros * mpcdh) / 60 ) + ( (cantidadmetros * (largohoja /100)) / velocidad) ;
                        var tpre = tpn * 1.2; // Tiempo de produccion real estimado
                        $("#tiempoproduccion").val(currency(tpre));
                    }    
                    else if ( $("#blanco").prop("checked") == false && $("#1440").prop("checked") == true) //Normal (solo color) 1440
                    {
                        //alert("entro");
                        var velocidad = 17; //velocidad ml/hr
                        var tpn = ( (cantidadmetros * mpcdh) / 60 ) + ( (cantidadmetros * (largohoja /100)) / velocidad) ;
                        var tpre = tpn * 1.2; // Tiempo de produccion real estimado
                        $("#tiempoproduccion").val(currency(tpre));
                    }  
                    else if ( $("#blanco").prop("checked") == false && $("#Sandwich").prop("checked") == true) //Normal (solo color) Sandwich
                    {
                        var velocidad = 6.5; //velocidad ml/hr
                        var tpn = ( (cantidadmetros * mpcdh) / 60 ) + ( (cantidadmetros * (largohoja /100)) / velocidad) ;
                        var tpre = tpn * 1.2; // Tiempo de produccion real estimado
                        $("#tiempoproduccion").val(currency(tpre));
                    }  
                    else
                    {
                        $("#tiempoproduccion").val("0");
                    }                                                                           

                }
                else if (result.data[0].Tipo == "MATERIAL RIGIDO" || result.data[0].Tipo == "MATERIAL FOTOGRAFICO")
                {
                    var tipomaterial = "Rollo";
                    var cantidadmetros = $("#resCant").val();                    

                    if(result.data[0].Traslucido == 1)
                    {      
                        var velocidad = 9; //velocidad ml/hr
                        var tpn = (cantidadmetros / velocidad); //tiempo de produccion nominal //tiempo de produccion nominal
                        var tpre = tpn * 1.2; // Tiempo de produccion real estimado
                        $("#tiempoproduccion").val(currency(tpre));                                 
                    }
                    else if( $("#blanco").prop("checked") == true && $("#0").prop("checked") == true )
                    {
                        var velocidad = 6.5; //velocidad ml/hr
                        var tpn = (cantidadmetros / velocidad); //tiempo de produccion nominal //tiempo de produccion nominal
                        var tpre = tpn * 1.2; // Tiempo de produccion real estimado
                        $("#tiempoproduccion").val(currency(tpre));
                    }
                    else if( $("#blanco").prop("checked") == true && $("#720").prop("checked") == true ) //Blanco + color 720
                    {
                        var velocidad = 6.5;
                        var tpn = (cantidadmetros / velocidad); //tiempo de produccion nominal 
                        var tpre = tpn * 1.2; 
                        $("#tiempoproduccion").val(currency(tpre));                        
                    }
                    else if( $("#blanco").prop("checked") == true && $("#1440").prop("checked") == true ) //Blanco + color 1440
                    {
                        var velocidad = 6.5; 
                        var tpn = (cantidadmetros / velocidad); //tiempo de produccion nominal 
                        var tpre = tpn * 1.2; 
                        $("#tiempoproduccion").val(currency(tpre));                        
                    } 
                    else if ( $("#720").prop("checked") == true && $("#blanco").prop("checked") == false) //Normal (solo color) 720
                    {
                        //alert("entro");
                        var velocidad = 17; //velocidad ml/hr
                        var tpn = (cantidadmetros / velocidad); //tiempo de produccion nominal
                        var tpre = tpn * 1.2; // Tiempo de produccion real estimado
                        $("#tiempoproduccion").val(currency(tpre));
                    }    
                    else if ( $("#blanco").prop("checked") == false && $("#1440").prop("checked") == true) //Normal (solo color) 1440
                    {
                        //alert("entro");
                        var velocidad = 17; //velocidad ml/hr
                        var tpn = (cantidadmetros / velocidad); //tiempo de produccion nominal
                        var tpre = tpn * 1.2; // Tiempo de produccion real estimado
                        $("#tiempoproduccion").val(currency(tpre));
                    }  
                    else if ( $("#blanco").prop("checked") == false && $("#Sandwich").prop("checked") == true) //Normal (solo color) Sandwich
                    {
                        var velocidad = 6.5; //velocidad ml/hr
                        var tpn = (cantidadmetros / velocidad); //tiempo de produccion nominal
                        var tpre = tpn * 1.2; // Tiempo de produccion real estimado
                        $("#tiempoproduccion").val(currency(tpre));
                    }  
                    else
                    {
                        $("#tiempoproduccion").val("0");
                    }                                                                          
                }
            }
        },'json');        
    }    
}

/*$.guardar = function()
{
    alert(tblentran);
        var cadena=$("#form1").serialize()+'&tblmedida='+tblmedida + '&tblancho='+tblAncho + '&tblalto='+tblAlto + '&tblorientacion='+tblorientacion + '&tblentran='+tblentran + '&tblaprovecha='+tblaprovecha +'&tblaloalto='+tblaloalto +'&tblaloancho='+tblaloancho + '&proveedor='+proveedor +'&label-Acab1='+ $("#label-Acab1").html() +
        '&label-Acab2='+ $("#label-Acab2").html() +'&label-Acab3='+ $("#label-Acab3").html() +'&label-Acab4='+ $("#label-Acab4").html() +'&label-Acab5='+ $("#label-Acab5").html() +'&label-Acab6='+ $("#label-Acab6").html() +'&titCantMat='+ $("#titCantMat").html();
        console.log(cadena);
        $.post("php/guardar.php",cadena,
            function(result)
            {
                if(result.data.length>0){               
                    $("#asignofolio").html("Se asigno al folio: <span style='color:red; font-size: 27px;'>"+result.data[0].folio+"</span>");
                    $("#dialogo_datosguardados").modal('open');
                    $("#foliob").val(result.data[0].folio);
                }
            },"json"
        );    
}*/

$.ordenproduccion = function()
{
    foliob = $("#foliob").val();
    $.post('php/ord_produccion.php', {foliob:foliob},
        function(result) 
        {
            if(result.data.length>0){               
                $("#asignaordprod").html("Se asigno al folio: <span style='color:red; font-size: 27px;'>"+result.data[0].id_ordproduccion+"</span>");
                $("#ordprod").val(result.data[0].id_ordproduccion);
                $("#dialogo_or_production").modal('open');                  
            }                               
        },'json');
}

$.actualizarordenproduccion = function()
{
    fentrega = $("#fentrega").val();
    matrix = $("#matrix").val();
    foliob = $("#foliob").val();
    $.post('php/act_ord_produccion.php', {fentrega:fentrega, matrix: matrix, foliob:foliob},
        function(result)
        {
            if(result.data.length>0)
            {       
                $("#nometrics").val(result.data.or_matrix);
                foliob = $("#foliob").val();
                window.open("pdf/ordenproduccion.php?foliob=" + foliob,'_blank');                   
            }
        },'json');    
}

function currency(value, decimals, separators) {
    decimals = decimals >= 0 ? parseInt(decimals, 0) : 2;
    separators = separators || [',', ",", '.'];
    var number = (parseFloat(value) || 0).toFixed(decimals);
    if (number.length <= (4 + decimals))
        return number.replace('.', separators[separators.length - 1]);
    var parts = number.split(/[-.]/);
    value = parts[parts.length > 1 ? parts.length - 2 : 0];
    var result = value.substr(value.length - 3, 3) + (parts.length > 1 ?
        separators[separators.length - 1] + parts[parts.length - 1] : '');
    var start = value.length - 6;
    var idx = 0;
    while (start > -3) {
        result = (start > 0 ? value.substr(start, 3) : value.substr(0, 3 + start))
            + separators[idx] + result;
        idx = (++idx) % 2;
        start -= 3;
    }
    return (parts.length == 3 ? '-' : '') + result;
}
function number_format(amount, decimals) {

    amount += ''; // por si pasan un numero en vez de un string
    amount = parseFloat(amount.replace(/[^0-9\.]/g, '')); // elimino cualquier cosa que no sea numero o punto

    decimals = decimals || 0; // por si la variable no fue fue pasada

    // si no es un numero o es igual a cero retorno el mismo cero
    if (isNaN(amount) || amount === 0) 
        return parseFloat(0).toFixed(decimals);

    // si es mayor o menor que cero retorno el valor formateado como numero
    amount = '' + amount.toFixed(decimals);

    var amount_parts = amount.split('.'),
        regexp = /(\d+)(\d{3})/;

    while (regexp.test(amount_parts[0]))
        amount_parts[0] = amount_parts[0].replace(regexp, '$1' + ',' + '$2');

    return amount_parts.join('.');
}            

});