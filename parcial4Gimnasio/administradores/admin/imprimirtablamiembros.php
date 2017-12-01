<?php
  require 'conexiondb.php';
  proteccionPagina();
  if (isset($_POST['name'])) {

      $mem_id  = $_POST['name'];
      $name    = $_POST['full_name'];
      $details = $_POST['details'];
      $date    = $_POST['date'];

  } else {
      echo "<meta http-equiv='refresh' content='0; url=table_view.php'>";

  }
?>
