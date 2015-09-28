<?php
class Tabulador extends AppModel{
	
	public $name="Tabuladores";
	
	public $belongsTo = array('TiposMaquinaria' => array('className' => 'TiposMaquinaria', 'foreignKey' => 'tipos_maquinaria_id'));

	public $virtualFields = array("info"=>"CONCAT(Tabulador.unidad, ' - Bs. ' ,Tabulador.costo)");

	public $validate = array(

		'unidad' => array('rule' => 'notEmpty'),
		'costo' => array('rule' => 'notEmpty')
		);
	
	
}
?>
