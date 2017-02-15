<html>

    <head>
		<style type="text/css">
		    body{
	                background-color: #F2F2F2;
	            }
	            #contenedor{
	                width: 35%;
	                border-radius: 10px;
	                margin: auto;
	            }
	             header{
	            	background: #fff;
	            	padding: 9px;
	            	border: 2px solid red;
	            }
	            header a{
	            	padding: 5px;
	            	font-weight: bold;
	            	text-decoration: none;
	            	font-size: 18px;
	            	color: #01A9DB;
	            }
	            .inicio{
	            	margin-right: 200px;
	            }
	            .login{
	            	margin-left: 100px;
	            }
	            .btn{
	            	text-decoration: none;
	            	background: #81BEF7;
	                padding: 4px;
	                color: #fff;
	            }
	            th,td{
	            	border: 2px solid #81BEF7;
	            }
		</style>
		
    </head>
		<body>
			<header>
				<a class="inicio">BIENVENIDO SISTEMA LP4</a>
				<a href="../Controlador/Venta.php">VENTAS</a>
                     	<a href="../Controlador/Producto.php" role="button">PRODUCTOS </a>
               		<a href="../Controlador/Usuario.php" role="button">USUARIOS </a>
               		<a href="../index.php" role="button">CERRAR_SESION</a>
               		<a class="login">USUARIO: <?php echo $_SESSION['usuario'];?></a>           
			</header> <br>
			<div class="container" id="contenedor">
				<a class="btn" href="Usuario.php?Usuario=1<?php echo '&'?>Accion=4">Nuevo Usuario</a><br><br>
                      <table>
				
						<th><center> # </center></th>
						<th><center> Nombre </center></th>
						<th><center> Usuario </center></th>
						<th><center> Clave </center></th>
						<th> Accion </th>
						<tbody>
						<?php 
                                                
                                                
                                 foreach ($usuario as $value){?>
							<tr>
								<td>  <?php echo $value['id_user']?></center></td>
								<td> <center> <?php echo $value['nombres']?> </center> </td>
								<td> <center> <?php echo $value['usuario']?> </center></td>
								<td> <center> <?php echo $value['clave']?></center></td>
								
								<td> <center> 
                                                  <a class="btn" href="Usuario.php?Usuario=<?php echo $value['id_user'];?><?php echo '&'?>Accion=3">Modificar</a>
									<a class="btn" href="Usuario.php?Usuario=<?php echo $value['id_user'];?><?php echo '&'?>Accion=1">Eliminar</a>
								</center></td>
							</tr>
						<?php }?>

		                                
		

					</tbody>
				</table>
			</div>
		</body>
</html>
