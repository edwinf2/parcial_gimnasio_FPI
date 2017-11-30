<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Administracion de Gimnasio</title>
    <link rel="stylesheet" href="../js/neonjs/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css"  id="style-resource-1">
    <link rel="stylesheet" href="../css/neoncss/font-icons/entypo/css/entypo.css"  id="style-resource-2">
    <link rel="stylesheet" href="../css/neoncss/font-icons/entypo/css/animation.css"  id="style-resource-3">
    <link rel="stylesheet" href="../css/neoncss/neon.css"  id="style-resource-5">
    <link rel="stylesheet" href="../css/neoncss/custom.css"  id="style-resource-6">

    <script src="../js/neonjs/jquery-1.10.2.min.js"></script>
  </head>
  <body class="page-body login-page login-form-fall">
    <div id="container">
  		<div class="login-container">
  			<div class="login-header login-caret">
  				<div class="login-content">
  					<a href="#" class="logo">
  						<img src="../img/login/icon.png" alt="" width="30%" />
  					</a>
  				</div>
  			</div>
  			<div class="login-form">
  				<div class="login-content">
  					<form action="cambiarcontrasenia.php" method="POST" id="envioDatos">
  						<div class="form-group">
  							<div class="input-group">
  								<div class="input-group-addon">
  									<i class="entypo-user"></i>
  								</div>
  									<input type="text" class="form-control" name="idusuario" placeholder="Tu usuario" data-rule-required="true" data-rule-minlength="6"/>
  							</div>
  						</div>
  						<div class="form-group">
  							<div class="input-group">
  								<div class="input-group-addon">
  									<i class="entypo-key"></i>
  								</div>
  								<input type="text" name="idclavesecreta"  class="form-control" placeholder="Escribe tu clave secreta" data-rule-required="true" data-rule-minlength="6">
  							</div>
  						</div>
  						<div class="form-group">
  							<div class="input-group">
  								<div class="input-group-addon">
  									<i class="entypo-key"></i>
  								</div>
  								<input type="password" name="contrasenia" id="contrasenia" class="form-control" data-rule-required="true" data-rule-minlength="6" placeholder="Tu nueva contraseña">
  							</div>
  						</div>
  						<div class="form-group">
  							<div class="input-group">
  								<div class="input-group-addon">
  									<i class="entypo-key"></i>
  								</div>
  								<input type="password" name="confirmarpass" id="confirmarpass" class="form-control" data-rule-equalto="#contrasenia" data-rule-required="true" data-rule-minlength="6" placeholder="Confirma tu nueva contraseña">
  							</div>
  						</div>
  						<div class="form-group">
  							<button type="Submit" name="btnLogin" class="btn btn-primary">
  								Iniciar Sesión
  								<i class="entypo-login"></i>
  							</button>
  							<button type="button" class="btn btn-primary">Cancelar</button>
  						</div>
  					</form>
  				</div>
  			</div>
  		</div>
  	</div>

    <script src="../js/neonjs/gsap/main-gsap.js" id="script-resource-1"></script>
    <script src="../js/neonjs/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js" id="script-resource-2"></script>
    <script src="../js/neonjs/bootstrap.min.js" id="script-resource-3"></script>
    <script src="../js/neonjs/joinable.js" id="script-resource-4"></script>
    <script src="../js/neonjs/resizeable.js" id="script-resource-5"></script>
    <script src="../js/neonjs/neon-api.js" id="script-resource-6"></script>
    <script src="../js/neonjs/jquery.validate.min.js" id="script-resource-7"></script>
    <script src="../js/neonjs/neon-login.js" id="script-resource-8"></script>
    <script src="../js/neonjs/neon-custom.js" id="script-resource-9"></script>
    <script src="../js/neonjs/neon-demo.js" id="script-resource-10"></script>



  </body>
</html>
