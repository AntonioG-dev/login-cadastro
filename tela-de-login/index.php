<?php
	require_once 'classes/usuarios.php';
	$u = new Usuario;

?>



<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Tela de Login</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<header class="header">
			
				<a href="#">LOGO</a >
			
		</header>

		<div class="form">
			<h1>Login</h1>
			<form method="post" >
				<input type="text" name="email" placeholder="E-mail">
				<input type="password" name="senha" placeholder="Senha">
				<input type="submit" name="Button" value="Acessar">
			</form>
			<a href="cadastrar.php">Ainda não é inscrito?<strong>Cadastre-se!</strong></a>
		</div>

		<?php

		session_start();
		//verificar se a pessoa clicou no botao
			if(isset($_POST['email'])){

				$email= addslashes($_POST['email']);		
				$senha = addslashes($_POST['senha']);
				
				//verificar se esta preenchido
				if ( !empty($email) && !empty($senha))
				{
					$u->conectar();
					if($u->msgErro == ""){


						if($u->logar($email, $senha)){

							header("location: AreaPrivada.php");

						}else{
							?>
							<div class="msgErro">
								
								Email e/ou senha estão incorretos!
							</div>
						
							<?php
						}
					}else{
						 ?>

						<div class="msgErro">

							<?php echo "Erro:".$u->msgErro;?>
						</div>
						
						<?php
					}	
				}else{
					?>
					<div class="msgErro">
						
						Prencha todos os campos
					</div>
					
					<?php
				}	
			}
		?>


	</body>
</html>