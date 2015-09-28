<?php echo $this->Form->create('MaquinariasTrabajo', array('class' => 'form-horizontal well')); ?> 
<table>
	<tr>
		<td>Maquinaria:</td>
		<td><?php echo $this->Form->input('maquinaria_id', array('empty' => 'Seleccione...', 'id' => 'maquinaria_id', 'label'=>false, 'required' => true));?></td>
	</tr>
	<tr id="tabulador">
		<td>Tabulador:</td>
		<td><?php echo $this->Form->input('tabulador_id', array('empty' => 'Seleccione...', 'id' => 'tabulador_id', 'label'=>false, 'required' => true));?></td>
	</tr>
	<tr>
		<td><label class="fLabel">Cantidad:</label> </td>
		<td><?php echo $this->Form->input('cantidad', array('label'=>false, 'autocomplete' => 'off', 'id' => 'cantidad','placeholder' => 'Ingrese cantidad', 'required' => true));?></td>
	</tr>
	<tr>
		<td><label class="fLabel">Costo (Bs.):</label> </td>
		<td><?php echo $this->Form->input('costo', array('label'=>false, 'id' => 'costo', 'required' => true));?></td>
	</tr>
	<tr>
		<td><label class="fLabel">Fecha:</label> </td>
		<td><?php echo $this->Form->date('fecha', array('label'=>false, 'id' => 'fecha', 'required' => true));?></td>
	</tr>
	<tr>
		<td><label class="fLabel">Hora Inicio:</label> </td>
		<td><?php echo $this->Form->time('hora_inicio', array('label'=>false, 'id' => 'hora_inicio', 'required' => true));?></td>
	</tr>
</table>
<div id="btns"><?php echo $this->Form->end(array('label'=>'Guardar', 'div' => false, 'class'=>'button sButton bSky'));?></div>
<script type="text/javascript">
	$(document).ready(function() { 
		$("#maquinaria_id").select2(); 
		$("#tabulador_id").select2(); 
		$("#tabulador").hide();
		var tabulador_monto = 0;
		var costo = 0;
	 });

	//activar los tabuladores dependiendo del tipo de maquinaria
	$('#maquinaria_id').on('change', function() {
	 	var id = this.value;
	 	$.ajax({
          url: "../maquinarias/tabulador/"+id,
          cache: false
        })
          .done(function( response ) {
          	$("#tabulador_id").html(response);         
            $("#tabulador").show();
        });
	});


	//activar los tabuladores dependiendo del tipo de maquinaria
	$('#tabulador_id').on('change', function() {
	 	var tab = this.value;

	 	$.ajax({
          url: "../tabuladores/costo/"+tab,
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