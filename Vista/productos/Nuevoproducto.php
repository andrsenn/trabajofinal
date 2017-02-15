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
	            input{
	            	width: 100%;
	            }
		</style>
			<script type="text/javascript">
				function Letras(e){
					tecla = e.keyCode || e.which; 
					base =/[a-zñ ]/; 
					teclado = String.fromCharCode(tecla).toLowerCase(); 
					return base.test(teclado); 
				}

				function Numeros(e){
					tecla = e.keyCode || e.which; 
					base =/[0-9]/; 
					teclado = String.fromCharCode(tecla).toLowerCase(); 
					return base.test(teclado); 
				}
			</script>
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
					<center><h3>Registro Nuevo producto</h3></center><br>
				<?php $Action="../Controlador/Producto.php?Producto=1 & Accion=0"?>
				<form class="form-horizontal" action="<?php echo $Action; ?>" method="POST">
					<div class="form-group">
					    <label class="col-sm-3 control-label">idproducto</label>
					    <div class="col-sm-9">
					      <input type="text" class="form-control" name="idproducto" onkeypress="return Numeros(event)" required >
					    </div>
					</div>
                                    
                                    <div class="form-group">
					    <label class="col-sm-3 control-label">Descripcion</label>
					    <div class="col-sm-9">
					      <input type="text" class="form-control" name="descripcion" onkeypress="return Letras(event)" required >
					    </div>
					</div>
                                    
                                    <div class="form-group">
					    <label class="col-sm-3 control-label">Stock</label>
					    <div class="col-sm-9">
					      <input type="text" class="form-control" name="stock" onkeypress="return Numeros(event)" required >
					    </div>
					</div>
                                    
                                    <div class="form-group">
					    <label class="col-sm-3 control-label">Precio Unitario</label>
					    <div class="col-sm-9">
					      <input type="text" class="form-control" name="preciouni" onkeypress="return Numeros(event)" required >
					    </div>
					</div>
							  			
															
					<div class="form-group">
					    <center>
					    	<button type="submit" class="btn btn-success">Guardar</button>
					    	<button type="button" class="btn btn-danger" onclick="window.location='../Controlador/Producto.php'">Cancelar</button>
					    </center>
					</div>
				</form>
			</div>
		</body>
</html>

