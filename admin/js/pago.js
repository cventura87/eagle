 $(document).on('click', '#js-enviar', function(e){
    	e.preventDefault();
    	
    
    	$.ajax({
    		url: 'pago_day/diario_pay.php', // Es importante que la ruta sea correcta si no, no se va a ejecutar
    		method: 'POST',
    		data: {},
    		beforeSend: function(){
    			$('#estado').css('display','block');
    			$('#estado p').html('Guardando datos...');
    		},
    		success: function(r){
    			
    				$('#estado').html(r);
    		
    		}
    	});
    });