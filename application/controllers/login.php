<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('model_login','',TRUE);
	}

	public function index()
	{
		$usuario=$_POST['usuario'];
		$pass=$_POST['pass'];
		$datos=$this->model_login->VerificarUsuario($usuario, $pass);
		if($datos)
		{

			 $sess_array = array(
		         'id' => $datos[0]->id,
		         'username' => $datos[0]->nombre_usuario,
		         'nombre'  => $datos[0]->nombre,
		         'usertype'=>$datos[0]->tipousuario
		       );
		     $this->session->set_userdata('logged_in', $sess_array);
		     
		       if($this->session->userdata('logged_in'))
			   {
			     //$session_data = $this->session->userdata('logged_in');
			     //$data['username'] = $session_data['username'];
			     
			     redirect(site_url('Home/index'), 'refresh');
			   }
			   else
			   {
			   	 $this->session->set_userdata('error','Se ha producido un error al iniciar sesión, inténtelo nuevamente');
			     redirect(site_url('Welcome/index'), 'refresh');
			   }
		}
		else
		{
			$this->session->set_userdata('error','El usuario y contraseña no coinciden con nuestras credenciales');
			redirect(base_url(), 'refresh');	
		}
	}
}