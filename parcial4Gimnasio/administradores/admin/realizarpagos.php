<?php
  require 'conexiondb.php';
  proteccionPagina();
  if (isset($_POST['nombre'])) {
    $nombre  = $_POST['nombre'];
    $consulta1 = "select * from datosusuario WHERE cambiar='$nombre'";
    $result1 = mysqli_query($con, $consulta1);
  }
  if (mysqli_affected_rows($con) == 1) {
    while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
      $nombre = $row1['nombre'];
      $foto  = $row1['addfoto'];
    }
  }
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
  	<script src="../../js/plugins/jquery-ui/jquery.ui.slider.js"></script>

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
    					<img src="../../img//login/logo.png" alt="" width="192" height="80" />
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
  					<div class="col-md-6 col-sm-8 clearfix"></div>
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
          <h3>Gimnasio FPI</h3>
          <hr/>
          <form action="enviarpagos.php" enctype="multipart/form-data" method="POST" role="form" class="form-horizontal form-groups-bordered">
      			<div class="form-group">
      				<label for="field-1" class="col-sm-3 control-label">Id Miembro :</label>
      					<div class="col-sm-5">
      						<input type="text" name="pid" value="<?php echo $nombre; ?>" class="form-control"  readonly/>
      					</div>
      			</div>
      			<div class="form-group">
      				<label for="field-1" class="col-sm-3 control-label">Nombre:</label>
      					<div class="col-sm-5">
      						<input type="text" name="pname" id="pname" class="form-control" data-rule-required="true" data-rule-minlength="4" value="<?php echo $nombre; ?>" placeholder="Member Name" maxlength="30" readonly/>
      					</div>
      			</div>
      			<div class="form-group">
      				<label for="field-1" class="col-sm-3 control-label">Foto:</label>
      					<div class="col-sm-5">
      						<img src='<?php echo $foto; ?>'>
      					</div>
      			</div>
      			<div class="form-group">
      				<label for="field-1" class="col-sm-3 control-label">Fecha:</label>
      					<div class="col-sm-5">
      						<input type="text" name="fecha" id="fecha" class="input-medium datepick" value="<?php echo date('Y-m-d'); ?>">
      					</div>
      			</div>
      			<div class="form-group">
      				<label for="field-1" class="col-sm-3 control-label">Tipo Membresia :</label>
      					<div class="col-sm-5">
      						<select name="tipomiembro" id="tipomiembro" data-rule-required="true" class="country">
      							<option value="">-- Porfavor seleccione --</option>
      							<?php
      							    $consulta = "select * from tiposmemoria";
      							    $result = mysqli_query($con, $consulta);
      							    if (mysqli_affected_rows($con) != 0) {
      							        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
      							            echo "<option value=" . $row['idtipomemoria'] . ">" . $row['nombrecontrato'] . "</option>";
      							        }
      							    }
      							?>
      						</select>
      					</div>
      			</div>
      			<div class="form-group">
      					<div class="col-sm-offset-3 col-sm-5">
      						<div class="ciudad"></div>
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

    <script type="text/javascript">
      var campotexto1 = new Spry.Widget.ValidationTextField("campotexto1");
      var campotexto2 = new Spry.Widget.ValidationTextField("campotexto2");
      var seleccion1 = new Spry.Widget.ValidationSelect("seleccion1");
      var campotexto3 = new Spry.Widget.ValidationTextField("campotexto3");
      var campotexto4 = new Spry.Widget.ValidationTextField("campotexto4");
      var seleccion2 = new Spry.Widget.ValidationSelect("seleccion2");
    </script>


  </body>
</html>
