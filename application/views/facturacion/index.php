<style>
.color_rojo{
	border-color: #CC0000;
}
</style>
<body>
<div class="container">
	<div class="animated fadeInRight"><center><h4>Facturación Cliente - Factura por Grupo de OT</h4></center>
	</div><br><br>
	<div  class="animated fadeInRight">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
	<strong>Fecha de Factura</strong><input type="text" class="form-control pull-right" id="datepicker" value="<?php echo date('d/m/Y')?>">
	</div> 
	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
	<strong>Razón Social</strong>
	<select class="form-control" id="razon_social" name="razon_social">
		<option value="0">Seleccione...</option>
		<?php
		foreach($razon_social as $row)
		{
		?>
		<option value="<?php echo $row->Rut?>"><?php echo '( '.$row->Rut.' )'.$row->Razonsocial?></option>
		<?php
		}
		?>
	</select>
	</div> 
	</div>
	<br><br><br><br><br>
		<ul class="nav nav-tabs">
	  		<li class="active"><a data-toggle="tab" href="#tab1">Identificación</a></li>
	  		<li><a data-toggle="tab" href="#tab2">Ordenes de Trabajo</a></li>
	  		<li><a data-toggle="tab" href="#tab3">Detalle</a></li>
	  		<li><a data-toggle="tab" href="#tab4">Mensaje Adicional</a></li>
		</ul>
		<div class="tab-content">
		<!--------------------------TAB 1 -----------------------------!-->
	  		<div id="tab1" class="tab-pane fade in active">
	  		<br>
	    		<table width="100%">
	    			<tr>
	    				<td width="10%">Señores</td>
	    				<td width="40%" colspan="3"><input type="text" class="form-control requerido" id="identidad" name="identidad" /></td>
	    				<td width="15%" style="padding-left:10px">O. de Compra N°</td>
	    				<td width="35%"><input type="text" class="form-control" id="orden_compra" name="orden_compra" /></td>
	    			</tr>
	    			<tr >
	    				<td width="10%" style="padding-top:20px">Dirección</td>
	    				<td width="40%" style="padding-top:20px" colspan="3"><input type="text" class="form-control requerido" id="direccion" name="direccion" readonly/></td>
	    				<td width="15%" style="padding-left:10px;padding-top:20px">Condición de Venta</td>
	    				<td width="35%" style="padding-top:20px"><input type="text" class="form-control requerido" id="condicion" name="condicion" /></td>
	    			</tr>
	    			<tr>
	    				<td width="10%" style="padding-top:20px">R.U.T</td>
	    				<td style="padding-top:20px"><input type="text" class="form-control requerido" id="rut" name="rut" /></td>
	    				<td style="padding-top:20px;padding-left:10px;">Giro</td>
	    				<td  style="padding-top:20px"><input type="text" class="form-control" id="giro" name="giro" readonly/></td>
	    				<td width="15%" style="padding-left:10px;padding-top:20px">Facturado Por</td>
	    				<td width="35%" style="padding-top:20px"><input type="text" class="form-control" id="facturado_por" name="facturado_por" value="<?php echo $nombre_usuario?>" readonly/></td>
	    			</tr>
	    			<tr>
	    				<td width="10%" style="padding-top:20px">Teléfono</td>
	    				<td style="padding-top:20px"><input type="text" class="form-control" id="telefono" name="telefono" readonly /></td>
	    				<td style="padding-top:20px;padding-left:10px;">Ciudad</td>
	    				<td  style="padding-top:20px"><input type="text" class="form-control" id="ciudad" name="ciudad" readonly/></td>
	    				<td width="15%" style="padding-left:10px;padding-top:20px">Revisado Por</td>
	    				<td width="35%" style="padding-top:20px"><input type="text" class="form-control" id="revisado_por" name="revisado_por" readonly/></td>
	    			</tr>
	    		</table>
	  		</div>
	  	<!--------------------------TAB 2 -----------------------------!-->
	  		<div id="tab2" class="tab-pane fade">
	    		<br><h4>Rango Ordenes de Trabajo</h4>
	    		<br><br>
	    		<table>
	    		<tr>
	    			<td>Desde:</td>
	    			<td style="padding-left:10px"><input type="text" id="desde" name="desde" class="form-control"/></td>
	    			<td style="padding-left:10px">Hasta:</td>
	    			<td style="padding-left:10px"><input type="text" id="hasta" name="hasta" class="form-control"/></td>
	    		</tr>
	    		</table><br><br>
	    		<button class="btn btn-primary" onclick="cargar_ordenes()">Cargar Ordenes de Trabajo</button><br><br>
	    		<div id="detalle0_tabla" style="display:none">
	    		<table id="detalle0" class="table table-bordered table-hover">
	                <thead>
	                <tr>
	                  <th>N° O.Trabajo</th>
	                  <th>RUT</th>
	                  <th>Cliente</th>
	                  <th>H.Normales</th>
	                  <th>H.Recargo</th>
	                  <th>Valor H.N</th>
	                  <th>Valor H.R</th>
	                  <th>Valor Total</th>
	                  <th>Seleccionar</th>
	                </tr>
	                </thead>
	                <tbody>
	                </tbody>
	            </table>
	        	</div>
	  		</div>
	  	<!--------------------------TAB 3 -----------------------------!-->	
	  		<div id="tab3" class="tab-pane fade">
	    		<div class="table-responsive">
	    			<table id="detalle" class="table table-bordered table-hover">
	                <thead>
	                <tr>
	                  <th>Item</th>
	                  <th>N° O.Trabajo</th>
	                  <th>H.Normales</th>
	                  <th>H.Recargo</th>
	                  <th>Valor H.N</th>
	                  <th>Valor H.R</th>
	                  <th>Valor Total</th>
	                  <th>Borrar</th>
	                </tr>
	                </thead>
	                <tbody>
	                </tbody>
	                </table>
	    		</div>
	    		<div>
	    			<table>
	    				<tr>
	    					<td><strong>Total Neto</strong></td>
	    					<td style="padding-left:10px"><input type="number" class="form-control" id="total_neto" name="total_neto" value="0" readonly/></td>
	    				</tr>
	    				<tr>
	    					<td style="padding-top:10px"><strong>Descuento</strong></td>
	    					<td style="padding-left:10px;padding-top:10px"><input type="number" id="descuento" name="descuento" class="form-control" value="0"/></td>
	    				</tr>
	    				<tr>
	    					<td style="padding-top:10px"><strong>Anticipo</strong></td>
	    					<td style="padding-left:10px;padding-top:10px"><input type="number" id="anticipo" name="anticipo" class="form-control" value="0"/></td>
	    				</tr>
	    				<tr>
	    					<td style="padding-top:10px"><strong>Total con Descuento</strong></td>
	    					<td style="padding-left:10px;padding-top:10px"><input type="number" id="total_descuento" name="total_descuento" class="form-control" readonly value="0"/></td>
	    				</tr>
	    				<tr>
	    					<td style="padding-top:10px"><strong>19% I.V.A</strong></td>
	    					<td style="padding-left:10px;padding-top:10px"><input type="number" id="iva" name="iva" class="form-control" readonly value="0"/></td>
	    				</tr>
	    				<tr>
	    					<td style="padding-top:10px"><strong>Total a Pagar:</strong></td>
	    					<td style="padding-left:10px;padding-top:10px"><input type="number" id="total_final" name="total_final" class="form-control" readonly value="0"/></td>
	    				</tr>
	    			</table>
	    		</diV>
	  		</div>
	  	<!--------------------------TAB 4 -----------------------------!-->
	  		<div id="tab4" class="tab-pane fade">
	  			<br>Ingrese el texto del mensaje que desea agregar en la factura
	    		<br><br>
	    		<textarea cols="100" rows="10" id="observaciones" name="observaciones"></textarea>
	  		</div>
		</div><br><br>
		<div class="col-lg-12 col-md-12"><center><button class="btn btn-primary" onclick="Guardar_Factura();">Guardar Factura</button></center></div>
	</div>
