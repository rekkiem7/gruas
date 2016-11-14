<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportes extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('model_reportes','',TRUE);
    }
    public function horas_operario(){
        $this->load->view('librerias');
        $this->load->view('menu/menu_principal');
        $this->load->view('loading');
        $data["operarios"]=$this->model_reportes->all_operarios();
        $this->load->view('reportes/horas_operario',$data);
        $this->load->view('footer');
    }
}