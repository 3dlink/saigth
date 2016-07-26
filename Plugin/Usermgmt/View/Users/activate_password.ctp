
<!--Forgot Open-->
<article class="card shadow-1 login">
 <fieldset>
    <legend>Recuperar contraseña</legend>
    <?php echo $this->Form->create('User', array('action' => 'activatePassword')); ?>
      <div class="margenesHorizontales">
        <div class="form-group">
          <label>Contraseña</label><?php echo $this->Form->input("password" ,array('label' => false,'div' => false,'class'=>"form-control","type"=>"password", "placeholder"=>"Introduzca su contraseña" ))?>
        </div>
        <div class="form-group">
          <label>Confirme Contraseña</label><?php echo $this->Form->input("cpassword" ,array('label' => false,'div' => false,'class'=>"form-control","type"=>"password", "placeholder"=>"Confirme su contraseña" ))?>
        </div>
      </div>              
      <hr>
      <div class="margenesHorizontales margenesVerticales" style="text-align:right;">
      <?php   if (!isset($ident)) {
							$ident='';
						}
						if (!isset($activate)) {
							$activate='';
						}   ?>
						<?php echo $this->Form->hidden('ident',array('value'=>$ident))?>
						<?php echo $this->Form->hidden('activate',array('value'=>$activate))?>
        <button type="submit" class="btn btn-primary">
          Enviar
        </button>
      </div>
    <?php echo $this->Form->end(); ?>         
  </fieldset>
</article>
  <!--Forgot  Close-->