<?php
		
	session_start();
	if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
	{
	  unset($_SESSION['login']);
	  unset($_SESSION['senha']);
	  header('location: index.php');
	 }

	if (isset($_GET['sair'])) {
	 	unset($_SESSION['login']);
	  	unset($_SESSION['senha']);
	  	header('location: index.php');
	 }

	

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/style-main.css">
	<meta charset="utf-8">
	<title>Tela principal</title>
</head>
<body>
	<header>
		<div class="logo">
			<a href="#">LOGO</a>
		</div>

		<nav class="navbar">
			<a href="AreaPrivada.php?sair=true">Sair</a>
			<a href="#">Sobre</a>
		</nav>
		
	</header>


	<div class="lorem"> 
		<h4>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, commodi est. Magnam, sit tempora reprehenderit omnis? Blanditiis, deleniti sed, laudantium et possimus voluptatibus obcaecati aliquid error distinctio eligendi nemo magnam.</h4>
		<p>Lorem ipsum dolor sit, amet, consectetur adipisicing elit. Perspiciatis perferendis nobis quos, officia laboriosam quaerat praesentium temporibus, similique. Velit nisi aspernatur voluptates repudiandae ex nam soluta libero debitis veniam quo?</p>
	</div>

	

</body>
</html>


