<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">
<?php
	header('Content-Type: text/html; charset=utf-8');
	
	$con= mysql_connect("localhost","root","root");
	$db= mysql_select_db("siscondep");
	
	mysql_query("SET NAMES 'utf8'");
	mysql_query('SET character_set_connection=utf8');
	mysql_query('SET character_set_client=utf8');
	mysql_query('SET character_set_results=utf8');
	
	session_start();
	
	$nota = isset($_POST['mensagem'] ) ? $_POST['mensagem']  : '';
	$id_projeto = isset($_POST['id_projeto'] ) ? $_POST['id_projeto']  : '';
	$usuario = isset($_SESSION['usuario'] ) ? $_SESSION['usuario']  : '';
	$dt_nota =  date("Y-m-d");  
	
	$sql_usuario = "select id_usuario from login where usuario = '$usuario'";
	$rs_usuario = mysql_query($sql_usuario);
	
	while ($linha_usuario=mysql_fetch_array($rs_usuario)) {
									
	$id_usuario=$linha_usuario['id_usuario'];
	
	}
	
?>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<head>
		<link rel="stylesheet" type="text/css" href="../css/estilos.css">
		<script src="../scripts/scripts.js"></script>
		<script>
		function goBack() {
			window.history.back()
		}
		function goHome() {
			window.location="notas.php"; 
		}
	</script>
	</head>
	
<?php

	if($nota=="" ){
		echo "<script type='text/javascript'>alert('Digite a mensagem antes de enviar!');goBack();</script>"; 
	}
	else{
		
		$sql_notas = "INSERT INTO nota(id_nota, id_projeto, id_usuario, nota, dt_nota) VALUES (NULL,'$id_projeto','$id_usuario','$nota','$dt_nota')";
		mysql_query($sql_notas) or die (mysql_error());		
		echo "<script type='text/javascript'>alert('Mensagem enviada com sucesso!');location.href='notas.php?id_projeto=$id_projeto';</script>";
	}
	mysql_close($con);
?>

</html>
