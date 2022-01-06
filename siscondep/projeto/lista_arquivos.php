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
			echo ("<script type='text/javascript'>alert('Não permitido!');window.close();</script>");			
		}
		else{
	
			$sql_arquivo = "select descricao, dt_inclusao, endereco from arquivo where id_projeto=$id_projeto order by dt_inclusao asc";
			$rs_arquivo = mysql_query($sql_arquivo);
?>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<head>
			<link rel="stylesheet" type="text/css" href="../css/estilos.css">
			<script src="../scripts/scripts.js"></script>
		</head>
		<div width="400" height="50"><br/>	
<?php			
			if (mysql_affected_rows()==0){
				echo "<table width='100%'>
					<tr>
						<td align='center' colspan='10' bgcolor='#dddddd'>Não existem arquivos neste projeto</td>
					</tr>
					</table></fieldset>";
			}
			else{
				
				echo("<table width='100%'>
						
					<tr font-family:Cambria;'>
						<td align='center' colspan='4'><input type='button' onclick='window.close();' value='Fechar'></td>
					</tr>
					<tr>
						<td align='center' colspan='4'><hr></td>
					</tr>
					<tr bgcolor='#005588' style='color:white; font-family:Cambria;'>
						<td align='center'>Linha</td>
						<td align='center'>Arquivo</td>
						<td align='center'>Endereco</td>
						<td align='center'>Data da Inclusão</td>
				");	
				
				$linha=1;
				
				While ($linha_arquivo = mysql_fetch_array($rs_arquivo)){
						$descricao = $linha_arquivo['descricao'];
						$dt_inclusao = $linha_arquivo['dt_inclusao'];
						$dt_inclusao = date('d/m/Y', strtotime($dt_inclusao));
						$endereco = $linha_arquivo['endereco'];
				
					if ($linha%2==0){
						$cor="#dddddd";
						}
					else{
						$cor="#ffffff";
					}	
					
					
					echo "
					<tr bgcolor='$cor'>
						<td align='center'>$linha</td>
						<td align='center'><a href='$endereco' target='new'><img src='../img/view.png' width='20' height='20'></a></td>						
						<td align='center'>$descricao</td>
						<td align='center'>$dt_inclusao</td>
					</tr>";
					
					
					$linha = $linha+1;
					
				}
				echo ("
			
		</table></div></html>");
				
			}
		mysql_close($con);
		}
	}
?>


