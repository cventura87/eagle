<?  
    require_once ( "cryptobox.class.php" );

    / **** VARIABLES DE CONFIGURACIÓN **** / 
    
    $ userID          =  "" ;               // coloque su ID de usuario registrado o md5 (ID de usuario) aquí (usuario1, usuario7, uo43DC, etc.).
                                        // si el ID de usuario está vacío, se generará automáticamente el ID de usuario y se guardará en las cookies
    $ userFormat      =  "COOKIE" ;         // guardar ID de usuario en cookies (o puede usar IPADDRESS, SESSION)
    $ orderID         =  "post1" ;          // si configuras manualmente el ID de usuario, necesitas  
                                        // actualizar orderID para usuarios que ya pagaron antes: post1, post2, post3  
    $ montoUSD       =  0.5 ;              // precio por publicación - 0.5 USD
    $ período          =  "NO EXPIRY" ;       // pago único por cada publicación de usuario nuevo, no vencimiento
    $ def _language    =  "en" ;             // Idioma predeterminado de la caja de pago
    $ def _payment     =  "dogecoin" ;       // Moneda predeterminada en la caja de pago

    // Lista de monedas que acepta para pagos
    // Por ejemplo, para aceptar pagos en bitcoins, los dogecoins usan - $ available_payments = array ('bitcoin', 'dogecoin'); 
    $ available _payments =  array ( 'bitcoin' , 'bitcoincash' , 'bitcoinsv' , 'litecoin' , 'dash' , 'dogecoin' , 'speedcoin' , 'reddcoin' , 'potcoin' , 
                        'feathercoin' , 'vertcoin' , 'peercoin' , 'monetaryunit' );
    
    
    // Ir a   https://gourl.io/info/memberarea/My_Account.html
    // Necesita crear un registro para cada moneda y obtener claves privadas / públicas
    // Coloque claves públicas / privadas para todas sus monedas disponibles desde $ available_payments
    
    $ todas _keys =  matriz (  
        "Bitcoin"   = >  array ( "public_key"  = >  "-su clave pública para Bitcoin caja-" ,   "private_key"  = >  "clave -private para Bitcoin caja-" ),
        "dogecoin"  = >  array ( "public_key"  = >  "-su clave pública para dogecoin caja-" , "private_key"  = >  "clave para -private dogecoin caja-" )
        // etc.
    ); 
            
    / ******************************** /


    // Vuelva a probar - que todas las claves para $ available_payments agregadas en $ all_keys 
    if ( ! in_array ( $ def _payment, $ available _payments)) $ available _payments [ ]  =  $ def _payment;  
    foreach ( $ disponibles _pagos como  $ v )
    {
        if ( ! isset ( $ all _keys [ $ v ] [ "public_key" ] ) | |  ! isset ( $ all _keys [ $ v ] [ "private_key" ] )) 
            die ( "Por favor, agregue sus claves públicas / privadas para '$ v' en la variable \ $ all_keys" );
        elseif ( ! strpos ( $ all _keys [ $ v ] [ "public_key" ] , "PUB" ))   die ( "Clave pública no válida para '$ v' en la variable \ $ all_keys" );
        elseif ( ! strpos ( $ all _keys [ $ v ] [ "private_key" ] , "PRV" )) die ( "Clave privada no válida para '$ v' en la variable \ $ all_keys" );
        elseif ( strpos ( CRYPTOBOX_PRIVATE_KEYS , $ all _keys [ $ v ] [ "private_key" ] ) = = =  falso ) 
            die ( "Por favor, agregue su clave privada para '$ v' en la variable \ $ cryptobox_private_keys, archivo cryptobox.config.php." );
    }
        
    // Opcional: lista de selección de idioma para el cuadro de pago (código html)
    $ lenguas _list =  display_language_box ( $ def _language);
    
    // Opcional - Lista de selección de monedas (código html)
    $ monedas _list =  display_currency_box ( $ disponibles _payments, $ def _payment, $ def _language, 42 , "margen: 5px 0 0 20px" );
    $ coinName  =  CRYPTOBOX_SELCOIN ; // moneda seleccionada actualmente por el usuario
    
    // Claves públicas / privadas de moneda actual
    $ public _key   =  $ all _keys [ $ coinName ] [ "public_key" ] ;
    $ clave_privada =  $ todas las_claves [ $ nombre_coneda ] [ "clave_privada" ] ;
    
    
    / ** CAJA DE PAGO ** /
    $ opciones  =  matriz (
            "public_key"   = >  $ public _key,    // su clave pública de gourl.io
            "private_key"  = >  $ private _key,   // tu clave privada de gourl.io
            "webdev_key"   = >  "" ,             // opcional, clave de afiliado gourl
            "orderID"      = >  $ orderID ,       // id del pedido
            "userID"       = >  $ userID ,        // identificador único para cada usuario
            "userFormat"   = >  $ userFormat ,    // guardar el ID de usuario en COOKIE, IPADDRESS o SESSION
            "monto"       = >  0 ,              // publicar el precio en monedas O en USD a continuación
            "amountUSD"    = >  $ amountUSD ,     // usamos el precio de publicación en USD
            "period"       = >  $ period ,        // período de pago válido
            "language"     = >  $ def _language   // texto en EN - inglés, FR - francés, etc.
    );

    // Inicializar la clase de pago
    $ box  =  nuevo  Cryptobox ( $ opciones );
    
    // nombre de la moneda
    $ coinName  =  $ caja - > coin_name (); 
    
    
    // Formulario de datos
    // --------------------------
    $ ftitle   = ( isset ( $ _POST [ "ftitle" ] ))? $ _POST [ "ftitle" ] : "" ;
    $ ftext    = ( isset ( $ _POST [ "ftext" ] ))? $ _POST [ "ftext" ] : "" ;
    
    $ error  =  "" ;
    $ exitoso  =  falso ;
    
    if ( isset ( $ _POST ) & &  isset ( $ _POST [ "ftitle" ] ))
    {
        if ( ! $ ftitle )            $ error . =  "<li> Introduzca el título </li>" ;
        if ( ! $ ftext )             $ error . =  "<li> Por favor ingrese el texto </li>" ;
        if ( ! $ box - > is_paid ())    $ error . =  "<li>" . $ coinName . "s aún no se han recibido </li>" ;
        if ( $ error )              $ error   =  "<br> <ul style = 'color: # eb4847'> $ error </ul>" ;
        
        if ( $ caja - > is_paid () & &  ! $ error )
        {
            // Pago exitoso de criptomonedas recibido

            // Tu código aquí - 
            // guardar texto en la base de datos / publicar la publicación del usuario en su sitio web ...
            // ...
            // ...
                    
            // Establecer el estado del pago en Procesado
            $ exitoso  =  verdadero ;
            $ caja - > set_status_processed ();
            
            // Opcional, cryptobox_reset () eliminará las cookies / sesiones con ID de usuario y
            // Se mostrará un nuevo cryptobox con un nuevo monto de pago después de recargar la página.
            // Cryptobox reconocerá al usuario como uno nuevo con un nuevo ID de usuario generado
            // Si configuras manualmente el ID de usuario, también debes cambiar el ID de pedido
            $ caja - > cryptobox_reset ();
        }
    }
    

    
    // ...
    // También puede usar la función IPN cryptobox_new_payment ($ paymentID = 0, $ payment_details = array (), $ box_status = "") 
    // para enviar correo electrónico de confirmación, actualizar la base de datos, actualizar la membresía del usuario, etc.
    // Necesita modificar el archivo - cryptobox.newpayment.php, lea más - https://gourl.io/api-php.html#ipn
    // ...


    
