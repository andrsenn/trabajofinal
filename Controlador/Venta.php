<?php

require_once '../Modelo/Venta_model.php';
	$nuevo = Venta_model::conectar();
        
if(isset($_GET['Venta'])){
    if ($_GET['Accion']==1) {
	$venta = $nuevo->Eliminar($_GET['Venta']);
	echo "<script>alert('ANULADO CORRECTAMENTE'); window.location='Venta.php'; </script>";
    }else{
	if ($_GET['Accion']==2) {
            $Cliente = $nuevo->Modificar($_POST['id'],$_POST['dni'],$_POST['nombre'],$_POST['apellidos'],$_POST['direccion'],$_POST['telefono'],$_POST['fechanacimiento'],$_POST['correo']);
            echo "<script>alert('ACTUALIZADO CORRECTAMENTE'); window.location='Cliente.php'; </script>";
        }else{
            if ($_GET['Accion']==3) {
		$cliente = $nuevo->TraerCliente($_GET['Venta']);
		require_once("../Vista/ventas/Modificar.php");
            }else{
		if ($_GET['Accion']==4) {
			$productos = $nuevo->Productos();
                 require_once("../Vista/ventas/Nuevo.php");
		}else{
                    $Venta = $nuevo->Guardar();
                    echo "<script>alert('GUARDADO CORRECTAMENTE'); window.location='Venta.php'; </script>";
					}					
				}
			}
		}		
	}
        else{
		$usuario = $nuevo->Mostrar(); 
		require_once("../Vista/ventas/Venta.php");
	}
?>