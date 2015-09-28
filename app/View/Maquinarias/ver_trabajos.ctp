<h5><?php echo $trabajos['Maquinaria']['info']; ?></h5>
<?php if(empty($trabajos['MaquinariasTrabajo'])) {  ?>
  <h4>&nbsp;No hay registros!!</h4>
<?php } else { ?>
<div class="wContent" align="center">
<?php echo $this->Session->flash('success'); ?>
<?php echo $this->Session->flash('error'); ?>
<table cellpading="0" cellspacing="0" border="0" class="dTable" id="tab">
<thead>
  <tr>                
    <th>Fecha</th>
    <th>Tabulador</th>
    <th>Cantidad</th>
    <th>Costo (Bs.)</th>
  </tr>
</thead>
<tbody align="center">
  <tr class="active">
  <?php 
    $total = 0;
    foreach($trabajos['MaquinariasTrabajo'] as $trabajo) {  ?>
     <tr>                   
        <td><?php echo $this->Time->format($trabajo['fecha'], '%d-%m-%Y'); ?></td>
        <td><?php echo $trabajo['Tabulador']['unidad']; ?></td>
        <td><?php echo $trabajo['cantidad']; ?></td>
        <td><?php echo number_format($trabajo['costo'],2,',','.'); ?></td>
     </tr>
  <?php 
      $total += $trabajo['costo'];
  } ?>                       
  </tr>   
  <tr>
    <th colspan="3">Total (Bs.)</th>
    <th><?php echo number_format($total,2,',','.'); ?></th>
  </tr>                   
</tbody>
</table>
</div>
<?php } //end else ?>