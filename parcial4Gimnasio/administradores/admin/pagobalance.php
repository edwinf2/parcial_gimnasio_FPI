<?php
  require 'conexiondb.php';
  proteccionPagina();
  if (isset($_POST['nombre'])) {
      $factura = $_POST['nombre'];

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
        <h3>Balance Salarial</h3>
        <hr/>
        <form action="enviarpagobalance.php" enctype="multipart/form-data" method="POST" role="form" class="form-horizontal form-groups-bordered">
          <?php
            $consulta  = "select * from suscripcion WHERE factura='$factura'";
            $result = mysqli_query($con, $consulta);
            $contador    = 1;
            if (mysqli_affected_rows($con) == 1) {
              while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $nombre  = $row['nombre'];
                $total = $row['total'];
                $pagado  = $row['pagado'];
              }
            }
          ?>
          <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label">Nombre Miembro:</label>
            <div class="col-sm-5">
              <input type="text" name="nombre" value="<?php echo $nombre; ?>" class="form-control" readonly/>
            </div>
          </div>
          <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label">Factura:</label>
            <div class="col-sm-5">
              <input type="text" name="factura" id="factura" class="form-control" data-rule-required="true" data-rule-minlength="4" value ='<?php echo $factura; ?>' placeholder="Factura" maxlength="100"class="uneditable-input"  readonly>
            </div>
          </div>
          <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label">Total:</label>
            <div class="col-sm-5">
              <input type="text" name="total" id="total" class="form-control" data-rule-required="true" data-rule-minlength="1" placeholder="Total" value ='<?php echo $total; ?>'  onKeyPress="return checkIt(event)" maxlength="9">
            </div>
          </div>
          <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label">Pagado:</label>
            <div class="col-sm-5">
              <input type="text" name="pagado" id="pagado" class="form-control" data-rule-required="true" data-rule-minlength="10" placeholder="Pago" value ='<?php echo $pagado; ?>'  onKeyPress="return checkIt(event)" maxlength="10">
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
      var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
      var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
      var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1");
      var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
      var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
      var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2");
    </script>

  </body>
</html>
<?php
} else {
    echo "<meta http-equiv='refresh' content='0; url=nopagado.php'>";
}
?>
Access Denied
