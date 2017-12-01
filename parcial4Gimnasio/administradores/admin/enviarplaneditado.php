<?php
  require 'conexiondb.php';
  proteccionPagina();
  if (isset($_POST['pid'])) {

      $nombrecontrato    = rtrim($_POST['nombrecontrato']);
      $detalles = rtrim($_POST['detalles']);
      $dias    = rtrim($_POST['dias']);
      $precio    = rtrim($_POST['precio']);

      $pid = $_POST['pid'];

      mysqli_query($con, "UPDATE tiposmemoria SET nombrecontrato='$nombrecontrato', detalles='$detalles', precio='$precio', $dias='$dias'WHERE idtipomemoria='$pid'");
      echo "<meta http-equiv='refresh' content='0; url=cambiarvalores.php'>";
  } else {
      echo "<head><script>alert('Perfil NO actualizado, verificar nuevamente');</script></head></html>";
      echo "<meta http-equiv='refresh' content='0; url=cambiarvalores.php'>";

  }

?>
