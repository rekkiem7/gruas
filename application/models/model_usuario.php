<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_Usuario extends CI_Model {
	function obtener_usuarios()
	{
	   $this -> db -> select('u.id,u.nombre,u.nombre_usuario,t.nombre as nombre_tipo');
	   $this -> db -> from('usuario u');
	   $this -> db -> join('tipo_usuario t', 'u.tipousuario = t.id','INNER');
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
}