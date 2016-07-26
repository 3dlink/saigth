<div class="personalPropios index">
 <!--List  Open-->
      <article class="card shadow-1">
          <fieldset>
            <legend>Personal Propio</legend>
            <!--Search Open-->
            <div class="margenesHorizontales">
              <div class="col-md-6">
                <div class=" margenesVerticales">
	              	<form class="right" role="search" method="get">
	                 <div class="input-group">
	                    <input type="text" class="form-control" placeholder="Buscar personal por cédula..." name="filtro">
	                    <span class="input-group-btn">
	                      <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
	                    </span>
	                  </div>  
									</form>            
                </div>
              </div>
              <div class="col-md-6">
                <div class=" margenesVerticales" style="text-align: right;">
                  <!-- <buttom onclick="window.location.href=WEBROOT+'personalPropios/add';" class="btn btn-primary">Agregar</buttom> -->
                </div>
              </div>
              <div style="clear:both;"></div>
            </div>
            <?php //debug($personalpropios) ?>
            <!--Search Close-->
            <div class="margenesHorizontales">
              <table class="table table-striped">
                <tr>
                  <th>Cédula</th>
                  <th>Nombre</th>
                  <th>Cargo</th>
                  <th></th>
                </th>

                <?php foreach ($personalpropios as $personalpropio): ?>
									<tr>
										<td><?php echo h($personalpropio['Personalpropio']['cedula']); ?>&nbsp;</td>
										<td><?php echo h($personalpropio['Personalpropio']['nombre']); ?>&nbsp;</td>
										<td><?php echo h($personalpropio['Cargo']['nombre']); ?>&nbsp;</td>
	                  <td>
	                    <div style="display: block; width: 80px; margin: 0 auto;">
	                      <a href="<?php echo $this->webroot;?>personalPropios/edit/<?php echo $personalpropio['Personalpropio']['id'];?>" title="Editar personal" class="menuTable">
	                        <span class="glyphicon glyphicon-pencil"></span>
	                      </a>
	                      <!-- <a href="<?php echo $this->webroot;?>personalPropios/delete/<?php echo $personalpropio['Personalpropio']['id'];?>" onclick="if (confirm(&quot;¿Seguro que desea borrar el personal?&quot;)) { return true; } return false;" class="menuTable">
	                        <span class="glyphicon glyphicon-remove"></span></a> -->
	                      <a href="<?php echo $this->webroot;?>personalPropios/view/<?php echo $personalpropio['Personalpropio']['id'];?>" title="Ver personal" class="menuTable">
	                        <span class="glyphicon glyphicon-eye-open"></span>
	                      </a>
	                    </div>                  
	                  </td>
									</tr>
								<?php endforeach; ?>
              </table>
            </div> 
          </fieldset>          
      </article>
<p>
<?php echo $this->Paginator->counter(array('format' => __('Página {:page} de {:pages}, mostrando {:current} personas de {:count} en total.')));?>
</p>
<ul class="pagination">
<?php
  echo $this->Paginator->prev('&laquo;', array('tag' => 'li', 'escape' => false), '<a href="#">&laquo;</a>', array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false));
  echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentLink' => true, 'currentClass' => 'active', 'currentTag' => 'a'));
  echo $this->Paginator->next('&raquo;', array('tag' => 'li', 'escape' => false), '<a href="#">&raquo;</a>', array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false));
?>
</ul>

</div>	