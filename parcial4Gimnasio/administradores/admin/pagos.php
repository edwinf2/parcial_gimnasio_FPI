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
        <h2>Pagos</h2>
        <hr/>
        <table class="table table-bordered datatable" id="tabla1">
    			<thead>
    				<tr>
    					<th>Expiracion Membresia</th>
    					<th>Nombre / ID Miembro</th>
    					<th>Direccion / Contacto</th>
    					<th>Prueba</th>
    					<th>Correo Electronico/ Edad / Sexo</th>
    					<th>Altura / Peso</th>
    					<th>Altura / Peso</th>
    					<th>Accion</th>
    				</tr>
    			</thead>
    			<tbody>
    				<?php
    					$consulta  = "select * from datosusuario ORDER BY fechainscripcion DESC";
    					$result = mysqli_query($con, $consulta);
    					$contador    = 1;
    					if (mysqli_affected_rows($con) != 0) {
    					    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    					        $cambiar   = $row['cambiar'];
    					        $consulta1  = "select * from suscripcion WHERE idmiembro='$cambiar' AND renovacion='yes'";
    					        $result1 = mysqli_query($con, $consulta1);
    					        if (mysqli_affected_rows($con) == 1) {
    					            while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {


    					                echo "<tr><td>" . $row1['expiracion'] . "</td>";
    					                $expiracion        = $row1['expiracion'];
    					                $nombretiposuscripcion = $row1['nombretiposuscripcion'];
    					                echo "<td>" . $row['nombre'] . " / " . $row['cambiar'] . "<img src='" . $row['addfoto'] . "'></td>";
    					                echo "<td>" . $row['direccion'] . " / " . $row['contacto'] . "</td>";
    					                echo "<td>" . $row['prueba'] . " / " . $row['otraprueba'] . "</td>";
    					                echo "<td>" . $row['email'] . " / " . $row['anios'] . " / " . $row['sexo'] . "</td>";
    					                echo "<td>" . $row['altura'] . " / " . $row['peso'] . "</td>";
    					                echo "<td>" . $row['fechainscripcion'] . " / " . $row1['nombretiposuscripcion'] . "</td>";

    					                $contador++;

    					                echo "<td><form action='realizarpagos.php' method='post'><input type='hidden' name='nombre' value='" . $cambiar . "'/><input type='submit' value='Agregar pago ' class='btn btn-info'/></form></td></tr>";
    					                $cambiar = 0;
				                  }
				              }
				          }
				      }
    				?>
    			</tbody>
    		</table>
        <script type="text/javascript">
          jQuery(document).ready(function($){
            $("#tabla1").dataTable({
              "sPaginationType": "bootstrap",
              "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
              "bStateSave": true
            });
            $(".dataTables_wrapper select").select2({
              minimumResultsForSearch: -1
            });
          });
        </script>
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
