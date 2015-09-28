<?php echo $this->Form->create('Tabulador', array('action'=>'editar', 'class' => 'form-horizontal well')); ?> 
<?php echo $this->Form->input('id', array('type' => 'hidden')); ?>
<table>
	<tr>
		<td><label>Tipo de Maquinaria:</label> </td>
		<td><?php echo $this->Form->select('tipos_maquinaria_id', $tipos_maquinarias, array('label'=>false, 'id' => 'tipo_maquinaria_id', 'required' => true));?></td>
	</tr>
	<tr>
		<td><label>Unidad Metrica:</label> </td>
		<td><?php echo $this->Form->input('unidad', array('label'=>false, 'autocomplete' => 'off', 'placeholder' => 'Unidad Metrica', 'required' => true));?></td>
	</tr>
	<tr>
		<td><label>Costo:</label> </td>
		<td><?php echo $this->Form->input('costo', array('label'=>false, 'autocomplete' => 'off', 'placeholder' => 'Costo de la Maquinaria', 'required' => true));?></td>
	</tr>
</table>
<div id="btns"><?php echo $this->Form->end(array('label'=>'Actualizar', 'div' => false, 'class'=>'button sButton bSky'));?></div>
<script>
  jQuery(document).ready(function() {          
      jQuery("select#tipo_maquinaria_id").select2();
    });
</script>

