<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">
<?php
	header('Content-Type: text/html; charset=utf-8');
	
	$con= mysql_connect("localhost","root","root");
	$db= mysql_select_db("siscondep");
	
	mysql_query("SET NAMES 'utf8'");
	mysql_query('SET character_set_connection=utf8');
	mysql_query('SET character_set_client=utf8');
	mysql_query('SET character_set_results=utf8');
	
	
	$pesquisa = isset($_GET['pesquisa']) ? $_GET['pesquisa'] : '';
	$data_escolhida = isset($_POST["data_busca"]) ? $_POST["data_busca"] : '';
	
	$hoje = date('Y-m-d');
	
	if ($data_escolhida<>""){
	?>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<head>
		</head>
		<div width="500" height="50">
			<form method="post" action="listar_data.php?pesquisa=true" enctype="multipart/form-data" width="50">
			<fieldset >
				<legend align='center'>Selecione a data da Apresentação a ser Cancelada</legend>
					<table border=1  align="center">
						<tr>
							<!-- Órgão -->
							<td align="left">
							
							<?php
																
								echo("<label>Data:</label>");
								echo("<input type='date' id='data_busca' name='data_busca' value='$data_escolhida' autofocus>");
								
						?>
								<input type="submit" value="Pesquisar" />
								<input type="button" onclick= "location.href='cronograma.php';" value="Cancelar" />
							</td>
						</tr>   
					</table>	
				</fieldset>
			</form>
		</div>
		<hr>
<?php
	}
	else{
	?>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<head>
		</head>
		<div width="500" height="50">
			<form method="post" action="listar_data.php?pesquisa=true" enctype="multipart/form-data" width="50">
			<fieldset >
				<legend align='center'>Selecione a data da Apresentação a ser Cancelada</legend>
					<table border=1  align="center">
						<tr>
							<td align="left">
							
							<?php
																
								echo("<label>Data:</label>");
								echo("<input type='date' id='data_busca' name='data_busca' value='$hoje' autofocus>");
								
						?>
								<input type="submit" value="Pesquisar" />
								<input type="button" onclick= "location.href='cronograma.php';" value="Cancelar" />
							</td>
						</tr>   
					</table>	
				</fieldset>
			</form>
		</div>
		<hr>
<?php
	}
	
	if($pesquisa=="true"){
	
		//echo("$orgao / $documento / $tributo");
		
		$sql_pesquisa = "select * from agenda where dtevento='$data_escolhida' order by data,hora,autor";
		$rs_pesquisa = mysql_query($sql_pesquisa);
			
		if (mysql_affected_rows()==0){
			echo "<table width='100%'>
				<tr>
					<td align='center' colspan='10' bgcolor='#dddddd'>N&#227;o existem apresentações neste dia</td>
				</tr>
				</table>";
		}
		else
		{
			echo("
			<table width='100%'>
				<tr bgcolor='#005588' style='color:white; font-family:Cambria;'>
					<td align='center'>Data do Evento</td>
					<td align='center'>Autor</td>
					<td align='center'>Evento</td>
					<td align='center'>Orientador</td>
					<td align='center'>Local</td>
					<td align='center'>Excluir</td>
				</tr>
			");
			
			$contador=0;
			
			while ($linha_pesquisa=mysql_fetch_array($rs_pesquisa)) {
				
				$id_agenda=$linha_pesquisa['id_agenda'];
				$autor=$linha_pesquisa['autor'];
				$evento=$linha_pesquisa['evento'];
				$orientador=$linha_pesquisa['conteudo'];
				$local=$linha_pesquisa['local'];
				
				$dt_evento=$linha_pesquisa['dtevento'];
				$dt_evento=date('d/m/Y', strtotime($dt_evento));
				
				if ($contador%2==0){
					$cor="#dddddd";
					}
				else{
					$cor="#ffffff";
				}
				
				echo("
					<tr bgcolor='$cor' style='color:#005588; font-family:Cambria;'>
						<td align='center'>$dt_evento</td>
						<td align='center'>$autor</td>
						<td align='center'>$evento</td>
						<td align='center'>$orientador</td>
						<td align='center'>$local</td>
						<td align='center'><a href='cadastrar_data.php?cmd=cancelar&id_agenda=$id_agenda'><img src='../img/canc_data.png' width='20' height='20'></a></td>							
					</tr>
					
				");
				
			}
		}
	}
	mysql_close($con);
?>

</html>