</div>
<script>
function Guardar_Factura()
{
	var array_ot=new Array();
	var cont_requerido=0;
	var cont_ot=0;
	$('.requerido').each(function()
	{
		if($(this).val()=='')
		{
			cont_requerido=cont_requerido+1;
			$(this).addClass("color_rojo");
		}
		else
		{
			$(this).removeClass("color_rojo");
		}
	});

	if(cont_requerido>0)
	{
		swal("Campo Faltante", "Debe llenar los campos faltantes", "info");
	}
	else
	{
		$('.ot_trabajo').each(function()
		{
			cont_ot=cont_ot+1;
			array_ot.push($(this).val());
		});

		if(cont_ot==0)
		{
			swal("Sin Ordenes de Trabajo", "Debe ingresar las ordenes de trabajo", "info");
		}
		else
		{
			$('#loading').modal();
			var fecha_factura=$('#datepicker').val();
			var razon=$('#razon_social').val();
			var rut=$('#rut').val();
			var nombre_cliente=$('#identidad').val();
			var direccion=$('#direccion').val();
			var giro=$('#giro').val();
			var telefono=$('#telefono').val();
			var ciudad=$('#ciudad').val();
			var orden_compra=$('#orden_compra').val();
			var condicion_venta=$('#condicion').val();
			var facturado_por=$('#facturado_por').val();
			var revisado_por=$('#revisado_por').val();
			var total_neto=$('#total_neto').val();
			var descuento=$('#descuento').val();
			var anticipo=$('#anticipo').val();
			var total_descuento=$('#total_descuento').val();
			var iva=$('#iva').val();
			var total_final=$('#total_final').val();
			var observaciones=$('#observaciones').val();
			$.ajax({
					            type:"POST",
					            url:"<?php echo site_url('Facturacion/guardar_factura');?>",
					            data:{fecha_factura:fecha_factura,razon:razon,rut:rut,nombre_cliente:nombre_cliente,direccion:direccion,giro:giro,telefono:telefono,ciudad:ciudad,orden_compra:orden_compra,condicion_venta:condicion_venta,facturado_por:facturado_por,revisado_por:revisado_por,total_neto:total_neto,descuento:descuento,anticipo:anticipo,total_descuento:total_descuento,iva:iva,total_final:total_final,observaciones:observaciones,array_ot:array_ot},
					            success:function(data)
					            {
					            	$('#loading').modal('hide');
					            	if(data!=0)
					            	{
					            		swal("Factura Emitida", "Se ha generado la factura N° "+data+ " correctamente", "success");
					            	}
					            	else
					            	{
					            		swal("Error", "Se ha producido un problema al ingresar la factura, por favor inténtelo nuevamente", "error");
					            	}
					            }
					});
		}
	}
}
function cargar_ordenes()
{
	var razon_social=$('#razon_social').val();
	var rut=$('#rut').val();
	var desde=$('#desde').val();
	var hasta=$('#hasta').val();
	if(razon_social==0)
	{
		swal("Campo Faltante", "Debe seleccionar la razón social", "info");
	}
	else
	{
		if(rut=='')
		{
			swal("Campo Faltante", "Debe ingresar el rut del cliente", "info");
		}
		else
		{
			if(desde=='')
			{
				swal("Campo Faltante", "Debe ingresar el numero de OT (desde) como mínimo limite de búsqueda", "info");
			}
			else
			{
				if(hasta=='')
				{
					swal("Campo Faltante", "Debe ingresar el numero de OT (hasta) como máximo limite de búsqueda", "info");
				}
				else
				{
					$('#detalle0_tabla').slideUp();
					var t = $('#detalle0').DataTable();
    					t.clear().draw();
    					$('#loading').modal();
					$.ajax({
					            type:"POST",
					            url:"<?php echo site_url('Facturacion/cargar_ordenes');?>",
					            data:{desde:desde,hasta:hasta,razon:razon_social,rut:rut},
					            success:function(data)
					            {
					            	$('#loading').modal('hide');
					            	 if(data!=0)
					            	 {
					            	 	var info_total=new Array();
					            	 	var datos=JSON.parse(data);
					      			    for(var i=0;i<datos.length;i++)
					            	 	{
					            	 		var oculto1='<input type="hidden" id="OT'+datos[i]["id"]+'" name="OT'+datos[i]["id"]+'" value="'+datos[i]["OTNumero"]+'"/>';
					            	 		oculto1+='<input type="hidden" id="HN'+datos[i]["id"]+'" name="HN'+datos[i]["id"]+'" value="'+datos[i]["ServicioHN"]+'"/>';
					            	 		oculto1+='<input type="hidden" id="HR'+datos[i]["id"]+'" name="HR'+datos[i]["id"]+'" value="'+datos[i]["ServicioHR"]+'"/>';
					            	 		oculto1+='<input type="hidden" id="VHN'+datos[i]["id"]+'" name="VHN'+datos[i]["id"]+'" value="'+datos[i]["ServicioHNValor"]+'"/>';
					            	 		oculto1+='<input type="hidden" id="VHR'+datos[i]["id"]+'" name="VHR'+datos[i]["id"]+'" value="'+datos[i]["ServicioHRValor"]+'"/>';
					            	 		oculto1+='<input type="hidden" id="HT'+datos[i]["id"]+'" name="HT'+datos[i]["id"]+'" value="'+datos[i]["ServicioValorTotalNeto"]+'"/>';

					            	 		var botton='<button class="btn btn-success" onclick="seleccionar_OT('+datos[i]["id"]+','+i+');"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button>'
					            	 		var info=[datos[i]["OTNumero"],datos[i]["OTRut"],datos[i]["OTNombre"],datos[i]["ServicioHN"],datos[i]["ServicioHR"],datos[i]["ServicioHNValor"],datos[i]["ServicioHRValor"],datos[i]["ServicioValorTotalNeto"],botton+oculto1];
					            	 		info_total.push(info);
					            	 	}
					            	 	t.rows.add(info_total).draw();
					            	 	$('#detalle0_tabla').slideDown();
					            	 }	
					            	 else
					            	 {
					            	 	swal("Atención", "No se han encontrado Ordenes de Trabajo dentro del rango seleccionado", "info");
					            	 }
					            }
					    });
				}
			}
		}
	}
	
	 
}

