<?php
class Empleado extends AppModel{
	
	public $name="Empleado";
	
	public $belongsTo = array('Cargo' => array('className' => 'Cargo', 'foreignKey' => 'cargo_id'));

	public $virtualFields = array("info"=>"CONCAT(Empleado.cedula, ' - ' ,Empleado.nombres, ' - ' ,Empleado.apellidos)");

	public $validate = array(
		'cedula' => array('rule' => 'notEmpty'),
		'nombres' => array('rule' => 'notEmpty'),
		'apellidos' => array('rule' => 'notEmpty'),
		'telefono' => array('rule' => 'notEmpty'),
		'correo' => array('rule' => 'notEmpty'),
		//'cargo' => array('rule' => 'notEmpty'),
		'fecha_ingreso' => array('rule' => 'notEmpty')
		);
	
	
}
?>
