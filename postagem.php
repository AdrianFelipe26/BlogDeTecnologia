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

	//
	
	$id_postagem  = $_GET['id_postagem'];

	$publicacaoSQL = $con->prepare("SELECT * from postagens WHERE id_postagem = :id_postagem");


	$publicacaoSQL->execute(array(
		':id_postagem' => $id_postagem
	));

	$resul_post = $publicacaoSQL->fetchAll();
 ?>

 <?php 

	//referente a postagem
	$id_postagem  = $_GET['id_postagem'];


	$publicacaoSQL = $con->prepare("SELECT * from postagens WHERE id_postagem = :id_postagem");


	$publicacaoSQL->execute(array(
		':id_postagem' => $id_postagem


	));

	$resul_post = $publicacaoSQL->fetchAll();

	//referente ao comentario


	$comentarioSQL = $con->prepare("SELECT * from comentarios WHERE postagem_ref = :id_postagem ");

	$comentarioSQL->execute(array(
		':id_postagem' => $id_postagem


	));

	$result_coment = $comentarioSQL->fetchAll();


	// //referente ao comentario


	// $comentarioSQL = $con->prepare("SELECT * from comentarios WHERE postagem_ref = :id_postagem ");

	// $comentarioSQL->execute(array(
	// 	':id_postagem' => $id_postagem


	// ));

	// $result_coment = $comentarioSQL->fetchAll();
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>OnFlux - Publicação</title>
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
	<?php 

		foreach ($resul_post as $post) {

			$avaliacao = $post['avaliacao'];
			$quantidade =  $post['qtd_avaliacao'];
		
			if($avaliacao == 0 && $quantidade == 0){

				$nota = 0;

			}else{
				$nota = $avaliacao / $quantidade;
				$nota = number_format($nota, 2, '.', '');
			}
	
		}

	?>

	<?php require_once("_navbar.php"); ?>



	<?php 

		foreach ($resul_post as $post) {

	?>

	<div class="card border-info my-5 post-usuario">
	  	<div class="card-header" style="font-size: 15pt; font-weight: bold;">
	  		PUBLICAÇÃO <h3 style="float: right"><?php echo "Nota: ".$nota ;?></h3>
		</div>
		  	<div class="card-body">
		    	<h2 class="card-title text-center"><?php echo $post['titulo']; ?></h4>
		    		<center>
		    			<img class="imagem-post" src="imagens/<?php echo $post['imagem']; ?>">
		    		</center>
		    	<blockquote class="blockquote text-center">
  					<p class="mb-0"><?php echo $post['conteudo']; ?></p>
  					<footer class="blockquote-footer">Onflux <cite title="Source Title"><?php echo $post['publicador']; ?></cite></footer>
				</blockquote>

		  </div>
	</div>

	<?php 

		}
 	?>

 	<div class="interacao" style="margin-bottom: 20px;">
	 	<h3>Avaliar</h3>
		<form action="avaliar_postagem.php" method="POST">
			<input type="hidden" name="id_postagem" value="<?php echo $_GET['id_postagem'];?>">
			<button type="submit" class="btn btn-warning" value="1" name="avaliar">1</button>
			<button type="submit" class="btn btn-warning" value="2" name="avaliar">2</button>
			<button type="submit" class="btn btn-warning" value="3" name="avaliar">3</button>				
			<button type="submit" class="btn btn-warning" value="4" name="avaliar">4</button>
			<button type="submit" class="btn btn-warning" value="5" name="avaliar">5</button>
		</form>
	</div>
 	<h3 class="interacao">Sessão de comentarios</h3><br>
 	<form action="inserircomentario.php" METHOD="POST">
		<div class="form-group interacao">
			<label for="comentario">Comente aqui</label><br>
			<textarea class="form-control" name="comentario" id="comentario" cols="100" rows="3" required> </textarea>
				<br>
			<input type="hidden" name="id_postagem" value="<?php echo $_GET['id_postagem'];?>">
			<button type="submit" class="btn btn-success" style="margin-bottom: 30px;">Comentar</button>
		<div>
	</form>
	<?php
		foreach ($result_coment as $coment) {
					# code...
	?>

	<div class="card mb-3" style="max-width: 70rem; background-color: #fde6c5">
	  	<div class="card-header" style="padding-top: 20px; font-size: 15pt">
			<h4 class="card-title"><?php echo $coment['publicador']; ?></h4>
		</div>
		<div class="card-body">
    		<p class="card-text" style="font-size: 16px;"><?php echo $coment['conteudo']; ?></p>
  		</div>
	</div>
	<br>

	<?php 
				}
 	?>
	
	<footer class="page-footer font-small mt-5">

	<!-- Copyright -->
	<div class="footer-copyright text-center py-3 text-white fixed-bottom" style="background-color: black;">© 2020 Copyright
		<a href="http://onflux.epizy.com/?i=1" class="text-white"> OnFlux</a>
	</div>
	<!-- Copyright -->

	</footer>
</body>

</html>