<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ordendetrabajo extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('model_ordendetrabajo','',TRUE);
		$this->load->model('model_maestro','',TRUE);
	}

	public function CargarOrdenBuscada()
	{
		$OTNumero = $_POST['OTNumero'];
		$DetalleOT = $this->model_ordendetrabajo->CargarOrdenBuscada($OTNumero);
		if ($DetalleOT!="ERROR")
		{
			echo json_encode($DetalleOT);
		}
		else
		{
			echo "ERROR";
		}
	}
	public function Agregar1()
	{
		$this->load->view('librerias');	
		$this->load->view('menu/menu_principal');
		$datos["razonessociales"]=$this->model_ordendetrabajo->select_razonessociales();
		$datos["clientes"]=$this->model_ordendetrabajo->select_clientes();
		$datos["operarios"]=$this->model_ordendetrabajo->select_operarios();
		$this->load->view('ordendetrabajo/Agregar1',$datos);
		$this->load->view('footer');	
	}

	public function index()
	{
		$this->load->view('librerias');	
		$this->load->view('menu/menu_principal');
		$datos["ordenesdetrabajo"]=$this->model_ordendetrabajo->select_ordenesdetrabajo();
		$datos["razonessociales"]=$this->model_ordendetrabajo->select_razonessociales();
		/*

		$datos["clientes"]=$this->model_ordendetrabajo->select_clientes();
		$datos["operarios"]=$this->model_ordendetrabajo->select_operarios();
		*/
		$this->load->view('ordendetrabajo/index',$datos);
		$this->load->view('footer');	
	}

	public function Listado()
	{
		$this->load->view('librerias');	
		$this->load->view('menu/menu_principal');
		$datos["ordenesdetrabajo"]=$this->model_ordendetrabajo->select_ordenesdetrabajo();
		$datos["razonessociales"]=$this->model_ordendetrabajo->select_razonessociales();
		$datos["clientes"]=$this->model_ordendetrabajo->select_clientes();
		$datos["operarios"]=$this->model_ordendetrabajo->select_operarios();
		$this->load->view('ordendetrabajo/Listado',$datos);
		$this->load->view('footer');	
	}
	public function select_otnumero()
	{
		if($this->session->userdata('logged_in'))
		{
			$OTRazonSocial = $_POST['OTRazonSocial'];
			$id = $_POST['IdEditar'];
			echo $this->model_ordendetrabajo->select_otnumero($id, $OTRazonSocial);
		}else { echo "ERRORSESSION"; }

	}	

	public function select_clienteinfo()
	{
		$Texto = $_POST['Texto'];
		$Cliente = $this->model_ordendetrabajo->select_clienteinfo($Texto);
		if ($Cliente!="ERROR")
		{
			echo json_encode($Cliente);
		}
		else
		{
			echo "";
		}
	}	

	public function select_patentegrua()
	{
		if($this->session->userdata('logged_in'))
		{
				$GruaPatente = $_POST['GruaPatente'];
				$GruaPatente = $this->model_ordendetrabajo->select_GruaPatente($GruaPatente);
				if ($GruaPatente!="ERROR")
				{
					echo json_encode($GruaPatente);
				}
				else
				{
					echo "ERROR";
				}
		}else { echo "ERRORSESSION"; }
	}	

	public function select_patentegruaFolio()
	{
		if($this->session->userdata('logged_in'))
		{
				$GruaFolio = $_POST['GruaFolio'];
				$GruaFolio = $this->model_ordendetrabajo->select_GruaPatenteFolio($GruaFolio);
				if ($GruaFolio!="ERROR")
				{
					echo json_encode($GruaFolio);
				}
				else
				{
					echo "ERROR";
				}
		}else { echo "ERRORSESSION"; }
	}	