?>

<! DOCTYPE html>
<html> <cabeza>
<title> Criptomoneda de pago por publicación (pagos en varias criptomonedas) Ejemplo de pago </title>
<meta http-equiv = 'cache-control' content = 'no-cache'>
<meta http-equiv = 'Expires' content = '- 1'>
<meta name = 'robots' content = 'all'>
<script src = 'cryptobox.min.js' type = 'text / javascript'> </script>
</head>
<body style = 'familia de fuentes: Arial, Helvetica, sans-serif; tamaño de fuente: 14px; color: # 666; margen: 0'>
<div align = 'centro'>
<h1> Ejemplo: publicaciones pagas </h1>
Puede vender derecho a publicar nuevas publicaciones en su sitio web
<br> <br> <br>
<img alt = 'Factura' border = '0' src = 'https: //gourl.io/images/example6.png'>
<a name='i'> </a>

<? php if ( $ exitoso ): ?> 

    <div align = 'centro'>
        <img alt = 'Nuevo mensaje' border = '0' src = 'https: //gourl.io/images/example7.png'>
        <div style = 'margin: 40px; font-size: 24px; color: # 339e2e; font-weight: bold'>
            ¡Su texto se ha publicado con éxito en nuestro sitio web! </div>
        <a href='pay-per-post-multi.php'> Publicar nuevas publicaciones & # 187; </a>
    </div>  
    
<? más : ?> 

    <form name = 'form1' style = 'font-size: 14px; color: # 444' action = "pay-per-post-multi.php # i" method = "post">
        <table cellspacing = '20 '>
            <tr> <td colspan = '2'> <img alt = 'Nuevo mensaje' border = '0' src = 'https: //gourl.io/images/example7.png'> <? = $ error ?> </td> </tr>
  
            <tr> <td width = '100'> Título: </td> <td width = '300'> <input style = 'padding: 6px; font-size: 18px;' tamaño = '40 ' 
                type = "text" name = "ftitle" value = " <? = $ ftitle ?> "> </td> </tr>
  
            <tr> <td> Texto: </td> <td> <textarea style = 'padding: 6px; font-size: 18px;' filas = "4" cols = "40" 
                name = "ftext"> <? = $ ftext ?> </textarea> </td> </tr>
  
            <? php if ( ! $ box - > is_paid ()): ?> 
                <tr> <td colspan = '2'> * Debe pagar <? = $ coinName ?> s (~ <? = $ amountUSD ?> US $) para publicación 
    
                        su texto en nuestro sitio web </td> </tr>
            <? endif ; ?> 
        </table>
    </form>

    <div style = 'width: 600px; background-color: # f9f9f9; padding-top: 10px'>
            <div style = 'tamaño de fuente: 12px; <? if ( $ box - > is_paid ()) echo "margin: 5px 0 5px 390px;" ; demás   
                echo  "margen: 5px 0 5px 390px; posición: absoluta;"  ?> '> Idioma: & # 160; <? = $ idiomas _list ?> </div>
 
            <? if ( ! $ box - > is_paid ()) echo "<div align = 'left'>" . $ monedas _list. "</div>" ;  ?>  
            <? = $ caja - > display_cryptobox () ?> 
    </div>
    
    <br> <br> <br>
    <button onclick = 'document.form1.submit ()' style = 'padding: 6px 20px; font-size: 18px;'> Publica tu artículo / comentario </button>
    
<? endif ; ?>     

</div> <br> <br> <br> <br> <br> <br>
</body>
</html>