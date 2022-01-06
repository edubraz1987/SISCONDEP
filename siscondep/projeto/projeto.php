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
	
	if (($validacao == "1")&&($tipo=="A"))
	{
		$usuario = $_SESSION['usuario'];
		//echo "$usuario do tipo: $tipo" ;

		
		$sql_projeto = "select aluno.nome, aluno.matricula, aluno.email, professor.nome, professor.matricula, professor.email, projeto.sigla, projeto.nome, projeto.status, projeto.id_projeto from login,aluno,professor,projeto where aluno.id_aluno = projeto.id_aluno and professor.id_professor = projeto.id_professor and aluno.id_usuario = login.id_usuario and login.usuario = '$usuario'";
		$rs_projeto=mysql_query($sql_projeto);
		
			//echo "$sql_projeto";
	?>
		<meta http-equiv="Content-Type" content="text/html;" />
		<head>
			<link rel="stylesheet" type="text/css" href="../css/estilos.css">
			<script src="../scripts/scripts.js"></script>
			<script language="JavaScript">
			function voltar(){
				window.top.location.href = 'http://localhost/siscondep/index.php';
			}
			function outraJanela(id_projeto){
				//alert(id_projeto);
				window.open("notas/notas.php?id_projeto="+id_projeto,"Notas","width=300, height=650, scrollbars='no', location='no', directories='no', status='no', menubar='no', toolbar='no', resizable='no'");	
			}
			</script>
		</head>
		<body>
		<div>
	<?php
		
		if (mysql_affected_rows()==0){
			
			echo("<script type='text/javascript'> alert('Nenhum projeto encontrado, cadastre-o por favor!');</script>");
			echo ("
			<form method='post' action='cadastra_projeto.php' enctype='multipart/form-data'>
			<fieldset align='center'>
					<legend>Cadastro de Projeto</legend>
						<table border='0' align='center'>
						<tr>");
							
							$sql_aluno = ("select id_aluno,aluno.id_usuario,nome,matricula,email,status from aluno,login where aluno.id_usuario = login.id_usuario and login.usuario = '$usuario' order by nome");
							$rs_aluno = mysql_query($sql_aluno);
							//echo ("$sql_aluno");
							//echo $sql_aluno;
							While  ($linha_aluno = mysql_fetch_array($rs_aluno)){
								
								$id_aluno = $linha_aluno['id_aluno'];
								$id_usuario = $linha_aluno['id_usuario'];
								$nome = $linha_aluno['nome'];
								$matricula = $linha_aluno['matricula'];
								$email = $linha_aluno['email'];					
								$status_aluno = $linha_aluno['status'];					
								
							}
							
					if($status_aluno=="INATIVO"){
						echo("<script type='text/javascript'> alert('Aluno com restrições. Consultar a coordenação!');window.top.location.href = 'http://localhost/siscondep/index.php';</script>");				
					}	
					else{
							echo ("
							<tr>
								<td align='center'>DADOS DO ALUNO</td>
							</tr>
							
							<!-- Aluno -->
							
							<td align='center'>
								<label>Aluno:&nbsp</label>
								<input type='text' size='30' value='$nome' readonly>	
								
								<label>Matrícula:&nbsp</label>
								<input type='text' size='10' value='$matricula' readonly>
								
								<label>Email:&nbsp</label>
								<input type='text' value='$email' readonly>
								
								<label>Situação:&nbsp</label>
								<input type='text' size='10' name='$status_aluno' id='$status_aluno' value='$status_aluno' readonly>	
								<input type='hidden' size='10' name='id_aluno' id='id_aluno' value='$id_aluno' readonly>	
							</td>
						</tr>
						<tr>
							<td align='center'><hr></td>
						</tr>
						<tr>
							<td align='center'>DADOS DO ORIENTADOR</td>
						</tr>
						<tr>
							<td align='center'>
								
								");
								
								
									$sql_professor = "select id_professor,nome from professor where status='LESSIONANDO' order by nome";
									$rs_professor = mysql_query($sql_professor);
									
									echo("<label>Orientador:&nbsp</label>
									<select name='professor' id='professor' style='width:250px'>
									<option value='0' selected></option>");
									
									While  ($linha_professor = mysql_fetch_array($rs_professor)){
									
										$id_professor = $linha_professor['id_professor'];
										$nome_professor = $linha_professor['nome'];
											
										echo("<option value='$id_professor' >$nome_professor</option>");
									}
									
									$sql_professor2 = "select id_professor,nome from professor where status='LESSIONANDO' order by nome";
									$rs_professor2 = mysql_query($sql_professor2);
									
									echo("</select>
								
									<label>Co-orientador:&nbsp</label>
									<select name='professor2' id='professor2' style='width:250px'>
									<option value='0' selected></option>");
									
									
									While  ($linha_professor2 = mysql_fetch_array($rs_professor2)){
									
										$id_professor2 = $linha_professor2['id_professor'];
										$nome_professor2 = $linha_professor2['nome'];
											
										echo("<option value='$id_professor2' >$nome_professor2</option>");
									}
									echo("</select>
								
							</td>
						</tr>
						<tr>
							<td align='center' colspan='2'>
								<label><font color='#8ec7e6' size='2'><b>Orientador e coorientador selecionados devem ser diferentes</b></font></label><br>
								<label><font color='#ff1166' size='1'><b>Caso não haja coorientador favor deixar em branco</b></font></label>
							</td>
						</tr>
						<tr>
							<td align='center'><hr></td>
						</tr>
						<tr>
							<td align='center'>DADOS DO PROJETO</td>
						</tr>
						<tr>
							<td align='center' colspan='2'>
								<label>Sigla:&nbsp</label>
								<input type='text' name='sigla' id='sigla' size='15'  >	
								
								<label>Nome do Projeto:&nbsp</label>
								<input type='text' name='projeto' id='projeto' size='95'  >	
								
							</td>
						</tr>
						<tr>	
							<td align='center'>	
								<input type='hidden' name='status' id='status' value='EM APROVAÇÃO' size='105'  >
								<input type='button' value='Cancelar' onclick='voltar();' >							
								<input type='submit' name='cadastrar' id='cadastrar' value='Cadastrar Projeto' >							
							</td>
						</tr>
							
						</table>	
						</fieldset>
					</form>");
			
					}
			
		}
		else
		{
			
	echo "
		<div class='form_proj' align='center' valign='center'>
		<form name='arquivo' method='post' enctype='multipart/form-data' action='cadastrar_arquivos.php'>
			<table border='0' align='center' style='color:white; >
				<tr>
					<td colspan='6' align='center'><font color='gold' size='4'><p style='font-family: Lucida Sans Unicode; font-size:13pt;'><b>Adicionar Arquivos ao Projeto</b></p></font></td>
				</tr>
				<tr>
					<td align='right'>Descrição:<input name='descricao' type='text' id='descricao' size='35'></td>
					<td align='left'>Arquivo:</td>
					<td width='40'><input type='file' name='txArquivo' id='txArquivo'/></td>
					<td colspan='6' rowspan='2' align='center'>
						<input align='center' name='cadastrar' type='submit' id='cadastrar' value='Vincular Arquivo'></b>
					</td>
				</tr>
			</table>
		</form></div>";
			
		echo("
		
			<table width='100%'>
			<tr bgcolor='#005588' style='color:white; font-family:Cambria;'>
				<td align='center'>Matrícula</td>
				<td align='center'>Aluno</td>
				<td align='center'>Orientador</td>
				<td align='center'>Matrícula</td>
				<td align='center'>Contato Professor</td>
				<td align='center'>Sigla</td>
				<td align='center'>Projeto</td>
				<td align='center'>Status</td>
				<td align='center'>NOTAS</td>
			</tr>
			");
			
			$cont=1;
			
			while ($linha=mysql_fetch_array($rs_projeto)) {
				
				$id_projeto=$linha[9];
				$matricula_aluno=$linha[1];
				$nome_aluno=$linha[0];
				$matricula_professor=$linha[3];
				$nome_professor=$linha[4];
				$email_professor=$linha[5];
				$nome_projeto=$linha[6];
				$sigla_projeto=$linha[7];
				$status=$linha[8];
				
				echo "
				<tr bgcolor='#dddddd'>
				<td align='center'>$matricula_aluno</td>
				<td align='center'>$nome_aluno</td>
				<td align='center'>$matricula_professor</td>
				<td align='center'>$nome_professor</td>
				<td align='center'><a href='mailto:$email_professor'>$email_professor</a></td>
				<td align='center'>$nome_projeto</td>
				<td align='center'>$sigla_projeto</td>
				<td align='center'>$status</td>";
				
				if($cont==1){
					echo "<td align='center'>
						<a href='' onclick='outraJanela($id_projeto);');>
							<img src='../img/editar.png' width='20' height='20'>
						</a>
					</td></tr></table>";
					$cont++;
				}
				
			} 
			
			
			
			
		$sql_arquivos = "select id_arquivo,descricao,dt_inclusao,endereco from arquivo where id_projeto='$id_projeto' order by dt_inclusao";
		//echo $sql_arquivos;
		$rs_arquivos = mysql_query($sql_arquivos);
	
			if (mysql_affected_rows()==0){
				echo "<fieldset >
					<legend align='center'>Arquivos</legend>
					<table width='100%' align='center'><tr>
					<td align='center' colspan='10' bgcolor='#dddddd'>Não existem arquivos neste projeto</td>
						</tr>
					</table>
				</fieldset>";
			}
			else
			{
				$linha=1;
				
				while ($linha_arquivos=mysql_fetch_array($rs_arquivos)) {
									
					$id_arquivo=$linha_arquivos['id_arquivo'];
					$descricao=$linha_arquivos['descricao'];
					$endereco=$linha_arquivos['endereco'];
					$dt_inclusao=$linha_arquivos['dt_inclusao'];
					$dt_inclusao=date('d/m/Y', strtotime($dt_inclusao));
					
					if ($linha%2==0){
						$cor="#dddddd";
						}
					else{
						$cor="#ffffff";
					}
					
					if ($linha==1){
					
					echo "<fieldset >
					<legend align='center'>ARQUIVOS</legend>
						<table width='100%' border='1' align='center'>";
					
						echo "
						<tr bgcolor='#005588' style='color:white; font-family:Cambria;'>
							<td align='center'>Linha</td>
							<td align='center'>Arquivo</td>
							<td align='center'>Descrição</td>
							<td align='center'>Data da Inclusão</td>
							<td align='center'>Excluir</td>
							
						</tr>";
					}
					
					echo("
						<tr bgcolor='$cor' style='color:#005588; font-family:Cambria;'>
							<td align='center'>$linha</td>
							<td align='center'><a href='../arquivos/$endereco' target=”new”><img src='../img/view.png' width='20' height='20'></a></td>
							<td align='center' class='link'>$descricao</td>
							<td align='center'>$dt_inclusao</td>							
							<td align='center'><a href='excluir_arquivos.php?cmd=excluir&id_arquivo=$id_arquivo'><img src='../img/excluir.png' width='20' height='20'></a></td>							
						</tr>
					");
					
					$linha = $linha+1;
					
				}
					echo "
						</table>
					</fieldset>";
			}
		}
	
	?>
		</div>
<?php
	}
	else if(($validacao == "1")&&($tipo=="P")){
		$usuario = $_SESSION['usuario'];
		//echo "$usuario do tipo: $tipo" ;
		
		$sql_projeto = "select id_projeto, aluno.nome, projeto.sigla, projeto.nome, projeto.status from login,aluno,professor,projeto where aluno.id_aluno = projeto.id_aluno and professor.id_professor = projeto.id_professor and professor.id_usuario = login.id_usuario and login.usuario = '$usuario' and projeto.status <> 'EM APROVACAO'";
		$rs_projeto=mysql_query($sql_projeto);
		
			//echo "$sql_projeto";
	?>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<head>
			<link rel="stylesheet" type="text/css" href="../css/estilos.css">
			<script src="../scripts/scripts.js"></script>
			<script language="JavaScript">
			function voltar(){
				window.top.location.href = 'http://localhost/siscondep/index.php';
			}
			function outraJanela(id_projeto){
				//alert(id_projeto);
				window.open("notas/notas.php?id_projeto="+id_projeto,"Notas","width=300, height=650, scrollbars='no', location='no', directories='no', status='no', menubar='no', toolbar='no', resizable='no'");	
			}
			function outraJanela2(id_projeto){
				//alert(id_projeto);
				window.open("lista_arquivos.php?id_projeto="+id_projeto,"Arquivos","width=800, height=650, scrollbars='no', location='no', directories='no', status='no', menubar='no', toolbar='no', resizable='no'");	
			}
			</script>
		</head>
		<body>
		<div>
	<?php
		
		if (mysql_affected_rows()==0){
			
			echo("<script type='text/javascript'> alert('Nenhum projeto sendo orientado. Verifique na telas de aceitação.');</script>");
		}
		else{
			echo("
			<table width='100%'>
			<tr bgcolor='#005588' style='color:white; font-family:Cambria;'>
				<td align='center'>Linha</td>
				<td align='center'>Aluno</td>
				<td align='center'>Projeto</td>
				<td align='center'>Sigla</td>
				<td align='center'>Status</td>
				<td align='center'>NOTAS</td>
				<td align='center'>ARQUIVOS</td>
			
			");	
			$cont=1;
			while ($linha=mysql_fetch_array($rs_projeto)) {
				$id_projeto=$linha[0];
				$nome_aluno=$linha[1];
				$nome_projeto=$linha[3];
				$sigla_projeto=$linha[2];
				$status=$linha[4];
				
				echo "
				<tr bgcolor='#dddddd'>
					<td align='center'>$cont</td>
					<td align='center'>$nome_aluno</td>
					<td align='center'>$nome_projeto</td>
					<td align='center'>$sigla_projeto</td>
					<td align='center'>$status</td>
					<td align='center'>
						<a href='' onclick='outraJanela($id_projeto);');>
							<img src='../img/conv.png' width='20' height='20'>
						</a>
					</td>
					<td align='center'>
						<a href='' onclick='outraJanela2($id_projeto);');>
							<img src='../img/arquivo.png' width='22' height='22'>
						</a>
					</td>
				</tr>";
					$cont++;
			}
		}
		
		echo("</table>
		</div>
		<br/>
		<div>");
		
		$sql_projeto = "select id_projeto, aluno.nome, projeto.sigla, projeto.nome, projeto.status,aluno.id_aluno from login,aluno,professor,projeto where aluno.id_aluno = projeto.id_aluno and professor.id_professor = projeto.id_professor and professor.id_usuario = login.id_usuario and login.usuario = '$usuario' and projeto.status = 'EM APROVACAO'";
		$rs_projeto=mysql_query($sql_projeto);
		
		if (mysql_affected_rows()==0){
			
			echo("
			<table width='100%'>
			<tr bgcolor='#005588' style='color:white; font-family:Cambria;'>
				<td align='center'>EM APROVAÇÃO</td>	
			</tr>
			<tr>
				<td align='center' colspan='10' bgcolor='#dddddd'>Não existem projetos para aprovação</td>
			</tr>
			
			");	}
		else{
			echo("
			<table width='100%'>			
			<tr bgcolor='#005588' style='color:white; font-family:Cambria;'>
				<td align='center' colspan='8'>EM APROVAÇÃO</td>
			</tr>
			<tr bgcolor='#005588' style='color:white; font-family:Cambria;'>
				<td align='center'>Linha</td>
				<td align='center'>Aluno</td>
				<td align='center'>Projeto</td>
				<td align='center'>Sigla</td>
				<td align='center'>Status</td>
				<td align='center'>RECUSAR</td>
				<td align='center'>ACEITAR</td>
			</tr>
			
			");	
			$cont=1;
			while ($linha=mysql_fetch_array($rs_projeto)) {
				$id_aluno=$linha[5];
				$id_projeto=$linha[0];
				$nome_aluno=$linha[1];
				$nome_projeto=$linha[3];
				$sigla_projeto=$linha[2];
				$status=$linha[4];
				
				echo "
				<tr bgcolor='#dddddd'>
					<td align='center'>$cont</td>
					<td align='center'>$nome_aluno</td>
					<td align='center'>$nome_projeto</td>
					<td align='center'>$sigla_projeto</td>
					<td align='center'>$status</td>
					<td align='center'>
						<a href='cadastra_projeto.php?cmd=alterar&opcao=recusar&id_projeto=$id_projeto&id_aluno=$id_aluno');>
							<img src='../img/recusar.png' width='20' height='20'>
						</a>
					</td><td align='center'>
						<a href='cadastra_projeto.php?cmd=alterar&opcao=aceitar&id_projeto=$id_projeto&id_aluno=$id_aluno');>
							<img src='../img/aceitar2.png' width='20' height='20'>
						</a>
					</td>
				</tr>";
					$cont++;
			}
		}
	}
	else{
		echo("<script type='text/javascript'> alert('Não permitido!');window.top.location.href = 'http://localhost/siscondep/index.php';</script>");
	}
	mysql_close($con);
?>
	</body>
</html>
