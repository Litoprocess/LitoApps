$(document).ready(function()
{
   $("#li-actualizar").show();
   
   $("#id_MAT").change(function()
    {
        var id_MAT=$("#id_MAT").val();
        window.location= "?id_MAT="+id_MAT;
    });
});