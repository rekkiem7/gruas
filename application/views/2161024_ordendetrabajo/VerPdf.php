<?php
$OT = json_decode($Result);

include("fonts/times.php"); //tcpdf
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
        $this->Image('imagenes/Gruas.jpg', 5, 60, 180, 130, '', '', '', false, 0, '', false, false, 0);
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
$pdf->SetFont('times', '', 48);

// add a page
$pdf->AddPage();

$Iva="";

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



$i = 0;
$tipo_documento = "";
$style = "";
$html = '
<style>
.tablaemail tr td{
        border:1px solid #CCC;
        font-size: 25px;
        font-family:Arial;
        color: #000;
}
.tablaemail th{
        font-size: 40px;
        background-color:#333;
        font-family:Arial;
        color: #FFF;
        text-align:left;
}
.tablaemail{
        font-size: 40px;
        text-align:left;
        border:1px solid #CCC;
        border-collapse:collapse;
}
</style>
<table width="720px">
<tr>
<td width="360px" style="text-align:center; font-size: 30px;">
<STRONG>ARRIENDO DE GRUAS Y VEHICULOS<br>
CESAR PACHECO POBLETE E.I.R.L</strong><br>
R.U.T: '.number_format(substr($OT[0]->OTRazonSocial,0,-1),0,"",".").'-'.substr($OT[0]->OTRazonSocial,strlen($OT[0]->OTRazonSocial)-1,1).'<br>
Coronel Alvarado 2840 - Independencia<br>
Fonos/Fax: 22 735 8343 - 22 881 0667 - 22 737 8522 - 22737 3627<br>
Cels: +(56)99 349 1889 - 99 746 5796 - 97 476 6747<br>
E-mail: info@gruaspacheco.cl - cesar.pacheco@vtr.net
</td>
<td width="360px" style="text-align:center; font-size: 30px;">
<STRONG>ORDEN DE TRABAJO<br>
GRUAS DE 2 A 16 TONELADAS</strong><br>
<span style="font-size: 40px;">N° '.$OT[0]->OTNumero.'</span>
</td>
</tr>
</table>
<span style="font-size: 40px;">Emitir cheque a CESAR PATRICIO PACHECO POBLETE E.I.R.L</span><br>
<table class="tablaemail" width="720px">
<tr><th width="80px">Fecha:</th><td colspan="5" width="640px">'.$OT[0]->OTFecha.'</td></tr>
<tr><th width="80px">Señores:</th><td colspan="5" width="640px">'.$OT[0]->OTNombre.'</td></tr>
<tr><th width="80px">Direccion:</th><td colspan="5" width="640px">'.$OT[0]->OTDireccion.'</td></tr>
<tr><th width="80px">Ciudad:</th><td width="280px">'.$OT[0]->OTCiudad.'</td><th width="80px">Comuna:</th><td width="280px">'.$OT[0]->OTComuna.'</td></tr>
<tr><th width="80px">Rut:</th><td width="80px">'.number_format(substr($OT[0]->OTRut,0,-1),0,"",".").'-'.substr($OT[0]->OTRut,strlen($OT[0]->OTRut)-1,1).'</td><th width="40px">Giro:</th><td width="360px">'.$OT[0]->Giro.'</td><th width="70px">Telefono:</th><td width="90px">'.$OT[0]->OTTelefono.'</td></tr>
<tr><th width="100px">Solicitado por:</th><td width="250px">'.$OT[0]->ServicioSolicitadoPor.'</td><th width="70px">Patente:</th><td width="80px">'.$OT[0]->GruaPatente.'</td><th width="60px">Chofer:</th><td width="160px">'.$OT[0]->CamionChoferNombre.'</td></tr>
<tr><th width="100px">Lugar Faena:</th><td colspan="5" width="620px">'.$OT[0]->ServicioLugarDeLaFaena.'</td></tr>
<tr><td colspan="6" width="720px"></td></tr>
<tr><th colspan="6" width="720px"><div width="100%" align="center">CONTROL DE HORAS</div></th></tr>
<tr><td colspan="6" width="720px"></td></tr>
<tr><th width="140px">Salida Bodega:</th><td width="130px">'.$OT[0]->ServicioHoraSalidaG.'</td><th width="100px">Valor Hora:</th><td width="140px">'.$OT[0]->ServicioValorHora.'</td><th width="100px">Minimo Horas:</th><td width="110px">'.$OT[0]->ServicioHorarioMinimo.'</td></tr>
<tr><th width="140px">Llegada a faena:</th><td width="130px">'.$OT[0]->ServicioHoraLlegadaF.'</td><th width="100px">Recargo:</th><td width="140px">'.$OT[0]->ServicioRecargo.'</td><th width="100px">% Desde las:</th><td width="110px">'.$OT[0]->ServicioDesdeLas.'</td></tr>
<tr><th width="140px">Termino de la faena:</th><td width="130px">'.$OT[0]->ServicioHoraTerminoF.'</td><th width="100px">Total Neto:</th><td width="350px" colspan="3">'.$OT[0]->ServicioValorTotalNeto.'</td></tr>
<tr><th width="140px">Llegada a bodega:</th><td width="130px">'.$OT[0]->ServicioHoraLlegadaG.'</td><th width="100px">Mas 19% iva:</th><td width="350px" colspan="3">'.$Iva.'</td></tr>
<tr><th width="140px">Total Horas:</th><td width="130px">CALCULAR</td><th width="100px">Total:</th><td width="350px" colspan="3">'.$TotalIva.'</td></tr>
<tr><td colspan="6" width="720px"></td></tr>
<tr><th colspan="6" width="720px"><div width="100%" align="center">OBSERVACIONES</div></th></tr>
<tr><td colspan="6" width="720px"><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br></td></tr>
</table>
<span style="font-size: 30px;"><strong>NOTA:</strong> Condiciones de arriendamiento<br>
El horario de trabajo de la grúa rige desde La salida hasta su regreso a nuestra bodega.<br>
No se responde por daños o perjuicios.<br>
Se establece que el cliente deberá tomar los seguros correspondientes a fin de cubrir posibles daños, especiales en máquina o mercadería<br>
frágila, caso contrario, no se respondera hasta un monto superior a la valorización de la presente O/T.<br>
Cualquier observación que se refiera a la faena, deberá dejarse constancia escrita en la presente O/T, en caso contrario se entenderá como <br>
recibida conforme.<br>
En caso de no estar de acuerdo con algunas de estas condiciones, sírvase llamar a nuestros teléfonos consignados en la presente O/T<br>
antes de iniciar la faena.
La tarífa se recarga un 40% de lunes a viernes desde las 18:00 hrs.<br>
Los días sábados desde las 13:00 hrs, y los domingos y festivos las 24:00 hrs. valores más I.V.A<br>
</span>
<br>
<table width="720px">
<tr>
<td width="360px" style="text-align:center; font-size: 30px;">
_______________________________________________<br>
V°B° CLIENTE<br>
</td>
<td width="360px" style="text-align:center; font-size: 30px;">
_______________________________________________<br>
V°B° CESAR PACHECO POBLETE<br>
</td>
</tr>
</table>
<span style="font-size: 30px;"><strong>WWW.GRUASPACHECO.CL
</span>
';
$pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
$pdf->Output('OrdenDeTrabajo_'.$OT[0]->OTNumero.'.pdf', 'I');
?>