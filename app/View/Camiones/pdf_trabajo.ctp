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
/*$placa = $camionestrabajo['Camion']['placa'];
$modelo = $camionestrabajo['Camion']['modelo'];
$marca = $camionestrabajo['Camion']['marca'];
$anio = $camionestrabajo['Camion']['anio'];
$mts = $camionestrabajo['Camion']['mts'];
$chofer = $camionestrabajo['Camion']['chofer'];
$cedula = $camionestrabajo['Camion']['cedu_chofer'];

//Datos del Viaje
$distancia = $camionestrabajo['CamionesTrabajo']['distancia'];
$costo = $camionestrabajo['CamionesTrabajo']['costo'];
$fecha = $camionestrabajo['CamionesTrabajo']['fecha'];*/
/*$placa = strtoupper($post['Camion']['placa']);
//$distancia = strtoupper($post['CamionesTrabajo']['distancia']);
$distancia = strtoupper($post['CamionesTrabajo']['distancia']);*/
$camion = $trabajos['Camion']['info'];
$fecha = date('d/m/Y');
$html = <<<EOD
<table>
<tr>
   <td width="150"><img src="../webroot/img/images (7).jpg" width="90" align="left"></td>
<th align="center"><h2 style="color:#0040ff">ASOCIACIÓN COOPERATIVA</h2><BR /><h1 style="color:#0040ff">LA MURALLA 2030 R.L</h1><br />Calle Bolivar Casa N° S/N Sector Casco Central<br />Ortiz-Estado Guarico<br />Telefonos: 0414 - 465 49 12/0414 - 543 82 73<br /><h3 style="color:#0040ff">RIF: J-40032087-9</h3></th></tr>
</table>
<h2>Datos del Camión</h2>
<p>$camion&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fecha del Reporte: $fecha</p>
<h4 style="text-align:center;">Viajes Realizados por el Camion</h4>
    <table border="1" style="width:100%">
    <tr style="background-color:#E1E1E1;font-weight: bold;margin-left: 100px; ">
        <th style="width:5%; text-align:center;">Nº</th>
        <th style="width:15%; text-align:center;">Fecha</th>        
        <th style="width:25%; text-align:center;">Tabulador</th>
        <th style="width:25%; text-align:center;">Distancia (km.)</th>        
        <th style="width:25%; text-align:center;">Costo (Bs.)</th>        
    </tr>
    
EOD;
//$i = 1;
/*foreach ($camion[0]['CamionesTrabajo'] as $reg) {

    # code...
    $html = $html.'<tr>
                    <td>'.$i.'</td>
                    <td>'.$reg['CamionesTrabajo']['distancia'].'</td>
                       
                   </tr>';*/
//$i++;
//}
$i = 1;
$total = 0;
foreach($trabajos['CamionesTrabajo'] as $trabajo){
    $color = ($i%2!=0)?'#FDFEFF':'#F7FBFF';
$html = $html.'
    <tr style="background-color:'.$color.'">
        <td align="center">'.$i.'</td>
        <td align="center">'.$this->Time->format($trabajo['fecha'], '%d-%m-%Y').'</td>
        <td align="center">'.$trabajo['CamionesTabulador']['unidad'] .' - '.$trabajo['CamionesTabulador']['costo'].'</td>
        <td align="center">'.$trabajo['distancia'].'</td>
        <td align="center">'.$trabajo['costo'].'</td>
        
    </tr>
';
$i++;
$total += $trabajo['costo'];
}
$html = $html.'<tr><th colspan="4" style="text-align:center; font-weight: bold;">Total del Trabajo (Bs.)</th><th style="text-align:center;font-weight: bold;">'.number_format($total,2,',','.').'</th></tr>';
$html = $html.'</table>';

$tcpdf->writeHTML($html, $ln=true, $fondo=false, $reseth=false, $cell=false);
$tcpdf->Output("listaEmpleados.pdf", "I");
exit()
?>