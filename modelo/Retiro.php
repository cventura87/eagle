<?php 

if (class_exists('Conexion')) {
	// code...
}else{

	include'Conexion.php';
}

/*GENERANDO VARIABLES PRIVADAS*/
class Retiro{
private $id_retiro;
private $usuario_ret;
private $paquete_ret;
private $wallet_ret;
private $valor_ret;
private $status_ret;
private $fecha_ret;


const TABLA = "retiro";

/*GENERANDO function __construc*/
public function __construct($id_retiro=null, $usuario_ret=null, $paquete_ret=null, $wallet_ret=null, $valor_ret=null, $status_ret=null, $fecha_ret=null){
$this->id_retiro = $id_retiro;
$this->usuario_ret = $usuario_ret;
$this->paquete_ret = $paquete_ret;
$this->wallet_ret = $wallet_ret;
$this->valor_ret = $valor_ret;
$this->status_ret = $status_ret;
$this->fecha_ret = $fecha_ret;
}

/*GENERANDO LOS METODOS GET*/

public function getId_retiro() {
return $this->id_retiro;
}
public function getUsuario_ret() {
return $this->usuario_ret;
}
public function getPaquete_ret() {
return $this->paquete_ret;
}
public function getWallet_ret() {
return $this->wallet_ret;
}
public function getValor_ret() {
return $this->valor_ret;
}
public function getStatus_ret() {
return $this->status_ret;
}
public function getFecha_ret() {
return $this->fecha_ret;
}
/*GENERANDO LOS METODOS SET*/

public function setUsuario_ret($usuario_ret){
$this->usuario_ret = $usuario_ret;
}
public function setPaquete_ret($paquete_ret){
$this->paquete_ret = $paquete_ret;
}
public function setWallet_ret($wallet_ret){
$this->wallet_ret = $wallet_ret;
}
public function setValor_ret($valor_ret){
$this->valor_ret = $valor_ret;
}
public function setStatus_ret($status_ret){
$this->status_ret = $status_ret;
}
public function setFecha_ret($fecha_ret){
$this->fecha_ret = $fecha_ret;
}
/*CREANDO FUNCION GUARDAR*/

public function guardar() { 

	$conexion = new Conexion();
 if ($this->id_retiro){
$consulta = $conexion->prepare("UPDATE " . self::TABLA . " SET usuario_ret = :usuario_ret, paquete_ret = :paquete_ret, wallet_ret = :wallet_ret, valor_ret = :valor_ret, status_ret = :status_ret, fecha_ret = :fecha_ret WHERE id_retiro = :id_retiro");
$consulta->bindParam(":id_retiro", $this->id_retiro);
$consulta->bindParam(":usuario_ret", $this->usuario_ret);
$consulta->bindParam(":paquete_ret", $this->paquete_ret);
$consulta->bindParam(":wallet_ret", $this->wallet_ret);
$consulta->bindParam(":valor_ret", $this->valor_ret);
$consulta->bindParam(":status_ret", $this->status_ret);
$consulta->bindParam(":fecha_ret", $this->fecha_ret);
$save=$consulta->execute();
} else{ 
$consulta = $conexion->prepare("INSERT INTO " . self::TABLA . " (usuario_ret, paquete_ret, wallet_ret, valor_ret, status_ret, fecha_ret) VALUES(:usuario_ret, :paquete_ret, :wallet_ret, :valor_ret, :status_ret, :fecha_ret)");
$consulta->bindParam(":usuario_ret", $this->usuario_ret);
$consulta->bindParam(":paquete_ret", $this->paquete_ret);
$consulta->bindParam(":wallet_ret", $this->wallet_ret);
$consulta->bindParam(":valor_ret", $this->valor_ret);
$consulta->bindParam(":status_ret", $this->status_ret);
$consulta->bindParam(":fecha_ret", $this->fecha_ret);
$save=$consulta->execute();
 $this->id_retiro = $conexion->lastInsertId(); 
} 
$conexion = null;
if ($save){   
return 1; 
 }else{   
return $consulta->errorcode()."/".$consulta->errorinfo()[2];  
  } 
 

}

#Actualizar el estado de un retiro, de en proceso a pagado.
public function update_status_retiro(){
		$conexion = new Conexion();
		$consulta = $conexion->prepare("UPDATE " . self::TABLA . " SET status_ret = :status_ret WHERE paquete_ret = :paquete_ret and id_retiro = :id_retiro");
$consulta->bindParam(":id_retiro", $this->id_retiro);
$consulta->bindParam(":paquete_ret", $this->paquete_ret);
$consulta->bindParam(":status_ret", $this->status_ret);

$save=$consulta->execute();

}



public static function eliminar(){  

	$conexion = new Conexion();
$consulta = $conexion->prepare("DELETE FROM " . self::TABLA . " WHERE id_retiro = :id_retiro");
			$consulta->bindParam(":id_retiro", $this->id_retiro);
			$consulta->execute();
			$conexion = null;
}

public static function buscarPorId($id){
    	$conexion = new Conexion(); 
    	$consulta = $conexion->prepare("SELECT id_retiro, usuario_ret, paquete_ret, wallet_ret, valor_ret, status_ret, fecha_ret FROM " . self::TABLA . " WHERE id_retiro = :id");
    			$consulta->bindParam(":id", $id); 
    			$consulta->execute();
    			$registro = $consulta->fetch(); 
    			$conexion = null; 
    			if ($registro) {
    				return new self($registro["id_retiro"], $registro["usuario_ret"], $registro["paquete_ret"], $registro["wallet_ret"], $registro["valor_ret"], $registro["status_ret"], $registro["fecha_ret"]);
    				} else {
    					return false;
    					}
    				}

public static function recuperarTodos(){
    			$conexion = new Conexion();
    			$consulta = $conexion->prepare("SELECT id_retiro, usuario_ret, paquete_ret, wallet_ret, valor_ret, status_ret, fecha_ret FROM " . self::TABLA . " ORDER BY id_retiro");
    					$consulta->execute();
    					$registros = $consulta->fetchAll();
    					$conexion = null;
    					return $registros;
    					



    				}



