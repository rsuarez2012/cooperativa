<?php echo $this->Form->create('Maquinaria', array('action'=>'editar', 'class' => 'form-horizontal well')); ?> 
<?php echo $this->Form->input('id', array('type' => 'hidden')); ?>
<table>
	<tr>
		<td><label class="fLabel">Tipo de Maquinaria:</label> </td>
		<td><?php echo $this->Form->select('tipo_maquinaria_id', $tipos_maquinarias, array('label'=>false, 'id' => 'tipos_maquinarias', 'required' => true));?></td>
	</tr>
	<tr>
		<td><label>Serial:</label> </td>
		<td><?php echo $this->Form->input('serial', array('label'=>false, 'autocomplete' => 'off', 'placeholder' => 'Ingrese serial', 'required' => true));?></td>
	</tr>
	<tr>
		<td><label>Marca:</label> </td>
		<td><?php echo $this->Form->input('marca', array('label'=>false, 'autocomplete' => 'off', 'placeholder' => 'Ingrese marca', 'required' => true));?></td>
	</tr>
	<tr>
		<td><label>Modelo:</label> </td>
		<td><?php echo $this->Form->input('modelo', array('label'=>false, 'autocomplete' => 'off', 'placeholder' => 'Ingrese modelo', 'required' => true));?></td>
	</tr>
	<tr>
		<td><label>Año:</label> </td>
		<td><?php echo $this->Form->input('anio', array('label'=>false, 'autocomplete' => 'off', 'placeholder' => 'Ingrese año', 'required' => true));?></td>
	</tr>
	<tr>
		<td><label>Propietario:</label> </td>
		<td><?php echo $this->Form->input('propietario', array('label'=>false, 'autocomplete' => 'off', 'placeholder' => 'Ingrese datos del propietario', 'required' => true));?></td>
	</tr>
</table>
<div id="btns"><?php echo $this->Form->end(array('label'=>'Actualizar', 'div' => false, 'class'=>'button sButton bSky'));?></div>
<script>
  jQuery(document).ready(function() {          
      jQuery("select#tipos_maquinarias").select2();
    });
</script>


