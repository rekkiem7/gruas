<style>
input[type=checkbox].css-checkbox {
  position:absolute; 
  z-index:-1000; 
  left:-1000px; 
  overflow: hidden; 
  clip: rect(0 0 0 0); 
  height:1px; 
  width:1px;
  margin:-1px; 
  padding:0; 
  border:0;
}

input[type=checkbox].css-checkbox + label.css-label {
  padding-left:35px;
  height:30px; 
  display:inline-block;
  line-height:30px;
  background-repeat:no-repeat;
  background-position: 0 0;
  font-size:15px;
  vertical-align:middle;
  cursor:pointer;

}

input[type=checkbox].css-checkbox:checked + label.css-label {
  background-position: 0 -30px;
}
label.css-label {
    background-image:url(<?=base_url()?>imagenes/checkbox.png);
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

input.rellenar,select.rellenar, .sanciones .rellenar, .sanciones tr:hover .rellenar {
  border-color: #F00;
}

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

#popup_AgregarOrdenDeTrabajo .modal-body{
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
        <input type="hidden" id="Dominio" name="Dominio" value="<?=site_url();?>">
        <div class="animated fadeInRight"><center><h4>Ordenes De Trabajo</h4></center></div><br><br>
        <div class="modal-dialog">
    <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      <div class="modal-body">
        <div class="row">
          <div class="modal-header col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h4 class="modal-title">Reporte Por Fechas</h4>
          </div><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><br></div>

         <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
            <input type="hidden" class="form-control required" id="IdEditar" name="IdEditar"/>
            <label class="col-lg-4 col-md-4 col-sm-12 col-xs-12 control-label">Fecha Desde</label>
               <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
                   <input type="date" class="form-control required requerido" id="Fecha1" name="Fecha1"  />
               </div>
        </div>
              <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
            <input type="hidden" class="form-control required" id="IdEditar" name="IdEditar"/>
            <label class="col-lg-4 col-md-4 col-sm-12 col-xs-12 control-label">Fecha Hasta</label>
               <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
                   <input type="date" class="form-control required requerido" id="Fecha2" name="Fecha2"  />
               </div>
        </div>   
      </div>
      <div class="modal-footer">
        <button id="Divguardar" type="button" class="btn btn-warning" onclick="GenerarReporte()"><span class="glyphicon glyphicon-floppy-saved" aria-hidden="true" ></span>&nbsp;Generar</button>
      </div>
    </div>
  </div>
<!--Modal-->
<div id="popup_AgregarOrdenDeTrabajo" class="modal modal-wide fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      <div class="modal-body">
      	<div id="DetalleReporte"></div>
      <div class="modal-footer"></div>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>&nbsp;Cerrar</button>
      </div>
    </div>
  </div>
</div>
</div>
<!--Modal-->
</body>
<script>
function GenerarReporte()
{
  if($('#Fecha1').val() && $('#Fecha2').val())
  {
        $.ajax({
          type:"POST",
          url:"<?php echo site_url('Ordendetrabajo/GenerarReporte');?>",
          data:{Fecha1:$('#Fecha1').val(), Fecha2:$('#Fecha2').val()},
          success:function(data)
          {
if(data!="ERROR")
{
  var datos=JSON.parse(data);
  var Salida = '<table id="tablaOrdenDeTrabajo" class="table table-bordered table-hover"><thead><tr><th>N° OT</th><th>Fecha</th><th>Razon Social</th><th>Cliente</th><th>Total</th></tr></thead><tbody>';
  for(var i=0; i<datos.length; i++)
  {
      Salida += '<tr><td>'+datos[0]["OTNumero"]+'</td><td>'+datos[0]["OTFecha"]+'</td><td>'+datos[0]["OTRazonSocial"]+'</td><td>'+datos[0]["OTNombre"]+'</td><td>'+datos[0]["ServicioValorTotalNeto"]+'</td></tr>';
  }
  Salida += '</tbody></table>';
  $('#DetalleReporte').html(Salida);
  $('#popup_AgregarOrdenDeTrabajo').modal('show');
}
else
{
    swal("Error", "No se encuentra la informacion", "error");
}
          }
      });
  }
  else
  {
    swal("Error", "Debe ingresar las fechas", "error");
  }
}


function add_ordendetrabajo(Id, Accion)
{
  alert(id+' - '+Accion);
  if(Accion=='VerPdf')
  {
      var dominio = $('#Dominio').val();
      window.location.replace(dominio+'/Ordendetrabajo/VerPdf?id='+Id);
  }
}

</script>
