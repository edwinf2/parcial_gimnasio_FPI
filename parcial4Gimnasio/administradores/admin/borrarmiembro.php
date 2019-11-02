<?php
  include 'conexiondb.php';


  $cambiar = $_POST['nombre'];
  if (strlen($cambiar) > 0) {
      mysqli_query($con, "DELETE FROM datosusuario WHERE cambiar='$cambiar'");
      mysqli_query($con, "DELETE FROM suscripcion WHERE idmiembro='$cambiar'");
      echo "<html><head><script>alert('Miembro Borrado');</script></head></html>";
      echo "<meta http-equiv='refresh' content='0; url=vermiembro.php'>";
  } else {
      echo "<html><head><script>alert('ERROR! Eliminar la operación sin éxito');</script></head></html>";
      echo "<meta http-equiv='refresh' content='0; url=vermiembro.php'>";
  }
  mysqli_close($con);

?>
