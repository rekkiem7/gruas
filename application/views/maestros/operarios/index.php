<style>
.modal.modal-wide .modal-dialog{
    width: 70%;
}

.modal-wide .modal-body {
  overflow-y: auto;
}

@media screen and (max-width: 768px) {
    
  .modal.modal-wide .modal-dialog{
    width: 100%;
    }

.modal-wide .modal-body {
  overflow-y: auto;
    } 

}

#popup_AgregarOperario .modal-body{
    width: auto;
    height: auto;
}
.brand-primary{
	background-color: #428bca;
	color:#ffffff;
}
</style>
<body>
<div class="container">
<div class="animated fadeInRight"><center><h4>Maestro Operarios</h4></center></div><br><br>
<center><div><button class="btn btn-success" onclick="agregar_operario();"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;Agregar Operario</button></div></center><br>
	<div class="table-responsive">
		<table id="operarios" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>R.U.T</th>
                  <th>Nombre</th>
                  <th>Ver más datos</th>
                  <th>Editar</th>
                  <th>Eliminar</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if(!empty($operarios))
                {
                	foreach($operarios as $row)
                	{?>
                	<tr>
                		<td><?php echo $row->Rut?></td>
                		<td><?php echo $row->Nombre?></td>
                		<td style="text-align:center"><button class="btn btn-info" onclick="ver_operario(<?php echo $row->id?>)"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                		</td>
                		<td style="text-align:center"><button class="btn btn-primary" onclick="editar_operario(<?php echo $row->id?>)"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
                		</td>
                		<td style="text-align:center"><button class="btn btn-danger" onclick="eliminar_operario(<?php echo $row->id?>)"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                		</td>
                	</tr>
                	<?php
                	}
                }
                ?>
                </tbody>
         </table>
	</div>
</div>
<!--Modal-->
<div id="popup_AgregarOperario" class="modal modal-wide fade" role="dialog">
	<div class="modal-dialog">
	    <div class="modal-content">
	    	<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal">&times;</button>
	        	<h4 class="modal-title">Agregar Operarios</h4>
	      	</div>
	      	<div class="modal-body">
	      		<div class="row">
		        	<div class="col-lg-12 ">
		         		<label class="col-lg-2 col-md-4 col-sm-12 col-xs-12 control-label">Rut</label>
		          		<div class="col-lg-10 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
		            		<input type="text" class="form-control required" id="rut" name="rut" placeholder="Rut del operario"/>
		          		</div>
		        	</div>
		        	<div class="col-lg-12 ">
		         		<label class="col-lg-2 col-md-4 col-sm-12 col-xs-12 control-label">Nombre</label>
		          		<div class="col-lg-10 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
		            		<input type="text" class="form-control required" id="nombre" name="nombre" placeholder="Nombre del operario"/>
		          		</div>
		        	</div>
		        	<div class="col-lg-12 ">
		         		<label class="col-lg-2 col-md-4 col-sm-12 col-xs-12 control-label">Dirección</label>
		          		<div class="col-lg-10 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
		            		<input type="text" class="form-control required" id="direccion" name="direccion" placeholder="Dirección del operario"/>
		          		</div>
		        	</div>      
		       		<div class="col-lg-12 ">
		         		<label class="col-lg-2 col-md-4 col-sm-12 col-xs-12 control-label">Comuna</label>
		          		<div class="col-lg-10 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
		            		<input type="text" class="form-control required" id="comuna" name="comuna" placeholder="Comuna del operario"/>
		          		</div>
		        	</div> 
		        	<div class="col-lg-12 ">
		         		<label class="col-lg-2 col-md-4 col-sm-12 col-xs-12 control-label">Ciudad</label>
		          		<div class="col-lg-10 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
		            		<input type="text" class="form-control required" id="ciudad" name="ciudad" placeholder="Ciudad del operario"/>
		          		</div>
		        	</div> 
		        	<div class="col-lg-12 ">
		         		<label class="col-lg-2 col-md-4 col-sm-12 col-xs-12 control-label">Tipo</label>
		          		<div class="col-lg-10 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
		            		<select type="text" class="form-control required" id="tipo" name="tipo"/> 
						       <option value="">Seleccionar...</option>
						       <?php
						       foreach($tiposoperarios as $lsOpe)
						       {?>
						       	<option value="<?=$lsOpe->id?>"><?=$lsOpe->nombre?></option>
						       	<?php }
						       ?>

						       </select>
		          		</div>
		        	</div>	        
	      		</div>
	      		<div class="modal-footer">
	        		<button type="button" class="btn btn-primary" onclick="add_operario()"><span class="glyphicon glyphicon-floppy-saved" aria-hidden="true" ></span>&nbsp;Guardar Operario</button>
	        		<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>&nbsp;Cerrar</button>
	      		</div>
	    	</div>
	  	</div>
	</div>
