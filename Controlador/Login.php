<?php
	require_once ('../Modelo/Login.php');
	$nuevo = Login::conectar();
 
	if(isset($_POST['usuario'])){
		$usuario= $_POST['usuario'];
		$password = $_POST['password'];

		$usuario = $nuevo->Login_usuario($usuario,$password);
		
		if($usuario == true){
			header("Location:../Controlador/Principal.php");
		}else{
			header("Location:../index.php");
		}
	}
?>
