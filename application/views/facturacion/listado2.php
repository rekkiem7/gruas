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
th{
  background-color: #ffffff;
  color:#000000;
}
tr{
  background-color: #ffffff;
  color:#000000;
}
tr:hover{
  background-color: #000000;
  color:#ffffff;
}
.new{
  background-color: #E84747;
  color:#ffffff;
}
.new:hover{
   background-color: #E84747;
   color:#000000;
}
tr.sin_nada:hover{
    background-color: #ffffff;
    color:#ffffff;
}
tfoot input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
    }
.modal-dialog{
    overflow-y: initial !important
}
.body_detalle{
    height: 250px;
    overflow-y: auto;
}

</style>
<body onload="cargar_facturas();">
<div class="container">
  <div class="animated fadeInRight"><center><h4>Listado de Facturas Antiguas</h4></center>
  </div><br><br>
  <div  class="animated fadeInRight">
      <input type="hidden" id="Dominio" name="Dominio" value="<?=site_url();?>">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <center><table><tr class="sin_nada"><td><input type="text" class="form-control" placeholder="Buscar por N° factura" name="factura_search" id="factura_search"/></td><td style="padding-left:15px;"><button class="btn btn-success" onclick="buscar_factura();"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>&nbsp;&nbsp;Buscar</button></td></tr></table></center>
    <br>
        <div class="table-responsive">
    <table id="facturas" class="table table-bordered">
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
                  <th>Imprimir</th>
                  <th>Eliminar</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
        </table>
      </div>
  </div>
  </div>

  <!--Modal-->
<div id="popup_Factura" class="modal modal-wide fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" ><div id="titulo_detalle"></div></h4>
      </div>
      <div class="modal-body body_detalle" >
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
                  </tr>
                  </thead>
                  <tbody>
                  </tbody>
                  </table>
         
      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>&nbsp;Cerrar</button>
      </div>
    </div>

  </div>
</div>
</div>
<script>
    function imprimir(factura,razonsocial)
    {
        var dominio = $('#Dominio').val();
        window.open(dominio+'/Facturacion/VerPdf/'+factura+'/'+razonsocial+'/'+2,'_blank');
    }
function buscar_factura()
{
    var factura=$('#factura_search').val();
    if(factura!='')
    {
        $('#loading').modal();
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('Facturacion/buscar_factura2');?>",
            data:{factura:factura},
            success: function (data) {
                $('#loading').modal('hide');
                if(data!=0)
                {
                   // var t = $('#facturas').DataTable();
                   // t.clear().draw();
                    $("#facturas > tbody").empty();
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

                        var botton='<button class="btn btn-primary" onclick="ver_detalle('+datos[i]['NumeroFactura']+','+datos[i]['RazonSocial']+')"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>';
                        var botton2='<button class="btn btn-danger" onclick="eliminar('+datos[i]['NumeroFactura']+')"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>';
                        var descuento=parseInt(datos[i]['Descuento'])+parseInt(datos[i]['Anticipo']);
                        var boton='<button class="btn btn-warning" onclick="imprimir('+datos[i]['NumeroFactura']+','+datos[i]['RazonSocial']+')"><span class="glyphicon glyphicon-print" aria-hidden="true"></span></button>';
                        // var info=[datos[i]['NumeroFactura'],ValidateRut(datos[i]['RutCliente']),datos[i]['nom_cliente'],"( "+datos[i]['RazonSocial']+" ) "+datos[i]['nom_razon'],datos[i]['TotalNeto'],descuento,datos[i]['IVA'],datos[i]['TotalFactura'],botton,botton2];

                        var clase='';

                        if(datos[i]['Estado']=='N')
                        {
                            var  clase="new";
                        }
                        $("#facturas > tbody").append('<tr class="'+clase+'"><td>'+datos[i]['NumeroFactura']+'</td><td>'+ValidateRut(datos[i]['RutCliente'])+'</td><td>'+datos[i]['nom_cliente']+'</td><td> ('+datos[i]['RazonSocial']+')'+datos[i]['nom_razon']+'</td><td>'+datos[i]['TotalNeto']+'</td><td>'+descuento+'</td><td>'+datos[i]['IVA']+'</td><td>'+datos[i]['TotalFactura']+'</td><td>'+botton+'</td><td>'+boton+'</td><td>'+botton2+'</td></tr>');
                        //t.row.add(info).draw().nodes().to$().addClass(clase);
                        //array_final.push(info);
                    }
                }
                else {
                    swal("Sin Registros", "No se han encontrado registros de la factura solicitada", "info");
                }
            }
        });
    }
    else
    {
        cargar_facturas();
    }
}
function cargar_facturas()
{
  $('#loading').modal();
  $.ajax({
        type:"POST",
        url:"<?php echo site_url('Facturacion/cargar_facturas2');?>",
        success:function(data)
        {
          $('#loading').modal('hide');
          if(data!=0)
          {
            //var t = $('#facturas').DataTable();
        //  t.clear().draw();
                $("#facturas > tbody").empty();
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

              var botton='<button class="btn btn-primary" onclick="ver_detalle('+datos[i]['NumeroFactura']+','+datos[i]['RazonSocial']+')"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>';
              var botton2='<button class="btn btn-danger" onclick="eliminar('+datos[i]['NumeroFactura']+')"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>';
              var descuento=parseInt(datos[i]['Descuento'])+parseInt(datos[i]['Anticipo']);
                var boton='<button class="btn btn-warning" onclick="imprimir('+datos[i]['NumeroFactura']+','+datos[i]['RazonSocial']+')"><span class="glyphicon glyphicon-print" aria-hidden="true"></span></button>';
                //var info=[datos[i]['NumeroFactura'],ValidateRut(datos[i]['RutCliente']),datos[i]['nom_cliente'],"( "+datos[i]['RazonSocial']+" ) "+datos[i]['nom_razon'],datos[i]['TotalNeto'],descuento,datos[i]['IVA'],datos[i]['TotalFactura'],botton,botton2];

              var clase='';

              if(datos[i]['Estado']=='N')
              {
              var  clase="new";
              }

                    $("#facturas > tbody").append('<tr class="'+clase+'"><td>'+datos[i]['NumeroFactura']+'</td><td>'+ValidateRut(datos[i]['RutCliente'])+'</td><td>'+datos[i]['nom_cliente']+'</td><td> ('+datos[i]['RazonSocial']+')'+datos[i]['nom_razon']+'</td><td>'+datos[i]['TotalNeto']+'</td><td>'+descuento+'</td><td>'+datos[i]['IVA']+'</td><td>'+datos[i]['TotalFactura']+'</td><td align="center">'+botton+'</td><td align="center">'+boton+'</td><td align="center">'+botton2+'</td></tr>');
             // t.row.add(info).draw().nodes().to$().addClass(clase);
              //array_final.push(info);
            }
            //t.rows.add(array_final).draw().nodes().to$().addClass('new');
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
        url:"<?php echo site_url('Facturacion/eliminar_factura2');?>",
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

function ver_detalle(factura,razon)
{
  $('#loading').modal();
  $.ajax({
        type:"POST",
        url:"<?php echo site_url('Facturacion/cargar_ot_facturas');?>",
        data:{factura:factura,razon:razon},
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
/*
  $('#facturas').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": false,
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
        }
    });*/

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