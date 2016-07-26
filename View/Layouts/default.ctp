<?php
$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version());
?>
<!doctype html>
<html lang="">
  <head>
    <meta charset="utf-8">
	<title>
		SAIGTH
	</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php 
		echo $this->Html->meta('icon');
		echo $this->Html->css('../library/bootstrap/dist/css/bootstrap.css');
		echo $this->Html->css('main');
    	echo $this->Html->css('jquery.multiselect');
    	echo $this->Html->css('../library/dataPiker/css/bootstrap-datetimepicker.min.css');
    // echo $this->Html->css('app');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->Html->script('../library/jquery/dist/jquery.js');
		echo $this->Html->script('../library/moment/moment.js');
		echo $this->Html->script('../library/moment/locale/es.js');
    	echo $this->Html->script('../library/dataPiker/js/bootstrap-datetimepicker.min.js');
    ?>
    
<script type="text/javascript">WEBROOT='<?php echo $this->webroot; ?>';</script>
  </head>
  <body>    

  <style type="text/css">

    .error_message {
      position: relative;
      overflow: hidden;
      margin: 0.5rem 0 1rem 0;
      transition: box-shadow .25s;
      border-radius: 2px;
      box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
      padding: .5em;
      color: #a94442;
      background-color: #f2dede;
      border-color: #ebccd1;
    }

    .success_message {
      position: relative;
      overflow: hidden;
      margin: 0.5rem 0 1rem 0;
      transition: box-shadow .25s;
      border-radius: 2px;
      box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
      padding: .5em;
      color: #3c763d;
      background-color: #dff0d8;
      border-color: #d6e9c6;
    }

  </style>
  <?php $user = $this->UserAuth->getUser(); ?>
    <!--Header Open-->
    <header style="display: table;">
      <img src="<?php echo $this->webroot.'img/logo.jpg'?>" alt="logo pdvsa" id="logo-left_" style="display: table-cell;" class="hidden-xs hidden-sm" >
      <h2 style="display: table-cell; vertical-align: middle; text-align: center;color:#e64545">Sistema Automatizado Integral de Gestión de Talento Humano <br> <span style="font-size:24px;"><?php echo 'Bienvenido, '.$user['User']['first_name'].' '.$user['User']['last_name']; ?></span></h2>
      <img src="<?php echo $this->webroot.'img/logo_pequiven.jpg'?>" alt="logo fertinitro" style="display: table-cell;" class="hidden-xs hidden-sm logo-right_">
      <img src="<?php echo $this->webroot.'img/logo_fertinitro.jpg'?>" alt="logo fertinitro" style="display: table-cell;" class="hidden-xs hidden-sm logo-right_">
      <div style="clear:both;"></div>
    </header>
    <!--Header Close-->
    <?php
    	echo $this->element('menu');
    ?>
    
    <section class="container">	
    	<?php echo $this->Session->flash(); ?>	
		<?php echo $this->fetch('content'); ?>
    </section>
    <footer>
		<?php /*echo $this->Html->link(
			$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
			'http://www.cakephp.org/',
			array('target' => '_blank', 'escape' => false, 'id' => 'cake-powered')
		);
		?>
		<p>
			<?php echo $cakeVersion; */?>
		</p>

    </footer>
    <?php
    	
    	echo $this->Html->script('../library/bootstrap/dist/js/bootstrap.js');
      echo $this->Html->script('jquery.multiselect.js');  
    	echo $this->fetch('script');
    ?>
    <?php // echo $this->element('sql_dump'); ?>
  </body>
</html>

<?php
/*
<section class="container">
      <!--Form Open-->
      <article class="card shadow-1">
        <form action="">
          <fieldset>
            <legend>Agregar entidad</legend>
            <div class="margenesHorizontales">
              <div class="form-group">
                <label>Nombre</label>
                <input type="text" class="form-control" id="entity_name" placeholder="Nombre">
              </div>
              <div class="form-group">
                <label>Teléfono</label>
                <input type="text" class="form-control" id="entity_phone" placeholder="Telefono">
              </div>
              <div class="form-group">
                <label>Dirección</label>
                <textarea class="form-control" id="entity_direction" placeholder="Dirección" rows="4"></textarea>
              </div>
              <div class="margenesVerticales" style="text-align:right;">
                <button class="btn btn-primary">
                  Guardar
                </button>
              </div>
            </div>          
          </fieldset>          
        </form>
      </article>
      <!--Form Close-->
      <!--List  Open-->
      <article class="card shadow-1">
          <fieldset>
            <legend>Entidades registradas</legend>
            <!--Search Open-->
            <div class="margenesHorizontales">
              <div class="col-md-6">
                <div class=" margenesVerticales">
                 <div class="input-group">
                    <input type="text" class="form-control" placeholder="Buscar entidad...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
                    </span>
                  </div>                
                </div>
              </div>
              <div class="col-md-6">echo
                <div class=" margenesVerticales" style="text-align: right;">
                  <buttom class="btn btn-primary">Agregar entidad</buttom>
                </div>
              </div>
              <div style="clear:both;"></div>
            </div>
            <!--Search Close-->
            <div class="margenesHorizontales">
              <table class="table table-striped">
                <tr>
                  <th>Nombre</th>
                  <th>Direción</th>
                  <th>Teléfono</th>
                  <th></th>
                </th>
                <tr>
                  <td>Hola</td>
                  <td>Hola</td>
                  <td>Hola</td>
                  <td>
                    <div style="display: block; width: 80px; margin: 0 auto;">
                      <a href="" class="menuTable">
                        <span class="glyphicon glyphicon-pencil"></span>
                      </a>
                      <a href="" class="menuTable">
                        <span class="glyphicon glyphicon-remove"></span>
                      </a>
                      <a href="" class="menuTable">
                        <span class="glyphicon glyphicon-eye-open"></span>
                      </a>
                    </div>                  
                  </td>
                </tr>
              </table>
            </div> 
          </fieldset>          
      </article>
      <!--List  Close-->
      <!--Login Open-->
      <article class="card shadow-1 login">
         <fieldset>
            <legend>Iniciar sesión</legend>
            <form>
              <div class="margenesHorizontales">
                <div class="form-group">
                  <label>Usuario</label>
                  <input type="text" class="form-control" id="entity_name" placeholder="Usuario">
                </div>
                <div class="form-group">
                  <label>Contraseña</label>
                  <input type="password" class="form-control" id="entity_phone" placeholder="Contraseña">
                </div>
                <div class="form-group">
                  <a href="">Olvide mi contraseña</a>
                </div>
              </div>              
              <hr>
              <div class="margenesHorizontales margenesVerticales" style="text-align:right;">
                <button class="btn btn-primary">
                  Guardar
                </button>
              </div>
            </form>            
          </fieldset>
      </article>
      <!--Login  Close-->
      <!--Login Open-->
      <article class="card shadow-1 login">
         <fieldset>
            <legend>Recuperar contraseña</legend>
            <form>
              <div class="margenesHorizontales">
                <div class="form-group">
                  <label>Correo eléctronico</label>
                  <input type="text" class="form-control" id="entity_name" placeholder="Introduzca su correo eléctronico">
                </div>
              </div>              
              <hr>
              <div class="margenesHorizontales margenesVerticales" style="text-align:right;">
                <button class="btn btn-primary">
                  Recuperar Contraseña
                </button>
              </div>
            </form>            
          </fieldset>
      </article>
      <!--Login  Close-->
    </section>
*/
?>
