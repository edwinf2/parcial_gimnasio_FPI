<?php
  require 'conexiondb.php';
  proteccionPagina();
  if (isset($_POST['pid'])) {
      function getRandomWord($len = 3)
      {
          $word = array_merge(range('a', 'z'), range('0', '9'));
          shuffle($word);
          return substr(implode($word), 0, $len);
      }
      $nombre    = $_POST['pid'];
      $tipomiembro = $_POST['tipomiembro'];
      $consulta1 = "select * from tiposmemoria WHERE idtipomemoria='$tipomiembro'";
      $result1 = mysqli_query($con, $consulta1);

      if (mysqli_affected_rows($con) == 1) {
          while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {

              $tiponombre = $row1['nombrecontrato'];
              $detalles   = $row1['detalles'];
              $dias      = $row1['dias'];


          }
      }
      $consulta2 = "select * from datosusuario WHERE cambiar='$nombre'";
      $result2 = mysqli_query($con, $consulta2);

      if (mysqli_affected_rows($con) == 1) {
          while ($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {

              $nombrecompleto = $row2['nombre'];
              $anios       = $row2['anios'];
              $sexo       = $row2['sexo'];
              $altura    = $row2['altura'];
              $peso    = $row2['peso'];


          }
      }
      $factura   = substr(time(), 2, 10) . getRandomWord();
      $fecha      = $_POST['fecha'];
      $nombrecompleto = rtrim($_POST['pname']);
      $total     = $_POST['total'];
      $pagado      = $_POST['pagado'];
      $modofecha  = strtotime($fecha . "+ $dias dias");
      $expiry    = date("Y-m-d", $modofecha);
      $esperar      = "no";
      $tiempo      = $dias * 86400;
      $tiempoexpira  = $tiempo + strtotime($fecha);
      $balance       = $total - $pagado;
      mysqli_query($con, "UPDATE suscripcion SET renovacion='no' WHERE renovacion='yes' AND idmiembro='$nombre'");
      mysqli_query($con, "INSERT INTO subsciption (idmiembro,nombre,tiposuscripcion,fechapago,total,pagado,expiracion,factura,nombretiposuscripcion,balance,tiempoexpira,renovacion)
  VALUES ('$nombre','$nombrecompleto','$tipomiembro','$fecha','$total','$pagado','$expiry','$factura','$tiponombre','$balance','$tiempoexpira','yes')");
      echo "<head><script>alert('Pago agregado,');</script></head></html>";



  } else {
      echo "<head><script>alert('Pago NO agregado, Revisar otra vez');</script></head></html>";
      echo "<meta http-equiv='refresh' content='0; url=nuevoregistro.php'>";

  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Recibo</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    <script type="text/javascript" src="jquery-1.3.2.min.js"></script>
    <script type="text/javascript" src="jquery-barcode.js"></script>
    <script type="text/javascript">
    unction generarBarra(){
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
      generarBarra();
    });
    </script>

  </head>
  <body>
    <header>
			<a href="pagos.php"><h1>Factura (Pagos)</h1></a>
      <address>
        <p>Gimnasio FPI</p>
        <p>UES Santa Ana</p>
        <p></p><br><p><div id="barcodeTarget" class="barcodeTarget"></div>
        <span><canvas id="canvasTarget"></canvas> </span>
      </address>
			<span><img alt="" src="../../img/login/logo.png">
		</header>
    <article><img alt="" src="pic1.jpg" width="100" height="100">
      <table class="meta">
        <tr>
          <th><span  >Recibo #</span></th>
          <td><span  ><?php echo $factura;?></span></td>
        </tr>
        <tr>
          <th><span  >Fecha</span></th>
          <td><span  ><?php echo $fecha; ?></span></td>
        </tr>
        <tr>
          <th><span  >ID Miembro</span></th>
          <td><?php echo $nombre;?></span></td>
        </tr>
      </table>
      <table class="meta">
        <tr>
          <th><span  >Nombre</span></th>
          <td><span  ><?php echo $nombrecompleto;
          ?></span></td>
        </tr>
        <tr>
          <th><span  >Edad, Sexo</span></th>
          <td><span  ><?php echo $anios . " / " . $sexo;?></span></td>
        </tr>
        <tr>
          <th><span  >Altura / Peso</span></th>
          <td><?php echo $altura . "  Centimetros / " . $peso . " Kg";?></span></td>
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
          <td><span  ><?php echo $tiponombre;?></span></td>
          <td><span  ><?php echo $detalles . " Para " . $dias;?></span></td>
          <td><span  ><?php echo $expiracion;?></span></td>
        </tr>
        </tbody>
      </table>
      <table class="balance">
        <tr>
          <th><span  >Total</span></th>
          <td><span data-prefix>$</span><span><?php echo $total;?></span></td>
        </tr>
        <tr>
          <th><span  >Pagado</span></th>
          <td><span data-prefix>$</span><span><?php echo $pagado;?></span></td>
        </tr>
        <tr>
          <th><span  >Deuda</span></th>
          <td><span data-prefix>$</span><span><?php echo $total - $pagado;?></span></td>
        </tr>
      </table>
    </article>
    <aside>
      <h1><span  >Notas Adicionales</span></h1>
      <div  >
        <p>
          1). Todos los miembros deben respetar nuestras normas
          </br> </br>
          2). El pago no es transferible y no es reembolsable.
          </br> </br>
          3). Fumar NO está permitido en el sitio de la gimnasia .
      </div>
    </aside>
    <center><br><br><a href="vermiembro.php">Gimanasio FPI</center>
  </body>
</html>
