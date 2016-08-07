<style>
@import url(http://fonts.googleapis.com/css?family=Open+Sans:400,700);
body {
  font-family: 'Open Sans', 'sans-serif';
}

h1,
.h1 {
  font-size: 36px;
  text-align: center;
  font-size: 5em;
  color: #404041;
}



.navbar-nav>li>.dropdown-menu {
  margin-top: 20px;
  border-top-left-radius: 4px;
  border-top-right-radius: 4px;
}

.navbar-default .navbar-nav>li>a {
  width: 200px;
  font-weight: bold;
}

.mega-dropdown {
  position: static !important;
  width: 100%;
}

.mega-dropdown-menu {
  padding: 20px 0px;
  width: 100%;
  box-shadow: none;
  -webkit-box-shadow: none;
  background-color: #000000;
}

.mega-dropdown-menu:before {
  content: "";
  border-bottom: 15px solid #fff;
  border-right: 17px solid transparent;
  border-left: 17px solid transparent;
  position: absolute;
  top: -15px;
  left: 285px;
  z-index: 10;
}

.mega-dropdown-menu:after {
  content: "";
  border-bottom: 17px solid #ccc;
  border-right: 19px solid transparent;
  border-left: 19px solid transparent;
  position: absolute;
  top: -17px;
  left: 283px;
  z-index: 8;
}

.mega-dropdown-menu > li > ul {
  padding: 0;
  margin: 0;
}

.mega-dropdown-menu > li > ul > li {
  list-style: none;
}

.mega-dropdown-menu > li > ul > li > a {
  display: block;
  padding: 3px 20px;
  clear: both;
  font-weight: normal;
  line-height: 1.428571429;
  color: #ffffff;
  white-space: normal;
}

.mega-dropdown-menu > li ul > li > a:hover,
.mega-dropdown-menu > li ul > li > a:focus {
  text-decoration: none;
  color: #428bca;
  background-color: #f5f5f5;
}

.mega-dropdown-menu .dropdown-header {
  color: #428bca;
  font-size: 18px;
  font-weight: bold;
}

.mega-dropdown-menu form {
  margin: 3px 20px;
}

.mega-dropdown-menu .form-group {
  margin-bottom: 3px;
}
</style>

<div class="container">
  <nav class="navbar navbar-inverse">
    <div class="navbar-header">
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Grúas Pacheco</a>
    </div>


    <div class="collapse navbar-collapse js-navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="dropdown mega-dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sistema <span class="glyphicon glyphicon-chevron-down pull-right"></span></a>
          <ul class="dropdown-menu mega-dropdown-menu row">
            <li class="col-sm-3">
              <ul>
                <li class="dropdown-header">¡Visitanos!</li>
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                    <div class="item active">
                      <a href="#"><img src="http://placehold.it/254x150/3498db/f5f5f5/&text=New+Collection" class="img-responsive" alt="product 1"></a>
                      <h4><small>Titan Development Solutions</small></h4>
                    </div>
                    <!-- End Item -->
                    <div class="item">
                      <a href="#"><img src="http://placehold.it/254x150/ef5e55/f5f5f5/&text=New+Collection" class="img-responsive" alt="product 2"></a>
                      <h4><small>Titan Development Solutions</small></h4>
                    </div>
                    <!-- End Item -->
                    <div class="item">
                      <a href="#"><img src="http://placehold.it/254x150/2ecc71/f5f5f5/&text=New+Collection" class="img-responsive" alt="product 3"></a>
                      <h4 style="color:#ffffff"><small>Titan Development Solutions</small></h4>
                    </div>
                    <!-- End Item -->
                  </div>
                  <!-- End Carousel Inner -->
                </div>
                <!-- /.carousel -->
                <li class="divider"></li>
              </ul>
            </li>
            <li class="col-sm-3">
              <ul>
                <li class="dropdown-header">Administración</li>
                <li><a href="<?php echo site_url('Usuario/index')?>">Definición de Usuarios</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Mantención Maestros</li>
                <li><a href="<?php echo site_url('Maestro/clientes')?>">Maestros Clientes</a></li>
                <li><a href="<?php echo site_url('Maestro/maquinas')?>">Maestros Máquinas</a></li>
                <li><a href="<?php echo site_url('Maestro/operarios')?>">Maestros Operarios</a></li>
                <li><a href="<?php echo site_url('Maestro/razonessociales')?>">Maestros Razón Social</a></li>
              </ul>
            </li>
            <li class="col-sm-3">
              <ul>
                <li class="dropdown-header">Orden de Trabajo</li>
                <li><a href="<?php echo site_url('Ordendetrabajo/index')?>">Ingresar Orden de Trabajo</a></li>
                <li><a href="#">Modificar Orden de Trabajo</a></li>
                <li><a href="#">Eliminar Orden de Trabajo</a></li>
                <li><a href="#">Listado</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Facturación</li>
                <li><a href="<?php echo site_url('Facturacion/index')?>">Facturación por OT</a></li>
                <li><a href="#">Anulación de Factura</a></li>
                <li><a href="#">Listados</a></li>
              </ul>
            </li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav"><li><a href="<?php echo site_url('Welcome/logout')?>">Cerrar Sesión <span class="glyphicon glyphicon glyphicon-log-out"></span></a></li></ul>
    </div>
    <!-- /.nav-collapse -->
  </nav>
</div>

<script>
jQuery(document).on('click', '.mega-dropdown', function(e) {
  e.stopPropagation()
})
</script>