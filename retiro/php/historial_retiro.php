<?php 
session_start();
define('CONTROLADOR', TRUE);
include_once('../../modelo/Retiro.php');
$retiro = new Retiro();
$pack = $_SESSION['pack_eagle'];
$historial_retiro = $retiro->historial_retiro($pack);



 ?>
<h4 class="text-center " style="color: #3c41a4;"><strong>Historial de retiros</strong> </h4>
              <table id="example" class="table table-striped table-bordered" style="width:100%">
        
        <thead>
                  <tr>
                    <th>ID</th>
                    <th>BILLETERA</th>
                    <th>VALOR</th>
                    <th>ESTADO</th>
                     <th>FECHA</th>
                  </tr>
                </thead>
                <tbody>

<?php
if ($historial_retiro == false) {
  
}else{
 foreach ($historial_retiro as $key) {  ?>
  
 
                  <tr class="even">
                    <td class="sorting_1"><?php echo $key['id_retiro'] ?></td>
                    <td><?php echo $key['wallet_ret'] ?></td>
                    <td><?php echo $key['valor_ret'] ?></td>
                   <td> <?php if ($key['status_ret'] == 0) {
                           echo '<span class="badge bg-warning">Pending</span>';
                         }elseif ($key['status_ret'] == 1) {
                            echo '<span class="badge bg-success">Completado</span>';
                         } ?>
                           
                         </td>
                    <td><?php echo $key['fecha_ret'] ?></td>
                  </tr>
                <?php } 

                    }
                ?>
                </tbody>
        </table>