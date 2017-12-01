<?php
  include('conexiondb.php');
  if ($_POST['id']) {
      $id = $_POST['id'];

      $consulta = "select * from tiposmemoria WHERE idtipomemoria='$id'";

      $result = mysqli_query($con, $consulta);

      if (mysqli_affected_rows($con) != 0) {
          while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

              echo "Total Cost :<input type='text' name='total' id='idusuario' class='input-small' data-rule-required='true' data-rule-minlength='1'value='" . $row['precio'] . "' maxlength='10'><br><br><p>Total Pagos: :<input type='text' name='pago' id='idusuario' class='input-small' data-rule-required='true' data-rule-minlength='1'  onKeyPress='return checkIt(event)' maxlength='10'>";

          }
      }
  }

?>
