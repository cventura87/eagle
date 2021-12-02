<?php 

if (class_exists('Conexion')) {
   // code...
}else{

   include'Conexion.php';
}

/*GENERANDO VARIABLES PRIVADAS*/
class Usuario{
private $id_usuario;
private $pais;
private $telefono;
private $usuario;
private $code;
private $email;
//private $email2;
private $contrasena;
//private $contrasena2;
private $patrocinador;
private $status;
private $fecha_registro;

/*nuevos datos*/
private $nombre;
private $apellido;
private $direccion;
private $billetera;


const TABLA = "usuario";

/*GENERANDO function __construc*/
public function __construct($id_usuario=null, $pais=null, $telefono=null, $usuario=null, $code=null, $email=null, $contrasena=null, $patrocinador=null, $status=null, $fecha_registro=null, $nombre=null, $apellido=null, $direccion=null, $billetera=null){
$this->id_usuario = $id_usuario;
$this->pais = $pais;
$this->telefono = $telefono;
$this->usuario = $usuario;
$this->code = $code;
$this->email = $email;
$this->contrasena = $contrasena;
$this->patrocinador = $patrocinador;
$this->status = $status;
$this->fecha_registro = $fecha_registro;
$this->nombre = $nombre;
$this->apellido = $apellido;
$this->direccion = $direccion;
$this->billetera = $billetera;

}

/*GENERANDO LOS METODOS GET*/

public function getId_usuario() {
return $this->id_usuario;
}
public function getPais() {
return $this->pais;
}
public function getTelefono() {
return $this->telefono;
}
public function getUsuario() {
return $this->usuario;
}
public function getCode() {
return $this->code;
}
public function getEmail() {
return $this->email;
}
public function getContrasena() {
return $this->contrasena;
}
public function getPatrocinador() {
return $this->patrocinador;
}
public function getStatus() {
return $this->status;
}
public function getFecha_registro() {
return $this->fecha_registro;
}
public function getNombre() {
return $this->nombre;
}
public function getApellido() {
return $this->apellido;
}
public function getDireccion() {
return $this->direccion;
}
public function getBilletera() {
return $this->billetera;
}


/*GENERANDO LOS METODOS SET*/

public function setPais($pais){
$this->pais = $pais;
}
public function setTelefono($telefono){
$this->telefono = $telefono;
}
public function setUsuario($usuario){
$this->usuario = $usuario;
}
public function setCode($code){
$this->code = $code;
}
public function setEmail($email){
$this->email = $email;
}

public function setContrasena($contrasena){
$this->contrasena = $contrasena;
}
public function setPatrocinador($patrocinador){
$this->patrocinador = $patrocinador;
}
public function setStatus($status){
$this->status = $status;
}
public function setFecha_registro($fecha_registro){
$this->fecha_registro = $fecha_registro;
}
public function setNombre($nombre){
$this->nombre = $nombre;
}
public function setApellido($apellido){
$this->apellido = $apellido;
}
public function setDireccion($direccion){
$this->direccion = $direccion;
}
public function setBilletera($billetera){
$this->billetera = $billetera;
}

/*CREANDO FUNCION GUARDAR*/

public function guardar() { 

	$conexion = new Conexion();
 if ($this->id_usuario){
$consulta = $conexion->prepare("UPDATE " . self::TABLA . " SET pais = :pais, telefono = :telefono, usuario = :usuario, code = :code, email = :email, contrasena = :contrasena, patrocinador = :patrocinador, status = :status, fecha_registro = :fecha_registro, nombre = :nombre, apellido = :apellido, direccion = :direccion, billetera = :billetera WHERE id_usuario = :id_usuario");
$consulta->bindParam(":id_usuario", $this->id_usuario);
$consulta->bindParam(":pais", $this->pais);
$consulta->bindParam(":telefono", $this->telefono);
$consulta->bindParam(":usuario", $this->usuario);
$consulta->bindParam(":code", $this->code);
$consulta->bindParam(":email", $this->email);
$consulta->bindParam(":contrasena", $this->contrasena);
$consulta->bindParam(":patrocinador", $this->patrocinador);
$consulta->bindParam(":status", $this->status);
$consulta->bindParam(":fecha_registro", $this->fecha_registro);
$consulta->bindParam(":nombre", $this->nombre);
$consulta->bindParam(":apellido", $this->apellido);
$consulta->bindParam(":direccion", $this->direccion);
$consulta->bindParam(":billetera", $this->billetera);

$save=$consulta->execute();

} else{ 
$consulta = $conexion->prepare("INSERT INTO ". self::TABLA ." (pais, telefono, usuario, code, email, contrasena, patrocinador, status, fecha_registro, nombre, apellido, direccion, billetera) VALUES(:pais, :telefono, :usuario, :code, :email, :contrasena, :patrocinador, :status, :fecha_registro, :nombre, :apellido, :direccion, :billetera)");
$consulta->bindParam(":pais", $this->pais);
$consulta->bindParam(":telefono", $this->telefono);
$consulta->bindParam(":usuario", $this->usuario);
$consulta->bindParam(":code", $this->code);
$consulta->bindParam(":email", $this->email);
$consulta->bindParam(":contrasena", $this->contrasena);
$consulta->bindParam(":patrocinador", $this->patrocinador);
$consulta->bindParam(":status", $this->status);
$consulta->bindParam(":fecha_registro", $this->fecha_registro);
$consulta->bindParam(":nombre", $this->nombre);
$consulta->bindParam(":apellido", $this->apellido);
$consulta->bindParam(":direccion", $this->direccion);
$consulta->bindParam(":billetera", $this->billetera);
$save=$consulta->execute();

 $this->id_usuario = $conexion->lastInsertId(); 
} 
$conexion = null;
if ($save){   
return 1; 
 }else{   
  return   $consulta->errorcode()."/".$consulta->errorinfo()[2];  
  } 
 

}
public  function eliminar(){  

	$conexion = new Conexion();
$consulta = $conexion->prepare("DELETE FROM " . self::TABLA . " WHERE id_usuario = :id_usuario");
		$consulta->bindParam(":id_usuario", $this->id_usuario);
			$save=$consulta->execute();
			$conexion = null;

        if ($save){   
return 1; 
 }else{   
  return   $consulta->errorcode()."/".$consulta->errorinfo()[2];  
  } 

}

public static function buscarPorId($id){
    	$conexion = new Conexion(); 
    	$consulta = $conexion->prepare("SELECT id_usuario, pais, telefono, usuario, code, email, contrasena, patrocinador, status, fecha_registro, nombre, apellido, direccion, billetera FROM " . self::TABLA . " WHERE id_usuario = :id");
    			$consulta->bindParam(":id", $id); 
    			$consulta->execute();
    			$registro = $consulta->fetch(); 
    			$conexion = null; 
    			if ($registro) {
    				return new self($registro["id_usuario"], $registro["pais"], $registro["telefono"], $registro["usuario"], $registro["code"], $registro["email"], $registro["contrasena"], $registro["patrocinador"], $registro["status"], $registro["fecha_registro"], $registro["nombre"], $registro["apellido"], $registro["direccion"], $registro["billetera"]);
    				} else {
    					return false;
    					}
    				}

public static function recuperarTodos(){
    			$conexion = new Conexion();
    			$consulta = $conexion->prepare("SELECT id_usuario, pais, telefono, usuario, code, email, contrasena, patrocinador, status, fecha_registro, nombre, apellido, direccion, billetera FROM " . self::TABLA . " ORDER BY id_usuario");
    					$consulta->execute();
    					$registros = $consulta->fetchAll();
    					$conexion = null;
    					return $registros;
    					



    				}


public static function userAll_query(){
            $conexion = new Conexion();
            $consulta = $conexion->prepare("SELECT id_usuario, pais, telefono, usuario, code, email, contrasena, patrocinador, status, fecha_registro, nombre, apellido, direccion, billetera FROM " . self::TABLA . " ORDER BY id_usuario");
                  $consulta->execute();
                  //$registros = $consulta->fetchAll();
                  $conexion = null;
                  return $consulta;
                  



               }

