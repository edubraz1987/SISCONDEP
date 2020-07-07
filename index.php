<html>
	<title>UNIVERSIDADE DO ESTADO DO RIO DE JANEIRO</title>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link rel="stylesheet" type="text/css" href="css/estilos.css">
		<script src="scripts/scripts.js"></script>
		<script type='text/javascript'>
			function emObras(){
				alert('FUNCIONALIDADE EM DESENVOLVIMENTO!');
			}
		</script>
		<?php
		session_start();
		
		header('Content-Type: text/html; charset=utf-8');

		$con= mysqli_connect("localhost","root","","sicob");
		//$db= mysqli_select_db("sicob");

		mysqli_query($con,"SET NAMES 'utf8'");
		mysqli_query($con,'SET character_set_connection=utf8');
		mysqli_query($con,'SET character_set_client=utf8');
		mysqli_query($con,'SET character_set_results=utf8');
		
		
		?>
	</head>	
	<body class="login">
		<div class="topbar" id="containertopo" align="center">
			<div class="topbar" id="titulo" align="center">
				<img id="logouerj" src="img/logo_uerj_branco.png"></img>
				<label id="containerlabel" >UNIVERSIDADE DO ESTADO DO RIO DE JANEIRO </label>
			</div>
		</div>
		<div class="novoindex">
			<table class="botao" border="0" width="400px" align="center" valign="left" height="100px">
				<tr >
					<td align="center" ><a class="linq" href="http:\\dicre-servidor\index_extrato.html" target="_blank">EXTRATOS</a></td>
				</tr>
			</table>	
		</div>		
		<div class="novoindex2" align="center" valign="left" >
			<table class="botao" border="0" width="400px" align="center" valign="left" height="100px">
				<tr >
					<td valign="left" align="center"><a class="linq" href="index_boletim.php" target="_blank">BOLETINS</a></td>
				</tr>
			</table>
		</div>
		<div class="novoindex3" align="center" valign="left" >
			<table class="botao" border="0" width="400px" align="center" valign="left" height="100px">
				<tr >
					<td valign="left" align="center"><a class="linq" href="" onclick="emObras()">NOTAS FISCAIS</a></td>
				</tr>
			</table>
		</div>
	</body>

</html>