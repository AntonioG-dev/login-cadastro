<?php


Class Usuario{

    private $pdo;
    public $msgErro = "";

	public function conectar()
	{	
		global $msgErro;
		global $pdo;

		try {
			
			
		$pdo = new PDO("mysql:dbname=projeto_login;host=localhost","root", "");

		} catch (PDOException $e) {
			$msgErro = $e->GetMessage();
		}
		
	}

	public function cadastrar($nome, $telefone, $email, $senha)
	{
		global $pdo;
										// verificar se existe email cadastrado

		$sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e");

		$sql->bindValue(":e", $email);
		$sql->execute();

		if ($sql->rowCount() > 0) {		//conta se email possui caracteres
			return false; 				//ja está cadastrada
		}else{
			$sql = $pdo->prepare("INSERT INTO usuarios(nome, telefone, email,senha) VALUES (:n, :t, :e, :s)");

			$sql->bindValue(":n", $nome);
			$sql->bindValue(":t", $telefone);
			$sql->bindValue(":e", $email);
			$sql->bindValue(":s", md5($senha));

			$sql->execute();
			return true;	
		}
	}

	public function logar($email, $senha)
	{
		global $pdo;
		//verificar se o email e senha estao cadastrado
		$sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = :e AND senha = :s");
		$sql->bindValue(":e", $email);
		$sql->bindValue(":s", md5($senha));
		$sql->execute();
		if ($sql->rowCount() > 0) {
			
			$_SESSION['senha'] = $senha;
			$_SESSION['email'] = $email;
			return true; //logado com sucesso

		}else{

			return false;//nao foi possivel logar
		}
	}
}
?>