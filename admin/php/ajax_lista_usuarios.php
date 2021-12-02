<?php 


define('CONTROLADOR', TRUE);
include_once('../../modelo/Usuario.php');

$lista_usuarios = Usuario::recuperarTodos(); 

$u = '<a onclick="confirmDelete(<?php echo $id_usuario; ?>)" href ="?module=users&op=d-user&user=<?php echo $id_usuario?> "  class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>';
$r=' <table id="example" class="table table-striped table-bordered" style="width:100%">';
?>

      
      
      
<tbody>





<?php 

foreach ($lista_usuarios as $key) {
 $id_usuario = $key['id_usuario'];
 ?>



      <tr>
        <td><?php echo $key['id_usuario'] ?></td>
        <td><?php echo $key['usuario'] ?></td>
        <td><?php echo $key['code'] ?></td>
        <td><?php echo $key['email'] ?></td>
        <td><?php echo $key['patrocinador'] ?></td>
        <td><?php echo $key['nombre'] ?></td>
        <td style="padding-right: 0px; margin-right: opx;">


          <div>
            <a data-toggle="modal" href="login.php#userEdit" class="btn btn-info btn-xs"><i class="fa fa-edit "></i> </a>


            <a onclick="confirmDelete(<?php echo $id_usuario; ?>)" href ="#"  class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>

            
          </div>
        </td>
      </tr>





<?php } ?>

</tbody>
  
