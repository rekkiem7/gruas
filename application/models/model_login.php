<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_Login extends CI_Model {
	function VerificarUsuario($usuario,$pass)
	{
	   $this -> db -> select('id, nombre_usuario,clave,tipousuario');
	   $this -> db -> from('usuario');
	   $this -> db -> where('nombre_usuario', $usuario);
	   $this -> db -> where('clave', $pass);
	   $this -> db -> where('estado', 1);
	   $this -> db -> limit(1);

	   $query = $this -> db -> get();

	   if($query -> num_rows() == 1)
	   {
	     return $query->result();
	   }
	   else
	   {
	     return false;
	   }
	}
}