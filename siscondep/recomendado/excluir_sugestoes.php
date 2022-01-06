<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="/css/estilos.css">
		<script src="/scripts/scripts.js"></script>
		<script>
		function goBack() {
			window.history.back()
		}
		function goHome() {
			window.location="recomendados.php"; 
		}
	</script>
	</head>
	<body>
	<?php 
		$con = mysql_connect('localhost','root','root');
		$basedados = mysql_select_db('siscondep');
		
		mysql_query("SET NAMES 'utf8'");
		mysql_query('SET character_set_connection=utf8');
		mysql_query('SET character_set_client=utf8');
		mysql_query('SET character_set_results=utf8');
		
		session_start();
		
		$validacao = isset($_SESSION['validacao'] ) ? $_SESSION['validacao']  : '0';
		$tipo = isset($_SESSION['tipo'] ) ? $_SESSION['tipo']  : '';
				
		if (($validacao == "1")&&($tipo=="P"))
		{
			$id_recomendado = $_GET["id_recomendado"];
			
			mysql_query("DELETE FROM recomendado WHERE id_recomendado = $id_recomendado");
			mysql_close($con);
			echo "<SCRIPT LANGUAGE='JavaScript' TYPE='text/javascript'>alert('Artigo excluído com sucesso!');location.href='recomendados.php';</script>";
		}
		else{			
			echo("<script type='text/javascript'> alert('Não permitido!');goBack();</script>");	
		}
	?>
	</body>
</html>