public function VerInfo2()
{
	if($this->session->userdata('logged_in')){
		$OTNumero 	= $_POST['OTNumero'];
		$EditarOtRs = $_POST['EditarOtRs'];
		$Result = $this->model_ordendetrabajo->select_DetalleOrden2($OTNumero, $EditarOtRs);
		if ($Result!="ERROR")
		{
			echo json_encode($Result);
		}
		else
		{
			echo "ERROR";
		}
	}else { echo "ERRORSESSION"; }
}	

	public function VerInfo()
	{
if($this->session->userdata('logged_in')){

		$id = $_POST['Id'];
		$Result = $this->model_ordendetrabajo->select_DetalleOrden($id);
		if ($Result!="ERROR")
		{
			echo json_encode($Result);
		}
		else
		{
			echo "ERROR";
		}
}else { echo "ERRORSESSION"; }

	}	
	public function ValidarNumeroOt()
	{
		if($this->session->userdata('logged_in')) {
		$IdEditar		=$_POST['IdEditar'];
		$OT 			=$_POST['OT'];
		$RazonSocial 	=$_POST['RazonSocial'];
		echo $this->model_maestro->ValidarNumeroOt($IdEditar,$OT,$RazonSocial);
}else { echo "ERRORSESSION"; }

	}
	public function add_ordendetrabajo()
	{
if($this->session->userdata('logged_in')){

		$sesion = $this->session->userdata('logged_in'); 
		$IngresoFecha = date("Y-m-d H:i:s");
		$IngresoUsuarioId = $sesion['id'];
		$IngresoUsuarioNombre = $sesion['username'];
		$OTFecha=$_POST['OTFecha'];
		$OTRazonSocial=$_POST['OTRazonSocial'];
		$OTNumero=$_POST['OTNumero'];
		$OTRut= str_replace(".", "", $_POST['OTRut']);
		$OTRut= str_replace(".", "", $OTRut);
		$OTRut= str_replace("-", "", $OTRut);
		$OTNombre = $_POST['OTNombre'];
		$OTDireccion=$_POST['OTDireccion'];
		$OTCiudad=$_POST['OTCiudad'];
		$OTComuna=$_POST['OTComuna'];
		$OTTelefono=$_POST['OTTelefono'];
		$GruaPatente=$_POST['GruaPatente'];
		$GruaOperadorId=$_POST['GruaOperadorId'];
		$GruaOperadorNombre = $_POST['GruaOperadorId'];
		$GruaAyudanteId=$_POST['GruaAyudanteId'];
		$GruaAyudanteNombre = $_POST['GruaAyudanteId'];
		$CamionPatente=$_POST['CamionPatente'];
		$CamionChoferId=$_POST['CamionChoferId'];
		$CamionChoferNombre = $_POST['CamionChoferId'];
		$ServicioHorarioMinimo=$_POST['ServicioHorarioMinimo'];
		$ServicioRecargo=$_POST['ServicioRecargo'];
		$ServicioDesdeLas=$_POST['ServicioDesdeLas'];
		$ServicioCondicionPago=$_POST['ServicioCondicionPago'];
		$ServicioSolicitadoPor=$_POST['ServicioSolicitadoPor'];
		$ServicioLugarDeLaFaena=$_POST['ServicioLugarDeLaFaena'];
		$ServicioTipoDeFaena=$_POST['ServicioTipoDeFaena'];
		$ServicioValorHora=$_POST['ServicioValorHora'];
		$ServicioHoraSalidaG=$_POST['ServicioHoraSalidaG'];
		$ServicioHoraLlegadaG=$_POST['ServicioHoraLlegadaG'];
		$ServicioHoraLlegadaF=$_POST['ServicioHoraLlegadaF'];
		$ServicioHoraTerminoF=$_POST['ServicioHoraTerminoF'];
		$ServicioDescuentoColacion=$_POST['ServicioDescuentoColacion'];
		$ServicioHN=$_POST['ServicioHN'];
		$ServicioHNValor=$_POST['ServicioHNValor'];
		$ServicioHR=$_POST['ServicioHR'];
		$ServicioHRValor=$_POST['ServicioHRValor'];
		$ServicioValorTotalNeto=$_POST['ServicioValorTotalNeto'];

		$data=["IngresoFecha"=>$IngresoFecha, "IngresoUsuarioId"=>$IngresoUsuarioId, "IngresoUsuarioNombre"=>$IngresoUsuarioNombre, "OTFecha"=>$OTFecha, "OTRazonSocial"=>$OTRazonSocial, "OTNumero"=>$OTNumero, "OTRut"=>$OTRut, "OTNombre"=>$OTNombre, "OTDireccion"=>$OTDireccion, "OTCiudad"=>$OTCiudad, "OTComuna"=>$OTComuna, "OTTelefono"=>$OTTelefono, "GruaPatente"=>$GruaPatente, "GruaOperadorId"=>$GruaOperadorId, "GruaOperadorNombre"=>$GruaOperadorNombre, "GruaAyudanteId"=>$GruaAyudanteId, "GruaAyudanteNombre"=>$GruaAyudanteNombre, "CamionPatente"=>$CamionPatente, "CamionChoferId"=>$CamionChoferId, "CamionChoferNombre"=>$CamionChoferNombre, "ServicioHorarioMinimo"=>$ServicioHorarioMinimo, "ServicioRecargo"=>$ServicioRecargo, "ServicioDesdeLas"=>$ServicioDesdeLas, "ServicioCondicionPago"=>$ServicioCondicionPago, "ServicioSolicitadoPor"=>$ServicioSolicitadoPor, "ServicioLugarDeLaFaena"=>$ServicioLugarDeLaFaena, "ServicioTipoDeFaena"=>$ServicioTipoDeFaena, "ServicioValorHora"=>$ServicioValorHora, "ServicioHoraSalidaG"=>$ServicioHoraSalidaG, "ServicioHoraLlegadaG"=>$ServicioHoraLlegadaG,"ServicioHoraLlegadaF"=>$ServicioHoraLlegadaF, "ServicioHoraTerminoF"=>$ServicioHoraTerminoF, "ServicioDescuentoColacion"=>$ServicioDescuentoColacion, "ServicioHN"=>$ServicioHN, "ServicioHNValor"=>$ServicioHNValor, "ServicioHR"=>$ServicioHR, "ServicioHRValor"=>$ServicioHRValor, "ServicioValorTotalNeto"=>$ServicioValorTotalNeto];
		$insert=$this->model_ordendetrabajo->insert_ordendetrabajo($data);
		if($insert)
		{
			echo $insert;
		}
		else
		{
			echo 0;
		}
}else { echo "ERRORSESSION"; }

	}
	public function delete_ordendetrabajo()
	{
if($this->session->userdata('logged_in')){

		$id=$_POST['id'];
		$data=["OTEstado"=>0];
		$update=$this->model_ordendetrabajo->update_ordendetrabajo($id,$data);
		if($update)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
}else { echo "ERRORSESSION"; }

	}
	public function update_ordendetrabajo()
	{
if($this->session->userdata('logged_in')){

		$sesion = $this->session->userdata('logged_in'); 
		$IngresoFecha = date("Y-m-d H:i:s");
		$IngresoUsuarioId = $sesion['id'];
		$IngresoUsuarioNombre = $sesion['username'];
		$id = $_POST['IdEditar'];
		$OTEstado = "1";
		$OTFecha=$_POST['OTFecha'];
		$OTRazonSocial=$_POST['OTRazonSocial'];
		$OTNumero=$_POST['OTNumero'];
		$OTRut= str_replace(".", "", $_POST['OTRut']);
		$OTRut= str_replace(".", "", $OTRut);
		$OTRut= str_replace("-", "", $OTRut);
		$OTNombre=$_POST['OTNombre'];
		$OTDireccion=$_POST['OTDireccion'];
		$OTCiudad=$_POST['OTCiudad'];
		$OTComuna=$_POST['OTComuna'];
		$OTTelefono=$_POST['OTTelefono'];
		$GruaPatente=$_POST['GruaPatente'];
		$GruaOperadorId=$_POST['GruaOperadorId'];
		$GruaOperadorNombre=$_POST['GruaOperadorId'];
		$GruaAyudanteId=$_POST['GruaAyudanteId'];
		$GruaAyudanteNombre=$_POST['GruaAyudanteId'];
		$CamionPatente=$_POST['CamionPatente'];
		$CamionChoferId=$_POST['CamionChoferId'];
		$CamionChoferNombre=$_POST['CamionChoferId'];
		$ServicioHorarioMinimo=$_POST['ServicioHorarioMinimo'];
		$ServicioRecargo=$_POST['ServicioRecargo'];
		$ServicioDesdeLas=$_POST['ServicioDesdeLas'];
		$ServicioCondicionPago=$_POST['ServicioCondicionPago'];
		$ServicioSolicitadoPor=$_POST['ServicioSolicitadoPor'];
		$ServicioLugarDeLaFaena=$_POST['ServicioLugarDeLaFaena'];
		$ServicioTipoDeFaena=$_POST['ServicioTipoDeFaena'];
		$ServicioValorHora=$_POST['ServicioValorHora'];
		$ServicioHoraSalidaG=$_POST['ServicioHoraSalidaG'];
		$ServicioHoraLlegadaG=$_POST['ServicioHoraLlegadaG'];
		$ServicioHoraLlegadaF=$_POST['ServicioHoraLlegadaF'];
		$ServicioHoraTerminoF=$_POST['ServicioHoraTerminoF'];
		$ServicioDescuentoColacion=$_POST['ServicioDescuentoColacion'];
		$ServicioHN=$_POST['ServicioHN'];
		$ServicioHNValor=$_POST['ServicioHNValor'];
		$ServicioHR=$_POST['ServicioHR'];
		$ServicioHRValor=$_POST['ServicioHRValor'];
		$ServicioValorTotalNeto=$_POST['ServicioValorTotalNeto'];

		$data=["OTEstado"=>1, "IngresoFecha"=>$IngresoFecha, "IngresoUsuarioId"=>$IngresoUsuarioId, "IngresoUsuarioNombre"=>$IngresoUsuarioNombre, "OTFecha"=>$OTFecha, "OTRazonSocial"=>$OTRazonSocial, "OTNumero"=>$OTNumero, "OTRut"=>$OTRut, "OTNombre"=>$OTNombre, "OTDireccion"=>$OTDireccion, "OTCiudad"=>$OTCiudad, "OTComuna"=>$OTComuna, "OTTelefono"=>$OTTelefono, "GruaPatente"=>$GruaPatente, "GruaOperadorId"=>$GruaOperadorId, "GruaOperadorNombre"=>$GruaOperadorNombre, "GruaAyudanteId"=>$GruaAyudanteId, "GruaAyudanteNombre"=>$GruaAyudanteNombre, "CamionPatente"=>$CamionPatente, "CamionChoferId"=>$CamionChoferId, "CamionChoferNombre"=>$CamionChoferNombre, "ServicioHorarioMinimo"=>$ServicioHorarioMinimo, "ServicioRecargo"=>$ServicioRecargo, "ServicioDesdeLas"=>$ServicioDesdeLas, "ServicioCondicionPago"=>$ServicioCondicionPago, "ServicioSolicitadoPor"=>$ServicioSolicitadoPor, "ServicioLugarDeLaFaena"=>$ServicioLugarDeLaFaena, "ServicioTipoDeFaena"=>$ServicioTipoDeFaena, "ServicioValorHora"=>$ServicioValorHora, "ServicioHoraSalidaG"=>$ServicioHoraSalidaG, "ServicioHoraLlegadaG"=>$ServicioHoraLlegadaG,"ServicioHoraLlegadaF"=>$ServicioHoraLlegadaF, "ServicioHoraTerminoF"=>$ServicioHoraTerminoF, "ServicioDescuentoColacion"=>$ServicioDescuentoColacion, "ServicioHN"=>$ServicioHN, "ServicioHNValor"=>$ServicioHNValor, "ServicioHR"=>$ServicioHR, "ServicioHRValor"=>$ServicioHRValor, "ServicioValorTotalNeto"=>$ServicioValorTotalNeto];
		$update=$this->model_ordendetrabajo->update_ordendetrabajo($id,$data);
		if($update)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
}else { echo "ERRORSESSION"; }

	}