   public function num_code(){
 $conexion = new Conexion();
        $consulta = $conexion->prepare("SELECT MAX(code) AS num FROM "  . self::TABLA);
        // $consulta->bindParam(':empresa', $id_empresa);
        $consulta->execute();
        $row = $consulta->fetch();

        $conexion = null;
       
        $num = $row['num'];

        if ($num>0) {
         $num = $row['num']+1;
         
         }else{
          $num = 1;
         }

         return $num;
}

public static function login($user, $pass){
    	$conexion = new Conexion(); 
    	$consulta = $conexion->prepare("SELECT id_usuario, pais, telefono, usuario, code, email, contrasena, patrocinador, status, fecha_registro, nombre, apellido, direccion, billetera FROM " . self::TABLA . " WHERE usuario = :user AND contrasena = :pass");
    			$consulta->bindParam(":user", $user); 
    			$consulta->bindParam(":pass", $pass); 
    			$consulta->execute();
    			$registro = $consulta->fetch(); 
    			$conexion = null; 
    			if ($registro) {
    				return new self($registro["id_usuario"], $registro["pais"], $registro["telefono"], $registro["usuario"], $registro["code"], $registro["email"], $registro["contrasena"], $registro["patrocinador"], $registro["status"], $registro["fecha_registro"], $registro["nombre"], $registro["apellido"], $registro["direccion"], $registro["billetera"]);
    				} else {
    					return false;
    					}
    				}

