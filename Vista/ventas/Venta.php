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
				<a class="btn" href="Venta.php?Venta=1<?php echo '&'?>Accion=4">Nueva venta</a><br><br>
                      <table>
				
						<th><center> idventa </center></th>
						<th><center> idproducto</center></th>
						<th><center>cantidad</center></th>
						
						
						
						<th> Accion </th>
										<tbody>
						<?php foreach ($usuario as $value){?>
							<tr>
								<td>  <?php echo $value['idventa']?></center></td>
								<td> <center> <?php echo $value['idproducto']?> </center> </td>
								<td> <center> <?php echo $value['cantidad']?> </center> </td>
								
								
								<td> <center>
									<a class="btn" href="Venta.php?Venta=<?php echo $value['idventa'];?><?php echo '&'?>Accion=1">Anular</a>
								</center></td>
							</tr>
						<?php }?>

		
		

					</tbody>
				</table>
			</div>
		</body>
</html>

