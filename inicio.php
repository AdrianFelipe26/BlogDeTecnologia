<?php

	
	session_start();
	require_once("conexao/conexao.php");
	require_once("verifica_ban.php"); 

	if((!isset($_SESSION['nome'])== true) AND (!isset($_SESSION['usuario'])==true))
	{
		session_unset();
		session_destroy();

		header("location:index.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>OnFlux - Inicio</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/lux/bootstrap.min.css" integrity="sha384-9+PGKSqjRdkeAU7Eu4nkJU8RFaH8ace8HGXnkiKMP9I9Te0GJ4/km3L1Z8tXigpG" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/estilo.css"/>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

	<style type="text/css">
		.center{
    		text-align: left;
    		margin-left: auto;
    		margin-right: auto;
		}

		.jumbotron{
			-webkit-box-shadow: 0px 0px 17px 5px rgba(0,0,0,0.75);
			-moz-box-shadow: 0px 0px 17px 5px rgba(0,0,0,0.75);
			box-shadow: 0px 0px 17px 5px rgba(0,0,0,0.75);
		}

	</style>

</head>
<body>
	<?php require_once("_navbar.php"); ?>

	<?php require_once("posts_recentes.php"); ?>


	<div class="card border-info my-5 post" style="max-width: 70rem;">
	  <div class="card-header" style="padding-top: 20px; font-size: 15pt">
	  <h3>O site</h3>
	</div>
		  <div class="card-body">
		    <h2 class="card-title text-center">O que nós somos?</h4>
		    	<blockquote class="blockquote text-center">
  					<p class="mb-0">Somos uma mistura inovadora de blog + fórum onde você, usuário de nosso site, será capaz de compartilhar seus conhecimentos de acordo com a categoria desejada, e após a criação de seu post e envio, os administradores irão analisar o conteúdo e liberar o mesmo para o público.</p>
  					<footer class="blockquote-footer">Onflux <cite title="Source Title">Admin</cite></footer>
				</blockquote>
		  </div>
	</div>
	
	<footer class="page-footer font-small mt-5">

	<!-- Copyright -->
	<div class="footer-copyright text-center py-3 text-white fixed-bottom" style="background-color: black;">© 2020 Copyright
		<a href="http://onflux.epizy.com/?i=1" class="text-white"> OnFlux</a>
	</div>
	<!-- Copyright -->

	</footer>
</body>

</html>