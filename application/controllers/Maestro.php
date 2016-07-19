<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maestro extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('model_maestro','',TRUE);
	}

	public function clientes()
	{
		$this->load->view('librerias');	
		$this->load->view('menu/menu_principal');
		$datos["clientes"]=$this->model_maestro->select_clientes();
		$this->load->view('maestros/clientes/index',$datos);
		$this->load->view('footer');	
	}

	public function add_cliente()
	{
		$rut=$_POST['rut'];
		$nombre=$_POST['nombre'];
		$direccion=$_POST['direccion'];
		$giro=$_POST['giro'];
		$fono=$_POST['fono'];
		$fono2=$_POST['fono2'];
		$fax=$_POST['fax'];
		$ciudad=$_POST['ciudad'];
		$comuna=$_POST['comuna'];
		$contacto=$_POST['contacto'];

		$data=["CodiClien"=>$rut,"Nombre"=>$nombre,"Direccion"=>$direccion,"Giro"=>$giro,"Fono"=>$fono,"Fono2"=>$fono2,"Fax"=>$fax,"CiudadDesp"=>$ciudad,"Comuna"=>$comuna,"Contacto"=>$contacto];
		$insert=$this->model_maestro->insert_cliente($data);
		if($insert)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}

	public function delete_cliente()
	{
		$id=$_POST['id'];
		$data=["estado"=>0];
		$update=$this->model_maestro->update_cliente($id,$data);
		if($update)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}

	public function info_cliente()
	{
		$id=$_POST['id'];
		$datos=$this->model_maestro->info_cliente($id);
		if($datos)
		{
			echo json_encode($datos);
		}
		else
		{
			echo 0;
		}
	}

	public function update_cliente()
	{
		$id=$_POST['id'];
		$rut=$_POST['rut'];
		$nombre=$_POST['nombre'];
		$direccion=$_POST['direccion'];
		$giro=$_POST['giro'];
		$fono=$_POST['fono'];
		$fono2=$_POST['fono2'];
		$fax=$_POST['fax'];
		$ciudad=$_POST['ciudad'];
		$comuna=$_POST['comuna'];
		$contacto=$_POST['contacto'];

		$data=["CodiClien"=>$rut,"Nombre"=>$nombre,"Direccion"=>$direccion,"Giro"=>$giro,"Fono"=>$fono,"Fono2"=>$fono2,"Fax"=>$fax,"CiudadDesp"=>$ciudad,"Comuna"=>$comuna,"Contacto"=>$contacto];
		$update=$this->model_maestro->update_cliente($id,$data);
		if($update)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}

	public function maquinas()
	{
		$this->load->view('librerias');	
		$this->load->view('menu/menu_principal');
		$datos["maquinas"]=$this->model_maestro->select_maquinas();
		$this->load->view('maestros/maquinas/index',$datos);
		$this->load->view('footer');	
	}

	public function add_maquina()
	{
		$folio=$_POST['folio'];
		$patente=$_POST['patente'];
		$tipo=$_POST['tipo'];
		$capacidad=$_POST['capacidad'];
		$valorHora=$_POST['valorHora'];
		$minimoHora=$_POST['minimoHora'];
		$recargo=$_POST['recargo'];
		$comision=$_POST['comision'];

		$data=["Folio"=>$folio,"Patente"=>$patente,"Tipo"=>$tipo,"Capacidad"=>$capacidad,"ValorHora"=>$valorHora,"MinimoHora"=>$minimoHora,"Recargo"=>$recargo,"Comision"=>$comision];

		$insert=$this->model_maestro->insert_maquina($data);
		if($insert)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}

	public function delete_maquina()
	{
		$id=$_POST['id'];
		$data=["estado"=>0];
		$update=$this->model_maestro->update_maquina($id,$data);
		if($update)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}

	public function info_maquina()
	{
		$id=$_POST['id'];
		$datos=$this->model_maestro->info_maquina($id);
		if($datos)
		{
			echo json_encode($datos);
		}
		else
		{
			echo 0;
		}
	}

	public function update_maquina()
	{
		$id=$_POST['id'];
		$folio=$_POST['folio'];
		$patente=$_POST['patente'];
		$tipo=$_POST['tipo'];
		$capacidad=$_POST['capacidad'];
		$valorHora=$_POST['valorHora'];
		$minimoHora=$_POST['minimoHora'];
		$recargo=$_POST['recargo'];
		$comision=$_POST['comision'];

		$data=["Folio"=>$folio,"Patente"=>$patente,"Tipo"=>$tipo,"Capacidad"=>$capacidad,"ValorHora"=>$valorHora,"MinimoHora"=>$minimoHora,"Recargo"=>$recargo,"Comision"=>$comision];

		$update=$this->model_maestro->update_maquina($id,$data);
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