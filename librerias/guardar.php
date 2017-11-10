  				
  									<!-- CODIGO EN PHP DONDE SE ENCUENTRAN LOS METODOS POST -->

<?php
	require_once( "../conexion/Consultas.php" );
	
	$consulta = new Consultas();
	
	switch( $_POST[ "type" ] ) 
	{
		case 1: // Guardar contactos
		{
			$consulta -> guardarContacto( $_POST[ "nombre" ] , $_POST[ "telefono" ], $_POST[ "direccion" ], $_POST[ "email" ]  );
		}
		break;
		
		case 2: //Editar contacto
		{
			$consulta -> editarContacto($_POST[ "id" ],$_POST[ "nombre" ] , $_POST[ "telefono" ],$_POST[ "direccion" ],$_POST[ "email" ]);
		}
		break;
		
		case 3: //Eliminar contacto
		{
			$consulta -> eliminarContacto( $_POST[ "id" ] );
		}
		break;
	}
	
?>