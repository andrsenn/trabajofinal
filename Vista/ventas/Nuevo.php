<html>
		<head>
			<style type="text/css">
		    body{
	                background-color: #F2F2F2;
	            }
	            #contenedor{
	                width: 75%;
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
	            	border: 2px solid black;
	            }
	            input{
	            	width: 100%;
	            }
	            .campos{
	            	border: none;
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
				<center><h3>Registro Nueva fecha de venta</h3></center><br>
				<?php $Action="../Controlador/Venta.php?Venta=1 & Accion=0"?>
				<form class="form-horizontal" action="<?php echo $Action; ?>" method="POST" onsubmit="return guardar()">
					<table>
						<th class="campos">Fecha venta: </th>
						<th class="campos">
							<input type="date" name="fecha_venta" max="<?php echo date('Y-m-d');?>" required>
						</th>
						<th class="campos">Seleccione producto</th>
						<th class="campos">
							<select id="producto">
								<option value="">Seleccione</option>
								<?php 
									foreach ($productos as $val) { ?>
										<option value="<?php echo $val['idproducto']?>"><?php echo $val['descripcion']?></option>
									<?php }
								?>
							</select>
						</th>
						<th class="campos">Cantidad </th>
						<th class="campos">
							<input type="text" id="cantidad" >
						</th>
						<th class="campos">Precio </th>
						<th class="campos">
							<input type="text" id="precio">
						</th>
						<th class="campos">
							<button type="button" class="btn btn-success" onclick="agregar()">Agregar</button>
						</th>
					</table>	

					<table style="width: 100%;">
						<th><center> #nro </center></th>
						<th><center>Producto</center></th>
						<th><center>Cantidad</center></th>
						<th><center>Precio</center></th>
						<th><center>Subtotal</center></th>				
						<th> Accion </th>
						<tbody id="lista"></tbody>
						<th colspan="4"><center>TOTAL VENTA</center></th>				
						<th> <input type="text" name="total" id="total" readonly="true" value="0.00"> </th>
						<th> --- </th>
					</table> <br>
					
					<div class="form-group">
					    <center>
					    	<button type="submit" class="btn btn-success">Guardar</button>
					    	<button type="button" class="btn btn-danger" onclick="window.location='../Controlador/Venta.php'">Cancelar</button>
					    </center>
					</div>
				</form>
			</div>
		</body>
		<script type="text/javascript" src="../Vista/jquery.js"></script>
		<script type="text/javascript">
			function agregar(){
				if($("#producto").val()==""){
					alert('Seleccionar Producto a Vender'); $("#producto").focus(); return 0;
				}
				if($("#cantidad").val()==""){
					alert('Ingrese Cantidad de la Venta'); $("#cantidad").focus(); return 0;
				}
				if($("#precio").val()==""){
					alert('Ingrese Precio del Producto'); $("#precio").focus(); return 0;
				}
				if($("#producto_"+$("#producto").val()).length==false){
					var cant = $("#lista tr").length;
					var subtotal = parseFloat($("#precio").val()*$("#cantidad").val());
					subtotal = subtotal.toFixed(2);
					html ="<tr id='producto_"+$("#producto").val()+"'>"+
						"<td> "+(cant+1)+"</td>"+
						"<td> <input type='hidden' name='productoid[]' value='"+$("#producto").val()+"'> "+$("#producto option:selected").html()+"</td>"+
						"<td> <input type='hidden' name='productocant[]' value='"+$("#cantidad").val()+"'> "+$("#cantidad").val()+"</td>"+
						"<td> <input type='hidden' name='productopre[]' value='"+$("#precio").val()+"'> "+$("#precio").val()+"</td>"+
						"<td> "+subtotal+"</td>"+
						"<td><a style='curso:pointer; color:#D01111' onclick=$(this).closest('tr').remove();monto_pagar(2,"+subtotal+");>Quitar</a></td>"+
					"</tr>";
					$("#lista").append(html); monto_pagar(1,subtotal);
					$("#producto").val("");$("#cantidad").val("");$("#precio").val("");
				}else{
					alert('Ya tiene en su Lista este Producto'); return 0;
				}
			}

			function monto_pagar(tipo,subto) {
				var actualtotal = parseFloat($("#total").val());
				if (tipo==1) {
					actualtotal = parseFloat(actualtotal) + parseFloat(subto);
				}else{
					actualtotal = parseFloat(actualtotal) - parseFloat(subto);
				}
				$("#total").val(actualtotal);
			}
			function guardar(){
				if ($("#lista tr").length == 0) {
					alert("NO ESTA VENDIENDO NADA ... VENDER MINIMO UN PRODUCTO");
					return false;
				}
			}
		</script>
</html>