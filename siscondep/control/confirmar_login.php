<html>
	<head></head>
	<body class="login">
		<?php 
			header('Content-Type: text/html; charset=utf-8');
	
			$con= mysql_connect("localhost","root","root");
			$db= mysql_select_db("siscondep");
			
			mysql_query("SET NAMES 'utf8'");
			mysql_query('SET character_set_connection=utf8');
			mysql_query('SET character_set_client=utf8');
			mysql_query('SET character_set_results=utf8');
			
			include 'config.php';
			
			$link = mysql_connect($host,'root','root'); 
			$basedados = mysql_select_db($database); 
			
			$login_digitado = $_POST['login']; //login usado no MySQL
			$senha_digitado = $_POST['senha']; //senha usado no MySQL
			
			if (!isset($_POST['login']) || ($_POST['login']=="")||!isset($_POST['senha']) || ($_POST['senha']==""))
				{
						echo("<script type='text/javascript'> alert('Login e/ou senha devem ser preenchidos!'); location.href='../index2.php';</script>");
			}
			else{
				$sql="SELECT usuario, senha, tipo,situacao FROM login WHERE usuario = '$login_digitado' and senha = '$senha_digitado'";
				//echo $sql;
				$rs = mysql_query($sql);
				
				if (mysql_affected_rows()==0){
					echo("<script type='text/javascript'> alert('Login incorreto, favor tentar novamente!'); location.href='../index2.php';</script>");
					mysql_close($link);
				}
				else
				{
				
					while ($registro = mysql_fetch_array($rs)){
					
						$login_db = $registro['usuario'];
						$senha_db = $registro['senha'];
						$tipo = $registro['tipo'];
						$situacao = $registro['situacao'];
						
					}
					if($situacao == "inativo"){
						echo("<script type='text/javascript'> alert('Usuário inativo. Favor entrar em contato com a coordenação de curso!'); location.href='../index2.php';</script>");
						mysql_close($link);
					}
					else{
						if($login_digitado == $login_db){
							if($senha_digitado == $senha_db){
								session_start();
								$validacao = "1";							
								$_SESSION['usuario'] = $login_db;
								$_SESSION['tipo'] = $tipo;
								$_SESSION['validacao'] = $validacao;
								//echo("<script type='text/javascript'> alert('login_db - $login_db | validacao - $validacao');</script>");
								//$sql_logar="UPDATE login set logado = 1 WHERE user = '$login_digitado' and senha = '$senha_digitado'";
								//mysql_query($sql_logar);
								echo '
								<script type="text/javascript">	
									window.location="../home.php";
								</script>';
							}
							else{
								echo("<script type='text/javascript'> alert('Senha incorreta, favor tentar novamente!'); location.href='../index2.php';</script>");
								mysql_close($link);
								
							}
						}
						else{
							echo("<script type='text/javascript'> alert('Login nao encontrado!'); location.href='../index2.php';</script>");
							mysql_close($link);
						}
					}
				}
			}
		?>
	</body>
</html>
