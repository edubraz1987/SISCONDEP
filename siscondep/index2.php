<html>
	<title>Sistema de Apoio e Controle no desenvolvimento de projetos finais</title>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link rel="stylesheet" type="text/css" href="css/estilos.css">
		<script src="scripts/scripts.js"></script>
		<?php
			header('Content-Type: text/html; charset=utf-8');
	
			$con= mysql_connect("localhost","root","root");
			$db= mysql_select_db("siscondep");

			mysql_query("SET NAMES 'utf8'");
			mysql_query('SET character_set_connection=utf8');
			mysql_query('SET character_set_client=utf8');
			mysql_query('SET character_set_results=utf8');
		?>
	</head>
	<body class="login">
		<div class="login" align="center" valign="left">
			<form name="login" method="post" action="control/confirmar_login.php">
				<table border="0"  class="login">
					<tr>
						<td rowspan="6" width="80" align="center"><a href="index.php"><img id="logouerj2" src="img/logo-pequena.png"></a></td>
					</tr>
					<tr>
						<td width="50"><b>Login:</b></td>
						<td width="100"><input name="login" type="text" id="login"></td>
					</tr>
					<tr>
						<td><b>Senha:</b></td>
						<td><input name="senha" type="password" id="senha"></td>
					</tr>
					<tr>
						<td colspan="2">
						<div align="center">
						<b><input align="center" name="entrar" type="submit" id="entrar" value="Entrar"></b>
						</div></td>
					</tr>
					<tr>
						<td colspan="2" align="center" ><a class="linque" href="control/recuperar_senha.php">Esqueci minha senha</a></td>
					</tr>
					<tr>
						<td colspan="2" align="center" ><a class="linque" href="index.php">Página inicial</a> | 
						<a class="linque" href="http://goo.gl/3EAO8e">Solicitar Acesso</a></td>
					</tr>
				</table>
			</form>
		</div>
	</body>
</html>