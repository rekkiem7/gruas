<nav class="navbar navbar-inverse animated fadeInDown">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo site_url('Home/index')?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;Grúas Pacheco</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span>&nbsp;Administración <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo site_url('Usuario/index')?>" class="animated fadeInDown">Definición de Usuarios</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-hdd" aria-hidden="true"></span>&nbsp;Mantención Maestros <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo site_url('Maestro/clientes')?>" class="animated fadeInDown">Maestros Clientes</a></li>
            <li><a href="#" class="animated fadeInDown">Maestros Máquinas</a></li>
            <li><a href="#" class="animated fadeInDown">Maestros Operarios</a></li>
            <li><a href="#" class="animated fadeInDown">Maestros Razón Social</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-copy" aria-hidden="true"></span>&nbsp;Orden de Trabajo <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#" class="animated fadeInDown">Ingresar Orden de Trabajo</a></li>
            <li><a href="#" class="animated fadeInDown">Modificar Orden de Trabajo</a></li>
            <li><a href="#" class="animated fadeInDown">Eliminar Orden de Trabajo</a></li>
            <li><a href="#" class="animated fadeInDown">Listado</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-phone" aria-hidden="true"></span>&nbsp;Facturación <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#" class="animated fadeInDown">Facturación por OT</a></li>
            <li><a href="#" class="animated fadeInDown">Anulación de Factura</a></li>
            <li><a href="#" class="animated fadeInDown">Listados</a></li>
          </ul>
        </li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo site_url('Welcome/logout')?>"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Cerrar Sesión</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<script>
$(document).ready(function()
{
  
});
</script>