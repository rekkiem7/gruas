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
	<strong>Fecha de Factura</strong><input type="date" class="form-control " id="datepicker" value="<?=date("Y-m-d")?>">
	</div> 
	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
	<strong>Razón Social</strong>
	<select class="form-control" id="razon_social" name="razon_social" onchange="generar_token()">
		<option value="0">Seleccione...</option>
		<?php
		foreach($razon_social as $row)
		{
		?>
		<option value="<?=rutPhp($row->Rut)?>"><?php echo '( '.rutPhp($row->Rut).' ) '.$row->Razonsocial?></option>
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
	    				<td width="10%" style="padding-top:20px">Señores</td>
	    				<td width="40%" colspan="3" style="padding-top:20px"><input type="text" class="form-control requerido" id="identidad" name="identidad" /></td>
	    				<td width="15%" style="padding-left:10px;padding-top:20px">O. de Compra N°</td>
	    				<td width="35%" style="padding-top:20px"><input type="text" class="form-control" id="orden_compra" name="orden_compra" /></td>
	    			</tr>
	    			<tr >
	    				<td width="10%" style="padding-top:20px">Dirección</td>
	    				<td width="40%" style="padding-top:20px" colspan="3"><input type="text" class="form-control requerido" id="direccion" name="direccion" readonly/></td>
	    				<td width="15%" style="padding-left:10px;padding-top:20px">Condición de Venta</td>
	    				<td width="35%" style="padding-top:20px">
							<select class="form-control requerido" id="condicion" name="condicion">
								<option value="1">Contado</option>
								<option value="2">15 dias</option>
								<option value="3">30 dias</option>
							</select>
						</td>
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
	    				<td width="15%" style="padding-left:10px;padding-top:20px">Comuna</td>
	    				<td width="35%" style="padding-top:20px"><input type="text" class="form-control" id="comuna" name="comuna" readonly/></td>
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
	    			<td style="padding-left:10px"><input type="text" id="desde" name="desde" class="form-control" value="1"/></td>
	    			<td style="padding-left:10px">Hasta:</td>
	    			<td style="padding-left:10px"><input type="text" id="hasta" name="hasta" class="form-control" value="9999999999999"/></td>
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
	    					<td style="padding-top:10px"><strong>Descuento (%)</strong></td>
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
		<div class="col-lg-12 col-md-12"><center><button class="btn btn-primary" onclick="Guardar_Factura();" id="Guardar_Final" name="Guardar_Final">Guardar Factura</button></center></div>
	</div>
</div>
<script>
	function generar_token()
	{
		var razon_social=$('#razon_social').val();
		if(razon_social!=0)
		{
		if(razon_social=="11.647.499-9"){
			if(localStorage.getItem("token_facturacion_1")===null || localStorage.getItem("token_facturacion_1")=="") {
				var data = {
					grant_type: "password",
					username: "76017396-7",
					password: "723405"
				};
				$.ajax({
					type: "POST",
					url: 'http://demo.facturasonline.cl:450/api/token',
					contentType: "application/x-www-form-urlencoded",
					dataType: "json",
					data: data,
					success: function (token) {
						var token_esp = token["token_type"] + ' ' + token["access_token"];
						localStorage.setItem("token_facturacion_1", token_esp);
					}
				});
			}
		}

		if(razon_social=="76.017.396-7"){
			if(localStorage.getItem("token_facturacion_2")===null || localStorage.getItem("token_facturacion_2")=="") {
				var data = {
					grant_type: "password",
					username: "76017396-7",
					password: "723405"
				};
				$.ajax({
					type: "POST",
					url: 'http://demo.facturasonline.cl:450/api/token',
					contentType: "application/x-www-form-urlencoded",
					dataType: "json",
					data: data,
					success: function (token) {
						var token_esp = token["token_type"] + ' ' + token["access_token"];
						localStorage.setItem("token_facturacion_2", token_esp);
					}
				});
			}
		}
		if(razon_social=="76.320.826-5"){
				if(localStorage.getItem("token_facturacion_3")===null || localStorage.getItem("token_facturacion_3")=="") {
				var data = {
					grant_type: "password",
					username: "76017396-7",
					password: "723405"
				};
				$.ajax({
					type: "POST",
					url: 'http://demo.facturasonline.cl:450/api/token',
					contentType: "application/x-www-form-urlencoded",
					dataType: "json",
					data: data,
					success: function (token) {
						var token_esp = token["token_type"] + ' ' + token["access_token"];
						localStorage.setItem("token_facturacion_3", token_esp);
					}
				});
			}
		}
	}
		
	}
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
			//$('#Guardar_Final').attr('disabled',true);
			$('#loading').modal();
			var fecha_factura=$('#datepicker').val();

			var d = new Date();
			var horas=d.getHours();
			var minutos=d.getMinutes();
			var segundos=d.getSeconds();
			if(parseInt(horas)<10){horas='0'+horas;}
			if(parseInt(minutos)<10){minutos='0'+minutos;}
			if(parseInt(segundos)<10){segundos='0'+segundos;}
			var fecha_aux=fecha_factura+'T'+horas+':'+minutos+':'+segundos+'.838Z';
			var razon=$('#razon_social').val();
			if(razon=="11.647.499-9"){
				var token_final=localStorage.getItem("token_facturacion_1");
			}

			if(razon=="76.017.396-7"){
				var token_final=localStorage.getItem("token_facturacion_2");
			}

			if(razon=="76.320.826-5"){
				var token_final=localStorage.getItem("token_facturacion_3");
			}


			var rut=$('#rut').val();
			var nombre_cliente=$('#identidad').val();
			var direccion=$('#direccion').val();
			var giro=$('#giro').val();
			var telefono=$('#telefono').val();
			var ciudad=$('#ciudad').val();
			var orden_compra=$('#orden_compra').val();
			var condicion_venta=$('#condicion').val();
			var facturado_por=$('#facturado_por').val();
			var comuna=$('#comuna').val();
			var total_neto=$('#total_neto').val();
			var descuento=$('#descuento').val();
			var anticipo=$('#anticipo').val();
			var total_descuento=$('#total_descuento').val();
			var iva=$('#iva').val();
			var total_final=$('#total_final').val();
			var observaciones=$('#observaciones').val();

				var datos_envio='{\r\n\"Receiver\":{\r\n\t\t\"RUT\":\"'+rut;
				datos_envio+='\",\r\n\t\t\"Name\":\"'+nombre_cliente+'\",';
				datos_envio+='\r\n\t\t\"Address\":\"'+direccion+'\",';
				datos_envio+='\r\n\t\t\"MunicipalityName\":\"'+comuna+'\",';
				datos_envio+='\r\n\t\t\"CityName\":\"'+ciudad+'\",';
				datos_envio+='\r\n\t\t\"BusinessActivity\":\"'+giro+'\"},';
				datos_envio+='\r\n\"Items\":[';
				$('.ot_trabajo').each(function()
				{
					//var oculto='<input type="hidden" class="ot_trabajo" name="OT_SELECTED'+id+'"  id="OT_SELECTED'+id+'" value="'+ot+'"/><input type="hidden" name="OT_SELECTED_VALOR'+id+'"  id="OT_SELECTED_VALOR'+id+'" value="'+ht+'"/><input type="hidden" name="OT_SELECTED_GRUA'+id+'"  id="OT_SELECTED_GRUA'+id+'" value="'+grua+'"/><input type="hidden" name="OT_SELECTED_VALORHORA'+id+'"  id="OT_SELECTED_VALORHORA'+id+'" value="'+vhora+'"/>';
					//$('#OT_SELECTED_GRUA'+$(this).val()).val();
					datos_envio+='{\r\n\t\"Code\":'+$('#OT_SELECTED_GRUA'+$(this).val()).val()+',';
					datos_envio+='\r\n\t\"ExemptIndicator\":0,';
					datos_envio+='\r\n\t\"Name\":\"'+$('#OT_SELECTED_CAPACIDAD'+$(this).val()).val()+'\nOT '+$(this).val()+'\",';
					var valorHora=$('#OT_SELECTED_VALORHORA'+$(this).val()).val();
					var valorT=$('#OT_SELECTED_VALOR'+$(this).val()).val();
					var cantidad=valorT/valorHora;
					datos_envio+='\r\n\t\"Quantity\":'+cantidad+',';
					datos_envio+='\r\n\t\"MeasureUnit\":\"UN\",';
					datos_envio+='\r\n\t\"UnitPrice\":'+valorHora+',';
					datos_envio+='\r\n\t\"TotalItemAmount\":'+valorT+',';
					datos_envio+='\r\n\t\"IsExempt\":false},';
				});
				datos_envio+='],\r\n\"PaymentType\":'+condicion_venta+',';
				datos_envio+='\r\n\"IssueDate\":\"'+fecha_aux+'\",';
				datos_envio+='\r\n\"NetAmount\":'+total_neto+',';
				datos_envio+='\r\n\"IVAFee\":19,';
				datos_envio+='\r\n\"IVAAmount\":'+iva+',';
				datos_envio+='\r\n\"ExemptAmount\":0,';
				datos_envio+='\r\n\"RegistrationDate\":\"'+fecha_aux+'\",';
				datos_envio+='\r\n\"TotalAmount\":'+total_final+'}';
			var settings = {
				"async": true,
				"crossDomain": true,
				"url": "http://demo.facturasonline.cl:450/api/documents/CreateInvoice",
				"method": "POST",
				"headers": {
					"authorization": token_final,
					//"authorization":"bearer rCI-W9JBj1sRlveVG60vMsJz1QpUahS7hDBWqT0dXB00-AkFgJuhOCdpzXc6wAhKDn5eMaMFOvUu2DRQHXFDgCbV7BtLQJsik9Rz2nRwAwUI5_Rceoljjm6ku9LPV3Y4dSQMszp9WAVs76HDZQwef_VpD66FObQte1MGxKvYOGkxCDdaoRZK2t9RG6_b8uu5L5VItOc9B6ZB2nSc_jS94iLEn79d7NMYNkDWC-cXPVBhYcSQXll5Hy2tZ_4njcuB8Jy8LYAEPu3RgyzKccnCvQ",
					"content-type": "application/json",
				},
				"processData": false,
				"data": datos_envio
			}



			$.ajax(settings).done(function (response) {
				if(response["Folio"])
				{
					$.ajax({
					            type:"POST",
					            url:"<?php echo site_url('Facturacion/guardar_factura');?>",
					            data:{numerofactura:response["Folio"],fecha_factura:fecha_factura,razon:razon,rut:rut,nombre_cliente:nombre_cliente,direccion:direccion,giro:giro,telefono:telefono,ciudad:ciudad,orden_compra:orden_compra,condicion_venta:condicion_venta,facturado_por:facturado_por,comuna:comuna,total_neto:total_neto,descuento:descuento,anticipo:anticipo,total_descuento:total_descuento,iva:iva,total_final:total_final,observaciones:observaciones,array_ot:array_ot},
					            success:function(data)
					            {
					            	$('#loading').modal('hide');
					            	if(data!=0)
					            	{
					            		swal("Factura Emitida", "Se ha generado la factura N° "+data+ " correctamente", "success");
					            		setTimeout(function(){ swal.close(); window.open('<?php echo site_url('Facturacion/index')?>','_self'); }, 1500);
					            	}
					            	else
					            	{
					            		swal("Error", "Se ha producido un problema al ingresar la factura, por favor inténtelo nuevamente", "error");
					            	}
					            }
					});
				}
				
			}).fail(function (jqXHR, textStatus) {
			   console.log(jqXHR);	
			   var msj=JSON.parse(jqXHR["responseText"]);	
			   				//alert(msj["Message"]);
				$('#loading').modal('hide');
			   if(jqXHR["statusText"]=="Unauthorized")
			   {
			   		if(razon=="11.647.499-9"){
			   		localStorage.setItem("token_facturacion_1", "");
			   		localStorage.setItem("token_facturacion_1", null);
			   		}

			   		if(razon=="76.017.396-7"){
						localStorage.setItem("token_facturacion_2", "");
			   			localStorage.setItem("token_facturacion_2", null);
					}

					if(razon=="76.320.826-5"){
						localStorage.setItem("token_facturacion_3", "");
			   			localStorage.setItem("token_facturacion_3", null);
					}
			   		generar_token();
			   		setTimeout(function(){ Guardar_Factura() }, 3500);
			   }else
			   {
			   	swal("Error", msj["Message"], "error");
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
					            	 		oculto1+='<input type="hidden" id="grua'+datos[i]["id"]+'" name="grua'+datos[i]["id"]+'" value="'+datos[i]["GruaPatente"]+'"/>';
					            	 		oculto1+='<input type="hidden" id="SValorHora'+datos[i]["id"]+'" name="SValorHora'+datos[i]["id"]+'" value="'+datos[i]["ServicioValorHora"]+'"/>';
					            	 		oculto1+='<input type="hidden" id="ScapacidadGrua'+datos[i]["id"]+'" name="ScapacidadGrua'+datos[i]["id"]+'" value="'+datos[i]["CapacidadGrua"]+'"/>';
					            	 		var botton='<button class="btn btn-success" onclick="seleccionar_OT('+datos[i]["id"]+','+i+');"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button>'
					            	 		var info=[datos[i]["OTNumero"],ValidateRut(datos[i]["OTRut"]),datos[i]["OTNombre"],datos[i]["ServicioHN"],datos[i]["ServicioHR"],datos[i]["ServicioHNValor"],datos[i]["ServicioHRValor"],datos[i]["ServicioValorTotalNeto"],botton+oculto1];
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
	var grua=$('#grua'+id).val();
	var vhora=$('#SValorHora'+id).val();
	var vcapacidad=$('#ScapacidadGrua'+id).val();
	var botton='<button class="btn btn-danger" onclick="eliminar_ot_detalle('+id+');"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>';
	var contador=1;
	$('.ot_trabajo').each(function()
	{
		contador=contador+1;
	});

	var oculto='<input type="hidden" class="ot_trabajo" name="OT_SELECTED'+id+'"  id="OT_SELECTED'+id+'" value="'+ot+'"/><input type="hidden" name="OT_SELECTED_VALOR'+ot+'"  id="OT_SELECTED_VALOR'+ot+'" value="'+ht+'"/><input type="hidden" name="OT_SELECTED_GRUA'+ot+'"  id="OT_SELECTED_GRUA'+ot+'" value="'+grua+'"/><input type="hidden" name="OT_SELECTED_VALORHORA'+ot+'"  id="OT_SELECTED_VALORHORA'+ot+'" value="'+vhora+'"/><input type="hidden" name="OT_SELECTED_CAPACIDAD'+ot+'"  id="OT_SELECTED_CAPACIDAD'+ot+'" value="'+vcapacidad+'"/>';
	/**************Calculo******************/
	var total_neto=$('#total_neto').val();
	total_neto=Math.round(parseInt(ht)+ parseInt(total_neto));
    $('#total_neto').val(total_neto);

    var descuento=$('#descuento').val();
    var anticipo=$('#anticipo').val();
    var total_desc=Math.round(parseInt(descuento)+parseInt(anticipo));
    $('#total_descuento').val(total_desc);

    var total_parcial=parseInt(total_neto)-parseInt(total_desc);
    var iva=Math.round(total_parcial*0.19);
    $('#iva').val(iva);
    var total_final=Math.round(total_parcial+iva);
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
	total_neto=Math.round(parseInt(total_neto)-parseInt(valor));
    $('#total_neto').val(total_neto);

    var descuento=$('#descuento').val();
    var anticipo=$('#anticipo').val();
    var total_desc=Math.round(parseInt(descuento)+parseInt(anticipo));
    $('#total_descuento').val(total_desc);

    var total_parcial=parseInt(total_neto)-parseInt(total_desc);
    var iva=Math.round(total_parcial*0.19);
    if(iva<0)
    {
    	iva=0;
    }
    $('#iva').val(iva);
    var total_final=Math.round(total_parcial+iva);
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
	generar_token();

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
    	var descuento_parcial=0;
    }
    else
    {
    	descuento=parseInt(descuento)/100;
    	var descuento_parcial=total_neto*descuento;
    }
    var anticipo=$('#anticipo').val();
    var total_desc=Math.round(parseInt(descuento_parcial)+parseInt(anticipo));
    $('#total_descuento').val(total_desc);

    var total_parcial=parseInt(total_neto)-parseInt(total_desc);
    var iva=Math.round(total_parcial*0.19);
    if(iva<0)
    {
    	iva=0;
    }
    $('#iva').val(iva);
    var total_final=Math.round(total_parcial+iva);
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

    if(descuento=='')
    {
    	$('#descuento').val(0);
    	descuento=0;
    	var descuento_parcial=0;
    }
    else
    {
    	descuento=parseInt(descuento)/100;
    	var descuento_parcial=total_neto*descuento;
    }
    
    var total_desc=Math.round(parseInt(descuento_parcial)+parseInt(anticipo));
    $('#total_descuento').val(total_desc);

    var total_parcial=parseInt(total_neto)-parseInt(total_desc);
    var iva=Math.round(total_parcial*0.19);
    if(iva<0)
    {
    	iva=0;
    }
    $('#iva').val(iva);
    var total_final=Math.round(total_parcial+iva);
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
       			$('#rut').val(ValidateRut(array_nom_auto[i]['CodiClien']));
       			$('#giro').val(array_nom_auto[i]['Giro']);
       			$('#telefono').val(array_nom_auto[i]['Fono']);
       			$('#comuna').val(array_nom_auto[i]['Comuna']);
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