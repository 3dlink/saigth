<div class="cargos index">
 <!--List  Open-->
      <article class="card shadow-1">
          <fieldset>
            <legend>Cargos</legend>
            <!--Search Open-->
            <div class="margenesHorizontales">
              <div class="col-md-6">
                <div class=" margenesVerticales">
	              	<form class="right" role="search" method="get">
	                 <div class="input-group">
	                    <input type="text" class="form-control" placeholder="Buscar cargo..." name="filtro">
	                    <span class="input-group-btn">
	                      <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
	                    </span>
	                  </div>  
									</form>            
                </div>
              </div>
              <?php if($this->UserAuth->getGroupId() == 1){ ?>
              <div class="col-md-6">
                <div class=" margenesVerticales" style="text-align: right;">
                  <buttom onclick="window.location.href=WEBROOT+'cargos/add';" class="btn btn-primary">Agregar</buttom>
                </div>
              </div>
              <div style="clear:both;"></div>
            </div>
            <?php } ?>
            <!--Search Close-->
            <div class="margenesHorizontales">
              <table class="table table-striped">
                <tr>
                  <th>Nombre</th>
                  <th></th>
                </th>

                <?php foreach ($cargos as $cargo): ?>
									<tr>
										<td><?php echo h($cargo['Cargo']['nombre']); ?>&nbsp;</td>
	                  <td>
	                    <div style="display: block; width: 80px; margin: 0 auto;">
                        <?php if($this->UserAuth->getGroupId() == 1){ ?>
  	                      <a href="<?php echo $this->webroot;?>cargos/edit/<?php echo $cargo['Cargo']['id'];?>" title="Editar cargo" class="menuTable">
  	                        <span class="glyphicon glyphicon-pencil"></span>
  	                      </a>
  	                      <a href="<?php echo $this->webroot;?>cargos/delete/<?php echo $cargo['Cargo']['id'];?>" onclick="if (confirm(&quot;¿Seguro que desea borrar el cargo?&quot;)) { return true; } return false;" class="menuTable">
  	                        <span class="glyphicon glyphicon-remove"></span></a>
                        <?php } ?>
	                      <a href="<?php echo $this->webroot;?>cargos/view/<?php echo $cargo['Cargo']['id'];?>" title="Ver cargo" class="menuTable">
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
<?php echo $this->Paginator->counter(array('format' => __('Página {:page} de {:pages}, mostrando {:current} cargos de {:count} en total.')));?>
</p>
<ul class="pagination">
<?php
  echo $this->Paginator->prev('&laquo;', array('tag' => 'li', 'escape' => false), '<a href="#">&laquo;</a>', array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false));
  echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentLink' => true, 'currentClass' => 'active', 'currentTag' => 'a'));
  echo $this->Paginator->next('&raquo;', array('tag' => 'li', 'escape' => false), '<a href="#">&raquo;</a>', array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false));
?>
</ul>

</div>	