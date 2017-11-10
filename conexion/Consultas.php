
                 <!-- CODIGO EN PHP DONDE SE ENCUENTRAN LOS METODOS QUE REALIZARAN LAS CONSULTAS A LA BASE DE DATOS -->


<?php
require 'Conexion.php'; 

class Consultas extends Conexion{
    //put your code here
    
    public function __construct() {
        parent::__construct();
    }
    
	public function guardarContacto( $nombre , $telefono, $direccion, $email ) // Guardar nuevo contacto en la base de datos 
    {
    	$this->abrirConexion();
    	
    	$this->setConsulta( "INSERT INTO contacto( nombre, telefono_movil, correo, direccion)
    			values ('".$nombre."','".$telefono."','".$email."','".$direccion."')" );
	
    	$this->cerrarConexion();
    }
	
	
    public function buscarPorNombre( $letra )  //Busca todos los contactos por coincidencia de nombre
	{
        $resultado = Array();
        $this->abrirConexion();
        //$this->seleccionarBaseDatos('guardarLinks');
        $rSQL = $this->getConsulta("SELECT id, nombre, telefono_movil, correo, direccion FROM agenda.contacto WHERE nombre LIKE '%".$letra."%' ORDER BY nombre ASC");
		
        if( mysqli_num_rows( $rSQL ) > 0 )
		{
            while ( $fila = mysqli_fetch_assoc( $rSQL ) )
			{
                array_push( $resultado , $fila );
            }
        }
		
        $this->cerrarConexion();
        
        return $resultado;
    }
	

    public function editarContacto( $id, $nombre , $telefono, $direccion, $email) // Funcion que ayuda a editar un contacto ya existente por
    {                                                                             // cambiando el valor a peticion del usuario. 
    	$this->abrirConexion();
       
    	if($nombre!="")
        $this->setConsulta("UPDATE contacto set nombre='".$nombre."' WHERE id=".$id.""); 
        if($telefono!="")
        $this->setConsulta("UPDATE contacto set telefono_movil='".$telefono."' WHERE id=".$id.""); 
        if($direccion!="")
        $this->setConsulta("UPDATE contacto set direccion = '".$direccion."'  WHERE id=".$id.""); 
        if($email!="")
        $this->setConsulta("UPDATE contacto set  correo = '".$email."' WHERE id=".$id."");  
		
    	$this->cerrarConexion();
    }
    
    
    public function eliminarContacto( $id ) //Borrar un contacto
    {
    	$this->abrirConexion();
    	$this->setConsulta("DELETE FROM agenda.contacto WHERE id=".$id."");
    	$this->cerrarConexion();
    }
}
?>
