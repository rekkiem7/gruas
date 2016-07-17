<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('logged_in'))
	    {
	    	redirect(site_url('Home/index'), 'refresh');
	    }
	    else
	    {
	    	$this->session->set_userdata('error','Su sesión ha terminado');
			$error['error'] = $this->session->userdata('error');
			$this->load->view('librerias');	
			$this->load->view('login',$error);
		}
	}

	public function logout()
	 {
	   $this->session->unset_userdata('logged_in');
	   session_destroy();
	   redirect(base_url(), 'refresh');
	 }

	
}
