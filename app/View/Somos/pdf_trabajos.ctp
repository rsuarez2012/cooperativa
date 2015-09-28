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
$fecha = date("d/m/Y");

$desde = $this->Time->format($desde, '%d-%m-%Y');
$hasta = $this->Time->format($hasta, '%d-%m-%Y');

$meses = array('1' => 'Enero', '2' => 'Febrero', '3' => 'Marzo', '4' => 'Abril', '5' => 'Mayo', '6' => 'Junio', '7' => 'Julio', '8' => 'Agosto', '9' => 'Septiembre', '10' => 'Octubre', '11' => 'Noviembre', '12' => 'Diciembre');
  //obtenemos el anio de la nomina
  //$anio = explode('-', $nomina[0]['Nomina']['fecha']);
$quince = array('1' => 'Primera Quincena', '2' => 'Segunda Quincena');




$html = <<<EOD
<p align="right">Fecha: $fecha</p>
<table>
<tr>
   <td width="150"><img src="../webroot/img/images (7).jpg" width="90" align="left"></td>
<th align="center"><h2 style="color:#0040ff">ASOCIACIÓN COOPERATIVA</h2><BR /><h1 style="color:#0040ff">LA MURALLA 2030 R.L</h1><br />Calle Bolivar Casa N° S/N Sector Casco Central<br />Ortiz-Estado Guarico<br />Telefonos: 0414 - 465 49 12/0414 - 543 82 73<br /><h3 style="color:#0040ff">RIF: J-40032087-9</h3></th></tr>
</table>
<h2>Total de Gastos Realizado Durante la Obra</h2>
<h3>Trabajos de Camiones</h3>
<p>Fecha de Trabajo Desde: $desde Hasta: $hasta</p><br />

<table border="1" style="width:100%">
	<tr style="background-color:#E1E1E1;font-weight: bold;margin-left: 100px; ">
		<th style="width:5%; text-align:center;">N°</th>
        <th style="width:20%; text-align:center;">Fecha</th>
        <th style="width:25%; text-align:center;">Tabulador</th>        
        <th style="width:25%; text-align:center;">Distancia</th>        
        <th style="width:25%; text-align:center;">Costo</th>        
    </tr>

EOD;
$i = 1;
$totalC = 0;
foreach($trabajos as $trabajo){
    $color = ($i%2!=0)?'#FDFEFF':'#F7FBFF';
$html = $html.'
    <tr style="background-color:'.$color.'">
    	<td style="text-align:center;">'.$i.'</td>
        <td style="text-align:center;">'.$this->Time->format($trabajo['CamionesTrabajo']['fecha'], '%d-%m-%Y').'</td>
        <td style="text-align:center;">'.$trabajo['CamionesTabulador']['unidad'].'</td>        
        <td style="text-align:center;">'.$trabajo['CamionesTrabajo']['distancia'].'</td>        
        <td style="text-align:center;">'.number_format($trabajo['CamionesTrabajo']['costo'],2,',','.').'</td>        
        
    </tr>
';
$i++;
$totalC += $trabajo['CamionesTrabajo']['costo'];

}
$html = $html.'<tr><th colspan="4" style="text-align:center; font-weight: bold;">Total de Gastos en Camiones (Bs.)</th><th style="text-align:center;font-weight: bold;">'.$totalC.'.00</th></tr>';

$html = $html.'</table>';
$tcpdf->writeHTML($html, $ln=true, $fondo=false, $reseth=false, $cell=false);

$tbl = <<<EOD
<h3>Trabajos de Maquinarias</h3>
<p>Fecha de Trabajo Desde: $desde Hasta: $hasta</p><br />

<table border="1" style="width:100%">
	<tr style="background-color:#E1E1E1;font-weight: bold;margin-left: 100px; ">
		<th style="width:5%; text-align:center;">N°</th>
        <th style="width:20%; text-align:center;">Fecha</th>
        <th style="width:25%; text-align:center;">Cantidad</th>        
        <th style="width:25%; text-align:center;">Tabulador</th>        
        <th style="width:25%; text-align:center;">Costo</th>        
    </tr>

