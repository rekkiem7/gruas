<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Facturacion extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('model_facturacion','',TRUE);
	}

	public function index()
	{
		$this->load->view('librerias');	
		$this->load->view('menu/menu_principal');
		$datos['razon_social']=$this->model_facturacion->select_razonSocial();
		$this->load->view('facturacion/index',$datos);
		$this->load->view('footer');	
	}

	public function verifica_cliente()
	{
		$rut=$_POST['rut'];
		$datos=$this->model_facturacion->select_cliente($rut);
		if($datos)
		{
			echo json_encode($datos);
		}
		else
		{
			echo 0;
		}
	}

	public function cargar_ordenes()
	{
		$desde=$_POST['desde'];
		$hasta=$_POST['hasta'];
		$razon=$_POST['razon'];
		$rut  =$_POST['rut'];
		$ot=$this->model_facturacion->select_ordenes($desde,$hasta,$razon,$rut);
		if($ot)
		{
			echo json_encode($ot);
		}
		else
		{
			echo 0;
		}
	}
}