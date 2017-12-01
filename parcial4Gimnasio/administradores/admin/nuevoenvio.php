<?php
  require 'conexion.php';
  proteccionPagina();
  $consulta2 = "select * from datosusuario WHERE esperar='yes'";
  $result2 = mysqli_query($con, $consulta2);

  if ((mysqli_affected_rows($con) == 1) {

  }else {
    mysqli_query($con, "DELETE FROM datosusuario WHERE esperar='yes'");

    echo "<head><script>alert('NO agregado, verifique de nuevo');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=nuevoregisto.php'>";

  }
  if (isset($_POST['pnombre']) && isset($_POST['tipomiembro']) && isset($_POST['total']) && isset($_POST['anios']) && isset($_POST['pagado'])) {
    function getRandomWord($len = 3){
        $palabra = array_merge(range('a', 'z'), range('0', '9'));
        shuffle($palabra);
        return substr(implode($palabra), 0, $len);
    }
    $tipomiembro = $_POST['tipomiembro'];
    $consulta1 = "select * from tiposmemoria WHERE idtipomemoria='$tipomiembro'";
    $result1 = mysqli_query($con, $consulta1);

    if (mysqli_affected_rows($con) == 1) {
        while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
            $tiponombre=$row1['nombrecontrato'];
            $detalles=$row1['detalles'];
            $dias=$row1['dias'];
        }
    }
    $prueba = $_POST['prueba'];
    if (isset($_POST['otraprueba'])) {
        $otraprueba= $_POST['otraprueba'];
    } else {
        $otraprueba = " ";
    }
//Rescatamos los datos desde nuevoregisto.php
    $factura   = substr(time(), 2, 10) . getRandomWord();
    $fecha      = $_POST['fecha'];
    $anios       = rtrim($_POST['anios']);
    $nombrecompleto = rtrim($_POST['pname']);
    $email     = rtrim($_POST['email']);
    $direccion   = rtrim($_POST['direccion']);
    $codigopostal   = rtrim($_POST['codigopostal']);
    $fechanacimiento   = $_POST['fechanacimiento'];
    $contacto   = rtrim($_POST['contacto']);
    $sexo       = rtrim($_POST['sexo']);
    $altura    = rtrim($_POST['altura']);
    $peso    = rtrim($_POST['peso']);
    $nacionalidad    = rtrim($_POST['nacionalidad']);
    $cuentafacebook    = rtrim($_POST['cuentafacebook']);
    $cuentatwitter    = rtrim($_POST['cuentatwitter']);
    $contactopersona    = rtrim($_POST['contactopersona']);
    $gymanterior    = rtrim($_POST['gymanterior']);
    $aniosentrenando    = rtrim($_POST['aniosentrenando']);
    $total     = $_POST['total'];
    $pagado     = $_POST['pagado'];
    $modofecha  = strtotime($fecha . "+ $dias dias");
    $expiracion    = date("Y-m-d", $modofecha);
    $esperar      = "no";
    $tiempo      = $dias * 86400;
    $tiempoexpira = $tiempo + strtotime($fecha);
    ///Hacemos una consulta2
    $consulta = "select * from datosusuario WHERE esperar='yes'";
    $result = mysqli_query($con, $consulta);

    if (mysqli_affected_rows($con) == 1) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
          $pid = $row['cambiar'];
          mysqli_query($con, "UPDATE datosusuario SET nombre='$nombrecompleto', direccion='$direccion', codigopostal='$codigopostal', fechanacimiento='$fechanacimiento', contacto='$contacto', email='$email', altura='$altura', peso='$peso', nacionalidad='$nacionalidad', cuentafacebook='$cuentafacebook', cuentatwitter='$cuentatwitter', contactopersona='$contactopersona', gymanterior='$gymanterior', aniosentrenando='$aniosentrenando', fechainscripcion='$fecha', anios='$anios', prueba='$prueba',otraprueba='$otraprueba', sexo='$sexo' WHERE esperar='yes'");
          $balance = $total - $pagado;

          mysqli_query($con, "INSERT INTO suscripcion (idmiembro,nombre,tiposuscripcion,fechapago,total,pagado,expiracion,factura,nombretiposuscripcion,balance,tiempoexpira,renovacion)
                              VALUES ('$pid','$nombrecompleto','$tipomiembro','$fecha','$total','$pagado','$expiracion','$factura','$tiponombre','$balance','$tiempoexpira','yes')");
          echo "<head><script>alert('Miembro añadido ,');</script></head></html>";

          mysqli_query($con, "UPDATE datosusuario SET esperar='no' WHERE esperar='yes'");
        }
    }
  }else {
    echo "<head><script>alert('Registro no añadido, vuelva a intentarlo');</script></head></html>";
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
    function generarBarra(){
      var factura = "<?php echo $factura;?>";
      var btipo = "code128";
      var renderizador = "css";

      var zonatranquila = false;
      if ($("#quietzone").is(':checked') || $("#quietzone").attr('checked')){
        zonatranquila = true;
      }

      var settings = {
        output:renderizador,
        bgColor: $("#bgColor").val(),
        color: $("#color").val(),

        moduleSize: $("#moduleSize").val(),
        posX: $("#posX").val(),
        posY: $("#posY").val(),
        addQuietZone: $("#quietZoneSize").val()
      };
      if ($("#rectangular").is(':checked') || $("#rectangular").attr('checked')){
        factura = {code:factura, rect: true};
      }
      if (renderizador == 'canvas'){
        clearCanvas();
        $("#barcodeTarget").hide();
        $("#canvasTarget").show().barcode(factura, btipo, settings);
      } else {
        $("#canvasTarget").hide();
        $("#barcodeTarget").html("").show().barcode(factura, btipo, settings);
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
			<a href="nuevoregisto.php"><h1>Recibo (Nuevo Registro)</h1></a>
			<address>
				<p>Gimnasio FPI</p>
				<p>UES FMOcc</p>
				<p>Buscando nota</p><p>Haber....</p><br><p><div id="barcodeTarget" class="barcodeTarget"></div>
          <canvas id="canvasTarget"></canvas> </span>
			</address>
			<span><img alt="" src="../../img/login/logo.png">
		</header>
    <article>
			<table class="meta">
  			<img alt="" src="pic1.jpg" width="100" height="100">
        <tr>
  				<th>
            <span >Recibo #</span>
          </th>
  				<td>
            <span  ><?php echo $factura;?></span>
          </td>
  			</tr>
  			<tr>
          <th>
            <span  >Fecha</span>
          </th>
          <td>
            <span  ><?php echo $fecha;?></span>
          </td>
  			</tr>
				<tr>
					<th>
            <span  >ID Miembro / Reg ID</span>
          </th>
					<td>
            <?php $regid = substr($pid, 6, 10); echo $pid . " / " . $regid;?></span>
          </td>
				</tr>
			</table>
      <table class="meta">
        <tr>
          <th>
            <span  >Nombre</span>
          </th>
          <td>
            <span  ><?php echo $nombrecompleto;?></span>
          </td>
        </tr>
        <tr>
          <th>
            <span  >Edad, Sexo</span>
          </th>
          <td>
            <span  ><?php echo $anios . " / " . $sexo;?></span>
          </td>
        </tr>
        <tr>
          <th>
            <span  >Altura / Peso</span>
          </th>
          <td>
            <?php echo $altura . "  Centimetros / " . $peso . " Kg";?></span>
          </td>
        </tr>
      </table>
      <table class="inventory">
        <thead>
          <tr>
            <th>
              <span  >Tipo Membresia</span>
            </th>
            <th>
              <span  >Detalles</span>
            </th>
            <th>
              <span  >Expiracion de suscripción</span>
            </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <span  ><?php echo $tiponombre; ?></span>
            </td>
            <td>
              <span  ><?php echo $detalles . " For " . $dias;?></span>
            </td>
            <td>
              <span  ><?php echo $expiracion;?></span>
            </td>
          </tr>
        </tbody>
      </table>
      <table class="balance">
        <tr>
          <th>
            <span  >Total</span>
          </th>
          <td>
            <span data-prefix>$</span>
            <span><?php echo $total;?></span>
          </td>
        </tr>
        <tr>
          <th>
            <span  >Pagado</span>
          </th>
          <td>
            <span data-prefix>$</span>
            <span><?php echo $pagado;?></span>
          </td>
        </tr>
        <tr>
          <th>
            <span  >Deuda</span>
          </th>
          <td>
            <span data-prefix>$</span>
            <span><?php echo $total - $pagado;?></span></td>
        </tr>

      </table>
		</article>
    <aside>
			<h1><span>Notas Adicionales:</span></h1>
			<div >
				<p>
          1). Todos los miembros deben respetar nuestros normas
            </br> </br>
          2). El pago no es transferible y no es reembolsable.
          </br> </br>
          5). Fumar NO está permitido en el sitio de la gimnasia
			</div>
		</aside><center><br><br><a href="vermiembro.php">UES FMOcc</center>


  </body>
</html>
