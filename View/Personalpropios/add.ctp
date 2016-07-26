<article class="card shadow-1">
<?php echo $this->Form->create('Personalpropio'); ?>
    <fieldset>
      <legend>Agregar Personal Propio</legend>
      <div class="margenesHorizontales">

				<div class="col-md-4">
	        <div class="form-group">
	          <label>Cédula</label>
	          <?php echo $this->Form->input('cedula',array('div'=>false, 'required'=>true,'label'=>false,'class'=>'form-control','placeholder'=>'Cédula')); ?>
	        </div>
				</div>

				<div class="col-md-4">
	        <div class="form-group">
	          <label>Nombre</label>
	          <?php echo $this->Form->input('nombre',array('div'=>false, 'required'=>true, 'label'=>false,'class'=>'form-control','placeholder'=>'Nombre')); ?>
	        </div>
	      </div>

				<div class="col-md-4">
	        <div class="form-group">
	          <label>Edad</label>
	          <?php echo $this->Form->input('edad',array('div'=>false, 'required'=>true, 'label'=>false,'class'=>'form-control','placeholder'=>'Edad')); ?>
	        </div>
	      </div>

				<div class="col-md-6">
	        <div class="form-group">
	          <label>Sexo</label>
	          <?php echo $this->Form->input('sexo',array('div'=>false, 'required'=>true, 'label'=>false,'class'=>'form-control','placeholder'=>'Sexo')); ?>
	        </div>
	      </div>

				<div class="col-md-6">
	        <div class="form-group">
	          <label>Nivel académico</label>
	          <?php echo $this->Form->input('nivel_educativo',array('div'=>false, 'required'=>true, 'label'=>false,'class'=>'form-control','placeholder'=>'Nivel Académico')); ?>
	        </div>
	      </div>

				<div class="col-md-6">
	        <div class="form-group">
	          <label>Contrato</label>
	          <?php echo $this->Form->input('contrato',array('div'=>false, 'required'=>true, 'label'=>false,'class'=>'form-control','placeholder'=>'Contrato')); ?>
	        </div>
	      </div>

				<div class="col-md-6">
	        <div class="form-group">
	          <label>Salario</label>
	          <?php echo $this->Form->input('salario',array('div'=>false, 'required'=>true, 'label'=>false,'class'=>'form-control','placeholder'=>'Salario')); ?>
	        </div>
	      </div>

				<div class="col-md-6">
	        <div class="form-group">
	          <label>Nómina</label>
	          <?php echo $this->Form->input('nomina',array('div'=>false, 'required'=>true, 'label'=>false,'class'=>'form-control','placeholder'=>'Nómina')); ?>
	        </div>
	      </div>

				<div class="col-md-6">
	        <div class="form-group">
	          <label>Horario</label>
	          <?php echo $this->Form->input('horario',array('div'=>false, 'required'=>true, 'label'=>false,'class'=>'form-control','placeholder'=>'Horario')); ?>
	        </div>
	      </div>

				<div class="col-md-6">
	        <div class="form-group">
	          <label>Gerencia</label>
	          <?php echo $this->Form->input('gerencia',array('div'=>false, 'required'=>true, 'label'=>false,'class'=>'form-control','placeholder'=>'Gerencia')); ?>
	        </div>
	      </div>

				<div class="col-md-6">
	        <div class="form-group">
	          <label>Departamento</label>
	          <?php echo $this->Form->input('superintendencia',array('div'=>false, 'required'=>true, 'label'=>false,'class'=>'form-control','placeholder'=>'Departamento')); ?>
	        </div>
	      </div>

				<div class="col-md-6">
	        <div class="form-group">
	          <label>Fecha de Ingreso</label>
              <?php echo $this->Form->input('fecha_ingreso',array("div"=>false,"type"=>"text","label"=>false, "class"=>"form-control","id"=>"fingreso","placeholder"=>"Fecha ingreso", "required"=>true));?>
	        </div>
	      </div>

				<!-- <div class="col-md-6">
	        <div class="form-group">
	          <label>Posición Actual</label>
	          <?php echo $this->Form->input('posicion_actual',array('div'=>false, 'required'=>true, 'label'=>false,'class'=>'form-control','placeholder'=>'Posición Actual')); ?>
	        </div>
	      </div> -->

				<div class="col-md-6">
	        <div class="form-group">
	          <label>Fecha de Ingreso al puesto</label>
              <?php echo $this->Form->input('fecha_ingreso_puesto',array("div"=>false,"type"=>"text","label"=>false, "class"=>"form-control","id"=>"fingreso_puesto","placeholder"=>"Fecha ingreso al puesto", "required"=>true));?>
	        </div>
	      </div>

				<div class="col-md-6">
	        <div class="form-group">
	          <label>Experiencia</label>
	          <?php echo $this->Form->input('experiencia',array('div'=>false, 'required'=>true, 'label'=>false,'class'=>'form-control','placeholder'=>'Experiencia')); ?>
	        </div>
	      </div>

				<div class="col-md-6">
	        <div class="form-group">
	          <label>Cargo</label>
	          <?php echo $this->Form->input('cargo_id',array('div'=>false, 'required'=>true, 'label'=>false,'class'=>'form-control','placeholder'=>'Cargo')); ?>
	        </div>
	      </div>

        <div class="margenesVerticales" style="text-align:right;">
          <input type = "button" class="btn btn-primary" onclick="window.location.href = WEBROOT+'PersonalPropios';" title="regresar" value = "Atr&aacute;s" style="width: 79px;">
          <button type="submit" class="btn btn-primary">
            Guardar
          </button>
        </div>
      </div>          
    </fieldset>  
</article>

<script type="text/javascript">

$(document).ready(function($) {
      $('#fingreso').datetimepicker({
        format:'DD-MM-YYYY',
          locale: 'es',
          showTodayButton:true
      });
      $('#fingreso_puesto').datetimepicker({
        format:'DD-MM-YYYY',
          locale: 'es',
          showTodayButton:true,
          useCurrent: false //Important! See issue #1075
      });
});
</script>