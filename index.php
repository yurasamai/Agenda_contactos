
 <!-- Funcion para sesiones en php -->

<?php 
    session_start();
    if (isset($_SESSION['ingreso']) && $_SESSION['ingreso']=='YES') 
    {
		
				header("location: Registro.php");
	}
        

?>
<!DOCTYPE html>
<html lang="en">
<head> 
	<meta charset="UTF-8">
	<title>Agenda de contactos</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="styles.css">

</head>
<body>
	<header>
		<div class="container-fluid">		
			<h1>Agenda de contactos</h1>		
		</div>


	</header>
<!--                               Formulario para el Inicio de sesion
 del usuario  -->
	<div class="container">
		
			<section class="main">  
				
				<div class="text-center">

					<h4>Iniciar sesion</h4>

					<form id="login-form" class="form-horizontal"  action="login.php" method="post">
					
						<label for="usuario">Usuario</label>
						<center>
							<div class="col-md-6">	
								<input  id="usuario" name="usuario" class="form-control"  maxlength="10" type="text" placeholder="Usuario" required>
								<label for="password">Password</label>
								<input id="password" name="password" class="form-control input-xs" type="password" placeholder="Password" maxlength="7" required>
							</div>
						</center>
						<br>			
						<button class="btn btn-primary">Login</button>
						<br><br>

					</form>

				</div>
		
			</section>

		</div>

		  
	
	<script src="js/jquery.js"></script>
	<script src="js/boostrap.min.js"></script>
</body>
</html>