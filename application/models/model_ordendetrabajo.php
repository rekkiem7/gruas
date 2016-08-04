<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_Ordendetrabajo extends CI_Model 
{

	function select_otnumero($OTRazonSocial)
	{
	  	$query = $this->db->query("SELECT id FROM ordendetrabajo WHERE OTRazonSocial='$OTRazonSocial' ");
	   	return ($query->num_rows())+1;
	}

	function select_clientes()
	{
	   $query = $this->db->query("SELECT * FROM cliente WHERE Estado=1 ORDER BY Nombre ASC ");
	   if($query -> num_rows() >0)
	   {
	     return $query->result();
	   }
	   else
	   {
	     return false;
	   }
	}

	function select_clienteinfo($OTRut)
	{
	   $query = $this->db->query("SELECT * FROM cliente WHERE id=$OTRut ");
	   if($query -> num_rows() >0)
	   {
	     return  $query->result();
	   }
	   else
	   {
	     return "ERROR";
	   }
	}	
}