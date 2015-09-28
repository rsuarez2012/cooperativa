<?php echo $this->Form->create('Tabulador', array('class' => 'form-horizontal well')); ?> 
<table>
	<tr>
		<td><label class="fLabel">Tipo de Maquinaria:</label> </td>
		<td><?php echo $this->Form->select('tipo_maquinaria_id', $maquinarias, array('label'=>false, 'id' => 'maquinarias', 'required' => true));?></td>
	</tr>
	<tr>
		<td><label class="fLabel">Unidad Metrica:</label> </td>
		<td><?php echo $this->Form->input('unidad', array('label'=>false, 'autocomplete' => 'off', 'placeholder' => 'Unidad Metrica de la Maquina', 'required' => true));?></td>
	</tr>
	<tr>
		<td><label class="fLabel">Costo:</label> </td>
		<td><?php echo $this->Form->input('costo', array('label'=>false, 'autocomplete'=>'off', 'placeholder' =>  'Costo del Km',  'required' => true));?></td>
	</tr>
</table>
<div id="btns"><?php echo $this->Form->end(array('label'=>'Guardar', 'div' => false, 'class'=>'button sButton bSky'));?></div>
<script>
  jQuery(document).ready(function() {          
      jQuery("select#maquinarias").select2();
    });
</script>