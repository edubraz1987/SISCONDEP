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
	
	$validacao = isset($_SESSION['validacao'] ) ? $_SESSION['validacao']  : '0';
	$tipo = isset($_SESSION['tipo'] ) ? $_SESSION['tipo']  : '';
	
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
			window.location="recomendados.php"; 
		}
	</script>
	</head>
	
<?php

	if (($validacao == "1")&&($tipo=="P")){
		echo "<div class='form_regras' align='center' valign='center'>
				<form name='regra' method='post' enctype='multipart/form-data' action='cadastrar_recomendados.php'>
					<table border='0' align='center' style='color:white; >
						<tr>
							<td colspan='6' align='center'><font color='gold' size='4'><p style='font-family: Lucida Sans Unicode; font-size:13pt;'><b>Cadastro de Sugestões</b></p></font></td>
						</tr>
						<tr>
							<td align='right'>Assunto:<input name='assunto' type='text' id='assunto' size='35'></td>
							<td align='right'>Área:<input name='area' type='text' id='area' size='25'></td>
							
							<td align='left'>Arquivo:</td>
							<td width='40'><input type='file' name='txArquivo' id='txArquivo'/></td>
						</tr>
						<tr>
							<td colspan='6'><hr></td>
						</tr>
						<tr>
							<td colspan='6' rowspan='2' align='center'>
								<input align='center' type='button' onclick='goBack();' value='Cancelar'></b>
								<input align='center' name='cadastrar' type='submit' id='cadastrar' value='Cadastrar Sugestão'></b>
							</td>
						</tr>
					</table>
				</form></div>";
	}
	else
	{ 
		echo("<script type='text/javascript'> alert('Não permitido!');window.top.location.href = 'http://localhost/siscondep/index.php';</script>");
	}

?>

</html>
