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
		
	$usuario = isset($_SESSION['usuario'] ) ? $_SESSION['usuario']  : '';
	//echo("<script type='text/javascript'> alert('$validacao /$tipo');</script>");
	
?>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<head>
			<link rel="stylesheet" type="text/css" href="../css/estilos.css">
			<script src="../scripts/scripts.js"></script>
			<script language="JavaScript">
			function goBack(){
				window.history.back()
			}
			</script>
		</head>
		<body>
<?php
	
	if (($validacao == "1")&&($tipo=="P"))
	{
		$hoje = date('Y-m-d');	
	?>
		<div class='form_data' align='center' valign='left'>
		<form name='marcar' method='post' action='cadastrar_data.php?cmd=cadastrar' enctype='multipart/form-data'>
			<table border='0' align='center' class='data'>
				<tr>
					<td  align='center' colspan='2'><font color='gold' size='4'><p style='font-family: Lucida Sans Unicode; font-size:13pt;'><b>Apresentação de Trabalho de Conclusão de Curso</b></p></td>
				</tr>
				<tr>
					<td align='center' colspan='2' >
						Data da Apresentação:
						<input name='dtevento' type='date' id='dtevento' value='<?php echo $hoje; ?>' size='20'>
					</td>
				</tr>
				<tr>
					<td  align='right'>
					<?php
					$sql_aluno = "select aluno.id_aluno,aluno.nome from aluno, projeto, professor, login where aluno.id_aluno = projeto.id_aluno and professor.id_professor = projeto.id_professor and professor.id_usuario = login.id_usuario and login.usuario = '$usuario' order by nome";
					$rs_aluno = mysql_query($sql_aluno);
					
					echo("<label>Aluno:&nbsp</label>
					<select name='aluno' id='aluno' style='width:250px'>
					<option value='0' selected></option>");
					
					While  ($linha_aluno = mysql_fetch_array($rs_aluno)){
					
						$id_aluno = $linha_aluno['id_aluno'];
						$nome_aluno = $linha_aluno['nome'];
							
						echo("<option value='$nome_aluno'>$nome_aluno</option>");
					}
					echo("</select></td>");
					?>
					<td align='right'>Hora:
						<select name='hora' id='hora' style='width: 155px'>
							<option value='0' selected></option>
							<option value='9'>09:00</option>
							<option value='10'>10:00</option>
							<option value='11'>11:00</option>
							<option value='12'>12:00</option>
							<option value='13'>13:00</option>
							<option value='14'>14:00</option>
							<option value='15'>15:00</option>
							<option value='16'>16:00</option>
							<option value='17'>17:00</option>
							<option value='18'>18:00</option>
							<option value='19'>19:00</option>
							<option value='10'>20:00</option>
							<option value='21'>21:00</option>
						</select>
					</td>
				</tr>
				<tr>
					<td align='right'>Professor:
					<?php
					$sql_professor = "select professor.id_professor,professor.nome from professor,login where professor.id_usuario = login.id_usuario and login.usuario = '$usuario' order by nome";
					$rs_professor = mysql_query($sql_professor);
					
					echo("<label>Orientador:&nbsp</label>");
					
					While  ($linha_professor = mysql_fetch_array($rs_professor)){
					
						$id_professor = $linha_professor['id_professor'];
						$nome_professor = $linha_professor['nome'];
							
						echo("<input name='orientador' type='text' value='$nome_professor' id='orientador' size='20' readonly>");
					}
				?>
				
					<td align='left' >Local:<input name='local' type='text' value='' id='local' size='20'></td>
				</tr>
				<tr>	
					<td  align='center' colspan='2'>
						<hr>
					</td>
				</tr>
				<tr>	
					<td align='center' colspan='2'>
						<input type='button' value='Cancelar' onclick="location.href='cronograma.php';">
						<input align='center' name='cadastrar' type='submit' id='cadastrar' value='Cadastrar Data'>
					</td>
					</font>
				</tr>
				
			</table>
		</form></div>
		<br/>
	<?php
	}
	else if(($validacao == "1")&&($tipo=="A")){
		echo("<script type='text/javascript'> alert('Apenas docentes estão habilitados para marcar / desmarcar a apresentação de TCCs!');location.href = 'cronograma.php';</script>");
	}
	else{
		echo("<script type='text/javascript'> alert('Não permitido!');window.top.location.href = 'http://152.92.198.162/siscondep/index.php';</script>");
	}
	mysql_close($con);
?>
	</body>
</html>
