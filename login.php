<?PHP
$nusuario=$_REQUEST['usuario'];
$contrasena=$_REQUEST['password'];


//Conexion con la base de datos de manera local
$link=mysqli_connect("localhost","root",""); 
mysqli_select_db($link, "agenda");

		//Validacion de usuario
		if($result=mysqli_query($link,"select * FROM `usuario` WHERE nusuario='$nusuario'"))
				{
					if($row=mysqli_fetch_array($result))
					{ 
						$idexiste=1;
						$password=$row['password'];
						if ($password==$contrasena) // Validacion de password
						{
							session_start();
							$_SESSION['ingreso']='YES';
							$_SESSION['id']=$row['id'];
							
							echo"
							<html>
								<head>
									<meta http-equiv='REFRESH' content='0; url=Registro.php'>
									<script>
										alert('Bienvenido');
									</script>
								</head>
							</html>";
						}
						else
						{
							echo"
							<html>
								<head>
									<meta http-equiv='REFRESH' content='0; url=../'>
									<script>
										alert('password incorrecto');
									</script>
								</head>
							</html>";
						}

		    		}
					else 		//En caso contrario el usuario no es correcto
					{
						$idexiste=0;
						echo"
							<html>
								<head>
									<meta http-equiv='REFRESH' content='0; url=../'>
									<script>
										alert('Ese usuario no existe');
									</script>
								</head>
							</html>";
					}
				}


?>