<?php echo $this->Form->create('TiposMaquinaria', array('class' => 'form-horizontal well')); ?> 
<table>
	<tr>
		<td><label class="fLabel">Nombre:</label> </td>
		<td><?php echo $this->Form->input('nombre', array('label'=>false, 'autocomplete' => 'off', 'placeholder' => 'Ingrese nombre', 'required' => true));?></td>
	</tr>
	<tr>
		<td><label class="fLabel">Descripción:</label> </td>
		<td><?php echo $this->Form->input('descripcion', array('label'=>false, 'type'=>'textarea',  'rows' => 3, 'required' => true));?></td>
	</tr>
</table>
<div id="btns"><?php echo $this->Form->end(array('label'=>'Guardar', 'div' => false, 'class'=>'button sButton bSky'));?></div>