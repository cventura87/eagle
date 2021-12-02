<?php 
//archivo de prueba

define('CONTROLADOR', TRUE);
include_once('../../modelo/Usuario.php');

//esta funcion retorna la consulta como un objeto
$lista_usuarios = Usuario::userAll_query(); 

$u = '<a onclick="confirmDelete(<?php echo $id_usuario; ?>)" href ="?module=users&op=d-user&user=<?php echo $id_usuario?> "  class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>';
$d= '<div>
            <a data-toggle="modal" href="login.php#userEdit" class="btn btn-info btn-xs"><i class="fa fa-edit "></i> </a>


            <a onclick="confirmDelete(<?php echo $id_usuario; ?>)" href ="#"  class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>

            
          </div>';

//array vacio
$data = array();


 $result = $lista_usuarios->fetchAll(PDO::FETCH_ASSOC);


$books = $stmt->fetchAll(PDO::FETCH_ASSOC);*/
foreach($result as $row){
    //$row_id = $row['id'];
   // $row_title = $row['title'];
  
    $data[] = $row;
}

$results = array(
"sEcho" => 1,
"iTotalRecords" => count($data),
"iTotalDisplayRecords" => count($data),
"aaData"=>$data);

echo json_encode($results);
?>

      
      
      


