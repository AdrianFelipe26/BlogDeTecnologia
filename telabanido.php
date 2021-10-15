<?php 

session_start()



 ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>OnFlux - Banido</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/lux/bootstrap.min.css" integrity="sha384-9+PGKSqjRdkeAU7Eu4nkJU8RFaH8ace8HGXnkiKMP9I9Te0GJ4/km3L1Z8tXigpG" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/estilo.css"/>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<style type="text/css">
		.center{
    		text-align: left;
    		margin-left: auto;
    		margin-right: auto;
		}
		.jumbotron{
			-webkit-box-shadow: inset 0px 0px 17px 5px rgba(0,0,0,0.75);
			-moz-box-shadow: inset 0px 0px 17px 5px rgba(0,0,0,0.75);
			box-shadow: inset 0px 0px 17px 5px rgba(0,0,0,0.75);
		}
	</style>

</head>
<body style="padding-bottom: 20px;">
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  		<a class="navbar-brand" href="#">OnFlux</a>
  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    	<span class="navbar-toggler-icon"></span>
  		</button>
	</nav>

	<form action="loginbd.php" method="POST">
		<div class="container" style="text-align: center; margin-left: auto; margin-right: auto;">
			<div class="jumbotron my-5 danger" style="background-color: red">
	  			<h1 class="display-3 text-white">Você está banido!</h1>
	  			<p class="lead text-white">Não foi possivel acessar o site.</p>
	    		<a class="btn btn-primary" href="index.php">Sair</a>
			</div>
		</div>
	</form>

	<footer class="page-footer font-small mt-5">

	<!-- Copyright -->
	<div class="footer-copyright text-center py-3 text-white fixed-bottom" style="background-color: black;">© 2020 Copyright
		<a href="http://onflux.epizy.com/?i=1" class="text-white"> OnFlux</a>
	</div>
	<!-- Copyright -->

</footer>
</body>

</html>