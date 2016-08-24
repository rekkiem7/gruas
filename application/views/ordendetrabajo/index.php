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
            <center>
                    <div>

                            <button class="btn btn-success" onclick="agregar_ordendetrabajo();">
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;Agregar Orden De Trabajo
                            </button>
                    </div>
            </center>
            <br>
            <div class="table-responsive">
		                <table id="tablaOrdenDeTrabajo" class="table table-bordered table-hover">
                            <thead>
                                    <tr>
                                            <th>N° OT</th>
                                            <th>Fecha</th>
                                            <th>Razon Social</th>
                                            <th>Cliente</th>
                                            <th>Total</th>
                                            <th>Ver</th>
                                            <th>Pdf</th>
                                            <th>Editar</th>
                                            <th>Eliminar</th>
                                    </tr>
                            </thead>
                            <tbody>
                            <?php
                                if(!empty($ordenesdetrabajo))
                                {
                                      foreach($ordenesdetrabajo as $row)
                                      {?>
                                      <tr>
                                            <td><?php echo $row->OTNumero?></td>
                                            <td><?php echo $row->OTFecha?></td>
                                            <td><?php echo $row->OTRazonSocial?></td>
                                            <td><?php echo $row->OTNombre?></td>
                                            <td><?php echo $row->ServicioValorTotalNeto?></td>
                                            <td style="text-align:center">
                                                <button class="btn btn-info" onclick="add_ordendetrabajo(<?=$row->id?>,'VerInfo')">
                                                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                                </button>
                                            </td>
                                            <td style="text-align:center">
                                                <button class="btn btn-warning" onclick="add_ordendetrabajo(<?=$row->id?>,'VerPdf')">
                                                    <span class="glyphicon glyphicon-download" aria-hidden="true"></span>
                                                </button>
                                            </td>
                                            <td style="text-align:center">
                                                <button class="btn btn-primary" onclick="add_ordendetrabajo(<?=$row->id?>,'EditarInfo')">
                                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                                </button>
                                            </td>
                                            <td style="text-align:center">
                                                <button class="btn btn-danger" onclick="eliminar_ordendetrabajo(<?php echo $row->id?>)">
                                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                                </button>
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
<div id="popup_AgregarOrdenDeTrabajo" class="modal modal-wide fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      <div class="modal-body">
      	<div class="row">
          <div class="modal-header col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h4 class="modal-title">Agregar Orden De Trabajo</h4>
          </div><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><br></div>

         <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
            <input type="hidden" class="form-control required" id="IdEditar" name="IdEditar"/>
            <label class="col-lg-2 col-md-4 col-sm-12 col-xs-12 control-label">Fecha </label>
               <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
                   <input type="date" class="form-control required requerido" id="OTFecha" name="OTFecha" value="<?=date("Y-m-d")?>" />
               </div>
        </div>
        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
            <label class="col-lg-2 col-md-4 col-sm-12 col-xs-12 control-label">Razon Social</label>
               <div class="col-lg-10 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
                   <select type="text" class="form-control required requerido" id="OTRazonSocial" name="OTRazonSocial" onchange="CargarNumeroOT();">
           		          <option value="">Seleccionar...</option>
                        <?php
                            foreach($razonessociales as $lsRazonSocial)
                            {?>
                                <option value="<?=$lsRazonSocial->Rut?>"><?=$lsRazonSocial->Rut." - ".$lsRazonSocial->Razonsocial?></option>
                            <?php
                            }
                        ?>
                   </select>
               </div>
        </div>
        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
            <label class="col-lg-2 col-md-4 col-sm-12 col-xs-12 control-label">Numero OT</label>
               <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
                   <input type="text" class="form-control required requerido" id="OTNumero" name="OTNumero" onblur="ValidarOT();" />
               </div>
        </div>
        <input type="text" class="form-control required requerido" id="OTNumeroqwqw" name="OTNumeroqwqw" onblur="ValidarRut();" />
        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
            <label class="col-lg-2 col-md-4 col-sm-12 col-xs-12 control-label">Cliente</label>
               <div class="col-lg-10 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
                   <select type="text" class="form-control required requerido" id="OTRut" name="OTRut">
                        <option value="">Seleccionar...</option>
                        <?php
                            foreach($clientes as $lsClientes)
                            {?>
                                <option value="<?=$lsClientes->CodiClien?>"><?=$lsClientes->CodiClien."-".$lsClientes->Nombre?></option>
                            <?php
                            }
                        ?>
                   </select>
               </div>
        </div>
        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
            <label class="col-lg-2 col-md-4 col-sm-12 col-xs-12 control-label">Direccion </label>
               <div class="col-lg-10 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
                   <input type="text" class="form-control required requerido" id="OTDireccion" name="OTDireccion" placeholder="Direccion del cliente" />
               </div>
        </div>
        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
            <label class="col-lg-2 col-md-4 col-sm-12 col-xs-12 control-label">Ciudad </label>
               <div class="col-lg-10 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
                   <input type="text" class="form-control required requerido" id="OTCiudad" name="OTCiudad" placeholder="Ciudad del cliente" />
               </div>
        </div>
        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
            <label class="col-lg-2 col-md-4 col-sm-12 col-xs-12 control-label">Comuna </label>
               <div class="col-lg-10 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
                   <input type="text" class="form-control required requerido" id="OTComuna" name="OTComuna" placeholder="Comuna del cliente" />
               </div>
        </div>
        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
            <label class="col-lg-2 col-md-4 col-sm-12 col-xs-12 control-label">Telefono </label>
               <div class="col-lg-10 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
                   <input type="text" class="form-control required" id="OTTelefono" name="OTTelefono" placeholder="Telefono del cliente" />
               </div>
        </div> 
          <div class="modal-header col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h4 class="modal-title">Detalle Grua / Camion</h4>
          </div><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><br></div>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label class="col-lg-2 col-md-2 col-sm-12 col-xs-12 control-label">Grua Folio</label>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
              <input type="text" class="form-control required requerido" id="GruaFolio" name="GruaFolio" placeholder="Folio de la Grua" onblur="CargarGruaFolio();" />
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label class="col-lg-2 col-md-2 col-sm-12 col-xs-12 control-label">Grua Patente</label>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
              <input type="text" class="form-control required requerido" id="GruaPatente" name="GruaPatente" placeholder="Patente de la Grua" onblur="CargarGrua();" />
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
          <label class="col-lg-4 col-md-4 col-sm-12 col-xs-12 control-label">Operador</label>
          <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
           <select type="text" class="form-control required" id="GruaOperadorId" name="GruaOperadorId" onchange="CargarOperador();">
                <option value="">Seleccionar...</option>
                <?php
                    foreach($operarios as $lsOperarios)
                    {?>
                        <option value="<?=$lsOperarios->Rut?>"><?=$lsOperarios->Rut."-".$lsOperarios->Nombre?></option>
                    <?php
                    }
                ?>
           </select>
          </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
          <label class="col-lg-2 col-md-2 col-sm-12 col-xs-12 control-label">Ayudante</label>
          <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
           <select type="text" class="form-control required" id="GruaAyudanteId" name="GruaAyudanteId">
                <option value="">Seleccionar...</option>
                <?php
                    foreach($operarios as $lsOperarios)
                    {?>
                        <option value="<?=$lsOperarios->Rut?>"><?=$lsOperarios->Rut." - ".$lsOperarios->Nombre?></option>
                    <?php
                    }
                ?>
           </select>
          </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label class="col-lg-2 col-md-2 col-sm-12 col-xs-12 control-label">Camion Patente</label>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
              <input type="text" class="form-control required" id="CamionPatente" name="CamionPatente" placeholder="Patente del camion"/>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <label class="col-lg-2 col-md-2 col-sm-12 col-xs-12 control-label">Chofer</label>
          <div class="col-lg-8  col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
           <select type="text" class="form-control required" id="CamionChoferId" name="CamionChoferId"">
                <option value="">Seleccionar...</option>
                <?php
                    foreach($operarios as $lsOperarios)
                    {?>
                        <option value="<?=$lsOperarios->Rut?>"><?=$lsOperarios->Rut."-".$lsOperarios->Nombre?></option>
                    <?php
                    }
                ?>
           </select>
          </div>
        </div>
        <div class="modal-header col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h4 class="modal-title">Detalle del Servicio</h4>
          </div><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><br></div>
          <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
            <label class="col-lg-4 col-md-4 col-sm-12 col-xs-12 control-label">Horario Minimo</label>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
              <input type="number" class="form-control required" id="ServicioHorarioMinimo" name="ServicioHorarioMinimo" placeholder="En Horas"/>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
            <label class="col-lg-4 col-md-4 col-sm-12 col-xs-12 control-label">Recargo</label>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
              <input type="text" class="form-control required" id="ServicioRecargo" name="ServicioRecargo" placeholder="%" onblur="CarcularHoraDeRecargo();" / >
            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
            <label class="col-lg-4 col-md-4 col-sm-12 col-xs-12 control-label">Desde Las</label>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
              <input type="number" class="form-control required" id="ServicioDesdeLas" name="ServicioDesdeLas" placeholder="Horas"/>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
            <label class="col-lg-4 col-md-4 col-sm-12 col-xs-12 control-label">Condicion De Pago</label>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
              <input type="text" class="form-control required" id="ServicioCondicionPago" name="ServicioCondicionPago" placeholder="Detalle"/>
            </div>
        </div>
        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
            <label class="col-lg-2 col-md-4 col-sm-12 col-xs-12 control-label">Solicitado Por Sr(a) </label>
               <div class="col-lg-10 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
                   <input type="text" class="form-control required" id="ServicioSolicitadoPor" name="ServicioSolicitadoPor" placeholder="Nombre" />
               </div>
        </div> 
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label class="col-lg-2 col-md-4 col-sm-12 col-xs-12 control-label">Lugar De La Faena </label>
               <div class="col-lg-10 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
                   <input type="text" class="form-control required" id="ServicioLugarDeLaFaena" name="ServicioLugarDeLaFaena" placeholder="Direccion de la faena" />
               </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label class="col-lg-2 col-md-4 col-sm-12 col-xs-12 control-label">Tipo De Faena </label>
               <div class="col-lg-10 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
                   <input type="text" class="form-control required" id="ServicioTipoDeFaena" name="ServicioTipoDeFaena" placeholder="Detalle de la faena" />
               </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <label class="col-lg-4 col-md-4 col-sm-12 col-xs-12 control-label">Valor Hora</label>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
              <input type="number" class="form-control required" id="ServicioValorHora" name="ServicioValorHora" placeholder="Valor" onblur="CalcularValorHora()" />
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <label class="col-lg-4 col-md-4 col-sm-12 col-xs-12 control-label">Valor Hora Recargo</label>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
              <input type="number" class="form-control required" id="ServicioValorHoraRecargo" name="ServicioValorHoraRecargo" placeholder="Valor" readonly="readonly" onb />
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <label class="col-lg-4 col-md-4 col-sm-12 col-xs-12 control-label">Hora Salida Garaje</label>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
              <input type="number" class="form-control required" id="ServicioHoraSalidaG" name="ServicioHoraSalidaG" placeholder="HHMM"/>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <label class="col-lg-4 col-md-4 col-sm-12 col-xs-12 control-label">Hora Llegada Garaje</label>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
              <input type="number" class="form-control required" id="ServicioHoraLlegadaG" name="ServicioHoraLlegadaG" placeholder="HHMM"/>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <label class="col-lg-4 col-md-4 col-sm-12 col-xs-12 control-label">Hora Llegada Faena</label>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
              <input type="number" pattern=".{4,4}" class="form-control required" id="ServicioHoraLlegadaF" name="ServicioHoraLlegadaF" placeholder="HHMM"/>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <label class="col-lg-4 col-md-4 col-sm-12 col-xs-12 control-label">Hora Termino Faena</label>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
              <input type="number" pattern=".{4,4}"  class="form-control required" id="ServicioHoraTerminoF" name="ServicioHoraTerminoF" placeholder="HHMM"/>
            </div>
        </div>  
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <label class="col-lg-4 col-md-4 col-sm-12 col-xs-12 control-label">Descuento Colacion</label>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
              <input type="number" class="form-control required" id="ServicioDescuentoColacion" name="ServicioDescuentoColacion" placeholder="HHMM"/>
            </div>
        </div> 
       <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
              <label class="col-lg-4 col-md-4 col-sm-12 col-xs-12 control-label">H.R</label>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
              <input type="number" class="form-control required" id="ServicioHR" name="ServicioHR" readonly="" />
            </div>
            </div>
        </div> 
        <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
            <label class="col-lg-4 col-md-4 col-sm-12 col-xs-12 control-label">H.N</label>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
              <input type="number" class="form-control required requerido" id="ServicioHN" name="ServicioHN" readonly="readonly"/>
            </div>
        </div>  
        <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
            <label class="col-lg-4 col-md-4 col-sm-12 col-xs-12 control-label">H.N Valor</label>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
              <input type="text" class="form-control required" id="ServicioHNValor" name="ServicioHNValor" readonly="" />
            </div>
        </div>   
        <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
            
            <input type="checkbox" name="CHKCalcularRecargo" id="CHKCalcularRecargo" class="css-checkbox checkbox" onclick="CalcularRecargo();">
                <label for="CHKCalcularRecargo" class="css-label checkbox" >Calcular Recargo</label>
        </div>   
        <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
            <label class="col-lg-4 col-md-4 col-sm-12 col-xs-12 control-label">H.R Valor</label>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
              <input type="number" class="form-control required requerido" id="ServicioHRValor" name="ServicioHRValor" readonly="readonly"/>
            </div>
        </div>   
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label class="col-lg-2 col-md-4 col-sm-12 col-xs-12 control-label"><button id="Divguardar" type="button" class="btn btn-warning" onclick="CalcularValores()"><span class="glyphicon glyphicon-plus" aria-hidden="true" ></span>&nbsp;Total Neto</button></label>
               <div class="col-lg-10 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
                   <input type="text" class="form-control" id="ServicioValorTotalNeto" name="ServicioValorTotalNeto" placeholder="Total Neto"  readonly="readonly" />
               </div>
        </div>
      </div>
      <div class="modal-footer">
        <button id="Divguardar" type="button" class="btn btn-primary" onclick="add_ordendetrabajo('0', 'GuardarNuevo')"><span class="glyphicon glyphicon-floppy-saved" aria-hidden="true" ></span>&nbsp;Guardar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>&nbsp;Cerrar</button>
      </div>
    </div>

  </div>
</div>
<!--Modal-->
</body>
<script>
function ValidarRut( form )
{
    var cedula = $('#OTNumeroqwqw').val();
    array = cedula.split( "" );
    num = array.length;

    total = 0;
    digito = (array[9]*1);
    for( i=0; i < (num-1); i++ )
    {
      mult = 0;
      if ( ( i%2 ) != 0 ) {
        total = total + ( array[i] * 1 );
      }
      else
      {
        mult = array[i] * 2;
        if ( mult > 9 )
          total = total + ( mult - 9 );
        else
          total = total + mult;
      }
    }
    decena = total / 10;
    decena = Math.floor( decena );
    decena = ( decena + 1 ) * 10;
    final = ( decena - total );
    alert(final);
    alert(digito);
    if ( ( final == 10 && digito == 0 ) || ( final == digito ) ) {
      alert( "La c\xe9dula ES v\xe1lida!!!" );
      return true;
    }
    else
    {
      alert( "La c\xe9dula NO es v\xe1lida!!!" );
      return false;
    }
} 

function CalcularValorHora()
{
  var ServicioRecargo = $('#ServicioRecargo').val();
  var ServicioValorHora = $('#ServicioValorHora').val();
  if(!ServicioRecargo || !ServicioValorHora)
  {
      swal("Error", "Se necesita un VALOR DE RECARGO y un VALOR DE HORA para que sea calculado el valor de la HORA DE RECARGO", "error"); 
  }
  else
  {
    $('#ServicioValorHoraRecargo').val(
      Number(Number(Number(Number(ServicioRecargo)/100))*Number(ServicioValorHora))+Number(ServicioValorHora)
    ); 
  }
}
function CargarReadOnly()
{
  $('#IdEditar').attr('readonly', true);
  $('#OTFecha').attr('readonly', true);
  $('#OTRazonSocial').attr('readonly', true);
  $('#OTRut').attr('readonly', true);
  $('#OTNombre').attr('readonly', true);
  $('#OTDireccion').attr('readonly', true);
  $('#OTCiudad').attr('readonly', true);
  $('#OTComuna').attr('readonly', true);
  $('#OTTelefono').attr('readonly', true);
  $('#GruaPatente').attr('readonly', true);
  $('#GruaOperadorId').attr('readonly', true);
  $('#GruaAyudanteId').attr('readonly', true);
  $('#CamionPatente').attr('readonly', true);
  $('#CamionChoferId').attr('readonly', true);
  $('#ServicioHorarioMinimo').attr('readonly', true);
  $('#ServicioRecargo').attr('readonly', true);
  $('#ServicioDesdeLas').attr('readonly', true);
  $('#ServicioCondicionPago').attr('readonly', true);
  $('#ServicioSolicitadoPor').attr('readonly', true);
  $('#ServicioLugarDeLaFaena').attr('readonly', true);
  $('#ServicioTipoDeFaena').attr('readonly', true);
  $('#ServicioValorHora').attr('readonly', true);
  $('#ServicioHoraSalidaG').attr('readonly', true);
  $('#ServicioHoraLlegadaG').attr('readonly', true);
  $('#ServicioHoraLlegadaF').attr('readonly', true);
  $('#ServicioHoraTerminoF').attr('readonly', true);
  $('#ServicioDescuentoColacion').attr('readonly', true);
  $('#ServicioHNValor').attr('readonly', true);
  $('#ServicioHR').attr('readonly', true);
  $('#Divguardar').css('display','none');
}
function QuitarReadOnly()
{
  $('#IdEditar').attr('readonly', false);
  $('#OTFecha').attr('readonly', false);
  $('#OTRazonSocial').attr('readonly', false);
  $('#OTRut').attr('readonly', false);
  $('#OTNombre').attr('readonly', false);
  $('#OTDireccion').attr('readonly', false);
  $('#OTCiudad').attr('readonly', false);
  $('#OTComuna').attr('readonly', false);
  $('#OTTelefono').attr('readonly', false);
  $('#GruaPatente').attr('readonly', false);
  $('#GruaOperadorId').attr('readonly', false);
  $('#GruaAyudanteId').attr('readonly', false);
  $('#CamionPatente').attr('readonly', false);
  $('#CamionChoferId').attr('readonly', false);
  $('#ServicioHorarioMinimo').attr('readonly', false);
  $('#ServicioRecargo').attr('readonly', false);
  $('#ServicioDesdeLas').attr('readonly', false);
  $('#ServicioCondicionPago').attr('readonly', false);
  $('#ServicioSolicitadoPor').attr('readonly', false);
  $('#ServicioLugarDeLaFaena').attr('readonly', false);
  $('#ServicioTipoDeFaena').attr('readonly', false);
  $('#ServicioValorHora').attr('readonly', false);
  $('#ServicioHoraSalidaG').attr('readonly', false);
  $('#ServicioHoraLlegadaG').attr('readonly', false);
  $('#ServicioHoraLlegadaF').attr('readonly', false);
  $('#ServicioHoraTerminoF').attr('readonly', false);
  $('#ServicioDescuentoColacion').attr('readonly', false);
  $('#ServicioHNValor').attr('readonly', false);
  $('#ServicioHR').attr('readonly', false);
  $('#Divguardar').css('display','block');
}
function CargarGruaFolio()
{
  var GruaFolio = $('#GruaFolio').val();
  if(GruaFolio)
  {
    $.ajax({
          type:"POST",
          url:"<?php echo site_url('Ordendetrabajo/select_patentegruaFolio');?>",
          data:{GruaFolio:GruaFolio},
          success:function(data)
          {
              if(data!="ERROR")
              {
                var datos=JSON.parse(data);
                $('#GruaPatente').val(datos[0]["Patente"]);
                $('#ServicioValorHora').val(datos[0]["ValorHora"]);
                $('#ServicioHorarioMinimo').val(datos[0]["MinimoHora"]);
                $('#ServicioRecargo').val(datos[0]["Recargo"]);

                $('#ServicioValorHoraRecargo').val(
                Number(Number(Number(Number($('#ServicioRecargo').val())/100))*Number($('#ServicioValorHora').val()))+Number($('#ServicioValorHora').val())
                );                
              }
              else
              {
                  swal("Error", "No se encuentra la grua", "error");
                  $('#GruaPatente').val('');
                  $('#ServicioValorHora').val('');
                  $('#ServicioHorarioMinimo').val('');
                  $('#ServicioRecargo').val('');
                  $('#GruaFolio').val('');
                  $('#ServicioValorHoraRecargo').val('');
              }
          }
      });
  }
  else
  {
      swal("Importante", "Debe ingresar el folio de la grua para buscar la informacion", "warning");
      $('#ServicioValorHora').attr('value','');
  }
}
function CarcularHoraDeRecargo()
{
  if($('#ServicioRecargo').val() && $('#ServicioValorHora').val())
  {
    $('#ServicioValorHoraRecargo').val(
                Number(Number(Number(Number($('#ServicioRecargo').val())/100))*Number($('#ServicioValorHora').val()))+Number($('#ServicioValorHora').val())
                ); 
  }
  else
  {
    swal("Importante", "Debe ingresar una grua para obtener el valor del recargo y de la hora de la maquina", "warning");
      $('#ServicioValorHora').attr('value','');
  }
}
function CargarGrua()
{
  var GruaPatente = $('#GruaPatente').val();
  if(GruaPatente)
  {
    $.ajax({
          type:"POST",
          url:"<?php echo site_url('Ordendetrabajo/select_patentegrua');?>",
          data:{GruaPatente:GruaPatente},
          success:function(data)
          {
              if(data!="ERROR")
              {
                var datos=JSON.parse(data);
                $('#ServicioValorHora').val(datos[0]["ValorHora"]);
                $('#ServicioHorarioMinimo').val(datos[0]["MinimoHora"]);
                $('#ServicioRecargo').val(datos[0]["Recargo"]);
                $('#ServicioValorHoraRecargo').val(
                Number(Number(Number(Number($('#ServicioRecargo').val())/100))*Number($('#ServicioValorHora').val()))+Number($('#ServicioValorHora').val())
                );               
              }
              else
              {
                  swal("Error", "No se encuentra la grua", "error");
                  $('#GruaPatente').val('');
                  $('#ServicioValorHora').val('');
                  $('#ServicioHorarioMinimo').val('');
                  $('#ServicioRecargo').val('');  
                  $('#GruaFolio').val('');
                  $('#ServicioValorHoraRecargo').val('');
              }
          }
      });
  }
  else
  {
      swal("Importante", "Debe ingresar la patente de la grua", "warning");
      $('#ServicioValorHora').attr('value','');
  }
}
function ValidarOT()
{
  var IdEditar = $('#IdEditar').val();
  var OT = $('#OTNumero').val();
  var RazonSocial = $('#OTRazonSocial').val();
  if(!OT || !RazonSocial)
  {
    swal("Error", "Debe tener seleccionada una razon social y haber ingresado un numero de OT", "warning");
  }
  else
  {
    $.ajax({
        type:"POST",
        url:"<?php echo site_url('Ordendetrabajo/ValidarNumeroOt');?>",
        data:{IdEditar:IdEditar, OT:OT, RazonSocial:RazonSocial},
        success:function(data)
        {
          if(data=="OK")
            {
               swal("Orden De Trabajo Eliminada", "La Orden De Trabajo ha sido eliminada correctamente", "success");
               setTimeout(function(){ swal.close(); window.open("<?php echo site_url('Ordendetrabajo/index');?>","_self");}, 1500);
            }
            else if(data=="ERROR")
            {
              swal("Error", "El numero de OT ya esta en uso", "error");
              $('#OTNumero').val('');
            }
        }
    });
  }
}
function BuscarRequeridos()
{
  var errores = 0;
  $('.requerido').each(function()
  {
    if($.trim($(this).val())=="")
    {
      $(this).addClass('rellenar');
      errores++;
    }
    else
    {
      $(this).removeClass('rellenar');
    }             
  });
  return errores;
}
function limpiar()
{
  var date = new Date();
  var day = date.getDate();
  var month = date.getMonth() + 1;
  var year = date.getFullYear();
  if (month < 10) month = "0" + month;
  if (day < 10) day = "0" + day;
  var today = year + "-" + month + "-" + day; 
 
 $('#IdEditar').val('');
 $('#OTFecha').val(today);
 $('#OTRazonSocial').val('');
 $('#OTNumero').val('');
 $('#OTRut').val('');
 $('#OTNombre').val('');
 $('#OTDireccion').val('');
 $('#OTCiudad').val('');
 $('#OTComuna').val('');
 $('#OTTelefono').val('');
 $('#GruaPatente').val('');
 $('#GruaOperadorId').val('');
 $('#GruaAyudanteId').val('');
 $('#CamionPatente').val('');
 $('#CamionChoferId').val('');
 $('#ServicioHorarioMinimo').val('');
 $('#ServicioRecargo').val('');
 $('#ServicioDesdeLas').val('');
 $('#ServicioCondicionPago').val('');
 $('#ServicioSolicitadoPor').val('');
 $('#ServicioLugarDeLaFaena').val('');
 $('#ServicioTipoDeFaena').val('');
 $('#ServicioValorHora').val('');
 $('#ServicioHoraSalidaG').val('');
 $('#ServicioHoraLlegadaG').val('');
 $('#ServicioHoraLlegadaF').val('');
 $('#ServicioHoraTerminoF').val('');
 $('#ServicioDescuentoColacion').val('');
 $('#CHKCalcularRecargo').val('');
 $('#ServicioHN').val('');
 $('#ServicioHNValor').val('');
 $('#ServicioHR').val('');
 $('#ServicioHRValor').val('0');
 $('#ServicioValorTotalNeto').val('');
}
function eliminar_ordendetrabajo(id)
{
	swal({   title: "¿Desea eliminar la Orden De Trabajo?",   text: "La Orden De Trabajo no aparecerá en la aplicación",   type: "warning",   showCancelButton: true,   confirmButtonColor: "#CC0000",   confirmButtonText: "Eliminar",   cancelButtonText: "Cancelar",   closeOnConfirm: true,   closeOnCancel: true }, function(isConfirm){   if (isConfirm) {

		$.ajax({
            type:"POST",
            url:"<?php echo site_url('Ordendetrabajo/delete_ordendetrabajo');?>",
            data:{id:id},
            success:function(data)
            {
            	if(data==1)
	              {
	                 swal("Orden De Trabajo Eliminada", "La Orden De Trabajo ha sido eliminada correctamente", "success");
	                 setTimeout(function(){ swal.close(); window.open("<?php echo site_url('Ordendetrabajo/index');?>","_self");}, 1500);
	              }
	              else
	              {
	                swal("Error", "Se ha producido un error al eliminar la orden de trabajo, por favor inténtelo nuevamente", "error");
	              }
            }
       });
	}
  });
}
function add_ordendetrabajo(Id, Accion)
{
  if(Accion=='EditarInfo')
  {
      limpiar();
      QuitarReadOnly();
      $.ajax({
          type:"POST",
          url:"<?php echo site_url('Ordendetrabajo/VerInfo');?>",
          data:{Id:Id},
          success:function(data)
          {
            $('#popup_AgregarOrdenDeTrabajo').modal('show');
            if(data!="ERROR")
            {
                var datos=JSON.parse(data);
                $('#IdEditar').val(Id);
                $('#OTFecha').val(datos[0]["OTFecha"]);
                $('#OTRazonSocial').val(datos[0]["OTRazonSocial"]);
                $('#OTNumero').val(datos[0]["OTNumero"]);
                $('#OTRut').val(datos[0]["OTRut"]);
                $('#OTNombre').val(datos[0]["OTNombre"]);
                $('#OTDireccion').val(datos[0]["OTDireccion"]);
                $('#OTCiudad').val(datos[0]["OTCiudad"]);
                $('#OTComuna').val(datos[0]["OTComuna"]);
                $('#OTTelefono').val(datos[0]["OTTelefono"]);
                $('#GruaPatente').val(datos[0]["GruaPatente"]);
                $('#GruaOperadorId').val(datos[0]["GruaOperadorId"]);
                $('#GruaAyudanteId').val(datos[0]["GruaAyudanteId"]);
                $('#CamionPatente').val(datos[0]["CamionPatente"]);
                $('#CamionChoferId').val(datos[0]["CamionChoferId"]);
                $('#ServicioHorarioMinimo').val(datos[0]["ServicioHorarioMinimo"]);
                $('#ServicioRecargo').val(datos[0]["ServicioRecargo"]);
                $('#ServicioDesdeLas').val(datos[0]["ServicioDesdeLas"]);
                $('#ServicioCondicionPago').val(datos[0]["ServicioCondicionPago"]);
                $('#ServicioSolicitadoPor').val(datos[0]["ServicioSolicitadoPor"]);
                $('#ServicioLugarDeLaFaena').val(datos[0]["ServicioLugarDeLaFaena"]);
                $('#ServicioTipoDeFaena').val(datos[0]["ServicioTipoDeFaena"]);
                $('#ServicioValorHora').val(datos[0]["ServicioValorHora"]);
                $('#ServicioHoraSalidaG').val(datos[0]["ServicioHoraSalidaG"]);
                $('#ServicioHoraLlegadaG').val(datos[0]["ServicioHoraLlegadaG"]);
                $('#ServicioHoraLlegadaF').val(datos[0]["ServicioHoraLlegadaF"]);
                $('#ServicioHoraTerminoF').val(datos[0]["ServicioHoraTerminoF"]);
                $('#ServicioDescuentoColacion').val(datos[0]["ServicioDescuentoColacion"]);
                $('#ServicioHN').val(datos[0]["ServicioHN"]);
                $('#ServicioHNValor').val(datos[0]["ServicioHNValor"]);
                $('#ServicioHR').val(datos[0]["ServicioHR"]);
                $('#ServicioHRValor').val(datos[0]["ServicioHRValor"]);
                $('#ServicioValorTotalNeto').val(datos[0]["ServicioValorTotalNeto"]);
            }
            else
            {
               swal("Error", "No se encontro información del cliente seleccionado", "error");
                limpiar();
            }
          },
          error: function() {
              swal("Error", "No se pudo realizar el proceso", "error");
              limpiar();
          }
        });
  }
  else if(Accion=='VerInfo')
  {
      limpiar();
      $.ajax({
          type:"POST",
          url:"<?php echo site_url('Ordendetrabajo/VerInfo');?>",
          data:{Id:Id},
          success:function(data)
          {
            $('#popup_AgregarOrdenDeTrabajo').modal('show');
            if(data!="ERROR")
            {
                CargarReadOnly();
                var datos=JSON.parse(data);
                $('#OTFecha').val(datos[0]["OTFecha"]);
                $('#OTRazonSocial').val(datos[0]["OTRazonSocial"]);
                $('#OTNumero').val(datos[0]["OTNumero"]);
                $('#OTRut').val(datos[0]["OTRut"]);
                $('#OTNombre').val(datos[0]["OTNombre"]);
                $('#OTDireccion').val(datos[0]["OTDireccion"]);
                $('#OTCiudad').val(datos[0]["OTCiudad"]);
                $('#OTComuna').val(datos[0]["OTComuna"]);
                $('#OTTelefono').val(datos[0]["OTTelefono"]);
                $('#GruaPatente').val(datos[0]["GruaPatente"]);
                $('#GruaOperadorId').val(datos[0]["GruaOperadorId"]);
                $('#GruaAyudanteId').val(datos[0]["GruaAyudanteId"]);
                $('#CamionPatente').val(datos[0]["CamionPatente"]);
                $('#CamionChoferId').val(datos[0]["CamionChoferId"]);
                $('#ServicioHorarioMinimo').val(datos[0]["ServicioHorarioMinimo"]);
                $('#ServicioRecargo').val(datos[0]["ServicioRecargo"]);
                $('#ServicioDesdeLas').val(datos[0]["ServicioDesdeLas"]);
                $('#ServicioCondicionPago').val(datos[0]["ServicioCondicionPago"]);
                $('#ServicioSolicitadoPor').val(datos[0]["ServicioSolicitadoPor"]);
                $('#ServicioLugarDeLaFaena').val(datos[0]["ServicioLugarDeLaFaena"]);
                $('#ServicioTipoDeFaena').val(datos[0]["ServicioTipoDeFaena"]);
                $('#ServicioValorHora').val(datos[0]["ServicioValorHora"]);
                $('#ServicioHoraSalidaG').val(datos[0]["ServicioHoraSalidaG"]);
                $('#ServicioHoraLlegadaG').val(datos[0]["ServicioHoraLlegadaG"]);
                $('#ServicioHoraLlegadaF').val(datos[0]["ServicioHoraLlegadaF"]);
                $('#ServicioHoraTerminoF').val(datos[0]["ServicioHoraTerminoF"]);
                $('#ServicioDescuentoColacion').val(datos[0]["ServicioDescuentoColacion"]);
                $('#ServicioHN').val(datos[0]["ServicioHN"]);
                $('#ServicioHNValor').val(datos[0]["ServicioHNValor"]);
                $('#ServicioHR').val(datos[0]["ServicioHR"]);
                $('#ServicioHRValor').val(datos[0]["ServicioHRValor"]);
                $('#ServicioValorTotalNeto').val(datos[0]["ServicioValorTotalNeto"]);
            }
            else
            {
               swal("Error", "No se encontro información del cliente seleccionado", "error");
                limpiar();
            }
          },
          error: function() {
              swal("Error", "No se pudo realizar el proceso", "error");
              limpiar();
          }
        });
  }
  else if(Accion=='VerPdf')
  {
      var dominio = $('#Dominio').val();
      window.location.replace(dominio+'/Ordendetrabajo/VerPdf?id='+Id);
  }
  else if(Accion=="GuardarNuevo")
  {
      var IdEditar = $('#IdEditar').val();
      if(!IdEditar)
      {
          CalcularRecargo();
          CalcularValores();
          var OTFecha = $('#OTFecha').val();
          var OTRazonSocial = $('#OTRazonSocial').val();
          var OTNumero = $('#OTNumero').val();
          var OTRut = $('#OTRut').val();
          var OTNombre = $('#OTNombre').val();
          var OTDireccion = $('#OTDireccion').val();
          var OTCiudad = $('#OTCiudad').val();
          var OTComuna = $('#OTComuna').val();
          var OTTelefono = $('#OTTelefono').val();
          var GruaPatente = $('#GruaPatente').val();
          var GruaOperadorId = $('#GruaOperadorId').val();
          var GruaAyudanteId = $('#GruaAyudanteId').val();
          var CamionPatente = $('#CamionPatente').val();
          var CamionChoferId = $('#CamionChoferId').val();
          var ServicioHorarioMinimo = $('#ServicioHorarioMinimo').val();
          var ServicioRecargo = $('#ServicioRecargo').val();
          var ServicioDesdeLas = $('#ServicioDesdeLas').val();
          var ServicioCondicionPago = $('#ServicioCondicionPago').val();
          var ServicioSolicitadoPor = $('#ServicioSolicitadoPor').val();
          var ServicioLugarDeLaFaena = $('#ServicioLugarDeLaFaena').val();
          var ServicioTipoDeFaena = $('#ServicioTipoDeFaena').val();
          var ServicioValorHora = $('#ServicioValorHora').val();
          var ServicioHoraSalidaG = $('#ServicioHoraSalidaG').val();
          var ServicioHoraLlegadaG = $('#ServicioHoraLlegadaG').val();
          var ServicioHoraLlegadaF = $('#ServicioHoraLlegadaF').val();
          var ServicioHoraTerminoF = $('#ServicioHoraTerminoF').val();
          var ServicioDescuentoColacion = $('#ServicioDescuentoColacion').val();
          var ServicioHN = $('#ServicioHN').val();
          var ServicioHNValor = $('#ServicioHNValor').val();
          var ServicioHR = $('#ServicioHR').val();
          var ServicioHRValor = $('#ServicioHRValor').val();
          var ServicioValorTotalNeto = $('#ServicioValorTotalNeto').val();
          if(BuscarRequeridos()==0)
          {
            $.ajax({
              type:"POST",
              url:"<?php echo site_url('Ordendetrabajo/add_ordendetrabajo');?>",
              data:{OTFecha:OTFecha, OTRazonSocial:OTRazonSocial, OTNumero:OTNumero, OTRut:OTRut, OTNombre:OTNombre, OTDireccion:OTDireccion, OTCiudad:OTCiudad, OTComuna:OTComuna, OTTelefono:OTTelefono, GruaPatente:GruaPatente, GruaOperadorId:GruaOperadorId, GruaAyudanteId:GruaAyudanteId, CamionPatente:CamionPatente, CamionChoferId:CamionChoferId, ServicioHorarioMinimo:ServicioHorarioMinimo, ServicioRecargo:ServicioRecargo, ServicioDesdeLas:ServicioDesdeLas, ServicioCondicionPago:ServicioCondicionPago, ServicioSolicitadoPor:ServicioSolicitadoPor, ServicioLugarDeLaFaena:ServicioLugarDeLaFaena, ServicioTipoDeFaena:ServicioTipoDeFaena, ServicioValorHora:ServicioValorHora, ServicioHoraSalidaG:ServicioHoraSalidaG, ServicioHoraLlegadaG:ServicioHoraLlegadaG, ServicioHoraLlegadaF:ServicioHoraLlegadaF, ServicioHoraTerminoF:ServicioHoraTerminoF, ServicioDescuentoColacion:ServicioDescuentoColacion, ServicioHN:ServicioHN, ServicioHNValor:ServicioHNValor, ServicioHR:ServicioHR, ServicioHRValor:ServicioHRValor, ServicioValorTotalNeto:ServicioValorTotalNeto},
              success:function(data)
              {
                if(data==1)
                {
                  swal("Orden De Trabajo Registrada", "La orden de trabajo ha sido ingresada correctamente", "success");
                  $('#popup_AgregarOrdenDeTrabajo').modal('hide');
                  setTimeout(function(){ swal.close(); window.open("<?php echo site_url('Ordendetrabajo/index');?>","_self");}, 1500);
                  
                }
                else
                {
                    swal("Error", "Problema al intentar registrar la orden de trabajo, por favor inténtelo nuevamente", "error");
                }
              },
              error: function() {
                  swal("Error", "No se pudo realizar el proceso", "error");
                  limpiar();
              }
            });
          }
          else
          {
              swal("Error", "Debe ingresar toda la informacion solicitada", "error");
          }
      }
      else
      {
          var OTFecha = $('#OTFecha').val();
          var OTRazonSocial = $('#OTRazonSocial').val();
          var OTNumero = $('#OTNumero').val();
          var OTRut = $('#OTRut').val();
          var OTNombre = $('#OTNombre').val();
          var OTDireccion = $('#OTDireccion').val();
          var OTCiudad = $('#OTCiudad').val();
          var OTComuna = $('#OTComuna').val();
          var OTTelefono = $('#OTTelefono').val();
          var GruaPatente = $('#GruaPatente').val();
          var GruaOperadorId = $('#GruaOperadorId').val();
          var GruaAyudanteId = $('#GruaAyudanteId').val();
          var CamionPatente = $('#CamionPatente').val();
          var CamionChoferId = $('#CamionChoferId').val();
          var ServicioHorarioMinimo = $('#ServicioHorarioMinimo').val();
          var ServicioRecargo = $('#ServicioRecargo').val();
          var ServicioDesdeLas = $('#ServicioDesdeLas').val();
          var ServicioCondicionPago = $('#ServicioCondicionPago').val();
          var ServicioSolicitadoPor = $('#ServicioSolicitadoPor').val();
          var ServicioLugarDeLaFaena = $('#ServicioLugarDeLaFaena').val();
          var ServicioTipoDeFaena = $('#ServicioTipoDeFaena').val();
          var ServicioValorHora = $('#ServicioValorHora').val();
          var ServicioHoraSalidaG = $('#ServicioHoraSalidaG').val();
          var ServicioHoraLlegadaG = $('#ServicioHoraLlegadaG').val();
          var ServicioHoraLlegadaF = $('#ServicioHoraLlegadaF').val();
          var ServicioHoraTerminoF = $('#ServicioHoraTerminoF').val();
          var ServicioDescuentoColacion = $('#ServicioDescuentoColacion').val();
          var ServicioHN = $('#ServicioHN').val();
          var ServicioHNValor = $('#ServicioHNValor').val();
          var ServicioHR = $('#ServicioHR').val();
          var ServicioHRValor = $('#ServicioHRValor').val();
          var ServicioValorTotalNeto = $('#ServicioValorTotalNeto').val();
          if(BuscarRequeridos()==0)
          {
            $.ajax({
              type:"POST",
              url:"<?php echo site_url('Ordendetrabajo/update_ordendetrabajo');?>",
              data:{IdEditar:IdEditar, OTFecha:OTFecha, OTRazonSocial:OTRazonSocial, OTNumero:OTNumero, OTRut:OTRut, OTNombre:OTNombre, OTDireccion:OTDireccion, OTCiudad:OTCiudad, OTComuna:OTComuna, OTTelefono:OTTelefono, GruaPatente:GruaPatente, GruaOperadorId:GruaOperadorId,  GruaAyudanteId:GruaAyudanteId, CamionPatente:CamionPatente, CamionChoferId:CamionChoferId, ServicioHorarioMinimo:ServicioHorarioMinimo, ServicioRecargo:ServicioRecargo, ServicioDesdeLas:ServicioDesdeLas, ServicioCondicionPago:ServicioCondicionPago, ServicioSolicitadoPor:ServicioSolicitadoPor, ServicioLugarDeLaFaena:ServicioLugarDeLaFaena, ServicioTipoDeFaena:ServicioTipoDeFaena, ServicioValorHora:ServicioValorHora, ServicioHoraSalidaG:ServicioHoraSalidaG, ServicioHoraLlegadaG:ServicioHoraLlegadaG, ServicioHoraLlegadaF:ServicioHoraLlegadaF, ServicioHoraTerminoF:ServicioHoraTerminoF, ServicioDescuentoColacion:ServicioDescuentoColacion, ServicioHN:ServicioHN, ServicioHNValor:ServicioHNValor, ServicioHR:ServicioHR, ServicioHRValor:ServicioHRValor, ServicioValorTotalNeto:ServicioValorTotalNeto},
              success:function(data)
              {
                if(data==1)
                {
                  swal("Orden De Trabajo Actualizada", "La orden de trabajo ha sido actualizada correctamente", "success");
                  $('#popup_AgregarOrdenDeTrabajo').modal('hide');
                  setTimeout(function(){ swal.close(); window.open("<?php echo site_url('Ordendetrabajo/index');?>","_self");}, 1500);
                  
                }
                else
                {
                    swal("Error", "Problema al intentar actualizar la orden de trabajo, por favor inténtelo nuevamente", "error");
                }
              },
              error: function() {
                  swal("Error", "No se pudo realizar el proceso", "error");
                  limpiar();
              }
            });
          }
          else
          {
              swal("Error", "Debe ingresar toda la informacion solicitada", "error");
          }
      }
  }

  
}
function agregar_ordendetrabajo()
{
  limpiar();
  QuitarReadOnly();
	$('#popup_AgregarOrdenDeTrabajo').modal();
}
function CargarNumeroOT()
{
  var OTRazonSocial = $('#OTRazonSocial').val();
  var IdEditar      = $('#IdEditar').val();
  if(OTRazonSocial)
  {
  $.ajax({
          type:"POST",
          url:"<?php echo site_url('Ordendetrabajo/select_otnumero');?>",
          data:{OTRazonSocial:OTRazonSocial, IdEditar:IdEditar},
          success:function(data)
          {
            $('#OTNumero').val(data);
          }
      });
  }
  else
  {
      swal("Error", "Debe seleccionar una razon social valida", "error");
      $('#OTNumero').val('');
  }
}
function CargarInfoCliente()
{
  var OTRut = $('#OTRut').val();
  if(OTRut)
  {
    $.ajax({
          type:"POST",
          url:"<?php echo site_url('Ordendetrabajo/select_clienteinfo');?>",
          data:{OTRut:OTRut},
          success:function(data)
          {
            if(data!="ERROR")
            {
                var datos=JSON.parse(data);
                $('#OTNombre').val(datos[0]["Nombre"]);
                $('#OTDireccion').val(datos[0]["Direccion"]);
                $('#OTCiudad').val(datos[0]["CiudadDesp"]);
                $('#OTComuna').val(datos[0]["Comuna"]);
                $('#OTTelefono').val(datos[0]["Fono"]);
            }
            else
            {
               swal("Error", "No se encontro información del cliente seleccionado", "error");
                $('#OTRut').val('');
                $('#OTNombre').val('');
                $('#OTDireccion').val('');
                $('#OTCiudad').val('');
                $('#OTComuna').val('');
                $('#OTTelefono').val('');
            }
          },
          error: function() {
              swal("Error", "No se pudo realizar la busqueda del cliente", "error");
            $('#OTRut').val('');
            $('#OTNombre').val('');
            $('#OTDireccion').val('');
            $('#OTCiudad').val('');
            $('#OTComuna').val('');
            $('#OTTelefono').val('');
          }
      });
  }
  else
  {
      swal("Error", "Debe seleccionar un cliente valido", "error");
      $('#OTRut').val('');
      $('#OTDireccion').val('');
      $('#OTCiudad').val('');
      $('#OTComuna').val('');
      $('#OTTelefono').val('');
  }
}
function CalcularRecargo()
{
  if($('#CHKCalcularRecargo').is(':checked')) 
  {
    if ($('#ServicioDesdeLas').val().length!=4)
    {
      swal("Error", "Hora DESDE LAS invalida, OBLIGATORIO 4 digitos", "error"); 
      document.getElementById("CHKCalcularRecargo").checked = false;
    }
    else if ($('#ServicioHoraSalidaG').val().length!=4)
    {
      swal("Error", "Hora DE SALIDA invalida, OBLIGATORIO 4 digitos", "error"); 
      document.getElementById("CHKCalcularRecargo").checked = false;
    }
    else if($('#ServicioValorHora').val())
    {
        var HoraLlegada       =   $('#ServicioHoraLlegadaG').val();
        var HoraDesdeLas      =   $('#ServicioDesdeLas').val();
        HoraLlegada           =   Number(HoraLlegada.substring(0,2)*60) + Number(HoraLlegada.substring(2,4)); 
        HoraDesdeLas          =   Number(HoraDesdeLas.substring(0,2)*60) + Number(HoraDesdeLas.substring(2,4)); 
        var HorasRecargo      =   Number(HoraLlegada)-Number(HoraDesdeLas);
        HorasRecargo          =   Number(HorasRecargo)/60;
        if((Math.ceil(HorasRecargo * 100)/100)<0)
        {
          $('#ServicioHR').val(Number(Math.ceil(HorasRecargo * 100)/100)*-1);
        }
        else
        {
          $('#ServicioHR').val(Math.ceil(HorasRecargo * 100)/100);
        }
        var ServicioValorHora           =    $('#ServicioValorHora').val();
        var ServicioValorHoraRecargo    =    $('#ServicioValorHoraRecargo').val();
        ServicioValorHora               =    Number(ServicioValorHoraRecargo)*Number(HorasRecargo);
        ServicioValorHora               =    Math.ceil(ServicioValorHora * 1000)/1000;
        $('#ServicioHRValor').val(ServicioValorHora);
        if($('#ServicioValorTotalNeto').val() && $('#ServicioValorTotalNeto').val()>0)
        {
          $('#ServicioValorTotalNeto').val(Number($('#ServicioValorTotalNeto').val())+Number($('#ServicioHRValor').val()) );
        } 
    }
    else
    {
      swal("Error", "Debe ingresar el valor hora de la grua, y la hora de llegada al garaje", "error"); 
      document.getElementById("CHKCalcularRecargo").checked = false;
    }
  }
  else
  {
    $('#ServicioHR').val('');
    $('#ServicioHRValor').val('0');
    if($('#ServicioValorTotalNeto').val() && $('#ServicioValorTotalNeto').val()>0)
      {
        CalcularValores();
      }
  }
} 
function CalcularValores()
{
  var ServicioHorarioMinimo = $('#ServicioHorarioMinimo').val();
  var DescuentoColacion = $('#ServicioDescuentoColacion').val();
  var ValorHora         = $('#ServicioValorHora').val();
  var HoraLlegada       = $('#ServicioHoraLlegadaG').val();
  var HoraSalida        = $('#ServicioHoraSalidaG').val();
  var ServicioDesdeLas  = $('#ServicioDesdeLas').val(); 

  if(HoraLlegada.length!=4 && ServicioDesdeLas.length!=4 )
  {
    swal("Error", "Debe ingresar un valor HORA DE LLEGADA o HORA DESDE LAS, para poder calcular has HN, OBLIGATORIO 4 digitos", "error");
  }
  else if(HoraLlegada.length!=4 || HoraSalida.length!=4 )
  {
    swal("Error", "Hora de llegada o hora salida garaje invalidas, OBLIGATORIO 4 digitos", "error");
  }
  else if(!ValorHora)
  {
    swal("Error", "Debe ingresar un valor de hora, OBLIGATORIO 4 digitos", "error");
  }
  else
  {
    $('#ServicioValorHora').removeClass('rellenar');
    $('#ServicioHoraLlegadaG').removeClass('rellenar');
    $('#ServicioHoraSalidaG').removeClass('rellenar');
    HoraSalida           =   Number(HoraSalida.substring(0,2)*60) + Number(HoraSalida.substring(2,4));
    if(ServicioDesdeLas)
    {
      var HoraTope   =   Number(ServicioDesdeLas.substring(0,2)*60) + Number(ServicioDesdeLas.substring(2,4));
    }
    else
    {
      var HoraTope           =   Number(HoraLlegada.substring(0,2)*60) + Number(HoraLlegada.substring(2,4));
    }
    if(DescuentoColacion)
    {
      DescuentoColacion    =   Number(DescuentoColacion.substring(0,2)*60) + Number(DescuentoColacion.substring(2,4));
    }
    else
    {
      DescuentoColacion = 0;
    }
    var ServicioHN = Number(HoraTope) - Number(HoraSalida) ;
    if(DescuentoColacion>ServicioHN)
    {
      swal("Error", "El descuento no puede ser superior a las horas HN", "error"); 
    }
    else
    {
      ServicioHN = Number(ServicioHN) - Number(DescuentoColacion);
      ServicioHN = Number(ServicioHN)/60;
      ServicioHN = Math.round(Number(ServicioHN) * 100) / 100;
      if (Number(ServicioHN)<Number(ServicioHorarioMinimo))
      {
        ServicioHN = ServicioHorarioMinimo;
      }
      $('#ServicioHN').val(ServicioHN);
      $('#ServicioHNValor').val(Number(ServicioHN) * Number(ValorHora));
      $('#ServicioValorTotalNeto').val(Number($('#ServicioHNValor').val()) + Number($('#ServicioHRValor').val()));  
    }
  }

}
$(document).ready(function()
{
  $('#OTRazonSocial').change(function(event)
  {   
    CargarNumeroOT();
  });
  $('#OTRut').change(function(event)
  {   
    CargarInfoCliente();
  });  
  
  $('#tablaOrdenDeTrabajo').DataTable({
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
