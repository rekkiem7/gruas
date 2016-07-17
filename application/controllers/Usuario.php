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
		$this->load->view('usuario/index',$data);
		$this->load->view('footer');	
	}
}