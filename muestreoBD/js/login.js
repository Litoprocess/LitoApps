$(document).ready(function(){
 
//Materialize.updateTextFields();
//FOCUS EN EL INPUT DE Usuario
$("#telefono").focus();

//Boton de SUBMIT Inicio de Sesion    
$( "#frm-login" ).submit(function( event ) {
        var datos=$(this).serialize();
        $.post("php/login.php",datos,
            function(data){

                if(data.validacion=="true"){

                    if(data.estatus== 0 ){
                        Materialize.toast('Usuario inactivo', 1200,'red darken-4',function(){
                        $( "#usuario" ).val("");
                        $( "#password" ).val("");
                        $( "#usuario" ).focus();                        
                      })

                    }else{

                        window.location="index.php";
                    }

                }
                else{

                        Materialize.toast('Datos incorrectos', 1200,'red darken-4',function(){
                        $( "#usuario" ).val("");
                        $( "#password" ).val("");
                        $( "#usuario" ).focus();
                      })
                }
            },'json');
        
        return false;
//  alert( "Handler for .submit() called." );
//  event.preventDefault();
});

});