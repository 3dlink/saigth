<style type="text/css">
#exportar{
  float: right;
  margin-top: -64px;
  margin-right: 10px;
}
</style>

<div class="cargos index">
 <!--List  Open-->
      <article class="card shadow-1">
          <fieldset>
            <legend>Plan de Formación</legend>
             <buttom onclick="window.location.href=WEBROOT+'desarrollo/exportar';" id="exportar" class="btn btn-primary">Exportar a Excel</buttom>
            <!--Search Open-->
            <div class="margenesHorizontales">
              <div style="clear:both;"></div>
            </div>
            <?php //debug($cargos) ?>
            <!--Search Close-->
            <div class="margenesHorizontales">
              <table class="table table-striped">
                <tr>
                  <th>Trabajador</th>
                  <th>Cargo</th>
                  <th>Organización</th>
                  <th>Curso</th>
                  <th>Área</th>
                  <th>Horas</th>
                </th>

                <?php foreach ($reporte as $persona): ?>
                  <tr>
                    <td><?php echo h($persona['trabajador']); ?>&nbsp;</td>
                    <td><?php echo h($persona['cargo_actual']); ?>&nbsp;</td>
                    <td><?php echo h($persona['organizacion']); ?>&nbsp;</td>
                    <td><?php echo h($persona['curso']); ?>&nbsp;</td>
                    <td><?php echo h($persona['area']); ?>&nbsp;</td>
                    <td><?php echo h($persona['horas']); ?>&nbsp;</td>
                  </tr>
                <?php endforeach; ?>
              </table>
            </div> 
          </fieldset>          
      </article>

</div>  