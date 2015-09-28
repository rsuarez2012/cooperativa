<?php
class TiposMaquinaria extends AppModel{
	
	public $name="TiposMaquinaria";
	
	public $hasMany = array('Tabulador'=>array('className'=>'Tabulador','foreignKey'=>'tipos_maquinaria_id'));	

	public $validate = array(
		'nombre' => array('rule' => 'notEmpty'),
		'descripcion' => array('rule' => 'notEmpty')
		);
	
	
}
?>