</div>
<!--Modal-->
<div id="popup_infoOperario" class="modal modal-wide fade" role="dialog">
	<div class="modal-dialog">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal">&times;</button>
        		<h4 class="modal-title">Información del Operario</h4>
      		</div>
      		<div class="modal-body">
      			<table class="table table-bordered table-hover">
      				<tr>
      					<td width="20%" class="brand-primary">Rut</td>
      					<td id="info_rut" class="infox"></td>		
      				</tr>
      				<tr>
			      		<td class="brand-primary">Nombre</td>
			      		<td id="info_nombre" class="infox"></td>		
			      	</tr>
			      	<tr>
			      		<td class="brand-primary">Dirección</td>
			      		<td  id="info_direccion" class="infox"></td>		
			      	</tr>
			      	<tr>
			      		<td class="brand-primary">Comuna</td>
			      		<td id="info_comuna" class="infox"></td>		
			      	</tr>
			      	<tr>
			      		<td class="brand-primary">Ciudad</td>
			      		<td id="info_ciudad" class="infox"></td>		
			      	</tr>
			      	<tr>
			      		<td class="brand-primary">Tipo</td>
			      		<td id="info_tipo" class="infox"></td>		
			      	</tr>
      			</table>
      		</div>
    	</div>
  	</div>
</div>
<div id="popup_EditarOperario" class="modal modal-wide fade" role="dialog">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Editar Operario</h4>
      </div>
      <div class="modal-body">
			<div class="row">
				<input type="hidden" class="form-control required" id="id_edit" name="id_edit"/>
		        	<div class="col-lg-12 ">
		         		<label class="col-lg-2 col-md-4 col-sm-12 col-xs-12 control-label">Rut</label>
		          		<div class="col-lg-10 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
		            		<input type="text" class="form-control required" id="rut_edit" name="rut_edit" placeholder="Rut del operario"/>
		          		</div>
		        	</div>
		        	<div class="col-lg-12 ">
		         		<label class="col-lg-2 col-md-4 col-sm-12 col-xs-12 control-label">Nombre</label>
		          		<div class="col-lg-10 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
		            		<input type="text" class="form-control required" id="nombre_edit" name="nombre_edit" placeholder="Nombre del operario"/>
		          		</div>
		        	</div>
		        	<div class="col-lg-12 ">
		         		<label class="col-lg-2 col-md-4 col-sm-12 col-xs-12 control-label">Dirección</label>
		          		<div class="col-lg-10 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
		            		<input type="text" class="form-control required" id="direccion_edit" name="direccion_edit" placeholder="Dirección del operario"/>
		          		</div>
		        	</div>      
		       		<div class="col-lg-12 ">
		         		<label class="col-lg-2 col-md-4 col-sm-12 col-xs-12 control-label">Comuna</label>
		          		<div class="col-lg-10 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
		            		<input type="text" class="form-control required" id="comuna_edit" name="comuna_edit" placeholder="Comuna del operario"/>
		          		</div>
		        	</div> 
		        	<div class="col-lg-12 ">
		         		<label class="col-lg-2 col-md-4 col-sm-12 col-xs-12 control-label">Ciudad</label>
		          		<div class="col-lg-10 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
		            		<input type="text" class="form-control required" id="ciudad_edit" name="ciudad_edit" placeholder="Ciudad del operario"/>
		          		</div>
		        	</div> 
		        	<div class="col-lg-12 ">
		         		<label class="col-lg-2 col-md-4 col-sm-12 col-xs-12 control-label">Tipo</label>
		          		<div class="col-lg-10 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
		            		<select type="text" class="form-control required" id="tipo_edit" name="tipo_edit"/> 
						       <option value="">Seleccionar...</option>
						       <?php
						       foreach($tiposoperarios as $lsOpe)
						       {
						       	?>
						       	<option value="<?=$lsOpe->id?>"><?=$lsOpe->nombre?></option>
						       	<?php }
						       ?>
						       </select>
		          		</div>
		        	</div>	        
	      		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="update_operario()"><span class="glyphicon glyphicon-floppy-saved" aria-hidden="true" ></span>&nbsp;Editar Operario</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>&nbsp;Cerrar</button>
      </div>
    </div>

  </div>
