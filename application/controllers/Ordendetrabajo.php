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
		$datos["razonessociales"]=$this->model_maestro->select_razonessociales();
		$datos["clientes"]=$this->model_maestro->select_clientes();
		$datos["operarios"]=$this->model_maestro->select_operarios();
		$this->load->view('ordendetrabajo/index',$datos);
		$this->load->view('footer');	
	}

	public function select_otnumero()
	{
		$OTRazonSocial = $_POST['OTRazonSocial'];
		echo $this->model_ordendetrabajo->select_otnumero($OTRazonSocial);
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

}