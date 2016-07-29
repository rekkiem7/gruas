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

#popup_AgregarRazonsocial .modal-body{
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
<div class="animated fadeInRight"><center><h4>Maestro Razon Social</h4></center></div><br><br>
<center><div><button class="btn btn-success" onclick="agregar_razonsocial();"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;Agregar Razon Social</button></div></center><br>
	<div class="table-responsive">
		<table id="razonessociales" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>R.U.T</th>
                  <th>Razón Social</th>
                  <th>Ver más datos</th>
                  <th>Editar</th>
                  <th>Eliminar</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if(!empty($razonessociales))
                {
                	foreach($razonessociales as $row)
                	{?>
                	<tr>
                		<td><?php echo $row->Rut?></td>
                		<td><?php echo $row->Razonsocial?></td>
                		<td style="text-align:center"><button class="btn btn-info" onclick="ver_razonsocial(<?php echo $row->id?>)"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                		</td>
                		<td style="text-align:center"><button class="btn btn-primary" onclick="editar_razonsocial(<?php echo $row->id?>)"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
                		</td>
                		<td style="text-align:center"><button class="btn btn-danger" onclick="eliminar_razonsocial(<?php echo $row->id?>)"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
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
<div id="popup_AgregarRazonSocial" class="modal modal-wide fade" role="dialog">
	<div class="modal-dialog">
	    <div class="modal-content">
	    	<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal">&times;</button>
	        	<h4 class="modal-title">Agregar Razon Social</h4>
	      	</div>
	      	<div class="modal-body">
	      		<div class="row">
		        	<div class="col-lg-12 ">
		         		<label class="col-lg-2 col-md-4 col-sm-12 col-xs-12 control-label">Rut</label>
		          		<div class="col-lg-10 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
		            		<input type="text" class="form-control required" id="rut" name="rut" placeholder="Rut de la razon social"/>
		          		</div>
		        	</div>
		        	<div class="col-lg-12 ">
		         		<label class="col-lg-2 col-md-4 col-sm-12 col-xs-12 control-label">Razón Social</label>
		          		<div class="col-lg-10 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
		            		<input type="text" class="form-control required" id="razonsocial" name="razonsocial" placeholder="Nombre de la razon social"/>
		          		</div>
		        	</div>
		        	<div class="col-lg-12 ">
		         		<label class="col-lg-2 col-md-4 col-sm-12 col-xs-12 control-label">Rubro</label>
		          		<div class="col-lg-10 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
		            		<input type="text" class="form-control required" id="rubro" name="rubro" placeholder="Rubro de la razon social"/>
		          		</div>
		        	</div>		        	
		        	<div class="col-lg-12 ">
		         		<label class="col-lg-2 col-md-4 col-sm-12 col-xs-12 control-label">Dirección</label>
		          		<div class="col-lg-10 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
		            		<input type="text" class="form-control required" id="direccion" name="direccion" placeholder="Dirección de la razon social"/>
		          		</div>
		        	</div>      
		       		<div class="col-lg-12 ">
		         		<label class="col-lg-2 col-md-4 col-sm-12 col-xs-12 control-label">Casilla</label>
		          		<div class="col-lg-10 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
		            		<input type="text" class="form-control required" id="casilla" name="casilla" placeholder="Casilla de la razon social"/>
		          		</div>
		        	</div> 
		        	<div class="col-lg-12 ">
		         		<label class="col-lg-2 col-md-4 col-sm-12 col-xs-12 control-label">Fono</label>
		          		<div class="col-lg-10 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
		            		<input type="text" class="form-control required" id="fono" name="fono" placeholder="Fono de la razon social"/>
		          		</div>
		        	</div>   
		        	<div class="col-lg-12 ">
		         		<label class="col-lg-2 col-md-4 col-sm-12 col-xs-12 control-label">Ciudad</label>
		          		<div class="col-lg-10 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
		            		<input type="text" class="form-control required" id="ciudad" name="ciudad" placeholder="Ciudad de la razon social"/>
		          		</div>
		        	</div> 		        	      
	      		</div>
	      		<div class="modal-footer">
	        		<button type="button" class="btn btn-primary" onclick="add_razonsocial()"><span class="glyphicon glyphicon-floppy-saved" aria-hidden="true" ></span>&nbsp;Guardar Razon Social</button>
	        		<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>&nbsp;Cerrar</button>
	      		</div>
	    	</div>
	  	</div>
	</div>
</div>
<!--Modal-->
<div id="popup_infoRazonSocial" class="modal modal-wide fade" role="dialog">
	<div class="modal-dialog">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal">&times;</button>
        		<h4 class="modal-title">Información de la Razon Social</h4>
      		</div>
      		<div class="modal-body">
      			<table class="table table-bordered table-hover">
      				<tr>
      					<td width="20%" class="brand-primary">Rut</td>
      					<td id="info_rut" class="infox"></td>		
      				</tr>
      				<tr>
			      		<td class="brand-primary">Razon Social</td>
			      		<td id="info_razonsocial" class="infox"></td>		
			      	</tr>
			      	<tr>
			      		<td class="brand-primary">Rubro</td>
			      		<td  id="info_rubro" class="infox"></td>		
			      	</tr>
			      	<tr>
			      		<td class="brand-primary">Dirección</td>
			      		<td id="info_direccion" class="infox"></td>		
			      	</tr>
			      	<tr>
			      		<td class="brand-primary">Casilla</td>
			      		<td id="info_casilla" class="infox"></td>		
			      	</tr>
			      	<tr>
			      		<td class="brand-primary">Fono</td>
			      		<td id="info_fono" class="infox"></td>		
			      	</tr>
			      	<tr>
			      		<td class="brand-primary">Ciudad</td>
			      		<td id="info_ciudad" class="infox"></td>		
			      	</tr>			      	
      			</table>
      		</div>
    	</div>
  	</div>
</div>
<div id="popup_EditarRazonSocial" class="modal modal-wide fade" role="dialog">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Editar Razon Social</h4>
      </div>
      <div class="modal-body">
			<div class="row">
				<input type="hidden" class="form-control required" id="id_edit" name="id_edit"/>
		        	<div class="col-lg-12 ">
		         		<label class="col-lg-2 col-md-4 col-sm-12 col-xs-12 control-label">Rut</label>
		          		<div class="col-lg-10 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
		            		<input type="text" class="form-control required" id="rut_edit" name="rut_edit" placeholder="Rut de la razon social"/>
		          		</div>
		        	</div>
		        	<div class="col-lg-12 ">
		         		<label class="col-lg-2 col-md-4 col-sm-12 col-xs-12 control-label">Razón Social</label>
		          		<div class="col-lg-10 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
		            		<input type="text" class="form-control required" id="razonsocial_edit" name="razonsocial_edit" placeholder="Nombre de la razon social"/>
		          		</div>
		        	</div>
		        	<div class="col-lg-12 ">
		         		<label class="col-lg-2 col-md-4 col-sm-12 col-xs-12 control-label">Rubro</label>
		          		<div class="col-lg-10 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
		            		<input type="text" class="form-control required" id="rubro_edit" name="rubro_edit" placeholder="Rubro de la razon social"/>
		          		</div>
		        	</div>		        	
		        	<div class="col-lg-12 ">
		         		<label class="col-lg-2 col-md-4 col-sm-12 col-xs-12 control-label">Dirección</label>
		          		<div class="col-lg-10 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
		            		<input type="text" class="form-control required" id="direccion_edit" name="direccion_edit" placeholder="Dirección de la razon social"/>
		          		</div>
		        	</div>      
		       		<div class="col-lg-12 ">
		         		<label class="col-lg-2 col-md-4 col-sm-12 col-xs-12 control-label">Casilla</label>
		          		<div class="col-lg-10 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
		            		<input type="text" class="form-control required" id="casilla_edit" name="casilla_edit" placeholder="Casilla de la razon social"/>
		          		</div>
		        	</div> 
		        	<div class="col-lg-12 ">
		         		<label class="col-lg-2 col-md-4 col-sm-12 col-xs-12 control-label">Fono</label>
		          		<div class="col-lg-10 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
		            		<input type="text" class="form-control required" id="fono_edit" name="fono_edit" placeholder="Fono de la razon social"/>
		          		</div>
		        	</div>   
		        	<div class="col-lg-12 ">
		         		<label class="col-lg-2 col-md-4 col-sm-12 col-xs-12 control-label">Ciudad</label>
		          		<div class="col-lg-10 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
		            		<input type="text" class="form-control required" id="ciudad_edit" name="ciudad_edit" placeholder="Ciudad de la razon social"/>
		          		</div>
		        	</div>
	      		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="update_razonsocial()"><span class="glyphicon glyphicon-floppy-saved" aria-hidden="true" ></span>&nbsp;Editar Razon Social</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>&nbsp;Cerrar</button>
      </div>
    </div>

  </div>
</div>
<!--Modal-->
</body>
<script>
function update_razonsocial()
{
	var id 			=$('#id_edit').val();
	var rut 		=$('#rut_edit').val();
	var razonsocial	=$('#razonsocial_edit').val();
	var rubro 	 	=$('#rubro_edit').val();
	var direccion 	=$('#direccion_edit').val();
	var casilla 	=$('#casilla_edit').val();
	var fono  		=$('#fono_edit').val();
	var ciudad 		=$('#ciudad_edit').val();

	if(rut=='')
	{
		swal("RUT Faltante", "Debe ingresar el rut de la razon social", "info");
	}
	else
	{
		if(razonsocial=='')
		{
			swal("Razon Social Faltante", "Debe ingresar la razon social", "info");
		}
		else
		{
			if(rubro=='')
			{
				swal("Rubro Faltante", "Debe ingresar la direcciónel rubro de la razon social", "info");
			}
			else
			{
				if(direccion=='')
				{
					swal("Dirección Faltante", "Debe ingresar la dirección de la razon social", "info");
				}
				else
				{
					if(casilla=='')
					{	
						swal("Casilla Faltante", "Debe ingresar la casilla de la razon social", "info");
					}
					else
					{
						if(fono=='')
						{	
							swal("Fono Faltante", "Debe ingresar el fono de la razon social", "info");
						}
						else
						{
							if(ciudad=='')
							{	
								swal("Ciudad Faltante", "Debe ingresar la ciudad de la razon social", "info");
							}
							else
							{
								$.ajax({
				                    type:"POST",
				                    url:"<?php echo site_url('Maestro/update_razonsocial');?>",
				                    data:{id:id,rut:rut,razonsocial:razonsocial,rubro:rubro,direccion:direccion,casilla:casilla,fono:fono,ciudad:ciudad},
				                    success:function(data)
				                    {
				                      if(data==1)
				                      {
				                        swal("Razon Social Actualizada", "La razon social ha sido actualizado correctamente", "success");
				                        $('#popup_EditarRazonSocial').modal('hide');
				                        setTimeout(function(){ swal.close(); window.open("<?php echo site_url('Maestro/razonessociales');?>","_self");}, 1500);
				                        
				                      }
				                      else
				                      {
				                          swal("Error", "Problema al intentar actualizar la razon social, por favor inténtelo nuevamente", "error");
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


}

function editar_razonsocial(id)
{
	$.ajax({
            type:"POST",
            url:"<?php echo site_url('Maestro/info_razonsocial');?>",
            data:{id:id},
            success:function(data)
            {
            	if(data!=0)
            	{
            		var datos=JSON.parse(data);
            		$('#id_edit').val(id);
            		$('#rut_edit').val(datos[0]["Rut"]);
            		$('#razonsocial_edit').val(datos[0]["Razonsocial"]);
            		$('#rubro_edit').val(datos[0]["Rubro"]);
            		$('#direccion_edit').val(datos[0]["Direccion"]);
            		$('#casilla_edit').val(datos[0]["Casilla"]);
            		$('#fono_edit').val(datos[0]["Fono"]);
            		$('#ciudad_edit').val(datos[0]["Ciudad"]);
            		$('#popup_EditarRazonSocial').modal();
            	}
            	else
            	{
            		swal("Error", "Se ha producido un error al consultar la razon social, por favor inténtelo nuevamente", "error");
            	}
            }
     });
}
function ver_razonsocial(id)
{
	$.ajax({
            type:"POST",
            url:"<?php echo site_url('Maestro/info_razonsocial');?>",
            data:{id:id},
            success:function(data)
            {
            	$(".infox").empty();
            	if(data!=0)
            	{
            		var datos=JSON.parse(data);
            		$('#info_rut').append(datos[0]["Rut"]);
            		$('#info_razonsocial').append(datos[0]["Razonsocial"]);
            		$('#info_rubro').append(datos[0]["Rubro"]);
            		$('#info_direccion').append(datos[0]["Direccion"]);
            		$('#info_casilla').append(datos[0]["Casilla"]);
            		$('#info_fono').append(datos[0]["Fono"]);
            		$('#info_ciudad').append(datos[0]["Ciudad"]);
            		$('#popup_infoRazonSocial').modal();

            	}
            	else
            	{
            		swal("Error", "Se ha producido un error al consultar la razon social, por favor inténtelo nuevamente", "error");
            	}
            }
    });
}
function eliminar_razonsocial(id)
{
	swal({   title: "¿Desea eliminar la Razon Social?",   text: "La razon social no aparecerá en la aplicación",   type: "warning",   showCancelButton: true,   confirmButtonColor: "#CC0000",   confirmButtonText: "Eliminar",   cancelButtonText: "Cancelar",   closeOnConfirm: true,   closeOnCancel: true }, function(isConfirm){   if (isConfirm) {

		$.ajax({
            type:"POST",
            url:"<?php echo site_url('Maestro/delete_razonsocial');?>",
            data:{id:id},
            success:function(data)
            {
            	if(data==1)
	              {
	                 swal("Razon Social Eliminada", "La razon osocial ha sido eliminada correctamente", "success");
	                 setTimeout(function(){ swal.close(); window.open("<?php echo site_url('Maestro/razonessociales');?>","_self");}, 1500);
	              }
	              else
	              {
	                swal("Error", "Se ha producido un error al eliminar la razon social, por favor inténtelo nuevamente", "error");
	              }
            }
       });
	}
  });
}
function add_razonsocial()
{
	var rut 		=$('#rut').val();
	var razonsocial	=$('#razonsocial').val();
	var rubro 	 	=$('#rubro').val();
	var direccion 	=$('#direccion').val();
	var casilla 	=$('#casilla').val();
	var fono  		=$('#fono').val();
	var ciudad 		=$('#ciudad').val();

	if(rut=='')
	{
		swal("RUT Faltante", "Debe ingresar el rut de la razon social", "info");
	}
	else
	{
		if(razonsocial=='')
		{
			swal("Razon Social Faltante", "Debe ingresar la razon social", "info");
		}
		else
		{
			if(rubro=='')
			{
				swal("Rubro Faltante", "Debe ingresar la direcciónel rubro de la razon social", "info");
			}
			else
			{
				if(direccion=='')
				{
					swal("Dirección Faltante", "Debe ingresar la dirección de la razon social", "info");
				}
				else
				{
					if(casilla=='')
					{	
						swal("Casilla Faltante", "Debe ingresar la casilla de la razon social", "info");
					}
					else
					{
						if(fono=='')
						{	
							swal("Fono Faltante", "Debe ingresar el fono de la razon social", "info");
						}
						else
						{
							if(ciudad=='')
							{	
								swal("Ciudad Faltante", "Debe ingresar la ciudad de la razon social", "info");
							}
							else
							{
								$.ajax({
				                   	type:"POST",
				                    url:"<?php echo site_url('Maestro/add_razonsocial');?>",
				                    data:{rut:rut,razonsocial:razonsocial,rubro:rubro,direccion:direccion,casilla:casilla,fono:fono,ciudad:ciudad},
				                    success:function(data)
				                    {
				                      if(data==1)
				                      {
				                        swal("Razon Social Registrada", "La razon social ha sido ingresada correctamente", "success");
				                        $('#popup_AgregarRazonSocial').modal('hide');
				                        setTimeout(function(){ swal.close(); window.open("<?php echo site_url('Maestro/razonessociales');?>","_self");}, 1500);
				                        
				                      }
				                      else
				                      {
				                          swal("Error", "Problema al intentar registrar la razon social, por favor inténtelo nuevamente", "error");
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
}
function agregar_razonsocial()
{
	$('#popup_AgregarRazonSocial').modal();
}
$(document).ready(function()
{
  $('#razonessociales').DataTable({
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
