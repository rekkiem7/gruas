<?php

function rutPhp( $rut ) {
    return number_format( substr ( $rut, 0 , -1 ) , 0, "", ".") . '-' . substr ( $rut, strlen($rut) -1 , 1 );
}
$OT = json_decode($Result);

include("fonts/cambria_b.php"); //tcpdf
include("config/lang/spa.php"); //tcpdf
$this->load->library('tcpdf'); //tcpdf

//*************
ob_end_clean(); //rompimiento de pagina
//*************

class MYPDF extends TCPDF {
    //Page header
    public function Header() {
        // get the current page break margin
        $bMargin = $this->getBreakMargin();
        // get current auto-page-break mode
        $auto_page_break = $this->AutoPageBreak;
        // disable auto-page-break
        $this->SetAutoPageBreak(false, 0);
        // set bacground image
        //$this->Image('imagenes/Gruas.jpg', 10, 7, 200, 280, '', '', '', false, 0, '', false, false, 0);
        // restore auto-page-break status
        $this->SetAutoPageBreak($auto_page_break, $bMargin);
        // set the starting point for the page content
        $this->setPageMark();
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$fontname = $pdf->addTTFfont('fonts/lucida-console.ttf', 'TrueTypeUnicode', '', 32);

// set document information
//$pdf->SetFont ('cambria_b', 'B', '', '', 'default', true );
$pdf->SetFont ($fontname, 'B', '', '', 'default', true );

$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Gruas Pacheco');
$pdf->SetTitle('OrdenDeTrabajo_'.$OT[0]->OTNumero);
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
$pdf->SetFont($fontname, '', 11);

// add a page
$pdf->AddPage('P', array(240,280));

$Iva="";
$TotalIva="";
if($OT[0]->ServicioHoraSalidaG==0)
{
    $OT[0]->ServicioHoraSalidaG="";
}

if($OT[0]->ServicioValorHora==0)
{
    $OT[0]->ServicioValorHora="";
}
else 
{
    $OT[0]->ServicioValorHora=number_format($OT[0]->ServicioValorHora);
}

if($OT[0]->ServicioValorTotalNeto==0)
{
    $OT[0]->ServicioValorTotalNeto="";
    $Iva="";
    $TotalIva="";
}
else 
{
    $TotalIva = number_format($OT[0]->ServicioValorTotalNeto*1.19); 
    $Iva=number_format($OT[0]->ServicioValorTotalNeto*0.19); 
    $OT[0]->ServicioValorTotalNeto=number_format($OT[0]->ServicioValorTotalNeto);
    
}

if($OT[0]->ServicioHorarioMinimo==0)
{
    $OT[0]->ServicioHorarioMinimo="";
}

if($OT[0]->ServicioHoraLlegadaF==0)
{
    $OT[0]->ServicioHoraLlegadaF="";
}

if($OT[0]->ServicioHoraTerminoF==0)
{
    $OT[0]->ServicioHoraTerminoF="";
}

if($OT[0]->ServicioHoraLlegadaF==0)
{
    $OT[0]->ServicioHoraLlegadaF="";
}

if($OT[0]->ServicioHoraSalidaG==0)
{
    $OT[0]->ServicioHoraSalidaG="";
}

if(substr($OT[0]->OTFecha,5,2)=='01' || substr($OT[0]->OTFecha,5,2)=='1') { $MES='ENERO'; }
else if(substr($OT[0]->OTFecha,5,2)=='02' || substr($OT[0]->OTFecha,5,2)=='1') { $MES='FEBRERO'; }
else if(substr($OT[0]->OTFecha,5,2)=='03' || substr($OT[0]->OTFecha,5,2)=='1') { $MES='MARZO'; }
else if(substr($OT[0]->OTFecha,5,2)=='04' || substr($OT[0]->OTFecha,5,2)=='1') { $MES='ABRIL'; }
else if(substr($OT[0]->OTFecha,5,2)=='05' || substr($OT[0]->OTFecha,5,2)=='1') { $MES='MAYO'; }
else if(substr($OT[0]->OTFecha,5,2)=='06' || substr($OT[0]->OTFecha,5,2)=='1') { $MES='JUNIO'; }
else if(substr($OT[0]->OTFecha,5,2)=='07' || substr($OT[0]->OTFecha,5,2)=='1') { $MES='JULIO'; }
else if(substr($OT[0]->OTFecha,5,2)=='08' || substr($OT[0]->OTFecha,5,2)=='1') { $MES='AGOSTO'; }
else if(substr($OT[0]->OTFecha,5,2)=='09' || substr($OT[0]->OTFecha,5,2)=='1') { $MES='SEPTIEMBRE'; }
else if(substr($OT[0]->OTFecha,5,2)=='10' || substr($OT[0]->OTFecha,5,2)=='1') { $MES='OCTUBRE'; }
else if(substr($OT[0]->OTFecha,5,2)=='11' || substr($OT[0]->OTFecha,5,2)=='1') { $MES='NOVIEMBRE'; }
else if(substr($OT[0]->OTFecha,5,2)=='12' || substr($OT[0]->OTFecha,5,2)=='1') { $MES='DICIEMBRE'; }

if($OT[0]->ServicioHoraSalidaG) 
{ $OT[0]->ServicioHoraSalidaG = substr($OT[0]->ServicioHoraSalidaG,0,2).":".substr($OT[0]->ServicioHoraSalidaG,2,2); }
else { $OT[0]->ServicioHoraSalidaG=""; }


if($OT[0]->ServicioHoraLlegadaF) 
{ $OT[0]->ServicioHoraLlegadaF = substr($OT[0]->ServicioHoraLlegadaF,0,2).":".substr($OT[0]->ServicioHoraLlegadaF,2,2); }
else { $OT[0]->ServicioHoraLlegadaF=""; }

if($OT[0]->ServicioDesdeLas) 
{ $OT[0]->ServicioDesdeLas = substr($OT[0]->ServicioDesdeLas,0,2).":".substr($OT[0]->ServicioDesdeLas,2,2); }
else { $OT[0]->ServicioDesdeLas=""; }

if($OT[0]->ServicioHoraLlegadaG) 
{ $OT[0]->ServicioHoraLlegadaG = substr($OT[0]->ServicioHoraLlegadaG,0,2).":".substr($OT[0]->ServicioHoraLlegadaG,2,2); }
else { $OT[0]->ServicioHoraLlegadaG=""; }

$i = 0;
$tipo_documento = "";
$style = "";
$html = '
<style>
br {
    line-height: 1px;
 }</style>
 <br><br><br><br><br><br><br><br><br>
 <table>
<tr>
    <td height="32px" width="550" style="font-size:15" align="right">'.$OT[0]->OTNumero.' </td>
</tr>
</table>
<br><br><br><br><br><br><br><br><br>
<table>
<tr>
    <td width="90" height="40">'.substr($OT[0]->OTFecha,8,2).'</td>
    <td width="160">'.$MES.'</td>
    <td>'.substr($OT[0]->OTFecha,0,4).'</td>
</tr>
</table>
<table>
<tr>
    <td width="5"></td><td height="25px" >'.strtoupper($OT[0]->OTNombre).'</td>
</tr>
</table>
<table>
<tr>
   <td width="5"></td> <td width="200" height="30">'.strtoupper($OT[0]->OTDireccion).'</td>
   <td width="27"></td><td width="200">'.strtoupper($OT[0]->OTCiudad).'</td>
   <td width="42"></td><td width="150">'.strtoupper($OT[0]->OTComuna).'</td>
</tr>
</table>
<table>
<tr>
    <td width="110px" height="35px" align="left">'.rutPhp($OT[0]->OTRut).'</td>
    <td width="40"></td><td width="300">'.strtoupper($OT[0]->Giro).'</td>
    <td width="30"></td><td width="70">'.$OT[0]->OTTelefono.'</td>
</tr>
</table>
<table>
<tr>
    <td width="5"></td><td width="220" height="25px">'.$OT[0]->ServicioSolicitadoPor.'</td>
    <td width="55"></td><td width="150">'.$OT[0]->GruaPatente.'</td>
    <td width="40"></td><td width="300">'.$OT[0]->GruaOperadorNombre.'</td>
</tr>
</table><br><br><br><br><br><br>
<table>
<tr>
    <td width="40"></td><td height="35px" >'.$OT[0]->ServicioLugarDeLaFaena.'</td>
</tr>
</table>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<table>
<tr>
    <td width="40"></td><td width="180" height="40px">'.$OT[0]->ServicioHoraSalidaG.'</td>
    <td width="100"></td><td width="90">'.$OT[0]->ServicioValorHora.'</td>
    <td width="120"></td><td width="65">'.$OT[0]->ServicioHorarioMinimo.'</td>
</tr>
</table>
<table>
<tr>
    <td width="40"></td><td width="210" height="30px">'.$OT[0]->ServicioHoraLlegadaF.'</td>
    <td width="60"></td><td width="130">'.$OT[0]->ServicioRecargo.'</td>
    <td width="70"></td><td width="65">'.$OT[0]->ServicioDesdeLas.'</td>
</tr>
</table>
<table>
<tr>
    <td width="70"></td><td width="180" height="30px">'.$OT[0]->ServicioHoraTerminoF.'</td>
    <td width="70"></td><td width="235">'.$OT[0]->ServicioValorTotalNeto.'</td>
</tr>
</table>
<table>
<tr>
    <td width="70"></td><td width="210" height="35px">'.$OT[0]->ServicioHoraLlegadaG.'</td>
    <td width="80"></td><td width="235">'.$Iva.'</td>
</tr>
</table>
<table>
<tr>
    <td width="30"></td><td width="250" height="5px">'.$OT[0]->ServicioHoraLlegadaG.'</td>
    <td width="30"></td><td width="300">'.$TotalIva.'</td>
</tr>
</table>
';
$pdf->writeHTMLCell($w = 0, $h = 0, $x = '37', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
$pdf->Output('OrdenDeTrabajo_'.$OT[0]->OTNumero.'.pdf', 'I');
?>