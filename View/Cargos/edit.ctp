<article class="card shadow-1">
<?php echo $this->Form->create('Cargo'); ?>
	<?php
		echo $this->Form->input('id');
		$Cargo = $this->data;
	?>
    <fieldset>
      <legend>Editar Cargo</legend>
      <div class="margenesHorizontales">

				<div class="col-md-6">
	        <div class="form-group">
	          <label>Nombre</label>
	          <?php echo $this->Form->input('nombre',array('div'=>false, 'required'=>true, 'label'=>false,'class'=>'form-control','placeholder'=>'Nombre')); ?>
	        </div>
	      </div>

				<div class="col-md-6">
	        <div class="form-group">
	          <label>Nivel académico</label>
	          <?php echo $this->Form->input('nivel_academico',array('div'=>false, 'required'=>true,'label'=>false,'class'=>'form-control','placeholder'=>'Nivel académico')); ?>
	        </div>
				</div>


				<div class="col-md-6">
	        <div class="form-group">
	          <label>Años de experiencia</label>
	          <?php echo $this->Form->input('anhos_experiencia',array('div'=>false, 'required'=>true,'label'=>false,'class'=>'form-control','placeholder'=>'Años de experiencia')); ?>
	        </div>
	      </div>


				<div class="col-md-6">
	        <div class="form-group">
	          <label>Nivel de inglés</label>
	          <?php echo $this->Form->input('nivel_ingles',array('div'=>false, 'required'=>true,'label'=>false,'class'=>'form-control','placeholder'=>'Nivel de inglés')); ?>
	        </div>
        </div>


				<div class="col-md-12">
	        <div class="form-group">
	          <label>Conocimientos, Habilidades y Destrezas</label>
	          <?php echo $this->Form->input('conocimientos',array('div'=>false, 'required'=>true,'label'=>false,'class'=>'form-control','type'=>'textarea')); ?>
	        </div>
	      </div>
        <div class="margenesVerticales" style="text-align:right;">
          <input type = "button" class="btn btn-primary" onclick="window.location.href = WEBROOT+'cargos';" title="regresar" value = "Atr&aacute;s" style="width: 79px;">
          <button type="submit" class="btn btn-primary">
            Guardar
          </button>
        </div>
      </div>          
    </fieldset>  
</article>