<?php
  require 'conexiondb.php';
  proteccionPagina();

  if (isset($_POST['from'])) {

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

  	<link rel="stylesheet" href="../../css/bootstrap.min.css">
  	<link rel="stylesheet" href="../../css/bootstrap-responsive.min.css">
  	<link rel="stylesheet" href="../../css/plugins/jquery-ui/smoothness/jquery-ui.css">
  	<link rel="stylesheet" href="../../css/plugins/jquery-ui/smoothness/jquery.ui.theme.css">
  	<link rel="stylesheet" href="../../css/plugins/datatable/TableTools.css">
  	<link rel="stylesheet" href="../../css/plugins/chosen/chosen.css">
  	<link rel="stylesheet" href="../../css/style.css">
  	<link rel="stylesheet" href="../../css/themes.css">
  	<script src="../../js/jquery.min.js"></script>
  	<script src="../../js/plugins/jquery-ui/jquery.ui.core.min.js"></script>
  	<script src="../../js/plugins/jquery-ui/jquery.ui.widget.min.js"></script>
  	<script src="../../js/plugins/jquery-ui/jquery.ui.mouse.min.js"></script>
  	<script src="../../js/plugins/jquery-ui/jquery.ui.resizable.min.js"></script>
  	<script src="../../js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
  	<script src="../../js/bootstrap.min.js"></script>
  	<script src="../../js/plugins/bootbox/jquery.bootbox.js"></script>
  	<script src="../../js/plugins/datatable/jquery.dataTables.min.js"></script>
  	<script src="../../js/plugins/datatable/TableTools.min.js"></script>
  	<script src="../../js/plugins/datatable/ColReorder.min.js"></script>
  	<script src="../../js/plugins/datatable/ColVis.min.js"></script>
  	<script src="../../js/plugins/chosen/chosen.jquery.min.js"></script>
  	<script src="../../js/eakroko.min.js"></script>
  	<script src="../../js/application.min.js"></script>
  	<script src="../../js/demonstration.min.js"></script>

  </head>
  <body class="page-body  page-fade">
    <div class="page-container">
      <div class="sidebar-menu">
        <header class="logo-env">
          <div class="logo">
            <a href="main.php">
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
        <?php include('navegacion.php'); ?>
      </div>
      <div class="main-content">
        <div class="row">
          <div class="col-md-6 col-sm-8 clearfix"> </div>
          <div class="col-md-6 col-sm-4 clearfix hidden-xs">
            <ul class="list-inline links-list pull-right">
              <li>
                Bienvenido <?php echo $_SESSION['nombrecompleto']; ?>
              </li>
              <li>
                <a href="cerrarsesion.php">
                  Cerrar Sesión<i class="entypo-logout right"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <h3>Miembros</h3>
        <hr/>
        <?php
            $de = $_POST['de'];
            $para   = $_POST['para'];
        ?>
        Miembros de :

    		<?php
    		    echo $de;
    		?>   A : <?php
    		    echo $para;
    		?>

        <table class="table table-bordered datatable" id="table-1">
          <thead>
            <tr>
              <th>S.No</th>
              <th>ID Membresia</th>
              <th>Nombre</th>
              <th>Edad / Sexo</th>
              <th>Inscripcion</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $consulta  = "select * from datosusuario WHERE fechainscripcion BETWEEN '$de' AND '$para'";
              $result = mysqli_query($con, $consulta);
              $contador    = 1;
              if (mysqli_affected_rows($con) != 0) {
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                  echo "<tr><td>" . $contador . "</td>";
                  echo "<td>" . $row['cambiar'] . "</td>";
                  echo "<td>" . $row['nombre'] . "</td>";
                  echo "<td>" . $row['anios'] . " / " . $row['sex'] . "</td>";
                  echo "<td>" . $row['fechainscripcion'] . "</td>";
                  $contador++;
                }
              }
            ?>
          </tbody>
        </table>
        <h4>Total de miembros en este rango de fechas :<?php echo $contador - 1; ?></h4>
        <?php
  				    $de = $_POST['de'];
  				    $para   = $_POST['para'];
  			?>
        Pagos de Miembros de:
        <?php
  				    echo $de;
  			?>   A :
        <?php
  				    echo $para;
  			?>

        <table class="table table-bordered datatable" id="table-1">
          <thead>
            <tr>
              <th>S.No</th>
              <th>ID Membresia</th>
              <th>Nombre</th>
              <th>Edad / Sexo</th>
              <th>Inscripcion</th>
            </tr>
          </thead>
          <tbody>
            <?php
                $consulta= "select * from suscripcion WHERE fechapago BETWEEN '$de' AND '$para'";
                $result = mysqli_query($con, $consulta);
                $contador    = 1;
                $total  = 0;
                if (mysqli_affected_rows($con) != 0) {
                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        echo "<tr><td>" . $contador . "</td>";
                        echo "<td>" . $row['idmiembro'] . "</td>";
                        echo "<td>" . $row['nombre'] . "</td>";
                        echo "<td>" . $row['total'] . " / " . $row['paid'] . "</td>";
                        echo "<td>" . $row['expiracion'] . "</td>";
                        echo "<td>" . $row['fechapago'] . "</td>";
                        echo "<td>" . $row['factura'] . "</td>";
                        $total = $total + $row['total'];
                        $contador++;
                    }
                }
            ?>
          </tbody>
        </table>
        <h4>Pagos totales en este rango de fechas:<?php echo $contador - 1; ?></h4>
        <h4>Ingreso total en este rango de fechas :<?php echo $total;?></h4>

        <?php include('piepagina.php'); ?>
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
  	<link rel="stylesheet" href="../../js/neonjs/select2/select2-bootstrap.css"  id="style-resource-1">
  	<link rel="stylesheet" href="../../js/neonjs/select2/select2.css"  id="style-resource-2">
  	<script src="../../js/neonjs/jquery.dataTables.min.js" id="script-resource-7"></script>
  	<script src="../../js/neonjs/dataTables.bootstrap.js" id="script-resource-8"></script>
  	<script src="../../js/neonjs/select2/select2.min.js" id="script-resource-9"></script>
  	<script src="../../js/neonjs/bootstrap-datepicker.js" id="script-resource-11"></script>

    <script type="text/javascript">
      var campotexto1 = new Spry.Widget.ValidationTextField("campotexto1");
      var campotexto2 = new Spry.Widget.ValidationTextField("campotexto2");
      var seleccion1 = new Spry.Widget.ValidationSelect("seleccion1");
      var campotexto3 = new Spry.Widget.ValidationTextField("campotexto3");
      var campotexto4 = new Spry.Widget.ValidationTextField("campotexto5");
      var seleccion2 = new Spry.Widget.ValidationSelect("seleccion2");
    </script>

  </body>
</html>
<?php
}

?>
