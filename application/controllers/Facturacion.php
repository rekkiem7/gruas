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
		$this->load->view('facturacion/index');
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
		$ot=$this->model_facturacion->select_ordenes($desde,$hasta);
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