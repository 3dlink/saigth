
<!--View Open-->
      <article class="card shadow-1">
        <fieldset>
            <legend>Usuario<?php echo ': '; if (!empty($user)) { echo '<small>'.$user['UserGroup']['name'].'</small>'; }?></legend>
            <div class="margenesHorizontales">
            	<div>
					<div class="col-md-6">
            			<div class="form-group">
			                <label>Entidad:</label>
			                <?php echo h($user['Entity']['nombre'])?>
						</div>
            		</div>
            		<div class="col-md-6">
            			<div class="form-group">
							<label>Correo Electrónico: </label>
			                <?php echo h($user['User']['email'])?>
						</div>
            		</div>
            		<div style="clear:both;"></div>
            	</div>
				<div>
					<div class="col-md-6">
            			<div class="form-group">
							<label>Tipo:</label>
			                <?php echo h($user['UserGroup']['name'])?>
			                </select>
						</div>
            		</div>
            		<div class="col-md-6">
            			<div class="form-group">
							<label>Cédula: </label>
			                <?php echo h($user['User']['cedula'])?>
						</div>
            		</div>
            		<div style="clear:both;"></div>
            	</div>
            	<div>
            		<div class="col-md-6">
            			<div class="form-group">
			                <label>Nombre:</label>
			                <?php echo h($user['User']['first_name'])?>
						</div>
            		</div>
            		<div class="col-md-6">
            			<div class="form-group">
							<label>Apellido:</label>
			                <?php echo h($user['User']['last_name'])?>
						</div>
            		</div>
            		<div style="clear:both;"></div>
            	</div>            	
            	<div>            		
            		<div class="col-md-6">
            			<div class="form-group">
							<label>Local:</label>
			                <?php echo h($user['User']['phone'])?>
						</div>
            		</div>
            		<div class="col-md-6">
            			<div class="form-group">
			                <label>Móvil:</label>
			                <?php echo h($user['User']['movil'])?>
						</div>
            		</div>
            		<div style="clear:both;"></div>
            	</div>
            	<div>
            		
            		<div class="col-md-6">
            			<div class="form-group">
							<label>Cargo:</label>
			                <?php echo h($user['User']['email'])?>
						</div>
            		</div>
            		<div style="clear:both;"></div>
            	</div>
            	<div>
            		<div class="col-md-6">
            			<div class="form-group">
							<label>
								¿Autorizado a Declarar Desastre?
							</label>
							<b><?php if($user['User']['autorizado']){echo 'Si';}else{echo 'No';} ?></b>
						</div>
            		</div>
            		<div class="col-md-6">
            			<div class="form-group">
							<label>
								Agregado:
							</label>
							<?php echo date('d-M-Y',strtotime($user['User']['created'])); ?>
						</div>
            		</div>
            		<div style="clear:both;"></div>
            	</div>
				<!-- <div class="margenesVerticales" style="text-align:right;">
					<button class="btn btn-primary">
						Guardar
					</button>
				</div> -->
				<div class="margenesVerticales" style="text-align:right;">
        			<input type = "button" class="btn btn-primary" onclick="window.location.href = WEBROOT+'allUsers';" title="regresar" value = "Atr&aacute;s" style="width: 79px;">
        		</div>  
			</div>          
          </fieldset>  
      </article>
<!--view Close-->