public function VerPunto()
	{
if($this->session->userdata('logged_in')){

		$id = $_GET['id'];
		$Result = $this->model_ordendetrabajo->select_DetalleOrden ($id);
		$Result["Result"] = json_encode($Result);
        $this->load->view('ordendetrabajo/VerPunto', $Result);
}else { echo "ERRORSESSION"; }

	}
public function VerPuntoHtml()
	{
if($this->session->userdata('logged_in')){

		$id = $_GET['id'];
		$Result = $this->model_ordendetrabajo->select_DetalleOrden ($id);
		$Result["Result"] = json_encode($Result);
        $this->load->view('ordendetrabajo/VerPuntoHtml', $Result);
}else { echo "ERRORSESSION"; }

	}
	public function VerPdf()
	{
if($this->session->userdata('logged_in')){

		$id = $_GET['id'];
		$Result = $this->model_ordendetrabajo->select_DetalleOrden ($id);
		$Result["Result"] = json_encode($Result);
        $this->load->view('ordendetrabajo/VerPdf', $Result);
}else { echo "ERRORSESSION"; }

	}
/*
	public function reporte1()
	{
		$this->load->view('librerias');	
		$this->load->view('menu/menu_principal');
		$datos["ordenesdetrabajo"]=$this->model_ordendetrabajo->select_ordenesdetrabajo();
		$datos["razonessociales"]=$this->model_ordendetrabajo->select_razonessociales();
		$datos["clientes"]=$this->model_ordendetrabajo->select_clientes();
		$datos["operarios"]=$this->model_ordendetrabajo->select_operarios();
		$this->load->view('ordendetrabajo/reporte1',$datos);
		$this->load->view('footer');	
	}
*/
	public function reporte1()
	{
		$this->load->view('librerias');	
		$this->load->view('menu/menu_principal');
		$this->load->view('ordendetrabajo/reporte1');
		$this->load->view('footer');	
	}
	function GenerarReporte()
	{
		$CodiClien = $_POST['CodiClien'];
		$Ot1 = $_POST['Ot1'];
		$Ot2 = $_POST['Ot2'];
		$Fecha1 = $_POST['Fecha1'];
		$Fecha2 = $_POST['Fecha2'];
		$Reporte = $this->model_ordendetrabajo->GenerarReporte($CodiClien, $Ot1, $Ot2, $Fecha1, $Fecha2);

		if ($Reporte!="ERROR")
		{
			echo json_encode($Reporte);
		}
		else
		{
			echo "ERROR";
		}
	}

	public function select_operarioinfo()
	{
		$Texto = $_POST['Texto'];
		$Operario = $this->model_ordendetrabajo->select_operarioinfo($Texto);
		if ($Operario!="ERROR")
		{
			echo json_encode($Operario);
		}
		else
		{
			echo "";
		}
	}

	public function select_maquinainfo()
	{
		$Texto = $_POST['Texto'];
		$Maquina = $this->model_ordendetrabajo->select_maquinainfo($Texto);
		if ($Maquina!="ERROR")
		{
			echo json_encode($Maquina);
		}
		else
		{
			echo "";
		}
	}

}