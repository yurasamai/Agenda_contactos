<?php
	require_once( "../conexion/Consultas.php");
	
	$opciones = array();
	
	$consulta = new Consultas();
	
	if( $_POST[ "type" ] == 1)  
	{
		
			$resultado = $consulta -> buscarPorNombre( $_POST[ "coincidencia" ] ); // Buscar contacto por cioncidencia de nombre
	}
	
	
	foreach( $resultado as $valor )  // Mostrar contacto resultado de la busqueda 
	{
		echo "<tr class = 'info'>
				
				<td>".$valor[ "nombre" ]."</td>
				<td>".$valor[ "telefono_movil" ]."</td>
				<td>".$valor[ "direccion" ]."</td>
				<td>".$valor[ "correo" ]."</td>
				
				<td>
					<button class = 'btn btn-warning editar' id = '".$valor[ "id" ]."'>Editar</button><br><br>
					<button class = 'btn btn-danger eliminar' id = '".$valor[ "id" ]."'>Eliminar</button>
				</td>
			  </tr>";
	}

?>