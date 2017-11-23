$(document).ready(function() {

    $("#login").submit(function()
    {

        var datos=$(this).serialize();
        console.log(datos);
        $.post("php/check-login.php",datos,
            function(data){

                if(data.validacion=="true"){

                    if(data.Estatus== 0 ){
                        Materialize.toast('Usuario inactivo', 1200,'purple darken-4',function(){
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
    });
});