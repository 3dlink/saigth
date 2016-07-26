<?php if(isset($this->data['Curso'])) $cursos = $this->data['Curso']; ?>
<style type="text/css">

#courses{
  width: 100%;
  float: left;
  margin-bottom: 50px;
}

.courses{
  width: 95%;
  float: left;
}
.btn_remove{
  width: 0%;
  margin-top: 24px;
  float: left;
}
.btn_add{
  margin-top: -65px;
  margin-right: 25px;
  float: right;
}
.hidden{
  display: block;
}
</style>


  <article class="card shadow-1">
    <fieldset>
      <legend><b>Detección de Necesidades de Formación (D.N.F.)</b></legend>
      <div class="margenesHorizontales">


      <legend>Información del Empleado</legend>
        <div class="col-md-12">
          <div class=" margenesVerticales">
            <form class="right" role="search" method="get">
             <div class="input-group">
            <label>Cédula de Identidad</label>
                <input type="text" class="form-control" placeholder="Introduzca cédula de identidad para buscar" name="filtro" value="<?php if(isset($this->data['Personalpropio']['cedula'])) echo $this->data['Personalpropio']['cedula']; ?>">
                <span class="input-group-btn">
                  <button class="btn btn-default" style="margin-top: 25px;" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                </span>
              </div>  
            </form>            
          </div>
        </div>


<?php echo $this->Form->create('Personalpropio'); ?>
        <div class="col-md-4">
          <div class="form-group">
            <label>Apellidos y Nombres</label>
            <?php echo $this->Form->input('nombre',array('div'=>false,'disabled'=>true, 'label'=>false,'class'=>'form-control','placeholder'=>'Nombre')); ?>
          </div>
        </div>


        <div class="col-md-4">
          <div class="form-group">
            <label>Edad</label>
            <?php echo $this->Form->input('edad',array('div'=>false,'disabled'=>true,'label'=>false,'class'=>'form-control','placeholder'=>'Edad')); ?>
          </div>
        </div>


        <div class="col-md-4">
          <div class="form-group">
            <label>Nivel académico</label>
            <?php echo $this->Form->input('nivel_educativo',array('div'=>false,'disabled'=>true,'label'=>false,'class'=>'form-control','placeholder'=>'Nivel académico')); ?>
          </div>
        </div>


        <div class="col-md-4">
          <div class="form-group">
            <label>Fecha de ingreso a la empresa</label>
              <?php echo $this->Form->input('fecha_ingreso',array("div"=>false,'disabled'=>true,"type"=>"text","label"=>false, "class"=>"form-control","id"=>"fingreso","placeholder"=>"Fecha ingreso", "required"=>true)); ?>
          </div>
        </div>


        <div class="col-md-4">
          <div class="form-group">
            <label>Fecha de ingreso al puesto</label>
              <?php echo $this->Form->input('fecha_ingreso_puesto',array("div"=>false,'disabled'=>true,"type"=>"text","label"=>false, "class"=>"form-control","id"=>"fingreso_p","placeholder"=>"Fecha ingreso puesto", "required"=>true)); ?>
          </div>
        </div>

        <div class="col-md-4">
          <div class="form-group">
            <label>Tipo de contrato</label>
            <?php echo $this->Form->input('contrato',array('div'=>false,'disabled'=>true,'label'=>false,'class'=>'form-control','placeholder'=>'Ingreso a la empresa')); ?>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label>Cargo actual</label>
            <?php if(empty($this->data)){ ?>
              <?php echo $this->Form->input('cargo',array('div'=>false,'disabled'=>true,'label'=>false,'class'=>'form-control','placeholder'=>'Cargo actual')); ?>
            <?php }else{ ?>
              <?php echo $this->Form->input('cargo',array('div'=>false,'disabled'=>true,'label'=>false,'class'=>'form-control','placeholder'=>'Cargo actual', 'value'=>$this->data['Cargo']['nombre'])); ?>
            <?php } ?>
          </div>
        </div>



        <div class="col-md-6">
          <div class="form-group">
            <label>Gerencia</label>
            <?php echo $this->Form->input('gerencia',array('div'=>false,'disabled'=>true,'label'=>false,'class'=>'form-control','placeholder'=>'Gerencia')); ?>
          </div>
        </div>


        <div class="col-md-6">
          <div class="form-group">
            <label>Departamento</label>
            <?php echo $this->Form->input('superintendencia',array('div'=>false,'disabled'=>true,'label'=>false,'class'=>'form-control','placeholder'=>'Departamento')); ?>
          </div>
        </div>



        <div class="col-md-6">
          <div class="form-group">
            <label>Experiencia</label>
            <?php echo $this->Form->input('experiencia',array('div'=>false,'disabled'=>true,'label'=>false,'class'=>'form-control','placeholder'=>'Experiencia')); ?>
          </div>
        </div>
      </div>          
    </fieldset> 
    <fieldset>
      <legend>Perfil del Cargo</legend>
      <div class="margenesHorizontales">

        <div class="col-md-4">
          <div class="form-group">
            <label>Nivel académico requerido</label>
            <?php if(empty($this->data)){ ?>
              <?php echo $this->Form->input('nivel_academico',array('div'=>false,'disabled'=>true, 'label'=>false,'class'=>'form-control','placeholder'=>'Nivel academico')); ?>
            <?php }else{ ?>
              <?php echo $this->Form->input('nivel_academico',array('div'=>false,'disabled'=>true, 'label'=>false,'class'=>'form-control','placeholder'=>'Nivel academico', 'value'=>$this->data['Cargo']['nivel_academico'])); ?>
            <?php } ?>
          </div>
        </div>


        <div class="col-md-4">
          <div class="form-group">
            <label>Años de experiencia</label>
            <?php if(empty($this->data)){ ?>
            <?php echo $this->Form->input('anhos_experiencia',array('div'=>false,'disabled'=>true,'label'=>false,'class'=>'form-control','placeholder'=>'Experiencia')); ?>
            <?php }else{ ?>
            <?php echo $this->Form->input('anhos_experiencia',array('div'=>false,'disabled'=>true,'label'=>false,'class'=>'form-control','placeholder'=>'Experiencia', 'value'=>$this->data['Cargo']['anhos_experiencia'])); ?>
            <?php } ?>
          </div>
        </div>


        <div class="col-md-4">
          <div class="form-group">
            <label>Nivel de Inglés</label>
            <?php if(empty($this->data)){ ?>
            <?php echo $this->Form->input('nivel_ingles',array('div'=>false,'disabled'=>true,'label'=>false,'class'=>'form-control','placeholder'=>'Nivel de inglés')); ?>
            <?php }else{ ?>
            <?php echo $this->Form->input('nivel_ingles',array('div'=>false,'disabled'=>true,'label'=>false,'class'=>'form-control','placeholder'=>'Nivel de inglés', 'value'=>$this->data['Cargo']['nivel_ingles'])); ?>
            <?php } ?>
          </div>
        </div>


        <div class="col-md-12">
          <div class="form-group">
            <label>Conocimientos, Habilidades y Destrezas</label>
            <?php if(empty($this->data)){ ?>
            <?php echo $this->Form->input('conocimientos',array('div'=>false,'disabled'=>true,'label'=>false,'class'=>'form-control','type'=>'textarea')); ?>
            <?php }else{ ?>
            <?php echo $this->Form->input('conocimientos',array('div'=>false,'disabled'=>true,'label'=>false,'class'=>'form-control','type'=>'textarea', 'value'=>$this->data['Cargo']['conocimientos'])); ?>
            <?php } ?>
          </div>
        </div>
      </div>          
    </fieldset>  
    <fieldset>
      <legend>Cursos Realizados</legend>
      <div class="margenesHorizontales">

        <!-- <div class="col-md-12">
          <div class="form-group">
            <label>Tipo de curso</label>
            <?php if(empty($this->data)){ ?>
              <?php echo $this->Form->input('nivel_academico',array('div'=>false,'disabled'=>true, 'label'=>false,'class'=>'form-control','placeholder'=>'Nivel academico')); ?>
            <?php }else{ ?>
              <?php echo $this->Form->input('nivel_academico',array('div'=>false,'disabled'=>true, 'label'=>false,'class'=>'form-control','placeholder'=>'Nivel academico', 'value'=>$this->data['Cargo']['nivel_academico'])); ?>
            <?php } ?>
          </div>
        </div>
 -->
