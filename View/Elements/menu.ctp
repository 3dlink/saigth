<style type="text/css">
.dropdown-submenu {
    position: relative;
}

.dropdown-submenu>.dropdown-menu {
    top: 0;
    left: 100%;
    margin-top: -6px;
    margin-left: -1px;
    -webkit-border-radius: 0 6px 6px 6px;
    -moz-border-radius: 0 6px 6px;
    border-radius: 0 6px 6px 6px;
}

.dropdown-submenu:hover>.dropdown-menu {
    display: block;
}

.dropdown-submenu>a:after {
    display: block;
    content: " ";
    float: right;
    width: 0;
    height: 0;
    border-color: transparent;
    border-style: solid;
    border-width: 5px 0 5px 5px;
    border-left-color: #ccc;
    margin-top: 5px;
    margin-right: -10px;
}

.dropdown-submenu:hover>a:after {
    border-left-color: #fff;
}

.dropdown-submenu.pull-left {
    float: none;
}

.dropdown-submenu.pull-left>.dropdown-menu {
    left: -100%;
    margin-left: 10px;
    -webkit-border-radius: 6px 0 6px 6px;
    -moz-border-radius: 6px 0 6px 6px;
    border-radius: 6px 0 6px 6px;
}
.submenu{
      background-color: rgba(230, 69, 69, 0.85);
}
</style>

<!--MENU OPEN-->
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Datos del Personal<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo $this->webroot.'motor'; ?>">Actualizar datos</a></li>
                <li><a href="<?php echo $this->webroot.'PersonalPropios'; ?>">Consultar</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Cargos o Posiciones<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                <li><a href="<?php echo $this->webroot.'cargos'; ?>">Consultar</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Cursos<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                <li><a href="<?php echo $this->webroot.'desarrollo/aprobar'; ?>">Aprobar</a></li>
                <li><a href="<?php echo $this->webroot.'desarrollo/exportar/1'; ?>">Exportar Todo</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Formación<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <!-- <li class="dropdown-submenu">
                  <a tabindex="-1" href="#">DNF Individual</a>
                  <ul class="dropdown-menu submenu">
                    <li><a href="<?php echo $this->webroot.'desarrollo/dnf'; ?>">Cargar DNF</a></li>
                    <li><a href="<?php echo $this->webroot.'desarrollo/dnf'; ?>">Consultar</a></li>
                  </ul>
                </li> -->
                <li><a href="<?php echo $this->webroot.'desarrollo/dnf'; ?>">DNF Individual</a></li>
                <li><a href="<?php echo $this->webroot.'desarrollo/plan'; ?>">Plan de Formación</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Opciones <span class="caret"></span></a>
              <?php if($this->UserAuth->getUserId()): ?>
                <ul class="dropdown-menu">
                  <!-- <li><a href="<?php echo $this->webroot.'motor'; ?>">Actualizar Personal Propio</a></li>
                  <li><a href="<?php echo $this->webroot.'cargos'; ?>">Actualizar Cargos</a></li> -->
                  <li><a href="<?php echo $this->webroot.'logout'; ?>">Cerrar Sesión</a></li>
                </ul>
              <?php else: ?>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo $this->webroot.'login'; ?>">Identificarse</a></li>
                </ul>
              <?php endIf ;?>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    <!--MENU CLOSE-->