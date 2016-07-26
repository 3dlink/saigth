<?php
$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version());
?>
<!doctype html>
<html lang="">
  <head>
    <meta charset="utf-8">
    <!--<?php /*echo $cakeDescription ?>:
		<?php echo $this->fetch('title');*/ ?>-->
	<title>		
		Sistema de Gerencia de Recursos Humanos. Fertinitro.
	</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php 
		echo $this->Html->meta('icon');
		//echo $this->Html->css('cake.generic');
		//echo $this->Html->css('/usermgmt/css/umstyle');
		echo $this->Html->css('../library/bootstrap/dist/css/bootstrap.css');
		echo $this->Html->css('main');
		echo $this->fetch('meta');
		echo $this->fetch('css');
    ?>
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
    <!--Header Open-->
    <header style="display: table;">
      <img src="<?php echo $this->webroot.'img/logo.png'?>" alt="logo aig" id="logo-left" style="display: table-cell;" class="hidden-xs hidden-sm" >
      <h2 style="display: table-cell; vertical-align: middle; text-align: center;color:#e64545">Sistema de Gerencia de Recursos Humanos. Fertinitro.</h2>
      <img src="<?php echo $this->webroot.'img/logo-presidencia.png'?>" alt="logo panama" id="logo-right" style="display: table-cell;" class="hidden-xs hidden-sm">
      <div style="clear:both;"></div>
    </header>
    <!--Header Close-->
    <?php
    	echo $this->element('menuHome');
    ?>
    <section class="container">
		<?php echo $this->Session->flash(); ?>
		<?php echo $this->fetch('content'); ?>
    </section>
    <footer>

    </footer>
    <?php
    	
    	echo $this->Html->script('../library/jquery/dist/jquery.js');
    	echo $this->Html->script('../library/bootstrap/dist/js/bootstrap.js');
    	echo $this->Html->script('main.js');
    	echo $this->fetch('script');
    ?>
    <?php echo $this->element('sql_dump'); ?>
  </body>
</html>
