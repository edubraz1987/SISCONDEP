function mudaCorlink1()
	{
		document.getElementById('link1').className = 'linksmenuativo';
		document.getElementById('link2').className = 'linksmenu';
		document.getElementById('link3').className = 'linksmenu';
		//document.getElementById('link4').className = 'linksmenu';
				
	}
function mudaCorlink2()
	{
		document.getElementById('link2').className = 'linksmenuativo';
		document.getElementById('link1').className = 'linksmenu';
		document.getElementById('link3').className = 'linksmenu';
		//document.getElementById('link4').className = 'linksmenu';
		
	}
function mudaCorlink3()
	{
		document.getElementById('link3').className = 'linksmenuativo';
		document.getElementById('link2').className = 'linksmenu';
		document.getElementById('link1').className = 'linksmenu';
		//document.getElementById('link4').className = 'linksmenu';
		
	}
/*function mudaCorlink4()
	{
		document.getElementById('link4').className = 'linksmenuativo';
		document.getElementById('link2').className = 'linksmenu';
		document.getElementById('link3').className = 'linksmenu';
		document.getElementById('link1').className = 'linksmenu';
	}*/

function deslogar()
	{
		location.href='control/terminar_sessao.php';
	}

function goBack(){
		window.history.back()
	}	
		
function abrirRegras()
	{
		document.getElementById('fra_principal').src = 'regras/regras.php';
	}

function carregarAcesso()
	{
		window.open("index2.php");
		window.close();
		//document.getElementById('fra_principal').src = 'index2.php';
	}
	
function carregarSugeridos()
	{
		document.getElementById('fra_principal').src = 'recomendado/recomendados.php';
	}
	
function abrirProjeto(login)
	{
		if (login == '1') {
			document.getElementById('fra_principal').src = 'projeto/projeto.php';
		}
		else{
			alert("Não permitido!");
			location.href='index2.php';		
		}
		
	}	
	
function gerenciarRegras(login)
	{
		if (login == '1') {
			document.getElementById('fra_principal').src = 'regras/regras.php';
		}
		else{
			alert("Não permitido!");
			location.href='index2.php';		
		}
		
	}
	
function gerenciarUsuarios(login)
	{
		if (login == '1') {
			document.getElementById('fra_principal').src = 'control/gerenciar/lista_usuarios.php';
		}
		else{
			alert("Não permitido!");
			location.href='index2.php';		
		}
		
	}	
function abrirCronograma(login)
	{
		if (login == '1') {
			document.getElementById('fra_principal').src = 'cronograma/cronograma.php';
		}
		else{
			alert("Não permitido!");
			location.href='index2.php';		
		}
		
	}
