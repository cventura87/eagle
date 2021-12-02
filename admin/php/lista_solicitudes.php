<?php 

if (isset($_SESSION['super_user_eagle'])) {
  
}else{


  echo '<script>window.location.replace("'.RUTA_URL.'/data/?module=dash");</script>';
  exit();
}

 ?>
<?php 

include_once('../modelo/Retiro.php');
$retiro = new Retiro();
$fecha = date('d/m/Y');
$lista_solicitudes = $retiro->AllHistorial($fecha);
 ?>






            <div class="col-md-12">
<div class="content-panel" style="padding: 15px 15px 15px 15px;">
              <h4> Solicitudes de retiro</h4>
              <hr>


              <table id="example" class="table table-striped table-bordered" style="width:100%">
        
                        <thead>
                  <tr>
                    <th>ID</th>
                    <th>BILLETERA</th>
                     <th>VALOR</th>
                    <th>ESTADO</th>
                     <th>FECHA</th>
                     <th>ACTION</th>
                  </tr>
                </thead>
                <tbody>

<?php
if ($lista_solicitudes == false) {
  
}else{
 foreach ($lista_solicitudes as $key) {  ?>
  
 
                  <tr class="even">
                    <td class="sorting_1"><?php echo $key['id_retiro'] ?></td>
                    <td><?php echo $key['wallet_ret'] ?></td>
                    <td><?php echo $key['valor_ret'] ?></td>
                   <td>
                         <?php if ($key['status_ret'] == 0) {
                           echo '<span class="badge bg-warning">Pending</span>';
                         }elseif ($key['status_ret'] == 1) {
                            echo '<span class="badge bg-success">Completado</span>';
                         } ?>
                  


                   </td>
                    <td><?php echo $key['fecha_ret'] ?></td>

                     <td></td>
                  </tr>
                <?php } 

                    }
                ?>
                </tbody>

                </tbody>
        </table>



            </div>
            </div>