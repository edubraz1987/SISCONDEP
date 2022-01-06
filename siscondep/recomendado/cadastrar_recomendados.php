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
			window.location="recomendados.php"; 
		}
	</script>
	
	
<?php
	if(($validacao == "1")&&($tipo=="P")){
		
		$cmd = isset($_GET['cmd'] ) ? $_GET['cmd']  : '';
		$id_recomendado = isset($_GET['id_recomendado'] ) ? $_GET['id_recomendado']  : '';
		
		if($cmd=="excluir"){
	?>	
			<SCRIPT LANGUAGE='JavaScript' TYPE='text/javascript'>
				decisao = confirm('Tem certeza que deseja excluir o artigo sugerido?');
				
				if (decisao)
				{
					location.href='excluir_sugestoes.php?id_recomendado=<?=$id_recomendado;?>';
				} 
				else 
				{
					location.href='recomendados.php';
				}
			</SCRIPT>
		</head>
	<?php
		}
		else
		{
			$assunto = isset($_POST['assunto'] ) ? $_POST['assunto']  : '';
			$area = isset($_POST['area'] ) ? $_POST['area']  : '';
			$arqEmpty = isset($_FILES['txArquivo']['name']) ?  $_FILES['txArquivo']['name']  : '';
			
			$assunto=strtoupper($assunto);
			
			$usuario = isset($_SESSION['usuario'] ) ? $_SESSION['usuario']  : '';
			
			$sql_professor = ("select id_professor from professor,login where login.id_usuario = professor.id_usuario and usuario = '$usuario'");
			$rs_professor = mysql_query($sql_professor);
			
			While  ($linha_professor = mysql_fetch_array($rs_professor)){
					$id_professor = $linha_professor['id_professor'];
			}
			
			if($assunto=="" || $area==""){
				echo "<script type='text/javascript'>alert('Todos os campos devem ser preenchidos!');goBack();</script>"; 
			}
			else if(empty($arqEmpty)){
				echo "<script type='text/javascript'>alert('Por favor, selecione um arquivo!');goBack();</script>"; 
			}
			else{
				
				$sql_max = ("select max(id_recomendado) from recomendado");
				$rs_max = mysql_query($sql_max);
				
				While  ($linha_max = mysql_fetch_array($rs_max)){
					$max = $linha_max[0];
					
				}
				$max = $max+1;
				$max2 = str_pad($max, 3, "0", STR_PAD_LEFT);
				
					
				//echo "<script type='text/javascript'>alert('$max!');</script>"; 
				//echo "<script type='text/javascript'>alert('$max2!');</script>"; 
				
				$extensao = explode('.',trim(strtolower($_FILES['txArquivo']['name'])));
				
				
				$nome_arquivo2 = "rec_".$max2.".".$extensao[1];
				
				$arqName = $_FILES['txArquivo']['name'];
				$arqType = $_FILES['txArquivo']['type'];
				$arqSize = $_FILES['txArquivo']['size'];
				$arqTemp = $_FILES['txArquivo']['tmp_name'];
				$arqError = $_FILES['txArquivo']['error'];
				
				$sql_regras = "INSERT INTO recomendado(id_recomendado, id_professor, assunto, area, caminho_artigo) VALUES (NULL,'$id_professor','$assunto','$area','$nome_arquivo2')";
				mysql_query($sql_regras) or die (mysql_error());
				$upload = move_uploaded_file($arqTemp, $nome_arquivo2);
				
				echo "<script type='text/javascript'>alert('Sugestão $max2 cadastrada com sucesso!');goHome();</script>";
			}
			mysql_close($con);
		}
	}
	else
	{ 
		echo("<script type='text/javascript'> alert('Não permitido!');window.top.location.href = 'http://localhost/siscondep/index.php';</script>");
	}
	
?>

</html>
