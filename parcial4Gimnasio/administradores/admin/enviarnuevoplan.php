<?php
  require 'conexiondb.php';
  proteccionPagina();
  if (isset($_POST['pid'])) {

      $nombrecontrato    = rtrim($_POST['nombre']);
      $detalles = rtrim($_POST['detalles']);
      $dias    = rtrim($_POST['dias']);
      $precio    = rtrim($_POST['precio']);

      $idtipomemoria = $_POST['pid'];

      mysqli_query($con, "INSERT INTO tiposmemoria (idtipomemoria,nombrecontrato,dias,precio,detalles)
    VALUES ('$idtipomemoria','$nombrecontrato','$dias','$precio','$detalles')");
        echo "<meta http-equiv='refresh' content='0; url=verplan.php'>";
  } else {
        echo "<head><script>alert('Perfil NO actualizado, verificar nuevamente');</script></head></html>";
        echo "<meta http-equiv='refresh' content='0; url=verplan.php'>";

  }
?>
