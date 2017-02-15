<?php
	require_once 'Conexion.php';
	session_start();
	class Login{
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
		
		public function Login_usuario($usuario,$password){	
			try {				
				$sql = "select *from usuario where usuario = ? and clave = ?";
				$query = $this->dbh->prepare($sql);
				$query->bindParam(1,$usuario); $query->bindParam(2,$password);
				$query->execute(); $this->dbh = null;

				if($query->rowCount() == 1){
					$fila  = $query->fetch();
					$_SESSION['usuario'] = $fila['usuario'];				 
					return true;
				}			
			}catch(PDOException $e){
				print "Error!: " . $e->getMessage();	
			}				
		}	    
	    public function __clone(){
	 		trigger_error('No Puede Clonar Este Objeto', E_USER_ERROR); 
	    } 
	}
?>
