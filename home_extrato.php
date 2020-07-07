<html>
<head>
<link rel="stylesheet" type="text/css" href="css/estilos.css">
<title>UERJ</title>
<style>
	frameset {
		border: 1px;
		border-style: dashed;
		border-color: #058;
		border-top-left-radius: 5px;
		border-top-right-radius: 5px;
		border-bottom-left-radius: 5px;
		border-bottom-right-radius: 5px;
	}
	frame {
		border: 1px;
		border-style: solid;
		border-color: white;
		border-top-left-radius: 5px;
		border-top-right-radius: 5px;
		border-bottom-left-radius: 5px;
		border-bottom-right-radius: 5px;
	}
</style>
<script>
	function focar(){
		//document.getElementById("linha1").focus();
		x = document.getElementById("linha1").contentDocument.getElementById("proc_conta");
		x.focus();
		x.select();
	}
</script>
</head>
<FRAMESET ROWS="85px,100%" border="1" id="frame">
	<FRAME SRC="../Upload de arquivos/visualizar.php" scrolling="no" align="middle" id="linha1" name="linha1">
	<frameset COLS="16.5%,*">
		<FRAME SRC="" id="coluna1" name="coluna1" onload="focar()">
		<FRAME SRC="" id="coluna2" name="coluna2">
		<!--<FRAME SRC="" id="coluna3" name="coluna3">-->
	</frameset>
<noframes>
<body class="login">
	<div class="topbar" id="containertopo" align="center">
		<div class="topbar" id="titulo" align="center">
			<img id="logouerj" src="img/logo_uerj_branco.png"></img>
			<label id="containerlabel" >UNIVERSIDADE DO ESTADO DO RIO DE JANEIRO </label>
		</div>
	</div>
</body>
</noframes>
</FRAMESET>
</html>