</div>
<!--Modal-->
</body>
<script>
function update_operario()
{
	var id=$('#id_edit').val();
	var rut=$('#rut_edit').val();
	var nombre=$('#nombre_edit').val();
	var direccion=$('#direccion_edit').val();
	var comuna=$('#comuna_edit').val();
	var ciudad=$('#ciudad_edit').val();
	var tipo=$('#tipo_edit').val();

	if(rut=='')
	{
		swal("RUT Faltante", "Debe ingresar el rut del operario", "info");
	}
	else
	{
		if(nombre=='')
		{
			swal("Nombre Faltante", "Debe ingresar el nombre del operario", "info");
		}
		else
		{
			if(direccion=='')
			{
				swal("Dirección Faltante", "Debe ingresar la dirección del operario", "info");
			}
			else
			{
				if(comuna=='')
				{
					swal("Comuna Faltante", "Debe ingresar la comuna del operario", "info");
				}
				else
				{
					if(ciudad=='')
					{	
						swal("Ciudad Faltante", "Debe ingresar la ciudad del operario", "info");
					}
					else
					{
						if(tipo=='')
						{
							swal("Tipo Faltante", "Debe seleccionar el tipo del operario", "info");
						}
						else
						{
							$.ajax({
			                    type:"POST",
			                    url:"<?php echo site_url('Maestro/update_operario');?>",
			                    data:{id:id,rut:rut,nombre:nombre,direccion:direccion,comuna:comuna,ciudad:ciudad,tipo:tipo},
			                    success:function(data)
			                    {
			                      if(data==1)
			                      {
			                        swal("Operario Actualizado", "El operario ha sido actualizado correctamente", "success");
			                        $('#popup_EditarOperario').modal('hide');
			                        setTimeout(function(){ swal.close(); window.open("<?php echo site_url('Maestro/operarios');?>","_self");}, 1500);
			                        
			                      }
			                      else
			                      {
			                          swal("Error", "Problema al intentar actualizar el operarios, por favor inténtelo nuevamente", "error");
			                      }
			                    }
			                });	
						}
					}
				}
			}
		}
	}


}

