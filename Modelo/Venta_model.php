<?php
	require_once 'Conexion.php';
	session_start();
	class Venta_model{
	    private static $instancia;
	    private $dbh;
	 
	    private function __construct(){
	 		$this->dbh = Conexion::conectando();
	    }
	 
	    public static function conectar(){ 
	        if (!isset(self::$instancia)) {
	            $miclase = __CLASS__;
	            self::$instancia = new $miclase; 
	        }
	 		return self::$instancia; 
	    }
            
            
            public function Mostrar(){	
			try {	
                            
                                
               			$sql = "select *from detalle_ventas where estado=1";
				$query = $this->dbh->prepare($sql);
				$query->execute(); $this->dbh = null;
		

				$Datos=array();
				while( $datos = $query->fetch()){
    				$Datos[]=$datos;

                
    			}
				return $Datos;			
			}catch(PDOException $e){
				print "Error!: " . $e->getMessage();	
			}				
		}
           
            public function Productos(){	
			try {				
				$sql = "select *from productos";
				$query = $this->dbh->prepare($sql);
				$query->execute(); $this->dbh = null;

				$Datos=array();
				while( $datos = $query->fetch()){
    				$Datos[]=$datos;	
    			}
				return $Datos;			
			}catch(PDOException $e){
				print "Error!: " . $e->getMessage();	
			}				
		}  
                
                
                public function Guardar(){	
			try {	
				$sql = "select MAX(idventa) as idventa from ventas";
				$query = $this->dbh->prepare($sql);
				$query->execute();

				$venta  = $query->fetch();
				$idventa = (int)($venta['idventa']) + 1;	

				$sql = "insert into ventas(idventa,fecha_venta,total) values
				('".$idventa."','".$_POST["fecha_venta"]."','".$_POST["total"]."')";
				
				$query = $this->dbh->prepare($sql);
				$query->execute(); 

				foreach ($_POST["productoid"] as $key => $value) {
					$sql = "insert into detalle_ventas(idventa,idproducto,cantidad,precio_unitario,descuento) values
					('".$idventa."','".$_POST["productoid"][$key]."','".$_POST["productocant"][$key]."','".$_POST["productopre"][$key]."',0)";
					
					$query = $this->dbh->prepare($sql);
					$query->execute(); 
				}

				$this->dbh = null;		
			}catch(PDOException $e){
				print "Error!: " . $e->getMessage();	
			}				
		}
                
                
                
                
                public function TraerCliente($cliente){	
			try {				
				$sql = "select *from cliente where id_cliente='".$cliente."'";
				$query = $this->dbh->prepare($sql);
				$query->execute(); $this->dbh = null;

				$Datos=array();
				while( $datos = $query->fetch()){
    				$Datos[]=$datos;	
    			}
				return $Datos;			
			}catch(PDOException $e){
				print "Error!: " . $e->getMessage();	
			}		
		}
                
                
                public function Modificar($id,$dni,$nombre,$apellidos,$direccion,$telefono,$fecha,$correo){	
			try {				
				$sql = "update cliente set dni='".$dni."',nombre='".$nombre."', apellidos='".$apellidos."', 
				direccion='".$direccion."', telefono='".$telefono."',fechanacimiento='".$fecha."',
				correo='".$correo."' where id_cliente='".$id."'";
				$query = $this->dbh->prepare($sql);
				$query->execute(); $this->dbh = null;		
			}catch(PDOException $e){
				print "Error!: " . $e->getMessage();	
			}				
		}
                
                
                
                public function Eliminar($venta){
			try {				
				$sql = "update detalle_ventas set estado=0 where idventa=".$venta;
				$query1 = $this->dbh->prepare($sql);
				$query1->execute(); $this->dbh = null;		
			}catch(PDOException $e){
				print "Error!: " . $e->getMessage();	
			}				
		}






	    public function __clone(){
	 		trigger_error('No Puede Clonar Este Objeto', E_USER_ERROR); 
	    } 
                
                
                
                
		
		
		
		
		
	       

	    
	}
	
?>