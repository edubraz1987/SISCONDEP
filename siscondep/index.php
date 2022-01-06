<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="css/estilos.css">
		<script src="scripts/scripts.js">
			var myWindow;
			
			myWindow = window.self;
		</script>
	</head>
	<title>Sistema de Apoio e Controle no desenvolvimento de projetos finais</title>

	<body class="checked" onload="mudaCorlink1();abrirRegras();">
		<div class="topbar" id="containertopo" align="center">
			<div class="topbar" id="titulo" align="center">
				<img id="logouerj" src="img/logo-pequena.png"></img>
				<label id="containerlabel" >Sistema de Apoio e Controle no desenvolvimento de projetos finais </label>
			</div>
		</div>
		<div class="topmenuexterno">		
			<ul>
				<li class="logado"><a href="#" id="link1" class="linksmenu" onclick="mudaCorlink1();abrirRegras();">Regras</a></li>
				<li class="logado"><a href="#" id="link2" class="linksmenu" onclick="mudaCorlink2();carregarSugeridos();">Temas Sugeridos</a></li>
				<li class="logado"><a href="#" id="link3" class="linksmenu" onclick="mudaCorlink3();abrirCronograma(1);">Apresentações</a></li>
				<li class="logado"><a href="index2.php" id="link3" class="linksmenu" onclick="deslogar();">Acesso</a></li>
			</ul>
		</div>
		<iframe id="fra_principal" name="fra_principal" src="" frameborder="0" height="500px" width="100%"></iframe>
		<div class="rodape">
			Desenvolvido por Ethielle Ramos ® - Para uso Exclusivo em UEZO			
		</div>
		
	</body>
</html>