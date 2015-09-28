<form action="resumenTrabajos" class="form-horizontal well ucase" id="Form" method="post" accept-charset="utf-8">
<div class="row-fluid">
<div class="span12">
  <div class="widget">
    <div class="wTitle">
      <h5>Resumen - Trabajos Maquinarias</h5>
    </div>

    <div class="wContent noPadding">
      <div class="formField">
        <div class="row-fluid">
          <div class="span2">
            <span class="fLabel">Seleccione Maquinaria:</span>
          </div>
          <div class="span10 ibutton">
            <?php echo $this->Form->input('maquinaria_id', array('empty' => 'Seleccione...', 'id' => 'maquinaria_id', 'label'=>false));?>
          </div>
        </div>  
      </div>
      <div class="formField">
        <div class="row-fluid">
          <div class="span2">
            <span class="fLabel">Desde:</span>
          </div>
          <div class="span10 ibutton_radios">
           <?php echo $this->Form->date('desde', array('label'=>false, 'id' => 'desde', 'required' => true,'placeholder' => 'Año-Mes-Dia'));?>

          </div>
        </div>  
      </div>
      <div class="formField">
        <div class="row-fluid">
          <div class="span2">
            <span class="fLabel">Hasta:</span>
          </div>
          <div class="span10 ibutton_label">
            <?php echo $this->Form->date('hasta', array('label'=>false, 'id' => 'hasta', 'required' => true,'placeholder' => 'Año-Mes-Dia'));?>
          </div>
        </div>  
      </div>
      <div class="formField">
        <div class="row-fluid">
          <?php echo $this->Form->end(array('label'=>'Buscar', 'div' => false, 'class'=>'btn btn-info'));?>
          </div>
        </div>  
      </div>

    </div>
  </div>
</div>
</div>
<script type="text/javascript">
	$(document).ready(function() { $("#maquinaria_id").select2(); });
</script>