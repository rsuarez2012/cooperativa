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
$html = <<<EOD
<table>
<tr>
   <td width="150"><img src="../webroot/img/images (7).jpg" width="90" align="left"></td>
<th align="center"><h2 style="color:#0040ff">ASOCIACIÓN COOPERATIVA</h2><BR /><h1 style="color:#0040ff">LA MURALLA 2030 R.L</h1><br />Calle Bolivar Casa N° S/N Sector Casco Central<br />Ortiz-Estado Guarico<br />Telefonos: 0414 - 465 49 12/0414 - 543 82 73<br /><h3 style="color:#0040ff">RIF: J-40032087-9</h3>
<h3>LISTA DE CAMIONES</h3></th>
</tr>
</table>
<br/><br/>
<table border="1" align="right">
    <tr style="background-color:#E1E1E1;font-weight: bold; ">
        <th align="center" width="20px">Nº</th>
        <th align="center" width="80px">Placa</th>
        <th align="center" width="150px">Modelo</th>
        <th align="center" width="100px">Marca</th>
        <th align="center" width="100px">Año</th>
        <th align="center" width="100px">Mts3</th>
        <th align="center" width="100px">Chofer</th>
        
    </tr>

EOD;
$i = 1;
foreach($camiones as $camion){
    $color = ($i%2!=0)?'#FDFEFF':'#F7FBFF';
$html = $html.'
    <tr style="background-color:'.$color.'">
        <td align="center">'.$i.'</td>
        <td align="center">'.$camion['Camion']['placa'].'</td>
        <td align="center">'.$camion['Camion']['modelo'].'</td>
        <td align="center">'.$camion['Camion']['marca'].'</td>
        <td align="center">'.$camion['Camion']['anio'].'</td>
        <td align="center">'.$camion['Camion']['mts'].'</td>
        <td align="center">'.$camion['Camion']['chofer'].'</td>
        
    </tr>
';
$i++;
}


$html = $html.'</table>';

$tcpdf->writeHTML($html, $ln=true, $fondo=false, $reseth=false, $cell=false);
$tcpdf->Output("listaEmpleados.pdf", "I");
exit()
?>