<?php 

App::import('Vendor','tcpdf/tcpdf');
App::import('Vendor','tcpdf/config/lang/spa');
$tcpdf = new TCPDF('P');
$textfont = 'helvetica';
$tcpdf->SetCreator(PDF_CREATOR);
$tcpdf->SetAuthor("autor");
$tcpdf->SetTitle("Título");
$tcpdf->SetSubject("Tutorial TCPDF en cakePHP");
$tcpdf->SetKeywords("TCPDF, PDF, cakePHP, ejemplo");
$tcpdf->setPrintHeader(FALSE);
$tcpdf->setPrintFooter(true);
$tcpdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$tcpdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$tcpdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
$tcpdf->setHeaderMargin(3);
$tcpdf->getAliasNumPage();
$tcpdf->AddPage();
//$tcpdf->SetFont("freesans", "BI", 20);
$tcpdf->SetFont('helvetica', '', 10); 

$desde = $this->Time->format($desde, '%d-%m-%Y');
$hasta = $this->Time->format($hasta, '%d-%m-%Y');

//$info = $camiones['Camion']['info'];
$html = <<<EOD
<table>
<tr>
   <td width="150"><img src="../webroot/img/images (7).jpg" width="90" align="left"></td>
<th align="center"><h2 style="color:#0040ff">ASOCIACIÓN COOPERATIVA</h2><BR /><h1 style="color:#0040ff">LA MURALLA 2030 R.L</h1><br />Calle Bolivar Casa N° S/N Sector Casco Central<br />Ortiz-Estado Guarico<br />Telefonos: 0414 - 465 49 12/0414 - 543 82 73<br /><h3 style="color:#0040ff">RIF: J-40032087-9</h3></th></tr>
</table>
<h2>Datos del Camion</h2>
<h4>Fecha de Trabajo</h4> Desde: $desde Hasta: $hasta<br />
<table border="1" style="width:100%">
	<tr style="background-color:#E1E1E1;font-weight: bold;margin-left: 100px; ">
        <th style="width:10%; text-align:center;">Nº</th>
        <th style="width:35%; text-align:center;">Datos Camion</th>        
        <th style="width:25%; text-align:center;">Distancia</th>        
        <th style="width:35%; text-align:center;">Costo</th>        
    </tr>

EOD;
$i = 1;
$total = 0;
foreach($trabajos as $trabajo){
    $color = ($i%2!=0)?'#FDFEFF':'#F7FBFF';
$html = $html.'
    <tr style="background-color:'.$color.'">
        <td style="text-align:center;">'.$i.'</td>
        <td style="text-align:center;">'.$trabajo['Camion']['info'].'</td>        
        <td style="text-align:center;">'.$trabajo['CamionesTrabajo']['distancia'].'</td>        
        <td style="text-align:center;">'.$trabajo['CamionesTrabajo']['costo'].'</td>        
        
    </tr>
';
$i++;
$total += $trabajo['CamionesTrabajo']['costo'];

}
$html = $html.'<tr><th colspan="3" style="text-align:center; font-weight: bold;">Total (Bs.)</th><th style="text-align:center;font-weight: bold;">'.$total.',00</th></tr>';

$html = $html.'</table>';

$tcpdf->writeHTML($html, $ln=true, $fondo=false, $reseth=false, $cell=false);
$tcpdf->Output("listaEmpleados.pdf", "I");
exit()
?>