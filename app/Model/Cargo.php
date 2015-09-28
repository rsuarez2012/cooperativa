<?php
class Cargo extends AppModel{
	
	public $name="Cargo";

	public $validate = array(
		'nombre_cargo' => array('rule' => 'notEmpty'),
		'mensualidad' => array('rule' => 'notEmpty')
		);
	
	
}
?>
