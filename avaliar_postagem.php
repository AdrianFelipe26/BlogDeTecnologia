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

$avaliacao = filter_input(INPUT_POST, "avaliar",FILTER_SANITIZE_NUMBER_INT);
$id_postagem = filter_input(INPUT_POST , "id_postagem",FILTER_SANITIZE_STRING);
$um = 1;

$avaliarSQL = $con->prepare("UPDATE postagens 
	set qtd_avaliacao =  qtd_avaliacao + 1,
	avaliacao = avaliacao + :avaliacao
	WHERE id_postagem = :id_postagem");

$avaliarSQL->execute(array(

	// ':um'=>$um,
	':avaliacao'=>$avaliacao,
	':id_postagem'=>$id_postagem

));

if($avaliarSQL->rowCount() > 0){


	header("location: postagem.php?id_postagem=".$id_postagem);
}else{


	//mensagem de erro
}


 ?>