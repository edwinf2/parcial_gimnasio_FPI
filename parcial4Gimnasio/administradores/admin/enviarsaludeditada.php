<?php
  require 'conexiondb.php';
  proteccionPagina();
  if (isset($_POST['id'])) {

      $nombre  = rtrim($_POST['nombre']);
      $fecha1 = rtrim($_POST['fecha1']);
      $grasacorporal = rtrim($_POST['grasacorporal']);
      $agua   = rtrim($_POST['agua']);
      $musculo  = rtrim($_POST['musculo']);
      $calorias = rtrim($_POST['calorias']);
      $hueso    = rtrim($_POST['hueso']);
      $observaciones = rtrim($_POST['observaciones']);

      $id = $_POST['id'];

      mysqli_query($con, "UPDATE estadosalud SET nombre='$nombre', fecha1='$fecha1', grasacorporal='$grasacorporal', agua='$agua', musculo='$musculo' , calorias='$calorias' , hueso='$hueso' , observaciones='$observaciones' WHERE id='$id'");
      echo "<meta http-equiv='refresh' content='0; url=versalud.php'>";
  } else {
      echo "<head><script>alert('ProfileNO actualizado, verificar nuevamente');</script></head></html>";
      echo "<meta http-equiv='refresh' content='0; url=versalud.php'>";

  }
?>
