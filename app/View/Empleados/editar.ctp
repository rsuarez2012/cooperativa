<?php echo $this->Form->create('Empleado', array('action'=>'editar', 'class' => 'form-horizontal well')); ?> 
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
		<td><label>Dirección:</label> </td>
		<td><?php echo $this->Form->input('direccion', array('label'=>false, 'type'=>'textarea',  'rows' => 2, 'required' => true));?></td>
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
		<td><label>Fecha Ingreso:</label> </td>
		<td><?php echo $this->Form->date('fecha_ingreso', array('label'=>false, 'autocomplete' => 'off', 'placeholder' => 'Fecha de Ingreso = Año-Mes-Dia', 'required' => true));?></td>
	</tr>
	<tr>
		<td><label class="fLabel">Cargo:</label> </td>
		<td><?php echo $this->Form->select('cargo_id', $cargo, array('label'=>false, 'id' => 'cargo', 'required' => true));?></td>
	</tr>
</table>
<div id="btns"><?php echo $this->Form->end(array('label'=>'Actualizar', 'div' => false, 'class'=>'button sButton bSky'));?></div>
<script>
  jQuery(document).ready(function() {          
      jQuery("select#cargo").select2();
    });
</script>