<?php if(!empty($cursos)){ ?>
        <div class="col-md-12">
          <table class="table table-striped">
            <tr>
              <th>Fecha</th>
              <th>Nombre</th>
              <th>Entidad</th>
              <th>Area</th>
              <th>Horas</th>
            </th>
          <?php foreach ($cursos as $curso): 
                   if($curso['CursosPersonalpropio']['status'] == 'EJECUTADO'):
          ?>

            <tr>
              <td><?php echo $curso['CursosPersonalpropio']['fecha_fin']; ?>&nbsp;</td>
              <td style="width:500px;"><?php echo $curso['nombre']; ?></td>
              <td><?php echo $curso['CursosPersonalpropio']['entidad']; ?></td>
              <td><?php echo $curso['area']; ?></td>
              <td><?php echo $curso['CursosPersonalpropio']['horas']; ?></td>
            </tr>
          <?php   endif;
                endforeach; ?>
          </table>
        </div>
        <?php }else{ ?>

        <div class="col-md-12">
          No se encontraron cursos asociados.
        </div>

        <?php } ?>
    </fieldset>  
      <div style="width:100%;border-bottom: 1px solid #e5e5e5;"></div>

    <fieldset>
  <?php echo $this->Form->create('Dnf');?>
    <input name="data[persona][id]" class="form-control" value="<?php if(isset($this->data['Personalpropio']['id'])) echo $this->data['Personalpropio']['id']; ?>" type="hidden">

    <?php if(isset($this->data['Personalpropio']['dnf']) && $this->data['Personalpropio']['dnf'] == 0){ ?>
      <div class="btn_add">
        <button title="Agregar curso" type="button" id="addCourse" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span></button>
      </div>
    <?php }elseif($this->UserAuth->getGroupId() == 1){ ?>
      <div class="btn_add">
        <button title="Agregar curso" type="button" id="addmoreCourses" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span></button>
      </div>
    <?php } ?>
      <legend>Formación Sugerida</legend>
      
      <div class="margenesHorizontales">

        <?php if(isset($this->data['Personalpropio']['dnf']) && $this->data['Personalpropio']['dnf'] == 0){ ?>

          <div id="courses">

            <div id="curso_base" class="courses">

              <div class="col-md-4">
                <div class="form-group">
                  <label>Nombre del Curso</label>
                  <input name="data[Dnf][0][nombre_curso]" required id="nombre_curso_0" class="form-control" placeholder="Nombre del Curso" type="text">
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label>Área</label>
                  <select name="data[Dnf][0][area_curso]" required id="area_curso_0" class="form-control">
                    <option value="">Seleccione un área</option>
                    <option value="TÉCNICA">Técnica</option>
                    <option value="CONDUCTUAL">Conductual</option>
                    <option value="SEGURIDAD">Seguridad</option>
                  </select>
                </div>
              </div>


              <div class="col-md-4">
                <div class="form-group">
                  <label>Horas Estimadas</label>
                  <select name="data[Dnf][0][horas_curso]" required id="horas_curso_0" class="form-control">
                    <option value="">Seleccione una hora</option>
                    <option value="8">8</option>
                    <option value="16">16</option>
                    <option value="24">24</option>
                    <option value="32">32</option>
                    <option value="40">40</option>
                  </select>
                </div>
              </div>

            </div>

            <div id="curso_1" class="courses hidden">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Nombre del Curso</label>
                  <input name="data[Dnf][1][nombre_curso]" id="nombre_curso_1" class="form-control" placeholder="Nombre del Curso" type="text">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Área</label>
                  <select name="data[Dnf][1][area_curso]" id="area_curso_1" class="form-control">
                    <option value="">Seleccione un área</option>
                    <option value="TÉCNICA">Técnica</option>
                    <option value="CONDUCTUAL">Conductual</option>
                    <option value="SEGURIDAD">Seguridad</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Horas Estimadas</label>
                  <select name="data[Dnf][1][horas_curso]" id="horas_curso_1" class="form-control">
                    <option value="">Seleccione una hora</option>
                    <option value="8">8</option>
                    <option value="16">16</option>
                    <option value="24">24</option>
                    <option value="32">32</option>
                    <option value="40">40</option>
                  </select>
                </div>
              </div>
              <div class="btn_remove">
                <button title="Eliminar curso" class="btn btn-danger" type="button" onclick="removeCourse(1)">
                  <span class="glyphicon glyphicon-remove"></span>
                </button>
              </div>
            </div>

            <div id="curso_2" class="courses hidden">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Nombre del Curso</label>
                  <input name="data[Dnf][2][nombre_curso]" id="nombre_curso_2" class="form-control" placeholder="Nombre del Curso" type="text">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Área</label>
                  <select name="data[Dnf][2][area_curso]" id="area_curso_2" class="form-control">
                    <option value="">Seleccione un área</option>
                    <option value="TÉCNICA">Técnica</option>
                    <option value="CONDUCTUAL">Conductual</option>
                    <option value="SEGURIDAD">Seguridad</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Horas Estimadas</label>
                  <select name="data[Dnf][2][horas_curso]" id="horas_curso_2" class="form-control">
                    <option value="">Seleccione una hora</option>
                    <option value="8">8</option>
                    <option value="16">16</option>
                    <option value="24">24</option>
                    <option value="32">32</option>
                    <option value="40">40</option>
                  </select>
                </div>
              </div>
              <div class="btn_remove">
                <button title="Eliminar curso" class="btn btn-danger" type="button" onclick="removeCourse(2)">
                  <span class="glyphicon glyphicon-remove"></span>
                </button>
              </div>
            </div>

            <div id="curso_3" class="courses hidden">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Nombre del Curso</label>
                  <input name="data[Dnf][3][nombre_curso]" id="nombre_curso_3" class="form-control" placeholder="Nombre del Curso" type="text">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Área</label>
                  <select name="data[Dnf][3][area_curso]" id="area_curso_3" class="form-control">
                    <option value="">Seleccione un área</option>
                    <option value="TÉCNICA">Técnica</option>
                    <option value="CONDUCTUAL">Conductual</option>
                    <option value="SEGURIDAD">Seguridad</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Horas Estimadas</label>
                  <select name="data[Dnf][3][horas_curso]" id="horas_curso_3" class="form-control">
                    <option value="">Seleccione una hora</option>
                    <option value="8">8</option>
                    <option value="16">16</option>
                    <option value="24">24</option>
                    <option value="32">32</option>
                    <option value="40">40</option>
                  </select>
                </div>
              </div>
              <div class="btn_remove">
                <button title="Eliminar curso" class="btn btn-danger" type="button" onclick="removeCourse(3)">
                  <span class="glyphicon glyphicon-remove"></span>
                </button>
              </div>
            </div>

            <div id="curso_4" class="courses hidden">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Nombre del Curso</label>
                  <input name="data[Dnf][4][nombre_curso]" id="nombre_curso_4" class="form-control" placeholder="Nombre del Curso" type="text">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Área</label>
                  <select name="data[Dnf][4][area_curso]" id="area_curso_4" class="form-control">
                    <option value="">Seleccione un área</option>
                    <option value="TÉCNICA">Técnica</option>
                    <option value="CONDUCTUAL">Conductual</option>
                    <option value="SEGURIDAD">Seguridad</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Horas Estimadas</label>
                  <select name="data[Dnf][4][horas_curso]" id="horas_curso_4" class="form-control">
                    <option value="">Seleccione una hora</option>
                    <option value="8">8</option>
                    <option value="16">16</option>
                    <option value="24">24</option>
                    <option value="32">32</option>
                    <option value="40">40</option>
                  </select>
                </div>
              </div>
              <div class="btn_remove">
                <button title="Eliminar curso" class="btn btn-danger" type="button" onclick="removeCourse(4)">
                  <span class="glyphicon glyphicon-remove"></span>
                </button>
              </div>
            </div>

            <div id="curso_5" class="courses hidden">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Nombre del Curso</label>
                  <input name="data[Dnf][5][nombre_curso]" id="nombre_curso_5" class="form-control" placeholder="Nombre del Curso" type="text">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Área</label>
                  <select name="data[Dnf][5][area_curso]" id="area_curso_5" class="form-control">
                    <option value="">Seleccione un área</option>
                    <option value="TÉCNICA">Técnica</option>
                    <option value="CONDUCTUAL">Conductual</option>
                    <option value="SEGURIDAD">Seguridad</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Horas Estimadas</label>
                  <select name="data[Dnf][5][horas_curso]" id="horas_curso_5" class="form-control">
                    <option value="">Seleccione una hora</option>
                    <option value="8">8</option>
                    <option value="16">16</option>
                    <option value="24">24</option>
                    <option value="32">32</option>
                    <option value="40">40</option>
                  </select>
                </div>
              </div>
              <div class="btn_remove">
                <button title="Eliminar curso" class="btn btn-danger" type="button" onclick="removeCourse(5)">
                  <span class="glyphicon glyphicon-remove"></span>
                </button>
              </div>
            </div>

            <div id="curso_6" class="courses hidden">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Nombre del Curso</label>
                  <input name="data[Dnf][6][nombre_curso]" id="nombre_curso_6" class="form-control" placeholder="Nombre del Curso" type="text">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Área</label>
                  <select name="data[Dnf][6][area_curso]" id="area_curso_6" class="form-control">
                    <option value="">Seleccione un área</option>
                    <option value="TÉCNICA">Técnica</option>
                    <option value="CONDUCTUAL">Conductual</option>
                    <option value="SEGURIDAD">Seguridad</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Horas Estimadas</label>
                  <select name="data[Dnf][6][horas_curso]" id="horas_curso_6" class="form-control">
                    <option value="">Seleccione una hora</option>
                    <option value="8">8</option>
                    <option value="16">16</option>
                    <option value="24">24</option>
                    <option value="32">32</option>
                    <option value="40">40</option>
                  </select>
                </div>
              </div>
              <div class="btn_remove">
                <button title="Eliminar curso" class="btn btn-danger" type="button" onclick="removeCourse(6)">
                  <span class="glyphicon glyphicon-remove"></span>
                </button>
              </div>
            </div>

            <div id="curso_7" class="courses hidden">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Nombre del Curso</label>
                  <input name="data[Dnf][7][nombre_curso]" id="nombre_curso_7" class="form-control" placeholder="Nombre del Curso" type="text">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Área</label>
                  <select name="data[Dnf][7][area_curso]" id="area_curso_7" class="form-control">
                    <option value="">Seleccione un área</option>
                    <option value="TÉCNICA">Técnica</option>
                    <option value="CONDUCTUAL">Conductual</option>
                    <option value="SEGURIDAD">Seguridad</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Horas Estimadas</label>
                  <select name="data[Dnf][7][horas_curso]" id="horas_curso_7" class="form-control">
                    <option value="">Seleccione una hora</option>
                    <option value="8">8</option>
                    <option value="16">16</option>
                    <option value="24">24</option>
                    <option value="32">32</option>
                    <option value="40">40</option>
                  </select>
                </div>
              </div>
              <div class="btn_remove">
                <button title="Eliminar curso" class="btn btn-danger" type="button" onclick="removeCourse(7)">
                  <span class="glyphicon glyphicon-remove"></span>
                </button>
              </div>
            </div>

            <div id="curso_8" class="courses hidden">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Nombre del Curso</label>
                  <input name="data[Dnf][8][nombre_curso]" id="nombre_curso_8" class="form-control" placeholder="Nombre del Curso" type="text">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Área</label>
                  <select name="data[Dnf][8][area_curso]" id="area_curso_8" class="form-control">
                    <option value="">Seleccione un área</option>
                    <option value="TÉCNICA">Técnica</option>
                    <option value="CONDUCTUAL">Conductual</option>
                    <option value="SEGURIDAD">Seguridad</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Horas Estimadas</label>
                  <select name="data[Dnf][8][horas_curso]" id="horas_curso_8" class="form-control">
                    <option value="">Seleccione una hora</option>
                    <option value="8">8</option>
                    <option value="16">16</option>
                    <option value="24">24</option>
                    <option value="32">32</option>
                    <option value="40">40</option>
                  </select>
                </div>
              </div>
              <div class="btn_remove">
                <button title="Eliminar curso" class="btn btn-danger" type="button" onclick="removeCourse(8)">
                  <span class="glyphicon glyphicon-remove"></span>
                </button>
              </div>
            </div>

            <div id="curso_9" class="courses hidden">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Nombre del Curso</label>
                  <input name="data[Dnf][9][nombre_curso]" id="nombre_curso_9" class="form-control" placeholder="Nombre del Curso" type="text">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Área</label>
                  <select name="data[Dnf][9][area_curso]" id="area_curso_9" class="form-control">
                    <option value="">Seleccione un área</option>
                    <option value="TÉCNICA">Técnica</option>
                    <option value="CONDUCTUAL">Conductual</option>
                    <option value="SEGURIDAD">Seguridad</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Horas Estimadas</label>
                  <select name="data[Dnf][9][horas_curso]" id="horas_curso_9" class="form-control">
                    <option value="">Seleccione una hora</option>
                    <option value="8">8</option>
                    <option value="16">16</option>
                    <option value="24">24</option>
                    <option value="32">32</option>
                    <option value="40">40</option>
                  </select>
                </div>
              </div>
              <div class="btn_remove">
                <button title="Eliminar curso" class="btn btn-danger" type="button" onclick="removeCourse(9)">
                  <span class="glyphicon glyphicon-remove"></span>
                </button>
              </div>
            </div>

          </div>

        <?php }elseif(isset($cursos)){ 
          ?>

          <div id="courses">
          <?php 
                $k=0;
                foreach ($cursos as $curso): 
                   if($curso['CursosPersonalpropio']['status'] == 'PENDIENTE'):
          ?>


            <div id="curso_pendiente_<?php echo $k; ?>" class="courses">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Nombre del Curso</label>
                  <input name="data[Dnf][<?php echo $k; ?>][nombre_curso]" id="nombre_curso_pendiente_<?php echo $k; ?>" disabled class="form-control" placeholder="Nombre del Curso" type="text" value="<?php echo $curso['nombre']; ?>">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Área</label>
                  <select name="data[Dnf][<?php echo $k; ?>][area_curso]" id="area_curso_pendiente_<?php echo $k; ?>" disabled class="form-control">
                    <option value="<?php echo $curso['area']; ?>"><?php echo ucfirst($curso['area']); ?></option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Horas Estimadas</label>
                  <select name="data[Dnf][<?php echo $k; ?>][horas_curso]" id="horas_curso_pendiente_<?php echo $k; ?>" disabled class="form-control">
                    <option value="<?php echo $curso['CursosPersonalpropio']['horas']; ?>"><?php echo $curso['CursosPersonalpropio']['horas']; ?></option>
                  </select>
                </div>
              </div>
              <?php if($this->UserAuth->getGroupId() == 1){ ?>
                <div class="btn_remove">
                  <button title="Eliminar curso" class="btn btn-danger" type="button" onclick="deleteCourse(<?php echo $curso['id']; ?>, <?php echo $this->data['Personalpropio']['id']; ?>, <?php echo $k; ?>)">
                    <span class="glyphicon glyphicon-remove"></span>
                  </button>
                </div>
              <?php } ?>
            </div>


              
          <?php $k++;  endif;
                endforeach; ?>

                <!-- agregar nuevos cursos -->

            <div id="curso_add_0" class="courses hidden">

              <div class="col-md-4">
                <div class="form-group">
                  <label>Nombre del Curso</label>
                  <input name="data[Dnf][0][nombre_curso]" required id="nombre_curso_add_0" class="form-control" placeholder="Nombre del Curso" type="text">
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label>Área</label>
                  <select name="data[Dnf][0][area_curso]" required id="area_curso_add_0" class="form-control">
                    <option value="">Seleccione un área</option>
                    <option value="TÉCNICA">Técnica</option>
                    <option value="CONDUCTUAL">Conductual</option>
                    <option value="SEGURIDAD">Seguridad</option>
                  </select>
                </div>
              </div>


              <div class="col-md-4">
                <div class="form-group">
                  <label>Horas Estimadas</label>
                  <select name="data[Dnf][0][horas_curso]" required id="horas_curso_add_0" class="form-control">
                    <option value="">Seleccione una hora</option>
                    <option value="8">8</option>
                    <option value="16">16</option>
                    <option value="24">24</option>
                    <option value="32">32</option>
                    <option value="40">40</option>
                  </select>
                </div>
              </div>

            </div>

            <div id="curso_add_1" class="courses hidden">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Nombre del Curso</label>
                  <input name="data[Dnf][1][nombre_curso]" id="nombre_curso_add_1" class="form-control" placeholder="Nombre del Curso" type="text">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Área</label>
                  <select name="data[Dnf][1][area_curso]" id="area_curso_add_1" class="form-control">
                    <option value="">Seleccione un área</option>
                    <option value="TÉCNICA">Técnica</option>
                    <option value="CONDUCTUAL">Conductual</option>
                    <option value="SEGURIDAD">Seguridad</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Horas Estimadas</label>
                  <select name="data[Dnf][1][horas_curso]" id="horas_curso_add_1" class="form-control">
                    <option value="">Seleccione una hora</option>
                    <option value="8">8</option>
                    <option value="16">16</option>
                    <option value="24">24</option>
                    <option value="32">32</option>
                    <option value="40">40</option>
                  </select>
                </div>
              </div>
              <div class="btn_remove">
                <button title="Eliminar curso" class="btn btn-danger" type="button" onclick="removenewCourse(1)">
                  <span class="glyphicon glyphicon-remove"></span>
                </button>
              </div>
            </div>

            <div id="curso_add_2" class="courses hidden">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Nombre del Curso</label>
                  <input name="data[Dnf][2][nombre_curso]" id="nombre_curso_add_2" class="form-control" placeholder="Nombre del Curso" type="text">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Área</label>
                  <select name="data[Dnf][2][area_curso]" id="area_curso_add_2" class="form-control">
                    <option value="">Seleccione un área</option>
                    <option value="TÉCNICA">Técnica</option>
                    <option value="CONDUCTUAL">Conductual</option>
                    <option value="SEGURIDAD">Seguridad</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Horas Estimadas</label>
                  <select name="data[Dnf][2][horas_curso]" id="horas_curso_add_2" class="form-control">
                    <option value="">Seleccione una hora</option>
                    <option value="8">8</option>
                    <option value="16">16</option>
                    <option value="24">24</option>
                    <option value="32">32</option>
                    <option value="40">40</option>
                  </select>
                </div>
              </div>
              <div class="btn_remove">
                <button title="Eliminar curso" class="btn btn-danger" type="button" onclick="removenewCourse(2)">
                  <span class="glyphicon glyphicon-remove"></span>
                </button>
              </div>
            </div>

            <div id="curso_add_3" class="courses hidden">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Nombre del Curso</label>
                  <input name="data[Dnf][3][nombre_curso]" id="nombre_curso_add_3" class="form-control" placeholder="Nombre del Curso" type="text">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Área</label>
                  <select name="data[Dnf][3][area_curso]" id="area_curso_add_3" class="form-control">
                    <option value="">Seleccione un área</option>
                    <option value="TÉCNICA">Técnica</option>
                    <option value="CONDUCTUAL">Conductual</option>
                    <option value="SEGURIDAD">Seguridad</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Horas Estimadas</label>
                  <select name="data[Dnf][3][horas_curso]" id="horas_curso_add_3" class="form-control">
                    <option value="">Seleccione una hora</option>
                    <option value="8">8</option>
                    <option value="16">16</option>
                    <option value="24">24</option>
                    <option value="32">32</option>
                    <option value="40">40</option>
                  </select>
                </div>
              </div>
              <div class="btn_remove">
                <button title="Eliminar curso" class="btn btn-danger" type="button" onclick="removenewCourse(3)">
                  <span class="glyphicon glyphicon-remove"></span>
                </button>
              </div>
            </div>

            <div id="curso_add_4" class="courses hidden">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Nombre del Curso</label>
                  <input name="data[Dnf][4][nombre_curso]" id="nombre_curso_add_4" class="form-control" placeholder="Nombre del Curso" type="text">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Área</label>
                  <select name="data[Dnf][4][area_curso]" id="area_curso_add_4" class="form-control">
                    <option value="">Seleccione un área</option>
                    <option value="TÉCNICA">Técnica</option>
                    <option value="CONDUCTUAL">Conductual</option>
                    <option value="SEGURIDAD">Seguridad</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Horas Estimadas</label>
                  <select name="data[Dnf][4][horas_curso]" id="horas_curso_add_4" class="form-control">
                    <option value="">Seleccione una hora</option>
                    <option value="8">8</option>
                    <option value="16">16</option>
                    <option value="24">24</option>
                    <option value="32">32</option>
                    <option value="40">40</option>
                  </select>
                </div>
              </div>
              <div class="btn_remove">
                <button title="Eliminar curso" class="btn btn-danger" type="button" onclick="removenewCourse(4)">
                  <span class="glyphicon glyphicon-remove"></span>
                </button>
              </div>
            </div>

            <div id="curso_add_5" class="courses hidden">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Nombre del Curso</label>
                  <input name="data[Dnf][5][nombre_curso]" id="nombre_curso_add_5" class="form-control" placeholder="Nombre del Curso" type="text">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Área</label>
                  <select name="data[Dnf][5][area_curso]" id="area_curso_add_5" class="form-control">
                    <option value="">Seleccione un área</option>
                    <option value="TÉCNICA">Técnica</option>
                    <option value="CONDUCTUAL">Conductual</option>
                    <option value="SEGURIDAD">Seguridad</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Horas Estimadas</label>
                  <select name="data[Dnf][5][horas_curso]" id="horas_curso_add_5" class="form-control">
                    <option value="">Seleccione una hora</option>
                    <option value="8">8</option>
                    <option value="16">16</option>
                    <option value="24">24</option>
                    <option value="32">32</option>
                    <option value="40">40</option>
                  </select>
                </div>
              </div>
              <div class="btn_remove">
                <button title="Eliminar curso" class="btn btn-danger" type="button" onclick="removenewCourse(5)">
                  <span class="glyphicon glyphicon-remove"></span>
                </button>
              </div>
            </div>

            <div id="curso_add_6" class="courses hidden">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Nombre del Curso</label>
                  <input name="data[Dnf][6][nombre_curso]" id="nombre_curso_add_6" class="form-control" placeholder="Nombre del Curso" type="text">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Área</label>
                  <select name="data[Dnf][6][area_curso]" id="area_curso_add_6" class="form-control">
                    <option value="">Seleccione un área</option>
                    <option value="TÉCNICA">Técnica</option>
                    <option value="CONDUCTUAL">Conductual</option>
                    <option value="SEGURIDAD">Seguridad</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Horas Estimadas</label>
                  <select name="data[Dnf][6][horas_curso]" id="horas_curso_add_6" class="form-control">
                    <option value="">Seleccione una hora</option>
                    <option value="8">8</option>
                    <option value="16">16</option>
                    <option value="24">24</option>
                    <option value="32">32</option>
                    <option value="40">40</option>
                  </select>
                </div>
              </div>
              <div class="btn_remove">
                <button title="Eliminar curso" class="btn btn-danger" type="button" onclick="removenewCourse(6)">
                  <span class="glyphicon glyphicon-remove"></span>
                </button>
              </div>
            </div>

            <div id="curso_add_7" class="courses hidden">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Nombre del Curso</label>
                  <input name="data[Dnf][7][nombre_curso]" id="nombre_curso_add_7" class="form-control" placeholder="Nombre del Curso" type="text">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Área</label>
                  <select name="data[Dnf][7][area_curso]" id="area_curso_add_7" class="form-control">
                    <option value="">Seleccione un área</option>
                    <option value="TÉCNICA">Técnica</option>
                    <option value="CONDUCTUAL">Conductual</option>
                    <option value="SEGURIDAD">Seguridad</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Horas Estimadas</label>
                  <select name="data[Dnf][7][horas_curso]" id="horas_curso_add_7" class="form-control">
                    <option value="">Seleccione una hora</option>
                    <option value="8">8</option>
                    <option value="16">16</option>
                    <option value="24">24</option>
                    <option value="32">32</option>
                    <option value="40">40</option>
                  </select>
                </div>
              </div>
              <div class="btn_remove">
                <button title="Eliminar curso" class="btn btn-danger" type="button" onclick="removenewCourse(7)">
                  <span class="glyphicon glyphicon-remove"></span>
                </button>
              </div>
            </div>

            <div id="curso_add_8" class="courses hidden">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Nombre del Curso</label>
                  <input name="data[Dnf][8][nombre_curso]" id="nombre_curso_add_8" class="form-control" placeholder="Nombre del Curso" type="text">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Área</label>
                  <select name="data[Dnf][8][area_curso]" id="area_curso_add_8" class="form-control">
                    <option value="">Seleccione un área</option>
                    <option value="TÉCNICA">Técnica</option>
                    <option value="CONDUCTUAL">Conductual</option>
                    <option value="SEGURIDAD">Seguridad</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Horas Estimadas</label>
                  <select name="data[Dnf][8][horas_curso]" id="horas_curso_add_8" class="form-control">
                    <option value="">Seleccione una hora</option>
                    <option value="8">8</option>
                    <option value="16">16</option>
                    <option value="24">24</option>
                    <option value="32">32</option>
                    <option value="40">40</option>
                  </select>
                </div>
              </div>
              <div class="btn_remove">
                <button title="Eliminar curso" class="btn btn-danger" type="button" onclick="removenewCourse(8)">
                  <span class="glyphicon glyphicon-remove"></span>
                </button>
              </div>
            </div>

            <div id="curso_add_9" class="courses hidden">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Nombre del Curso</label>
                  <input name="data[Dnf][9][nombre_curso]" id="nombre_curso_add_9" class="form-control" placeholder="Nombre del Curso" type="text">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Área</label>
                  <select name="data[Dnf][9][area_curso]" id="area_curso_add_9" class="form-control">
                    <option value="">Seleccione un área</option>
                    <option value="TÉCNICA">Técnica</option>
                    <option value="CONDUCTUAL">Conductual</option>
                    <option value="SEGURIDAD">Seguridad</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Horas Estimadas</label>
                  <select name="data[Dnf][9][horas_curso]" id="horas_curso_add_9" class="form-control">
                    <option value="">Seleccione una hora</option>
                    <option value="8">8</option>
                    <option value="16">16</option>
                    <option value="24">24</option>
                    <option value="32">32</option>
                    <option value="40">40</option>
                  </select>
                </div>
              </div>
              <div class="btn_remove">
                <button title="Eliminar curso" class="btn btn-danger" type="button" onclick="removenewCourse(9)">
                  <span class="glyphicon glyphicon-remove"></span>
                </button>
              </div>
            </div>




          </div>
        <?php }?>


      </div>          
    </fieldset>  

    <fieldset>
      <legend>Información del Supervisor</legend>
      <div class="margenesHorizontales">

          <div class="col-md-6">
            <div class="form-group">
              <label>Apellidos y Nombres</label>
                <?php if(isset($this->data['Personalpropio']['dnf']) && $this->data['Personalpropio']['dnf'] == 0){ ?>
                  <input name="data[Supervisor][nombre_supervisor]" class="form-control" required placeholder="Apellidos y Nombres" type="text">
                <?php }elseif(isset($this->data['Personalpropio']['dnf'])){ ?>
                  <input name="data[Supervisor][nombre_supervisor]" class="form-control" disabled placeholder="Apellidos y Nombres" type="text" value="<?php echo $this->data['Personalpropio']['nombre_supervisor']; ?>">
                <?php } ?>
            </div>
          </div>



          <div class="col-md-6" style="margin-bottom: 30px;">
            <div class="form-group">
              <label>Título del Puesto</label>
                <?php if(isset($this->data['Personalpropio']['dnf']) && $this->data['Personalpropio']['dnf'] == 0){ ?>
                  <input name="data[Supervisor][cargo_supervisor]" class="form-control" required placeholder="Cargo" type="text">
                <?php }elseif(isset($this->data['Personalpropio']['dnf'])){ ?>
                  <input name="data[Supervisor][cargo_supervisor]" class="form-control" disabled placeholder="Cargo" type="text" value="<?php echo $this->data['Personalpropio']['cargo_supervisor']; ?>">
                <?php } ?>
            </div>
          </div>


        <div class="margenesVerticales" style="text-align:right;">
          <input type = "button" class="btn btn-primary" onclick="window.location.href = WEBROOT+'dashboard';" title="regresar" value = "Atr&aacute;s" style="width: 79px;">
          <?php if(isset($this->data['Personalpropio']['dnf']) && $this->data['Personalpropio']['dnf'] == 1){ ?>
            <input type = "button" class="btn btn-primary" onclick="window.location.href = WEBROOT+'desarrollo/imprimir/<?php echo $this->data['Personalpropio']['id']; ?>';" title="regresar" value = "Imprimir" style="width: 79px;">
          <?php } ?>
          <?php if(isset($this->data['Personalpropio']['dnf']) && $this->data['Personalpropio']['dnf'] == 0 || $this->UserAuth->getGroupId() == 1){ ?>
            <button type="submit" onclick="if (confirm(&quot;¿Está seguro de continuar?\n\nUna vez guardado el DNF individual sólo la Coordinación de Desarrollo y Gerencia de RRHH podrán modificarlo.&quot;)) { return true; } return false;" class="btn btn-primary">
              Guardar
            </button>
          <?php } ?>
        </div>
      </div>    
    </fieldset> 
