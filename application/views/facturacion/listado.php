<body onload="cargar_facturas();">
<div class="container">
	<div class="animated fadeInRight"><center><h4>Listado de Facturas</h4></center>
	</div><br><br>
	<div  class="animated fadeInRight">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
		<table id="facturas" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Factura</th>
                  <th>R.U.T</th>
                  <th>Cliente</th>
                  <th>Razon Social</th>
                  <th>Valor Neto</th>
                  <th>Descuento</th>
                  <th>IVA</th>
                  <th>Valor Total</th>
                  <th>Detalle</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
        </table>
    	</div>
	</div>
	</div>
</div>
<script>
function cargar_facturas()
{
	$.ajax({
        type:"POST",
        url:"<?php echo site_url('Facturacion/cargar_facturas');?>",
        success:function(data)
        {
        	if(data!=0)
        	{
        		var t = $('#facturas').DataTable();
    			t.clear().draw();
        		var datos=JSON.parse(data);
        		var array_final=new Array();
        		for(var i=0;i<datos.length;i++)
        		{
        			if(datos[i]['Descuento']===null)
        			{
        				datos[i]['Descuento']=0;
        			}

        			if(datos[i]['Anticipo']===null)
        			{
        				datos[i]['Anticipo']=0;
        			}

        			var botton='<button class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>';
        			var descuento=parseInt(datos[i]['Descuento'])+parseInt(datos[i]['Anticipo']);
        			var info=[datos[i]['NumeroFactura'],datos[i]['RutCliente'],datos[i]['nom_cliente'],"( "+datos[i]['RazonSocial']+" ) "+datos[i]['nom_razon'],datos[i]['TotalNeto'],descuento,datos[i]['IVA'],datos[i]['TotalFactura'],botton];
        			array_final.push(info);
        		}
        		t.rows.add(array_final).draw();
        	}
        	else
        	{
        		swal("Sin Registros", "No se han encontrado registros de facturas en el sistema", "info");
        	}
        }
    });
}
$(document).ready(function()
{
  $('#facturas').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": false,
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