<!--Login Open-->
<article class="card shadow-1 login">
 <fieldset>
    <legend>Iniciar sesión</legend>
    <?php echo $this->Form->create('User', array('action' => 'login')); ?>
      <div class="margenesHorizontales">
        <div class="form-group">
          <label>Usuario</label>
          <?php echo $this->Form->input("email" ,array('type'=> 'text', 'label' => false,'div'=>false, 'class' => 'form-control', 'placeholder' => "Usuario"))?>
        </div>
        <div class="form-group">
          <label>Contraseña</label>
          <?php echo $this->Form->input("password" ,array("type"=>"password",'label' => false,'div'=>false,'class'=>"form-control", 'placeholder' => "Contraseña" ))?>
        </div>
        <div class="form-group">
          <a href="<?php echo $this->webroot.'forgotPassword';?>">Olvidé mi contraseña</a>
        </div>
      </div>              
      <hr>
      <div class="margenesHorizontales margenesVerticales" style="text-align:right;">
        <button type="Submit" class="btn btn-primary">
          Ingresar
        </button>
      </div>
    <?php echo $this->Form->end();?>           
  </fieldset>
</article>
<!--Login  Close-->
