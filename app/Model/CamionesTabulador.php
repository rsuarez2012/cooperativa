<?php
class CamionesTabulador extends AppModel{
	
	public $name="CamionesTabulador";

	public $virtualFields = array("info"=>"CONCAT(CamionesTabulador.unidad, ' - Bs. ' ,CamionesTabulador.costo)");


	public $validate = array(
		'unidad' => array('rule' => 'notEmpty'),
		'costo' => array('rule' => 'notEmpty')
		);
	
	
}
?>
