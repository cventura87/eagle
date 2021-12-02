<?php


if (class_exists('Conexion')) {
	// code...
}else{

	include'Conexion.php';
}

/*GENERANDO VARIABLES PRIVADAS*/
class Superadmin{
private $id_superadmin;
private $nombre;
private $apellido;
private $usuario;
private $email;
private $pass1;
private $telefono;
private $documento;
private $status;
private $fecha_registro;


const TABLA = "superadmin";

/*GENERANDO function __construc*/
public function __construct($id_superadmin=null, $nombre=null, $apellido=null, $usuario=null, $email=null, $pass1=null, $pass2=null, $telefono=null, $documento=null, $status=null, $fecha_registro=null){
$this->id_superadmin = $id_superadmin;
$this->nombre = $nombre;
$this->apellido = $apellido;
$this->usuario = $usuario;
$this->email = $email;
$this->pass1 = $pass1;

$this->telefono = $telefono;
$this->documento = $documento;
$this->status = $status;
$this->fecha_registro = $fecha_registro;
}

/*GENERANDO LOS METODOS GET*/

public function getId_superadmin() {
return $this->id_superadmin;
}
public function getNombre() {
return $this->nombre;
}
public function getApellido() {
return $this->apellido;
}
public function getUsuario() {
return $this->usuario;
}
public function getEmail() {
return $this->email;
}
public function getPass1() {
return $this->pass1;
}

public function getTelefono() {
return $this->telefono;
}
public function getDocumento() {
return $this->documento;
}
public function getStatus() {
return $this->status;
}
public function getFecha_registro() {
return $this->fecha_registro;
}
/*GENERANDO LOS METODOS SET*/

public function setNombre($nombre){
$this->nombre = $nombre;
}
public function setApellido($apellido){
$this->apellido = $apellido;
}
public function setUsuario($usuario){
$this->usuario = $usuario;
}
public function setEmail($email){
$this->email = $email;
}
public function setPass1($pass1){
$this->pass1 = $pass1;
}

public function setTelefono($telefono){
$this->telefono = $telefono;
}
public function setDocumento($documento){
$this->documento = $documento;
}
public function setStatus($status){
$this->status = $status;
}
public function setFecha_registro($fecha_registro){
$this->fecha_registro = $fecha_registro;
}
/*CREANDO FUNCION GUARDAR*/

public function guardar() { 

	$conexion = new Conexion();
 if ($this->id_superadmin){
$consulta = $conexion->prepare("UPDATE " . self::TABLA . " SET nombre = :nombre, apellido = :apellido, usuario = :usuario, email = :email, pass1 = :pass1, pass2 = :pass2, telefono = :telefono, documento = :documento, status = :status, fecha_registro = :fecha_registro WHERE id_superadmin = :id_superadmin");
$consulta->bindParam(":id_superadmin", $this->id_superadmin);
$consulta->bindParam(":nombre", $this->nombre);
$consulta->bindParam(":apellido", $this->apellido);
$consulta->bindParam(":usuario", $this->usuario);
$consulta->bindParam(":email", $this->email);
$consulta->bindParam(":pass1", $this->pass1);
$consulta->bindParam(":pass2", $this->pass2);
$consulta->bindParam(":telefono", $this->telefono);
$consulta->bindParam(":documento", $this->documento);
$consulta->bindParam(":status", $this->status);
$consulta->bindParam(":fecha_registro", $this->fecha_registro);
$save=$consulta->execute();
} else{ 
$consulta = $conexion->prepare("INSERT INTO " . self::TABLA . " (nombre, apellido, usuario, email, pass1, pass2, telefono, documento, status, fecha_registro) VALUES(:nombre, :apellido, :usuario, :email, :pass1, :pass2, :telefono, :documento, :status, :fecha_registro)");
$consulta->bindParam(":nombre", $this->nombre);
$consulta->bindParam(":apellido", $this->apellido);
$consulta->bindParam(":usuario", $this->usuario);
$consulta->bindParam(":email", $this->email);
$consulta->bindParam(":pass1", $this->pass1);
$consulta->bindParam(":pass2", $this->pass2);
$consulta->bindParam(":telefono", $this->telefono);
$consulta->bindParam(":documento", $this->documento);
$consulta->bindParam(":status", $this->status);
$consulta->bindParam(":fecha_registro", $this->fecha_registro);
$save=$consulta->execute();
 $this->id_superadmin = $conexion->lastInsertId(); 
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
$consulta = $conexion->prepare("DELETE FROM " . self::TABLA . " WHERE id_superadmin = :id_superadmin");
			$consulta->bindParam(":id_superadmin", $this->id_superadmin);
			$consulta->execute();
			$conexion = null;
}

public static function buscarPorId($id){
    	$conexion = new Conexion(); 
    	$consulta = $conexion->prepare("SELECT id_superadmin, nombre, apellido, usuario, email, pass1, pass2, telefono, documento, status, fecha_registro FROM " . self::TABLA . " WHERE id_superadmin = :id");
    			$consulta->bindParam(":id", $id); 
    			$consulta->execute();
    			$registro = $consulta->fetch(); 
    			$conexion = null; 
    			if ($registro) {
    				return new self($registro["id_superadmin"], $registro["nombre"], $registro["apellido"], $registro["usuario"], $registro["email"], $registro["pass1"], $registro["pass2"], $registro["telefono"], $registro["documento"], $registro["status"], $registro["fecha_registro"]);
    				} else {
    					return false;
    					}
    				}

public static function recuperarTodos(){
    			$conexion = new Conexion();
    			$consulta = $conexion->prepare("SELECT id_superadmin, nombre, apellido, usuario, email, pass1, pass2, telefono, documento, status, fecha_registro FROM " . self::TABLA . " ORDER BY id_superadmin");
    					$consulta->execute();
    					$registros = $consulta->fetchAll();
    					$conexion = null;
    					return $registros;
    					



    				}


    				public static function Superlogin($user, $pass){
    	$conexion = new Conexion(); 
    	$consulta = $conexion->prepare("SELECT id_superadmin, nombre, apellido, usuario, email, pass1, telefono, documento, status, fecha_registro FROM " . self::TABLA . " WHERE usuario = :user AND pass1 = :pass");
    			$consulta->bindParam(":user", $user); 
    			$consulta->bindParam(":pass", $pass); 
    			$consulta->execute();
    			$registro = $consulta->fetch(); 
    			$conexion = null; 
    			if ($registro) {
    				return new self($registro["id_superadmin"], $registro["nombre"], $registro["apellido"], $registro["usuario"], $registro["email"], $registro["pass1"], $registro["telefono"], $registro["documento"], $registro["status"], $registro["fecha_registro"]);
    				} else {
    					return false;
    					}
    				}


}?>