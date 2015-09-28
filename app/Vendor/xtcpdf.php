<?php 
App::import('Vendor','tcpdf/tcpdf'); 

class XTCPDF  extends TCPDF 
{ 

    var $xheadertext  = 'PDF created using CakePHP and TCPDF'; 
    var $xheadercolor = array(0,0,200); 
    var $xfootertext  = 'Sistema Administrativo de Transporte Copyright © %d. Todos los Derechos Reservados.'; 
    var $xfooterfont  = PDF_FONT_NAME_MAIN ; 
    var $xfooterfontsize = 8 ; 


    /** 
    * Overwrites the default header 
    * set the text in the view using 
    *    $fpdf->xheadertext = 'YOUR ORGANIZATION'; 
    * set the fill color in the view using 
    *    $fpdf->xheadercolor = array(0,0,100); (r, g, b) 
    * set the font in the view using 
    *    $fpdf->setHeaderFont(array('YourFont','',fontsize)); 
    */ 
    function Header() 
    { 

        list($r, $b, $g) = $this->xheadercolor; 
        $this->setY(10); // shouldn't be needed due to page margin, but helas, otherwise it's at the page top 
        $this->SetFillColor($r, $b, $g); 
        $this->SetTextColor(0 , 0, 0); 
        $this->Cell(0,20, '', 0,1,'C', 1); 
        $this->Text(15,26,$this->xheadertext ); 
    } 

    /** 
    * Overwrites the default footer 
    * set the text in the view using 
    * $fpdf->xfootertext = 'Copyright Â© %d YOUR ORGANIZATION. All rights reserved.'; 
    */ 
    function Footer() 
    { 
        $year = date('Y'); 
        $footertext = sprintf($this->xfootertext, $year); 
        $this->SetY(-40); 
        $this->SetTextColor(0, 0, 0); 
        $this->SetFont($this->xfooterfont,'',$this->xfooterfontsize); 
        $this->Cell(0,8, $footertext,'T',1,'C'); 
	
	$barcode = $this->getBarcode();
		if (!empty($barcode)) {
			//$this->Ln($line_width);
			$barcode_width = round(($this->w - $this->original_lMargin - $this->original_rMargin) / 3);
			$style = array(
				'position' => $this->rtl?'R':'L',
				'align' => $this->rtl?'R':'L',
				'stretch' => false,
				'fitwidth' => true,
				'cellfitalign' => '',
				'border' => false,
				'padding' => 0,
				'fgcolor' => array(0,0,0),
				'bgcolor' => false,
				'text' => false
			);
			$this->write1DBarcode($barcode, 'C128', '', '', '', (($this->footer_margin / 3) ), 0.3, $style, '');
		}
    } 
} 
?>
