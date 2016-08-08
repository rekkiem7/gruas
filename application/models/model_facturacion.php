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

	function select_ordenes($desde,$hasta,$razon,$rut)
	{
	   $this->db->where('OTNumero>=',$desde);
	   $this->db->where('OTNumero<=',$hasta);
	   $this->db->where('OTRazonSocial',$razon);
	   $this->db->where('OTRut',$rut);
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

	function select_razonSocial()
	{
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

	function ultima_factura()
	{
	   $this->db->order_by('NumeroFactura', 'DESC');
	   $this->db->limit(1);
	   $query=$this->db->get('facturas_emitidas');
	   if($query -> num_rows() >0)
	   {
	     return $query->result();
	   }
	   else
	   {
	     return false;
	   }
	}

	function existe_factura($factura)
	{
	   $this->db->where('NumeroFactura',$factura);
	   $query=$this->db->get('facturas_emitidas');
	   if($query -> num_rows() >0)
	   {
	     return $query->result();
	   }
	   else
	   {
	     return false;
	   }
	}

	function insert_factura($data)
	{
		$this->db->insert('facturas_emitidas', $data); 
		return $this->db->insert_id();	 
	}
}