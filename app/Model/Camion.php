<?php
class Camion extends AppModel{
	
	public $name="Camion";

	public $virtualFields = array("info"=>"CONCAT(Camion.placa, ' - ' , Camion.modelo, ' - ' ,Camion.chofer)");

	public $hasMany = array('CamionesTrabajo'=>array('className'=>'CamionesTrabajo','foreignKey'=>'camion_id'));	

	public $validate = array(
		'placa' => array('rule' => 'notEmpty'),
		'modelo' => array('rule' => 'notEmpty'),
		'marca' => array('rule' => 'notEmpty'),
		'anio' => array('rule' => 'notEmpty')
		);
	
	
}
?>
