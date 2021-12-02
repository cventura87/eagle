<?php
/**
 *  ... Please MODIFY this file ...
 *
 *
 *  YOUR MYSQL DATABASE DETAILS
 *
 */
/*
 define("DB_HOST", 	"localhost");				// hostname
 define("DB_USER", 	"root");		// database username
 define("DB_PASSWORD", 	"");		// database password
 define("DB_NAME", 	"eagle");	// database name*/




/**
 *  ARRAY OF ALL YOUR CRYPTOBOX PRIVATE KEYS
 *  Place values from your gourl.io signup page
 *  array("your_privatekey_for_box1", "your_privatekey_for_box2 (otional)", "etc...");
 */

 $cryptobox_private_keys = array(      
       "public_key"  => "60834AAokjfeBitcoin77BTCPUBMwJ2zhi44JPhSWTRUOHElBX",
            "private_key" => "60834AAokjfeBitcoin77BTCPRVF5kS5oderzcb92ncOY5RBM8",
           
            "userFormat"  => "COOKIE",  // SESSION, IPADDRESS
            "amount"      => 0,
            "amountUSD"   => 0,
            "period"      => "",    // 2 HOUR, 1 DAY, 1 MONTH, NOEXPIRY, etc..
            "iframeID"    => "",    // optional
            "language"    => "EN"
);




 define("CRYPTOBOX_PRIVATE_KEYS", implode("^", $cryptobox_private_keys));
 unset($cryptobox_private_keys);
echo '------------------------------------------------<br>';
 var_dump(CRYPTOBOX_PRIVATE_KEYS);
         
?>
