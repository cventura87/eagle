<?php 

if (class_exists('Conexion')) {
	// code...
}else{

	include'Conexion.php';
}

/*GENERANDO VARIABLES PRIVADAS*/
class Reporte{
private $id_reporte;
private $code_usuario;
private $nombre_plan;
private $valor_diario;
private $estado;
private $tipo;
private $fecha_diario;


const TABLA = "reporte";

/*GENERANDO function __construc*/
public function __construct($id_reporte=null, $code_usuario=null, $nombre_plan=null, $valor_diario=null, $estado=null, $tipo=null, $fecha_diario=null){
$this->id_reporte = $id_reporte;
$this->code_usuario = $code_usuario;
$this->nombre_plan = $nombre_plan;
$this->valor_diario = $valor_diario;
$this->estado = $estado;
$this->tipo = $tipo;
$this->fecha_diario = $fecha_diario;
}

/*GENERANDO LOS METODOS GET*/

public function getId_reporte() {
return $this->id_reporte;
}
public function getCode_usuario() {
return $this->code_usuario;
}
public function getNombre_plan() {
return $this->nombre_plan;
}
public function getValor_diario() {
return $this->valor_diario;
}
public function getEstado() {
return $this->estado;
}
public function getTipo() {
return $this->tipo;
}
public function getFecha_diario() {
return $this->fecha_diario;
}
/*GENERANDO LOS METODOS SET*/

public function setCode_usuario($code_usuario){
$this->code_usuario = $code_usuario;
}
public function setNombre_plan($nombre_plan){
$this->nombre_plan = $nombre_plan;
}
public function setValor_diario($valor_diario){
$this->valor_diario = $valor_diario;
}
public function setEstado($estado){
$this->estado = $estado;
}
public function setTipo($tipo){
$this->tipo = $tipo;
}
public function setFecha_diario($fecha_diario){
$this->fecha_diario = $fecha_diario;
}
/*CREANDO FUNCION GUARDAR*/

public function guardar() { 

	$conexion = new Conexion();
 if ($this->id_reporte){
$consulta = $conexion->prepare("UPDATE " . self::TABLA . " SET code_usuario = :code_usuario, nombre_plan = :nombre_plan, valor_diario = :valor_diario, estado = :estado, tipo = :tipo, fecha_diario = :fecha_diario WHERE id_reporte = :id_reporte");
$consulta->bindParam(":id_reporte", $this->id_reporte);
$consulta->bindParam(":code_usuario", $this->code_usuario);
$consulta->bindParam(":nombre_plan", $this->nombre_plan);
$consulta->bindParam(":valor_diario", $this->valor_diario);
$consulta->bindParam(":estado", $this->estado);
$consulta->bindParam(":tipo", $this->tipo);
$consulta->bindParam(":fecha_diario", $this->fecha_diario);
$save=$consulta->execute();
} else{ 
$consulta = $conexion->prepare("INSERT INTO " . self::TABLA . " (code_usuario, nombre_plan, valor_diario, estado, tipo, fecha_diario) VALUES(:code_usuario, :nombre_plan, :valor_diario, :estado, :tipo, :fecha_diario)");
$consulta->bindParam(":code_usuario", $this->code_usuario);
$consulta->bindParam(":nombre_plan", $this->nombre_plan);
$consulta->bindParam(":valor_diario", $this->valor_diario);
$consulta->bindParam(":estado", $this->estado);
$consulta->bindParam(":tipo", $this->tipo);
$consulta->bindParam(":fecha_diario", $this->fecha_diario);
$save=$consulta->execute();
 $this->id_reporte = $conexion->lastInsertId(); 
} 
$conexion = null;
if ($save){   
return 1; 
 }else{   
return $consulta->errorcode()."/".$consulta->errorinfo()[2];  
  } 
 

}
public static function eliminar(){  

	$conexion = new Conexion();
$consulta = $conexion->prepare("DELETE FROM " . self::TABLA . " WHERE id_reporte = :id_reporte");
			$consulta->bindParam(":id_reporte", $this->id_reporte);
			$consulta->execute();
			$conexion = null;
}

public static function buscarPorId($id){
    	$conexion = new Conexion(); 
    	$consulta = $conexion->prepare("SELECT id_reporte, code_usuario, nombre_plan, valor_diario, estado, tipo, fecha_diario FROM " . self::TABLA . " WHERE id_reporte = :id");
    			$consulta->bindParam(":id", $id); 
    			$consulta->execute();
    			$registro = $consulta->fetch(); 
    			$conexion = null; 
    			if ($registro) {
    				return new self($registro["id_reporte"], $registro["code_usuario"], $registro["nombre_plan"], $registro["valor_diario"], $registro["estado"], $registro["tipo"], $registro["fecha_diario"]);
    				} else {
    					return false;
    					}
    				}

public static function recuperarTodos(){
    			$conexion = new Conexion();
    			$consulta = $conexion->prepare("SELECT id_reporte, code_usuario, nombre_plan, valor_diario, estado, tipo, fecha_diario FROM " . self::TABLA . " ORDER BY id_reporte desc");
    					$consulta->execute();
    					$registros = $consulta->fetchAll();
    					$conexion = null;
    					return $registros;
    					




    				}



    				public static function reporte_user($code){
    			$conexion = new Conexion();
    			$consulta = $conexion->prepare("SELECT id_reporte, code_usuario, nombre_plan, valor_diario, estado, tipo, fecha_diario FROM " . self::TABLA . " WHERE code_usuario = :code ORDER BY id_reporte DESC");
    			$consulta->bindParam(":code", $code); 
    					$consulta->execute();
    					$registros = $consulta->fetchAll();
    					$conexion = null;
    					//var_dump($registros);
    					return $registros;
    					



    				}

    				/*Incluye todos los pagos , diarios y de referidos*/

    					public static function total_pagado($code){
    			$conexion = new Conexion();
    			$consulta = $conexion->prepare("SELECT SUM(valor_diario) AS total FROM " . self::TABLA . " WHERE code_usuario = :code");
    			$consulta->bindParam(":code", $code); 
    					$consulta->execute();
    					$registros = $consulta->fetch();
    					$conexion = null;
    					return $registros['total'];
    					



    				}


    						/*Incluye solo los pagos referido */

    					public static function total_referido($code){
    			$conexion = new Conexion();
    			$tipo = 2;

    			
    			$consulta = $conexion->prepare("SELECT SUM(valor_diario) AS total FROM " . self::TABLA . " WHERE code_usuario = :code and tipo = :tipo");
    			$consulta->bindParam(":code", $code); 
    				$consulta->bindParam(":tipo", $tipo); 
    					$consulta->execute();
    					$registros = $consulta->fetch();
    					$conexion = null;



    					if(empty($registros['total']) or ($registros === false)){
    						 return '0.00';
                 	
    					}else{

             
    					return $registros['total'];
    					}
    					
    					



    				}

    				





    							/*Incluye solo los pagos diario*/

    					public static function total_diario($code){
    			$conexion = new Conexion();
    			$tipo = 1;
    			$consulta = $conexion->prepare("SELECT SUM(valor_diario) AS total FROM " . self::TABLA . " WHERE code_usuario = :code and tipo = :tipo");
    			$consulta->bindParam(":code", $code); 
    				$consulta->bindParam(":tipo", $tipo); 
    					$consulta->execute();
    					$registros = $consulta->fetch();
    					$conexion = null;
    					if($registros['total']>0){

               return $registros['total'];
    					}else{

    						return '0.00';
    					}
    					
    					



    				}





    				
}?>