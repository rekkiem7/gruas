<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_Usuario extends CI_Model {
	function obtener_usuarios()
	{
	   $this -> db -> select('u.id,u.nombre,u.nombre_usuario,t.nombre as nombre_tipo');
	   $this -> db -> from('usuario u');
	   $this -> db -> join('tipo_usuario t', 'u.tipousuario = t.id','INNER');
	   $this -> db -> where('u.estado',1);
	   $query = $this -> db -> get();
	   if($query -> num_rows() >0)
	   {
	     return $query->result();
	   }
	   else
	   {
	     return false;
	   }
	}

	function obtener_tipos()
	{
	   $query=$this->db->get('tipo_usuario');
	   if($query -> num_rows() >0)
	   {
	     return $query->result();
	   }
	   else
	   {
	     return false;
	   }
	}

	function insert_usuario($data)
	{
		$this->db->insert('usuario', $data); 
		return $this->db->insert_id();	 	
	}

	function verificar_usuario($usuario)
	{
		$this->db->where('nombre_usuario',$usuario);
		$query=$this->db->get('usuario');
		return $query->result();
	}

	function verificar_usuario2($id,$usuario)
	{
		
		$this->db->where('nombre_usuario',$usuario);
		$this->db->where('id!=',$id);
		$query=$this->db->get('usuario');
		return $query->result();
	}

	function update_usuario($data,$usuario)
	{
		$this->db->where('id', $usuario);
		$update=$this->db->update('usuario', $data); 
		return $update;
	}

	function info_usuario($usuario)
	{
	   $this -> db -> select('u.id,u.nombre,u.nombre_usuario,u.clave,u.tipousuario');
	   $this -> db -> from('usuario u');
	   $this -> db -> where('u.id',$usuario);
	   $query = $this -> db -> get();
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