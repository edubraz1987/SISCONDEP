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
	
	//echo "<script type='text/javascript'>alert('$arqEmpty');goBack();</script>";
	
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
			window.location="projeto.php"; 
		}
	</script>
	
	
<?php
	if(($validacao == "1")&&($tipo=="A")){
		
		$cmd = isset($_GET['cmd'] ) ? $_GET['cmd']  : '';
		$id_arquivo = isset($_GET['id_arquivo'] ) ? $_GET['id_arquivo']  : '';
		
		if($cmd=="excluir"){
	?>	
			<SCRIPT LANGUAGE='JavaScript' TYPE='text/javascript'>
				decisao = confirm('Tem certeza que deseja excluir o arquivo vinculado?');
				
				if (decisao)
				{
					location.href='excluir_arquivos.php?id_arquivo=<?=$id_arquivo;?>';
				} 
				else 
				{
					location.href='projeto.php';
				}
			</SCRIPT>
		</head>
	<?php
		}
		else
		{
			$descricao = isset($_POST['descricao'] ) ? $_POST['descricao']  : '';
			$arqEmpty = isset($_FILES['txArquivo']['name']) ?  $_FILES['txArquivo']['name']  : '';
			
			$usuario = isset($_SESSION['usuario'] ) ? $_SESSION['usuario']  : '';
			
			$sql_projeto = ("select id_projeto from aluno,login,projeto where login.id_usuario = aluno.id_usuario and projeto.id_aluno = aluno.id_aluno and usuario = '$usuario'");
			$rs_projeto = mysql_query($sql_projeto);
			
			While  ($linha_projeto = mysql_fetch_array($rs_projeto)){
					$id_projeto = $linha_projeto['id_projeto'];
			}
			
			if($descricao==""){
				echo "<script type='text/javascript'>alert('Todos os campos devem ser preenchidos!');goBack();</script>"; 
			}
			else if(empty($arqEmpty)){
				echo "<script type='text/javascript'>alert('Por favor, selecione um arquivo!');goBack();</script>"; 
			}
			else{
				
				$sql_max = ("select max(id_arquivo) from arquivo");
				$rs_max = mysql_query($sql_max);
				
				While  ($linha_max = mysql_fetch_array($rs_max)){
					$max = $linha_max[0];					
				}
				
				$max = $max+1;
				$max2 = str_pad($max, 3, "0", STR_PAD_LEFT);
				$novo_id = str_pad($id_projeto, 3, "0", STR_PAD_LEFT);
				
					
				//echo "<script type='text/javascript'>alert('$max!');</script>"; 
				//echo "<script type='text/javascript'>alert('$max2!');</script>"; 
				
				$extensao = explode('.',trim(strtolower($_FILES['txArquivo']['name'])));
				
				$nome_arquivo2 = "P".$novo_id."_".$max2.".".$extensao[1];
				
				$dt_hoje =  date("Y-m-d");
				
				$arqName = $_FILES['txArquivo']['name'];
				$arqType = $_FILES['txArquivo']['type'];
				$arqSize = $_FILES['txArquivo']['size'];
				$arqTemp = $_FILES['txArquivo']['tmp_name'];
				$arqError = $_FILES['txArquivo']['error'];
				
				$sql_regras = "INSERT INTO arquivo(id_arquivo, id_projeto, endereco, dt_inclusao, descricao) VALUES (NULL,'$id_projeto','$nome_arquivo2','$dt_hoje','$descricao')";
				mysql_query($sql_regras) or die (mysql_error());
				$upload = move_uploaded_file($arqTemp, $nome_arquivo2);
				
				echo "<script type='text/javascript'>alert('Arquivo cadastrado com sucesso!');goHome();</script>";
			}
			mysql_close($con);
		}
	}
	else
	{ 
		echo("<script type='text/javascript'> alert('Não permitido!');goback();</script>");
	}
	
?>

</html>
