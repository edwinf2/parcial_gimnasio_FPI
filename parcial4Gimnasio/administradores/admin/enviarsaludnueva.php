<?php
  require 'conexiondb.php';
  proteccionPagina();
  if (isset($_POST['id'])) {

      $nombre  = rtrim($_POST['nombre']);
      $fecha1 = rtrim($_POST['fecha1']);
      $grasacorpotal   = rtrim($_POST['grasacorpotal']);
      $agua   = rtrim($_POST['agua']);
      $musculo  = rtrim($_POST['musculo']);
      $calorias = rtrim($_POST['calorias']);
      $hueso    = rtrim($_POST['hueso']);
      $observaciones = rtrim($_POST['observaciones']);



      $id = $_POST['id'];

      mysqli_query($con, "INSERT INTO estadosalud (id,nombre, fecha1,grasacorpotal,agua,musculo,calorias,bone,observaciones)
  VALUES ('$id','$nombre','$fecha1','$grasacorpotal','$agua','$musculo','$calorias','$hueso','$observaciones')");
      echo "<meta http-equiv='refresh' content='0; url=versalud.php'>";
  } else {
      echo "<head><script>alert('NO actualizado, verificar nuevamente');</script></head></html>";
      echo "<meta http-equiv='refresh' content='0; url=versalud.php'>";

  }
?>
