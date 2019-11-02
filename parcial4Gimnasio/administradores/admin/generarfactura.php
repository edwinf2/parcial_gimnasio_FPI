<?php
  require 'conexiondb.php';

  if (isset($_POST['nombre'])) {
      $fecha;
      $idmiembro;
      $anios;
      $nombrecompleto;
      $sexo;
      $altura;
      $peso;
      $total;
      $pagado;
      $expiracion;
      $nombretiposuscripcion;
      $factura = $_POST['nombre'];

      $query1 = "select * from suscripcion WHERE factura='$factura'";

      $result1 = mysqli_query($con, $query1);

      if (mysqli_affected_rows($con) == 1) {
          while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
              $idmiembro         = $row1['idmiembro'];
              $nombrecompleto     = $row1['nombre'];
              $nombretiposuscripcion = $row1['nombretiposuscripcion'];
              $total         = $row1['total'];
              $pagado          = $row1['pagado'];
              $expiracion        = $row1['expiracion'];
              $fecha          = $row1['fechapago'];

              $query11  = "select * from datosusuario WHERE cambiar='$idmiembro'";
              $result11 = mysqli_query($con, $query11);
              if (mysqli_affected_rows($con) == 1) {
                  while ($row11 = mysqli_fetch_array($result11, MYSQLI_ASSOC)) {

                      $anios    = $row11['anios'];
                      $sexo    = $row11['sexo'];
                      $altura = $row11['altura'];
                      $peso = $row11['peso'];
                  }
              }
          }
      }
      $query1 = "select * from tiposmemoria WHERE nombre='$nombretiposuscripcion'";

      $result1 = mysqli_query($con, $query1);
      if (mysqli_affected_rows($con) == 1) {
          while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
              $tipomiembro = $row1['nombre'];
              $detalles   = $row1['detalles'];
              $dias      = $row1['dias'];
          }
      }
  } else {
      echo "<meta http-equiv='refresh' content='0; url=vermiembro.php'>";

  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    title>Recibo</title>
		<link rel="stylesheet" href="style.css">
		<script src="script.js"></script>
 <script type="text/javascript" src="jquery-1.3.2.min.js"></script>
    <script type="text/javascript" src="jquery-barcode.js"></script>
    <script type="text/javascript">

      function generateBarcode(){
        var value = "<?php echo $factura;?>";
        var btype = "code128";
        var renderer = "css";

		var quietZone = false;
        if ($("#quietzone").is(':checked') || $("#quietzone").attr('checked')){
          quietZone = true;
        }

        var settings = {
          output:renderer,
          bgColor: $("#bgColor").val(),
          color: $("#color").val(),

          moduleSize: $("#moduleSize").val(),
          posX: $("#posX").val(),
          posY: $("#posY").val(),
          addQuietZone: $("#quietZoneSize").val()
        };
        if ($("#rectangular").is(':checked') || $("#rectangular").attr('checked')){
          value = {code:value, rect: true};
        }
        if (renderer == 'canvas'){
          clearCanvas();
          $("#barcodeTarget").hide();
          $("#canvasTarget").show().barcode(value, btype, settings);
        } else {
          $("#canvasTarget").hide();
          $("#barcodeTarget").html("").show().barcode(value, btype, settings);
        }
      }

      function showConfig1D(){
        $('.config .barcode1D').show();
        $('.config .barcode2D').hide();
      }

      function showConfig2D(){
        $('.config .barcode1D').hide();
        $('.config .barcode2D').show();
      }

      function clearCanvas(){
        var canvas = $('#canvasTarget').get(0);
        var ctx = canvas.getContext('2d');
        ctx.lineWidth = 1;
        ctx.lineCap = 'butt';
        ctx.fillStyle = '#FFFFFF';
        ctx.strokeStyle  = '#000000';
        ctx.clearRect (0, 0, canvas.width, canvas.height);
        ctx.strokeRect (0, 0, canvas.width, canvas.height);
      }

      $(function(){
        $('input[name=btype]').click(function(){
          if ($(this).attr('id') == 'datamatrix') showConfig2D(); else showConfig1D();
        });
        $('input[name=renderer]').click(function(){
          if ($(this).attr('id') == 'canvas') $('#miscCanvas').show(); else $('#miscCanvas').hide();
        });
        generateBarcode();
      });

    </script>
  </head>
  <body>
    <header>
			<a href="vermiembro.php"><h1>factura</h1></a>
      <address>
        <p>Gimnasio FPI</p>
        <p>Santa Ana</p>
        <br><p><div id="barcodeTarget" class="barcodeTarget"></div>
          <canvas id="canvasTarget"></canvas> </span>
      </address>
			<span><img alt="" src="../../img/login/logo.png">
		</header>
    <article>
      <img alt="" src="pic1.jpg" width="100" height="100">
      <table class="meta">
        <tr>
          <th><span  >Recibo #</span></th>
          <td><span  ><?php echo $factura;?></span></td>
        </tr>
        <tr>
        <th><span  >Fecha</span></th>
        <td><span  ><?php echo $fecha;?></span></td>
        </tr>
        <tr>
        <th><span  >ID Miembro / Reg ID</span></th>

        <td><?php $regid = substr($idmiembro, 6, 10);
                echo $idmiembro . " / " . $regid; ?></span></td>
        </tr>
      </table>
      <table class="meta">
      <tr>
      <th><span  >Nombre</span></th>
      <td><span  ><?php echo $nombrecompleto; ?></span></td>
      </tr>
      <tr>
      <th><span  >Edad, Sexo</span></th>
      <td><span  ><?php echo $anios . " / " . $sexo;?></span></td>
      </tr>
      <tr>
      <th><span  >Altura / Peso</span></th>
      <td><?php echo $altura . " cms / " . $peso . " Kg";?></span></td>
      </tr>
      </table>
      <table class="inventory">
      <thead>
      <tr>
      <th><span  >Tipo Membresia</span></th>
      <th><span  >Detalles</span></th>
      <th><span  >Expiracion de suscripción</span></th>

      </tr>
      </thead>

      <tbody>
      <tr>
      <td><span  ><?php echo $nombretiposuscripcion; ?></span></td>
      <td><span  ><?php echo $detalles;?></span></td>
      <td><span  ><?php echo $expiracion; ?></span></td>
      </tr>
      </tbody>
      </table>
      <table class="balance">
      <tr>
      <th><span  >Total</span></th>
      <td><span data-prefix>$</span><span><?php echo $total;?></span></td>
      </tr><tr>
      <th><span  >Pagado</span></th>
      <td><span data-prefix>$</span><span><?php echo $pagado; ?></span></td>
      </tr><tr>
      <th><span  >Deuda</span></th>
      <td><span data-prefix>$</span><span><?php echo $total - $pagado;?></span></td>
      </tr>
      </table>
      </article>
    <center>
      <br><br><a href="vermiembro.php">Gimnasio FPI
    </center>
  </body>
</html>
