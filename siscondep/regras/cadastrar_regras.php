<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">
<?php
	header('Content-Type: text/html; charset=utf-8');
	
	$con= mysql_connect("localhost","root","root");
	$db= mysql_select_db("siscondep");
	
	session_start();
	
	$validacao = isset($_SESSION['validacao'] ) ? $_SESSION['validacao']  : '0';
	$tipo = isset($_SESSION['tipo'] ) ? $_SESSION['tipo']  : '';
	
	$cmd = isset($_GET['cmd'] ) ? $_GET['cmd']  : '';	
	
	mysql_query("SET NAMES 'utf8'");
	mysql_query('SET character_set_connection=utf8');
	mysql_query('SET character_set_client=utf8');
	mysql_query('SET character_set_results=utf8');
	
	if ($cmd=="excluir"){
		
		$id_regra = isset($_GET['id_regra'] ) ? $_GET['id_regra']  : '';
	?>
	<SCRIPT LANGUAGE='JavaScript' TYPE='text/javascript'>
		decisao = confirm('Tem certeza que deseja excluir esta regra?');
		
		if (decisao)
		{
			location.href='excluir_regras.php?id_regra=<?=$id_regra;?>';
		} 
		else 
		{
			location.href='lista_usuarios.php';
		}
	</SCRIPT>
	
	<?php
	}
	else{
		$cmd = isset($_GET['cmd'] ) ? $_GET['cmd']  : '';
		
		$regra = isset($_POST['regra'] ) ? $_POST['regra']  : '';
		$descricao = isset($_POST['descricao'] ) ? $_POST['descricao']  : '';
		$arqEmpty = $_FILES['txArquivo']['name'];
		
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
					window.location="regras.php"; 
				}
			</script>
		</head>
		
	<?php		

		if($regra=="" || $descricao==""){
			echo "<script type='text/javascript'>alert('Todos os campos devem ser preenchidos!');goBack();</script>"; 
		}
		else if(empty($arqEmpty)){
			echo "<script type='text/javascript'>alert('Por favor, selecione um arquivo!');goBack();</script>"; 
		}
		else{
			
			$sql_max = ("select max(id_regra) from regras");
			$rs_max = mysql_query($sql_max);
			
			While  ($linha_max = mysql_fetch_array($rs_max)){
				$max = $linha_max[0];
				
			}
			$max = $max+1;
			$max2 = str_pad($max, 3, "0", STR_PAD_LEFT);
			
				
			//echo "<script type='text/javascript'>alert('$max!');</script>"; 
			//echo "<script type='text/javascript'>alert('$max2!');</script>"; 
			
			$extensao = explode('.',trim(strtolower($_FILES['txArquivo']['name'])));
			
			
			$nome_arquivo2 = "regra_".$max2.".".$extensao[1];
						
			$arqName = $_FILES['txArquivo']['name'];
			$arqType = $_FILES['txArquivo']['type'];
			$arqSize = $_FILES['txArquivo']['size'];
			$arqTemp = $_FILES['txArquivo']['tmp_name'];
			$arqError = $_FILES['txArquivo']['error'];
			
			if ($cmd=="editar"){
				
				$id_regra = isset($_GET['id_regra'] ) ? $_GET['id_regra']  : '';
				$max2 = str_pad($id_regra, 3, "0", STR_PAD_LEFT);
				
				$sql_regras = ("UPDATE regras SET regra = '$regra', descricao = '$descricao', caminho_arquivo = '$nome_arquivo2' WHERE id_regra = $id_regra");
				mysql_query($sql_regras) or die (mysql_error());
				$upload = move_uploaded_file($arqTemp, $nome_arquivo2);
				
				echo "<script type='text/javascript'>alert('Regra $id_regra alterada com sucesso!');goHome();</script>";
			}
			else{
				$sql_regras = "INSERT INTO regras(id_regra, regra, descricao, caminho_arquivo) VALUES (NULL,'$regra','$descricao','$nome_arquivo2')";
				mysql_query($sql_regras) or die (mysql_error());
				$upload = move_uploaded_file($arqTemp, $nome_arquivo2);
				
				echo "<script type='text/javascript'>alert('Regra $max cadastrada com sucesso!');goHome();</script>";
			}
		}
		mysql_close($con);
	}
?>

</html>
