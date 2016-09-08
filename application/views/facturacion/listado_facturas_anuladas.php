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

.new{
   background-color: #CC0000;
  color:#ffffff;
}
</style>
<body onload="cargar_facturas();">
<div class="container">
	<div class="animated fadeInRight"><center><h4>Listado de Facturas Anuladas</h4></center>
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
  $('#loading').modal();
	$.ajax({
        type:"POST",
        url:"<?php echo site_url('Facturacion/cargar_facturas_anuladas');?>",
        success:function(data)
        {
          $('#loading').modal('hide');
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
        			var descuento=parseInt(datos[i]['Descuento'])+parseInt(datos[i]['Anticipo']);
        			var info=[datos[i]['NumeroFactura'],datos[i]['RutCliente'],datos[i]['nom_cliente'],"( "+datos[i]['RazonSocial']+" ) "+datos[i]['nom_razon'],datos[i]['TotalNeto'],descuento,datos[i]['IVA'],datos[i]['TotalFactura']];
        			array_final.push(info);
        		}
        		t.rows.add(array_final).draw().addClass('new');
        	}
        	else
        	{
        		swal("Sin Registros", "No se han encontrado registros de facturas en el sistema", "info");
        	}
        }
    });
}

function eliminar(factura)
{
  swal({   title: "¿Desea eliminar la Factura N° "+factura+"?",   text: "La factura desaparecerá del sistema y las OT asociadas quedarán en libertad",   type: "warning",   showCancelButton: true,   confirmButtonColor: "#CC0000",   confirmButtonText: "Eliminar",   cancelButtonText: "Cancelar",   closeOnConfirm: true,   closeOnCancel: true }, function(isConfirm){   if (isConfirm) {
  $('#loading').modal();
   $.ajax({
        type:"POST",
        url:"<?php echo site_url('Facturacion/eliminar_factura');?>",
        data:{factura:factura},
        success:function(data)
        {
          $('#loading').modal('hide');
          if(data==1)
          {
            swal("Factura Eliminada", "La factura N° "+factura+"  ha sido eliminada correctamente", "success");
                          setTimeout(function(){ swal.close(); window.open('<?php echo site_url('Facturacion/listado_factura')?>','_self'); }, 1500);
          }
          else
          {
            swal("Error", "Estimado(a) usuario(a), se ha producido un problema al intentar eliminar la factura, por favor inténtelo nuevamente", "danger");
          }

        }
      });
   }
 });
}

function ver_detalle(factura)
{
  $('#loading').modal();
  $.ajax({
        type:"POST",
        url:"<?php echo site_url('Facturacion/cargar_ot_facturas');?>",
        data:{factura:factura},
        success:function(data)
        {
          $('#loading').modal('hide');
          var t = $('#detalle').DataTable();
          t.clear().draw();
          if(data!=0)
          {
              var datos=JSON.parse(data);
              var info_total=new Array();
              for(var i=0;i<datos.length;i++)
              {
                  var item=i+1;
                  var info=[item,datos[i]["OTNumero"],datos[i]["ServicioHN"],datos[i]["ServicioHR"],datos[i]["ServicioHNValor"],datos[i]["ServicioHRValor"],datos[i]["ServicioValorTotalNeto"]];
                  info_total.push(info);
              }

              t.rows.add(info_total).draw();
              document.getElementById('titulo_detalle').innerHTML="Detalle Factura N° "+factura;
             $('#popup_Factura').modal();
          }
          else
          {
              swal("Sin Registros", "No se han encontrado Ordenes de Trabajo asociadas a la factura", "info");
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
});
</script>