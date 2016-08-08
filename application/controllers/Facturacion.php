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

	public function guardar_factura()
	{
		$razon=$_POST['razon'];
		$fecha_factura=$_POST['fecha_factura'];
		$f=explode('/',$fecha_factura);
		$fecha_factura=$f[2].'-'.$f[1].'-'.$f[0];
		$rut=$_POST['rut'];
		$total_neto=$_POST['total_neto'];
		$iva=$_POST['iva'];
		$total_final=$_POST['total_final'];
		$facturado_por=$_POST['facturado_por'];

		$ultima_factura=$this->model_facturacion->ultima_factura();
		$nuevo_nro_factura=$ultima_factura[0]->NumeroFactura+1;
		
		//verifico que no se haya insertado
		$existe=$this->model_facturacion->existe_factura($nuevo_nro_factura);

		if($existe)
		{

		}
		else
		{
			$data=["NumeroFactura"=>$nuevo_nro_factura,"RazonSocial"=>$razon,"Fecha"=>$fecha_factura,"RutCliente"=>$rut,"TotalNeto"=>$total_neto,"IVA"=>$iva,"TotalFactura"=>$total_final,"FacturadoPor"=>$facturado_por];	

			$insert=$this->model_facturacion->insert_factura($data);
			if($insert)
			{
				echo $nuevo_nro_factura;
			}
			else
			{
				echo 0;
			}
		}

		

	}
}