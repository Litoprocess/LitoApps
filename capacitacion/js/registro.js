$(document).ready(function(){
if(window.location.pathname == '/litoapps/capacitacion/registro.php')
{
  $("#registro").addClass("active");
  $("#resultado").removeClass("active");
} 

$('.button-collapse').sideNav(); 
	//$("#mes").material_select();
	var participantes, duracion, horasHombre, costoPP, costoTotal, departamento, curso, mes;	
	obtMesActual();

	$("select[id=departamento]").change(function(){

		if( ($("select[id=departamento]").val()) == 'Otro' )
		{
			//$("select[id=departamento]").attr('disabled', 'disabled');
			$("#otro").show();
			$("#otroDepto").focus();

		} else {

			$("#otro").hide();
		}

	});

$("#participantes").keyup(function()
{
  participantes = $("#participantes").val();
        if(participantes != ""){
         horasHombre = parseInt(participantes) * parseInt(duracion);
        $("#horasHombre").val(horasHombre).siblings().addClass('active');                  
      }   
});

$("#duracion").keyup(function()
{
    duracion = $("#duracion").val();
        if(duracion != ""){
        horasHombre = parseInt(duracion) * parseInt(participantes);
        $("#horasHombre").val(horasHombre).siblings().addClass('active');         
       }
});


$("#costoPP").keyup(function()
{
    costoPP = $("#costoPP").val();
        if(participantes != ""){
        costoTotal = parseInt(costoPP) * parseInt(participantes);
        $("#costoTotal").val("$" + currency(costoTotal)).siblings().addClass('active');         
       }
});

	$("#registrar").click(function(){

		if( ($("#participantes").val() == '') || ($("#duracion").val() == '') || ($("#costoPP").val() == '') ||
			($("select[id=departamento]").val() == '') || ($("select[id=mes]").val() == '') || 
			($("#curso").val() == '') ){
			Materialize.toast('Completa los campos', 1000,'red darken-4');
	} else {
		departamento = $("select[id=departamento]").val();
		otroDepto = $("#otroDepto").val();
		curso = $("#curso").val();
		mes = $("select[id=mes]").val();
		$.post('php/registro.php',
		{
			'departamento' : departamento,
			'otroDepto' : otroDepto,
			'curso' : curso,
			'mes' : mes,
			'participantes' : participantes,
			'duracion' : duracion,
			'horasHombre' : horasHombre,
			'costoPP' : costoPP,
			'costoTotal' : costoTotal
		},
		function(result){
			Materialize.toast('Se registro', 1000,'green darken-4');
			clean();
		},'json');			
	}

});

	$("#cancelar").click(function(){
		clean();

	});

	function clean(){
		$("select[id=departamento]").val("");
		$("select[id=mes]").val("");
		$("#curso").val("");
		$("#select[id=mes]").val("");
		$("#participantes").val("");
		$("#duracion").val("");
		$("#costoPP").val("");	
		$("#horasHombre").val("");
		$("#costoTotal").val("");	
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

function obtMesActual()
{
    var hoy = new Date();
    //var dd = hoy.getDate();
    var mm = hoy.getMonth()+1; //hoy es 0!
    //var yyyy = hoy.getFullYear();

    /*if(dd<10) {
        dd='0'+dd
    } 

    if(mm<10) {
        mm='0'+mm
    }*/ 
    //hoy = mm+'/'+dd+'/'+yyyy;
switch(mm) {
	case 1: 		
		$("select[id=mes]").find("option[value= '02) FEB']").prop("disabled",true);
		$("select[id=mes]").find("option[value= '03) MAR']").prop("disabled",true);
		$("select[id=mes]").find("option[value= '04) ABR']").prop("disabled",true);
		$("select[id=mes]").find("option[value= '05) MAY']").prop("disabled",true);
		$("select[id=mes]").find("option[value= '06) JUN']").prop("disabled",true);
		$("select[id=mes]").find("option[value= '07) JUL']").prop("disabled",true);
		$("select[id=mes]").find("option[value= '08) AGO']").prop("disabled",true);
		$("select[id=mes]").find("option[value= '09) SEP']").prop("disabled",true);
		$("select[id=mes]").find("option[value= '10) OCT']").prop("disabled",true);
		$("select[id=mes]").find("option[value= '11) NOV']").prop("disabled",true);	
		$("select[id=mes]").find("option[value= '12) DIC']").prop("disabled",true);
		break;	
    case 2:
		$("select[id=mes]").find("option[value= '01) ENE']").prop("disabled",true);
        break;
    case 3:
		$("select[id=mes]").find("option[value= '01) ENE']").prop("disabled",true);
		$("select[id=mes]").find("option[value= '02) FEB']").prop("disabled",true);
        break;
    case 4:
		$("select[id=mes]").find("option[value= '01) ENE']").prop("disabled",true);
		$("select[id=mes]").find("option[value= '02) FEB']").prop("disabled",true);
		$("select[id=mes]").find("option[value= '03) MAR']").prop("disabled",true); 
        break;
    case 5:
		$("select[id=mes]").find("option[value= '01) ENE']").prop("disabled",true);
		$("select[id=mes]").find("option[value= '02) FEB']").prop("disabled",true);
		$("select[id=mes]").find("option[value= '03) MAR']").prop("disabled",true);
		$("select[id=mes]").find("option[value= '04) ABR']").prop("disabled",true);
        break;
    case 6:
		$("select[id=mes]").find("option[value= '01) ENE']").prop("disabled",true);
		$("select[id=mes]").find("option[value= '02) FEB']").prop("disabled",true);
		$("select[id=mes]").find("option[value= '03) MAR']").prop("disabled",true);
		$("select[id=mes]").find("option[value= '04) ABR']").prop("disabled",true);
		$("select[id=mes]").find("option[value= '05) MAY']").prop("disabled",true);
        break;
    case 7:
		$("select[id=mes]").find("option[value= '01) ENE']").prop("disabled",true);
		$("select[id=mes]").find("option[value= '02) FEB']").prop("disabled",true);
		$("select[id=mes]").find("option[value= '03) MAR']").prop("disabled",true);
		$("select[id=mes]").find("option[value= '04) ABR']").prop("disabled",true);
		$("select[id=mes]").find("option[value= '05) MAY']").prop("disabled",true);
		$("select[id=mes]").find("option[value= '06) JUN']").prop("disabled",true);
        break;
    case 8:
		$("select[id=mes]").find("option[value= '01) ENE']").prop("disabled",true);
		$("select[id=mes]").find("option[value= '02) FEB']").prop("disabled",true);
		$("select[id=mes]").find("option[value= '03) MAR']").prop("disabled",true);
		$("select[id=mes]").find("option[value= '04) ABR']").prop("disabled",true);
		$("select[id=mes]").find("option[value= '05) MAY']").prop("disabled",true);
		$("select[id=mes]").find("option[value= '06) JUN']").prop("disabled",true);
		$("select[id=mes]").find("option[value= '07) JUL']").prop("disabled",true);
        break;
    case 9:
		$("select[id=mes]").find("option[value= '01) ENE']").prop("disabled",true);
		$("select[id=mes]").find("option[value= '02) FEB']").prop("disabled",true);
		$("select[id=mes]").find("option[value= '03) MAR']").prop("disabled",true);
		$("select[id=mes]").find("option[value= '04) ABR']").prop("disabled",true);
		$("select[id=mes]").find("option[value= '05) MAY']").prop("disabled",true);
		$("select[id=mes]").find("option[value= '06) JUN']").prop("disabled",true);
		$("select[id=mes]").find("option[value= '07) JUL']").prop("disabled",true);
		$("select[id=mes]").find("option[value= '08) AGO']").prop("disabled",true);
        break;
    case 10:
		$("select[id=mes]").find("option[value= '01) ENE']").prop("disabled",true);
		$("select[id=mes]").find("option[value= '02) FEB']").prop("disabled",true);
		$("select[id=mes]").find("option[value= '03) MAR']").prop("disabled",true);
		$("select[id=mes]").find("option[value= '04) ABR']").prop("disabled",true);
		$("select[id=mes]").find("option[value= '05) MAY']").prop("disabled",true);
		$("select[id=mes]").find("option[value= '06) JUN']").prop("disabled",true);
		$("select[id=mes]").find("option[value= '07) JUL']").prop("disabled",true);
		$("select[id=mes]").find("option[value= '08) AGO']").prop("disabled",true);
		$("select[id=mes]").find("option[value= '09) SEP']").prop("disabled",true);
        break;
    case 11:
		$("select[id=mes]").find("option[value= '01) ENE']").prop("disabled",true);
		$("select[id=mes]").find("option[value= '02) FEB']").prop("disabled",true);
		$("select[id=mes]").find("option[value= '03) MAR']").prop("disabled",true);
		$("select[id=mes]").find("option[value= '04) ABR']").prop("disabled",true);
		$("select[id=mes]").find("option[value= '05) MAY']").prop("disabled",true);
		$("select[id=mes]").find("option[value= '06) JUN']").prop("disabled",true);
		$("select[id=mes]").find("option[value= '07) JUL']").prop("disabled",true);
		$("select[id=mes]").find("option[value= '08) AGO']").prop("disabled",true);
		$("select[id=mes]").find("option[value= '09) SEP']").prop("disabled",true);
		$("select[id=mes]").find("option[value= '10) OCT']").prop("disabled",true);
        break;
    case 12:
		$("select[id=mes]").find("option[value= '01) ENE']").prop("disabled",true);
		$("select[id=mes]").find("option[value= '02) FEB']").prop("disabled",true);
		$("select[id=mes]").find("option[value= '03) MAR']").prop("disabled",true);
		$("select[id=mes]").find("option[value= '04) ABR']").prop("disabled",true);
		$("select[id=mes]").find("option[value= '05) MAY']").prop("disabled",true);
		$("select[id=mes]").find("option[value= '06) JUN']").prop("disabled",true);
		$("select[id=mes]").find("option[value= '07) JUL']").prop("disabled",true);
		$("select[id=mes]").find("option[value= '08) AGO']").prop("disabled",true);
		$("select[id=mes]").find("option[value= '09) SEP']").prop("disabled",true);
		$("select[id=mes]").find("option[value= '10) OCT']").prop("disabled",true);
		$("select[id=mes]").find("option[value= '11) NOV']").prop("disabled",true);
        break;                                        
    default:
}
}


});
