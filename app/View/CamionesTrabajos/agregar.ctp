<?php echo $this->Form->create('CamionesTrabajo', array('class' => 'form-horizontal well')); ?> 
<table>
	<tr>
		<td>Camión:</td>
		<td><?php echo $this->Form->input('camion_id', array('empty' => 'Seleccione...', 'id' => 'camion_id', 'label'=>false, 'required' => true));?></td>
	</tr>
	<tr>
		<td>Tabulador:</td>
		<td><?php echo $this->Form->input('camiones_tabulador_id', array('options' => $camiones_tabuladores,'empty' => 'Seleccione...', 'id' => 'tabulador_id', 'label'=>false, 'required' => true));?></td>
	</tr>
	<tr>
		<td><label class="fLabel">Distancia (Km.):</label> </td>
		<td><?php echo $this->Form->input('distancia', array('label'=>false, 'autocomplete' => 'off', 'id' => 'cantidad','placeholder' => 'Ingrese cantidad', 'required' => true));?></td>
	</tr>
	<tr>
		<td><label class="fLabel">Costo (Bs.):</label> </td>
		<td><?php echo $this->Form->input('costo', array('label'=>false, 'id' => 'costo', 'required' => true));?></td>
	</tr>
	<tr>
		<td><label class="fLabel">Fecha:</label> </td>
		<td><?php echo $this->Form->date('fecha', array('label'=>false, 'id' => 'fecha', 'required' => true));?></td>
	</tr>
</table>
<div id="btns"><?php echo $this->Form->end(array('label'=>'Guardar', 'div' => false, 'class'=>'button sButton bSky'));?></div>
<script type="text/javascript">
	$(document).ready(function() { 
		$("#camion_id").select2(); 
		$("#tabulador_id").select2(); 
		var tabulador_monto = 0;
		var costo = 0;
	 });

	
	//activar los tabuladores dependiendo del tipo de maquinaria
	$('#tabulador_id').on('change', function() {
	 	var tab = this.value;

	 	$.ajax({
          url: "../camionesTabuladores/costo/"+tab,
          cache: false
        })
          .done(function( costo ) {

          	tabulador_monto = costo;
        });
	});

	$("#cantidad").change(function() {
	  var cantidad = $("#cantidad").val();

  	  if(cantidad>0 && tabulador_monto>0) {
  	  	costo = parseFloat(cantidad*tabulador_monto);
	  	$("#costo").val(costo.toFixed(2));
	  }
	  else {
	  	alert("Debe seleccionar un tabulador e ingresar la cantidad!!");
	  }
	  
	});
</script>