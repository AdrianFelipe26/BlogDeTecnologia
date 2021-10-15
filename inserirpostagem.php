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



$publicador = $_SESSION['nome'];

if(isset($_POST['titulo'])){

	$titulo = $_POST['titulo'];


};

if(isset($_POST['conteudo'])){

	$conteudo = $_POST['conteudo'];


};

if(isset($_POST['categoria'])){

	$categoria = $_POST['categoria'];


};


if(isset($_FILES['imagem'])){

	$imagem = $_FILES['imagem']['name'];
	$extensão = strtolower(pathinfo($imagem, PATHINFO_EXTENSION));

	$novo_nome = time().".".$extensão;

	$diretorio =  "imagens/";

	move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio . $novo_nome);

	$comandoSQL = $con->prepare( "INSERT INTO postagens (titulo,conteudo,imagem,data,categoria,publicador) VALUES(:titulo,:conteudo,:novo_nome,NOW(),:categoria,:publicador)");


	$comandoSQL->execute(array(
		':titulo' => $titulo,
		':conteudo'=> $conteudo,
		':novo_nome'=> $novo_nome,
		':categoria' => $categoria,
		':publicador'=> $publicador

	));
	if($comandoSQL->rowCount() > 0)
	{
		header("location:inserirpostagem.php?resposta=1");
	}
	else{
		header("location:inserirpostagem.php?resposta=2");
	}
}

	
 ?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>OnFlux - Criar Postagem</title>
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
	<?php require_once("_navbar.php"); ?>

	<form action="inserirpostagem.php"  method="POST" enctype="multipart/form-data">
		<div class="container my-5">

			<?php
	  			if (isset($_GET['resposta']) && $_GET['resposta'] == '1') {
   					echo("<div class='alert alert-success' role='alert'>Postagem enviada com sucesso!</div>");
				}else if (isset($_GET['resposta']) && $_GET['resposta'] == '2') {
					echo("<div class='alert alert-danger' role='alert'>Erro ao efetuar postagem.</div>");
				}
	  		?>

			<div class="form-group">
			    <label for="titulo">Titulo</label>
			    <input type="text" class="form-control" id="titulo" placeholder="Titulo da postagem" name="titulo" required>
			</div>

			<div class="form-group">
			    <label for="conteudo">Conteudo</label><br>
			    <textarea class="form-control" name="conteudo" id="conteudo" cols="100" rows="15" required></textarea>
			</div>

			<div class="form-group">
			    <label for="imagem">Imagem</label>
			    <input type="file" class="form-control" id="imagem" name="imagem" >
			</div>


			<label for="categoria">Categoria da postagem</label>
			<select id="categoria" class="custom-select" name="categoria" >
			       <option value="jogos"> Jogos</option>
			       <option value="seguranca"> Segurança da Informação</option>
			 </select>

			<br>
		  
			<button type="reset" class="btn btn-light">Limpar</button>
			<button type="submit" class="btn btn-success my-5" name="salvar">Inserir Postagem</button>
		</div>
    </form>

    <footer class="page-footer font-small mt-5 fixed-bottom">

	<!-- Copyright -->
	<div class="footer-copyright text-center py-3 text-white" style="background-color: black;">© 2020 Copyright
		<a href="http://onflux.epizy.com/?i=1" class="text-white"> OnFlux</a>
	</div>
	<!-- Copyright -->

	</footer>
</body>
</html>