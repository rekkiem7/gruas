<style>

.ui-autocomplete { z-index:2147483647; }

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
tfoot input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
    }
</style>
<body>
<div class="container">
    <div class="animated fadeInRight">
        <input type="hidden" id="Dominio" name="Dominio" value="<?=site_url();?>"><center><h4>Ordenes De Trabajo</h4></center><br><br>
    </div>
      <form id="Form1" name="Form1" action="GenerarReporte" type="POST">
        <table id="tablaOrdenDeTrabajo" class="table table-bordered">
            <tr><td>CLIENTE</td><td><input type="text" id="ClienteId" name="ClienteId" class="inputborder"></td></tr>
              <tr><td>OT Desde</td><td><input type="text" id="ot1" name="ot1" class="inputborder" value="1"></td></tr>
              <tr><td>OT Hasta</td><td><input type="text" id="ot2" name="ot2" class="inputborder" value="999999999"></td></tr>
              <tr><td>Fecha Desde</td><td><input type="text" id="Fecha1" name="Fecha1" class="inputborder"></td></tr>
              <tr><td>Fecha Hasta</td><td><input type="text" id="Fecha2" name="Fecha2" class="inputborder"></td></tr>
              <tr><td colspan="2"><center><span class="btn btn-info" onclick="GenerarReporte();"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>&nbsp;CARGAR ORDENES</span></center></td></tr>
        </table> 
</div>

</body>
<script>
function GenerarReporte()
{
    if(!$('#ClienteId').val())
    {
      swal("Importante", "Debe detallar un cliente a buscar", "warning"); 
    }
    else if(!$('#ot1').val() || !$('#ot2').val())
    {
      swal("Importante", "Debe detallar un rango de OT a buscar", "warning"); 
    }
    else
    {
      $('#Form1').submit();
    }
}
$(document).ready(function()
{
  $('#Fecha1').datepicker();
  $('#Fecha2').datepicker();
  $('#OTRazonSocial').change(function(event)
  {   
    CargarNumeroOT();
  });
  /*
  $('#OTRut').change(function(event)
  {   
    CargarInfoCliente();
  });  
  */
/*
  $('#tablaOrdenDeTrabajo tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="'+title+'" />' );
    } );

  var table = $('#tablaOrdenDeTrabajo').DataTable();
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
*/
/******************************************************************************************/
/******************************************************************************************/
array_nom_auto=[];

  $( function() 
  {
    function log( message) {
       for(var i=0;i<array_nom_auto.length;i++)
       {
          if(array_nom_auto[i]['CodiClien']+' - '+array_nom_auto[i]['Nombre']==message)
          {
            if(ValidateRut(array_nom_auto[i]["CodiClien"])!=false)
            {
              $('#ClienteId').val(ValidateRut(array_nom_auto[i]["CodiClien"]));
              break;
            }
            else
            {
              swal("Error", "Rut invalidop", "error"); 
            }
          }
       }
    }
     $( "#ClienteId" ).autocomplete({
      source: function( request, response ) {
        $.ajax( {
          type:"POST",
          url: "<?php echo site_url('Ordendetrabajo/select_clienteinfo');?>",
          dataType: "json",
          data: {
            Texto: request.term
          },
          success: function( data ) {
      array_nom_auto=data;
           response( $.map( data, function( item ) {
                return {
                  label: item.CodiClien+' - '+item.Nombre,
                  value: item.CodiClien,
                }
              }));
          }
        } );
      },
      minLength: 1,
      select: function( event, ui ) {
        log( ui.item.label );
      }
    } );
  } );
/******************************************************************************************/
/******************************************************************************************/

/******************************************************************************************/
/******************************************************************************************/
});
</script>
