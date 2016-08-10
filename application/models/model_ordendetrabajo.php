<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_Ordendetrabajo extends CI_Model 
{
function select_ordenesdetrabajo()
	{
	   $this->db->where('OTEstado',1);
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
function select_razonessociales()
	{
	   $this->db->where('estado',1);
	   $query=$this->db->get('razonsocial');
	   if($query -> num_rows() >0)
	   {
	     return $query->result();
	   }
	   else
	   {
	     return false;
	   }
	}

function select_DetalleOrden($id)
	{
	   $this->db->where('id',$id);
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

	function select_otnumero($id, $OTRazonSocial)
	{
		if($id!=0)
		{
	  		$query = $this->db->query("SELECT OTNumero FROM ordendetrabajo WHERE id='$id' ");
	  		$Resultado = $query->result();
	  		return $Resultado[0]->OTNumero;
	  	}
	  	else
	  	{
	  		$query = $this->db->query("SELECT OTNumero FROM ordendetrabajo WHERE OTRazonSocial='$OTRazonSocial' ORDER BY OTNumero DESC Limit 1");	
	  		$Resultado = $query->result();
	  		return $Resultado[0]->OTNumero+1;
	  	}
	}
	function select_operarios()
	{
	   $this->db->where('estado',1);
	   $query=$this->db->get('operario');
	   if($query -> num_rows() >0)
	   {
	     return $query->result();
	   }
	   else
	   {
	     return false;
	   }
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
	   $query = $this->db->query("SELECT * FROM cliente WHERE CodiClien='$OTRut' ");
	   if($query -> num_rows() >0)
	   {
	     return  $query->result();
	   }
	   else
	   {
	     return "ERROR";
	   }
	}

	function select_GruaPatente($GruaPatente)
	{
	   $query = $this->db->query("SELECT * FROM maquina WHERE Patente=$GruaPatente ");
	   if($query -> num_rows() >0)
	   {
	     return  $query->result();
	   }
	   else
	   {
	     return "ERROR";
	   }
	}

	function insert_ordendetrabajo($data)
	{
		$this->db->insert('ordendetrabajo', $data); 
		return $this->db->insert_id();	 	
	}

	function update_ordendetrabajo($id,$data)
	{
		$this->db->where('id', $id);
		$update=$this->db->update('ordendetrabajo', $data); 
		return $update;
	}

	function CargarNombreCliente($Dato)
	{
	   $query = $this->db->query("SELECT * FROM cliente WHERE CodiClien='$Dato' ");
	   $query = $query->result();
	   return  $query[0]->Nombre;
	}

	function CargarNombreEmpleado($Dato)
	{
	   $query = $this->db->query("SELECT * FROM operario WHERE Rut='$Dato' ");
	   $query = $query->result();
	   return  $query[0]->Nombre;
	}	
}