<?php echo $this->Form->create('Cargo', array('action'=>'editar', 'class' => 'form-horizontal well')); ?> 
<?php echo $this->Form->input('id', array('type' => 'hidden')); ?>
<table>
	<tr>
		<td><label>Nombre:</label> </td>
		<td><?php echo $this->Form->input('nombre_cargo', array('label'=>false, 'autocomplete' => 'off', 'placeholder' => 'Nombre del Cargo', 'required' => true));?></td>
	</tr>
	<tr>
		<td><label>Mensualidad:</label> </td>
		<td><?php echo $this->Form->input('mensualidad', array('label'=>false, 'autocomplete' => 'off', 'placeholder' => 'Pago Mensual del Cargo', 'required' => true));?></td>
	</tr>
</table>
<div id="btns"><?php echo $this->Form->end(array('label'=>'Actualizar', 'div' => false, 'class'=>'button sButton bSky'));?></div>