      public static function perfil($code){
      $conexion = new Conexion(); 
      $consulta = $conexion->prepare("SELECT id_usuario, pais, telefono, usuario, code, email, contrasena, patrocinador, status, fecha_registro, nombre, apellido, direccion, billetera FROM " . self::TABLA . " WHERE code = :code");
            $consulta->bindParam(":code", $code); 
            $consulta->execute();
            $registro = $consulta->fetch(); 
            $conexion = null; 
            if ($registro) {
               return new self($registro["id_usuario"], $registro["pais"], $registro["telefono"], $registro["usuario"], $registro["code"], $registro["email"], $registro["contrasena"], $registro["patrocinador"], $registro["status"], $registro["fecha_registro"], $registro["nombre"], $registro["apellido"], $registro["direccion"], $registro["billetera"]);
               } else {
                  return false;
                  }
               }



               public function update_perfil() { 

   $conexion = new Conexion();
 if ($this->id_usuario){
$consulta = $conexion->prepare("UPDATE " . self::TABLA . " SET pais = :pais, email = :email, contrasena = :contrasena, nombre = :nombre, apellido = :apellido, direccion = :direccion, billetera = :billetera WHERE id_usuario = :id_usuario");
$consulta->bindParam(":id_usuario", $this->id_usuario);
$consulta->bindParam(":pais", $this->pais);

$consulta->bindParam(":email", $this->email);
$consulta->bindParam(":contrasena", $this->contrasena);

$consulta->bindParam(":nombre", $this->nombre);
$consulta->bindParam(":apellido", $this->apellido);
$consulta->bindParam(":direccion", $this->direccion);
$consulta->bindParam(":billetera", $this->billetera);

$save=$consulta->execute();

}
$conexion = null;
if ($save){   
return 1; 
 }else{   
  return   $consulta->errorcode()."/".$consulta->errorinfo()[2];  
  } 
 

}



  public function update_password() { 

   $conexion = new Conexion();
 if ($this->id_usuario){
$consulta = $conexion->prepare("UPDATE " . self::TABLA . " SET contrasena = :contrasena WHERE id_usuario = :id_usuario");
$consulta->bindParam(":id_usuario", $this->id_usuario);
$consulta->bindParam(":contrasena", $this->contrasena);

$save=$consulta->execute();

}
$conexion = null;
if ($save){   
return 1; 
 }else{   
  return   $consulta->errorcode()."/".$consulta->errorinfo()[2];  
  } 
 

}


}

?>