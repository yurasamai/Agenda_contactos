
                           /*Codigo JavaScript con las funciones necesarias para la gestion de la agenda de contactos */

$(function()
{
	var opcion = 0;
	var identificacion = 0;
	$(document).ready(function()
  {
    $( "#nombre" ).val( "" );
    $( "#telefono" ).val( "" );
    $( "#direccion" ).val( "" );
    $( "#email" ).val( "" );
    $( "#enviar" ).removeAttr( "disabled" );
  });


	 function editarDatos( tipo ) // Editar Contacto
 	 {
    	$( "button[class*=editar]" ).bind('click',function()
    	{
     	 identificacion = $(this).attr( "id" );
      
      		$.ajax
      		({
       		 type : "POST",
        	url : "librerias/guardar.php",
        	data : { id : $(this).attr( "id" ) , nombre : $( "#nombre" ).val() , telefono : $( "#telefono" ).val(), direccion : $( "#direccion" ).val(), email : $( "#email" ).val(), type : 2 },
        	success:function( data )
        		{
          			cargarTabla( tipo );
         			 $( "#nombre" ).val( "" );
          			 $( "#telefono" ).val( "" );
          			 $( "#direccion" ).val( "" );
          			 $( "#email" ).val( "" );
          
          			alert( "Modificacion realizada!" );
        		}
     		 });
    	});
  	}


  	function eliminarDatos( tipo ) // Eliminar COntacto 
  {
    $( "button[class*=eliminar]" ).bind('click',function()
    {
      $.ajax
      ({
        type : "POST",
        url : "librerias/guardar.php",
        data : { id : $(this).attr( "id" ) , type : 3 },
        success:function()
        {
          cargarTabla( tipo );
        }
      });
    });
  }

  
  function cargarTabla( opcion ) // Mostrar lista de contactos en la tabla 
  {
    if( opcion == 1 )
    {
      $( "#cuerpo" ).load( "librerias/buscar.php" , { coincidencia : $( "#coincidencia" ).val() , type : 1 } , function(responseText, textStatus, XMLHttoRequest)
      {
        if(textStatus == "success")
        {
          editarDatos( 1 );
          eliminarDatos( 1 );
        }
      }); 
    }
     
  }
  
  
  
  $( "#coincidencia" ).keyup(function()  // Mostrar coincidencias 
  { 
    cargarTabla( 1 );
  });
  
  $( "#mostrar" ).click(function() // Mostrar Lista
  { 
    cargarTabla( 1 );
  });
  
  
  $( "#enviar" ).click(function() //Registrar un contacto nuevo 
  {
      if( $( "#nombre" ).val() != "" )
      {
        if( $( "#telefono" ).val() != "" )
        {
        
          $.ajax
          ({
            type : "POST",
            url : "librerias/guardar.php",
            data : { nombre : $( "#nombre" ).val() , telefono : $( "#telefono" ).val(), direccion : $( "#direccion" ).val() , email : $( "#email" ).val() , type : 1 },
            success:function()
            {
              $( "#nombre" ).val( "" );
              $( "#telefono" ).val( "" );
              $( "#direccion" ).val( "" );
              $( "#email" ).val( "" );
            
            alert( "Contacto registrado!" );
            }
          });
        }
        else
        {
        alert( "Debes de proporcionar un telefono como minimo");
        }
      }
      else
      {
        alert( "Debes de proporcionar un nombre de contacto");
      }  
  });

	
});