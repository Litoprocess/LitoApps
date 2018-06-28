$(document).ready(function()
{
    $("#listado_mat").hide();
    $("#listado_mat_admin").hide();
    $("#espacioenblanco").show();
    $("#li-nuevo").show();

    $.eliminar = function(idMat, nommat)
    {
        var idMat = idMat;
        var nommat = nommat;
        $("#dialogoeliminar").html("<p>&#191;Estas seguro que deseas eliminar el material?</p><p>" + idMat + "-" +nommat + "</p>");
        $("#dialogoeliminar").dialog(
        {
            autoOpen:false,
            resizable: false,
            height:200,
            width:310,
            modal: true,
            show: "blind",
            hide: "puff",
            buttons:
            {  
                "SI":function()
                {
                    var vidMat="idMat="+idMat;
                    $.post("modelo/delete.php",vidMat,
                        function(data)
                        {
                            if (data.validacion=="true")
                            {
                                $("#dialogoeliminar").dialog("close");
                                window.location.href = "listado_mat_admin.php";
                            }
                            if (data.validacion=="false")
                            {
                                $("#dialogoeliminar").dialog("close");
                                $("#dialogoerror").html('<span style="color:red;">Error al intentar borrar el Material ' + nommat + ' puede que este en uso</span>');
                                $("#dialogoerror").dialog('open');
                            }
                        },"json"
                    );
                    return false;
                    $("#dialogoeliminar").dialog("close");
                },
                "No":function()
                {
                    $("#dialogoeliminar").dialog("close");
                }
            }
        });
        $("#dialogoeliminar").dialog("open");
    }
    
    $.editar = function(idMat, nommat)
    {
        var idMat = idMat;
        var nommat = nommat;
        $("#dialogoeditar").html("<p>&#191;Estas seguro que deseas editar el material?</p><p>" + idMat + "-" +nommat + "</p>");
        $("#dialogoeditar").dialog(
        {
            autoOpen:false,
            resizable: false,
            height:200,
            width:310,
            modal: true,
            show: "blind",
            hide: "puff",
            buttons:
            {  
                "SI":function()
                {
                    window.location.href = "editar.php?id_MAT="+idMat;
                },
                "No":function()
                {
                    $("#dialogoeditar").dialog("close");
                }
            }
        });
        $("#dialogoeditar").dialog("open");
    }
});