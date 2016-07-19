<body>
<div class="container">
<div class="animated fadeInRight"><center><h4>Maestro Máquinas</h4></center></div><br><br>
<center><div><button class="btn btn-success" onclick="agregar_maquina();"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;Agregar Máquina</button></div></center><br>
	<div class="table-responsive">
		<table id="maquinas" class="table table-bordered table-hover">
		<thead>
			<th>Patente</th>
			<th>Tipo</th>
			<th>Capacidad</th>
			<th>Valor Hora</th>
			<th>Editar</th>
			<th>Eliminar</th>
        </thead>
        <tbody>
        <?php
        	if($maquinas)
        	{
        		foreach($maquinas as $row)
        		{?>
        			<tr>
        				<td><?php echo $row->Patente?></td>
        				<td><?php echo $row->Tipo?></td>
        				<td><?php echo $row->Capacidad?></td>
        				<td><?php echo $row->ValorHora?></td>
        				<td style="text-align:center"><button class="btn btn-primary" onclick="editar_maquina(<?php echo $row->id?>)"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
                		</td>
                		<td style="text-align:center"><button class="btn btn-danger" onclick="eliminar_maquina(<?php echo $row->id?>)"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
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
<div id="popup_AgregarMaquina" class="modal modal-wide fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Agregar Máquina</h4>
      </div>
      <div class="modal-body">
      	  <div class="row">
      		<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
	          <label class="col-lg-4 col-md-4 col-sm-4 col-xs-12 control-label">Patente</label>
	          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 input-group" style="margin-bottom: 25px">
	           <input type="text" class="form-control required" id="patente" name="patente" placeholder="Ingrese la Patente"/> 
	          </div>
	          </div>
	        
	         <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12"> 
	          <label class="col-lg-4 col-md-4 col-sm-4 col-xs-12 control-label">Folio</label>
	          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 input-group" style="margin-bottom: 25px">
	           <input type="text" class="form-control required" id="folio" name="folio" placeholder="Ingrese el folio"/> 
	          </div>
	          </div>
	        <div class="col-lg-12 ">
	         <label class="col-lg-2 col-md-4 col-sm-12 col-xs-12 control-label">Tipo</label>
	          <div class="col-lg-10 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
	            <input type="text" class="form-control required" id="tipo" name="tipo" placeholder="Ingrese el tipo"/>
	          </div>
	        </div>
	        <div class="col-lg-12 ">
	          <label class="col-lg-2 col-md-4 col-sm-12 col-xs-12 control-label">Capacidad</label>
	          <div class="col-lg-10 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
	           <input type="text" class="form-control required" id="capacidad" name="capacidad" placeholder="Ingrese la capacidad"/> 
	          </div>
	        </div> 
	       	  <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
	          <label class="col-lg-4 col-md-4 col-sm-4 col-xs-12 control-label">Valor Hora</label>
	          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 input-group" style="margin-bottom: 25px">
	           <input type="number" class="form-control required" id="valorHora" name="valorHora" /> 
	          </div>
	          </div>
	        
	         <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12"> 
	          <label class="col-lg-4 col-md-4 col-sm-4 col-xs-12 control-label">Mínimo Hora</label>
	          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 input-group" style="margin-bottom: 25px">
	           <input type="number" class="form-control required" id="minimoHora" name="minimoHora" /> 
	          </div>
	          </div>

	          <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
	          <label class="col-lg-4 col-md-4 col-sm-4 col-xs-12 control-label">Recargo</label>
	          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 input-group" style="margin-bottom: 25px">
	           <input type="number" class="form-control required" id="recargo" name="recargo" /> 
	          </div>
	          </div>
	        
	         <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12"> 
	          <label class="col-lg-4 col-md-4 col-sm-4 col-xs-12 control-label">Comisión</label>
	          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 input-group" style="margin-bottom: 25px">
	           <input type="number" class="form-control required" id="comision" name="comision" /> 
	          </div>
	          </div>      	
	        </div>
         <!-- 
         -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="add_maquina()"><span class="glyphicon glyphicon-floppy-saved" aria-hidden="true" ></span>&nbsp;Guardar Máquina</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>&nbsp;Cerrar</button>
      </div>
    </div>

  </div>
</div>
<!--Modal-->

<!--Modal-->
<div id="popup_EditarMaquina" class="modal modal-wide fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Editar Máquina</h4>
      </div>
      <div class="modal-body">
      	  <div class="row">
      	  <input type="hidden" id="id_edit" name="id_edit"/>
      		<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
	          <label class="col-lg-4 col-md-4 col-sm-4 col-xs-12 control-label">Patente</label>
	          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 input-group" style="margin-bottom: 25px">
	           <input type="text" class="form-control required" id="patente_edit" name="patente_edit" placeholder="Ingrese la Patente"/> 
	          </div>
	          </div>
	        
	         <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12"> 
	          <label class="col-lg-4 col-md-4 col-sm-4 col-xs-12 control-label">Folio</label>
	          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 input-group" style="margin-bottom: 25px">
	           <input type="text" class="form-control required" id="folio_edit" name="folio_edit" placeholder="Ingrese el folio"/> 
	          </div>
	          </div>
	        <div class="col-lg-12 ">
	         <label class="col-lg-2 col-md-4 col-sm-12 col-xs-12 control-label">Tipo</label>
	          <div class="col-lg-10 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
	            <input type="text" class="form-control required" id="tipo_edit" name="tipo_edit" placeholder="Ingrese el tipo"/>
	          </div>
	        </div>
	        <div class="col-lg-12 ">
	          <label class="col-lg-2 col-md-4 col-sm-12 col-xs-12 control-label">Capacidad</label>
	          <div class="col-lg-10 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
	           <input type="text" class="form-control required" id="capacidad_edit" name="capacidad_edit" placeholder="Ingrese la capacidad"/> 
	          </div>
	        </div> 
	       	  <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
	          <label class="col-lg-4 col-md-4 col-sm-4 col-xs-12 control-label">Valor Hora</label>
	          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 input-group" style="margin-bottom: 25px">
	           <input type="number" class="form-control required" id="valorHora_edit" name="valorHora_edit" /> 
	          </div>
	          </div>
	        
	         <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12"> 
	          <label class="col-lg-4 col-md-4 col-sm-4 col-xs-12 control-label">Mínimo Hora</label>
	          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 input-group" style="margin-bottom: 25px">
	           <input type="number" class="form-control required" id="minimoHora_edit" name="minimoHora_edit" /> 
	          </div>
	          </div>

	          <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
	          <label class="col-lg-4 col-md-4 col-sm-4 col-xs-12 control-label">Recargo</label>
	          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 input-group" style="margin-bottom: 25px">
	           <input type="number" class="form-control required" id="recargo_edit" name="recargo_edit" /> 
	          </div>
	          </div>
	        
	         <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12"> 
	          <label class="col-lg-4 col-md-4 col-sm-4 col-xs-12 control-label">Comisión</label>
	          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 input-group" style="margin-bottom: 25px">
	           <input type="number" class="form-control required" id="comision_edit" name="comision_edit" /> 
	          </div>
	          </div>      	
	        </div>
         <!-- 
         -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="update_maquina()"><span class="glyphicon glyphicon-floppy-saved" aria-hidden="true" ></span>&nbsp;Editar Máquina</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>&nbsp;Cerrar</button>
      </div>
    </div>

  </div>
</div>
<!--Modal-->
</body>
<script>
function update_maquina()
{
	var id=$('#id_edit').val();
	var folio=$('#folio_edit').val();
	var patente=$('#patente_edit').val();
	var tipo=$('#tipo_edit').val();
	var capacidad=$('#capacidad_edit').val();
	var valorHora=$('#valorHora_edit').val();
	var minimoHora=$('#minimoHora_edit').val();
	var recargo=$('#recargo_edit').val();
	var comision=$('#comision_edit').val();	

	if(folio=="")
	{
		swal("Folio Faltante", "Debe ingresar el Folio de la máquina", "info");
	}
	else
	{
		if(patente=="")
		{
			swal("Patente Faltante", "Debe ingresar la patente de la máquina", "info");
		}
		else
		{
			if(tipo=="")
			{
				swal("Tipo Faltante", "Debe ingresar el tipo de máquina", "info");
			}
			else
			{
				if(capacidad=="")
				{
					swal("Capacidad Faltante", "Debe ingresar la capacidad de la máquina", "info");
				}
				else
				{
					if(valorHora=="")
					{
						swal("Valor Hora Faltante", "Debe ingresar el Valor por Hora de la máquina", "info");
					}
					else
					{
						$.ajax({
			                    type:"POST",
			                    url:"<?php echo site_url('Maestro/update_maquina');?>",
			                    data:{id:id,folio:folio,patente:patente,tipo:tipo,capacidad:capacidad,valorHora:valorHora,minimoHora:minimoHora,recargo:recargo,comision:comision},
			                    success:function(data)
			                    {
			                      if(data==1)
			                      {
			                        swal("Máquina Actualizada", "La máquina ha sido actualizada correctamente", "success");
			                        $('#popup_EditarrMaquina').modal('hide');
			                        setTimeout(function(){ swal.close(); window.open("<?php echo site_url('Maestro/maquinas');?>","_self");}, 1500);
			                        
			                      }
			                      else
			                      {
			                          swal("Error", "Problema al intentar actualizar la máquina, por favor inténtelo nuevamente", "error");
			                      }
			                    }
			                });
					}
				}
			}
		}
	}
}
function editar_maquina(id)
{
	$('#folio_edit').val('');
	$('#patente_edit').val('');
	$('#tipo_edit').val('');
	$('#capacidad_edit').val('');
	$('#valorHora_edit').val('');
	$('#minimoHora_edit').val('');
	$('#recargo_edit').val('');
	$('#comision_edit').val('');
	$.ajax({
            type:"POST",
            url:"<?php echo site_url('Maestro/info_maquina');?>",
            data:{id:id},
            success:function(data)
            {
            	if(data!=0)
            	{
            		var datos=JSON.parse(data);
            		$('#id_edit').val(id);
            		$('#folio_edit').val(datos[0]["Folio"]);
            		$('#patente_edit').val(datos[0]["Patente"]);
            		$('#tipo_edit').val(datos[0]["Tipo"]);
            		$('#capacidad_edit').val(datos[0]["Capacidad"]);
            		$('#valorHora_edit').val(datos[0]["ValorHora"]);
            		$('#minimoHora_edit').val(datos[0]["MinimoHora"]);
            		$('#recargo_edit').val(datos[0]["Recargo"]);
            		$('#comision_edit').val(datos[0]["Comision"]);
            		$('#popup_EditarCliente').modal();
            	}
            	else
            	{
            		swal("Error", "Se ha producido un error al consultar la máquina, por favor inténtelo nuevamente", "error");
            	}
            }
     });

	$('#popup_EditarMaquina').modal();

}
function eliminar_maquina(id)
{
	swal({   title: "¿Desea eliminar la máquina?",   text: "La máquina no aparecerá en la aplicación",   type: "warning",   showCancelButton: true,   confirmButtonColor: "#CC0000",   confirmButtonText: "Eliminar",   cancelButtonText: "Cancelar",   closeOnConfirm: true,   closeOnCancel: true }, function(isConfirm){   if (isConfirm) {

	$.ajax({
            type:"POST",
            url:"<?php echo site_url('Maestro/delete_maquina');?>",
            data:{id:id},
            success:function(data)
            {
            	if(data==1)
	              {
	                 swal("Máquina Eliminada", "La máquina ha sido eliminada correctamente", "success");
	                 setTimeout(function(){ swal.close(); window.open("<?php echo site_url('Maestro/maquinas');?>","_self");}, 1500);
	              }
	              else
	              {
	                swal("Error", "Se ha producido un error al eliminar la máquina, por favor inténtelo nuevamente", "error");
	              }
            }
       });
	}
  });
}
function add_maquina()
{
	var folio=$('#folio').val();
	var patente=$('#patente').val();
	var tipo=$('#tipo').val();
	var capacidad=$('#capacidad').val();
	var valorHora=$('#valorHora').val();
	var minimoHora=$('#minimoHora').val();
	var recargo=$('#recargo').val();
	var comision=$('#comision').val();	

	if(folio=="")
	{
		swal("Folio Faltante", "Debe ingresar el Folio de la máquina", "info");
	}
	else
	{
		if(patente=="")
		{
			swal("Patente Faltante", "Debe ingresar la patente de la máquina", "info");
		}
		else
		{
			if(tipo=="")
			{
				swal("Tipo Faltante", "Debe ingresar el tipo de máquina", "info");
			}
			else
			{
				if(capacidad=="")
				{
					swal("Capacidad Faltante", "Debe ingresar la capacidad de la máquina", "info");
				}
				else
				{
					if(valorHora=="")
					{
						swal("Valor Hora Faltante", "Debe ingresar el Valor por Hora de la máquina", "info");
					}
					else
					{
						$.ajax({
			                    type:"POST",
			                    url:"<?php echo site_url('Maestro/add_maquina');?>",
			                    data:{folio:folio,patente:patente,tipo:tipo,capacidad:capacidad,valorHora:valorHora,minimoHora:minimoHora,recargo:recargo,comision:comision},
			                    success:function(data)
			                    {
			                      if(data==1)
			                      {
			                        swal("Máquina Registrada", "La máquina ha sido ingresada correctamente", "success");
			                        $('#popup_AgregarMaquina').modal('hide');
			                        setTimeout(function(){ swal.close(); window.open("<?php echo site_url('Maestro/maquinas');?>","_self");}, 1500);
			                        
			                      }
			                      else
			                      {
			                          swal("Error", "Problema al intentar registrar la máquina, por favor inténtelo nuevamente", "error");
			                      }
			                    }
			                });
					}
				}
			}
		}
	}
}
function agregar_maquina()
{
	$('#folio').val('');
	$('#patente').val('');
	$('#tipo').val('');
	$('#capacidad').val('');
	$('#valorHora').val('');
	$('#minimoHora').val('');
	$('#recargo').val('');
	$('#comision').val('');	
	$('#popup_AgregarMaquina').modal();
}
$(document).ready(function()
{
  $('#maquinas').DataTable({
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