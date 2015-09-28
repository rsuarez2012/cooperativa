<?php echo $this->Form->create('TabuladorCamion', array('class' => 'form-horizontal well')); ?> 
<table>
	<tr>
		<td><label class="fLabel">Kilometros:</label> </td>
		<td><?php echo $this->Form->input('km', array('label'=>false, 'autocomplete' => 'off', 'placeholder' => 'Km Recorrido', 'required' => true));?></td>
	</tr>
	<tr>
		<td><label class="fLabel">Costo:</label> </td>
		<td><?php echo $this->Form->input('costo', array('label'=>false, 'autocomplete'=>'off', 'placeholder' =>  'Costo del Km',  'required' => true));?></td>
	</tr>
</table>
<div id="btns"><?php echo $this->Form->end(array('label'=>'Guardar', 'div' => false, 'class'=>'button sButton bSky'));?></div>