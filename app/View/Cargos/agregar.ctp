<?php echo $this->Form->create('Cargo', array('class' => 'form-horizontal well')); ?> 
<table>
	<tr>
		<td><label>Cargo:</label> </td>
		<td><?php echo $this->Form->input('nombre_cargo', array('label'=>false, 'autocomplete' => 'off', 'placeholder' => 'Ingrese nombre del Cargo', 'required' => true));?></td>
	</tr>
	<tr>
		<td><label>Mensualidad:</label> </td>
		<td><?php echo $this->Form->input('mensualidad', array('label'=>false, 'autocomplete' => 'off', 'placeholder' => 'Pago mensual del Cargo', 'required' => true));?></td>
	</tr>
	
</table>
<div id="btns"><?php echo $this->Form->end(array('label'=>'Guardar', 'div' => false, 'class'=>'button sButton bSky'));?></div>