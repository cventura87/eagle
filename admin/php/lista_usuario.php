<?php 

if (isset($_SESSION['super_user_eagle'])) {
  
}else{


  echo '<script>window.location.replace("'.RUTA_URL.'/data/?module=dash");</script>';
  exit();
}

 ?>



<?php 

 include_once('../modelo/Usuario.php');
$lista_usuarios = Usuario::recuperarTodos(); ?>
<div class="col-md-12">
<div class="content-panel" style="padding: 15px 15px 15px 15px;">
              <h4> usuarios registrados</h4>
              <hr>


              <table id="example" class="table table-striped table-bordered" style="width:100%">
        
        <thead>
                  <tr>
                    <th>ID</th>
                    <th>USUARIO</th>
                    <th>CODE</th>
                    <th>EMAIL</th>
                    <th>PATROCINADOR</th>
                     <th>NOMBRE</th>
                    <th style="padding-right: 0px; margin-right: opx;" >ACTION</th>

                  </tr>
                </thead>
                <tbody>



                  <?php 
$u = '<a onclick="confirmDelete(<?php echo $id_usuario; ?>)" href ="?module=users&op=d-user&user=<?php echo $id_usuario?> "  class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>';
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
                            

                            <div >
                            <a  href ="?module=users&op=<?php echo $id_usuario ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                           

        <a onclick="confirmDelete(<?php echo $id_usuario; ?>)" href ="#"  class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>

            
                        </div>
                          </td>
                  </tr>
                  <?php } ?>
                </tbody>
        </table>



            </div>
            </div>