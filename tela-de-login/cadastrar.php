<?php 

	require_once 'classes/usuarios.php';
	$u = new Usuario;
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Tela de Login</title>
	<link rel="stylesheet" type="text/css" href="css/style-cadastrar.css">
</head>
<body>
	<div class="btn">
		<a href="index.php" class="btn_back">voltar</a>
	</div>
	<div class="form">
		<h1>Cadastrar</h1>
		<form method="post" >
			<input type="text" name="nome" placeholder="Nome Completo"  maxlength="30"  id="nome">
			<input type="text" name="telefone" placeholder="Telefone"  maxlength="30" id="telefone">
			<input type="email" name="email" placeholder="E-mail"  maxlength="40" id="email">
			<input type="password" name="senha" placeholder="Senha"  maxlength="15" id="senha">
			<input type="password" name="confirmar_senha" placeholder="Confirmar senha"  id="confirm_senha">
			<input type="submit" name="Button" value="cadastrar">
		</form>
	</div>

	<?php
	//verificar se a pessoa clicou no botao
	if(isset($_POST['nome'])){

		$nome = addslashes($_POST['nome']);
		$telefone = addslashes($_POST['telefone']);
		$email = addslashes($_POST['email']);
		$senha = addslashes($_POST['senha']);
		$confirmar_senha = addslashes($_POST['confirmar_senha']);
		//verificar se esta preenchido
		if (!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confirmar_senha))
		{
			
			$u->conectar();

				if($u->msgErro == "")
				{

					if($senha == $confirmar_senha) 
					{

					 	if($u->cadastrar($nome, $telefone, $email, $senha))
					 	{
					 		?>
					 			<div class="msgCadastro">
					 				Cadastrado com sucesso! Acesse para entrar!
					 			</div>

					 		<?php
					 	}else{
					 		?>
						 		<div class="msgErro">
						 			echo "Email já cadastrado!"
						 		</div>

					 		<?php
					 	}

					}else{
						?>
						 <div class="msgErro">

						 	Senhas informadas não são iguais!
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