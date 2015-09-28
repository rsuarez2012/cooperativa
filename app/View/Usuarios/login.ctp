<?php echo $this->Form->create('Usuario', array( 'id' => 'loginForm', 'controller' => 'usuarios', 'action' => 'login')); ?>


 <div class="loginWrap">

<h4><img src="../img/app.png" alt="" width="30"> Sistema Administrativo Cooperativa</h4>
  <div class="loginContainer">
    <div class="loginHeader">
      <h5><img src="../img/icons/14x14/lock3.png" alt=""> Control de Usuarios</h5>
    </div>
    <?php echo $this->Session->flash('error'); ?>
        <div class="inputField">
         <?php echo $this->Form->input('usuario', array('name' => 'usuario', 'label' => false, 'id' => 'usuario', 'placeholder'=>'Usuario','autocomplete' => 'off', 'required' => true)); ?>
          <img src="../img/icons/14x14/member2.png" alt="">
        </div>
     
        <div class="inputField">
          <?php echo $this->Form->input('clave', array('name' => 'clave', 'type' => 'password', 'label' => false, 'id' => 'clave', 'placeholder'=>'Clave','autocomplete' => 'off', 'required' => true));?>
          <img src="../img/icons/14x14/lock3.png" alt="">
        </div>
        <?php echo $this->Form->submit('Iniciar',array('class'=>'button sButton blockButton bOlive'));?>
		<?php echo $this->Form->end(); ?>
  </div>
</div>
