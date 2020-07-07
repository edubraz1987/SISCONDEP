<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="css/estilos.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="../scripts/scripts.js">
			var myWindow;
			
			myWindow = window.self;
		</script>
		<?php		
		session_start();
		header("Pragma: no-cache");
		header("Expires: -1");
		header("Cache-Control: no-cache, must-revalidate");
		clearstatcache ();
		
		$_SESSION['sistema']  = "bol";
		
		header('Content-Type: text/html; charset=utf-8');

		/*mysqli_query($con,"SET NAMES 'utf8'");
		mysqli_query($con,'SET character_set_connection=utf8');
		mysqli_query($con,'SET character_set_client=utf8');
		mysqli_query($con,'SET character_set_results=utf8');*/
		
		
		?>
	
	</head>
	<title>SISTEMA DE CONSOLIDAÇÃO DE BOLETINS</title>
	<body class="checked" onload="abrirConvenio(2020);mudaCorlink1();">
	
		<div class="topbar" id="containertopo" align="center">
			<div class="topbar" id="titulo" align="center">
				<img id="logouerj" src="img/logo_uerj_branco.png"></img>
				<label id="containerlabel">SISTEMA DE CONSOLIDAÇÃO DE BOLETINS </label>
			</div>
		</div>
		<div class="topmenuexterno">		
			<ul>
				<li class="logado"><a href="#" id="link1" class="linksmenu" onclick="mudaCorlink1();abrirConvenio(2020);">BOLETINS CONVÊNIO</a></li>
				<li class="logado"><a href="#" id="link2" class="linksmenu" onclick="mudaCorlink2();abrirFinanceiro(2020);">BOLETINS FINANCEIRO</a></li>
				<li class="logado"><a href="#" id="link3" class="linksmenu" onclick="mudaCorlink3();abrirHupe(2020);">BOLETINS HUPE</a></li>
				<li class="logado"><a href="#" id="link4" class="linksmenu" onclick="mudaCorlink4();abrirCepuerj(2020);">BOLETINS CEPUERJ</a></li>
				<li class="logado"><a href="#" id="link5" class="linksmenu" onclick="mudaCorlink5();login();">ACESSO RESTRITO</a></li>
			</ul>
		</div>
		<iframe id="fra_principal" name="fra_principal" src="" frameborder="0" height="670px" width="100%"></iframe>
		<div class="rodape">
			<table class="botao" border="0" width="" align="center"height="100%">
				<tr >
					<td align="center" ><a class="linksmenuativo" href="JavaScript:window.close()">INÍCIO</a></td>					
					<td align="center" >|</td>					
					<td align="center" ><a class="linksmenuativo" href="index_extrato.html" >EXTRATOS</a></td>
					<!--<td align="center" >|</td>					
					<td align="center" ><a class="linksmenuativo" href="">NOTAS FISCAIS</a></td>
					<td align="center" ><a class="linq" href="http:\\dicre-boletim\index-extratos.php">EXTRATOS</a></td>-->
				</tr>
			</table>
				</tr>
			</table>
		</div>
		<div class="rodape">
			Desenvolvido por Eduardo Braz® - Para uso Exclusivo em U E R J	
		</div>
	</body>
</html>
