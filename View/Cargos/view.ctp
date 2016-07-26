
<article class="card shadow-1">
  <fieldset>
      <legend>Cargo<?php echo ': '; if (!empty($cargo)) { echo '<small>'.$cargo['Cargo']['nombre'].'</small>'; }?></legend>
      <div class="margenesHorizontales">
      	<div>
      		<div class="col-md-6">
      			<div class="form-group">
				<label>Nombre: </label>
                <?php echo h($cargo['Cargo']['nombre'])?>
			</div>
      		</div>
      		<div class="col-md-6">
      			<div class="form-group">
				<label>Nivel académico:</label>
                <?php echo h($cargo['Cargo']['nivel_academico'])?>
                </select>
			</div>
      		</div>
      		<div style="clear:both;"></div>
      	</div>           	
      	<div>
      		<div class="col-md-6">
      			<div class="form-group">
                <label>Años de experiencia:</label>
                <?php echo h($cargo['Cargo']['anhos_experiencia'])?>
			</div>
      		</div>
      		<div class="col-md-6">
      			<div class="form-group">
				<label>Nivel de inglés:</label>
                <?php echo h($cargo['Cargo']['nivel_ingles'])?>
			</div>
      		</div>
      		<div style="clear:both;"></div>
      	</div>    	
      	<div>
      		<div class="col-md-12">
      			<div class="form-group">
                <label>Conocimientos, Habilidades y Destrezas:</label>
                <p><?php echo nl2br($cargo['Cargo']['conocimientos'])?></p>
                
			</div>
      		</div>
      		<div class="margenesVerticales" style="text-align:right;">
	                <input type = "button" class="btn btn-primary" onclick="window.location.href = WEBROOT+'cargos';" title="regresar" value = "Atr&aacute;s" style="width: 79px;"> 	  
				</div>
      	</div>    
</div>          
    </fieldset>  
</article>

