<div class="cargos index">
 <!--List  Open-->
      <article class="card shadow-1">
          <fieldset>
            <legend>Aprobar Cursos</legend>
            <!--Search Open-->
            <div class="margenesHorizontales">
              <div class="col-md-6">
                <div class=" margenesVerticales">
	              	<form class="right" role="search" method="get">
	                 <div class="input-group">
	                    <input type="text" class="form-control" placeholder="Buscar trabajador por cédula..." name="filtro" value="<?php if(isset($persona['Personalpropio']['cedula'])) echo $persona['Personalpropio']['cedula']; ?>">
	                    <span class="input-group-btn">
	                      <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
	                    </span>
	                  </div>  
									</form>            
                </div>
              </div>
              <div style="clear:both;"></div>
            </div>
            <?php //debug($cargos) ?>
            <!--Search Close-->
            <div class="margenesHorizontales">
                <?php if(!empty($cursos)){ ?>
              <table class="table table-striped">
                <tr>
                  <th>Nombre</th>
                  <th>Curso</th>
                  <th>Área</th>
                  <th>Aprobar</th>
                </th>


                <?php foreach ($cursos as $curso): ?>
                  <tr id="curso_<?php echo $curso['id']; ?>">
                    <td><?php echo $curso['nombre']; ?>&nbsp;</td>
                    <td><?php echo $curso['curso']; ?>&nbsp;</td>
                    <td><?php echo $curso['area']; ?>&nbsp;</td>
                    <td><?php echo "<a class='btn_check' title='Activar centro de datos' data-toggle='modal' data-target='#modalaprobar' class='menuTable' curso_id='".$curso['id']."'><span class='glyphicon glyphicon-ok' style='cursor:pointer;'></span></a>";?>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </table>
                <?php } ?>
            </div> 
          </fieldset>          
      </article>
</div>	


<div class="modal fade" id="modalaprobar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Completar</h4>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Fecha de Finalización:</label>
            <input type="text" class="form-control" id="ffin">
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Horas:</label>
            <select id="horas" class="form-control">
              <option value="">Seleccione una hora</option>
              <option value="8">8</option>
              <option value="16">16</option>
              <option value="24">24</option>
              <option value="32">32</option>
              <option value="40">40</option>
            </select>
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Entidad educativa:</label>
            <input type="text" class="form-control" id="entidad">
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Localidad:</label>
            <input type="text" class="form-control" id="localidad">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" id="btn_aprobar" class="btn btn-primary">Aprobar</button>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
  $(function () {
      $('#ffin').datetimepicker({
        format:'DD-MM-YYYY',
          locale: 'es',
          showTodayButton:true
      });
  });

  var curso_id = 0;

  $('.btn_check').click(function() {
    curso_id = $(this).attr('curso_id');
  });

  $('#btn_aprobar').click(function() {
    var ffin = $('#ffin').val();
    var horas = $('#horas').val();
    var entidad = $('#entidad').val();
    var localidad = $('#localidad').val();

    if(ffin == '' || entidad ==  '' || localidad == '' || horas == ''){
      alert('Debe ingresar todos los datos');
    }else{
      var data=new Object();
      data['id'] = curso_id;
      data['fecha_fin'] = ffin;
      data['horas'] = horas;
      data['entidad'] = entidad;
      data['locacion'] = localidad;

      $.post(WEBROOT+'desarrollo/aprobar_curso',{data:data},function(data){
        if(data){
          $('#curso_'+curso_id).remove();
          $('#modalaprobar').modal('toggle');
          $('#ffin').val('');
          $('#horas').val('');
          $('#entidad').val('');
          $('#localidad').val('');
        }
      },'json');
    }

  });



</script>