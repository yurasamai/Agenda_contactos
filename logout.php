
													<!-- CODIGO EN PHP QUE FINALIZA LA SESION-->

<?php
	session_start();
	session_destroy();
	header("location: index.php");
?>