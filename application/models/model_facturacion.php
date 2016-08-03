<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_Facturacion extends CI_Model {
	
	function select_cliente($rut)
	{
	   $this->db->where('CodiClien',$rut);
	   $this->db->where('Estado',1);
	   $query=$this->db->get('cliente');
	   if($query -> num_rows() >0)
	   {
	     return $query->result();
	   }
	   else
	   {
	     return false;
	   }
	}

	function select_ordenes($desde,$hasta)
	{
	   $this->db->where('OTNumero>=',$desde);
	   $this->db->where('OTNumero<=',$hasta);
	   $query=$this->db->get('ordendetrabajo');
	   if($query -> num_rows() >0)
	   {
	     return $query->result();
	   }
	   else
	   {
	     return false;
	   }
	}
}