 <?php $meses = array('1' => 'Enero', '2' => 'Febrero', '3' => 'Marzo', '4' => 'Abril', '5' => 'Mayo', '6' => 'Junio', '7' => 'Julio', '8' => 'Agosto', '9' => 'Septiembre', '10' => 'Octubre', '11' => 'Noviembre', '12' => 'Diciembre');
 	//obtenemos el anio de la nomina
 	$anio = explode('-', $nomina[0]['Nomina']['fecha']);
 	//obtenmos la quincena
 	$quincena = ($nomina[0]['Nomina']['quincena']==1)?'Primera':'Segunda';
	
 ?>
 <div class="row-fluid">
    <div class="span12">
      <div class="widget">
        <div class="wTitle">
          <h5><?php echo strtoupper(Inflector::humanize(Inflector::underscore($this->params['controller']))). " - ".$meses[$nomina[0]['Nomina']['mes']]." - ".$anio[0]." (".$quincena." Quincena)" ?></h5>
          <ul class="nav nav-tabs pull-right" id="dashboard-demo">
            <li><a href="<?php echo $this->webroot; ?>nominas/pdfNomina/<?php echo $nomina[0]['Nomina']['mes']."/".$nomina[0]['Nomina']['quincena']?>"><i class="icon icon-print"></i></a></li>
          </ul>
        </div>

        <?php if(empty($nomina)) { ?>
          <h4>&nbsp;No hay registros!!</h4>
        <?php } else { ?>
        <div class="wContent" align="center">
        <?php echo $this->Session->flash('success'); ?>
        <?php echo $this->Session->flash('error'); ?>
          <table cellpading="0" cellspacing="0" border="0" class="dTable" id="tabla">
            <thead>
              <tr>           
              	<th>N</th>
                <th>Empleado</th>
                <th>Sueldo (Bs.)</th>            
              </tr>
            </thead>
            <tbody align="center">
              <tr class="active">
              <?php 
              	$i = 1;
              	$total = 0;
              	foreach($nomina as $n) { ?>
                 <tr>                   
                 	<td><?php echo $i; ?></td>
                    <td><?php echo $n['Empleado']['info'];?></td>
                    <td><?php echo number_format($n['Nomina']['sueldo'],2,',','.'); ?></td>                    
                 </tr>
              <?php 
              	$total += $n['Nomina']['sueldo'];
              	$i++; 
              	}//endforeach ?>                       
              </tr>     
              <tr>
              	<th colspan="2">Total (Bs.)</th>
              	<th><?php echo number_format($total,2,',','.');?></th>
              </tr>                 
            </tbody>
          </table>
        </div>
        <?php } //end else ?>
      </div>
    </div>