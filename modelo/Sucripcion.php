<?php 


if (class_exists('Conexion')) {
	// code...
}else{

	include'Conexion.php';
}
/*GENERANDO VARIABLES PRIVADAS*/
class Suscripcion{
private $id_suscripcion;
private $paquete;
private $valor;
private $status_pack;
private $fecha_pago;
private $code_user;
//-----------------------
private $billetera;
private $divisa;
private $monto_btc;
private $fee;
//-----------------------
private $status_progres;

const TABLA = "suscripcion";

/*GENERANDO function __construc*/
public function __construct($id_suscripcion=null, $paquete=null, $valor=null, $status_pack=null, $fecha_pago=null, $code_user=null, $billetera=null, $divisa=null, $monto_btc=null, $fee=null, $status_progres = 0){
$this->id_suscripcion = $id_suscripcion;
$this->paquete = $paquete;
$this->valor = $valor;
$this->status_pack = $status_pack;
$this->fecha_pago = $fecha_pago;
$this->code_user = $code_user;
//--------------------------
$this->billetera = $billetera;
$this->divisa = $divisa;
$this->monto_btc = $monto_btc;
$this->fee = $fee;
//---------------------------
$this->status_progres = $status_progres;
}

/*GENERANDO LOS METODOS GET*/

public function getId_suscripcion() {
return $this->id_suscripcion;
}
public function getPaquete() {
return $this->paquete;
}
public function getValor() {
return $this->valor;
}
public function getStatus_pack() {
return $this->status_pack;
}
public function getFecha_pago() {
return $this->fecha_pago;
}
public function getCode_user() {
return $this->code_user;
}

//-----------------------------

public function getBilletera() {
return $this->billetera;
}
public function getDivisa() {
return $this->divisa;
}
public function getMonto_btc() {
return $this->monto_btc;
}
public function getFee() {
return $this->fee;
}
//---------------------------------
public function getStatus_progres() {
return $this->status_progres;
}


/*GENERANDO LOS METODOS SET*/

public function setPaquete($paquete){
$this->paquete = $paquete;
}
public function setValor($valor){
$this->valor = $valor;
}
public function setStatus_pack($status_pack){
$this->status_pack = $status_pack;
}
public function setFecha_pago($fecha_pago){
$this->fecha_pago = $fecha_pago;
}
public function setCode_user($code_user){
$this->code_user = $code_user;
}
//--------------------------

public function setBilletera($billetera){
$this->billetera = $billetera;
}
public function setDivisa($divisa){
$this->divisa = $divisa;
}
public function setMonto_btc($monto_btc){
$this->monto_btc = $monto_btc;
}
public function setFee($fee){
$this->fee = $fee;
}
//-----------------------------------
public function setStatus_progres($status_progres){
$this->status_progres = $status_progres;
}

/*CREANDO FUNCION GUARDAR*/

public function guardar() { 

	$conexion = new Conexion();
 if ($this->id_suscripcion){
$consulta = $conexion->prepare("UPDATE " . self::TABLA . " SET paquete = :paquete, valor = :valor, status_pack = :status_pack, fecha_pago = :fecha_pago, code_user = :code_user, billetera = :billetera, divisa = :divisa, monto_btc = :monto_btc, fee = :fee, status_progres = :status_progres WHERE id_suscripcion = :id_suscripcion");
$consulta->bindParam(":id_suscripcion", $this->id_suscripcion);
$consulta->bindParam(":paquete", $this->paquete);
$consulta->bindParam(":valor", $this->valor);
$consulta->bindParam(":status_pack", $this->status_pack);
$consulta->bindParam(":fecha_pago", $this->fecha_pago);
$consulta->bindParam(":code_user", $this->code_user);
//------------------------------------------------------
$consulta->bindParam(":billetera", $this->billetera);
$consulta->bindParam(":divisa", $this->divisa);
$consulta->bindParam(":monto_btc", $this->monto_btc);
$consulta->bindParam(":fee", $this->fee);
//--------------------------------------------------
$consulta->bindParam(":status_progres", $this->status_progres);
$save=$consulta->execute();
} else{ 
$consulta = $conexion->prepare("INSERT INTO " . self::TABLA . " (paquete, valor, status_pack, fecha_pago, code_user, billetera, divisa, monto_btc, fee, status_progres) VALUES(:paquete, :valor, :status_pack, :fecha_pago, :code_user, :billetera, :divisa, :monto_btc, :fee, :status_progres)");
$consulta->bindParam(":paquete", $this->paquete);
$consulta->bindParam(":valor", $this->valor);
$consulta->bindParam(":status_pack", $this->status_pack);
$consulta->bindParam(":fecha_pago", $this->fecha_pago);
$consulta->bindParam(":code_user", $this->code_user);
//-------------------------------------------------------
$consulta->bindParam(":billetera", $this->billetera);
$consulta->bindParam(":divisa", $this->divisa);
$consulta->bindParam(":monto_btc", $this->monto_btc);
$consulta->bindParam(":fee", $this->fee);
//--------------------------------------------------
$consulta->bindParam(":status_progres", $this->status_progres);

$save=$consulta->execute();
 $this->id_suscripcion = $conexion->lastInsertId(); 
} 
$conexion = null;
if ($save){   
return 1; 
 }else{   
return $consulta->errorcode()."/".$consulta->errorinfo()[2];  
  } 
 

}
public function eliminar(){  

	$conexion = new Conexion();
$consulta = $conexion->prepare("DELETE FROM " . self::TABLA . " WHERE id_suscripcion = :id_suscripcion");
			$consulta->bindParam(":id_suscripcion", $this->id_suscripcion);
			$save = $consulta->execute();
			$conexion = null;
			 if ($save){   
return 1; 
 }else{   
  return   $consulta->errorcode()."/".$consulta->errorinfo()[2];  
  } 
}

public static function buscarPorId($id){
    	$conexion = new Conexion(); 
    	$consulta = $conexion->prepare("SELECT id_suscripcion, paquete, valor, status_pack, fecha_pago, code_user, billetera, divisa, monto_btc, fee, status_progres FROM " . self::TABLA . " WHERE id_suscripcion = :id");
    			$consulta->bindParam(":id", $id); 
    			$consulta->execute();
    			$registro = $consulta->fetch(); 
    			$conexion = null; 
    			if ($registro) {
    				return new self($registro["id_suscripcion"], $registro["paquete"], $registro["valor"], $registro["status_pack"], $registro["fecha_pago"], $registro["code_user"], $registro["billetera"], $registro["divisa"], $registro["monto_btc"], $registro["fee"], $registro["status_progres"]);
    				} else {
    					return false;
    					}
    				}


