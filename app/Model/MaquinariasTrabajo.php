<?php
class MaquinariasTrabajo extends AppModel{
	
	public $name="MaquinariasTrabajo";

	public $belongsTo = array('Maquinaria' => array('className' => 'Maquinaria', 'foreignKey' => 'maquinaria_id'),
							  'Tabulador' => array('className' => 'Tabulador', 'foreignKey' => 'tabulador_id'));

	public $validate = array(
		'maquinaria_id' => array('rule' => 'notEmpty'),
		'tabulador_id' => array('rule' => 'notEmpty'),
		'fecha' => array('rule' => 'notEmpty'),
		'cantidad' => array('rule' => 'notEmpty'),
		'costo' => array('rule' => 'notEmpty')
		);
	
	
}
?>
