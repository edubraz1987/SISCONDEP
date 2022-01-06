<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">
<?php
	header('Content-Type: text/html; charset=utf-8');
	
	$con= mysql_connect("localhost","root","root");
	$db= mysql_select_db("siscondep");
	
	session_start();
	
	$validacao = isset($_SESSION['validacao'] ) ? $_SESSION['validacao']  : '0';
	$tipo = isset($_SESSION['tipo'] ) ? $_SESSION['tipo']  : '';
	
	mysql_query("SET NAMES 'utf8'");
	mysql_query('SET character_set_connection=utf8');
	mysql_query('SET character_set_client=utf8');
	mysql_query('SET character_set_results=utf8');
	
	$sql_recomendado = "select id_recomendado,nome,area,assunto,caminho_artigo from recomendado,professor where professor.id_professor = recomendado.id_professor order by nome,area, assunto";
	$rs_recomendado = mysql_query($sql_recomendado);
	
	?>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<head>
			<link rel="stylesheet" type="text/css" href="../css/estilos.css">
			<script src="../scripts/scripts.js"></script>
		</head>
		<div width="500" height="50"><br/>
			<p>Nesta seção, os professores da instituição separaram algum temas e projetos que gostaria mde ver em produção.
			Sinta-se a vontade para ler alguns desses artigos e conversar com o professor responsável para verificar a complexidade e a disponibilidade que o mesmo possui para a orientação.</p>
			
			<div>
			<?php
			
			if (($validacao == "1")&&($tipo=="P"))
			{	
				echo "<table width='100%'>
					<tr>
						<td align='center' colspan='10' bgcolor='#dddddd'><a href='sugerir.php' > SUGERIR TEMA PARA PROJETO</a></td>
					</tr>
				</table><br>";
			}
			if (($validacao == "1")&&($tipo=="A"))
			{	
				echo "<table width='100%'>
					<tr>
						<td align='center' colspan='10' bgcolor='#dddddd'><a href='http://goo.gl/forms/keFA0z065D' > TROCAR ORIENTADOR</a></td>
					</tr>
				</table><br>";
			}
			?>
			</div>
			<fieldset >
				<legend align='center'> TEMAS SUGERIDOS</legend>
						<?php
							if (mysql_affected_rows()==0){
								echo "<table width='100%'>
									<tr>
										<td align='center' colspan='10' bgcolor='#dddddd'>N&#227;o existem resultados para a pesquisa</td>
									</tr>
									</table>";
							}
							else
							{
								echo("
								<table width='100%'>
									<tr bgcolor='#005588' style='color:white; font-family:Cambria;'>
										<td align='center'>L</td>
										<td align='center'>Professor</td>
										<td align='center'>Área</td>
										<td align='center'>Assunto</td>
										<td align='center'>Artigo</td>");
								if (($validacao == "1")&&($tipo=="P"))
								{				
									echo("												
										<td align='center'>Excluir</td>");
								}
									echo("</tr>");
								
								/*8echo ("<br>");
								echo ("$sql_pesquisa");
								echo ("<br>");
								echo ("$rs_pesquisa");*/
								$contador=0;
								
								while ($linha_recomendado=mysql_fetch_array($rs_recomendado)) {
									
									$id_recomendado=$linha_recomendado['id_recomendado'];
									$professor=$linha_recomendado['nome'];
									$assunto=$linha_recomendado['assunto'];
									$area=$linha_recomendado['area'];
									$caminho_artigo=$linha_recomendado['caminho_artigo'];
									
									if ($contador%2==0){
										$cor="#dddddd";
										}
									else{
										$cor="#ffffff";
									}
									
									$contador = $contador+1;
									
									echo("
										<tr bgcolor='$cor' style='color:#005588; font-family:Cambria;'>
											<td align='center'>$contador</td>
											<td align='center'>$professor</td>
											<td align='center'>$area</td>
											<td align='center'>$assunto</td>
											<td align='center'><a href='$caminho_artigo' target=”new”><img src='../img/view.png' width='20' height='20'></a></td>
										");
										
										if (($validacao == "1")&&($tipo=="P"))
										{				
											$usuario = isset($_SESSION['usuario'] ) ? $_SESSION['usuario']  : '';
											echo("												
												<td align='center'><a href='cadastrar_recomendados.php?cmd=excluir&id_recomendado=$id_recomendado'><img src='../img/excluir.png' width='20' height='20'></a></td>");
										}	
										echo("</tr>
											
										");
										
									
									
								}
							}	
						?>	
				</fieldset>
		</div>
<?php
	mysql_close($con);
?>

</html>
