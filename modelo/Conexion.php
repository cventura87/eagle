<?php 
//include'../config.php';

if (!defined('CONTROLADOR'))
    exit;

 class Conexion extends PDO { 
   private $tipo_de_base = 'mysql';
   private $host = 'localhost';
   private $nombre_de_base = 'eagle';
   private $usuario = 'root';
   private $contrasena = ''; 


//------------------------------------------------------------------------
   public function __construct() {
      //Sobreescribo el método constructor de la clase PDO.

     


      try{
         parent::__construct("{$this->tipo_de_base}:dbname={$this->nombre_de_base};host={$this->host};charset=utf8", $this->usuario, $this->contrasena);

      }catch(PDOException $e){

  header('Content-Type: text/html; charset=UTF-8'); 
         $msg_conexion =  'Ha surgido un error y no se puede conectar a la base de datos, Detalle: ' .$e->getMessage();
         $megs =  str_replace("conexi�n", "conexión", "Message Ha surgido un error y no se puede conectar a la base de datos, Detalle: SQLSTATE[HY000] [2002] No se puede establecer una conexi�n ya que el equipo de destino deneg� expresamente dicha conexi�n.");

         $megs2 =str_replace("deneg�", "denegó", "Message Message Ha surgido un error y no se puede conectar a la base de datos, Detalle: SQLSTATE[HY000] [2002] No se puede establecer una conexión ya que el equipo de destino deneg� expresamente dicha conexión. ");
         echo alert_msg($megs2 , 'rojo');


       

         exit;

      }
   

}
 //------------------------------------------------------


 } 
?>