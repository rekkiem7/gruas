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

#popup_AgregarCliente .modal-body{
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
<div class="animated fadeInRight"><center><h4>Maestro Clientes</h4></center></div><br><br>
<center><div><button class="btn btn-success" onclick="agregar_cliente();"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;Agregar Cliente</button></div></center><br>
	<div class="table-responsive">
		<table id="clientes" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>R.U.T</th>
                  <th>Nombre/ Razón Social</th>
                  <th>Ver más datos</th>
                  <th>Editar</th>
                  <th>Eliminar</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if(!empty($clientes))
                {
                	foreach($clientes as $row)
                	{?>
                	<tr>
                		<td><?=rutPhp($row->CodiClien)?></td>
                		<td><?php echo $row->Nombre?></td>
                		<td style="text-align:center"><button class="btn btn-info" onclick="ver_cliente(<?php echo $row->id?>)"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                		</td>
                		<td style="text-align:center"><button class="btn btn-primary" onclick="editar_cliente(<?php echo $row->id?>)"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
                		</td>
                		<td style="text-align:center"><button class="btn btn-danger" onclick="eliminar_cliente(<?php echo $row->id?>)"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
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
<div id="popup_AgregarCliente" class="modal modal-wide fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Agregar Cliente</h4>
      </div>
      <div class="modal-body">
      	  <div class="row">
      		<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
	          <label class="col-lg-4 col-md-4 col-sm-12 col-xs-12 control-label">R.U.T</label>
	          <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
	            <input type="text" class="form-control required" id="rut" name="rut" placeholder="R.U.T del cliente"/>
	          </div>
	        </div>
	        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
	          <label class="col-lg-2 col-md-4 col-sm-12 col-xs-12 control-label">Nombre</label>
	          <div class="col-lg-10 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
	           <input type="text" class="form-control required" id="nombre" name="nombre" placeholder="Nombre del cliente"/>
	          </div>
	        </div>
	        <div class="col-lg-12 ">
	         <label class="col-lg-2 col-md-4 col-sm-12 col-xs-12 control-label">Dirección</label>
	          <div class="col-lg-10 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
	            <input type="text" class="form-control required" id="direccion" name="direccion" placeholder="Dirección del cliente"/>
	          </div>
	        </div>
	        <div class="col-lg-12 ">
	          <label class="col-lg-2 col-md-4 col-sm-12 col-xs-12 control-label">Giro</label>
	          <div class="col-lg-10 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
	           <input type="text" class="form-control required" id="giro" name="giro" placeholder="Giro del cliente"/> 
	          </div>
	        </div>
	        <div class="col-lg-12 ">
	          <label class="col-lg-2 col-md-4 col-sm-12 col-xs-12 control-label">Email Principal</label>
	          <div class="col-lg-10 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
	           <input type="text" class="form-control required" id="email1" name="email1" placeholder="Email principal"/> 
	          </div>
	        </div>
	        <div class="col-lg-12 ">
	          <label class="col-lg-2 col-md-4 col-sm-12 col-xs-12 control-label">Email Secundario</label>
	          <div class="col-lg-10 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
	           <input type="text" class="form-control required" id="email2" name="email2" placeholder="Email secundario"/> 
	          </div>
	        </div>	        	        
	        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
	          <label class="col-lg-3 col-md-4 col-sm-12 col-xs-12 control-label">Fono</label>
	          <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
	           <input type="text" class="form-control required" id="fono" name="fono" placeholder="Teléfono del cliente"/> 
	          </div>
	         </div>
	         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
	          <label class="col-lg-3 col-md-4 col-sm-12 col-xs-12 control-label">Fono2</label>
	          <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
	           <input type="text" class="form-control required" id="fono2" name="fono2" placeholder="Teléfono del cliente"/> 
	          </div>
	         </div>
	         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
	          <label class="col-lg-3 col-md-4 col-sm-12 col-xs-12 control-label">Fax</label>
	          <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
	           <input type="text" class="form-control required" id="fax" name="fax" placeholder="Fax del cliente"/> 
	          </div>
	         </div>
	        
	       	  <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
	          <label class="col-lg-4 col-md-4 col-sm-4 col-xs-12 control-label">Ciudad</label>
	          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 input-group" style="margin-bottom: 25px">
	           <input type="text" class="form-control required" id="ciudad" name="ciudad" placeholder="Ingrese la Ciudad"/> 
	          </div>
	          </div>
	        
	         <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12"> 
	          <label class="col-lg-4 col-md-4 col-sm-4 col-xs-12 control-label">Comuna</label>
	          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 input-group" style="margin-bottom: 25px">
	           <input type="text" class="form-control required" id="comuna" name="comuna" placeholder="Comuna del cliente"/> 
	          </div>
	          </div>
	        
	      	   <div class="col-lg-12 ">
	          <label class="col-lg-2 col-md-4 col-sm-4 col-xs-12 control-label">Contacto</label>
	          <div class="col-lg-10 col-md-8 col-sm-8 col-xs-12 input-group" style="margin-bottom: 25px">
	           <input type="text" class="form-control required" id="contacto" name="contacto" placeholder="Contacto del cliente"/> 
	          </div>     	
	          </div>
	          </div>
         <!-- 
         -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="add_cliente()"><span class="glyphicon glyphicon-floppy-saved" aria-hidden="true" ></span>&nbsp;Guardar Cliente</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>&nbsp;Cerrar</button>
      </div>
    </div>

  </div>
</div>
<!--Modal-->
<div id="popup_infoCliente" class="modal modal-wide fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Información del Cliente</h4>
      </div>
      <div class="modal-body" >
      <table class="table table-bordered table-hover">
      	<tr>
      		<td class="brand-primary">R.U.T</td>
      		<td id="info_rut" class="infox"></td>
      		<td class="brand-primary">Nombre</td>
      		<td id="info_nombre" colspan="3" class="infox"></td>
      	</tr>
      	<tr>
      		<td class="brand-primary">Dirección</td>
      		<td  id="info_direccion" colspan="5" class="infox"></td>		
      	</tr>
      	<tr>
      		<td class="brand-primary">Giro</td>
      		<td id="info_giro" colspan="5" class="infox"></td>		
      	</tr>
      	<tr>
      		<td class="brand-primary">Email Principal</td>
      		<td id="info_email1" colspan="5" class="infox"></td>		
      	</tr>      	
      	<tr>
      		<td class="brand-primary">Email Secundario</td>
      		<td id="info_email2" colspan="5" class="infox"></td>		
      	</tr>      	
      	<tr>
      		<td class="brand-primary">Fono</td>
      		<td  id="info_fono" class="infox"></td>	
      		<td class="brand-primary">Fono 2</td>
      		<td  id="info_fono2" class="infox"></td>	
      		<td class="brand-primary">Fax</td>
      		<td  id="info_fax" class="infox"></td>		
      	</tr>
      	<tr>
      		<td class="brand-primary">Ciudad</td>
      		<td  id="info_ciudad" colspan="2" class="infox"></td>	
      		<td class="brand-primary">Comuna</td>
      		<td  id="info_comuna" colspan="2" class="infox"></td>	
      	</tr>
      	<tr>
      		<td class="brand-primary">Contacto</td>
      		<td  id="info_contacto" colspan="5" class="infox"></td>
      	</tr>
      </table>
      </div>
    </div>
  </div>
</div>

 <!--Modal-->

 <!--Modal-->
<div id="popup_EditarCliente" class="modal modal-wide fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Editar Cliente</h4>
      </div>
      <div class="modal-body">
      	  <div class="row">
      	  <input type="hidden" id="id_edit" name="id_edit">
      		<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
	          <label class="col-lg-4 col-md-4 col-sm-12 col-xs-12 control-label">R.U.T</label>
	          <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
	            <input type="text" class="form-control required" id="rut_edit" name="rut_edit" placeholder="R.U.T del cliente"/>
	          </div>
	        </div>
	        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
	          <label class="col-lg-2 col-md-4 col-sm-12 col-xs-12 control-label">Nombre</label>
	          <div class="col-lg-10 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
	           <input type="text" class="form-control required" id="nombre_edit" name="nombre_edit" placeholder="Nombre del cliente"/>
	          </div>
	        </div>
	        <div class="col-lg-12 ">
	         <label class="col-lg-2 col-md-4 col-sm-12 col-xs-12 control-label">Dirección</label>
	          <div class="col-lg-10 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
	            <input type="text" class="form-control required" id="direccion_edit" name="direccion_edit" placeholder="Dirección del cliente"/>
	          </div>
	        </div>
	        <div class="col-lg-12 ">
	          <label class="col-lg-2 col-md-4 col-sm-12 col-xs-12 control-label">Giro</label>
	          <div class="col-lg-10 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
	           <input type="text" class="form-control required" id="giro_edit" name="giro_edit" placeholder="Giro del cliente"/> 
	          </div>
	        </div>
	        <div class="col-lg-12 ">
	          <label class="col-lg-2 col-md-4 col-sm-12 col-xs-12 control-label">Email Principal</label>
	          <div class="col-lg-10 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
	           <input type="text" class="form-control required" id="email1_edit" name="email1_edit" placeholder="Email principal"/> 
	          </div>
	        </div>	        <div class="col-lg-12 ">
	          <label class="col-lg-2 col-md-4 col-sm-12 col-xs-12 control-label">Email Secundario</label>
	          <div class="col-lg-10 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
	           <input type="text" class="form-control" id="email2_edit" name="email2_edit" placeholder="Email secundario"/> 
	          </div>
	        </div>	        
	        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
	          <label class="col-lg-3 col-md-4 col-sm-12 col-xs-12 control-label">Fono</label>
	          <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
	           <input type="text" class="form-control required" id="fono_edit" name="fono_edit" placeholder="Teléfono del cliente"/> 
	          </div>
	         </div>
	         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
	          <label class="col-lg-3 col-md-4 col-sm-12 col-xs-12 control-label">Fono2</label>
	          <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
	           <input type="text" class="form-control required" id="fono2_edit" name="fono2_edit" placeholder="Teléfono del cliente"/> 
	          </div>
	         </div>
	         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
	          <label class="col-lg-3 col-md-4 col-sm-12 col-xs-12 control-label">Fax</label>
	          <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
	           <input type="text" class="form-control required" id="fax_edit" name="fax_edit" placeholder="Fax del cliente"/> 
	          </div>
	         </div>
	        
	       	  <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
	          <label class="col-lg-4 col-md-4 col-sm-4 col-xs-12 control-label">Ciudad</label>
	          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 input-group" style="margin-bottom: 25px">
	           <input type="text" class="form-control required" id="ciudad_edit" name="ciudad_edit" placeholder="Ingrese la Ciudad"/> 
	          </div>
	          </div>
	        
	         <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12"> 
	          <label class="col-lg-4 col-md-4 col-sm-4 col-xs-12 control-label">Comuna</label>
	          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 input-group" style="margin-bottom: 25px">
	           <input type="text" class="form-control required" id="comuna_edit" name="comuna_edit" placeholder="Comuna del cliente"/> 
	          </div>
	          </div>
	        
	      	   <div class="col-lg-12 ">
	          <label class="col-lg-2 col-md-4 col-sm-4 col-xs-12 control-label">Contacto</label>
	          <div class="col-lg-10 col-md-8 col-sm-8 col-xs-12 input-group" style="margin-bottom: 25px">
	           <input type="text" class="form-control required" id="contacto_edit" name="contacto_edit" placeholder="Contacto del cliente"/> 
	          </div>     	
	          </div>
	          </div>
         <!-- 
         -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="update_cliente()"><span class="glyphicon glyphicon-floppy-saved" aria-hidden="true" ></span>&nbsp;Editar Cliente</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>&nbsp;Cerrar</button>
      </div>
    </div>

  </div>
</div>
<!--Modal-->
</body>
<script>
$('#rut').keydown(function(event)
{
	if (event.which == '13') 
	{ 
		var Rut = RutDigito ($('#rut').val());
		Rut = $('#rut').val()+Rut;
		if(ValidateRut(Rut)!=false)
		{
			$('#rut').val(ValidateRut(Rut));
		}
		else
		{
			$('#rut').val('');
			alert('RUT INVALIDO');
		}
	}
	else if (event.which == '9') 
	{ 
		return false; 
	}
});
$('#rut_edit').keydown(function(event)
{
	if (event.which == '13') 
	{ 
		var Rut = RutDigito ($('#rut_edit').val());
		Rut = $('#rut_edit').val()+Rut;
		if(ValidateRut(Rut)!=false)
		{
			$('#rut_edit').val(ValidateRut(Rut));
		}
		else
		{
			$('#rut_edit').val('');
			alert('RUT INVALIDO');
		}
	}
	else if (event.which == '9') 
	{ 
		return false; 
	}
});
function update_cliente()
{
	var id=$('#id_edit').val();
	var rut=$('#rut_edit').val();
	var nombre=$('#nombre_edit').val();
	var direccion=$('#direccion_edit').val();
	var giro=$('#giro_edit').val();
	var email1=$('#email1_edit').val();
	var email2=$('#email2_edit').val();
	var fono=$('#fono_edit').val();
	var fono2=$('#fono2_edit').val();
	var fax=$('#fax_edit').val();
	var ciudad=$('#ciudad_edit').val();
	var comuna=$('#comuna_edit').val();
	var contacto=$('#contacto_edit').val();

	if(rut=='')
	{
		swal("RUT Faltante", "Debe ingresar el rut del cliente", "info");
	}
	else
	{
		if(nombre=='')
		{
			swal("Nombre Faltante", "Debe ingresar el nombre del cliente", "info");
		}
		else
		{
			if(direccion=='')
			{
				swal("Dirección Faltante", "Debe ingresar la dirección del cliente", "info");
			}
			else
			{
				if(fono=='')
				{
					swal("Teléfono Faltante", "Debe ingresar el teléfono del cliente", "info");
				}
				else
				{
					if(ciudad=='')
					{	
						swal("Ciudad Faltante", "Debe ingresar la ciudad del cliente", "info");
					}
					else
					{
						if(comuna=='')
						{
							swal("Comuna Faltante", "Debe ingresar la comuna del cliente", "info");
						}
						else
						{
							if(email1=='')
							{
								swal("Correo Faltante", "Debe ingresar un correo principal", "info");
							}
							else
							{
								$.ajax({
				                    type:"POST",
				                    url:"<?php echo site_url('Maestro/update_cliente');?>",
				                    data:{id:id,rut:rut,nombre:nombre,direccion:direccion,giro:giro,email1:email1,email2:email2,fono:fono,fono2:fono2,fax:fax,ciudad:ciudad,comuna:comuna,contacto:contacto},
				                    success:function(data)
				                    {
				                      if(data==1)
				                      {
				                        swal("Cliente Actualizado", "El cliente ha sido actualizado correctamente", "success");
				                        $('#popup_EditarCliente').modal('hide');
				                        setTimeout(function(){ swal.close(); window.open("<?php echo site_url('Maestro/clientes');?>","_self");}, 1500);
				                        
				                      }
				                      else
				                      {
				                          swal("Error", "Problema al intentar actualizar el cliente, por favor inténtelo nuevamente", "error");
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

function editar_cliente(id)
{
	$.ajax({
            type:"POST",
            url:"<?php echo site_url('Maestro/info_cliente');?>",
            data:{id:id},
            success:function(data)
            {
            	if(data!=0)
            	{
            		var datos=JSON.parse(data);
            		$('#id_edit').val(id);
            		$('#rut_edit').val(ValidateRut(datos[0]["CodiClien"]));
            		$('#nombre_edit').val(datos[0]["Nombre"]);
            		$('#direccion_edit').val(datos[0]["Direccion"]);
            		$('#giro_edit').val(datos[0]["Giro"]);
            		$('#email1_edit').val(datos[0]["Email1"]);
            		$('#email2_edit').val(datos[0]["Email2"]);
            		$('#fono_edit').val(datos[0]["Fono"]);
            		$('#fono2_edit').val(datos[0]["Fono2"]);
            		$('#fax_edit').val(datos[0]["Fax"]);
            		$('#ciudad_edit').val(datos[0]["CiudadDesp"]);
            		$('#comuna_edit').val(datos[0]["Comuna"]);
            		$('#contacto_edit').val(datos[0]["Contacto"]);
            		$('#popup_EditarCliente').modal();
            	}
            	else
            	{
            		swal("Error", "Se ha producido un error al consultar el cliente, por favor inténtelo nuevamente", "error");
            	}
            }
     });
}
function ver_cliente(id)
{
	$.ajax({
            type:"POST",
            url:"<?php echo site_url('Maestro/info_cliente');?>",
            data:{id:id},
            success:function(data)
            {
            	$(".infox").empty();
            	if(data!=0)
            	{
            		var datos=JSON.parse(data);
            		$('#info_rut').append(ValidateRut(datos[0]["CodiClien"]));
            		$('#info_nombre').append(datos[0]["Nombre"]);
            		$('#info_direccion').append(datos[0]["Direccion"]);
            		$('#info_giro').append(datos[0]["Giro"]);
            		$('#info_email1').append(datos[0]["Email1"]);
            		$('#info_email2').append(datos[0]["Email2"]);
            		$('#info_fono').append(datos[0]["Fono"]);
            		$('#info_fono2').append(datos[0]["Fono2"]);
            		$('#info_fax').append(datos[0]["Fax"]);
            		$('#info_ciudad').append(datos[0]["CiudadDesp"]);
            		$('#info_comuna').append(datos[0]["Comuna"]);
            		$('#info_contacto').append(datos[0]["Contacto"]);
            		$('#popup_infoCliente').modal();

            	}
            	else
            	{
            		swal("Error", "Se ha producido un error al consultar el cliente, por favor inténtelo nuevamente", "error");
            	}
            }
    });
}
function eliminar_cliente(id)
{
	swal({   title: "¿Desea eliminar el Cliente?",   text: "El Cliente no aparecerá en la aplicación",   type: "warning",   showCancelButton: true,   confirmButtonColor: "#CC0000",   confirmButtonText: "Eliminar",   cancelButtonText: "Cancelar",   closeOnConfirm: true,   closeOnCancel: true }, function(isConfirm){   if (isConfirm) {

		$.ajax({
            type:"POST",
            url:"<?php echo site_url('Maestro/delete_cliente');?>",
            data:{id:id},
            success:function(data)
            {
            	if(data==1)
	              {
	                 swal("Cliente Eliminado", "El cliente ha sido eliminado correctamente", "success");
	                 setTimeout(function(){ swal.close(); window.open("<?php echo site_url('Maestro/clientes');?>","_self");}, 1500);
	              }
	              else
	              {
	                swal("Error", "Se ha producido un error al eliminar el cliente, por favor inténtelo nuevamente", "error");
	              }
            }
       });
	}
  });
}
function add_cliente()
{
	var rut=$('#rut').val();
	var nombre=$('#nombre').val();
	var direccion=$('#direccion').val();
	var giro=$('#giro').val();
	var email1=$('#email1').val();
	var email2=$('#email2').val();
	var fono=$('#fono').val();
	var fono2=$('#fono2').val();
	var fax=$('#fax').val();
	var ciudad=$('#ciudad').val();
	var comuna=$('#comuna').val();
	var contacto=$('#contacto').val();

	if(rut=='')
	{
		swal("RUT Faltante", "Debe ingresar el rut del cliente", "info");
	}
	else
	{
		if(nombre=='')
		{
			swal("Nombre Faltante", "Debe ingresar el nombre del cliente", "info");
		}
		else
		{
			if(direccion=='')
			{
				swal("Dirección Faltante", "Debe ingresar la dirección del cliente", "info");
			}
			else
			{
				if(fono=='')
				{
					swal("Teléfono Faltante", "Debe ingresar el teléfono del cliente", "info");
				}
				else
				{
					if(ciudad=='')
					{	
						swal("Ciudad Faltante", "Debe ingresar la ciudad del cliente", "info");
					}
					else
					{
						if(comuna=='')
						{
							swal("Comuna Faltante", "Debe ingresar la comuna del cliente", "info");
						}
						else
						{
							if(email1=='')
							{
								swal("Correo Faltante", "Debe ingresar un email principal", "info");
							}
							else
							{
								$.ajax({
				                    type:"POST",
				                    url:"<?php echo site_url('Maestro/add_cliente');?>",
				                    data:{rut:rut,nombre:nombre,direccion:direccion,giro:giro,email1:email1,email2:email2,fono:fono,fono2:fono2,fax:fax,ciudad:ciudad,comuna:comuna,contacto:contacto},
				                    success:function(data)
				                    {
				                      if(data==1)
				                      {
				                        swal("Cliente Registrado", "El cliente ha sido ingresado correctamente", "success");
				                        $('#popup_AgregarCliente').modal('hide');
				                        setTimeout(function(){ swal.close(); window.open("<?php echo site_url('Maestro/clientes');?>","_self");}, 1500);
				                        
				                      }
				                      else
				                      {
				                          swal("Error", "Problema al intentar registrar el cliente, por favor inténtelo nuevamente", "error");
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
function agregar_cliente()
{
	$('#popup_AgregarCliente').modal();
}
$(document).ready(function()
{
  $('#clientes').DataTable({
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