    			public static function buscar_suscripcion($code){
    			$conexion = new Conexion();
    			$consulta = $conexion->prepare("SELECT id_suscripcion, paquete, valor, status_pack, fecha_pago, code_user, billetera, divisa, monto_btc, fee, status_progres FROM " . self::TABLA. " WHERE code_user = :code" );
    					$consulta->bindParam(":code", $code); 
    					$consulta->execute();
    					$registros = $consulta->fetch();//solo devuelve un registro
    					$conexion = null;
    					return $registros;
    					
    				}


public static function recuperarTodos(){
    			$conexion = new Conexion();
    			$consulta = $conexion->prepare("SELECT id_suscripcion, paquete, valor, status_pack, fecha_pago, code_user, billetera, divisa, monto_btc, fee, status_progres FROM " . self::TABLA . " ORDER BY id_suscripcion");
    					$consulta->execute();
    					$registros = $consulta->fetchAll();
    					$conexion = null;
    					return $registros;
    					
    				}

    	public static function buscar_pack($code){
    			$conexion = new Conexion();
    			$consulta = $conexion->prepare("SELECT id_suscripcion, paquete, valor, status_pack, fecha_pago, code_user, billetera, divisa, monto_btc, fee, status_progres FROM " . self::TABLA. " WHERE code_user = :code");
    					$consulta->bindParam(":code", $code); 
    					$consulta->execute();
    					$registros = $consulta->fetch();
    					$conexion = null;
    					if (!empty($registros['paquete'])) {
    						// code...
    						return $registros['paquete'];
    					}else{
    						return 0;
    					}
    					
    					
    				}




    		public function status_pack($code){
    			$conexion = new Conexion();
    			$consulta = $conexion->prepare("SELECT id_suscripcion, paquete, valor, status_pack, fecha_pago, code_user, billetera, divisa, monto_btc, fee, status_progres FROM " . self::TABLA. " WHERE code_user = :code");
    					$consulta->bindParam(":code", $code); 
    					$consulta->execute();
    					$registros = $consulta->fetchAll();
    					$conexion = null;
    					
    					return $registros;
    					
    					
    				}



