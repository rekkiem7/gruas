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
                			<td style="text-align:center"><button class="btn btn-primary" onclick="editar_usuario(<?php echo $row->id?>)"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></td>
                			<td style="text-align:center"><button class="btn btn-danger" onclick="eliminar_usuario(<?php echo $row->id?>)"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button></td>
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
            <input type="text" class="form-control required" id="usuario" name="usuario" onblur="verificar_usuario();" placeholder="Usuario de acceso"/>
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

<div id="popup_EditarUsuario" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Editar Usuario</h4>
      </div>
      <div class="modal-body">
          <label class="col-lg-4 col-md-4 col-sm-4 col-xs-12 control-label">Nombre</label>
          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 input-group" style="margin-bottom: 25px">
           <input type="hidden" class="form-control" id="id_edit" name="id_edit" />
            <input type="text" class="form-control required" id="nombre_edit" name="nombre_edit" placeholder="Nombre de Usuario"/>
          </div>
          <label class="col-lg-4 col-md-4 col-sm-4 col-xs-12 control-label">Usuario</label>
          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 input-group" style="margin-bottom: 25px">
            <input type="text" class="form-control required" id="usuario_edit" name="usuario_edit" onblur="verificar_usuario2();" placeholder="Usuario de acceso"/>
          </div>
          <label class="col-lg-4 col-md-4 col-sm-4 col-xs-12 control-label">Password</label>
          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 input-group" style="margin-bottom: 25px">
            <input type="password" class="form-control required" id="password_edit" name="password_edit" placeholder="Contraseña"/>
          </div>
          <label class="col-lg-4 col-md-4 col-sm-4 col-xs-12 control-label">Tipo de Usuario</label>
          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 input-group" style="margin-bottom: 25px">
            <select class="form-control" id="tipo_edit" name="tipo_edit">
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
        <button type="button" class="btn btn-primary" onclick="update_usuario()"><span class="glyphicon glyphicon-floppy-saved" aria-hidden="true" ></span>&nbsp;Editar Usuario</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>&nbsp;Cerrar</button>
      </div>
    </div>

  </div>
</div>
</body>
<script>
function update_usuario()
{
  var id=$('#id_edit').val();
  var nombre=$('#nombre_edit').val();
  var usuario=$('#usuario_edit').val();
  var password=$('#password_edit').val();
  var tipo=$('#tipo_edit').val();

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
                    url:"<?php echo site_url('Usuario/update_usuario');?>",
                    data:{id:id,nombre:nombre,usuario:usuario,password:password,tipo:tipo},
                    success:function(data)
                    {
                      if(data==1)
                      {
                        swal("Usuario Actualizado", "El usuario ha sido actualizado correctamente", "success");
                        $('#popup_EditarUsuario').modal('hide');
                        setTimeout(function(){ swal.close(); window.open("<?php echo site_url('Usuario/index');?>","_self");}, 1500);
                        
                      }
                      else
                      {
                          swal("Error", "Problema al intentar actualizar el usuario, por favor inténtelo nuevamente", "error");
                      }
                    }
                });
              }
          }
      }
  }

}
function editar_usuario(id)
{
  $('#nombre_edit').val('');
  $('#usuario_edit').val('');
  $('#password_edit').val('');
  $('#tipo_edit').val(0);
  
  $.ajax({
            type:"POST",
            url:"<?php echo site_url('Usuario/info_usuario');?>",
            data:{usuario:id},
            success:function(data)
            {
                if(data!=0)
                {
                  var datos=JSON.parse(data);
                  $('#nombre_edit').val(datos[0]["nombre"]);
                  $('#usuario_edit').val(datos[0]["nombre_usuario"]);
                  $('#password_edit').val(datos[0]["clave"]);
                  $('#tipo_edit').val(datos[0]["tipousuario"]);
                  $('#id_edit').val(id);
                  $('#popup_EditarUsuario').modal();
                }
                else
                {
                  swal("Error", "Se ha producido un error al consultar la información del usuario, por favor inténtelo nuevamente", "info");
                }
            }
        });
  
}
function eliminar_usuario(id)
{

  swal({   title: "¿Desea eliminar el usuario?",   text: "El usuario no tendrá acceso al sistema una vez eliminado",   type: "warning",   showCancelButton: true,   confirmButtonColor: "#CC0000",   confirmButtonText: "Eliminar",   cancelButtonText: "Cancelar",   closeOnConfirm: true,   closeOnCancel: true }, function(isConfirm){   if (isConfirm) {
        $.ajax({
            type:"POST",
            url:"<?php echo site_url('Usuario/eliminar_usuario');?>",
            data:{usuario:id},
            success:function(data)
            {
              if(data==1)
              {
                 swal("Usuario Eliminado", "El usuario ha sido eliminado correctamente", "success");
                 setTimeout(function(){ swal.close(); window.open("<?php echo site_url('Usuario/index');?>","_self");}, 1500);
              }
              else
              {
                swal("Error", "Se ha producido un error al eliminar el usuario, por favor inténtelo nuevamente", "error");
              }
            }
      });
    }
  });
}
function verificar_usuario2()
{
  var id=$('#id_edit').val();
  var usuario=$('#usuario_edit').val();
  if(usuario!='' || usuario.length!=0)
  {
    $.ajax({
            type:"POST",
            url:"<?php echo site_url('Usuario/verificar_usuario2');?>",
            data:{id:id,usuario:usuario},
            success:function(data)
            {
              if(data==1)
              {
                $('#usuario_edit').val('');
                $('#usuario_edit').focus();
                swal("Usuario Existente", "El nombre de usuario ya se encuentra utilizado por otra cuenta.", "info");
              }
            }
      });
  }
}
function verificar_usuario()
{
  var usuario=$('#usuario').val();
  if(usuario!='' || usuario.length!=0)
  {
      $.ajax({
            type:"POST",
            url:"<?php echo site_url('Usuario/verificar_usuario');?>",
            data:{usuario:usuario},
            success:function(data)
            {
              if(data==1)
              {
                $('#usuario').val('');
                $('#usuario').focus();
                swal("Usuario Existente", "El nombre de usuario ya se encuentra utilizado por otra cuenta.", "info");
              }
            }
      });
  }
}
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
                        $('#popup_AgregarUsuario').modal('hide');
                        setTimeout(function(){ swal.close(); window.open("<?php echo site_url('Usuario/index');?>","_self");}, 1500);
                        
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
  $('#nombre').val('');
  $('#usuario').val('');
  $('#password').val('');
  $('#tipo').val(0);
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