<?php 
session_start();
include_once 'tools/usuarios.php';



if(isset($_SESSION['Usuario'])){
	header('Location: panel.php');
}

if (isset($_GET['loged'])) {
	if ($_GET['loged'] == true) {
		echo "<h1>Usuario registrado correctamente</h1>";	
	}
}

if(isset($_POST['enviar'])){
	$_SESSION['Usuario'] = getUser($_POST['email']);
	if(login($_POST['email'],$_POST['password']) == 1){
		header('Location: panel.php');
	}if(login($_POST['email'],$_POST['password']) == 0){
		echo "<h1>Contraseña Incorrecta</h1>";
	}if (login($_POST['email'],$_POST['password']) == -1) {
		echo "<h1>Email Incorrecto</h1>";
	}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>webgenerator Gonzalo Mayorga</title>
</head>
<body>
	<h1>webgenerator Gonzalo Mayorga</h1>
	<div id="formulario">
		<form method="POST">
			<input type="email" name="email" placeholder="Correo Electronico">
			<input type="password" name="password" placeholder="Contraseña">
			<input type="submit" name="enviar" value="Iniciar Sesion">
			<a href="register.php">¿No tienes una cuenta?</a>
		</form>
	</div>
</body>
</html>