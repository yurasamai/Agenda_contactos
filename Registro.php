
<!-- Codigo en php para el uso de funciones de sesion de usuario-->

<?php
session_start();
  if (isset($_SESSION['ingreso']) && $_SESSION['ingreso']=='YES') 
  {?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"/>
	<title>Agenda de contactos</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    
    <link rel="stylesheet" href="styles.css">

</head>
<body>
	<header>
		<div class="container-fluid">		
			<h1>Agenda de contactos</h1>		
		</div>
	</header>
	
	<div class="container">
<!--   										 Seccion del formulario para agregar contactos nuevos-->

		<section class="main col-md-12 "> 
			
			<div class="col-md-12">
				<center>
					<button id = "mostrar" class = "btn btn-primary" >Mostrar Contactos</button>
				</center>
				<h3>Agregar contacto</h3>

					<label class=name for="nombre" >Nombre</label>
					<input type = "text" id = "nombre" class = "form-control" maxlength = "100" />

					<label for="telefono">Telefono</label>
					<input type = "text" id = "telefono" class = "form-control" maxlength = "50"/>

					<label for="direccion">Direccion</label>
					<input type = "text" id = "direccion" class = "form-control" maxlength = "100" />

					<label for="email">e-mail</label>
					<input type = "text" id = "email" class = "form-control" maxlength = "100" />

				<center>
				<br>
				<button id = "enviar" class = "btn btn-primary" >Guardar</button>
				</center>
				<br>
				<h4>Buscar por nombre</h4>
				<input type = "text" class = "form-control" id = "coincidencia" />
				<br>
			</div>
				
		</section>

		<!-- Log out -->

		<br>
		<a class="btn btn-primary" href="logout.php" role="button" style="float:right"> <i class="fa fa-sign-out fa-fw"></i> salir </a>
		<br>
		
<!-- 										Tabla que muestra la lista de contactos y sus acciones-->

		<div id = "tabla"  >
			<h5>Lista de contactos</h5>
            <table border ="1" class = "table table-hover" >
                <caption>
                                        
                </caption>
                <thead>
                 	<tr>                         
                    	<th>Nombre</th>
                    	<th>Telefono</th>
                    	<th>Direccion</th>
                    	<th>e-mail</th>
                    	<th>Acciones</th>
                 	</tr>    
                </thead>
                <tbody id = "cuerpo" ></tbody>
           </table>
        </div>
    </div>



<script src = "js/jquery.js" ></script>
<script src = "bootstrap/js/bootstrap.js" ></script>
<script type="text/javascript" src = "js/conts.js" ></script>
 
</body>

</html>
<?php

  }
  else
  {
    header("location: ../");
  }
 ?>