</article>

<script type="text/javascript">
  var id_course = 0;

  $(function () {
      $('#fingreso').datetimepicker({
        format:'DD-MM-YYYY',
          locale: 'es',
          showTodayButton:true
      });
      $('#fingreso_p').datetimepicker({
        format:'DD-MM-YYYY',
          locale: 'es',
          showTodayButton:true
      });
      $('#fFin').datetimepicker({
        format:'DD-MM-YYYY',
          locale: 'es',
          showTodayButton:true,
          useCurrent: false //Important! See issue #1075
      });
  });

  $('#addCourse').click(function() {
    // if($('#nombre_curso_'+id_course).val() != '' && $('#horas_curso_'+id_course).val() != '' && $('#area_curso_'+id_course).val() != ''){
      id_course++;
      $('#nombre_curso_'+id_course).prop('required',true);
      $('#horas_curso_'+id_course).prop('required',true);
      $('#area_curso_'+id_course).prop('required',true);
      $('#curso_'+id_course).removeClass('hidden');
    // }
  });

  $('#addmoreCourses').click(function() {

    // if(id_course==0 || ($('#nombre_curso_add_'+(id_course-1)).val() != '' && $('#horas_curso_add_'+(id_course-1)).val() != '' && $('#area_curso_add_'+(id_course-1)).val() != '')){

      $('#nombre_curso_add_'+id_course).prop('required',true);
      $('#horas_curso_add_'+id_course).prop('required',true);
      $('#area_curso_add_'+id_course).prop('required',true);
      $('#curso_add_'+id_course).removeClass('hidden');

      id_course++;
    // }
  });

  function removeCourse(id_course){
    $('#curso_'+id_course).addClass('hidden');
    $('#nombre_curso_'+id_course).val('');
    $('#horas_curso_'+id_course).val('');
    $('#area_curso_'+id_course).val('');
    $('#nombre_curso_'+id_course).prop('required',false);
    $('#horas_curso_'+id_course).prop('required',false);
    $('#area_curso_'+id_course).prop('required',false);
  }

  function removenewCourse(id_course){
    $('#curso_add_'+id_course).addClass('hidden');
    $('#nombre_curso_add_'+id_course).val('');
    $('#horas_curso_add_'+id_course).val('');
    $('#area_curso_add_'+id_course).val('');
    $('#nombre_curso_add_'+id_course).prop('required',false);
    $('#horas_curso_add_'+id_course).prop('required',false);
    $('#area_curso_add_'+id_course).prop('required',false);
  }

  function deleteCourse(id_course,id_personal,curso){
    if(confirm('¿Seguro que desea eliminar el curso?')){
      var data=new Object();
      data['id_course'] = id_course;
      data['id_personal'] = id_personal;

      $.post(WEBROOT+'desarrollo/deleteCourse',{data:data},function(data){
        if(data){
          $('#curso_pendiente_'+curso).remove();
        }
      },'json');
    }
  }

</script>