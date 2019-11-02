<?php
  session_start();
  include 'connection.php';
  $name    = time();
  $newname = "../administradores/images/" . $name . ".jpg";
  $file    = file_put_contents($newname, file_get_contents('php://input'));
  mysqli_query($con, "DELETE FROM datosusuario WHERE esperar='yes'");

  $sql = "Insert into datosusuario(esperar,cambiar,addfoto) values('yes','$name','$newname')";
  $result = mysqli_query($con, $sql) or die("Error in query");
?>
