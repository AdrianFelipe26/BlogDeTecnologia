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
	<title>OnFlux - Segurança da Informação</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/lux/bootstrap.min.css" integrity="sha384-9+PGKSqjRdkeAU7Eu4nkJU8RFaH8ace8HGXnkiKMP9I9Te0GJ4/km3L1Z8tXigpG" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/estilo.css"/>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.quicksearch/2.3.1/jquery.quicksearch.js"></script>

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

	<h1 class="my-4 mx-4">
		Postagens / Segurança da informação
	</h1>

		<?php  

		      	$numLinhasPagina = 3;//numeros de registros que vao ser exibidos

		      	if(isset($_GET["pagina"]))
		   		{
	    			$pagina = $_GET["pagina"]; //a pagina que estou
		   			$pagina *= $numLinhasPagina;
		   		}
		   		else
		   		{
	    			$pagina = 0;
	     		}

		      		 

		      	$comandoSQL = "SELECT * FROM postagens WHERE aprovacao = 1 AND categoria = 'seguranca' "; //traz todos registros do meu banco de dados

		      	$totalPaginas = ceil($con->query($comandoSQL)->rowCount()/$numLinhasPagina); //conto quantas linhas (registros) vou ter, para eu saber quantas paginas eu vou ter.


		      	$comandoSQL = "SELECT * FROM postagens WHERE aprovacao = 1 AND categoria = 'seguranca' LIMIT $pagina, $numLinhasPagina"; //LIMIT, o primeiro parametro é apartir da onde, e o outro é quantos eu quero mostrar.

		      		


		      	$selecionados = $con->query($comandoSQL); //executa o comando, a query
		      	$resultado = $selecionados->fetchAll(); //converte meus dados do banco em uma tabela/matriz

		      	if($resultado)
		      	{
		      		foreach ($resultado as $publicacao) 
		      		{
		      				
		      			
		?>

				<div class="alert alert-warning post">
			  		<a href="postagem.php?id_postagem=<?php echo $publicacao['id_postagem'] ?>" class="alert-link">
			  			<strong class=""><?php echo $publicacao['titulo']; ?> por: <?php echo $publicacao['publicador']; ?></strong>
			  		</a>
				</div>

		<?php 
		      		}
		      	}
		      	else
		      	{
		      		echo("<div class='alert alert-danger my-4 ml-4 post' role='alert'>Não há postagens.</div>");
		      	}

		?>

		    </tbody>
  		</table>

	  		<ul class="pagination" style="margin-left: 34rem;">

	  			<?php 
	  				for ($i=0 ; $i < $totalPaginas  ; $i++ ) { 
	  					
	  			?>
	  				<li class="page-item"><a class="page-link" href="posts_seguranca.php?pagina=<?php echo $i ;?>"><?php echo $i+1; ?></a></li>

	  			<?php
	  				}
	  			 ?>
			    
	  		</ul>
	<footer class="page-footer font-small mt-5">

	 	<!-- Copyright -->
	 	<div class="footer-copyright text-center py-3 text-white fixed-bottom" style="background-color: black;">© 2020 Copyright
	 		<a href="http://onflux.epizy.com/?i=1" class="text-white"> OnFlux</a>
	 	</div>
	 	<!-- Copyright -->

	</footer>
	
</body>
</html>