<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Facturacion extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('model_facturacion','',TRUE);
	}

	public function index()
	{
		$this->load->view('librerias');	
		$this->load->view('menu/menu_principal');
		$this->load->view('loading');
		$datos['razon_social']=$this->model_facturacion->select_razonSocial();
		$session_data = $this->session->userdata('logged_in');
	    $datos['nombre_usuario'] = $session_data['nombre'];
		$this->load->view('facturacion/index',$datos);
		$this->load->view('footer');	
	}

	public function verifica_cliente()
	{
		$rut= str_replace(".", "", $_POST['rut']);
		$rut= str_replace(".", "", $rut);
		$rut= str_replace("-", "", $rut);
		$datos=$this->model_facturacion->select_cliente($rut);
		if($datos)
		{
			echo json_encode($datos);
		}
		else
		{
			echo 0;
		}
	}

	public function cargar_ordenes()
	{
		$desde=$_POST['desde'];
		$hasta=$_POST['hasta'];
		$razon= str_replace(".", "", $_POST['razon']);
		$razon= str_replace(".", "", $razon);
		$razon= str_replace("-", "", $razon);
		$rut= str_replace(".", "", $_POST['rut']);
		$rut= str_replace(".", "", $rut);
		$rut= str_replace("-", "", $rut);
		$ot=$this->model_facturacion->select_ordenes($desde,$hasta,$razon,$rut);
		if($ot)
		{
			echo json_encode($ot);
		}
		else
		{
			echo 0;
		}
	}

	public function guardar_factura()
	{
		$razon= str_replace(".", "", $_POST['razon']);
		$razon= str_replace(".", "", $razon);
		$razon= str_replace("-", "", $razon);
		$fecha_factura=$_POST['fecha_factura'];
		//$f=explode('/',$fecha_factura);
		//$fecha_factura=$f[2].'-'.$f[1].'-'.$f[0];
		$rut= str_replace(".", "", $_POST['rut']);
		$rut= str_replace(".", "", $rut);
		$rut= str_replace("-", "", $rut);
		$total_neto=$_POST['total_neto'];
		$iva=$_POST['iva'];
		$total_final=$_POST['total_final'];
		$facturado_por=$_POST['facturado_por'];
		$descuento=$_POST['descuento'];
		$anticipo=$_POST['anticipo'];
		$array_ot=$_POST['array_ot'];
		$factura=$_POST['numerofactura'];
		$nombreCliente=$_POST['nombre_cliente'];
		$observaciones=$_POST['observaciones'];
		$giro=$_POST["giro"];
		$direccion=$_POST["direccion"];
		$comuna=$_POST["comuna"];
		$ciudad=$_POST["ciudad"];
		$condicion_venta=$_POST["condicion_venta"];
		$data=["NumeroFactura"=>$factura,"RazonSocial"=>$razon,"Fecha"=>$fecha_factura,"RutCliente"=>$rut,"TotalNeto"=>$total_neto,"IVA"=>$iva,"TotalFactura"=>$total_final,"FacturadoPor"=>$facturado_por,"Descuento"=>$descuento,"Anticipo"=>$anticipo,"Observacion"=>$observaciones,"NombreCliente"=>$nombreCliente,"Giro"=>$giro,"Direccion"=>$direccion,"Comuna"=>$comuna,"Ciudad"=>$ciudad,"CondicionPago"=>$condicion_venta];
		$insert=$this->model_facturacion->insert_factura($data);
		if($insert)
		{
			for($i=0;$i<count($array_ot);$i++)
			{
				$OT=$array_ot[$i];
				$data2=["NumeroFactura"=>$factura];
				$update2=$this->model_facturacion->update_ordendetrabajo($OT,$data2,$razon);
			}
			echo $factura;
		}
		else
		{
			echo 0;
		}
	}

	public function genera_ultimo_numero($razon)
	{
		$ultima_factura=$this->model_facturacion->ultima_factura($razon);
		$nuevo_nro_factura=$ultima_factura[0]->NumeroFactura+1;
		
		//verifico que no exista una factura con el mismo numero generado
		$existe=$this->model_facturacion->existe_factura($nuevo_nro_factura,$razon);
		if($existe)
		{
			$this->genera_ultimo_numero($razon);
		}
		else
		{
			return $nuevo_nro_factura;
		}
	}

	public function listado_factura()
	{
		$this->load->view('librerias');	
		$this->load->view('menu/menu_principal');
		$this->load->view('loading');
		$this->load->view('facturacion/listado');
		$this->load->view('footer');
	}

	public function listado_factura2()
	{
		$this->load->view('librerias');	
		$this->load->view('menu/menu_principal');
		$this->load->view('loading');
		$this->load->view('facturacion/listado2');
		$this->load->view('footer');
	}

	public function cargar_facturas()
	{
		$datos=$this->model_facturacion->cargar_facturas();
		if($datos)
		{
			echo json_encode($datos);
		}
		else
		{
			echo 0;
		}
	}

	public function cargar_facturas2()
	{
		$datos=$this->model_facturacion->cargar_facturas2();
		if($datos)
		{
			echo json_encode($datos);
		}
		else
		{
			echo 0;
		}
	}

	public function cargar_ot_facturas()
	{
		$factura=$_POST['factura'];
		$razon=$_POST['razon'];
		$datos=$this->model_facturacion->cargar_ot_factura($factura,$razon);
		if($datos)
		{
			echo json_encode($datos);
		}
		else
		{
			echo 0;
		}
	}

	public function buscar_cliente_autocomplete()
	{
		$dato=$_POST['q'];
		$datos=$this->model_facturacion->buscar_cliente_autocomplete($dato);

		if($datos)
		{
			echo json_encode($datos);
		}
	}

	public function eliminar_factura()
	{
		$factura=$_POST['factura'];
		$data=["Estado"=>'N'];
		$update=$this->model_facturacion->update_facturaEmitida($data,$factura);
		if($update)
		{
			$OTS=$this->model_facturacion->cargar_ot_factura($factura);
			if($OTS)
			{
				for($i=0;$i<count($OTS);$i++)
				{
					$idot=$OTS[$i]->id;
					$data2=["NumeroFactura"=>null];
					$update=$this->model_facturacion->update_ordendetrabajo2($idot,$data2);
				}
			}
			echo 1;
		}
		else
		{
			echo 0;
		}

	}

	public function eliminar_factura2()
	{
		$factura=$_POST['factura'];
		$data=["Estado"=>'N'];
		$update=$this->model_facturacion->update_facturaEmitida2($data,$factura);
		if($update)
		{
			$OTS=$this->model_facturacion->cargar_ot_factura($factura);
			if($OTS)
			{
				for($i=0;$i<count($OTS);$i++)
				{
					$idot=$OTS[$i]->id;
					$data2=["NumeroFactura"=>null];
					$update=$this->model_facturacion->update_ordendetrabajo2($idot,$data2);
				}
			}
			echo 1;
		}
		else
		{
			echo 0;
		}

	}

	public function listado_facturas_anuladas()
	{
		$this->load->view('librerias');	
		$this->load->view('menu/menu_principal');
		$this->load->view('loading');
		$this->load->view('facturacion/listado_facturas_anuladas');
		$this->load->view('footer');
	}

	public function cargar_facturas_anuladas()
	{
		$datos=$this->model_facturacion->cargar_facturas_anuladas();
		if($datos)
		{
			echo json_encode($datos);
		}
		else
		{
			echo 0;
		}
	}

	public function buscar_factura()
	{
		$factura=$_POST['factura'];
		$datos=$this->model_facturacion->select_factura($factura);
		if($datos)
		{
			echo json_encode($datos);
		}
		else
		{
			echo 0;
		}
	}

	public function buscar_factura2()
	{
		$factura=$_POST['factura'];
		$datos=$this->model_facturacion->select_factura2($factura);
		if($datos)
		{
			echo json_encode($datos);
		}
		else
		{
			echo 0;
		}
	}

	public function VerPdf($factura,$razonsocial,$modo)
	{
		if($this->session->userdata('logged_in')){

			$encabezado = $this->model_facturacion->existe_factura($factura,$razonsocial,$modo);
			$detalle =$this->model_facturacion->cargar_ot_factura($factura,$razonsocial);
			$data["encabezado"]=json_encode($encabezado);
			$data["detalle"]=json_encode($detalle);
			$data["modo"]=json_encode($modo);
			if($encabezado[0]->RazonSocial=="116474999")
			{
				$this->load->view('facturacion/VerPdf', $data);
			}else{
				if($encabezado[0]->RazonSocial=="760173967")
				{
					$this->load->view('facturacion/VerPdf2', $data);
				}else{
					if($encabezado[0]->RazonSocial=="763208265")
					{
						$this->load->view('facturacion/VerPdf3', $data);
					}
				}
			}

		}else { echo "ERRORSESSION"; }
	}

	public function test_facturacion()
	{
		$this->load->view('librerias');
		$this->load->view('menu/menu_principal');
		$this->load->view('loading');
		$this->load->view('facturacion/test');
		$this->load->view('footer');
	}

}