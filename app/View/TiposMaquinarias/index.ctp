 <div class="row-fluid">
    
    <div class="span12">
      
      <div class="widget">
        <div class="wTitle">
          <h5><?php echo strtoupper(Inflector::humanize(Inflector::underscore($this->params['controller']))); ?></h5>
          <ul class="nav nav-tabs pull-right" id="dashboard-demo">
            <li><a href="#" id="add"><i class="icon icon-plus"></i></a></li>
            <li><a href="#" id="edit"><i class="icon icon-pencil"></i></a></li>
            <li><a href="#" id="delete"><i class="icon icon-remove"></i></a></li>
          </ul>
        </div>

        <?php if(empty($tiposmaquinarias)) { ?>
          <h4>&nbsp;No hay registros!!</h4>
        <?php } else { ?>
        <div class="wContent" align="center">
        <?php echo $this->Session->flash('success'); ?>
        <?php echo $this->Session->flash('error'); ?>
          <table cellpading="0" cellspacing="0" border="0" class="dTable" id="tab">
            <thead>
              <tr>
                <th class="checkboxes"></th>
                <th>Nombre</th>
                <th>Descripción</th>
              </tr>
            </thead>
            <tbody align="center">
              <tr class="active">
              <?php foreach($tiposmaquinarias as $tipomaquinaria) { ?>
                 <tr>
                    <td class="checkboxes"><input type="checkbox" name="checkbox" id="row" value="<?php echo $tipomaquinaria['TiposMaquinaria']['id']; ?>"></td>
                    <td><?php echo $tipomaquinaria['TiposMaquinaria']['nombre']; ?></td>
                    <td><?php echo $tipomaquinaria['TiposMaquinaria']['descripcion']; ?></td>
                 </tr>
              <?php } ?>                       
              </tr>                      
            </tbody>
          </table>
        </div>
        <?php } //end else ?>
      </div>
    </div>
<div id="nuevo-dialog"></div>
<div id="messages"></div>
<div id="confirmacion"></div>
