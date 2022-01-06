<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">
<?php
	header('Content-Type: text/html; charset=utf-8');
	
	echo("<script type='text/javascript'> alert('Entrou!!');</script>");
	
	$con= mysql_connect("localhost","root","root");
	$db= mysql_select_db("siscondep");
	
	mysql_query("SET NAMES 'utf8'");
	mysql_query('SET character_set_connection=utf8');
	mysql_query('SET character_set_client=utf8');
	mysql_query('SET character_set_results=utf8');
	
	session_start();
	
	$validacao = isset($_SESSION['validacao'] ) ? $_SESSION['validacao']  : '0';
	$tipo = isset($_SESSION['tipo'] ) ? $_SESSION['tipo']  : '';
	$cmd = isset($_GET['cmd'] ) ? $_GET['cmd']  : '';
	
	
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
		if ($cmd == "cadastrar")
		{
			
			$hoje = date('Y-m-d');					
			
			$evento = "Apresentação de TCC";		
			$dtevento =  isset($_POST['dtevento'] ) ? $_POST['dtevento']  : '';	
			$aluno = isset($_POST['aluno'] ) ? $_POST['aluno']  : '';
			$hora = isset($_POST['hora'] ) ? $_POST['hora']  : '';
			$local = isset($_POST['local'] ) ? $_POST['local']  : '';
			$data_cadastro = date("Y-m-d");
			$orientador = isset($_POST['orientador'] ) ? $_POST['orientador']  : '';
			
			echo("<script type='text/javascript'> alert('$evento | $dtevento | $aluno | $hora | $local | $data_cadastro | $orientador');</script>");
			
			if($aluno=="" || $local=="" || $hora==""){
				echo("<script type='text/javascript'> alert('Todos os campos devem ser preenchidos!');goBack();</script>");	
			}
			elseif($dtevento<=$hoje){
				echo("<script type='text/javascript'> alert('Data inválida!'); goBack();</script>");
			}
			else{			
				$sql_data = ("INSERT INTO agenda(id_agenda, evento, dtevento, autor, data, hora, conteudo, local) VALUES (NULL,'$evento','$dtevento','$aluno','$data_cadastro','$hora','$orientador','$local')");
				mysql_query($sql_data) or die(mysql_error());
				echo ("<script type='text/javascript'>alert('Apresentação cadastrada com sucesso!');location.href='cronograma.php';</script>");
			}
		}
		else if($cmd == "cancelar"){
			
			$id_agenda = isset($_GET['id_agenda'] ) ? $_GET['id_agenda']  : "";
			
			
			mysql_query("DELETE FROM agenda WHERE id_agenda = $id_agenda");
			mysql_close($con);
			echo ("<script type='text/javascript'>alert('Apresentação cancelada!');location.href='cronograma.php';</script>");
		
		}
		
	}
	elseif(($validacao == "1")&&($tipo=="A")){
		echo("<script type='text/javascript'> alert('Apenas docentes estão habilitados para marcar / desmarcar a apresentação de TCCs!');location.href = 'cronograma.php';</script>");
	}
	else{
		echo("<script type='text/javascript'> alert('Não permitido!');window.top.location.href = 'http://localhost/siscondep/index.php';</script>");
	}
	mysql_close($con);
?>
	</body>
</html>
