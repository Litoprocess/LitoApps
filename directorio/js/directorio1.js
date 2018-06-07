$(document).ready(function(){

$('#dirGeneral').DataTable(
  {           
      "searching": false,
      "scrollCollapse": true,
      "paging":         false,
      "bInfo": false,
      "responsive": true,
      "order": [],      
      "columnDefs": 
      [
      { "orderable": false, "targets": "_all" },
      //{"className": "dt-head-center", "targets": "_all"},      
      {"className": "dt-body-center", "targets": [0]}
      ],                    
    }); 
  var table = $('#tblNoAplica').DataTable();   	

$('#dirOpeyVen').DataTable(
  {           
      "searching": false,
      "scrollCollapse": true,
      "paging":         false,
      "bInfo": false,
      "responsive": true,
      "order": [],      
      "columnDefs": 
      [
      { "orderable": false, "targets": "_all" }
      ],                    
    }); 
  var table = $('#dirOpeyVen').DataTable(); 
  
$('#dirVentas').DataTable(
  {           
      "searching": false,
      "scrollCollapse": true,
      "paging":         false,
      "bInfo": false,
      "responsive": true,
      "order": [],      
      "columnDefs": 
      [
      { "orderable": false, "targets": "_all" }
      ],                    
    }); 
  var table = $('#dirVentas').DataTable(); 

$('#sistemas').DataTable(
  {           
      "searching": false,
      "scrollCollapse": true,
      "paging":         false,
      "bInfo": false,
      "responsive": true,
      "order": [],      
      "columnDefs": 
      [
      { "orderable": false, "targets": "_all" }
      ],                    
    }); 
  var table = $('#sistemas').DataTable(); 

$('#gerCalidad').DataTable(
  {           
      "searching": false,
      "scrollCollapse": true,
      "paging":         false,
      "bInfo": false,
      "responsive": true,
      "order": [],      
      "columnDefs": 
      [
      { "orderable": false, "targets": "_all" }
      ],                    
    }); 
  var table = $('#gerCalidad').DataTable(); 

$('#administracion').DataTable(
  {           
      "searching": false,
      "scrollCollapse": true,
      "paging":         false,
      "bInfo": false,
      "responsive": true,
      "order": [],      
      "columnDefs": 
      [
      { "orderable": false, "targets": "_all" }
      ],                    
    }); 
  var table = $('#administracion').DataTable(); 

  $('#gerSAM').DataTable(
  {           
      "searching": false,
      "scrollCollapse": true,
      "paging":         false,
      "bInfo": false,
      "responsive": true,
      "order": [],      
      "columnDefs": 
      [
      { "orderable": false, "targets": "_all" }
      ],                    
    }); 
  var table = $('#gerSAM').DataTable(); 

  $('#capHumano').DataTable(
  {           
      "searching": false,
      "scrollCollapse": true,
      "paging":         false,
      "bInfo": false,
      "responsive": true,
      "order": [],      
      "columnDefs": 
      [
      { "orderable": false, "targets": "_all" }
      ],                    
    }); 
  var table = $('#capHumano').DataTable();    

  $('#vigilancia').DataTable(
  {           
      "searching": false,
      "scrollCollapse": true,
      "paging":         false,
      "bInfo": false,
      "responsive": true,
      "order": [],      
      "columnDefs": 
      [
      { "orderable": false, "targets": "_all" }
      ],                    
    }); 
  var table = $('#vigilancia').DataTable(); 

  $('#salaJuntas').DataTable(
  {           
      "searching": false,
      "scrollCollapse": true,
      "paging":         false,
      "bInfo": false,
      "responsive": true,
      "order": [],      
      "columnDefs": 
      [
      { "orderable": false, "targets": "_all" }
      ],                    
    }); 
  var table = $('#salaJuntas').DataTable();   
  
  $('#gerOperaciones').DataTable(
  {           
      "searching": false,
      "scrollCollapse": true,
      "paging":         false,
      "bInfo": false,
      "responsive": true,
      "order": [],      
      "columnDefs": 
      [
      { "orderable": false, "targets": "_all" }
      ],                    
    }); 
  var table = $('#gerOperaciones').DataTable(); 

  $('#gerPlanta').DataTable(
  {           
      "searching": false,
      "scrollCollapse": true,
      "paging":         false,
      "bInfo": false,
      "responsive": true,
      "order": [],      
      "columnDefs": 
      [
      { "orderable": false, "targets": "_all" }
      ],                    
    }); 
  var table = $('#gerPlanta').DataTable(); 

  $('#inkKong').DataTable(
  {           
      "searching": false,
      "scrollCollapse": true,
      "paging":         false,
      "bInfo": false,
      "responsive": true,
      "order": [],      
      "columnDefs": 
      [
      { "orderable": false, "targets": "_all" }
      ],                    
    }); 
  var table = $('#inkKong').DataTable(); 

  $('#gerVentas').DataTable(
  {           
      "searching": false,
      "scrollCollapse": true,
      "paging":         false,
      "bInfo": false,
      "responsive": true,
      "order": [],      
      "columnDefs": 
      [
      { "orderable": false, "targets": "_all" }
      ],                    
    }); 
  var table = $('#gerVentas').DataTable();   

  $('#emergencias').DataTable(
  {           
      "searching": false,
      "scrollCollapse": true,
      "paging":         false,
      "bInfo": false,
      "responsive": true,
      "order": [],      
      "columnDefs": 
      [
      { "orderable": false, "targets": "_all" }
      ],                    
    }); 
  var table = $('#emergencias').DataTable(); 

});