EOD;
$i = 1;
$totalM = 0;
foreach($maquinarias as $maquina){
    $color = ($i%2!=0)?'#FDFEFF':'#F7FBFF';
$tbl = $tbl.'
    <tr style="background-color:'.$color.'">
    	<td style="text-align:center;">'.$i.'</td>
        <td style="text-align:center;">'.$this->Time->format($maquina['MaquinariasTrabajo']['fecha'], '%d-%m-%Y').'</td>
        <td style="text-align:center;">'.$maquina['MaquinariasTrabajo']['cantidad'].'</td>        
        <td style="text-align:center;">'.$maquina['Tabulador']['unidad'].'</td>        
        <td style="text-align:center;">'.number_format($maquina['MaquinariasTrabajo']['costo'],2,',','.').'</td>        
        
    </tr>
';
$i++;
$totalM += $maquina['MaquinariasTrabajo']['costo'];

}
$tbl = $tbl.'<tr><th colspan="4" style="text-align:center; font-weight: bold;">Total de Gastos en Camiones (Bs.)</th><th style="text-align:center;font-weight: bold;">'.$totalM.'.00</th></tr>';

$tbl = $tbl.'</table>';
$tcpdf->writeHTML($tbl, $ln=true, $fondo=false, $reseth=false, $cell=false);

$tbl2 = <<<EOD
<h3>Empleados</h3>
<p>Fecha de Trabajo Desde: $desde Hasta: $hasta</p><br />

<table border="1" style="width:100%">
	<tr style="background-color:#E1E1E1;font-weight: bold;margin-left: 100px; ">
		<th style="width:5%; text-align:center;">N°</th>
        <th style="width:20%; text-align:center;">Fecha</th>
        <th style="width:25%; text-align:center;">Mes</th>        
        <th style="width:25%; text-align:center;">Quincena</th>        
        <th style="width:25%; text-align:center;">Sueldo</th>        
    </tr>

EOD;
$i = 1;
$totalE = 0;
foreach($nominas as $nomina){
    $color = ($i%2!=0)?'#FDFEFF':'#F7FBFF';
$tbl2 = $tbl2.'
    <tr style="background-color:'.$color.'">
    	<td style="text-align:center;">'.$i.'</td>
        <td style="text-align:center;">'.$this->Time->format($nomina['Nomina']['fecha'], '%d-%m-%Y').'</td>
        <td style="text-align:center;">'.$meses[$nomina['Nomina']['mes']].'</td>        
        <td style="text-align:center;">'.$quince[$nomina['Nomina']['quincena']].'</td>        
        <td style="text-align:center;">'.number_format($nomina['Nomina']['sueldo'],2,',','.').'</td>        
        
    </tr>
';
$i++;
$totalE += $nomina['Nomina']['sueldo'];
$total = number_format($totalC + $totalM + $totalE,2,',','.');
}
$tbl2 = $tbl2.'<tr><th colspan="4" style="text-align:center; font-weight: bold;">Total de Gastos en Empleados (Bs.)</th><th style="text-align:center;font-weight: bold;">'.$totalE.'</th></tr>';

$tbl2 = $tbl2.'</table>';
$tcpdf->writeHTML($tbl2, $ln=true, $fondo=false, $reseth=false, $cell=false);

$tbl3 = <<<EOD
<br />
<br />
<br />
<br />
<br />
<br />
<table border="1" style="width:100%;">
  <tr>
    <th colspan="2" style="text-align:center;"><h2>Total de Gastos</h2></th>
  </tr>
  <tr>
    <td style="background-color:#0040ff;"><h4>Total de Gastos en Camiones (Bs.):</h4></td>
    <td style="background-color:#0040ff; text-align:center;"><h4>$totalC,00</h4></td>
  </tr>
  <tr>
    <td><h4>Total de Gastos en Maquinarias (Bs.):</h4></td>
    <td style="text-align:center;"><h4>$totalM,00</h4></td>
  </tr>
  <tr>
    <td style="background-color:#0040ff;"><h4>Total de Gastos en Empleados (Bs.):</h4></td>
    <td style="background-color:#0040ff; text-align:center;"><h4>$totalE,00</h4></td>
  </tr>
  <tr>
    <th><h3>Total General de Gastos Durante la Obra:</h3></th>
    <th style="text-align:center;"><h3>$total</h3></th>
  </tr>
</table>
EOD;
$tcpdf->writeHTML($tbl3, $ln=true, $fondo=false, $reseth=false, $cell=false);
$tcpdf->Output("TotalGeneral.pdf", "I");
exit()
?>