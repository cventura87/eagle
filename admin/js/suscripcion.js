window.onload = function () {
    carga_suscript();    
}


  function confirmActive(suscript) {
       swal({
            title: "Esta seguro(a)?",
            text: "Esta a punto de activar un paquete!",
            type: "success",
            showCancelButton: true,
            confirmButtonColor: "#5bdd55",
            confirmButtonText: "Yes, Activalo !",
            cancelButtonText: "No, cancel please!",
            closeOnConfirm: false,
            closeOnCancel: false

        },  
         function(isConfirm){
           if (isConfirm) {
           $.ajax({
                url: "php/ajax_activar_suscripcion.php",
                type: "POST",
                data: {suscript:suscript},
                dataType: "html",
                success: function (data) {
                     carga_suscript();

                   swal("Done!",data,"success");
                }
            });
           // swal('su id: '+suscript);
          }else{
                 swal("Cancelled", "No se realizo ninguna accion :)", "error");
          } 
       })
    }

    
function cargar_suscripcion(){//no active
  // $("#usuarios").load("php/ajax_lista_usuarios.php"); 
    
    $.ajax({
        type: "POST",
       
          url: "php/ajax_lista_paquetes.php",
        data:{},
        success: function(data){
            $("#paquetes").html(data);
        }
    });
}





function carga_suscript(){  //en funcion

$( document ).ready(function() {
var table = $('#datatable_example').dataTable({
"bProcessing": true,
"sAjaxSource": "php/ajax_json_paquetes.php",//php/ajax_json_usuarios.php
"bPaginate":true,
"sPaginationType":"full_numbers",
"iDisplayLength": 5,
// los nombres de las columnas tal como estan el bd
"aoColumns": [
{ mData: 'paquete' },
{ mData: 'usuario' },
{ mData: 'fecha' },
{ mData: 'valor' },
{ mData: 'status_pack' } ,
{ mData: 'progreso' },
{ mData: 'detalles' },
{ mData: 'activar' }
]
});
});




}