<?php
  require 'conexiondb.php';
  proteccionPagina();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Administracion de Gimnasio</title>

    <link rel="stylesheet" href="../../js/neonjs/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css"  id="style-resource-1">
    <link rel="stylesheet" href="../../css/neoncss/font-icons/entypo/css/entypo.css"  id="style-resource-2">
    <link rel="stylesheet" href="../../css/neoncss/font-icons/entypo/css/animation.css"  id="style-resource-3">
    <link rel="stylesheet" href="../../css/neoncss/neon.css"  id="style-resource-5">
    <link rel="stylesheet" href="../../css/neoncss/custom.css"  id="style-resource-6">

    <script src="../../js/neonjs/jquery-1.10.2.min.js"></script>

  </head>
  <body class="page-body  page-fade">

    <div class="container">
      <div class="sidebar-menu">
        <header class="logo-env">
          <div class="logo">
            <a href="index.php">
              <img src="../../img/login/logo.png" alt="" width="192" height="80" />
            </a>
          </div>
          <div class="sidebar-collapse">
            <a href="#" class="sidebar-collapse-icon with-animation">
              <i class="entypo-menu"></i>
            </a>
          </div>
          <div class="sidebar-mobile-menu visible-xs">
            <a href="#" class="with-animation">
              <i class="entypo-menu"></i>
            </a>
          </div>
        </header>
        <?php include('navegacion.php') ?>
      </div>
      <div class="main-content">
        <div class="row">
          <div class="col-md-6 col-sm-8 clearfix"></div>
          <div class="col-md-6 col-sm-4 clearfix hidden-xs">
            <ul class="list-inline links-list pull-right">
              <li>
                Bienvenido <?php echo $_SESSION['nombrecompleto']; ?>
              </li>
              <li>
                <a href="cerrarsesion.php">
                  Cerrar Sesion <i class="entypo-logout right"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <h2>Gimnasio FPI</h2>
        <hr>
        <div class="col-sm-3">
          <div class="tile-stats tile-red">
            <div class="icon">
              <i class="entypo-users"></i>
            </div>
            <div class="num" data-postfix="" data-duration="1500" data-delay="0">
              <h2>Ingresos al mes: </h2>
              $
              <?php
                $fecha=date('Y-m');
                $consulta="select * from suscripcion WHERE  fechapago LIKE '$fecha%'";
                $result  = mysqli_query($con, $consulta);
  							$ingreso = 0;
  							if (mysqli_affected_rows($con) != 0) {
  							    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
  							        $ingreso = $row['pagado'] + $ingreso;
  							    }
  							}
  							echo $ingreso;
              ?>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="tile-stats tile-green">
            <div class="icon">
              <i class="entypo-chart-bar"></i>
            </div>
            <div class="num" data-postfix="" data-duration="1500" data-delay="0">
              <h2>Total <br> Miembros</h2><br>

              <?php
                $fecha  = date('Y-m');
                $consulta = "select COUNT(*) from datosusuario WHERE esperar='no'";
                $result = mysqli_query($con, $consulta);
                $i      = 1;
                if (mysqli_affected_rows($con) != 0) {
                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        echo $row['COUNT(*)'];
                    }
                }
                $i = 1;
              ?>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
  				<div class="tile-stats tile-aqua">
  					<div class="icon"><i class="entypo-mail"></i></div>
  						<div class="num" data-postfix="" data-duration="1500" data-delay="0">
  						<h2>Inscritos este Mes</h2><br>
  							<?php
      							$fecha  = date('Y-m');
      							$consulta = "select COUNT(*) from datosusuario WHERE esperar='no'";
      							$result = mysqli_query($con, $consulta);
      							$i      = 1;
      							if (mysqli_affected_rows($con) != 0) {
      							    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
      							        echo $row['COUNT(*)'];
      							    }
      							}
      							$i = 1;
  							?>
  						</div>
  				</div>
  			</div>
        <div class="col-sm-3">
  				<div class="tile-stats tile-blue">
  					<div class="icon"><i class="entypo-rss"></i></div>
  						<div class="num" data-postfix="" data-duration="1500" data-delay="0">
  						<h2>Ingresos este Mes</h2><br>
  							$
                <?php
      							$fecha  = date('Y-m');
      							$consulta = "select * from suscripcion WHERE  fechapago LIKE '$fecha%'";
      							$result  = mysqli_query($con, $consulta);
      							$ingreso = 0;
      							if (mysqli_affected_rows($con) != 0) {
      							    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
      							        $ingreso = $row['total'] + $ingreso;
      							    }
      							}
      							echo $ingreso;
  							?>
  						</div>
  				</div>
  			</div>

        <?php include('piepagina.php') ?>
      </div>
    </div>

    <script src="../../js/neonjs/gsap/main-gsap.js" id="script-resource-1"></script>
    <script src="../../js/neonjs/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js" id="script-resource-2"></script>
    <script src="../../js/neonjs/bootstrap.min.js" id="script-resource-3"></script>
    <script src="../../js/neonjs/joinable.js" id="script-resource-4"></script>
    <script src="../../js/neonjs/resizeable.js" id="script-resource-5"></script>
    <script src="../../js/neonjs/neon-api.js" id="script-resource-6"></script>
    <script src="../../js/neonjs/jquery.validate.min.js" id="script-resource-7"></script>
    <script src="../../js/neonjs/neon-login.js" id="script-resource-8"></script>
    <script src="../../js/neonjs/neon-custom.js" id="script-resource-9"></script>
    <script src="../../js/neonjs/neon-demo.js" id="script-resource-10"></script>


  </body>
</html>
