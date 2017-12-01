<?php
  require 'conexiondb.php';
  proteccionPagina();
  if (isset($_POST['factura'])) {
      $factura = $_POST['factura'];
      $pagado    = rtrim($_POST['pagado']);
      $total   = rtrim($_POST['total']);
      $balance     = $total - $pagado;

      mysqli_query($con, "UPDATE suscripcion SET balance='$balance',pagado='$pagado',total='$total'  WHERE factura='$factura'");
      echo "<meta http-equiv='refresh' content='0; url=nopagado.php'>";
  } else {
      echo "<head><script>alert('Perfil NO actualizado, verificar nuevamente');</script></head></html>";
      echo "<meta http-equiv='refresh' content='0; url=nopagado.php'>";

  }
?>
