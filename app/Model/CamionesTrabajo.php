<?php
class CamionesTrabajo extends AppModel{
	
	public $name="CamionesTrabajo";

	public $belongsTo = array('Camion' => array('className' => 'Camion', 'foreignKey' => 'camion_id'),
							  'CamionesTabulador' => array('className' => 'CamionesTabulador', 'foreignKey' => 'camiones_tabulador_id'));

	public $validate = array(
		'camion_id' => array('rule' => 'notEmpty'),
		'camion_tabulador_id' => array('rule' => 'notEmpty'),
		'fecha' => array('rule' => 'notEmpty'),
		'cantidad' => array('rule' => 'notEmpty'),
		'costo' => array('rule' => 'notEmpty')
		);
	
	
}
?>
