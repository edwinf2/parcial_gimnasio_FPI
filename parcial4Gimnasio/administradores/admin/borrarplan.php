<?php
  include 'conexiondb.php';

  $cambiar = $_POST['nombre'];
  if (strlen($cambiar) > 0) {
      mysqli_query($con, "DELETE FROM tiposmemoria WHERE idtipomemoria='$cambiar'");
      echo "<html><head><script>alert('Plan Borrado');</script></head></html>";
      echo "<meta http-equiv='refresh' content='0; url=cambiarvalores.php'>";
  } else {
      echo "<html><head><script>alert('ERROR! Eliminar la operación sin éxito');</script></head></html>";
      echo "<meta http-equiv='refresh' content='0; url=cambiarvalores.php'>";
  }
  mysqli_close($con);

?>
