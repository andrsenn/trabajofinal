<?php
	require_once 'Conexion.php';
	session_start();
	class Producto_model{
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
                
                
                
                public function Guardar($idproducto,$descripcion,$stock,$preciouni){	
			try {				
				$sql = "insert into productos(idproducto,descripcion,stock,preciouni) values
				('".$idproducto."','".$descripcion."','".$stock."','".$preciouni."')";
				
				$query = $this->dbh->prepare($sql);
				$query->execute(); $this->dbh = null;		
			}catch(PDOException $e){
				print "Error!: " . $e->getMessage();	
			}				
		}
                
                
                
                
               public function TraerProducto($producto){	
			try {				
				$sql = "select *from productos where idproducto='".$producto."'";
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
                
                
                public function Modificar($idproducto,$descripcion,$stock,$preciouni){	
			try {				
				$sql = "update productos set idproducto='".$idproducto."',descripcion='".$descripcion."', stock='".$stock."', preciouni='".$preciouni."'where idproducto='".$idproducto."'";
				$query = $this->dbh->prepare($sql);
				$query->execute(); $this->dbh = null;		
			}catch(PDOException $e){
				print "Error!: " . $e->getMessage();	
			}				
		}
                
                
                
                public function Eliminar($producto){
			try {				
				$sql = "delete from producto where idproducto='".$producto."'";
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
