<?php
class Usuario extends AppModel{
	
	public $name="Usuario";

	public $virtualFields = array("info"=>"CONCAT(Usuario.cedula, ' - ' , Usuario.nombres, ', ' ,Usuario.apellidos)");

	public $validate = array(
		'cedula' => array('rule' => 'notEmpty'),
		'nombres' => array('rule' => 'notEmpty'),
		'apellidos' => array('rule' => 'notEmpty'),
		'telefono' => array('rule' => 'notEmpty')
		);
	
	public function validateLogin($data) {		
		$salt = '$cooperativa$/';
		$data['clave'] = sha1(md5($salt.$data['clave']));
		$usuario = $this->find('first', array('conditions' => array('usuario' => $data['usuario'], 'clave' => $data['clave'])), array('id', 'nombre', 'usuario'));
		if(!empty($usuario)) 			
			return $usuario['Usuario'];		
		return false;
	}	

}
?>
