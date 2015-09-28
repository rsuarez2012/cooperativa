 <div class="row-fluid">
    
    <div class="span12">
      
      <div class="widget">
        <div class="wTitle">
         <h4>Trabajos Realizados: [ <?php echo $maquinaria['Maquinaria']['info']?> ] - Desde: <?php echo $this->Time->format($desde, '%d-%m-%Y');$desde; ?> Hasta: <?php echo $this->Time->format($hasta, '%d-%m-%Y');; ?></h4>

         <ul class="nav nav-tabs pull-right" id="dashboard-demo">
            <li><a href="<?php echo '../maquinariasTrabajos/pdfTrabajos';?>/<?php echo $desde ?>/<?php echo $hasta?>"><i class="icon icon-print"></i></a></li>
          </ul>
        </div>
        <?php if(empty($trabajos)) {  ?>
          <h4>&nbsp;&nbsp;&nbsp;&nbsp;No hay trabajos realizados!!</h4>
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
                foreach($trabajos as $trabajo) {  ?>
                 <tr>                   
                    <td><?php echo $this->Time->format($trabajo['MaquinariasTrabajo']['fecha'], '%d-%m-%Y'); ?></td>
                    <td><?php echo $trabajo['Tabulador']['unidad']; ?></td>
                    <td><?php echo $trabajo['MaquinariasTrabajo']['cantidad']; ?></td>
                    <td><?php echo number_format($trabajo['MaquinariasTrabajo']['costo'],2,',','.'); ?></td>
                 </tr>
              <?php 
                  $total += $trabajo['MaquinariasTrabajo']['costo'];
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
      </div>
    </div>
