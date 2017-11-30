<?php
  $servidor=$_SERVER['HTTP_REFERER'];
  if (strpos($servidor, '/gym/')!== false) {

  }else {
    header("Location: ../login/");
  }
?>
<?php
  include'../incluir/conexiondb.php';

  $idusuario=ltrim($_POST['idusuario']);
  $idusuario=rtrim($idusuario);
  $contrasenia=ltrim($_POST['contrasenia']);
  $contrasenia=rtrim($_POST['contrasenia']);

  $idusuario=stripslashes($idusuario);
  $contrasenia=stripslashes($contrasenia);

  //Estableciendo conexion para los datos del usuario
  $idusuario=mysqli_real_escape_string($con, $idusuario);
  $contrasenia=mysqli_real_escape_string($con, $contrasenia);
  //Haciendo consulta
  $consultasql="SELECT * FROM usuario WHERE idusuario='$idusuario' and contrasenia='$contrasenia'";
  $result=mysqli_query($con, $consultasql);
  $count=mysqli_num_rows($result);

  //if para iniciar session
  if ($count==1) {
    $row=mysqli_fetch_assoc($result);
    session_start();
    //Almacenando los datos de la session
    $_SESSION['datosusuario']  = $idusuario;
    //Anterior: $_SESSION['logged']     = "start";
    $_SESSION['registrado']     = "comenzar";
    // $_SESSION['auth_level'] = $row['level'];
    $_SESSION['nivel'] = $row['nivel'];
    $_SESSION['sexo']        = $row['sexo'];
    // $_SESSION['full_name']  = $row['name'];
    $_SESSION['nombrecompleto']  = $row['nombre'];

    $nivel=$_SESSION['nivel'];

    if ($nivel == 5) {
        header("location: ../administradores/admin/");
    } else if ($nivel == 4) {
        header("location: ../administradores/cashier/");
    } else if ($nivel == 3) {
        header("location: ../administradores/member/");
    } else {
        header("location: ../login/");
    }

  }else {
    include 'index.php';
    echo "<html>
            <head>
              <script>console.log('Usuario O Contraseña Invalidos');</script>
            </head>
          </html>";
  }

?>
