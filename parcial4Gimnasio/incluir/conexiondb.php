<?php
  $host="localhost"; // nombre Host
  $nombreusuariodb="root"; // Mysql nombre del usuario de la base de datos
  $contraseniadb="12345"; // Mysql contraseña de la base de datos
  $nombredb="gimnasio"; // nombre de la base de datos

  //Conexion con la base de datos
  $con=mysqli_connect($host, $nombreusuariodb, $contraseniadb, $nombredb);

  //Confirmando conexion
  if (mysqli_connect_errno($con)) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>
<?php
  function proteccionPagina(){
    session_start();
    global $basedatos;
    if (isset($_SESSION['HTTP_USER_AGENT'])) {
        if ($_SESSION['HTTP_USER_AGENT'] != md5($_SERVER['HTTP_USER_AGENT'])) {
            session_destroy();
            echo "<meta http-equiv='refresh' content='0; url=../login/'>";
            exit();
        }
    }
    //Para recargar
    if (!isset($_SESSION['datosusuario']) && !isset($_SESSION['registrado']) && !isset($_SESSION['nivel'])){
        session_destroy();
        echo "<meta http-equiv='refresh' content='0; url=../login/'>";
        exit();
    } else {
    }
  }



?>