    				public function activar(){
								$conexion = new Conexion();
								 if ($this->id_suscripcion){
							$consulta = $conexion->prepare("UPDATE " . self::TABLA . " SET paquete = :paquete, valor = :valor, status_pack = :status_pack, fecha_pago = :fecha_pago, code_user = :code_user, billetera = :billetera, divisa = :divisa, monto_btc = :monto_btc, fee = :fee, status_progres = :status_progres WHERE id_suscripcion = :id_suscripcion");
									$consulta->bindParam(":id_suscripcion", $this->id_suscripcion);
									$consulta->bindParam(":paquete", $this->paquete);
									$consulta->bindParam(":valor", $this->valor);
									$consulta->bindParam(":status_pack", $this->status_pack);
									$consulta->bindParam(":fecha_pago", $this->fecha_pago);
									$consulta->bindParam(":code_user", $this->code_user);
									//------------------------------------------------------
									$consulta->bindParam(":billetera", $this->billetera);
									$consulta->bindParam(":divisa", $this->divisa);
									$consulta->bindParam(":monto_btc", $this->monto_btc);
									$consulta->bindParam(":fee", $this->fee);
									//-----------------------------------------------
                                    $consulta->bindParam(":status_progres", $this->status_progres);
							 $save=$consulta->execute();
			        $conexion = null;

        if ($save){   
            return 1; 
       }else{   
           return   $consulta->errorcode()."/".$consulta->errorinfo()[2];  
  } 

							}


    				}




    						public static function planes_pago(){
    			$conexion = new Conexion();
    			$stat = 1;
    			$consulta = $conexion->prepare("SELECT id_suscripcion, paquete, valor, status_pack, fecha_pago, code_user, billetera, divisa, monto_btc, fee, status_progres FROM " . self::TABLA . " WHERE status_pack = :stat");
    			$consulta->bindParam(":stat", $stat); 
    					$consulta->execute();
    					$registros = $consulta->fetchAll();
    					$conexion = null;
    					return $registros;
    					
    				}

    				//-------------------------------------------------------------------------------------
    				public function detalle_suscripcion($id){
    			$conexion = new Conexion();
    			$consulta = $conexion->prepare("SELECT s.id_suscripcion, s.paquete, s.valor, s.status_pack, s.fecha_pago, s.code_user, s.billetera, s.divisa, s.monto_btc, s.fee, s.status_progres, u.usuario, u.nombre, u.apellido FROM suscripcion s 
    				 INNER JOIN usuario u ON s.code_user = u.code WHERE id_suscripcion = :id");

                        $consulta->bindParam(":id", $id); 

    					$consulta->execute();
    					$registros = $consulta->fetch();
    					$conexion = null;
    					return $registros;
    					
    				}

//lista de suscripcion a paquetes, con nombre de usuario
public static function lista_suscripcionU(){
    			$conexion = new Conexion();
    			$consulta = $conexion->prepare("SELECT s.id_suscripcion, s.paquete, s.valor, s.status_pack, s.fecha_pago, s.code_user, s.billetera, s.divisa, s.monto_btc, s.fee, s.status_progres, u.usuario, u.patrocinador
    				FROM suscripcion s 
    				INNER JOIN usuario u ON s.code_user = u.code");
    					$consulta->execute();
    					$registros = $consulta->fetchAll();
    					$conexion = null;
    					return $registros;
    					
    				}

    				public static function lista_suscripcionUQuery(){
    			$conexion = new Conexion();
    			$consulta = $conexion->prepare("SELECT s.id_suscripcion, s.paquete, s.valor, s.status_pack, s.fecha_pago, s.code_user, s.billetera, s.divisa, s.monto_btc, s.fee, s.status_progres, u.usuario, u.patrocinador
    				FROM suscripcion s 
    				INNER JOIN usuario u ON s.code_user = u.code");
    					$consulta->execute();
    					//$registros = $consulta->fetchAll();
    					$conexion = null;
    					return $consulta;
    					
    				}



public static function searchId($id){
    	$conexion = new Conexion(); 
    	$consulta = $conexion->prepare("SELECT s.id_suscripcion, s.paquete, s.valor, s.status_pack, s.fecha_pago, s.code_user, s.billetera, s.divisa, s.monto_btc, s.fee, s.status_progres, u.usuario, u.patrocinador
    				FROM suscripcion s 
    				INNER JOIN usuario u ON s.code_user = u.code");
    					$consulta->execute();
    					$registro = $consulta->fetch();

    			$conexion = null; 
    			//return $registros;

    			if ($registro) {
    				return new self($registro["id_suscripcion"], $registro["paquete"], $registro["valor"], $registro["status_pack"], $registro["fecha_pago"], $registro["code_user"], $registro["billetera"], $registro["divisa"], $registro["monto_btc"], $registro["usuario"], $registro["patrocinador"]);
    				} else {
    					return false;
    					}

 
    				}
    			}


?>