    				public function historial_retiro($id_pack){
    	$conexion = new Conexion(); 
    	$consulta = $conexion->prepare("SELECT id_retiro, usuario_ret, paquete_ret, wallet_ret, valor_ret, status_ret, fecha_ret FROM " . self::TABLA . " WHERE paquete_ret = :id_pack");
    			$consulta->bindParam(":id_pack", $id_pack); 
    			$consulta->execute();
    			$registro = $consulta->fetchAll(); 
    			$conexion = null; 
    			if (!empty($registro)) {
    				return $registro;
    			/*	return new self($registro["id_retiro"], $registro["usuario_ret"], $registro["paquete_ret"], $registro["wallet_ret"], $registro["valor_ret"], $registro["status_ret"], $registro["fecha_ret"]);*/
    				} else {
    			return false;
    				//	return var_dump($registro);
    					}
    				}


public static function AllHistorial($fecha){
    			$conexion = new Conexion();
    			$consulta = $conexion->prepare("SELECT id_retiro, usuario_ret, paquete_ret, wallet_ret, valor_ret, status_ret, fecha_ret FROM " . self::TABLA . " WHERE fecha_ret = :fecha ORDER BY id_retiro");
    				$consulta->bindParam(":fecha", $fecha); 
    					$consulta->execute();
    					$registros = $consulta->fetchAll();
    					$conexion = null;
    					return $registros;
    					
    				}

	/*Total efectivo retirado*/
    				public static function total_retirado($id_pack){
    					$retiro = 1;
    	$conexion = new Conexion(); 
    	$consulta = $conexion->prepare("SELECT SUM(valor_ret) AS total  FROM " . self::TABLA . " WHERE paquete_ret = :id_pack AND status_ret = :retiro");
    			$consulta->bindParam(":id_pack", $id_pack); 
    			$consulta->bindParam(":retiro", $retiro); 
    			$consulta->execute();
    			$registro = $consulta->fetch(); 
    			$conexion = null; 
    				

    				
    					if(empty($registro['total']) or ($registro === false)){
    						 return '0.00';
                 	
    					}else{

             
    					return $registro['total'];
    					}
    					
    					

    			
    				}


}


?>
