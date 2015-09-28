<?php echo $this->Form->create('Usuario', array('action'=>'editar', 'class' => 'form-horizontal well')); ?> 
<?php echo $this->Form->input('id', array('type' => 'hidden')); ?>
<table>
	<tr>
		<td><label>Cédula:</label> </td>
		<td><?php echo $this->Form->input('cedula', array('label'=>false, 'autocomplete' => 'off', 'placeholder' => 'Ingrese cédula', 'required' => true));?></td>
	</tr>
	<tr>
		<td><label>Nombres:</label> </td>
		<td><?php echo $this->Form->input('nombres', array('label'=>false, 'autocomplete' => 'off', 'placeholder' => 'Ingrese nombres', 'required' => true));?></td>
	</tr>
	<tr>
		<td><label>Apellidos:</label> </td>
		<td><?php echo $this->Form->input('apellidos', array('label'=>false, 'autocomplete' => 'off', 'placeholder' => 'Ingrese apellidos', 'required' => true));?></td>
	</tr>
	<tr>
		<td><label>Teléfono:</label> </td>
		<td><?php echo $this->Form->input('telefono', array('label'=>false, 'autocomplete' => 'off', 'placeholder' => 'Ingrese teléfono', 'required' => true));?></td>
	</tr>
	<tr>
		<td><label>Email:</label> </td>
		<td><?php echo $this->Form->input('correo', array('label'=>false, 'autocomplete' => 'off', 'placeholder' => 'Ingrese correo', 'required' => true));?></td>
	</tr>
	<tr>
		<td><label>Usuario:</label> </td>
		<td><?php echo $this->Form->input('usuario', array('label'=>false, 'autocomplete' => 'off', 'placeholder' => 'Ingrese Usuario', 'required' => true));?></td>
	</tr>
	<tr>
		<td><label>Clave:</label> </td>
		<td><?php echo $this->Form->input('clave', array('label'=>false, 'type' => 'password', 'autocomplete' => 'off', 'required' => true));?></td>
	</tr>
</table>
<div id="btns"><?php echo $this->Form->end(array('label'=>'Actualizar', 'div' => false, 'class'=>'button sButton bSky'));?></div>