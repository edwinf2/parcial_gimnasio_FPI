<?php
  $servidor = $_SERVER['HTTP_REFERER'];

  if (strpos($servidor, '/e-has/') !== false) {

  } else {
      header("Location: ../login/");
  }
?>
<?php
  include 'index.php';
  include'../incluir/conexiondb.php';

  $clavesecreta = rtrim($_POST['idclavesecreta']);
  $contrasenia = rtrim($_POST['contrasenia']);
  $idusuario = rtrim($_POST['idusuario']);

  //Cambiando la contraseña
  if (isset($idusuario) && isset($contrasenia) && isset($clavesecreta)) {
      $consultasql= "SELECT * FROM nivelusuario WHERE idclavesecreta='$clavesecreta'";
      $result = mysqli_query($con, $consultasql);
      $count  = mysqli_num_rows($result);
      if ($count == 1) {
          mysqli_query($con, "UPDATE nivelusuario SET contrasenia='$contrasenia' WHERE idusuario='$idusuario'");
          echo "<html><head><script>alert('Password Updated ,Login Again ');</script></head></html>";
          echo "<meta http-equiv='refresh' content='0; url=index.php'>";
      } else {
          echo "<html><head><script>alert('Change Unsuccessful');</script></head></html>";
          echo "<meta http-equiv='refresh' content='0; url=index.php'>";
      }
    } else {
        echo "<html><head><script>alert('Change Unsuccessful');</script></head></html>";
        echo "<meta http-equiv='refresh' content='0; url=index.php'>";
    }
?>
<center>
  <img src="../img/login/loading.gif">
</center>
