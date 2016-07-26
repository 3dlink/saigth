
<?php echo $this->Html->script(array('pekeUpload')); ?>

<article class="card shadow-1">
    <fieldset>
      <legend>Actualizar Personal Propio</legend>
      <div class="margenesHorizontales">
        <div class="form-group">
          <label>Subir listado (archivo excel generado por Sap)</label>
            <div><input type="file" class="loco" id="file9" name="file9" accept=".xlsm" data-img="" data-index="" /></div>
          <label id="mensaje_archivo"></label>
          </div
        </div>
        <div class="margenesVerticales" style="text-align:right;">
          <button id="guardar_archivo" class="btn btn-primary">
            Guardar
          </button>
        </div>
      </div>          
    </fieldset>  
</article>



<script type="text/javascript">

  $(document).ready(function(){
  
    var toPend = "";
    $("#file9").pekeUpload({theme:'bootstrap', btnText:'Buscar', allowedExtensions:"xlsm|xlsx", multi:false, url:"<?php echo $this->webroot?>motor/upload"});

  });

  $('#guardar_archivo').click(function(){
    window.location.replace(WEBROOT+'motor/index/1');
  });
</script>