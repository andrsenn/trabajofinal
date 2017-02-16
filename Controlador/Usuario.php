<?php

require_once ('../Modelo/Usuario_model.php');
	$nuevo = Usuario_model::conectar();
        
if(isset($_GET['Usuario'])){
    if ($_GET['Accion']==1) {
	$Usuario = $nuevo->Eliminar($_GET['Usuario']);
	echo "<script>alert('ELIMINADO CORRECTAMENTE'); window.location='Usuario.php'; </script>";
    }else{
	if ($_GET['Accion']==2) {
            $Usuario = $nuevo->Modificar($_POST['id'],$_POST['nombres'],$_POST['usuario'],$_POST['clave']);
            echo "<script>alert('ACTUALIZADO CORRECTAMENTE'); window.location='Usuario.php'; </script>";
        }else{
            if ($_GET['Accion']==3) {
		$usuario = $nuevo->TraerCliente($_GET['Usuario']);
		require_once("../Vista/usuarios/Modificar_usuario.php");
            }else{
		if ($_GET['Accion']==4) {
                    require_once("../Vista/usuarios/nuevo_usuario.php");
					}
                else{
                    $Usuario = $nuevo->Guardar($_POST['nombres'],$_POST['usuario'],$_POST['clave']);
                    echo "<script>alert('GUARDADO CORRECTAMENTE'); window.location='Cliente.php'; </script>";
					}					
				}
			}
		}		
	}
        else{
		$usuario = $nuevo->Mostrar(); 
		require_once("../Vista/usuarios/Usuario.php");
	}
?>
