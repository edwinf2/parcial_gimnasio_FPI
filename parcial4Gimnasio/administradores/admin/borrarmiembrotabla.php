<?php
  require 'conexiondb.php';
  proteccionPagina();

  $cambiar = $_POST['nombre'];
  if (strlen($cambiar) > 0) {
      mysqli_query($con, "DELETE FROM tablatiempo WHERE idmiembro='$cambiar'");
      echo "<html><head><script>alert('Tabla eliminada');</script></head></html>";
      echo "<meta http-equiv='refresh' content='0; url=vertabla.php'>";
  } else {
      echo "<html><head><script>alert('ERROR! Eliminar la operación sin éxito');</script></head></html>";
      echo "<meta http-equiv='refresh' content='0; url=vertabla.php'>";
  }
  mysqli_close($con);

?>
