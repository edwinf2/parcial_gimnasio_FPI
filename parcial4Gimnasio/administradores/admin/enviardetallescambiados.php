<?php
include 'index.php';
proteccionPagina();
$idlogin = $_SESSION['datosusuario'];
$nombrecompleto = rtrim($_POST['nombrecompleto']);
if (isset($nombrecompleto)) {
    mysqli_query($con, "UPDATE usuario SET nombre='$nombrecompleto' WHERE idusuario='$idlogin'");
    echo "<head><script>alert('Perfil actualizado, iniciar sesión nuevamente');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=cerrarsesion.php'>";
} else {
    echo "<meta http-equiv='refresh' content='0; url=masperfilusuario.php'>";
}
?>
<center>
<img src="loading.gif">
</center>
