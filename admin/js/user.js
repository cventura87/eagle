window.onload = function () {
    carga2();    
   // us();   
}



  function confirmDelete(user) {
        swal({
            title: "Esta seguro(a)?",
            text: "Ya no podra recuperar este archivo!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, Eliminalo !",
            cancelButtonText: "No, cancel please!",
            closeOnConfirm: false,
            closeOnCancel: false

        },  
         function(isConfirm){
           if (isConfirm) {
           $.ajax({
                url: "php/ajax_delete_user.php",
                type: "POST",
                data: {user:user},
                dataType: "html",
                success: function (data) {
                     carga2();

                   swal("Done!",data,"success");
                }
            });
           // swal('su id: '+user);
          }else{
                 swal("Cancelled", "El archivo esta a salvo :)", "error");
          } 
       })
    }

    
function cargar(){
  // $("#usuarios").load("php/ajax_lista_usuarios.php"); 
    
    $.ajax({
        type: "POST",
       
          url: "php/ajax_lista_usuarios.php",
        data:{},
        success: function(data){

            $("#usuarios").html(data);
        }
    });
}
function us(){
  // $("#usuarios").load("php/ajax_lista_usuarios.php"); 
    
    $.ajax({
        type: "POST",
       
          url: "php/us_ajax.php",
        data:{},
        success: function(data){

            $("#us").html(data);
        }
    });
}

function carga2(){

$( document ).ready(function() {
var table = $('#datatable_example').dataTable({
"bProcessing": true,
"sAjaxSource": "php/us_ajax.php",//php/ajax_json_usuarios.php
"bPaginate":true,
"sPaginationType":"full_numbers",
"iDisplayLength": 5,
// los nombres de las columnas tal como estan el bd
"aoColumns": [
{ mData: 'id_usuario' } ,
{ mData: 'usuario' } ,
{ mData: 'code' },
{ mData: 'email' },
{ mData: 'patrocinador' },
{ mData: 'nombre' },
{ mData: 'delete' },
{ mData: 'editar' }
]
});
});




}