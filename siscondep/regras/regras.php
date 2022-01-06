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
	
	$sql_regras = "select id_regra,regra,descricao,caminho_arquivo from regras order by id_regra, regra";
	$rs_regras = mysql_query($sql_regras);
	
	?>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<head>
			<link rel="stylesheet" type="text/css" href="../css/estilos.css">
			<script src="../scripts/scripts.js"></script>
		</head>
		<div width="400" height="50"><br/>	
				<p>O Trabalho de Conclusão de Curso deve ser elaborado com rigorosidade metodológica adequada ao campo da ciência no qual está inserido. 
				<br/>Sua construção é uma etapa fundamental na formação científica do discente o TCC deve ser também priorizado no processo de formação profissional, 
				não sendo relegado a algo de menor valor, ou como uma tarefa meramente burocrática e desinteressante necessária para finalização do curso.
				<br/>Todos os professores do Centro Universitário Estadual da Zona Oeste estão aptos para prestarem orientação aos discentes, conforme tema de sua formação, atuação ou especialização. 
				<br/>Cabe ao professor orientador não só fornecer informações técnicas relativas ao desenvolvimento do TCC, mas, sobretudo, estimular os alunos a desenvolverem pró-atividade, 
				autonomia e espírito crítico na busca de soluções para os problemas científicos levantados.
				<br/>Estas regras servem como guia orientador para a importante etapa de elaboração do TCC. Nele estão contidas orientações básicas dos processos administrativos 
				e pedagógicos adotados pela UEZO para normatizar a elaboração dos trabalhos de conclusão de curso, contendo uma visão geral dos trâmites necessários, 
				as competências dos alunos e orientadores, orientações sobre projeto de pesquisa e elaboração do artigo científico, 
				e os critérios fundamentais de avaliação dos trabalhos.</p>

			<form method="post" action="lista_arquivos.php?pesquisa=true" enctype="multipart/form-data" width="50">
			<fieldset >
				<legend align='center'>REGRAS PARA A EXECUÇÃO DO TRABALHO DE CONCLUSÃO DE CURSO</legend>
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
										<td align='center'>Regra</td>
										<td align='center'>Descrição</td>
										<td align='center'>Arquivo</td>");
								if (($validacao == "1")&&($tipo=="C"))
									{
										echo("<td align='center'>Editar</td>
										<td align='center'>Excluir</td>");
										
									}
								echo("	
									</tr>
								");
								/*8echo ("<br>");
								echo ("$sql_pesquisa");
								echo ("<br>");
								echo ("$rs_pesquisa");*/
								$linha=0;
								
								while ($linha_regras=mysql_fetch_array($rs_regras)) {
									
									$id_regra=$linha_regras['id_regra'];
									$regra=$linha_regras['regra'];									
									$descricao=$linha_regras['descricao'];
									$caminho_arquivo=$linha_regras['caminho_arquivo'];
									
									if ($linha%2==0){
										$cor="#ffffff";
										}
									else{
										$cor="#dddddd";
									}
									
									$linha = $linha+1;
									
									echo("
										<tr bgcolor='$cor' style='color:#005588; font-family:Cambria;'>
											<td align='center'>$linha</td>
											<td align='center'>$regra</td>
											<td align='center'>$descricao</td>
											<td align='center'><a href='$caminho_arquivo' target=”new”><img src='../img/view.png' width='20' height='20'></a></td>
										");
									if (($validacao == "1")&&($tipo=="C"))
									{				
										echo("
											<td align='center'><a href='editar_regras.php?cmd=editar&id_regra=$id_regra'><img src='../img/editar.png' width='20' height='20'></a></td>
											<td align='center'><a href='excluir_regras.php?cmd=excluir&id_regra=$id_regra'><img src='../img/excluir.png' width='20' height='20'></a></td>");
									}	
									echo("</tr>
										
									");
									
								}
							}	
						?>	
					</table>
				</fieldset>
			</form>
		</div>
		<div>
			<?php
				if (($validacao == "1")&&($tipo=="C")){
					echo "<div class='form_regras' align='center' valign='center'>
							<form name='regra' method='post' enctype='multipart/form-data' action='cadastrar_regras.php'>
								<table border='0' align='center' style='color:white; >
									<tr>
										<td colspan='6' align='center'><font color='gold' size='4'><p style='font-family: Lucida Sans Unicode; font-size:13pt;'><b>Cadastro de Regras</b></p></font></td>
									</tr>
									<tr>
										<td align='right'>Regra:<input name='regra' type='text' id='regra' size='10'></td>
										<td align='right'>Descrição:<input name='descricao' type='text' id='descricao' size='40'></td>
										
										<td align='left'>Arquivo:</td>
										<td width='40'><input type='file' name='txArquivo' id='txArquivo'/></td>
									</tr>
									<tr>
										<td colspan='6'><hr></td>
									</tr>
									<tr>
										<td colspan='6' rowspan='2' align='center'>
											<input align='center' name='cadastrar' type='submit' id='cadastrar' value='Cadastrar Nova Regra'></b>
										</td>
									</tr>
								</table>
							</form></div>";
				}
		
	mysql_close($con);
?>
</div>
</html>
