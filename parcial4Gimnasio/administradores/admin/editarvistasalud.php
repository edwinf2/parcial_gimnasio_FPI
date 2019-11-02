<?php
  require 'conexiondb.php';
  proteccionPagina();
  if (isset($_POST['nombre'])) {
      $id = $_POST['nombre'];
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
  	<script src="../../js/eakroko.min.js"></script>
  	<script src="../../js/application.min.js"></script>
  	<script src="../../js/demonstration.min.js"></script>
    <script src="../../js/neonjs/jquery-1.10.2.min.js"></script>
  	<script src="../../js/plugins/jquery-ui/jquery.ui.core.min.js"></script>
  	<script src="../../js/plugins/jquery-ui/jquery.ui.widget.min.js"></script>
  	<script src="../../js/plugins/jquery-ui/jquery.ui.mouse.min.js"></script>
  	<script src="../../js/plugins/jquery-ui/jquery.ui.resizable.min.js"></script>
  	<script src="../../js/plugins/jquery-ui/jquery.ui.spinner.js"></script>
	  <script src="../../js/ plugins/jquery-ui/jquery.ui.slider.js"></script>

    <script type="text/javascript">
      $(document).ready(function(){
        $(".pais").change(function(){
          var id=$(this).val();
          var dataString = 'id='+ id;

          $.ajax({
            type: "POST",
            url: "ajaxciudad.php",
            data: dataString,
            cache: false,
            success: function(html){
              $(".ciudad").html(html);
            }
          });
        });
      });
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
        $(".pais1").change(function(){
          var id=$(this).val();
          var dataString = 'id='+ id;

          $.ajax({
            type: "POST",
            url: "ajaxciudad1.php",
            data: dataString,
            cache: false,
            success: function(html){
              $(".ciudad1").html(html);
            }
          });
        });
      });

    </script>
    <SCRIPT LANGUAGE="JavaScript">
  		function checkIt(evt) {
  		    evt = (evt) ? evt : window.event
  		    var charCode = (evt.which) ? evt.which : evt.keyCode
  		    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
  		        status = "Este campo solo acepta números."
  		        return false
  		    }
  		    status = ""
  		    return true
  		}
	   </SCRIPT>
     <script type="text/javascript" src="webcam.js"></script>
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
        <h3>Editar detalles del plan</h3>
        <hr/>
        <form action="enviarsaludeditada.php" enctype="multipart/form-data" method="POST" role="form" class="form-horizontal form-groups-bordered">

          <?php
            $consulta  = "select * from estadosalud WHERE id='$id'";
            $result = mysqli_query($con, $consulta);
            $contador= 1;
            if (mysqli_affected_rows($con) == 1) {
              while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $id    = $row['id'];
                $nombre    = $row['nombre'];
                $fecha1    = $row['fecha1'];
                $grasacorporal = $row['grasacorporal'];
                $agua = $row['agua'];
                $musculo = $row['musculo'];
                $calorias = $row['calorias'];
                $hueso = $row['hueso'];
                $observaciones = $row['observaciones'];
              }
            }
          ?>
          <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label">ID:</label>
            <div class="col-sm-5">
              <input type="text" name="id" value="<?php echo $id; ?>" class="form-control" readonly/>
            </div>
          </div>
          <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label">Nombre:</label>
            <div class="col-sm-5">
              <input type="text" name="nombre" id="nombre" class="form-control" value ='<?php echo $nombre; ?>' placeholder="Nombre" >
            </div>
          </div>
          <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label">Fecha :</label>
            <div class="col-sm-5">
            <input type="text" name="fecha1"  id="fecha1" class="form-control" value ='<?php echo $fecha1; ?>'  placeholder="Fecha" readonly>
            </div>
          </div>
          <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label">Grasa Corporal:</label>
            <div class="col-sm-5">
              <input type="text" name="grasacorporal" id="grasacorporal" class="form-control" placeholder="grasa corporal" value ='<?php echo $grasacorporal; ?>' >
            </div>
          </div>
          <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label">Agua:</label>
            <div class="col-sm-5">
              <input type="text" name="agua" id="agua" class="form-control" placeholder="agua" value ='<?php echo $agua; ?>'>
            </div>
          </div>
          <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label">Musculo:</label>
            <div class="col-sm-5">
              <input type="text" name="musculo" id="musculo" class="form-control" placeholder="Musculo" value ='<?php echo $musculo; ?>' >
            </div>
          </div>
          <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label">Calorias:</label>
            <div class="col-sm-5">
              <input type="text" name="calorias" id="calorias" class="form-control" placeholder="Calorias" value ='<?php echo $calorias; ?>'>
            </div>
          </div>
          <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label">Hueso:</label>
            <div class="col-sm-5">
              <input type="text" name="hueso" id="hueso" class="form-control" placeholder="hueso" value ='<?php echo $hueso; ?>' >
            </div>
          </div>
          <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label">Observaciones:</label>
            <div class="col-sm-5">
              <input type="text" name="observaciones" id="observaciones" class="form-control" placeholder="observaciones" value ='<?php echo $observaciones; ?>'>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-5">
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </div>
          </div>
        </form>
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

  </body>
</html>
<?php
} else {
    echo "<meta http-equiv='refresh' content='0; url=versalud.php'>";
}
?>
Acceso Denegado