function seleccionar_OT(id,i)
{

	var x = $('#detalle').DataTable();
	var ot=$('#OT'+id).val();
	var hn=$('#HN'+id).val();
	var hr=$('#HR'+id).val();
	var vhn=$('#VHN'+id).val();
	var vhr=$('#VHR'+id).val();
	var ht=$('#HT'+id).val();
	var botton='<button class="btn btn-danger" onclick="eliminar_ot_detalle('+id+');"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>';
	var contador=1;
	$('.ot_trabajo').each(function()
	{
		contador=contador+1;
	});

	var oculto='<input type="hidden" class="ot_trabajo" name="OT_SELECTED'+id+'"  id="OT_SELECTED'+id+'" value="'+ot+'"/><input type="hidden" name="OT_SELECTED_VALOR'+id+'"  id="OT_SELECTED_VALOR'+id+'" value="'+ht+'"/>';
	/**************Calculo******************/
	var total_neto=$('#total_neto').val();
	total_neto=parseInt(ht)+ parseInt(total_neto);
    $('#total_neto').val(total_neto);

    var descuento=$('#descuento').val();
    var anticipo=$('#anticipo').val();
    var total_desc=parseInt(descuento)+parseInt(anticipo);
    $('#total_descuento').val(total_desc);

    var total_parcial=parseInt(total_neto)-parseInt(total_desc);
    var iva=total_parcial*0.19;
    $('#iva').val(iva);
    var total_final=total_parcial+iva;
    $('#total_final').val(total_final);
    /**************************************/
	var fila=[contador,ot+oculto,hn,hr,vhn,vhr,ht,botton];
	x.row.add(fila).draw();
	var table = $('#detalle0').DataTable();
	table.row('.selected').remove().draw( false );
  
}

