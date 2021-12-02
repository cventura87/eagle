

  

              
   <div class="col-md-12">
  <div class="content-panel" style="padding: 15px 15px 15px 15px;">
    <h4> usuarios registrados</h4>
    <hr>
 

    
<table id="datatable_example" class="display" width="100%" cellspacing="0">
<thead>
        <tr>
          <th>ID</th>
          <th>USUARIO</th>
          <th>CODE</th>
          <th>EMAIL</th>
          <th>PATROCINADOR</th>
          <th>NOMBRE</th>
          <th style=" white-space: nowrap; width: 1%;"></th>
           <th style=" white-space: nowrap; width: 1%;"></th>

        </tr>
      </thead>
      </table>
     



  </div>
</div>

<div id="us"></div>

 <!-- Modal -->
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="userEdit" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Forgot Password ?</h4>
              </div>
              <div class="modal-body">
                <p>Ingrese una nueva Contraseña</p>
                <input type="text" name="pass1" placeholder="Password" id="pass1" autocomplete="off" class="form-control placeholder-no-fix">
                <p>Repetir Contraseña</p>
                <input type="text" name="pass2" placeholder="Repeat password" id="pass2" autocomplete="off" class="form-control placeholder-no-fix">
              </div>
              <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                <input class="btn btn-theme" type="submit" value="Save">
              </div>
            </div>
          </div>
        </div>
        <!-- modal -->