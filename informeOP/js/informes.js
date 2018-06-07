$(document).ready(function(){

if(window.location.pathname == '/litoapps/informeOP/informes.php')
{
  $("#informeProd").addClass("active");
} 

$('.button-collapse').sideNav();

	$("#preview").click(function(){
		var ops = $("#ops").val();
		window.open("//192.168.2.217:100/"+ops+"_Orden%20de%20produccion.pdf","_blank"); 
		//$("#div1").load('file:///Y:/Informes/OPs/L13279_Orden de produccion.htm'); 
		//window.location.href = '//192.168.2.217:100/L13279_Orden%20de%20produccion.htm'; 
		//$("#span1").html("file:///Y:/Informes/OPs/L13279_Orden de produccion.htm");
		//$("#div1").html("<a href="  + "file:///Y:/Informes/OPs/L13279_Orden%20de%20produccion.htm" + ">click</a>");
		//$.post('php/abrirfichero.php',);
    /*$.ajax
    (
    	{
        	url : 'file:///Y:/Informes/OPs/C00018_Orden de produccion',
			dataType: "text",
			success : function (data) 
			{
            	$(".text").html("<pre>"+data+"</pre>");
			}
		}
	);*/



//WriteFile ();


	});

/*function WriteFile () 
{

	var fh = fopen ( "c: // holamundo.htm", 3); // Abra el archivo para escribir 

	if (fh != -1 ) // Si el archivo se ha abierto exitosamente
	{ 
	    var str = "Algún texto va aquí ..."; 
	    fwrite (fh, str); // Escribe la cadena en un archivo
	    fclose (fh); // Cerrar el archivo 
	}

}*/

});