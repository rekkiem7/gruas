<?php


include("fonts/times.php"); //tcpdf
include("config/lang/spa.php"); //tcpdf
$this->load->library('tcpdf'); //tcpdf
$info = json_decode($encabezado);
$detalle=json_decode($detalle);
//*************
ob_end_clean(); //rompimiento de pagina
//*************

class MYPDF extends TCPDF {
    //Page header
    public function Header(){
        // get the current page break margin
        $bMargin = $this->getBreakMargin();
        // get current auto-page-break mode
        $auto_page_break = $this->AutoPageBreak;
        // disable auto-page-break
        $this->SetAutoPageBreak(true, 0);
        $this->Image('imagenes/logoFactura.png', 5, 5, 132, 25, '', '', '', false, 0, '', false, false, 0);
        // restore auto-page-break status
        $this->SetAutoPageBreak($auto_page_break, $bMargin);
        // set the starting point for the page content
        $this->setPageMark();
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetFont ('courier', '', '', '', 'default', true );
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Gruas Pacheco');
$pdf->SetTitle('Factura N°'.$info[0]->NumeroFactura);
$pdf->SetSubject('Orden De Trabajo');
$pdf->SetKeywords('Gruas, Pacheco, Orden, Trabajo');

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(0);
$pdf->SetFooterMargin(0);

// remove default footer
$pdf->setPrintFooter(false);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', '', 14);

// add a page
$fecha=explode("-",$info[0]->Fecha);
if($fecha[1]=='01'){$fecha[1]="ENERO";}
if($fecha[1]=='02'){$fecha[1]="FEBRERO";}
if($fecha[1]=='03'){$fecha[1]="MARZO";}
if($fecha[1]=='04'){$fecha[1]="ABRIL";}
if($fecha[1]=='05'){$fecha[1]="MAYO";}
if($fecha[1]=='06'){$fecha[1]="JUNIO";}
if($fecha[1]=='07'){$fecha[1]="JULIO";}
if($fecha[1]=='08'){$fecha[1]="AGOSTO";}
if($fecha[1]=='09'){$fecha[1]="SEPTIEMBRE";}
if($fecha[1]=='10'){$fecha[1]="OCTUBRE";}
if($fecha[1]=='11'){$fecha[1]="NOVIEMBRE";}
if($fecha[1]=='12'){$fecha[1]="DICIEMBRE";}
$pdf->AddPage();
$html='<table><tr><td width="65%"></td><td width="35%"><table width="250px" style="border:4px solid #CC0000;text-align:center;color:#CC0000"><tr><td style="padding-top:20px">R.U.T.: '.number_format(substr($info[0]->RazonSocial,0,-1),0,"",".").'-'.substr($info[0]->RazonSocial,strlen($info[0]->RazonSocial)-1,1).'<br>FACTURA ELECTRONICA<br>N°'.$info[0]->NumeroFactura.'</td></tr></table></td></tr></table>';
$html.='<br><table style="text-align:center"><tr><td width="65%"><H3>CESAR PATRICIO PACHECO POBLETE</H3>';
$html.='<br><h5>ARRIENDO DE GRUAS Y VEHICULOS</h5>';
$html.='<font style="font-size:11"><b>Casa Matriz: Coronel Alvarado N° 2840 | Independencia - Santiago - Chile</b><br>';
$html.='<b>Sucursal: Santa Sara Parcela #6 | Lampa</b></font><br>';
$html.='<font style="font-size:10"><b>Teléfono:  228810667    www.gruaspacheco.cl    correo: info@gruaspacheco.cl</b></font></td><td style="text-align:left"><br><br><br><br><br><br><font style="font-size:10">SANTIAGO, '.$fecha[2].' DE '.$fecha[1].' DE '.$fecha[0].'</font></td></tr></table>';
$html.='<table width="100%" style="border:1px solid #000000"><tr><td width="20%"><font style="font-size:11"><b>Señores(as)</b></font></td><td width="80%">:  <font style="font-size:11">'.$info[0]->nom_cliente.'</font></td></tr>';
$html.='<tr><td width="20%"><font style="font-size:11"><b>R.U.T.</b></font></td><td width="80%">:  <font style="font-size:11">'.number_format(substr($info[0]->RutCliente,0,-1),0,"",".").'-'.substr($info[0]->RutCliente,strlen($info[0]->RutCliente)-1,1).'</font></td></tr>';
$html.='<tr><td width="20%"><font style="font-size:11"><b>Giro</b></font></td><td width="80%">:  <font style="font-size:11">'.$info[0]->Giro.'</font></td></tr>';
$html.='<tr><td width="20%"><font style="font-size:11"><b>Dirección</b></font></td><td width="80%">:  <font style="font-size:11">'.$info[0]->Direccion.'</font></td></tr>';
$html.='<tr><td width="20%"><font style="font-size:11"><b>Comuna</b></font></td><td width="80%">:  <font style="font-size:11">'.$info[0]->Comuna.'</font></td></tr>';
$html.='<tr><td width="20%"><font style="font-size:11"><b>Ciudad</b></font></td><td width="80%">:  <font style="font-size:11">'.$info[0]->CiudadDesp.'</font></td></tr>';
$html.='</table><br>';
$html.='<table style="font-size:10"><tr><td style="border-bottom:1px solid black;">ítem</td><td style="border-bottom:1px solid black;">Código</td><td style="border-bottom:1px solid black;">Descripción</td><td style="border-bottom:1px solid black;text-align:right;">Cantidad</td><td style="border-bottom:1px solid black;text-align:right;">Precio Unit.</td><td style="border-bottom:1px solid black;text-align:right;">Descuento($)</td><td style="border-bottom:1px solid black;text-align:right;">Valor</td></tr>';
$filas='';
for($i=0;$i<count($detalle);$i++)
{
    $cont=$i+1;
    $hora=$detalle[$i]->ServicioHN+$detalle[$i]->ServicioHR;
    $unitario=number_format(round($detalle[$i]->ServicioValorTotalNeto/$hora,0),0,",",".");
    $html.='<tr><td>'.$cont.'</td><td>'.$detalle[$i]->GruaPatente.'</td><td>'.$detalle[$i]->CapacidadGrua.'<br>OT '.$detalle[$i]->OTNumero.'</td><td style="text-align:right">'.$hora.'</td><td style="text-align:right">'.$unitario.'</td><td></td><td style="text-align:right;">'.number_format($detalle[$i]->ServicioValorTotalNeto,0,",",".").'</td></tr>';
}
if($info[0]->Descuento===null || $info[0]->Descuento=="null" || $info[0]->Descuento=="")
{
    $info[0]->Descuento=0;
}
$html.='</table>';
$html.='<br><br>';
$html.='<table><tr><td width="40%"></td><td width="60%"><table style="font-size:11"><tr><td style="border-bottom:1px solid black;">Exento </td><td style="border-bottom:1px solid black;text-align:right;">$&nbsp;&nbsp;0</td><td></td><td style="border-bottom:1px solid black;">NETO</td><td style="border-bottom:1px solid black;text-align:right;">$&nbsp;&nbsp;'.number_format($info[0]->TotalNeto,0,",",".").'</td></tr>';
$html.='<tr><td style="border-bottom:1px solid black;">Descuento </td><td style="border-bottom:1px solid black;text-align:right;">$&nbsp;&nbsp;'.number_format($info[0]->Descuento,0,",",".").'</td><td></td><td style="border-bottom:1px solid black;">19 % I.V.A</td><td style="border-bottom:1px solid black;text-align:right;">$&nbsp;&nbsp;'.number_format($info[0]->IVA,0,",",".").'</td></tr>';
$html.='<tr><td >Recargo </td><td style="text-align:right">$&nbsp;&nbsp;0</td><td></td><td>TOTAL</td><td style="text-align:right;">$&nbsp;&nbsp;'.number_format($info[0]->TotalFactura,0,",",".").'</td></tr>';
$html.='<tr><td colspan="5" style="padding-top:20px"><br><br>Cancelado por:________________________________<br></td></tr>';
if($info[0]->Observacion!==null || $info[0]->Observacion!=="null" || $info[0]->Observacion!=="") {
    $html .= '<tr><td colspan="5"><table style="border:1px solid #000000" height="100%"><tr><td>Observaciones:'.$info[0]->Observacion.'</td></tr></table></td></tr>';
}
$html.='</table></td></tr></table><br>';
$html.='<table style="border:1px solid #000000;font-size:10"><tr><td width="10%">Nombre:</td><td style="border-bottom:1px solid black;" width="23%"></td><td width="10%" style="padding-left:10px">Rut:</td><td style="border-bottom:1px solid black;" width="23%"></td><td></td><td></td></tr>';
$html.='<tr><td width="10%">Recinto</td><td style="border-bottom:1px solid black;" width="23%"></td><td width="10%" style="padding-left:10px">Fecha</td><td style="border-bottom:1px solid black;" width="23%"></td><td width="10%" style="padding-left:10px">Firma</td><td style="border-bottom:1px solid black;" width="23%"></td></tr>';
$html.='<tr><td coslpan="6"><br></td></tr>';
$html.='<tr><td colspan="6">"El acuse de recibo que se declara en este acto, de acuerdo a lo dispuesto en la letra b) del Art. 4°, y la letra c) del Art. 5° de la ley 19.983, acredita que la entrega de mercaderías o servicio(s) prestado(s) ha(n) sido recibido(s)"</td></tr></table>';

$pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
$pdf->Output('Factura.pdf', 'I');
?>