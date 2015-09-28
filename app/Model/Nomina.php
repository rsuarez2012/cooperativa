<?php
class Nomina extends AppModel{
	
	public $name="Nomina";

	public $belongsTo = array('Empleado' => array('className' => 'Empleado', 'foreignKey' => 'empleado_id'));

	public $validate = array(
		'empleado_id' => array('rule' => 'notEmpty'),
		'mes' => array('rule' => 'notEmpty'),
		'quincena' => array('rule' => 'notEmpty'),
		'fecha' => array('rule' => 'notEmpty')
		);
	
	
}
?>
