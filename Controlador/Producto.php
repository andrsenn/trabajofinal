<?php

require_once '../Modelo/Producto_model.php';
	$nuevo = Producto_model::conectar();
        
if(isset($_GET['Producto'])){
    if ($_GET['Accion']==1) {
	$Producto = $nuevo->Eliminar($_GET['Producto']);
	echo "<script>alert('ELIMINADO CORRECTAMENTE'); window.location='Producto.php'; </script>";
    }else{
	if ($_GET['Accion']==2) {
            $Producto = $nuevo->Modificar($_POST['idproducto'],$_POST['descripcion'],$_POST['stock'],$_POST['preciouni']);
            echo "<script>alert('ACTUALIZADO CORRECTAMENTE'); window.location='Producto.php'; </script>";
        }else{
            if ($_GET['Accion']==3) {
		$producto = $nuevo->TraerProducto($_GET['Producto']);
		require_once("../Vista/productos/Modificar_producto.php");
            }else{
		if ($_GET['Accion']==4) {
                    require_once("../Vista/productos/Nuevoproducto.php");
					}
                else{
                    $Producto = $nuevo->Guardar($_POST['idproducto'],$_POST['descripcion'],$_POST['stock'],$_POST['preciouni']);
                    echo "<script>alert('GUARDADO CORRECTAMENTE'); window.location='Producto.php'; </script>";
					}					
				}
			}
		}		
	}
        else{
		$usuario = $nuevo->Mostrar(); 
		require_once("../Vista/productos/Producto.php");
	}
?>