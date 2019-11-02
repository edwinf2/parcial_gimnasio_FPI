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
    <link rel="stylesheet" href="../../css/plugins/jquery-ui/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="../../css/plugins/jquery-ui/smoothness/jquery.ui.theme.css">
    <link rel="stylesheet" href="../../css/plugins/fullcalendar/fullcalendar.css">
    <link rel="stylesheet" href="../../css/plugins/fullcalendar/fullcalendar.print.css" media="print">
    <link rel="stylesheet" href="../../css/plugins/tagsinput/jquery.tagsinput.css">
    <link rel="stylesheet" href="../../css/plugins/chosen/chosen.css">
    <link rel="stylesheet" href="../../css/plugins/multiselect/multi-select.css">
    <link rel="stylesheet" href="../../css/plugins/timepicker/bootstrap-timepicker.min.css">
    <link rel="stylesheet" href="../../css/plugins/colorpicker/colorpicker.css">
    <link rel="stylesheet" href="../../css/plugins/datepicker/datepicker.css">
    <link rel="stylesheet" href="../../css/plugins/plupload/jquery.plupload.queue.css">
    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/plugins/jquery-ui/jquery.ui.core.min.js"></script>
    <script src="../../js/plugins/jquery-ui/jquery.ui.widget.min.js"></script>
    <script src="../../js/plugins/jquery-ui/jquery.ui.mouse.min.js"></script>
    <script src="../../js/plugins/jquery-ui/jquery.ui.resizable.min.js"></script>
    <script src="../../js/plugins/jquery-ui/jquery.ui.spinner.js"></script>
    <script src="../../js/plugins/jquery-ui/jquery.ui.slider.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/plugins/datepicker/bootstrap-datepicker.js"></script>
    <script src="../../js/plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <script src="../../js/eakroko.min.js"></script>
    <script src="../../js/application.min.js"></script>
    <script src="../../js/demonstration.min.js"></script>

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
        <h3>Nueva Entrada</h3>
        <hr/>
        <form action="nuevoenvio.php" method="POST" class="form-horizontal form-groups-bordered">
    			<div class="form-group">
    				<label for="field-1" class="col-sm-3 control-label">ID Membresia :</label>
    					<div class="col-sm-5">
    						<input type="text" name="pid" value="<?php echo time(); ?>" class="form-control" readonly/>
    					</div>
    			</div>
    			<div class="form-group">
    				<label for="field-1" class="col-sm-3 control-label">Foto :</label>
    					<div class="col-sm-5">
    						<script language="JavaScript">
    								document.write( webcam.get_html(300, 220) );
    						</script>
    						<script language="JavaScript">
    						    webcam.set_api_url( 'test.php' );
    								webcam.set_quality( 100 ); // JPEG calidad (1 - 100)
    								webcam.set_shutter_sound( true ); // reproducir el sonido del clic del obturador
    								webcam.set_hook( 'onComplete', 'my_completion_handler' );
    								function take_snapshot(){
    									webcam.snap();
    								}
    						</script>
    						<input type="button"  class="btn btn-primary" value="Tomar Foto" onClick="take_snapshot()">
    					</div>
    			</div>
    			<div class="form-group">
    				<label for="field-1" class="col-sm-3 control-label">Nombre:</label>
    					<div class="col-sm-5">
    						<input type="text" name="pnombre" id="pnombre" class="form-control" data-rule-required="true" data-rule-minlength="4" placeholder="Nombre" maxlength="30" required>
    					</div>
    			</div>
    			<div class="form-group">
    				<label for="field-1" class="col-sm-3 control-label">Direccion :</label>
    					<div class="col-sm-5">
    						<input type="text" name="direccion" id="direccion" class="form-control" data-rule-required="true" data-rule-minlength="6" placeholder="direccion">
    					</div>
    			</div>
    			<div class="form-group">
    				<label for="field-1" class="col-sm-3 control-label">Codigo Postal :</label>
    					<div class="col-sm-5">
    						<input type="text" name="codigopostal" id="codigopostal" class="form-control" data-rule-required="true" data-rule-minlength="20" placeholder="codigo postal">
    					</div>
    			</div>
    			<div class="form-group">
    				<label for="field-1" class="col-sm-3 control-label">Fecha de Nacimiento :</label>
    					<div class="col-sm-5">
    						<input type="text" name="fechanacimiento" id="fechanacimiento" class="form-control datepicker" data-format="yyyy-m-d" required>
    					</div>
    			</div>
    			<div class="form-group">
    				<label for="field-1" class="col-sm-3 control-label">Edad :</label>
    					<div class="col-sm-5">
    						<input type="text" name="anios" id="anios" class="form-control" data-rule-required="true" data-rule-minlength="1" placeholder="Años" onKeyPress="return checkIt(event)" maxlength="3" required>
    					</div>
    			</div>
    			<div class="form-group">
    				<label for="field-1" class="col-sm-3 control-label">Sexo:</label>
    					<div class="col-sm-5">
    						<select name="sexo" id="sexo" data-rule-required="true" class="form-control">
    						    <option value="">-- Porfavor seleccione --</option>
    						    <option value="Male">Masculino</option>
    						    <option value="Female">Femenino</option>
    						</select>
    					</div>
    			</div>
    			<div class="form-group">
    				<label for="field-1" class="col-sm-3 control-label">Altura :</label>
    					<div class="col-sm-5">
    						<input type="text" name="altura" id="altura" class="form-control" data-rule-required="true" data-rule-minlength="1" placeholder="Altura"  maxlength="10"> (In  cms)
    					</div>
    			</div>
    			<div class="form-group">
    				<label for="field-1" class="col-sm-3 control-label">Peso :</label>
    					<div class="col-sm-5">
    						<input type="text" name="peso" id="peso" class="form-control" data-rule-required="true" data-rule-minlength="1" placeholder="Peso"  maxlength="10" required> (In Kgs)
    					</div>
    			</div>
    			<div class="form-group">
    				<label for="field-1" class="col-sm-3 control-label">Nacionalidad :</label>
    					<div class="col-sm-5">
    						<input type="text" name="nacionalidad" id="nacionalidad" class="form-control" data-rule-required="true" data-rule-minlength="6" placeholder="nacionalidad">
    					</div>
    			</div>
    			<div class="form-group">
    				<label for="field-1" class="col-sm-3 control-label">Contacto :</label>
    					<div class="col-sm-5">
    						<input type="text" name="contacto" id="contacto" class="form-control" data-rule-required="true" data-rule-minlength="12" placeholder="Contacto Phone" onKeyPress="return checkIt(event)" maxlength="12" required>
    					</div>
    			</div>
    			<div class="form-group">
    				<label for="field-1" class="col-sm-3 control-label">Correo Electronico:</label>
    					<div class="col-sm-5">
    						<input type="text" name="email"  id="email" class="form-control" data-rule-minlength="5" placeholder="E-Mail" maxlength="60">
    					</div>
    			</div>
    			<div class="form-group">
    				<label for="field-1" class="col-sm-3 control-label">Facebook Account:</label>
    					<div class="col-sm-5">
    						<input type="text" name="cuentaface"  id="cuentaface" class="form-control" data-rule-minlength="5" placeholder="Facebook" maxlength="60">
    					</div>
    			</div>

    			<div class="form-group">
    				<label for="field-1" class="col-sm-3 control-label">Cuenta Twitter:</label>
    					<div class="col-sm-5">
    						<input type="text" name="cuentatwiter"  id="cuentatwiter" class="form-control" data-rule-minlength="5" placeholder="Twitter" maxlength="60">
    					</div>
    			</div>
    			<div class="form-group">
    				<label for="field-1" class="col-sm-3 control-label">Telefono / Celular:</label>
    					<div class="col-sm-5">
    						<input type="text" name="contactopersona"  id="contactopersona" class="form-control" data-rule-minlength="5" placeholder="Contacto otra Persona" maxlength="60">
    					</div>
    			</div>
    			<div class="form-group">
    				<label for="field-1" class="col-sm-3 control-label">Gym Anterior:</label>
    					<div class="col-sm-5">
    						<input type="text" name="gimanterior"  id="gimanterior" class="form-control" data-rule-minlength="5" placeholder="Gym Anterior" maxlength="60">
    					</div>
    			</div>

    			<div class="form-group">
    				<label for="field-1" class="col-sm-3 control-label">Años Entrenando:</label>
    					<div class="col-sm-5">
    						<input type="text" name="tiempoentrenar"  id="tiempoentrenar" class="form-control" data-rule-minlength="5" placeholder="Años de entrenar" maxlength="60">
    					</div>
    			</div>
    			<div class="form-group">
    				<label for="field-1" class="col-sm-3 control-label">Identificacion:</label>
    					<div class="col-sm-5">
    						<select name="prueba" id="prueba" data-rule-required="true" class="form-control">
  							    <option value="">-- Porfavor seleccione --</option>
  							    <option value="dui">DUI</option>
    								<option value="licenciaconducir">Licencia de Conducir</option>
    								<option value="pasaporte">Pasaporte</option>
    								<option value="dueuniversidad">Universidad /Escuela ID</option>
    								<option value="otros">Otros</option>
    						</select>
    					</div>
    			</div>
    			<div class="form-group">
    				<label for="field-1" class="col-sm-3 control-label">InscripcionFecha :</label>
    					<div class="col-sm-5">
    						<input type="text" name="fecha" id="fecha" value="<?php echo date('Y-m-d'); ?>">
    					</div>
    			</div>
    			<div class="form-group">
    				<label for="field-1" class="col-sm-3 control-label">Tipo Membresia:</label>
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
    						<span class="selectRequiredMsg">Por favor seleccione un articulo</span>
    					</div>
    			</div>
    			<div class="form-group">
    					<div class="col-sm-offset-3 col-sm-5">
    						<div class="city"></div>
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
    <script src="../../js/neonjs/bootstrap-datepicker.js" id="script-resource-11"></script>

    <script type="text/javascript">
      var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
      var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
      var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1");
      var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
      var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
      var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2");
    </script>

  </body>
</html>
