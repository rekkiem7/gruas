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
	    		<h3>Menu 1</h3>
	    		<p>Some content in menu 1.</p>
	  		</div>
	  	<!--------------------------TAB 3 -----------------------------!-->	
	  		<div id="tab3" class="tab-pane fade">
	    		<h3>Menu 2</h3>
	    		<p>Some content in menu 2.</p>
	  		</div>
	  	<!--------------------------TAB 4 -----------------------------!-->
	  		<div id="tab4" class="tab-pane fade">
	    		<h3>Menu 3</h3>
	    		<p>Some content in menu 3.</p>
	  		</div>
		</div>
	</div>
</div>
<script>
$(document).ready(function()
{
	$('#datepicker').datepicker({
      autoclose: true
    });
});
</script>