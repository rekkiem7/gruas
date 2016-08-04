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
<div class="animated fadeInRight"><center><h4>Ordenes De Trabajo</h4></center></div><br><br>
<center><div><button class="btn btn-success" onclick="agregar_ordendetrabajo();"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;Agregar Orden De Trabajo</button></div></center><br>
	<div class="table-responsive">
		<table id="tablaOrdenDeTrabajo" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>N° OT</th>
                  <th>Cliente</th>
                  <th>Fecha</th>
                  <th>Ver</th>
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
                		<td><?php echo $row->ClienteRut." - ".$row->ClienteNombre?></td>
                		<td><?php echo $row->OTFecha?></td>
                		<td style="text-align:center"><button class="btn btn-info" onclick="ver_cliente(<?php echo $row->id?>)"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                		</td>
                		<td style="text-align:center"><button class="btn btn-primary" onclick="editar_cliente(<?php echo $row->id?>)"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
                		</td>
                		<td style="text-align:center"><button class="btn btn-danger" onclick="eliminar_cliente(<?php echo $row->id?>)"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
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
    <!-- Modal content-->
    <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      <div class="modal-body">
        
      	<div class="row">
        <!-- -->
          <div class="modal-header col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h4 class="modal-title">Editar Orden De Trabajo</h4>
          </div><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><br></div>

         <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
            <label class="col-lg-2 col-md-4 col-sm-12 col-xs-12 control-label">Fecha </label>
               <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
                   <input type="date" class="form-control required requerido" id="OTFecha" name="OTFecha" value="<?=date("Y-m-d")?>" />
               </div>
        </div>
        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
            <label class="col-lg-2 col-md-4 col-sm-12 col-xs-12 control-label">Razon Social</label>
               <div class="col-lg-10 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
                   <select type="text" class="form-control required requerido" id="OTRazonSocial" name="OTRazonSocial">
           		          <option value="">Seleccionar...</option>
                        <?php
                            foreach($razonessociales as $lsRazonSocial)
                            {?>
                                <option value="<?=$lsRazonSocial->id?>"><?=$lsRazonSocial->Rut." - ".$lsRazonSocial->Razonsocial?></option>
                            <?php
                            }
                        ?>
                   </select>
               </div>
        </div>
        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
            <label class="col-lg-2 col-md-4 col-sm-12 col-xs-12 control-label">Numero OT</label>
               <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
                   <input type="text" class="form-control required requerido" id="OTNumero" name="OTNumero" readonly="readonly" />
               </div>
        </div>
        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
            <label class="col-lg-2 col-md-4 col-sm-12 col-xs-12 control-label">Cliente</label>
               <div class="col-lg-10 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
                   <select type="text" class="form-control required requerido" id="OTRut" name="OTRut">
                        <option value="">Seleccionar...</option>
                        <?php
                            foreach($clientes as $lsClientes)
                            {?>
                                <option value="<?=$lsClientes->id?>"><?=$lsClientes->CodiClien." - ".$lsClientes->Nombre?></option>
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
                   <input type="text" class="form-control required requerido" id="OTTelefono" name="OTTelefono" placeholder="Telefono del cliente" />
               </div>
        </div> 
        <!-- -->
        <!-- --> 
          <div class="modal-header col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h4 class="modal-title">Detalle Grua / Camion</h4>
          </div><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><br></div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label class="col-lg-2 col-md-2 col-sm-12 col-xs-12 control-label">Grua Patente</label>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
              <input type="text" class="form-control required requerido" id="GruaPatente" name="GruaPatente" placeholder="Patente de la Grua"/>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
          <label class="col-lg-4 col-md-4 col-sm-12 col-xs-12 control-label">Operador</label>
          <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
           <select type="text" class="form-control required requerido" id="GruaOperadorId" name="GruaOperadorId">
                <option value="">Seleccionar...</option>
                <?php
                    foreach($operarios as $lsOperarios)
                    {?>
                        <option value="<?=$lsOperarios->id?>"><?=$lsOperarios->Rut." - ".$lsOperarios->Nombre?></option>
                    <?php
                    }
                ?>
           </select>
          </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
          <label class="col-lg-2 col-md-2 col-sm-12 col-xs-12 control-label">Ayudante</label>
          <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
           <select type="text" class="form-control required requerido" id="GruaAyudanteId" name="GruaAyudanteId">
                <option value="">Seleccionar...</option>
                <?php
                    foreach($operarios as $lsOperarios)
                    {?>
                        <option value="<?=$lsOperarios->id?>"><?=$lsOperarios->Rut." - ".$lsOperarios->Nombre?></option>
                    <?php
                    }
                ?>
           </select>
          </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label class="col-lg-2 col-md-2 col-sm-12 col-xs-12 control-label">Camion Patente</label>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
              <input type="text" class="form-control required requerido" id="CamionPatente" name="CamionPatente" placeholder="Patente del camion"/>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <label class="col-lg-2 col-md-2 col-sm-12 col-xs-12 control-label">Chofer</label>
          <div class="col-lg-8  col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
           <select type="text" class="form-control required requerido" id="CamionChoferId" name="CamionChoferId">
                <option value="">Seleccionar...</option>
                <?php
                    foreach($operarios as $lsOperarios)
                    {?>
                        <option value="<?=$lsOperarios->id?>"><?=$lsOperarios->Rut." - ".$lsOperarios->Nombre?></option>
                    <?php
                    }
                ?>
           </select>
          </div>
        </div>
        <!-- -->
        <!-- -->
        <div class="modal-header col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h4 class="modal-title">Detalle del Servicio</h4>
          </div><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><br></div>
          <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
            <label class="col-lg-4 col-md-4 col-sm-12 col-xs-12 control-label">Horario Minimo</label>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
              <input type="text" class="form-control required requerido" id="ServicioHorarioMinimo" name="ServicioHorarioMinimo" placeholder="En Horas"/>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
            <label class="col-lg-4 col-md-4 col-sm-12 col-xs-12 control-label">Recargo</label>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
              <input type="text" class="form-control required requerido" id="ServicioRecargo" name="ServicioRecargo" placeholder="%"/>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
            <label class="col-lg-4 col-md-4 col-sm-12 col-xs-12 control-label">Desde Las</label>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
              <input type="text" class="form-control required requerido" id="ServicioDesdeLas" name="ServicioDesdeLas" placeholder="Horas"/>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
            <label class="col-lg-4 col-md-4 col-sm-12 col-xs-12 control-label">Condicion De Pago</label>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
              <input type="text" class="form-control required requerido" id="ServicioCondicionPago" name="ServicioCondicionPago" placeholder="Detalle"/>
            </div>
        </div>
        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
            <label class="col-lg-2 col-md-4 col-sm-12 col-xs-12 control-label">Solicitado Por Sr(a) </label>
               <div class="col-lg-10 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
                   <input type="text" class="form-control required requerido" id="ServicioSolicitadoPor" name="ServicioSolicitadoPor" placeholder="Nombre" />
               </div>
        </div> 
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label class="col-lg-2 col-md-4 col-sm-12 col-xs-12 control-label">Lugar De La Faena </label>
               <div class="col-lg-10 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
                   <input type="text" class="form-control required requerido" id="ServicioLugarDeLaFaena" name="ServicioLugarDeLaFaena" placeholder="Direccion de la faena" />
               </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label class="col-lg-2 col-md-4 col-sm-12 col-xs-12 control-label">Tipo De Faena </label>
               <div class="col-lg-10 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
                   <input type="text" class="form-control required requerido" id="ServicioTipoDeFaena" name="ServicioTipoDeFaena" placeholder="Detalle de la faena" />
               </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label class="col-lg-2 col-md-2 col-sm-12 col-xs-12 control-label">Valor Hora</label>
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
              <input type="text" class="form-control required requerido" id="ServicioRecargo" name="ServicioRecargo" placeholder="Valor" readonly="readonly" />
            </div>
        </div> 
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <label class="col-lg-4 col-md-4 col-sm-12 col-xs-12 control-label">Hora Salida Garaje</label>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
              <input type="text" class="form-control required requerido" id="ServicioRecargo" name="ServicioRecargo" placeholder="HHMM"/>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <label class="col-lg-4 col-md-4 col-sm-12 col-xs-12 control-label">Hora Llegada Garaje</label>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
              <input type="text" class="form-control required requerido" id="ServicioRecargo" name="ServicioRecargo" placeholder="HHMM"/>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <label class="col-lg-4 col-md-4 col-sm-12 col-xs-12 control-label">Hora Llegada Faena</label>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
              <input type="text" class="form-control required requerido" id="ServicioHoraLlegadaF" name="ServicioHoraLlegadaF" placeholder="HHMM"/>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <label class="col-lg-4 col-md-4 col-sm-12 col-xs-12 control-label">Hora Termino Faena</label>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
              <input type="text" class="form-control required requerido" id="ServicioHoraTerminoF" name="ServicioHoraTerminoF" placeholder="HHMM"/>
            </div>
        </div>  
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <label class="col-lg-4 col-md-4 col-sm-12 col-xs-12 control-label">Descuento Colacion</label>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
              <input type="text" class="form-control required requerido" id="ServicioHoraTerminoF" name="ServicioHoraTerminoF" placeholder="HHMM"/>
            </div>
        </div> 
       <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
              <input type="checkbox" name="CHKCalcularRecargo" id="CHKCalcularRecargo" class="css-checkbox" onclick="CalcularRecargo();">
                <label for="CHKCalcularRecargo" class="css-label cb0" >Calcular Recargo</label>
            </div>
        </div> 
        <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
            <label class="col-lg-4 col-md-4 col-sm-12 col-xs-12 control-label">H.N</label>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
              <input type="text" class="form-control required requerido" id="ServicioHoraTerminoF" name="ServicioHoraTerminoF" readonly="readonly" />
            </div>
        </div>  
        <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
            <label class="col-lg-4 col-md-4 col-sm-12 col-xs-12 control-label">H.N Valor</label>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
              <input type="text" class="form-control required requerido" id="ServicioHoraTerminoF" name="ServicioHoraTerminoF" readonly="readonly" />
            </div>
        </div>   
        <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
            <label class="col-lg-4 col-md-4 col-sm-12 col-xs-12 control-label">H.R</label>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
              <input type="text" class="form-control required requerido" id="ServicioHoraTerminoF" name="ServicioHoraTerminoF" readonly="readonly" />
            </div>
        </div>   
        <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
            <label class="col-lg-4 col-md-4 col-sm-12 col-xs-12 control-label">H.R Valor</label>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
              <input type="text" class="form-control required requerido" id="ServicioHoraTerminoF" name="ServicioHoraTerminoF" readonly="readonly" />
            </div>
        </div>                                         
        <!-- -->



		    </div>
         <!-- 
         -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="add_ordendetrabajo()"><span class="glyphicon glyphicon-floppy-saved" aria-hidden="true" ></span>&nbsp;Guardar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>&nbsp;Cerrar</button>
      </div>
    </div>

  </div>
</div>
<!--Modal-->
<div id="popup_infoOrdenDeTrabajo" class="modal modal-wide fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Información de la Orden De Trabajo</h4>
      </div>
      <div class="modal-body" >
      <table class="table table-bordered table-hover">
      	<tr>
      		<td class="brand-primary">R.U.T</td>
      		<td id="info_rut" class="infox"></td>
      		<td class="brand-primary">Nombre</td>
      		<td id="info_nombre" colspan="3" class="infox"></td>
      	</tr>
      	<tr>
      		<td class="brand-primary">Dirección</td>
      		<td  id="info_direccion" colspan="5" class="infox"></td>		
      	</tr>
      	<tr>
      		<td class="brand-primary">Giro</td>
      		<td id="info_giro" colspan="5" class="infox"></td>		
      	</tr>
      	<tr>
      		<td class="brand-primary">Fono</td>
      		<td  id="info_fono" class="infox"></td>	
      		<td class="brand-primary">Fono 2</td>
      		<td  id="info_fono2" class="infox"></td>	
      		<td class="brand-primary">Fax</td>
      		<td  id="info_fax" class="infox"></td>		
      	</tr>
      	<tr>
      		<td class="brand-primary">Ciudad</td>
      		<td  id="info_ciudad" colspan="2" class="infox"></td>	
      		<td class="brand-primary">Comuna</td>
      		<td  id="info_comuna" colspan="2" class="infox"></td>	
      	</tr>
      	<tr>
      		<td class="brand-primary">Contacto</td>
      		<td  id="info_contacto" colspan="5" class="infox"></td>
      	</tr>
      </table>
      </div>
    </div>
  </div>
</div>

 <!--Modal-->

 <!--Modal-->
<div id="popup_EditarOrdenDeTrabajo" class="modal modal-wide fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      
      <div class="modal-body">
      	  <div class="row">
          <div class="modal-header col-lg-4 col-md-12 col-sm-12 col-xs-12">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Editar Orden De Trabajo</h4>
          </div>
      	  <input type="hidden" id="id_edit" name="id_edit">
      		<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
	          <label class="col-lg-4 col-md-4 col-sm-12 col-xs-12 control-label">R.U.T</label>
	          <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
	            <input type="text" class="form-control required" id="rut_edit" name="rut_edit" placeholder="R.U.T del cliente"/>
	          </div>
	        </div>
	        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
	          <label class="col-lg-2 col-md-4 col-sm-12 col-xs-12 control-label">Nombre</label>
	          <div class="col-lg-10 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
	           <input type="text" class="form-control required" id="nombre_edit" name="nombre_edit" placeholder="Nombre del cliente"/>
	          </div>
	        </div>
	        <div class="col-lg-12 ">
	         <label class="col-lg-2 col-md-4 col-sm-12 col-xs-12 control-label">Dirección</label>
	          <div class="col-lg-10 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
	            <input type="text" class="form-control required" id="direccion_edit" name="direccion_edit" placeholder="Dirección del cliente"/>
	          </div>
	        </div>
	        <div class="col-lg-12 ">
	          <label class="col-lg-2 col-md-4 col-sm-12 col-xs-12 control-label">Giro</label>
	          <div class="col-lg-10 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
	           <input type="text" class="form-control required" id="giro_edit" name="giro_edit" placeholder="Giro del cliente"/> 
	          </div>
	        </div>
	        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
	          <label class="col-lg-3 col-md-4 col-sm-12 col-xs-12 control-label">Fono</label>
	          <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
	           <input type="text" class="form-control required" id="fono_edit" name="fono_edit" placeholder="Teléfono del cliente"/> 
	          </div>
	         </div>
	         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
	          <label class="col-lg-3 col-md-4 col-sm-12 col-xs-12 control-label">Fono2</label>
	          <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
	           <input type="text" class="form-control required" id="fono2_edit" name="fono2_edit" placeholder="Teléfono del cliente"/> 
	          </div>
	         </div>
	         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
	          <label class="col-lg-3 col-md-4 col-sm-12 col-xs-12 control-label">Fax</label>
	          <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 input-group" style="margin-bottom: 25px">
	           <input type="text" class="form-control required" id="fax_edit" name="fax_edit" placeholder="Fax del cliente"/> 
	          </div>
	         </div>
	        
	       	  <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
	          <label class="col-lg-4 col-md-4 col-sm-4 col-xs-12 control-label">Ciudad</label>
	          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 input-group" style="margin-bottom: 25px">
	           <input type="text" class="form-control required" id="ciudad_edit" name="ciudad_edit" placeholder="Ingrese la Ciudad"/> 
	          </div>
	          </div>
	        
	         <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12"> 
	          <label class="col-lg-4 col-md-4 col-sm-4 col-xs-12 control-label">Comuna</label>
	          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 input-group" style="margin-bottom: 25px">
	           <input type="text" class="form-control required" id="comuna_edit" name="comuna_edit" placeholder="Comuna del cliente"/> 
	          </div>
	          </div>
	        
	      	   <div class="col-lg-12 ">
	          <label class="col-lg-2 col-md-4 col-sm-4 col-xs-12 control-label">Contacto</label>
	          <div class="col-lg-10 col-md-8 col-sm-8 col-xs-12 input-group" style="margin-bottom: 25px">
	           <input type="text" class="form-control required" id="contacto_edit" name="contacto_edit" placeholder="Contacto del cliente"/> 
	          </div>     	
	          </div>
	          </div>
         <!-- 
         -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="update_ordendetrabajo()"><span class="glyphicon glyphicon-floppy-saved" aria-hidden="true" ></span>&nbsp;Editar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>&nbsp;Cerrar</button>
      </div>
    </div>

  </div>
</div>
<!--Modal-->
</body>
<script>
function update_ordendetr()
{
	var id=$('#id_edit').val();
	var rut=$('#rut_edit').val();
	var nombre=$('#nombre_edit').val();
	var direccion=$('#direccion_edit').val();
	var giro=$('#giro_edit').val();
	var fono=$('#fono_edit').val();
	var fono2=$('#fono2_edit').val();
	var fax=$('#fax_edit').val();
	var ciudad=$('#ciudad_edit').val();
	var comuna=$('#comuna_edit').val();
	var contacto=$('#contacto_edit').val();

	
	$.ajax({
        type:"POST",
        url:"<?php echo site_url('Ordendetrabajo/update_ordendetrabajo');?>",
        data:{id:id,rut:rut,nombre:nombre,direccion:direccion,giro:giro,fono:fono,fono2:fono2,fax:fax,ciudad:ciudad,comuna:comuna,contacto:contacto},
        success:function(data)
        {
          if(data==1)
          {
            swal("Orden De Trabajo Actualizada", "La orden de trabajo ha sido actualizada correctamente", "success");
            $('#popup_EditarOrdenDeTrabajo').modal('hide');
            setTimeout(function(){ swal.close(); window.open("<?php echo site_url('Ordendetrabajo/index');?>","_self");}, 1500);
            
          }
          else
          {
              swal("Error", "Problema al intentar actualizar la orden de trabajo, por favor inténtelo nuevamente", "error");
          }
        }
    });	

}

function editar_ordendetrabajo(id)
{
	$.ajax({
            type:"POST",
            url:"<?php echo site_url('Ordendetrabajo/info_ordendetrabajo');?>",
            data:{id:id},
            success:function(data)
            {
            	if(data!=0)
            	{
            		var datos=JSON.parse(data);
            		$('#id_edit').val(id);
            		$('#rut_edit').val(datos[0]["CodiClien"]);
            		$('#nombre_edit').val(datos[0]["Nombre"]);
            		$('#direccion_edit').val(datos[0]["Direccion"]);
            		$('#giro_edit').val(datos[0]["Giro"]);
            		$('#fono_edit').val(datos[0]["Fono"]);
            		$('#fono2_edit').val(datos[0]["Fono2"]);
            		$('#fax_edit').val(datos[0]["Fax"]);
            		$('#ciudad_edit').val(datos[0]["CiudadDesp"]);
            		$('#comuna_edit').val(datos[0]["Comuna"]);
            		$('#contacto_edit').val(datos[0]["Contacto"]);
            		$('#popup_EditarCliente').modal();
            	}
            	else
            	{
            		swal("Error", "Se ha producido un error al consultar la orden de trabajo, por favor inténtelo nuevamente", "error");
            	}
            }
     });
}
function ver_ordendetrabajo(id)
{
	$.ajax({
            type:"POST",
            url:"<?php echo site_url('Ordendetrabajo/info_ordendetrabajo');?>",
            data:{id:id},
            success:function(data)
            {
            	$(".infox").empty();
            	if(data!=0)
            	{
            		var datos=JSON.parse(data);
            		$('#info_rut').append(datos[0]["CodiClien"]);
            		$('#info_nombre').append(datos[0]["Nombre"]);
            		$('#info_direccion').append(datos[0]["Direccion"]);
            		$('#info_giro').append(datos[0]["Giro"]);
            		$('#info_fono').append(datos[0]["Fono"]);
            		$('#info_fono2').append(datos[0]["Fono2"]);
            		$('#info_fax').append(datos[0]["Fax"]);
            		$('#info_ciudad').append(datos[0]["CiudadDesp"]);
            		$('#info_comuna').append(datos[0]["Comuna"]);
            		$('#info_contacto').append(datos[0]["Contacto"]);
            		$('#popup_infoCliente').modal();

            	}
            	else
            	{
            		swal("Error", "Se ha producido un error al consultar la orden de trabajo, por favor inténtelo nuevamente", "error");
            	}
            }
    });
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
function add_ordendetrabajo()
{
	var rut=$('#rut').val();
	var nombre=$('#nombre').val();
	var direccion=$('#direccion').val();
	var giro=$('#giro').val();
	var fono=$('#fono').val();
	var fono2=$('#fono2').val();
	var fax=$('#fax').val();
	var ciudad=$('#ciudad').val();
	var comuna=$('#comuna').val();
	var contacto=$('#contacto').val();

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
 
  if(errores==0)
  {
  	$.ajax({
          type:"POST",
          url:"<?php echo site_url('Ordendetrabajo/add_ordendetrabajo');?>",
          data:{rut:rut,nombre:nombre,direccion:direccion,giro:giro,fono:fono,fono2:fono2,fax:fax,ciudad:ciudad,comuna:comuna,contacto:contacto},
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
          }
      });
  }
  else
  {
    swal("Error", "Debe ingresar toda la informacion solicitada", "error");
  }
}
function agregar_ordendetrabajo()
{
	$('#popup_AgregarOrdenDeTrabajo').modal();
}
function CargarNumeroOT()
{
  var OTRazonSocial = $('#OTRazonSocial').val();
  if(OTRazonSocial)
  {
  $.ajax({
          type:"POST",
          url:"<?php echo site_url('Ordendetrabajo/select_otnumero');?>",
          data:{OTRazonSocial:OTRazonSocial},
          success:function(data)
          {
            $('#OTNumero').attr('value',data);
          }
      });
  }
  else
  {
      swal("Error", "Debe seleccionar una razon social valida", "error");
      $('#OTNumero').attr('value','');
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
                $('#OTDireccion').val(datos[0]["Direccion"]);
                $('#OTCiudad').val(datos[0]["CiudadDesp"]);
                $('#OTComuna').val(datos[0]["Comuna"]);
                $('#OTTelefono').val(datos[0]["Fono"]);
            }
            else
            {
               swal("Error", "No se encontro información del cliente seleccionado", "error");
                $('#OTRut').val('');
                $('#OTDireccion').val('');
                $('#OTCiudad').val('');
                $('#OTComuna').val('');
                $('#OTTelefono').val('');
            }
          },
          error: function() {
              swal("Error", "No se pudo realizar la busqueda del cliente", "error");
            $('#OTRut').val('');
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
    alert("ACA SE CALCULA EL RECARGO");
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
      "ordering": true,
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
