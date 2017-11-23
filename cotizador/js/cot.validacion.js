$(document).ready(function()
{
    $("#cliente").focus();
    $("#li-abrir").show();
    $("#li-guardar").show();
    $("#li-limpiar").show();
    
    //--------------------------------------------------------------------------
    //                        Ocualtar elementos
    //--------------------------------------------------------------------------

    $('#lblPasadas').hide();
    $('#barniz_pasadas').hide();
    $("#inicio").hide();
    $("#div_medida_especial").hide();
    
    //--------------------------------------------------------------------------
    //                        Validacion de Header
    //--------------------------------------------------------------------------
    
    $("#folio2").change(function()
    {
        var folio2 = $("#folio2").val();
        
         if (typeof folio2 !== "undefined" && folio2)
        {
            $("#txtfolio2").css("color", "red");
            $("#C").prop("checked", true);
        }
        else
        {
            $("#txtfolio2").css("color", "black");
            $("#C").prop("checked", false);
        }
    });
    
    $("#folio3").change(function()
    {
        var folio3 = $("#folio3").val();
        
         if (typeof folio3 !== "undefined" && folio3)
        {
            $("#txtfolio3").css("color", "red");
            $("#OP").prop("checked", true);
        }
        else
        {
            $("#txtfolio3").css("color", "black");
            $("#OP").prop("checked", false);
        }
    });
    
    $("#folio4").change(function()
    {
        var folio4 = $("#folio4").val();
        
         if (typeof folio4 !== "undefined" && folio4)
        {
            $("#txtfolio4").css("color", "red");
            $("#M").prop("checked", true);
        }
        else
        {
            $("#txtfolio4").css("color", "black");
            $("#M").prop("checked", false);
        }
    });
    
    //--------------------------------------------------------------------------
    //           Validar cuando se realice un cambio en los input
    //--------------------------------------------------------------------------
    $('#datos-footer .txtcant').hover(
        function()
        {
            $(this).css("width", "100");
            //$(this).animate({ 'zoom': 1.4 }, 400);
        },
        function()
        {
            $(this).css("width", "70");
            //$(this).animate({ 'zoom': 1 }, 400);
        }
    );
    
    $("#cliente").change(function()
    {
        $.mod();
    });
    
    $("#trabajo").change(function()
    {
        var value = $(this).val(),
        value = value.trim(),
        value = value.toUpperCase(),
        val_1 = "/",
        val_2 = "_",
        value = value.replace(val_1,val_2);
        
        var value = value,
        val_1 = '"',
        val_2 = "_",
        value = value.replace(val_1,val_2);
        
        var value = value,
        val_1 = "'",
        val_2 = "_",
        value = value.replace(val_1,val_2);
        
        var value = value,
        val_1 = "º",
        val_2 = "_",
        value = value.replace(val_1,val_2);
        
        var value = value,
        val_1 = "@",
        val_2 = "_",
        value = value.replace(val_1,val_2);
        
        var value = value,
        val_1 = "#",
        val_2 = "_",
        value = value.replace(val_1,val_2);
        
        var value = value,
        val_1 = "$",
        val_2 = "_",
        value = value.replace(val_1,val_2);
        
        var value = value,
        val_1 = "%",
        val_2 = "_",
        value = value.replace(val_1,val_2);
        
        var value = value,
        val_1 = "&",
        val_2 = "_",
        value = value.replace(val_1,val_2);
        
        var value = value,
        val_1 = "*",
        val_2 = "_",
        value = value.replace(val_1,val_2);
        
        var value = value,
        val_1 = ".",
        val_2 = "_",
        value = value.replace(val_1,val_2);
        
        var value = value,
        val_1 = "+",
        val_2 = "_",
        value = value.replace(val_1,val_2);
        
        var value = value,
        val_1 = "!",
        val_2 = "_",
        value = value.replace(val_1,val_2);
        
        var value = value,
        val_1 = "¡",
        val_2 = "_",
        value = value.replace(val_1,val_2);
        
        var value = value,
        val_1 = "?",
        val_2 = "_",
        value = value.replace(val_1,val_2);
        
        var value = value,
        val_1 = "¿",
        val_2 = "_",
        value = value.replace(val_1,val_2);
        
        var value = value,
        val_1 = "=",
        val_2 = "_",
        value = value.replace(val_1,val_2);
        
        var value = value,
        val_1 = "Ñ",
        val_2 = "N",
        value = value.replace(val_1,val_2);
        
        var value = value,
        val_1 = "Á",
        val_2 = "A",
        value = value.replace(val_1,val_2);
        
        var value = value,
        val_1 = "É",
        val_2 = "E",
        value = value.replace(val_1,val_2);
        
        var value = value,
        val_1 = "Í",
        val_2 = "I",
        value = value.replace(val_1,val_2);
        
        var value = value,
        val_1 = "Ó",
        val_2 = "O",
        value = value.replace(val_1,val_2);
        
        var value = value,
        val_1 = "Ú",
        val_2 = "U",
        value = value.replace(val_1,val_2);

        $("#trabajo").val(value);
        $.mod();
    });
    
    $("#cantidad").change(function()
    {
        $.val_medias();
        $.resolucion();
        $.barniz();
        $.blanco();
        $.acab1();
        $.acab2();
        $.acab3();
        $.valiAdicional();
        $.mod();
    });
    
    $("#ancho").change(function()
    {
        $.totalAncho();
        $.val_medias();
        $.resolucion();
        $.barniz();
        $.blanco();
        $.acab1();
        $.acab2();
        $.acab3();
        $.mod();
    });
 
    $("#alto").change(function()
    {
        $.totalAlto();
        $.val_medias();
        $.resolucion();
        $.barniz();
        $.blanco();
        $.acab1();
        $.acab2();
        $.acab3();
        $.mod();
    });

    $("#medancho").change(function()
    {
        $.totalAncho();
        $.val_medias();
        $.resolucion();
        $.mod();
    });

    $("#medalto").change(function()
    {
        $.totalAlto();
        $.val_medias();
        $.resolucion();
        $.mod();
    });
    
    $("#mat_especial").change(function()
    {
        $.matEspecialVal();
    });
    
    $("#material").change(function()
    {
        $("#medidas").empty("<option>");

        if ($("#ancho").val() > 0 && $("#alto").val() > 0 )
        {
            $("#720").prop("checked", true);
            var medida = "1";
            $.combo_medidas(medida);
            $.resolucion();
            $.acab1();
            $.acab2();
            $.acab3();
            $.mod();
        }
        else
        {
            $("#medidas").append($("<option>",
            {
                value: "0",
                text: "Ninguno"
            }));
            $("#dialogoerror").html('<span style="color:red;">Debes de ingresar primero un valor mayor a 0 en Ancho y Alto</span>');
            $("#dialogoerror").modal("open");
            $("#ancho").focus();
            $("#material").val(0);
            $.mod();
        }
    });
    
    $("#medidas").change(function()
    {
        $.tabla_medidas();
        $.resolucion();
        $.mod();
    });
    
    $("input[name=resolucion]:radio").each(function()
    {
        $(this).change(function()
        {
            $.resolucion();
            $.mod();
        });
    });
    
    $("#pasadas_imp").change(function()
    {
        $.resolucion();
        $.mod();
    });
    
    $("#barniz").change(function()
    {
        $.barniz();
        $.mod();
    });
    
    $("#barniz_pasadas").change(function()
    {
        $.barnizPasadas();
        $.mod();
    });
    
    $("#blanco").change(function()
    {
        $.blanco();
    });
        
    $("#acab1").change(function()
    {
        $.acab1();
        $.mod();
    });

    $("#acab2").change(function()
    {
        $.acab2();
        $.mod();
    });

    $("#acab3").change(function()
    {
        $.acab3();
        $.mod();
    });
        
    $("#acab4").change(function()
    {
        $.acab4();
        $.mod();
    });

    $("#acab5").change(function()
    {
        $.acab5();
        $.mod();
    });

    $("#acab6").change(function()
    {
        $.acab6();
        $.mod();
    });
    
    $(".txtcostoadic").change(function()
    {
        var value = $(this).val();
        if(value === "")
        {
            $(this).val(0);
        }
    });
    
    $("#adic1").change(function()
    {
        $.valiAdicional();
        $.mod();
    });
    
    $("#adic2").change(function()
    {
        $.valiAdicional();
        $.mod();
    });
    
    $("#adic3").change(function()
    {
        $.valiAdicional();
        $.mod();
    });
    
    $("#adic4").change(function()
    {
        $.valiAdicional();
        $.mod();
    });
    
    $("#adic5").change(function()
    {
        $.valiAdicional();
        $.mod();
    });
    
    $("#adic6").change(function()
    {
        $.valiAdicional();
        $.mod();
    });
    
    $("#costoadic1").change(function()
    {
        $.adicional1();
        $.mod();
    });

    $("#costoadic2").change(function()
    {
        $.adicional2();
        $.mod();
    });

    $("#costoadic3").change(function()
    {
        $.adicional3();
        $.mod();
    });
    
    $("#costoadic4").change(function()
    {
        $.adicional4();
        $.mod();
    });

    $("#costoadic5").change(function()
    {
        $.adicional5();
        $.mod();
    });

    $("#costoadic6").change(function()
    {
        $.adicional6();
        $.mod();
    });
    
    $("#porcientoMargen").change(function()
    {
        $.calculos();
        $.mod();
    });
    
    $("#porcientoComision").change(function()
    {
        $.calculos();
        $.mod();
    });
    
    $("#lito2").click(function()
    {
        $.recalcular();
        $.mod();
    });
    
    $("#lito3").click(function()
    {
        $.recalcular();
        $.mod();
    });
    
    $("#lito4").click(function()
    {
        $.recalcular();
        $.mod();
    });
    
    $("#lito5").click(function()
    {
        $.recalcular();
        $.mod();
    });
    
    $("#lito6").click(function()
    {
        $.recalcular();
        $.mod();
    });
    
    $("#lito7").click(function()
    {
        $.recalcular();
        $.mod();
    });
    
    $("#lito8").click(function()
    {
        $.recalcular();
        $.mod();
    });
    
    $("#lito9").click(function()
    {
        $.recalcular();
        $.mod();
    });
    
    $("#lito10").click(function()
    {
        $.recalcular();
        $.mod();
    });
    
    $("#lito11").click(function()
    {
        $.recalcular();
        $.mod();
    });
    
    $("#lito12").click(function()
    {
        $.recalcular();
        $.mod();
    });
    
    $("#lito13").click(function()
    {
        $.recalcular();
        $.mod();
    });
    
    $("#lito14").click(function()
    {
        $.recalcular();
        $.mod();
    });
    
    $("#lito15").click(function()
    {
        $.recalcular();
        $.mod();
    });
    
    $("#lito16").click(function()
    {
        $.recalcular();
        $.mod();
    });
    
    $("#lito17").click(function()
    {
        $.recalcular();
        $.mod();
    });
    
    $("#lito18").click(function()
    {
        $.recalcular();
        $.mod();
    });
    
    $("#observaciones").change(function()
    {
        $.mod();
    });
    
    //--------------------------------------------------------------------------
    //                     Validar tipo de material
    //--------------------------------------------------------------------------

    $.matEspecialVal = function()
    {
        $("#medida_especial").empty("<option>");
        
        if ($("#ancho").val() > 0 && $("#alto").val() > 0 )
        {
            if($("#mat_especial").prop("checked") == true)
            {
                $("#720").prop("checked", true);
                $("#div_medida_especial").show();
                $("#div_material").hide();
                $("#div_medidas").hide();
                $("#dialog_mat_especial").modal("open");
            }
            else
            {
                $("#div_medida_especial").hide();
                $("#div_material").show();
                $("#div_medidas").show();
            }
        }
        else
        {
            $("#medida_especial").append($("<option>",
            {
                checked: true,
                value: "0",
                text: "Ninguno"
            }));
            
            $("#mat_especial").prop("checked", false);
            $("#div_medida_especial").hide();
            $("#div_material").show();
            $("#div_medidas").show();
            
            $("#dialogoerror").html('<span style="color:red;">Debes de ingresar primero un valor mayor a 0 en Ancho y Alto</span>');
            $("#dialogoerror").modal("open");
            
            $("#ancho").focus();
            $("#material").val(0);
            $.mod();
        }
    }
    
    $.val_medias = function()
    {
        if($("#mat_especial").prop("checked") == true)
        {
            $.med_especial();
        }
        else
        {
            $.tabla_medidas();
            var MedEspecial = "";
        }
    }
    
    //--------------------------------------------------------------------------
    //                          Validar Resolucion
    //--------------------------------------------------------------------------
    
    $.resolucion = function()
    {
        if($("#720").prop("checked") == true)
        {
            $.resolucion720();
        }
        else if($("#1440").prop("checked") == true)
        {
            $.resolucion1440();
        }
        else if($("#0").prop("checked") == true)
        {
            $.resolucion0();
        }
        else if($("#Sandwich").prop("checked") == true)
        {
            $.Sandwich();
        }
    }
    
    //--------------------------------------------------------------------------
    //                              Validar BARNIZ
    //--------------------------------------------------------------------------
    
    $.barniz = function()
    {
        $.barnizPasadas();
        $.mod();
    }
    
    //--------------------------------------------------------------------------
    //                              Validar BARNIZ
    //--------------------------------------------------------------------------
    
    $.blanco = function()
    {
        $.calculoblanco();
        $.mod();
    }
    
    //--------------------------------------------------------------------------
    //                              Validar Adicionales
    //--------------------------------------------------------------------------
    
    $.valiAdicional = function()
    {
        if($("#adic1").val() == "" || $("#cantidad").val() == "0")
        {
            $("#costoadic1").val("0");
            $("#resAdic1").val("0");
            $.calculos();
            //alert("Vacio");
        }
        else
        {
            //alert($("#adic1").val());
            $.adicional1();
        }
        
        if($("#adic2").val() == "" || $("#cantidad").val() == "0")
        {
            $("#costoadic2").val("0");
            $("#resAdic2").val("0");
            $.calculos();
        }
        else
        {
            $.adicional2();
        }
        
        if($("#adic3").val() == "" || $("#cantidad").val() == "0")
        {
            $("#costoadic3").val("0");
            $("#resAdic3").val("0");
            $.calculos();
        }
        else
        {
            $.adicional3();
        }
        
        if($("#adic4").val() == "" || $("#cantidad").val() == "0")
        {
            $("#costoadic4").val("0");
            $("#resAdic4").val("0");
            $.calculos();
        }
        else
        {
            $.adicional4();
        }
        
        if($("#adic5").val() == "" || $("#cantidad").val() == "0")
        {
            $("#costoadic5").val("0");
            $("#resAdic5").val("0");
            $.calculos();
        }
        else
        {
            $.adicional5();
        }
        
        if($("#adic6").val() == "" || $("#cantidad").val() == "0")
        {
            $("#costoadic6").val("0");
            $("#resAdic6").val("0");
            $.calculos();
        }
        else
        {
            $.adicional6();
        }
    }
    
    //--------------------------------------------------------------------------
    //                        Limpiar y recalcular
    //--------------------------------------------------------------------------
    
    $.mod = function()
    {
        $("#cambios").val('Los datos no se han guardado');
        $("#li-imprimir2").hide();
        $("#li-imprimirord").hide();
        $("#li-imprimir3").hide();
    }
    
    $.calculos = function()
    {
        $.subtotal();
        $.margen();
        $.comision();
        $.precioUnitario();
        $.total();
        $.recalcular();
    }
    
    //--------------------------------------------------------------------------
    //                     Dialogo error es general
    //--------------------------------------------------------------------------
    
    /*$("#dialogoerror").dialog(
    {
        autoOpen:false,
        resizable: false,
        height:190,
        width:300,
        modal: true,
        show: "shake",
        hide: "puff",
        buttons:
        {
            "Aceptar":function()
            {
                $("#dialogoerror").dialog("close");
            }
        }
    });*/

    //--------------------------------------------------------------------------
    //                         Llenar combo de medidas
    //--------------------------------------------------------------------------

    $.combo_medidas = function(medida)
    {
        var medida = medida;
        //alert(medida);

        var id_material=$('#material').val();
        var v_id_material="Id_Material="+id_material;
        $.post('modelo/medidas.php',v_id_material,
            function(data)
            {
                if(data.validacion=="true")
                {
                    for(var i=0; i<data.rows.length; i++)
                    {
                        $("#titMat").html(data.rows[i].Tipo);
                        if(data.rows[i].Medida_Mat_1== "1" && data.rows[i].Medida_Mat_2== "2" && data.rows[i].Medida_Mat_3== "3" && data.rows[i].Medida_Mat_4== "4" && data.rows[i].Medida_Mat_5== "5")
                        {
                            if (medida == "5")
                            {
                                $('#medidas').append($('<option>',
                                {
                                    value: "0",
                                    text: "Ninguno"
                                })).append($('<option>',
                                {
                                    value: data.rows[i].Medida_Mat_1,
                                    text: data.rows[i].M_Mat1
                                })).append($('<option>',
                                {
                                    value: data.rows[i].Medida_Mat_2,
                                    text: data.rows[i].M_Mat2
                                })).append($('<option>',
                                {
                                    value: data.rows[i].Medida_Mat_3,
                                    text: data.rows[i].M_Mat3
                                })).append($('<option>',
                                {
                                    value: data.rows[i].Medida_Mat_4,
                                    text: data.rows[i].M_Mat4
                                })).append($('<option>',
                                {
                                    selected: true,
                                    value: data.rows[i].Medida_Mat_5,
                                    text: data.rows[i].M_Mat5
                                }));
                            }
                            else if (medida == "4")
                            {
                                $('#medidas').append($('<option>',
                                {
                                    value: "0",
                                    text: "Ninguno"
                                })).append($('<option>',
                                {
                                    value: data.rows[i].Medida_Mat_1,
                                    text: data.rows[i].M_Mat1
                                })).append($('<option>',
                                {
                                    value: data.rows[i].Medida_Mat_2,
                                    text: data.rows[i].M_Mat2
                                })).append($('<option>',
                                {
                                    value: data.rows[i].Medida_Mat_3,
                                    text: data.rows[i].M_Mat3
                                })).append($('<option>',
                                {
                                    selected: true,
                                    value: data.rows[i].Medida_Mat_4,
                                    text: data.rows[i].M_Mat4
                                })).append($('<option>',
                                {
                                    value: data.rows[i].Medida_Mat_5,
                                    text: data.rows[i].M_Mat5
                                }));
                            }
                            else if (medida == "3")
                            {
                                $('#medidas').append($('<option>',
                                {
                                    value: "0",
                                    text: "Ninguno"
                                })).append($('<option>',
                                {
                                    value: data.rows[i].Medida_Mat_1,
                                    text: data.rows[i].M_Mat1
                                })).append($('<option>',
                                {
                                    value: data.rows[i].Medida_Mat_2,
                                    text: data.rows[i].M_Mat2
                                })).append($('<option>',
                                {
                                    selected: true,
                                    value: data.rows[i].Medida_Mat_3,
                                    text: data.rows[i].M_Mat3
                                })).append($('<option>',
                                {
                                    value: data.rows[i].Medida_Mat_4,
                                    text: data.rows[i].M_Mat4
                                })).append($('<option>',
                                {
                                    value: data.rows[i].Medida_Mat_5,
                                    text: data.rows[i].M_Mat5
                                }));
                            }
                            else if (medida == "2")
                            {
                                $('#medidas').append($('<option>',
                                {
                                    value: "0",
                                    text: "Ninguno"
                                })).append($('<option>',
                                {
                                    value: data.rows[i].Medida_Mat_1,
                                    text: data.rows[i].M_Mat1
                                })).append($('<option>',
                                {
                                    selected: true,
                                    value: data.rows[i].Medida_Mat_2,
                                    text: data.rows[i].M_Mat2
                                })).append($('<option>',
                                {
                                    value: data.rows[i].Medida_Mat_3,
                                    text: data.rows[i].M_Mat3
                                })).append($('<option>',
                                {
                                    value: data.rows[i].Medida_Mat_4,
                                    text: data.rows[i].M_Mat4
                                })).append($('<option>',
                                {
                                    value: data.rows[i].Medida_Mat_5,
                                    text: data.rows[i].M_Mat5
                                }));
                            }
                            else if (medida == "1")
                            {
                                $('#medidas').append($('<option>',
                                {
                                    value: "0",
                                    text: "Ninguno"
                                })).append($('<option>',
                                {
                                    selected: true,
                                    value: data.rows[i].Medida_Mat_1,
                                    text: data.rows[i].M_Mat1
                                })).append($('<option>',
                                {
                                    value: data.rows[i].Medida_Mat_2,
                                    text: data.rows[i].M_Mat2
                                })).append($('<option>',
                                {
                                    value: data.rows[i].Medida_Mat_3,
                                    text: data.rows[i].M_Mat3
                                })).append($('<option>',
                                {
                                    value: data.rows[i].Medida_Mat_4,
                                    text: data.rows[i].M_Mat4
                                })).append($('<option>',
                                {
                                    value: data.rows[i].Medida_Mat_5,
                                    text: data.rows[i].M_Mat5
                                }));
                            }
                            else if (medida == "0")
                            {
                                $('#medidas').append($('<option>',
                                {
                                    selected: true,
                                    value: "0",
                                    text: "Ninguno"
                                })).append($('<option>',
                                {
                                    value: data.rows[i].Medida_Mat_1,
                                    text: data.rows[i].M_Mat1
                                })).append($('<option>',
                                {
                                    value: data.rows[i].Medida_Mat_2,
                                    text: data.rows[i].M_Mat2
                                })).append($('<option>',
                                {
                                    value: data.rows[i].Medida_Mat_3,
                                    text: data.rows[i].M_Mat3
                                })).append($('<option>',
                                {
                                    value: data.rows[i].Medida_Mat_4,
                                    text: data.rows[i].M_Mat4
                                })).append($('<option>',
                                {
                                    value: data.rows[i].Medida_Mat_5,
                                    text: data.rows[i].M_Mat5
                                }));
                            }
                        }
                        else if(data.rows[i].Medida_Mat_1== "1" && data.rows[i].Medida_Mat_2== "2" && data.rows[i].Medida_Mat_3== "3" && data.rows[i].Medida_Mat_4== "4")
                        {
                            if (medida == "4")
                            {
                                $('#medidas').append($('<option>',
                                {
                                    value: "0",
                                    text: "Ninguno"
                                })).append($('<option>',
                                {
                                    value: data.rows[i].Medida_Mat_1,
                                    text: data.rows[i].M_Mat1
                                })).append($('<option>',
                                {
                                    value: data.rows[i].Medida_Mat_2,
                                    text: data.rows[i].M_Mat2
                                })).append($('<option>',
                                {
                                    value: data.rows[i].Medida_Mat_3,
                                    text: data.rows[i].M_Mat3
                                })).append($('<option>',
                                {
                                    selected: true,
                                    value: data.rows[i].Medida_Mat_4,
                                    text: data.rows[i].M_Mat4
                                }));
                            }
                            else if (medida == "3")
                            {
                                $('#medidas').append($('<option>',
                                {
                                    value: "0",
                                    text: "Ninguno"
                                })).append($('<option>',
                                {
                                    value: data.rows[i].Medida_Mat_1,
                                    text: data.rows[i].M_Mat1
                                })).append($('<option>',
                                {
                                    value: data.rows[i].Medida_Mat_2,
                                    text: data.rows[i].M_Mat2
                                })).append($('<option>',
                                {
                                    selected: true,
                                    value: data.rows[i].Medida_Mat_3,
                                    text: data.rows[i].M_Mat3
                                })).append($('<option>',
                                {
                                    value: data.rows[i].Medida_Mat_4,
                                    text: data.rows[i].M_Mat4
                                }));
                            }
                            else if (medida == "2")
                            {
                                $('#medidas').append($('<option>',
                                {
                                    value: "0",
                                    text: "Ninguno"
                                })).append($('<option>',
                                {
                                    value: data.rows[i].Medida_Mat_1,
                                    text: data.rows[i].M_Mat1
                                })).append($('<option>',
                                {
                                    selected: true,
                                    value: data.rows[i].Medida_Mat_2,
                                    text: data.rows[i].M_Mat2
                                })).append($('<option>',
                                {
                                    value: data.rows[i].Medida_Mat_3,
                                    text: data.rows[i].M_Mat3
                                })).append($('<option>',
                                {
                                    value: data.rows[i].Medida_Mat_4,
                                    text: data.rows[i].M_Mat4
                                }));
                            }
                            else if (medida == "1")
                            {
                                $('#medidas').append($('<option>',
                                {
                                    value: "0",
                                    text: "Ninguno"
                                })).append($('<option>',
                                {
                                    selected: true,
                                    value: data.rows[i].Medida_Mat_1,
                                    text: data.rows[i].M_Mat1
                                })).append($('<option>',
                                {
                                    value: data.rows[i].Medida_Mat_2,
                                    text: data.rows[i].M_Mat2
                                })).append($('<option>',
                                {
                                    value: data.rows[i].Medida_Mat_3,
                                    text: data.rows[i].M_Mat3
                                })).append($('<option>',
                                {
                                    value: data.rows[i].Medida_Mat_4,
                                    text: data.rows[i].M_Mat4
                                }));
                            }
                            else if (medida == "0")
                            {
                                $('#medidas').append($('<option>',
                                {
                                    selected: true,
                                    value: "0",
                                    text: "Ninguno"
                                })).append($('<option>',
                                {
                                    value: data.rows[i].Medida_Mat_1,
                                    text: data.rows[i].M_Mat1
                                })).append($('<option>',
                                {
                                    value: data.rows[i].Medida_Mat_2,
                                    text: data.rows[i].M_Mat2
                                })).append($('<option>',
                                {
                                    value: data.rows[i].Medida_Mat_3,
                                    text: data.rows[i].M_Mat3
                                })).append($('<option>',
                                {
                                    value: data.rows[i].Medida_Mat_4,
                                    text: data.rows[i].M_Mat4
                                }));
                            }
                        }
                        else if(data.rows[i].Medida_Mat_1== "1" && data.rows[i].Medida_Mat_2== "2" && data.rows[i].Medida_Mat_3== "3")
                        {
                            if (medida == "3")
                            {
                                $('#medidas').append($('<option>',
                                {
                                    value: "0",
                                    text: "Ninguno"
                                })).append($('<option>',
                                {
                                    value: data.rows[i].Medida_Mat_1,
                                    text: data.rows[i].M_Mat1
                                })).append($('<option>',
                                {
                                    value: data.rows[i].Medida_Mat_2,
                                    text: data.rows[i].M_Mat2
                                })).append($('<option>',
                                {
                                    selected: true,
                                    value: data.rows[i].Medida_Mat_3,
                                    text: data.rows[i].M_Mat3
                                }));
                            }
                            else if (medida == "2")
                            {
                                $('#medidas').append($('<option>',
                                {
                                    value: "0",
                                    text: "Ninguno"
                                })).append($('<option>',
                                {
                                    value: data.rows[i].Medida_Mat_1,
                                    text: data.rows[i].M_Mat1
                                })).append($('<option>',
                                {
                                    selected: true,
                                    value: data.rows[i].Medida_Mat_2,
                                    text: data.rows[i].M_Mat2
                                })).append($('<option>',
                                {
                                    value: data.rows[i].Medida_Mat_3,
                                    text: data.rows[i].M_Mat3
                                }));
                            }
                            else if (medida == "1")
                            {
                                $('#medidas').append($('<option>',
                                {
                                    value: "0",
                                    text: "Ninguno"
                                })).append($('<option>',
                                {
                                    selected: true,
                                    value: data.rows[i].Medida_Mat_1,
                                    text: data.rows[i].M_Mat1
                                })).append($('<option>',
                                {
                                    value: data.rows[i].Medida_Mat_2,
                                    text: data.rows[i].M_Mat2
                                })).append($('<option>',
                                {
                                    value: data.rows[i].Medida_Mat_3,
                                    text: data.rows[i].M_Mat3
                                }));
                            }
                            else if (medida == "0")
                            {
                                $('#medidas').append($('<option>',
                                {
                                    selected: true,
                                    value: "0",
                                    text: "Ninguno"
                                })).append($('<option>',
                                {
                                    selected: true,
                                    value: data.rows[i].Medida_Mat_1,
                                    text: data.rows[i].M_Mat1
                                })).append($('<option>',
                                {
                                    value: data.rows[i].Medida_Mat_2,
                                    text: data.rows[i].M_Mat2
                                })).append($('<option>',
                                {
                                    value: data.rows[i].Medida_Mat_3,
                                    text: data.rows[i].M_Mat3
                                }));
                            }
                        }
                        else if(data.rows[i].Medida_Mat_1== "1" && data.rows[i].Medida_Mat_2== "2")
                        {
                            if (medida == "2")
                            {
                                $('#medidas').append($('<option>',
                                {
                                    value: "0",
                                    text: "Ninguno"
                                })).append($('<option>',
                                {
                                    value: data.rows[i].Medida_Mat_1,
                                    text: data.rows[i].M_Mat1
                                })).append($('<option>',
                                {
                                    selected: true,
                                    value: data.rows[i].Medida_Mat_2,
                                    text: data.rows[i].M_Mat2
                                }));
                            }
                            else if (medida == "1")
                            {
                                $('#medidas').append($('<option>',
                                {
                                    value: "0",
                                    text: "Ninguno"
                                })).append($('<option>',
                                {
                                    selected: true,
                                    value: data.rows[i].Medida_Mat_1,
                                    text: data.rows[i].M_Mat1
                                })).append($('<option>',
                                {
                                    value: data.rows[i].Medida_Mat_2,
                                    text: data.rows[i].M_Mat2
                                }));
                            }
                            else if (medida == "0")
                            {
                                $('#medidas').append($('<option>',
                                {
                                    selected: true,
                                    value: "0",
                                    text: "Ninguno"
                                })).append($('<option>',
                                {
                                    value: data.rows[i].Medida_Mat_1,
                                    text: data.rows[i].M_Mat1
                                })).append($('<option>',
                                {
                                    value: data.rows[i].Medida_Mat_2,
                                    text: data.rows[i].M_Mat2
                                }));
                            }
                        }
                        else if(data.rows[i].Medida_Mat_1== "1")
                        {
                            if (medida == "1")
                            {
                                $('#medidas').append($('<option>',
                                {
                                    value: "0",
                                    text: "Ninguno"
                                })).append($('<option>',
                                {
                                    selected: true,
                                    value: data.rows[i].Medida_Mat_1,
                                    text: data.rows[i].M_Mat1
                                }));
                            }
                            else if (medida == "0")
                            {
                                $('#medidas').append($('<option>',
                                {
                                    selected: true,
                                    value: "0",
                                    text: "Ninguno"
                                })).append($('<option>',
                                {
                                    value: data.rows[i].Medida_Mat_1,
                                    text: data.rows[i].M_Mat1
                                }));
                            }
                        }
                        else
                        {
                            $('#medidas').append($('<option>',
                            {
                                selected: true,
                                value: "0",
                                text: "Ninguno"
                            }));
                        }
                    }
                    $.tabla_medidas();
                }
                if(data.validacion=="false")
                {
                    $("#dialogoerror").html('<span style="color:red;">El material o las medidas no coinsiden<br/>Error: 1</span>');
                    $( "#dialogoerror" ).modal("open");
                }
            },"json"
        );
        return false;
    }
});