<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_Maestro extends CI_Model {
	function select_clientes()
	{
	   $this->db->where('estado',1);
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

	function insert_cliente($data)
	{
		$this->db->insert('cliente', $data); 
		return $this->db->insert_id();	 	
	}

	function update_cliente($id,$data)
	{
		$this->db->where('id', $id);
		$update=$this->db->update('cliente', $data); 
		return $update;
	}

	function info_cliente($id)
	{
	   $this->db->where('id',$id);
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

	function select_maquinas()
	{
	   $this->db->where('estado',1);
	   $query=$this->db->get('maquina');
	   if($query -> num_rows() >0)
	   {
	     return $query->result();
	   }
	   else
	   {
	     return false;
	   }
	}

	function insert_maquina($data)
	{
		$this->db->insert('maquina', $data); 
		return $this->db->insert_id();	 	
	}

	function update_maquina($id,$data)
	{
		$this->db->where('id', $id);
		$update=$this->db->update('maquina', $data); 
		return $update;
	}

	function info_maquina($id)
	{
	   $this->db->where('id',$id);
	   $query=$this->db->get('maquina');
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