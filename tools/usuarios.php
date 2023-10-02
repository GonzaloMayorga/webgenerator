<?php 
include_once 'credenciales.php'; 

function show(){
	return query("SELECT `idUsuario`, `email`, `password`, `fechaRegistro` FROM `usuarios`", true);
}

function getUser($email){
	return query("SELECT `idUsuario`, `email`, `password`, `fechaRegistro` FROM `usuarios` WHERE `email` = '$email'", true);
}

function getRegisters($c){
	$emails = query ("SELECT `email` FROM `usuarios`", true);
	foreach ($emails as $emailData) { 
        if ($c == $emailData["email"]) {
            // El email existe en la base de datos
            return 1;
        }
    }
    // Si el bucle termina sin encontrar el email en la base de datos
    return 0;
}


function register($email,$password){
	return query("INSERT INTO `usuarios`(`email`, `password`) VALUES ('$email','$password')", true);
}

function login($email,$contraseña){
	$user = query("SELECT `email`, `password` FROM `usuarios`", true);
	foreach ($user as $userData) { 
	        if ($email == $userData["email"]) {
	            if ($contraseña == $userData["password"]) {
	                // Si las credenciales son correctas
	                return 1;
	            } else {
	                // Contraseña incorrecta
	                return 0;
	            }
	        }
	    }
	    // Si el bucle termina sin encontrar el email en la base de datos
	    return -1;
}


?>