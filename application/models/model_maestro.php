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
	function select_tiposoperarios()
	{
		$query = $this->db->query("SELECT * FROM tipo_usuario WHERE id>3 ");
	   	if($query -> num_rows() >0)
	   	{
	    	return $query->result();
	   	}
	   	else
	   	{
	    	return false;
	   	}
	}	

	function info_operario($id)
	{
		$query = $this->db->query("
			SELECT 
			A.id, A.Rut, A.Nombre, A.Direccion, A.Comuna, A.Ciudad, B.id AS Tipoid, B.nombre AS Tiponombre 
			FROM operario A 
			INNER JOIN tipo_usuario B ON A.Tipo=B.id 
			WHERE A.id=$id 
		");
	   	if($query -> num_rows() >0)
	   	{
	    	return $query->result();
	   	}
	   	else
	   	{
	    	return false;
	   	}
	}	
	function insert_operario($data)
	{
		$this->db->insert('operario', $data); 
		return $this->db->insert_id();	 	
	}	
	function update_operario($id,$data)
	{
		$this->db->where('id', $id);
		$update=$this->db->update('operario', $data); 
		return $update;
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
	function info_razonsocial($id)
	{
		$query = $this->db->query("
			SELECT 
			*
			FROM razonsocial
			WHERE id=$id 
		");
	   	if($query -> num_rows() >0)
	   	{
	    	return $query->result();
	   	}
	   	else
	   	{
	    	return false;
	   	}
	}	
	function insert_razonsocial($data)
	{
		$this->db->insert('razonsocial', $data); 
		return $this->db->insert_id();	 	
	}	
	function update_razonsocial($id,$data)
	{
		$this->db->where('id', $id);
		$update=$this->db->update('razonsocial', $data); 
		return $update;
	}	
}