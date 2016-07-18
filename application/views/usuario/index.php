<body>
<div class="container">
<div class="animated fadeInRight"><center><h4>Definición de Usuarios</h4></center></div><br><br>
<center><div><button class="btn btn-success" onclick="agregar_usuario();"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;Agregar Usuario</button></div></center><br>
	<div class="table-responsive">
		<table id="usuarios" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Usuario</th>
                  <th>Tipo de Usuario</th>
                  <th style="text-align:center">Editar</th>
                  <th style="text-align:center">Eliminar</th>
                </tr>
                </thead>
                <tbody>
                <?php
                	foreach($usuarios as $row)
                	{?>
                		<tr>
                			<td><?php echo $row->id?></td>
                      <td><?php echo $row->nombre?></td>
                			<td><?php echo $row->nombre_usuario?></td>
                			<td><?php echo $row->nombre_tipo?></td>
                			<td style="text-align:center"><button class="btn btn-primary"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></td>
                			<td style="text-align:center"><button class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button></td>
                		</tr>
                <?php
                	} 
                ?>
                </tbody>
        </table>
	</div>
</div>

<!--Modal-->
<div id="popup_AgregarUsuario" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Agregar Usuario</h4>
      </div>
      <div class="modal-body">
          <label class="col-lg-4 col-md-4 col-sm-4 col-xs-12 control-label">Nombre</label>
          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 input-group" style="margin-bottom: 25px">
            <input type="text" class="form-control required" id="nombre" name="nombre" placeholder="Nombre de Usuario"/>
          </div>
          <label class="col-lg-4 col-md-4 col-sm-4 col-xs-12 control-label">Usuario</label>
          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 input-group" style="margin-bottom: 25px">
            <input type="text" class="form-control required" id="usuario" name="usuario" placeholder="Usuario de acceso"/>
          </div>
          <label class="col-lg-4 col-md-4 col-sm-4 col-xs-12 control-label">Password</label>
          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 input-group" style="margin-bottom: 25px">
            <input type="password" class="form-control required" id="password" name="password" placeholder="Contraseña"/>
          </div>
          <label class="col-lg-4 col-md-4 col-sm-4 col-xs-12 control-label">Tipo de Usuario</label>
          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 input-group" style="margin-bottom: 25px">
            <select class="form-control" id="tipo" name="tipo">
              <option value="0">Selecciona el tipo de usuario</option>
              <?php
              foreach($tipos as $row2)
              {?>
              <option value="<?php echo $row2->id?>"><?php echo $row2->nombre?></option>
              <?php
              }
              ?>
            </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="add_usuario()"><span class="glyphicon glyphicon-floppy-saved" aria-hidden="true" ></span>&nbsp;Guardar Usuario</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>&nbsp;Cerrar</button>
      </div>
    </div>

  </div>
</div>
<!--Modal-->
</body>
<script>
function add_usuario()
{
  var nombre=$('#nombre').val();
  var usuario=$('#usuario').val();
  var password=$('#password').val();
  var tipo=$('#tipo').val();

  if(nombre=="")
  {
       swal("Nombre Faltante", "Debe ingresar el nombre completo del usuario", "info");
  }
  else
  {
      if(usuario=="")
      {
        swal("Usuario Faltante", "Debe ingresar el nombre usuario de acceso", "info");
      }
      else
      {
          if(password=="")
          {
            swal("Contraseña Faltante", "Debe ingresar la contraseña", "info");
          }
          else
          {
              if(tipo==0)
              {
                swal("Tipo Usuario Faltante", "Debe seleccionar el tipo de usuario", "info");
              }
              else
              {
                 $.ajax({
                    type:"POST",
                    url:"<?php echo site_url('Usuario/add_usuario');?>",
                    data:{nombre:nombre,usuario:usuario,password:password,tipo:tipo},
                    success:function(data)
                    {
                      if(data==1)
                      {
                        swal("Usuario Creado", "El usuario ha sido creado exitosamente", "success");
                      }
                      else
                      {
                          swal("Error", "Problema al intentar crear el usuario, por favor inténtelo nuevamente", "error");
                      }
                    }
                });
              }
          }
      }
  }
}
function agregar_usuario()
{
  $('#popup_AgregarUsuario').modal();
}
$(document).ready(function()
{
  $('#usuarios').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "language": {
            "search":"Buscar:",
            "lengthMenu": "Ver _MENU_ registros por página",
            "zeroRecords": "<center>No se encontraron registros</center>",
            "info": "_END_ de _TOTAL_ registros",
            "infoEmpty": "No se encontraron registros",
            "infoFiltered": "(Filtrados _TOTAL_ de _MAX_ total registros)",
            "paginate":{
              "previous":"Anterior",
              "next":"Siguiente"
            }
        },      
    });
});
</script>