<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">
<head>
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
	<script src="../scripts/scripts.js"></script>
	<script language="JavaScript">
	function voltar(){
		window.top.location.href = 'http://localhost/siscondep/index.php';
	}
	</script>
</head>
<body>
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
	
	$cmd = isset($_GET['cmd'] ) ? $_GET['cmd']  : '';
	$opcao = isset($_GET['opcao'] ) ? $_GET['opcao']  : '';
	
	//echo ("<script type='text/javascript'>alert('$validacao');goBack();</script>");	
	//echo ("<script type='text/javascript'>alert('$tipo');goBack();</script>");	
	//echo ("<script type='text/javascript'>alert('$validacao |$tipo |$cmd |$opcao ');</script>");
	
	
	if (($validacao == "1")&&($tipo=="A"))
	{
		$usuario = $_SESSION['usuario'];
		$id_aluno = isset($_POST['id_aluno'] ) ? $_POST['id_aluno']  : '';
		$id_professor = isset($_POST['professor'] ) ? $_POST['professor']  : '0';
		$id_professor2 = isset($_POST['professor2'] ) ? $_POST['professor2']  : '0';
		$sigla = isset($_POST['sigla'] ) ? $_POST['sigla']  : '';
		$nome_projeto = isset($_POST['projeto'] ) ? $_POST['projeto']  : '';
		
		//echo ("<script type='text/javascript'>alert('$id_aluno!');</script>");	
		
		if($id_professor=="" || $sigla=="" || $nome_projeto=="" ){
			echo ("<script type='text/javascript'>alert('Todos os campos devem ser preenchidos!');goBack();</script>");	
		}
		else if($id_professor==$id_professor2){
			echo ("<script type='text/javascript'>alert('Orientador e coorientador devem ser diferentes!');goBack();</script>");	
			
		}
		else{
			
			if ($cmd == "alterar"){
				$id_projeto = $_GET["id_projeto"];
				$sql=("UPDATE projeto SET id_professor='$id_professor',id_coorientador='$id_professor2',sigla='$sigla',nome='$nome_projeto',status='EM APROVAÇÃO' WHERE id_projeto='$id_projeto' and id_aluno='$id_aluno'");
				mysql_query($sql) or die(mysql_error());
				echo ("<script type='text/javascript'>alert('Projeto alterado com sucesso!');location.href='projeto.php';</script>");
			}
			else{
			
				$sql=("INSERT into projeto (id_projeto, id_aluno, id_professor, id_coorientador, sigla, nome, status) VALUES (NULL,'$id_aluno','$id_professor','$id_professor2','$sigla','$nome_projeto','EM APROVAÇÃO')");
					//ECHO $sql;
					mysql_query($sql) or die(mysql_error());
				echo ("<script type='text/javascript'>alert('Projeto cadastrado com sucesso!');location.href='projeto.php';</script>");
			}
			
		}
	}
	else if(($validacao == "1")&&($tipo=="P")){		
		
		if ($cmd == "alterar" && $opcao=="aceitar"){
			$id_projeto = $_GET["id_projeto"];
			$id_aluno = $_GET["id_aluno"];
			
			$sql=("UPDATE projeto SET status='EM DESENVOLVIMENTO' WHERE id_projeto='$id_projeto' and id_aluno='$id_aluno'");
			mysql_query($sql) or die(mysql_error());
			echo ("<script type='text/javascript'>alert('Projeto aceito com sucesso!');location.href='projeto.php';</script>");
		}
		else if ($cmd == "alterar" && $opcao=="recusar"){
			$id_projeto = $_GET["id_projeto"];
			$sql=("DELETE FROM projeto WHERE id_projeto='$id_projeto'");
			mysql_query($sql) or die(mysql_error());
			echo ("<script type='text/javascript'>alert('Projeto recusado!');location.href='projeto.php';</script>");	
		}
		else{
			echo("<script type='text/javascript'> alert('Não permitido!');location.href='projeto.php';</script>");		
		}
	}
	else{
		echo("<script type='text/javascript'> alert('Não permitido!');voltar();</script>");		
	}
		
		
	mysql_close($con);
			
	?>
</body>
</html>