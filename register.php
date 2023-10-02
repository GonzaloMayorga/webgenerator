<?php 
session_start();
include_once 'tools/usuarios.php';

if(isset($_SESSION['idUser'])){
	header('Location: panel.php');
}


if(isset($_POST['enviar'])){	
	if($_POST['password'] == $_POST['password1']){
		if(getRegisters($_POST['email']) == 0){
			register($_POST['email'],$_POST['password']);
			header('Location: login.php?loged=true');
		}else{
			echo "<h1>Email existente en la base de datos</h1>";
		}
	}else{
		echo "<h1>las contraseñas no son iguales</h1>";
	}
}

 ?>
<!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<title>Registrarte es simple</title>
 </head>
 <body>

<h1>Registrarte es simple</h1>
	<div id="formulario">
		<form method="POST">
			<input type="email" name="email" required placeholder="Correo Electronico">
			<input type="password" name="password" required placeholder="Contraseña">
			<input type="password" name="password1" required placeholder="Repetir Contraseña">
			<input type="submit" name="enviar" value="Registrarse">
		</form>
		<a href="login.php">Iniciar sesion</a>
	</div>
 	
 </body>
 </html> 