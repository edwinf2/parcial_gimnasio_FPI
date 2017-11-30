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
      $(document).ready(function()
      {
      $(".pais1").change(function()
      {
      var id=$(this).val();
      var dataString = 'id='+ id;

      $.ajax
      ({
      type: "POST",
      url: "ajaxciudad1.php",
      data: dataString,
      cache: false,
      success: function(html)
      {
      $(".ciudad1").html(html);
      }
      });

      });
      });

    </script>
  </head>
  <body class="page-body  page-fade">
    <div class="age-container">
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

        <h3>Estado de Salud</h3>
        <form action="enviarsaludnueva.php" enctype="multipart/form-data" method="POST" role="form" class="form-horizontal form-groups-bordered">
    			<div class="form-group">
    				<label class="col-sm-3 control-label">Id</label>
    					<div class="col-sm-5">
    							<select name="id" id="id" class="select2" >
    								<option value="">-- Porfavor seleccione --</option>
    												<?php
    													$consulta  = "select * from datosusuario";
    													$result = mysqli_query($con, $consulta);
    													if (mysqli_affected_rows($con) != 0) {
    													    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    															echo "<option value=" . $row['id'] . ">" . $row['id'] . "</option>";
    													    }
    													}
    												?>
    							</select>
    					</div>
    			</div>
    			<div class="form-group">
    				<label class="col-sm-3 control-label">Nombre</label>
    					<div class="col-sm-5">
    							<select name="nombre" id="nombre" class="select2" >
    								<option value="">-- Porfavor seleccione --</option>
    												<?php
    													$consulta  = "select * from datosusuario";
    													$result = mysqli_query($con, $consulta);
    													if (mysqli_affected_rows($con) != 0) {
    													    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    															echo "<option value=" . $row['id'] . ">" . $row['nombre'] . "</option>";
    													    }
    													}
    												?>
    							</select>
    						</div>
    			</div>
    			<div class="form-group">
    				<label for="field-1" class="col-sm-3 control-label">Fecha:</label>
    					<div class="col-sm-5">
    						<input type="text" name="fecha1" id="fecha1" class="form-control datepicker" value="<?php echo date('Y-m-d'); ?>">
    					</div>
    			</div>
    			<div class="form-group">
    				<label for="field-1" class="col-sm-3 control-label">Grasa corporal:</label>
    					<div class="col-sm-5">
    						<input type="text" name="grasacorporal" id="grasacorporal" class="form-control" placeholder="Grasa Corporal" >
    					</div>
    			</div>
    			<div class="form-group">
    				<label for="field-1" class="col-sm-3 control-label">Agua:</label>
    					<div class="col-sm-5">
    						<input type="text" name="agua" id="agua" class="form-control" placeholder="Agua" >
    					</div>
    			</div>
    			<div class="form-group">
    				<label for="field-1" class="col-sm-3 control-label">Musculo:</label>
    					<div class="col-sm-5">
    						<input type="text" name="musculo" id="musculo" class="form-control" placeholder="Musculo" >
    					</div>
    			</div>
    			<div class="form-group">
    				<label for="field-1" class="col-sm-3 control-label">Calorias:</label>
    					<div class="col-sm-5">
    						<input type="text" name="calorias" id="calorias" class="form-control" placeholder="Calorias" >
    					</div>
    			</div>

    			<div class="form-group">
    				<label for="field-1" class="col-sm-3 control-label">Hueso:</label>
    					<div class="col-sm-5">
    						<input type="text" name="hueso" id="hueso" class="form-control" placeholder="Hueso" >
    					</div>
    			</div>

    			<div class="form-group">
    				<label for="field-1" class="col-sm-3 control-label">Observaciones:</label>
    					<div class="col-sm-5">
    						<input type="text" name="observaciones" id="observaciones" class="form-control" placeholder="Observaciones" >
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
    <script src="../../js/neonjs/select2/select2.min.js" id="script-resource-7"></script>
    <link rel="stylesheet" href="../../js/neonjs/select2/select2-bootstrap.css"  id="style-resource-1">
    <link rel="stylesheet" href="../../js/neonjs/select2/select2.css"  id="style-resource-2">
    <link rel="stylesheet" href=".../../js/neonjs/selectboxit/jquery.selectBoxIt.css"  id="style-resource-3">
    <link rel="stylesheet" href="../../js/neonjs/daterangepicker/daterangepicker-bs3.css"  id="style-resource-4">

  </body>
</html>