function editar_operario(id)
{
	$.ajax({
            type:"POST",
            url:"<?php echo site_url('Maestro/info_operario');?>",
            data:{id:id},
            success:function(data)
            {
            	if(data!=0)
            	{
            		var datos=JSON.parse(data);
            		$('#id_edit').val(id);
            		$('#rut_edit').val(datos[0]["Rut"]);
            		$('#nombre_edit').val(datos[0]["Nombre"]);
            		$('#direccion_edit').val(datos[0]["Direccion"]);
            		$('#comuna_edit').val(datos[0]["Comuna"]);
            		$('#ciudad_edit').val(datos[0]["Ciudad"]);
            		$('#tipo_edit').val(datos[0]["Tipoid"]);
            		$('#popup_EditarOperario').modal();
            	}
            	else
            	{
            		swal("Error", "Se ha producido un error al consultar el operario, por favor inténtelo nuevamente", "error");
            	}
            }
     });
}
function ver_operario(id)
{
	$.ajax({
            type:"POST",
            url:"<?php echo site_url('Maestro/info_operario');?>",
            data:{id:id},
            success:function(data)
            {
            	$(".infox").empty();
            	if(data!=0)
            	{
            		var datos=JSON.parse(data);
            		$('#info_rut').append(datos[0]["Rut"]);
            		$('#info_nombre').append(datos[0]["Nombre"]);
            		$('#info_direccion').append(datos[0]["Direccion"]);
            		$('#info_comuna').append(datos[0]["Comuna"]);
            		$('#info_ciudad').append(datos[0]["Ciudad"]);
            		$('#info_tipo').append(datos[0]["Tiponombre"]);
            		$('#popup_infoOperario').modal();

            	}
            	else
            	{
            		swal("Error", "Se ha producido un error al consultar el operario, por favor inténtelo nuevamente", "error");
            	}
            }
    });
}
function eliminar_operario(id)
{
	swal({   title: "¿Desea eliminar el Operario?",   text: "El Operario no aparecerá en la aplicación",   type: "warning",   showCancelButton: true,   confirmButtonColor: "#CC0000",   confirmButtonText: "Eliminar",   cancelButtonText: "Cancelar",   closeOnConfirm: true,   closeOnCancel: true }, function(isConfirm){   if (isConfirm) {

		$.ajax({
            type:"POST",
            url:"<?php echo site_url('Maestro/delete_operario');?>",
            data:{id:id},
            success:function(data)
            {
            	if(data==1)
	              {
	                 swal("Operario Eliminado", "El operario ha sido eliminado correctamente", "success");
	                 setTimeout(function(){ swal.close(); window.open("<?php echo site_url('Maestro/operarios');?>","_self");}, 1500);
	              }
	              else
	              {
	                swal("Error", "Se ha producido un error al eliminar el operario, por favor inténtelo nuevamente", "error");
	              }
            }
       });
	}
  });
}
function add_operario()
{
	var rut=$('#rut').val();
	var nombre=$('#nombre').val();
	var direccion=$('#direccion').val();
	var comuna=$('#comuna').val();
	var ciudad=$('#ciudad').val();
	var tipo=$('#tipo').val();

	if(rut=='')
	{
		swal("RUT Faltante", "Debe ingresar el rut del operario", "info");
	}
	else
	{
		if(nombre=='')
		{
			swal("Nombre Faltante", "Debe ingresar el nombre del operario", "info");
		}
		else
		{
			if(direccion=='')
			{
				swal("Dirección Faltante", "Debe ingresar la dirección del operario", "info");
			}
			else
			{
				if(comuna=='')
				{
					swal("Comuna Faltante", "Debe ingresar la comuna del operario", "info");
				}
				else
				{
					if(ciudad=='')
					{	
						swal("Ciudad Faltante", "Debe ingresar la ciudad del operario", "info");
					}
					else
					{
						if(tipo=='')
						{
							swal("Tipo Faltante", "Debe seleccionar el tipo del operario", "info");
						}
						else
						{
							$.ajax({
			                    type:"POST",
			                    url:"<?php echo site_url('Maestro/add_operario');?>",
			                    data:{rut:rut,nombre:nombre,direccion:direccion,comuna:comuna,ciudad:ciudad,tipo:tipo},
			                    success:function(data)
			                    {
			                      if(data==1)
			                      {
			                        swal("Operario Registrado", "El operario ha sido ingresado correctamente", "success");
			                        $('#popup_AgregarOperario').modal('hide');
			                        setTimeout(function(){ swal.close(); window.open("<?php echo site_url('Maestro/operarios');?>","_self");}, 1500);
			                        
			                      }
			                      else
			                      {
			                          swal("Error", "Problema al intentar registrar el operario, por favor inténtelo nuevamente", "error");
			                      }
			                    }
			                });
						}
					}
				}
			}
		}
	}
}
function agregar_operario()
{
	$('#popup_AgregarOperario').modal();
}
$(document).ready(function()
{
  $('#operarios').DataTable({
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
