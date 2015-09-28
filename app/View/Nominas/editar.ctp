<?php echo $this->Form->create('Camion', array('action'=>'editar', 'class' => 'form-horizontal well')); ?> 
<?php echo $this->Form->input('id', array('type' => 'hidden')); ?>
<table>
	<tr>
		<td><label class="fLabel">Placa:</label> </td>
		<td><?php echo $this->Form->input('placa', array('label'=>false, 'autocomplete' => 'off', 'placeholder' => 'Ingrese placa', 'required' => true));?></td>
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
		<td>Cantidad de Mts3:</td>
		<td><?php echo $this->Form->input('mts', array('label' => false, 'autocomplete' => 'off', 'placeholder' =>'Mts3 del Camion', 'required' => true)); ?></td>
	</tr>
	<tr>
		<td>Chofer:</td>
		<td><?php echo $this->Form->input('chofer', array('label' => false, 'autocomplete' => 'off', 'placeholder' =>'Datos del Chofer', 'required' => true)); ?></td>
	</tr>
	<tr>
		<td>Cedula del Chofer:</td>
		<td><?php echo $this->Form->input('cedu_chofer', array('label' => false, 'autocomplete' => 'off', 'placeholder' =>'Cedula del Chofer', 'required' => true)); ?></td>
	</tr>
</table>
<div id="btns"><?php echo $this->Form->end(array('label'=>'Guardar', 'div' => false, 'class'=>'button sButton bSky'));?></div>
