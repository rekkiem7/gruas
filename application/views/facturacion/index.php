<body>
<div class="container">
	<div class="animated fadeInRight"><center><h4>Facturación Cliente - Factura por Grupo de OT</h4></center>
	</div><br><br>
	<div  class="animated fadeInRight">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
	<strong>Fecha de Factura</strong><input type="text" class="form-control pull-right" id="datepicker" value="<?php echo date('d/m/Y')?>">
	</div> 
	</div>
	<br><br><br><br>
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
	    				<td width="40%" colspan="3"><input type="text" class="form-control" id="identidad" name="identidad" readonly/></td>
	    				<td width="15%" style="padding-left:10px">O. de Compra N°</td>
	    				<td width="35%"><input type="text" class="form-control" id="orden_compra" name="orden_compra" readonly/></td>
	    			</tr>
	    			<tr >
	    				<td width="10%" style="padding-top:20px">Dirección</td>
	    				<td width="40%" style="padding-top:20px" colspan="3"><input type="text" class="form-control" id="direccion" name="direccion" readonly/></td>
	    				<td width="15%" style="padding-left:10px;padding-top:20px">Condición de Venta</td>
	    				<td width="35%" style="padding-top:20px"><input type="text" class="form-control" id="condicion" name="condicion" readonly/></td>
	    			</tr>
	    			<tr>
	    				<td width="10%" style="padding-top:20px">R.U.T</td>
	    				<td style="padding-top:20px"><input type="text" class="form-control" id="rut" name="rut" /></td>
	    				<td style="padding-top:20px;padding-left:10px;">Giro</td>
	    				<td  style="padding-top:20px"><input type="text" class="form-control" id="giro" name="giro" readonly/></td>
	    				<td width="15%" style="padding-left:10px;padding-top:20px">Facturado Por</td>
	    				<td width="35%" style="padding-top:20px"><input type="text" class="form-control" id="facturado_por" name="facturado_por" readonly/></td>
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
	    		<button class="btn btn-primary" onclick="cargar_ordenes()">Cargar Ordenes de Trabajo</button>
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
	  		</div>
	  	<!--------------------------TAB 4 -----------------------------!-->
	  		<div id="tab4" class="tab-pane fade">
	  			<br>Ingrese el texto del mensaje que desea agregar en la factura
	    		<br><br>
	    		<textarea cols="100" rows="10"></textarea>
	  		</div>
		</div><br><br>
		<div class="col-lg-12 col-md-12"><center><button class="btn btn-primary">Guardar Factura</button></center></div>
	</div>
</div>
<script>
function cargar_ordenes()
{
	var desde=$('#desde').val();
	var hasta=$('#hasta').val();
	 $.ajax({
            type:"POST",
            url:"<?php echo site_url('Facturacion/cargar_ordenes');?>",
            data:{desde:desde,hasta:hasta},
            success:function(data)
            {
            	 if(data!=0)
            	 {
            	 	alert("hay OTS");
            	 }	
            	 else
            	 {
            	 	swal("Atención", "No se han encontrado Ordenes de Trabajo dentro del rango seleccionado", "info");
            	 }
            }
    });
}
$(document).ready(function()
{
	$('#datepicker').datepicker({
      autoclose: true
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

});
</script>