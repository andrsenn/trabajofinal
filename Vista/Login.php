<html lang="es">
    <head>
	<meta charset="utf-8" />
	<title>Clases LP4 - FISI UNSM</title>
        <style type="text/css">         
            body{
                background-color: #BDBDBD;
                box-shadow: 100px 50px 200px 100px #E6E6E6 inset;
            }
            #contenedor{
                width: 25%;
                background-color: #F2F2F4;
                border-radius: 10px;
                margin: auto;
            }
            input{
                padding: 4px;
                border: none;
                width: 100%;
                border: 2px solid #a4a4a4; 
            }
            form{
                padding: 20px;
            }
        </style>
    </head>
 
    <body>
	<div style="height:80px;"></div>
	<div class="container" id="contenedor">
            <center><h3>Login LP4 - FISI UNSM</h3></center> <br>
	    <form class="form-horizontal" action="Controlador/Login.php" method="post">
                <div class="form-group">
                    <label class="col-md-4 control-label"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Usuario</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="usuario" required>
                    </div>
                </div> 
                <div class="form-group">
                    <label class="col-md-4 control-label"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span> Contraseña</label>
                    <div class="col-md-8">
                       <input type="password" class="form-control" name="password">
                    </div>
                </div> <br>
                <div class="form-group">
                    <div class="col-md-12">
                        <center>
                            <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-lock"></span> Entrar</button>
                        </center>
                    </div>
                </div> 
        </form>
    </body>
</html>
