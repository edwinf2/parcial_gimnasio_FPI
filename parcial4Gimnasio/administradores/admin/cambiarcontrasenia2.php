<?php
include 'index.php';
$llave          = rtrim($_POST['iduser']);
$contrasenia         = rtrim($_POST['contrasenia']);
$idusuario = $_SESSION['datosusuario'];
if (isset($idusuario) && isset($contrasenia) && isset($llave)) {
    $consulta    = "SELECT * FROM usuario WHERE seguridad='$llave'";
    $result = mysqli_query($con, $consulta);
    $count  = mysqli_num_rows($result);
    if ($count == 1) {
        mysqli_query($con, "UPDATE usuario SET contrasenia='$contrasenia' WHERE idusuario='$idusuario'");
        echo "<head><script>alert('Contraseña actualizada, iniciar sesión nuevamente');</script></head></html>";
        echo "<meta http-equiv='refresh' content='0; url=cerrarsesion.php'>";
    } else {
        echo "<head><script>alert('Cambiar sin éxito');</script></head></html>";
        echo "<meta http-equiv='refresh' content='0; url=masperfilusuario.php'>";
    }
} else {
    echo "<head><script>alert('Cambiar sin éxito');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=masperfilusuario.php'>";
}
?>
<center>
<img src="loading.gif">
</center>
