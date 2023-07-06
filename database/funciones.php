<?php

/* Esta función me conecta con la base de datos y me devuelve un objeto de conexión con el manejador correspondiente. */
function conectar() {
	
	// Datos de conexión
	include "private/conexion.php";
	
	// Intento conectar a la base de datos
	try {
		$conexion = mysqli_connect($host, $usuario, $pass, $baseDatos);
	}
	catch (Exception $e) {
		?>
		<p>ERROR: No se puede conectar a la base de datos. Inténtelo más tarde.</p>
		<?php
		die();
	}
	
	/* Si todo ha ido bien, devuelvo el objeto de conexión como resultado de la función. */
	return $conexion;
	
}

/* Ejecutar una consulta en la base de datos. Requiere dos argumentos: el objeto de conexión sobre el que se desea ejecutar la consulta y la propia cadena de consulta. */
function consultar($conexion,$sql) {
	/* La siguiente instrucción, se asegura de que la consulta a la base de datos se va a realizar con el cotejamiento utf-8. */
	mysqli_set_charset($conexion,"utf8");
	
	try {
		$resultado = mysqli_query($conexion, $sql);
	}
	catch (Exception $e) {
		?>
		<p>ERROR: No se puede ejecutar la consulta. Inténtelo más tarde.</p>
		<?php
		die();
	}
	
	/* Devuelvo el resultado de la consulta. */
	return $resultado;
}

/* Una función que cierre la conexión con la base de datos a partir de un manejador de conexión que se pasa como argumento. */
function cerrar($conexion) {
	try {
		mysqli_close($conexion);
	}
	catch (Exception $e) {
		?>
		<p>ERROR: No se puede cerrar la conexión. Inténtelo más tarde.</p>
		<?php
		die();
	}
}

/* Una función que nos comprueba la existencia de un usuario (email). En caso de existir, devuelve su contraseña y en caso contrario devuelve FALSE. */
function comprobarEmail($email) {
	
	$conexion = conectar();
	
	$sql="SELECT password FROM usuarios WHERE email='$email';";
	$resultado = consultar($conexion, $sql);
	
	/* Si me devuelve conjunto vacío, no existe el email y devuelvo FALSE. Si no es conjunto vacío, leo la contraseña y la devuelvo. */
	if ( mysqli_num_rows($resultado) == 0 ) {
		return false;
	} else {
		$registro = mysqli_fetch_assoc($resultado);
		$pass = $registro["password"];
		return $pass;
	}
	
	cerrar($conexion);
	
}

/* Una función que, dado un email compruebe si el usuario está o no autorizado para entrar en el sistema. */
function comprobarAutorizacion($email) {
	$conexion = conectar();
	
	$sql = "SELECT autorizacion FROM usuarios WHERE email='$email';";
	$resultado = consultar($conexion, $sql);
	
	$registro = mysqli_fetch_assoc($resultado);
	
	$autorizacion = $registro["autorizacion"];
	
	cerrar($conexion);
	
	return $autorizacion;
}