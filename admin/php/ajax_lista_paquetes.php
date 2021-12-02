
<?php 
include_once('../../function/function_eagle.php');
//este archivo es llamado con ajax

define('CONTROLADOR', TRUE);
include_once('../../modelo/Sucripcion.php');

$suscriptions = Suscripcion::lista_suscripcionU();
 ?>



            <div class="col-md-12">
<div class="content-panel" style="padding: 15px 15px 15px 15px;">
              <h4> Paquetes</h4>
              <hr>


              <table id="example" class="table table-striped table-bordered" style="width:100%">
        
                <thead>
                  <tr>
                    <th>PLAN</th>
                    <th>USUARIO</th>
                     <th>DIAS</th>

                   
                    <th>VALOR</th>
                    <th>ESTADO</th>
                     <th>PROGRESO</th>
                    <th>2.0X</th>
                     <th>ACTION</th>
                  </tr>
                </thead>
                <tbody>



                    <?php 
foreach ($suscriptions as $key) {
  // code...
  $id_suscripcion =  $key['id_suscripcion'];
$stat = $key['status_pack'];
$progreso = $key['status_progres'];
                   ?>
                  <tr>
                    <td><?php echo 'Pack '.$key['paquete']; ?></td>

                     <td><?php echo $key['usuario']; ?></td>
                    <td> <?php
                     $fecha=  $key['fecha_pago'];
                   echo fecha_diff($fecha);
                     ?></td>



                    <td><?php echo '$'.$key['valor']; ?></td>
                    <td>

                      <?php 
               if ($stat == 0) {
                echo '<span class="badge bg-danger">No Active</span>';
               }elseif($stat == 1){
               echo ' <span class="badge bg-success">Active</span>';
               }
                  //se ha guardado un boton en esta variable por si se necesitara en el futuro

   $del =' <a href ="?module=suscripcion&op=d-suscript&d=<?php echo $id_suscripcion?> "  class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>';

                       ?>
                     

                    </td>


                     <td>

                      <?php 
               if ($progreso == 0) {
                echo '<span class="badge bg-danger">En Progreso</span>';
               }elseif($progreso == 1){
               echo ' <span class="badge bg-success">Completado</span>';
               }
                  //se ha guardado un boton en esta variable por si se necesitara en el futuro

   $del =' <a href ="?module=suscripcion&op=d-suscript&d=<?php echo $id_suscripcion?> "  class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>';

                       ?>
                     

                    </td>
                    <td><a href="?module=suscripcion&op=factura&suscripcion=<?php echo $id_suscripcion; ?>" class="btn btn-success btn-xs">Detalles</a></td>
                    <td><div >


                           <!-- <a href ="?module=suscripcion&op=activar&suscript=<?php echo $id_suscripcion ?>" class="btn btn-success btn-xs"><i class="fa fa-check"></i>Activar</a><span style="padding-right: 15px;"></span>-->
                             <a onclick="confirmActive(<?php echo $id_suscripcion; ?>)" href ="#"  class="btn btn-success btn-xs"><i class="fa fa-check ">Activar</i></a>
                        
                        </div>
                      </td>
                  </tr>
                  


                  <?php 


                  } ?>
                </tbody>
        </table>



            </div>
            </div>