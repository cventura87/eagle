<?php 


    $total_diario =  Reporte::total_diario($code); 
    $total_pagos =  Reporte::total_pagado($code); 
    $total_referido =  Reporte::total_referido($code); 
    $total_retirado =  Retiro::total_retirado($pack_session); 

    define('T_DIARIO', $total_diario);
    define('T_REFERIDO', $total_referido);
 //-----------------------------------------------
    define('T_PAGADO', $total_pagos);//suma total de todo, referido + diario
    define('T_RETIRADO', $total_retirado); //suma total de dinero retirado referido + diario

	 unset($total_diario);
	 unset($total_referido);
//-------------------------------------------------------
     unset($total_pagos);
	 unset($total_retirado);



     $disponible = (T_PAGADO-T_RETIRADO);

 ?>
 