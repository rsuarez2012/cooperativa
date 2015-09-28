<?php
class Maquinaria extends AppModel{
	
	public $name="Maquinaria";

	public $belongsTo = array('TiposMaquinaria' => array('className' => 'TiposMaquinaria', 'foreignKey' => 'tipo_maquinaria_id'));

	public $hasMany = array('MaquinariasTrabajo'=>array('className'=>'MaquinariasTrabajo','foreignKey'=>'maquinaria_id'));	
	
	public $virtualFields = array("info"=>"CONCAT(Maquinaria.serial, ' - ' ,Maquinaria.marca, ' - ' ,Maquinaria.propietario)");

	public $validate = array(
		'serial' => array('rule' => 'notEmpty'),
		'modelo' => array('rule' => 'notEmpty'),
		'marca' => array('rule' => 'notEmpty'),
		'anio' => array('rule' => 'notEmpty'),
		'propietario' => array('rule' => 'notEmpty')
		);
	
	
}
?>
