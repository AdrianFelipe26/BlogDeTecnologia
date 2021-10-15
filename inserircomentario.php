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

 

 <?php 

 	$comentario = filter_input(INPUT_POST , "comentario",FILTER_SANITIZE_STRING);
 	$publicador = $_SESSION['nome'];
 	$id_postagem = filter_input(INPUT_POST , "id_postagem",FILTER_SANITIZE_STRING);


 	//INSERE O COMENTARIO

 	$inserecomentSQL = $con->prepare("INSERT INTO comentarios (publicador,conteudo,postagem_ref) VALUES (:publicador,:comentario,:id_postagem)");

 	$inserecomentSQL->execute(array(
 		':publicador'=> $publicador,
 		':comentario'=> $comentario,
 		':id_postagem'=>$id_postagem


 	));

 	if($inserecomentSQL->rowCount() >0){


 		//ele inseriu, volta pra publicação
 		header("location: postagem.php?id_postagem=".$id_postagem);
 	}else{


 		//mostrar mensagem de erro

 	}





  ?>