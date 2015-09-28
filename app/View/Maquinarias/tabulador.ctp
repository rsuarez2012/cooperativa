<?php

	$html = "<option value=''>Seleccione</option>";
	foreach ($maquinaria[0]['Tabulador'] as $m) {
	    $html .= "<option value=".$m['id'].">".$m['info']."</option>";
	}

	echo $html;
?>