<?php $meses = array('1' => 'Enero', '2' => 'Febrero', '3' => 'Marzo', '4' => 'Abril', '5' => 'Mayo', '6' => 'Junio', '7' => 'Julio', '8' => 'Agosto', '9' => 'Septiembre', '10' => 'Octubre', '11' => 'Noviembre', '12' => 'Diciembre');
  //obtenemos el anio de la nomina
  //$anio = explode('-', $nomina[0]['Nomina']['fecha']);
  $quince = array('1' => 'Primera Quincena', '2' => 'Segunda Quincena');
  
 ?>

<h2>Trabajos Camiones</h2>
Desde: <?php echo $this->Time->format($desde, '%d-%m-%Y');$desde; ?> Hasta: <?php echo $this->Time->format($hasta, '%d-%m-%Y');; ?>
<?php //if(empty($trabajos)) {  ?>
    <!--<h4>&nbsp;&nbsp;&nbsp;&nbsp;No hay trabajos realizados!!</h4>-->
    <?php //} else { ?>
    <div class="wContent" align="center">
    <?php echo $this->Session->flash('success'); ?>
    <?php echo $this->Session->flash('error'); ?>
      <table cellpading="0" cellspacing="0" border="0" class="dTable" id="tab">
        <thead>
          <tr>
            <th>Fecha</th>
            <th>Tabulador</th>
            <th>Distancia (Km.)</th>
            <th>Costo (Bs.)</th>
          </tr>
        </thead>
        <tbody align="center">
          <tr class="active">
          <?php 
            $totalC = 0;
            foreach($trabajos as $trabajo) {  ?>
            <tr>                   
              <td><?php echo $this->Time->format($trabajo['CamionesTrabajo']['fecha'], '%d-%m-%Y'); ?></td>
              <td><?php echo $trabajo['CamionesTabulador']['unidad']; ?></td>
              <td><?php echo $trabajo['CamionesTrabajo']['distancia']; ?></td>
              <td><?php echo $trabajo['CamionesTrabajo']['costo']; ?></td>
            </tr>
            <?php 
                $totalC += $trabajo['CamionesTrabajo']['costo'];
            } ?>                       
            </tr>   
            <tr>
              <th colspan="3">Total (Bs.)</th>
              <th><?php echo number_format($totalC,2,',','.'); ?></th>
            </tr>                   
        </tbody>
      </table>
    </div>
<?php //}; //end else ?>
<hr>
<h2>Trabajos de Maquinarias</h2>
Desde: <?php echo $this->Time->format($desde, '%d-%m-%Y');$desde; ?> Hasta: <?php echo $this->Time->format($hasta, '%d-%m-%Y');; ?>


<table cellpading="0" cellspacing="0" border="0" class="dTable" id="tab">
            <thead>
              <tr>                
                <th>Fecha</th>
                <th>Cantidad</th>
                <th>Tabulador</th>
                <th>Costo (Bs.)</th>
              </tr>
            </thead>
            <tbody align="center">
              <tr class="active">
              <?php 
                $totalM = 0;
                foreach($maquinarias as $maquina) {  ?>
                 <tr>                   
                    <td><?php echo $this->Time->format($maquina['MaquinariasTrabajo']['fecha'], '%d-%m-%Y'); ?></td>
                    <td><?php echo $maquina['MaquinariasTrabajo']['cantidad']; ?></td>
                    <td><?php echo $maquina['Tabulador']['costo'] ?></td>
                    <td><?php echo $maquina['MaquinariasTrabajo']['costo']; ?></td>
                    
                 </tr>
              <?php 
                  $totalM += $maquina['MaquinariasTrabajo']['costo'];
              } ?>                       
              </tr>   
              <tr>
                <th colspan="3">Total (Bs.)</th>
                <th><?php echo number_format($totalM,2,',','.'); ?></th>
              </tr>                   
            </tbody>
          </table>
          <hr>
<h2>Empleados</h2>
Desde: <?php echo $this->Time->format($desde, '%d-%m-%Y');$desde; ?> Hasta: <?php echo $this->Time->format($hasta, '%d-%m-%Y');; ?>


<table cellpading="0" cellspacing="0" border="0" class="dTable" id="tab">
            <thead>
              <tr>                
                <th>Fecha</th>
                <th>Mes</th>
                <th>Quincena</th>
                <th>Sueldo(Bs.)</th>
              </tr>
            </thead>
            <tbody align="center">
              <tr class="active">
              <?php 
                $totalE = 0;
                foreach($nominas as $nomina) {  ?>
                 <tr>                   
                    <td><?php echo $this->Time->format($nomina['Nomina']['fecha'], '%d-%m-%Y'); ?></td>
                    <td><?php echo $meses[$nomina['Nomina']['mes']]; ?></td>
                    <td><?php echo $quince[$nomina['Nomina']['quincena']];?></td>
                    <td><?php echo number_format($nomina['Nomina']['sueldo'],2,',','.'); ?></td>
                    
                 </tr>
              <?php 
                  $totalE += $nomina['Nomina']['sueldo'];
              } ?>                       
              </tr>   
              <tr>
                <th colspan="3">Total (Bs.)</th>
                <th><?php echo number_format($totalE,2,',','.'); ?></th>
              </tr>                   
            </tbody>
          </table>
          <hr>

<table border="1">
  <tr>
    <th colspan="2"><h2>Total de Gastos</h2></th>
  </tr>
  <tr>
    <td><h4>Total de Gastos en Camiones (Bs.):</h4></td>
    <td><h4><?php echo number_format($totalC,2);?></h4></td>
  </tr>
  <tr>
    <td><h4>Total de Gastos en Maquinarias (Bs.):</h4></td>
    <td><h4><?php echo number_format($totalM,2);?></h4></td>
  </tr>
  <tr>
    <td><h4>Total de Gastos en Empleados (Bs.):</h4></td>
    <td><h4><?php echo number_format($totalE,2);?></h4></td>
  </tr>
  <tr>
    <th><h3>Total General de Gastos Durante la Obra:</h3></th>
    <th><h3><?php echo number_format($totalC + $totalM + $totalE,2);?></h3></th>
  </tr>
</table>
<hr>

<a href="<?php echo '../somos/pdfTrabajos';?>/<?php echo $desde ?>/<?php echo $hasta ?>"><button class="btn btn-primary"><i class="icon icon-print"></i>IMPRIMIR</button></a>