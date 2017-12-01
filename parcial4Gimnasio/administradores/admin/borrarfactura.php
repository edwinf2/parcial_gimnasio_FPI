<?php
  require 'conexiondb.php';
  $cambiar = $_POST['nombre'];
  if (strlen($cambiar) > 0) {
      mysqli_query($con, "DELETE FROM suscripcion WHERE factura='$cambiar'");
      echo "<html><head><script>alert('Invoice Deleted');</script></head></html>";
      echo "<meta http-equiv='refresh' content='0; url=vermiembro.php'>";
  } else {
      echo "<html><head><script>alert('ERROR! la operación sin éxito');</script></head></html>";
      echo "<meta http-equiv='refresh' content='0; url=vermiembro.php'>";
  }
  mysqli_close($con);


?>
