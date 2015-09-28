<?php $meses = array('1' => 'Enero', '2' => 'Febrero', '3' => 'Marzo', '4' => 'Abril', '5' => 'Mayo', '6' => 'Junio', '7' => 'Julio', '8' => 'Agosto', '9' => 'Septiembre', '10' => 'Octubre', '11' => 'Noviembre', '12' => 'Diciembre')?>
<h5>Generar Nómina</h5>
<?php echo $this->Form->create('Nomina', array('action' => 'registrar', 'id' => 'nomina', 'class' => 'form-horizontal well')); ?> 
<table>
	<tr>
		<td><label>Mes:</label> </td>
		<td><?php echo $this->Form->select('mes', $meses, array('label'=>false, 'empty' => 'Seleccione...', 'id' => 'mes', 'required' => true));?></td>
	</tr>
	<tr>
		<td><label>Quincena:</label> </td>
		<td><?php echo $this->Form->input('quincena', array('options' => array('1' => '1', '2' => '2'), 'empty' => 'Seleccione...','label'=>false, 'id' => 'quincena', 'required' => true));?></td>
	</tr>
</table>
<br/>
<div id="btns"><?php echo $this->Form->end(array('label'=>'Generar', 'id' => 'generar', 'div' => false, 'class'=>'button sButton bSky'));?></div>