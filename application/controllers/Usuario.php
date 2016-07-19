<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('model_usuario','',TRUE);
	}

	public function index()
	{
		$this->load->view('librerias');	
		$this->load->view('menu/menu_principal');
		$data['usuarios']=$this->model_usuario->obtener_usuarios();
		$data['tipos']=$this->model_usuario->obtener_tipos();
		$this->load->view('usuario/index',$data);
		$this->load->view('footer');	
	}

	public function add_usuario()
	{
		$nombre=$_POST['nombre'];
		$usuario=$_POST['usuario'];
		$pass=$_POST['password'];
		$tipo=$_POST['tipo'];
		$data=array("nombre"=>$nombre,"nombre_usuario"=>$usuario,"clave"=>$pass,"tipousuario"=>$tipo);
		$insert=$this->model_usuario->insert_usuario($data);	
		if($insert>0)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}

	public function verificar_usuario()
	{
		$usuario=$_POST['usuario'];
		$existe=$this->model_usuario->verificar_usuario($usuario);
		if($existe)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}

	public function eliminar_usuario()
	{
		$usuario=$_POST['usuario'];
		$data=["estado"=>0];
		$update=$this->model_usuario->update_usuario($data,$usuario);
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