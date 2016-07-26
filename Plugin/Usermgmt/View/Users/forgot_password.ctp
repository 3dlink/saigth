<!--Forgot Open-->
<article class="card shadow-1 login">
 <fieldset>
    <legend>Recuperar contraseña</legend>
    <?php echo $this->Form->create('User', array('action' => 'forgotPassword')); ?>
      <div class="margenesHorizontales">
        <div class="form-group">
          <label>Correo electrónico</label>          <?php echo $this->Form->input("email" ,array('label' => false,'div' => false,'class'=>"form-control","type"=>"text","id"=>"entity_name", "placeholder"=>"Introduzca su correo eléctronico" ))?>
        </div>
      </div>              
      <hr>
      <div class="margenesHorizontales margenesVerticales" style="text-align:right;">
        <button type="submit" class="btn btn-primary">
          Recuperar contraseña
        </button>
      </div>
    <?php echo $this->Form->end(); ?>         
  </fieldset>
</article>
  <!--Forgot  Close-->