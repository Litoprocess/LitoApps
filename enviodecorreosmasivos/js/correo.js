$(document).ready(function(){

	$.ajax({
		type: "POST",
		url: 'php/obtUsuarios.php', 
		//data: {maquina:maquina},
		success: function(result){
		    if(result.data.length > 0)
		    {
		      	for(var i = 0; i < result.data.length; i++)
		      	{
					$.ajax({
						type: "POST",
						url: 'php/enviar_correo/correo.php',
						data: 
						{
							Nombre: result.data[i].Nombre,
							Login: result.data[i].Login,
							Contrasena: result.data[i].Contrasena,
							Correo: result.data[i].Correo
						},
						success: function(data){
						}
					});	      				
		      	}
		    }
		}
	});	
	
});