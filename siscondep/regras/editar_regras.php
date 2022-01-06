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
	
	$id_regra = isset($_GET['id_regra'] ) ? $_GET['id_regra']  : '';
		
	$sql_regras = "select regra, descricao, caminho_arquivo from regras where id_regra = $id_regra";
	$rs_regras = mysql_query($sql_regras);
	
	while ($linha_regras=mysql_fetch_array($rs_regras)) {
									
		$regra=$linha_regras['regra'];									
		$descricao=$linha_regras['descricao'];
		$caminho_arquivo=$linha_regras['caminho_arquivo'];
		
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
					window.location="regras.php"; 
				}
			</script>
		</head>
		<div>
			<?php
				if (($validacao == "1")&&($tipo=="C")){
					echo "<div class='form_regras' align='center' valign='center'>
							<form name='regra' method='post' enctype='multipart/form-data' action='cadastrar_regras.php?cmd=editar&id_regra=$id_regra'>
								<table border='0' align='center' style='color:white; >
									<tr>
										<td colspan='6' align='center'><font color='gold' size='4'><p style='font-family: Lucida Sans Unicode; font-size:13pt;'><b>Cadastro de Regras</b></p></font></td>
									</tr>
									<tr>
										<td align='right'>Regra:<input name='regra' type='text' id='regra' size='10' value='$regra'></td>
										<td align='right'>Descrição:<input name='descricao' type='text' id='descricao' size='40' value='$descricao'></td>
										
										<td align='left'>Arquivo:</td>
										<td width='40'><input type='file' name='txArquivo' id='txArquivo'/></td>
									</tr>
									<tr>
										<td colspan='6'><hr></td>
									</tr>
									<tr>
										<td colspan='6' rowspan='2' align='center'>
											<input align='center' type='button' value='Cancelar'></b>
											<input align='center' name='cadastrar' type='submit' id='cadastrar' value='Editar Regra'></b>
										</td>
									</tr>
								</table>
							</form></div>";
				}
		
	mysql_close($con);
?>
</div>
</html>
