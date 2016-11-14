<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_Ordendetrabajo extends CI_Model 
{
	function GenerarReporte($CodiClien, $Ot1, $Ot2, $Fecha1, $Fecha2)
	{
		$query = $this->db->query("SELECT * FROM ordendetrabajo WHERE OTNumero BETWEEN '$Ot1' AND '$Ot2' AND OTEstado=1 AND OTFecha BETWEEN '$Fecha1' AND '$Fecha2' ORDER BY OTNumero ASC ");
	   if($query -> num_rows() >0)
	   {
	     return $query->result();
	   }
	   else
	   {
	     return "ERROR";
	   }
	}
	function CargarOrdenBuscada($OTNumero)
	{
	   $query=$this->db->query("SELECT A.id, A.OTNumero, A.NumeroFactura, A.OTFecha, A.OTRazonSocial, A.OTNombre, A.ServicioValorTotalNeto  FROM ordendetrabajo A WHERE OTNumero='$OTNumero' ");
	   if($query -> num_rows() >0)
	   {
	     return $query->result();
	   }
	   else
	   {
	     return "ERROR";
	   }
	}
	function select_ordenesdetrabajo()
	{
	   $query=$this->db->query("SELECT * FROM ordendetrabajo ORDER BY OTFecha DESC LIMIT 500 ");
	   ini_set('memory_limit', '-1');
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

function select_DetalleOrden2($OTNumero, $EditarOtRs)
	{
	   $query = $this->db->query("SELECT A.*, B.Giro FROM ordendetrabajo A LEFT JOIN cliente B ON A.OTRut=B.CodiClien WHERE A.OTNumero='$OTNumero' AND  OTRazonSocial='$EditarOtRs'");
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
		/*
	   $this->db->where('id',$id);
	   $query=$this->db->get('ordendetrabajo');
	   */
	   $query = $this->db->query("SELECT A.*, B.Giro FROM ordendetrabajo A LEFT JOIN cliente B ON A.OTRut=B.CodiClien WHERE A.id='$id' ");
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
	  		if($Resultado)
	  		{
	  			return $Resultado[0]->OTNumero;
	  		}
	  		else
	  		{
	  			return "1";
	  		}
	  	}
	  	else
	  	{
	  		$query = $this->db->query("SELECT OTNumero FROM ordendetrabajo WHERE OTRazonSocial='$OTRazonSocial' ORDER BY OTNumero DESC Limit 1");	
	  		$Resultado = $query->result();
	  		if($Resultado)
	  		{
	  			return $Resultado[0]->OTNumero+1;	
	  		}
	  		else
	  		{
	  			return "1";
	  		}
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
	/*
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
	*/
	function select_clienteinfo($Texto)
	{
	   $query = $this->db->query("SELECT * FROM cliente WHERE Estado=1 AND Nombre Like '%".$Texto."%'  ");
	   if($query -> num_rows() >0)
	   {
	     return  $query->result();
	   }
	   else
	   {
	     return "ERROR";
	   }
	}
	function select_GruaPatenteFolio($GruaFolio)
	{
	   $query = $this->db->query("SELECT * FROM maquina WHERE Folio=$GruaFolio ");
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

	function select_operarioinfo($Texto)
	{
	   $query = $this->db->query("SELECT * FROM operario WHERE Estado=1 AND Nombre Like '%".$Texto."%'  ");
	   if($query -> num_rows() >0)
	   {
	     return $query->result();
	   }
	   else
	   {
	     return false;
	   }
	}
	function select_maquinainfo($Texto)
	{
	   $query = $this->db->query("SELECT * FROM maquina WHERE Estado=1 AND Patente Like '%".$Texto."%'  ");
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