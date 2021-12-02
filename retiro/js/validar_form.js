window.onload = function () {
    Cargar();    
}
function validar_w(){
     if($("#btcwallet").val() == ""){
       
        $("#btcwallet").focus();       // Esta función coloca el foco de escritura del usuario en el campo  directamente.

          $('#wallet_msg').html('Escriba una direccion de BTC');
        return false;
    }else{
            $('#wallet_msg').html('');
           return true;
    }

}


function monto_validar(){
    if($("#usdmonto").val() == ""){
       // alert("El campo usdmonto no puede estar vacío.");
        $("#usdmonto").focus();
        $('#monto_msg').html('Escriba una cantidad para retirar');

        return false;
    }else{
            $('#monto_msg').html('');
           
    }


    if($("#usdmonto").val() < 25){
       // alert("el monto minimo de retiro es $25.");
        $("#usdmonto").focus();
        $('#monto_msg').html('El monto minimo de retiro es de $25');
        return false;
    }else{
            $('#monto_msg').html('');
    }


}


function validaForm(){
    // Campos de texto
    if($("#btcwallet").val() == ""){
        alert("El campo Billetera de btc  no puede estar vacío.");
        $("#btcwallet").focus();       // Esta función coloca el foco de escritura del usuario en el campo  directamente.
       alert('El campo Direccion esta vacio');
        return false;
    }
    if($("#usdmonto").val() == ""){
        alert("El campo usdmonto no puede estar vacío.");
        $("#usdmonto").focus();
       alert('El campo Cantidad esta vacio');

        return false;
    }


    if($("#usdmonto").val() < 25){
        alert("el monto minimo de retiro es $25.");
        $("#usdmonto").focus();
        return false;
    }

    // Checkbox
  /*  if(!$("#mayor").is(":checked")){
        alert("Debe confirmar que es mayor de 18 años.");
        return false;
    }*/

    return true; // Si todo está correcto
}

 $(document).on('click', '#js-enviar', function(e){
        e.preventDefault();
         var btcwallet = document.getElementById('btcwallet').value;
         var usdmonto = document.getElementById('usdmonto').value;
          var disp = document.getElementById('disp').value;
     //var btcwallet = $("#btcwwallet").val();
    // var usdmonto = $("#usdmonto").val();
        $.ajax({
                   url: "../retiro/php/solicitud_retiro.php",
            method: 'POST',
        
            //data: {btcwallet: btcwallet, usdmonto: usdmonto },
              data: "wallet_ret="+btcwallet+"&valor_ret="+usdmonto+"&disp="+disp,
            beforeSend: function(){
                $('#estado').css('display','block');
                $('#estado p').html('Guardando datos...');
            },
            success: function(r){
                    
                    $('#estado').html(r);
                     Cargar();
            
            }
        });
    });


/*
function Registrar()
{
    var btcwallet = $("#btcwwallet").val();
    var usdmonto = $("#usdmonto").val();
    
    $("#respuesta").html("<img src="loader.gif" /> Por favor espera un momento");
    $.ajax({
        type: "POST",
        dataType: html,
          url: "../retiro/php/solicitud_retiro.php",
        data: "btcwallet="+btcwallet+"&usdmonto="+usdmonto,
        success: function(resp){
            $(#respuesta).html(resp);
            Limpiar();
            //Cargar();
            alert('funcionando');
        }
    });
}  
*/


function Cargar()
{
   //$(#datagrid).load('../retiro/php/historial_retiro.php');  

    $.ajax({
        type: "POST",
       
          url: "../retiro/php/historial_retiro.php",
        data:{},
        success: function(resp){
            $("#historial").html(resp);
            
            Limpiar();
        }
    });
}
 
function Limpiar()
{
    $("#btcwallet").val("");
    $("#usdmonto").val("");
    
}