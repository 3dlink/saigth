<article class="card shadow-1">
  <fieldset>
      <legend>Personal Propio<?php echo ': '; if (!empty($personalpropio)) { echo '<small>'.$personalpropio['Personalpropio']['nombre'].'</small>'; }?></legend>
      <div class="margenesHorizontales">
      	<div>

      		<div class="col-md-6">
      			<div class="form-group">
							<label>Cédula: </label>
			                <?php echo h($personalpropio['Personalpropio']['cedula'])?>
						</div>
      		</div>
      		
      		<div class="col-md-6">
      			<div class="form-group">
							<label>Sexo: </label>
			                <?php echo h($personalpropio['Personalpropio']['sexo'])?>
						</div>
      		</div>

      		<div class="col-md-6">
      			<div class="form-group">
							<label>Edad: </label>
			                <?php echo h($personalpropio['Personalpropio']['edad'])?>
						</div>
      		</div>

      		<div class="col-md-6">
      			<div class="form-group">
							<label>Contrato: </label>
			                <?php echo h($personalpropio['Personalpropio']['contrato'])?>
						</div>
      		</div>

      		<div class="col-md-6">
      			<div class="form-group">
							<label>Salario: </label>
			                <?php echo h($personalpropio['Personalpropio']['salario'])?>
						</div>
      		</div>

      		<div class="col-md-6">
      			<div class="form-group">
							<label>Nómina: </label>
			                <?php echo h($personalpropio['Personalpropio']['nomina'])?>
						</div>
      		</div>

      		<div class="col-md-6">
      			<div class="form-group">
							<label>Horario: </label>
			                <?php echo h($personalpropio['Personalpropio']['horario'])?>
						</div>
      		</div>

      		<div class="col-md-6">
      			<div class="form-group">
							<label>Gerencia: </label>
			                <?php echo h($personalpropio['Personalpropio']['gerencia'])?>
						</div>
      		</div>

      		<div class="col-md-6">
      			<div class="form-group">
							<label>Departamento: </label>
			                <?php echo h($personalpropio['Personalpropio']['superintendencia'])?>
						</div>
      		</div>

      		<div class="col-md-6">
      			<div class="form-group">
							<label>Fecha Ingreso: </label>
			                <?php echo h($personalpropio['Personalpropio']['fecha_ingreso'])?>
						</div>
      		</div>

      		<!-- <div class="col-md-6">
      			<div class="form-group">
							<label>Posición actual: </label>
			                <?php echo h($personalpropio['Personalpropio']['posicion_actual'])?>
						</div>
      		</div> -->

      		<div class="col-md-6">
      			<div class="form-group">
							<label>Fecha Ingreso Puesto: </label>
			                <?php echo h($personalpropio['Personalpropio']['fecha_ingreso_puesto'])?>
						</div>
      		</div>

      		<div class="col-md-6">
      			<div class="form-group">
							<label>Experiencia: </label>
			                <?php echo h($personalpropio['Personalpropio']['experiencia'])?>
						</div>
      		</div>

      		<div class="col-md-6">
      			<div class="form-group">
							<label>Cargo: </label>
			                <?php echo h($personalpropio['Cargo']['nombre'])?>
						</div>
      		</div>

                  <div class="col-md-6">
                        <div class="form-group">
                                          <label>Nivel Académico: </label>
                                  <?php echo h($personalpropio['Personalpropio']['nivel_educativo'])?>
                                    </div>
                  </div>


      		<div class="margenesVerticales" style="text-align:right;">
	                <input type = "button" class="btn btn-primary" onclick="window.location.href = WEBROOT+'personalPropios';" title="regresar" value = "Atr&aacute;s" style="width: 79px;"> 	  
				</div>
      	</div>    
</div>          
    </fieldset>  
</article>

