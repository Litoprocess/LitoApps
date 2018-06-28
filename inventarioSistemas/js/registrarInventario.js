$(document).ready(function(){

if(window.location.pathname == '/litoapps/inventarioSistemas/inventario.php')
{
  $("#inventario").addClass("active");
  $("#detalle").removeClass("active");
}     

$(".button-collapse").sideNav();

    $("#usuario").focus();

    $('select').material_select();


	$("#frmRegistroInventario").submit(function(){
		var cadena = $(this).serialize();
		console.log(cadena);

		$.post('php/registro.php', cadena,
			function(data){
				if (data.validation=="true") {

					Materialize.toast('Se registro', 1000,'green darken-4');
					limpiar();
					collapseAll();
					$('.collapsible').collapsible('open', 0);

				}else{				
					Materialize.toast('Algo Salio Mal', 1000,'red darken-4');
				}
			},'json');
		return false;

});

$("#cancelar").click(function(){
    var txt;
    var r = confirm("¿Estas seguro que deseas limpiar los datos?");
    if (r == true) {
        limpiar();
        collapseAll();
		$('.collapsible').collapsible('open', 0);
    }

});

function limpiar()
{
	$('input').val("");
    $('select option').prop('selected', function() {
        return this.defaultSelected;
    });	
    $('textarea').val("");
}

function collapseAll(){
  $(".collapsible-header").removeClass(function(){
    return "active";
  });
  $(".collapsible").collapsible({accordion: true});
  $(".collapsible").collapsible({accordion: false});
}


});


/*$.ajax({
    type: 'POST',
    url: 'php/registro.php',
    data: cadena,
    dataType: 'json',
    cache: false,
    success: function(result) {
        //$('#content1').html(result[0]);
        alert('correcto');
    },
});*/