<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link rel="stylesheet" type="text/css" href="css/estilos.css">
		<script src="scripts/scripts.js"></script>
	</head>
	<title>Sistema de Apoio e Controle no desenvolvimento de projetos finais</title>
<?php
	
	session_start();
	$validacao = isset($_SESSION['validacao'] ) ? $_SESSION['validacao']  : '0';
	
		//agora verifico se ele possui permissão para acessar a página
	if ($_SESSION['validacao'] == "1")
	{
		$usuario = $_SESSION['usuario'];
		$tipo = $_SESSION['tipo'];
		$logado = $_SESSION['validacao'];
		//echo "$usuario do tipo: $tipo" ;
		
	if ($tipo=="A"){	
	?>
	<body class="checked" onload="abrirProjeto(<?=$logado?>);mudaCorlink1();verificar_login();">
		<div class="topbar" id="containertopo" align="center">
			<div class="topbar" id="titulo" align="center">
				<img id="logouerj" src="img/logo-pequena.png">
				<label id="containerlabel" >Sistema de Apoio e Controle no desenvolvimento de projetos finais </label>
			</div>
		</div>
		<div class="topmenu">		
			<ul>
				<li class="logado"><a href="#" id="link1" class="linksmenu" onclick="abrirProjeto(<?=$logado?>);mudaCorlink1();">Projeto</a></li>
				<li class="logado"><a href="#" id="link2" class="linksmenu" onclick="carregarSugeridos();mudaCorlink2();">Temas Sugeridos</a></li>
				<li class="logado"><a href="#" id="link3" class="linksmenu" onclick="abrirCronograma(<?=$logado?>);mudaCorlink3();">Calendário</a></li>
				<li class="logado"><a href="#" class="linksmenu" onclick="deslogar();window.open(index.php)"> <?php echo("$usuario");?> (Logoff)</a></li>
			</ul>
		</div>

		 <!--Inicio do carregamento da página "principal.php"-->
		<iframe id="fra_principal" name="fra_principal" src="" frameborder="0" height="500px" width="100%"></iframe>
		<div class="rodape">
			Desenvolvido por Ethielle Ramos ® - Para uso Exclusivo em UEZO			
		</div>
	</body>
	<?PHP
		}	
		else if($tipo=="P"){
	?>
	<body class="checked" onload="abrirProjeto(<?=$logado?>);mudaCorlink1();">
		<div class="topbar" id="containertopo" align="center">
			<div class="topbar" id="titulo" align="center">
				<img id="logouerj" src="img/logo-pequena.png">
				<label id="containerlabel" >Sistema de Apoio e Controle no desenvolvimento de projetos finais </label>
			</div>
		</div>
		<div class="topmenu">		
			<ul>
				<li class="logado"><a href="#" id="link1" class="linksmenu" onclick="abrirProjeto(<?=$logado?>);mudaCorlink1();">Projetos Orientados</a></li>
				<li class="logado"><a href="#" id="link2" class="linksmenu" onclick="carregarSugeridos(<?=$logado?>);mudaCorlink2();">Sugerir Temas</a></li>
				<li class="logado"><a href="#" id="link3" class="linksmenu" onclick="abrirCronograma(<?=$logado?>);mudaCorlink3();">Calendário</a></li>
				<li class="logado"><a href="#" class="linksmenu" onclick="deslogar();window.open(index.php)"> <?php echo("$usuario");?> (Logoff)</a></li>
			</ul>
		</div>

		 <!--Inicio do carregamento da página "principal.php"-->
		<iframe id="fra_principal" name="fra_principal" src="" frameborder="0" height="800px" width="100%"></iframe>
		<div class="rodape">
			Desenvolvido por Ethielle Ramos ® - Para uso Exclusivo em UEZO			
		</div>
		
	<?PHP
		}
		else if ($tipo=="C"){
	?>
		<body class="checked" onload="gerenciarUsuarios(<?=$logado?>);mudaCorlink1();">
		<div class="topbar" id="containertopo" align="center">
			<div class="topbar" id="titulo" align="center">
				<img id="logouerj" src="img/logo-pequena.png">
				<label id="containerlabel" >Sistema de Apoio e Controle no desenvolvimento de projetos finais </label>
			</div>
		</div>
		<div class="topmenu">		
			<ul>
				<li class=""><a href="#" id="link1" class="linksmenu" onclick="gerenciarUsuarios(<?=$logado?>);mudaCorlink1();">Gerenciar Usuários</a></li>
				<li class=""><a href="#" id="link2" class="linksmenu" onclick="gerenciarRegras(<?=$logado?>);mudaCorlink2();">Gerenciar Regras</a></li>
				<!--<li class="logado"><a href="#" id="link3" class="linksmenu" onclick="abrirPrincipal();mudaCorlink3();">Regras</a></li>-->
				<li class=""><a href="#" class="linksmenu" onclick="deslogar();window.open(index.php);"> <?php echo("$usuario");?> (Logoff)</a></li>
			</ul>
			<input type="hidden" value="<?=$logado?>">
		</div>

		 <!--Inicio do carregamento da página "principal.php"-->
		<iframe id="fra_principal" name="fra_principal" src="" frameborder="0" height="800px" width="100%"></iframe>
		<div class="rodape">
			Desenvolvido por Ethielle Ramos ® - Para uso Exclusivo em UEZO			
		</div>
	</body>
	<?PHP
		}
		else {
			echo("<script type='text/javascript'> alert('Não permitido!');location.href='index2.php';</script>");
		}
	?>
	<?php
	}
	else{
		echo("<script type='text/javascript'> alert('Sessão não iniciada!');location.href='index2.php';</script>");
	}
	?>
</html>