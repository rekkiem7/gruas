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
	   $this->db->where('NumeroFactura',null);
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

	function update_ordendetrabajo($OT,$data,$razon)
	{
		$this->db->where('OTRazonSocial', $razon);
		$this->db->where('OTNumero', $OT);
		$update=$this->db->update('ordendetrabajo', $data);
		return $update;
	}

	function cargar_facturas()
	{
		$query=$this->db->get('facturas_emitidas');
		$query = $this->db->query("
			SELECT 
			f.NumeroFactura, f.RazonSocial, f.Fecha,f.RutCliente,f.TotalNeto,f.IVA,f.TotalFactura,f.Descuento,f.Anticipo,c.Nombre as nom_cliente,r.Razonsocial as nom_razon
			FROM facturas_emitidas f 
			JOIN cliente c ON f.RutCliente=c.CodiClien
			JOIN razonsocial r ON f.RazonSocial=r.Rut
			ORDER BY f.NumeroFactura DESC
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

	function cargar_ot_factura($factura)
	{
	   $this->db->where('NumeroFactura',$factura);
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

	function buscar_cliente_autocomplete($dato)
	{
	   $this->db->like('Nombre',$dato);
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
}