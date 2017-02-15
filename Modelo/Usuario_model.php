<?php
	require_once 'Conexion.php';
	session_start();
	class Usuario_model{
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
				$sql = "select *from usuario";
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
                
                
                
                public function Guardar($nombres,$usuario,$clave){	
			try {				
				$sql = "insert into usuario(nombres,usuario,clave) values
				('".$nombres."','".$usuario."','".$clave."')";
				
				$query = $this->dbh->prepare($sql);
				$query->execute(); $this->dbh = null;		
			}catch(PDOException $e){
				print "Error!: " . $e->getMessage();	
			}				
		}
                
                
                
                
                public function TraerCliente($usuario){	
			try {				
				$sql = "select *from usuario where id_user='".$usuario."'";
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
                
                
                public function Modificar($id,$nombres,$usuario,$clave){	
			try {				
				$sql = "update usuario set nombres='".$nombres."',usuario='".$usuario."', clave='".$clave."'where id_user='".$id."'";
				$query = $this->dbh->prepare($sql);
				$query->execute(); $this->dbh = null;		
			}catch(PDOException $e){
				print "Error!: " . $e->getMessage();	
			}				
		}
                
                
                
                public function Eliminar($usuario){
			try {				
				$sql = "delete from usuario where id_user='".$usuario."'";
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

