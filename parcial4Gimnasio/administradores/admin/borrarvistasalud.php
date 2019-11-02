<?php
include 'conexiondb.php';

$cambiar = $_POST['nombre'];
if (strlen($cambiar) > 0) {
    mysqli_query($con, "DELETE FROM estadosalud WHERE id='$cambiar'");
    echo "<html><head><script>alert('Estado de Salud Borrado');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=versalud.php'>";
} else {
    echo "<html><head><script>alert('ERROR! Eliminar la operación sin éxito');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=versalud.php'>";
}
mysqli_close($con);

?>
