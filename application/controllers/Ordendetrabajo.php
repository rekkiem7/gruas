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

	public function index()
	{
		$this->load->view('librerias');	
		$this->load->view('menu/menu_principal');
		$datos["ordenesdetrabajo"]=$this->model_ordendetrabajo->select_ordenesdetrabajo();
		$datos["razonessociales"]=$this->model_ordendetrabajo->select_razonessociales();
		$datos["clientes"]=$this->model_ordendetrabajo->select_clientes();
		$datos["operarios"]=$this->model_ordendetrabajo->select_operarios();
		$this->load->view('ordendetrabajo/index',$datos);
		$this->load->view('footer');	
	}

	public function select_otnumero()
	{
		$OTRazonSocial = $_POST['OTRazonSocial'];
		$id = $_POST['IdEditar'];
		echo $this->model_ordendetrabajo->select_otnumero($id, $OTRazonSocial);
	}	

	public function select_clienteinfo()
	{
		$OTRut = $_POST['OTRut'];
		$Cliente = $this->model_ordendetrabajo->select_clienteinfo($OTRut);
		if ($Cliente!="ERROR")
		{
			echo json_encode($Cliente);
		}
		else
		{
			echo "ERROR";
		}
	}	

	public function select_patentegrua()
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
	}	

	public function VerInfo()
	{
		$id = $_POST['Id'];
		$Result = $this->model_ordendetrabajo->select_DetalleOrden ($id);
		if ($Result!="ERROR")
		{
			echo json_encode($Result);
		}
		else
		{
			echo "ERROR";
		}
	}	

	public function add_ordendetrabajo()
	{
		$sesion = $this->session->userdata('logged_in'); 
		$IngresoFecha = date("Y-m-d H:i:s");
		$IngresoUsuarioId = $sesion['id'];
		$IngresoUsuarioNombre = $sesion['username'];
		$OTFecha=$_POST['OTFecha'];
		$OTRazonSocial=$_POST['OTRazonSocial'];
		$OTNumero=$_POST['OTNumero'];
		$OTRut=$_POST['OTRut'];
		$OTNombre=$_POST['OTNombre'];
		$OTDireccion=$_POST['OTDireccion'];
		$OTCiudad=$_POST['OTCiudad'];
		$OTComuna=$_POST['OTComuna'];
		$OTTelefono=$_POST['OTTelefono'];
		$GruaPatente=$_POST['GruaPatente'];
		$GruaOperadorId=$_POST['GruaOperadorId'];
		$GruaOperadorNombre=$_POST['GruaOperadorNombre'];
		$GruaAyudanteId=$_POST['GruaAyudanteId'];
		$GruaAyudanteNombre=$_POST['GruaAyudanteNombre'];
		$CamionPatente=$_POST['CamionPatente'];
		$CamionChoferId=$_POST['CamionChoferId'];
		$CamionChoferNombre=$_POST['CamionChoferNombre'];
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
			echo 1;
		}
		else
		{
			echo 0;
		}
	}
	public function delete_ordendetrabajo()
	{
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
	}
	public function update_ordendetrabajo()
	{
		$sesion = $this->session->userdata('logged_in'); 
		$IngresoFecha = date("Y-m-d H:i:s");
		$IngresoUsuarioId = $sesion['id'];
		$IngresoUsuarioNombre = $sesion['username'];
		$id = $_POST['IdEditar'];
		$OTFecha=$_POST['OTFecha'];
		$OTRazonSocial=$_POST['OTRazonSocial'];
		$OTNumero=$_POST['OTNumero'];
		$OTRut=$_POST['OTRut'];
		$OTNombre=$_POST['OTNombre'];
		$OTDireccion=$_POST['OTDireccion'];
		$OTCiudad=$_POST['OTCiudad'];
		$OTComuna=$_POST['OTComuna'];
		$OTTelefono=$_POST['OTTelefono'];
		$GruaPatente=$_POST['GruaPatente'];
		$GruaOperadorId=$_POST['GruaOperadorId'];
		$GruaOperadorNombre=$_POST['GruaOperadorNombre'];
		$GruaAyudanteId=$_POST['GruaAyudanteId'];
		$GruaAyudanteNombre=$_POST['GruaAyudanteNombre'];
		$CamionPatente=$_POST['CamionPatente'];
		$CamionChoferId=$_POST['CamionChoferId'];
		$CamionChoferNombre=$_POST['CamionChoferNombre'];
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
		$update=$this->model_ordendetrabajo->update_ordendetrabajo($id,$data);
		if($update)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}
}