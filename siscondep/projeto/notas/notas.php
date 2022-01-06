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
	
	
	if (($validacao == "1"))
	{
	$usuario = isset($_SESSION['usuario'] ) ? $_SESSION['usuario']  : '';
	$id_projeto = isset($_GET['id_projeto'] ) ? $_GET['id_projeto']  : '0';
	
		if($id_projeto=="0"){
			echo ("<script type='text/javascript'>alert('Não permitido!');location.href='lista_projeto.php';</script>");			
		}
		else{
	
			$sql_nota = "select nota,dt_nota,usuario from nota, login where login.id_usuario = nota.id_usuario and id_projeto=$id_projeto order by dt_nota desc";
			$rs_nota = mysql_query($sql_nota);
	
	?>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<head>
			<link rel="stylesheet" type="text/css" href="../css/estilos.css">
			<script src="../scripts/scripts.js"></script>
		</head>
		<div width="400" height="50"><br/>	
			<form method="post" action="cadastra_notas.php" enctype="multipart/form-data" width="50">
				<table>
				<tr>
					<td align="center">Mensagem de <?php echo strtoupper($usuario);?>: </td>
				</tr>
				<tr>
					<td align="center">
						<textarea name="mensagem" id="mensagem" rows="6" cols="37"></textarea>
						<input type="hidden" id="id_projeto" name="id_projeto" value="<?=$id_projeto?>">
						<input type="hidden" id="id_usuario" name="id_usuario" value="<?=$id_usuario?>">
					</td>
				</tr>
				<tr>
					<td align="center">
						<input type="button" onclick="window.close()" value="Fechar">
						<input type="submit" value="Enviar">
					</td>
				</tr>
				</table>
			</form>
			<fieldset >
				<legend align='center'> Mensagens</legend>
	<?php
							if (mysql_affected_rows()==0){
								echo "<table width='100%'>
									<tr>
										<td align='center' colspan='10' bgcolor='#dddddd'>Não existem mensagens nesta conversa</td>
									</tr>
									</table></fieldset>";
							}
							else
							{
								echo("");
								
								echo("	
									</tr>
								");
								/*8echo ("<br>");
								echo ("$sql_pesquisa");
								echo ("<br>");
								echo ("$rs_pesquisa");*/
								$linha=0;
								
								while ($linha_nota=mysql_fetch_array($rs_nota)) {
									
									$usuario=$linha_nota['usuario'];
									$nota=$linha_nota['nota'];
									$dt_nota=$linha_nota['dt_nota'];
									$dt_nota=date('d/m/Y', strtotime($dt_nota));
									
									if ($linha%2==0){
										$cor="#008855";
										}
									else{
										$cor="#005588";
									}
									
									$linha = $linha+1;
									
									echo("<fieldset>
										<legend align='center'>$usuario - $dt_nota </legend>
											<table width='100%' align='left'>
												<tr bgcolor='$cor' style='color:white; font-family:Cambria;'>
													<td align='center'>$nota</td>
												</tr>
											</table>
										</fieldset>");
								}
							}
			}	
	?>
				</fieldset>
		</div>
		
		<div>
	<?php
	
	}
		mysql_close($con);
	?>
</div>
</html>
