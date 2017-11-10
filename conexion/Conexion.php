                        <!-- CODIGO EN PHP DONDE SE REALIZA LA CONEXION A LA BASE DE DATOS -->

<?php

class Conexion {

   
    private $servidor;
    private $user;
    private $password;
    private $conexion;
	
    
    public function __construct() {
        $this->servidor = 'localhost';
        $this->user = 'root';
        $this->password = '';
		
    }
  
  public function abrirConexion(){  // Se abre la conexion

		$this->conexion=mysqli_connect("localhost","root","")or die('no se conecto'); 
        mysqli_select_db($this->conexion, "agenda");
    }

    public function cerrarConexion(){ // Cierre de conexion
        mysqli_close($this->conexion);
    }

    public function getConexion(){  
        return $this->conexion;
    }
   
    public function setConsulta($query){
       return mysqli_query( $this->conexion, $query);
        echo mysqli_error();
    }
    
    public function getConsulta($query){
       return mysqli_query( $this->conexion, $query);
	   echo mysql_error();
    }
}
?>