function eliminar_ot_detalle(id)
{
    var valor=$('#OT_SELECTED_VALOR'+id).val();
    /**************Calculo******************/
	var total_neto=$('#total_neto').val();
	total_neto=parseInt(total_neto)-parseInt(valor);
    $('#total_neto').val(total_neto);

    var descuento=$('#descuento').val();
    var anticipo=$('#anticipo').val();
    var total_desc=parseInt(descuento)+parseInt(anticipo);
    $('#total_descuento').val(total_desc);

    var total_parcial=parseInt(total_neto)-parseInt(total_desc);
    var iva=total_parcial*0.19;
    if(iva<0)
    {
    	iva=0;
    }
    $('#iva').val(iva);
    var total_final=total_parcial+iva;
    if(total_final<0)
    {
    total_final=0;	
    }
    $('#total_final').val(total_final);
    /**************************************/

	var table = $('#detalle').DataTable();
	table.row('.selected').remove().draw( false );
}
$(document).ready(function()
{
	$('#datepicker').datepicker({
      autoclose: true
    });

   $('#detalle0 tbody').on( 'focus', 'tr', function () {
   	var table = $('#detalle0').DataTable();
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    } );

    $('#detalle tbody').on( 'focus', 'tr', function () {
   	var table = $('#detalle').DataTable();
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    } );

  $('#detalle0').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": false,
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
  $('#detalle').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": false,
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

  $('#rut').keypress(function(e) {
    if(e.which == 13) {
    	var rut=$('#rut').val();

        $.ajax({
            type:"POST",
            url:"<?php echo site_url('Facturacion/verifica_cliente');?>",
            data:{rut:rut},
            success:function(data)
            {
            	 if(data!=0)
            	 {
            	 	var datos=JSON.parse(data);
            	 	$('#identidad').val(datos[0]["Nombre"]);
            	 	$('#direccion').val(datos[0]["Direccion"]);
            	 	$('#giro').val(datos[0]["Giro"]);
            	 	$('#telefono').val(datos[0]["Fono"]);
            	 	$('#ciudad').val(datos[0]["CiudadDesp"]);

            	 }	
            	 else
            	 {
            	 	swal("Atención", "El rut ingresado no se encuentra asociado a ningún cliente", "info");
            	 }
            }
        });
    }
	});

  $('#descuento').change(function()
  {
  	var total_neto=$('#total_neto').val();	
    var descuento=$('#descuento').val();
    if(descuento=='')
    {
    	$('#descuento').val(0);
    	descuento=0;
    }
    var anticipo=$('#anticipo').val();
    var total_desc=parseInt(descuento)+parseInt(anticipo);
    $('#total_descuento').val(total_desc);

    var total_parcial=parseInt(total_neto)-parseInt(total_desc);
    var iva=total_parcial*0.19;
    if(iva<0)
    {
    	iva=0;
    }
    $('#iva').val(iva);
    var total_final=total_parcial+iva;
    if(total_final<0)
    {
    total_final=0;	
    }
    $('#total_final').val(total_final);
    /**************************************/
  });

  $('#anticipo').change(function()
  {
  	var total_neto=$('#total_neto').val();	
    var descuento=$('#descuento').val();
    var anticipo=$('#anticipo').val();
    if(anticipo=='')
    {
    	$('#anticipo').val(0);
    	anticipo=0;
    }
    
    var total_desc=parseInt(descuento)+parseInt(anticipo);
    $('#total_descuento').val(total_desc);

    var total_parcial=parseInt(total_neto)-parseInt(total_desc);
    var iva=total_parcial*0.19;
    if(iva<0)
    {
    	iva=0;
    }
    $('#iva').val(iva);
    var total_final=total_parcial+iva;
    if(total_final<0)
    {
    total_final=0;	
    }
    $('#total_final').val(total_final);
    /**************************************/
  });

array_nom_auto=[];
  /**************autocomplete**********************/
  $( function() {
    function log( message) {
       for(var i=0;i<array_nom_auto.length;i++)
       {
       		if(array_nom_auto[i]['Nombre']==message)
       		{
       			
       			$('#direccion').val(array_nom_auto[i]['Direccion']);
       			$('#rut').val(array_nom_auto[i]['CodiClien']);
       			$('#giro').val(array_nom_auto[i]['Giro']);
       			$('#telefono').val(array_nom_auto[i]['Fono']);
       			$('#ciudad').val(array_nom_auto[i]['CiudadDesp']);
       			$('#identidad').val(message);
       			break;
       		}
       }
    }
 
    $( "#identidad" ).autocomplete({
      source: function( request, response ) {
        $.ajax( {
          type:"POST",
          url: "<?php echo site_url('Facturacion/buscar_cliente_autocomplete');?>",
          dataType: "json",
          data: {
            q: request.term
          },
          success: function( data ) {
 			array_nom_auto=data;
           response( $.map( data, function( item ) {
								return {
									label: item.Nombre,
									value: item.Nombre,
								}
							}));
          }
        } );
      },
      minLength: 2,
      select: function( event, ui ) {
        log( ui.item.label );
      }
    } );
  } );

});
</script>