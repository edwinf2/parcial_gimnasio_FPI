<?php
  require 'conexiondb.php';
  proteccionPagina();
  if (isset($_POST['pid'])) {


      $fecha      = $_POST['fecha'];
      $anios       = rtrim($_POST['anios']);
      $nombrecompleto = rtrim($_POST['pnombre']);
      $email     = rtrim($_POST['email']);
      $direccion   = rtrim($_POST['direccion']);
      $contacto   = rtrim($_POST['contacto']);
      $altura    = rtrim($_POST['altura']);
      $peso    = rtrim($_POST['peso']);

      $pid = $_POST['pid'];

      mysqli_query($con, "UPDATE datosusuario SET nombre='$nombrecompleto', direccion='$direccion', contacto='$contacto', email='$email', altura='$altura', peso='$peso', fechainscripcion='$fecha', anios='$anios' WHERE cambiar='$pid'");
      echo "<meta http-equiv='refresh' content='0; url=vermiembro.php'>";
  } else {
      echo "<head><script>alert('Perfil no Actualizado,Revisar otra vez');</script></head></html>";
      echo "<meta http-equiv='refresh' content='0; url=vermiembro.php'>";

  }
?>
