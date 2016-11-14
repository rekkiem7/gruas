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
		$rut= str_replace(".", "", $_POST['rut']);
		$rut= str_replace(".", "", $rut);
		$rut= str_replace("-", "", $rut);
		$nombre=$_POST['nombre'];
		$direccion=$_POST['direccion'];
		$giro=$_POST['giro'];
		$email1=$_POST['email1'];
		$email2=$_POST['email2'];
		$fono=$_POST['fono'];
		$fono2=$_POST['fono2'];
		$fax=$_POST['fax'];
		$ciudad=$_POST['ciudad'];
		$comuna=$_POST['comuna'];
		$contacto=$_POST['contacto'];

		$data=["CodiClien"=>$rut,"Nombre"=>$nombre,"Direccion"=>$direccion,"Giro"=>$giro,"Email1"=>$email1,"Email2"=>$email2,"Fono"=>$fono,"Fono2"=>$fono2,"Fax"=>$fax,"CiudadDesp"=>$ciudad,"Comuna"=>$comuna,"Contacto"=>$contacto];
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
		$rut= str_replace(".", "", $_POST['rut']);
		$rut= str_replace(".", "", $rut);
		$rut= str_replace("-", "", $rut);
		$nombre=$_POST['nombre'];
		$direccion=$_POST['direccion'];
		$giro=$_POST['giro'];
		$email1=$_POST['email1'];
		$email2=$_POST['email2'];		
		$fono=$_POST['fono'];
		$fono2=$_POST['fono2'];
		$fax=$_POST['fax'];
		$ciudad=$_POST['ciudad'];
		$comuna=$_POST['comuna'];
		$contacto=$_POST['contacto'];

		$data=["CodiClien"=>$rut,"Nombre"=>$nombre,"Direccion"=>$direccion,"Giro"=>$giro,"Email1"=>$email1,"Email2"=>$email2,"Fono"=>$fono,"Fono2"=>$fono2,"Fax"=>$fax,"CiudadDesp"=>$ciudad,"Comuna"=>$comuna,"Contacto"=>$contacto];
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

	public function operarios()
	{
		$this->load->view('librerias');	
		$this->load->view('menu/menu_principal');
		$datos["operarios"]=$this->model_maestro->select_operarios();
		$datos["tiposoperarios"]=$this->model_maestro->select_tiposoperarios();
		$this->load->view('maestros/operarios/index',$datos);
		$this->load->view('footer');	
	}	
	public function info_operario()
	{
		$id=$_POST['id'];
		$datos=$this->model_maestro->info_operario($id);
		if($datos)
		{
			echo json_encode($datos);
		}
		else
		{
			echo 0;
		}
	}	
	public function add_operario()
	{
		$rut= str_replace(".", "", $_POST['rut']);
		$rut= str_replace(".", "", $rut);
		$rut= str_replace("-", "", $rut);
		$nombre=$_POST['nombre'];
		$direccion=$_POST['direccion'];
		$comuna=$_POST['comuna'];
		$ciudad=$_POST['ciudad'];
		$tipo=$_POST['tipo'];
		$estado = 1;

		$data=["Rut"=>$rut,"Nombre"=>$nombre,"Direccion"=>$direccion,"Comuna"=>$comuna,"Ciudad"=>$ciudad,"Tipo"=>$tipo,"Estado"=>$estado];
		$insert=$this->model_maestro->insert_operario($data);
		if($insert)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}	
	public function update_operario()
	{
		$id=$_POST['id'];
		$rut= str_replace(".", "", $_POST['rut']);
		$rut= str_replace(".", "", $rut);
		$rut= str_replace("-", "", $rut);
		$nombre=$_POST['nombre'];
		$direccion=$_POST['direccion'];
		$comuna=$_POST['comuna'];
		$ciudad=$_POST['ciudad'];
		$tipo=$_POST['tipo'];
		$estado=1;

		$data=["Rut"=>$rut,"Nombre"=>$nombre,"Direccion"=>$direccion,"Comuna"=>$comuna,"Ciudad"=>$ciudad,"Tipo"=>$tipo,"Estado"=>$estado];
		$update=$this->model_maestro->update_operario($id,$data);
		if($update)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}	
	public function delete_operario()
	{
		$id=$_POST['id'];
		$data=["estado"=>0];
		$update=$this->model_maestro->update_operario($id,$data);
		if($update)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}	

	public function razonessociales()
	{
		$this->load->view('librerias');	
		$this->load->view('menu/menu_principal');
		$datos["razonessociales"]=$this->model_maestro->select_razonessociales();
		$this->load->view('maestros/razonessociales/index',$datos);
		$this->load->view('footer');	
	}	
	public function info_razonsocial()
	{
		$id=$_POST['id'];
		$datos=$this->model_maestro->info_razonsocial($id);
		if($datos)
		{
			echo json_encode($datos);
		}
		else
		{
			echo 0;
		}
	}	
	public function add_razonsocial()
	{
		$rut= str_replace(".", "", $_POST['rut']);
		$rut= str_replace(".", "", $rut);
		$rut= str_replace("-", "", $rut);
		$razonsocial=$_POST['razonsocial'];
		$rubro=$_POST['rubro'];
		$direccion=$_POST['direccion'];
		$casilla=$_POST['casilla'];
		$fono=$_POST['fono'];
		$ciudad=$_POST['ciudad'];
		$estado = 1;

		$data=["Rut"=>$rut,"Razonsocial"=>$razonsocial,"Rubro"=>$rubro,"Direccion"=>$direccion,"Casilla"=>$casilla,"Fono"=>$fono,"Ciudad"=>$ciudad,"Estado"=>$estado];
		$insert=$this->model_maestro->insert_razonsocial($data);
		if($insert)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}	
	public function update_razonsocial()
	{
		$id=$_POST['id'];
		$rut= str_replace(".", "", $_POST['rut']);
		$rut= str_replace(".", "", $rut);
		$rut= str_replace("-", "", $rut);
		$razonsocial=$_POST['razonsocial'];
		$rubro=$_POST['rubro'];
		$direccion=$_POST['direccion'];
		$casilla=$_POST['casilla'];
		$fono=$_POST['fono'];
		$ciudad=$_POST['ciudad'];
		$estado=1;

		$data=["Rut"=>$rut,"Razonsocial"=>$razonsocial,"Rubro"=>$rubro,"Direccion"=>$direccion,"Casilla"=>$casilla,"Fono"=>$fono,"Ciudad"=>$ciudad,"Estado"=>$estado];
		$update=$this->model_maestro->update_razonsocial($id,$data);
		if($update)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}	
	public function delete_razonsocial()
	{
		$id=$_POST['id'];
		$data=["estado"=>0];
		$update=$this->model_maestro->update_razonsocial($id,$data);
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